<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <a href="{{ route('main') }}">Go back</a>
    <br><br>
    <a href="{{ route('week.create') }}">Create new week</a>

    <table>
        <thead>
            <tr>
                <th>Week Name</th>
                <th>Week Description</th>
                <th>Control</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($weeks as $week)
            <tr>
                <td>{{ $week->NumberOfWeeks }}</td>
                <td>{{  $week->coursesWeeksRel->courseName }}</td>
                <td>
                    <a href="{{ route('week.edit', $week->id) }}">Edit</a>
                    <form action="{{ route('week.destroy', $week->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>