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
    <a href="{{ route('day.create') }}">Create new day</a>

    <table>
        <thead>
            <tr>
                <th>Number of days</th>
                <th>week id</th>
                <th>Video Name</th>
                <th>Video Url</th>
                <th>Control</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($days as $day)
                <tr>
                    <td>{{ $day->NumberOfDays }}</td>
                    <td>{{ $day->WeekToDaysRel->id }}</td>
                    <td>{{ $day->VideoName }}</td>
                    <td>{{ $day->VideoUrl }}</td>
                    <td>
                        <a href="{{ route('day.edit', $day->id) }}">Edit</a>
                        <form action="{{ route('day.destroy', $day->id) }}" method="POST">
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
