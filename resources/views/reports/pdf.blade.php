<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Visits Report</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #111827;
        }

        h1 {
            margin-bottom: 8px;
            font-size: 18px;
        }

        .meta {
            margin-bottom: 16px;
            color: #4b5563;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #d1d5db;
            padding: 6px;
            text-align: left;
        }

        th {
            background: #f3f4f6;
        }
    </style>
</head>
<body>
    <h1>Visits Report</h1>

    <div class="meta">
        <div>From: {{ $filters['start_date'] ?? 'N/A' }}</div>
        <div>To: {{ $filters['end_date'] ?? 'N/A' }}</div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Start</th>
                <th>End</th>
                <th>Prisoner</th>
                <th>Visitor</th>
                <th>Guard</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($visits as $visit)
                <tr>
                    <td>{{ $visit->date }}</td>
                    <td>{{ $visit->start_time }}</td>
                    <td>{{ $visit->end_time }}</td>
                    <td>{{ $visit->prisoner?->name ?? '-' }}</td>
                    <td>{{ $visit->visitor?->name ?? '-' }}</td>
                    <td>{{ $visit->assignedGuard?->name ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No records found for selected filters.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
