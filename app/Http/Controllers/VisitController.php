<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use App\Models\Visitor;
use App\Models\Prisoner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
// sirve para las validaciones de fecha y hora
use Carbon\Carbon;

class VisitController extends Controller
{
    public function index()
    {
        $visits = Visit::with(['visitor', 'prisoner', 'assignedGuard'])
            ->where('state', 'active')
            ->orderByDesc('date')
            ->orderByDesc('start_time')
            ->get();

        return view('visits.index', compact('visits'));
    }

    public function create()
    {
        $visitors = Visitor::all();
        $prisoners = Prisoner::where('state', 'active')->orderBy('name')->get();

        return view('visits.create', compact('visitors', 'prisoners'));
    }

    public function show(Visit $visit)
    {
        $visit->load(['visitor', 'prisoner', 'assignedGuard']);

        return view('visits.show', compact('visit'));
    }

    public function edit(Visit $visit)
    {
        $visitors = Visitor::all();
        $prisoners = Prisoner::where('state', 'active')->orderBy('name')->get();

        return view('visits.edit', compact('visit', 'visitors', 'prisoners'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateVisitData($request);

        Visit::create([
            'visitor_id' => $validated['visitor_id'],
            'prisoner_id' => $validated['prisoner_id'],
            'user_id' => Auth::id(),
            'date' => $validated['date'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'state' => 'active',
        ]);

        return redirect()->route('visits.index')->with('success', 'Visit registered successfully.');
    }

    public function update(Request $request, Visit $visit)
    {
        $validated = $this->validateVisitData($request, $visit->id);

        $visit->update([
            'visitor_id' => $validated['visitor_id'],
            'prisoner_id' => $validated['prisoner_id'],
            'date' => $validated['date'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
        ]);

        return redirect()->route('visits.index')->with('success', 'Visit updated successfully.');
    }

    public function destroy(Visit $visit)
    {
        $visit->update([
            'state' => 'deleted',
        ]);

        return redirect()->route('visits.index')->with('success', 'Visit deleted successfully.');
    }

    private function validateVisitData(Request $request, ?int $visitIdToIgnore = null): array
    {
        $validated = $request->validate([
            'visitor_id' => 'required|exists:visitors,id',
            'prisoner_id' => 'required|exists:prisoners,id',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ], [
            'end_time.after' => 'The end time must be after the start time.',
        ]);

        $date = Carbon::parse($validated['date']);
        if (! $date->isSunday()) {
            throw ValidationException::withMessages([
                'date' => 'Only visits are allowed on Sundays.',
            ]);
        }

        $startTime = Carbon::createFromFormat('H:i', $validated['start_time']);
        $endTime = Carbon::createFromFormat('H:i', $validated['end_time']);
        $windowStart = Carbon::createFromTimeString('14:00');
        $windowEnd = Carbon::createFromTimeString('17:00');

        if ($startTime->lt($windowStart) || $endTime->gt($windowEnd)) {
            throw ValidationException::withMessages([
                'start_time' => 'Only allowed on Sundays from 14:00 to 17:00.',
            ]);
        }

        $overlapQuery = Visit::where('prisoner_id', $validated['prisoner_id'])
            ->where('date', $validated['date'])
            ->where('state', 'active')
            ->where(function ($query) use ($validated) {
                $query->where('start_time', '<', $validated['end_time'])
                    ->where('end_time', '>', $validated['start_time']);
            });

        if ($visitIdToIgnore) {
            $overlapQuery->where('id', '!=', $visitIdToIgnore);
        }

        if ($overlapQuery->exists()) {
            throw ValidationException::withMessages([
                'start_time' => 'The prisoner already has a visit in that time slot for that date.',
            ]);
        }

        return $validated;
    }
}