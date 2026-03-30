<?php

namespace App\Http\Controllers;

use App\Exports\VisitsReportExport;
use App\Models\Prisoner;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;

class ReportController extends Controller
{
    public function index(Request $request): View
    {
        $filters = $this->validatedFilters($request);
        $reportData = $this->buildReportData($filters);

        return view('reports.index', [
            'visits' => $reportData['visits'],
            'prisoners' => $reportData['prisoners'],
            'filters' => $filters,
        ]);
    }

    public function downloadPdf(Request $request): Response
    {
        $filters = $this->validatedFilters($request);
        $reportData = $this->buildReportData($filters);

        $pdf = app('dompdf.wrapper')->loadView('reports.pdf', [
            'visits' => $reportData['visits'],
            'filters' => $filters,
        ]);

        return $pdf->download('visits-report.pdf');
    }

    public function downloadExcel(Request $request): BinaryFileResponse
    {
        $filters = $this->validatedFilters($request);
        $reportData = $this->buildReportData($filters);

        return Excel::download(new VisitsReportExport($reportData['visits'], $filters), 'visits-report.xlsx');
    }

    /**
     * @return array{start_date: string|null, end_date: string|null, prisoner_id: int|null}
     *
     * @throws ValidationException
     */
    private function validatedFilters(Request $request): array
    {
        $validated = Validator::make($request->all(), [
            'start_date' => ['nullable', 'date', 'required_with:end_date'],
            'end_date' => ['nullable', 'date', 'required_with:start_date', 'after_or_equal:start_date'],
            'prisoner_id' => ['nullable', 'integer', 'exists:prisoners,id'],
        ], [
            'start_date.required_with' => 'Start date is required when end date is selected.',
            'end_date.required_with' => 'End date is required when start date is selected.',
            'end_date.after_or_equal' => 'End date must be the same or later than start date.',
            'prisoner_id.exists' => 'Selected prisoner is not valid.',
        ], [
            'start_date' => 'start date',
            'end_date' => 'end date',
            'prisoner_id' => 'prisoner',
        ])->validate();

        return [
            'start_date' => $validated['start_date'] ?? null,
            'end_date' => $validated['end_date'] ?? null,
            'prisoner_id' => isset($validated['prisoner_id']) ? (int) $validated['prisoner_id'] : null,
        ];
    }

    /**
     * @param array{start_date: string|null, end_date: string|null, prisoner_id: int|null} $filters
     * @return array{visits: \Illuminate\Support\Collection<int, \App\Models\Visit>, prisoners: \Illuminate\Database\Eloquent\Collection<int, \App\Models\Prisoner>}
     */
    private function buildReportData(array $filters): array
    {
        $visits = Visit::with(['prisoner', 'visitor', 'assignedGuard'])
            ->where('state', 'active')
            ->when($filters['start_date'], fn ($query, $startDate) => $query->whereDate('date', '>=', $startDate))
            ->when($filters['end_date'], fn ($query, $endDate) => $query->whereDate('date', '<=', $endDate))
            ->when($filters['prisoner_id'], fn ($query, $prisonerId) => $query->where('prisoner_id', $prisonerId))
            ->orderBy('date')
            ->orderBy('start_time')
            ->get();

        $prisoners = Prisoner::where('state', 'active')
            ->orderBy('name')
            ->get();

        return [
            'visits' => $visits,
            'prisoners' => $prisoners,
        ];
    }
}
