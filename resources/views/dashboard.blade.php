<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Dashboard</h1>

    <div>
        <p>Total Tasks: {{ $totalTasks }}</p>
        <p>Completed Tasks: {{ $completedTasks }}</p>
    </div>

    <div>
        <h2>Tasks by Due Date</h2>
        <table>
            <thead>
                <tr>
                    <th>Due Date</th>
                    <th>Task Count</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasksByDueDate as $task)
                    <tr>
                        <td>{{ $task->date }}</td> <!-- Corrected column name to 'date' -->
                        <td>{{ $task->count }}</td> <!-- Corrected column name to 'count' -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
