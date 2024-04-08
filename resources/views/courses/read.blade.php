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
    <a href="{{ route('course.create') }}">Create new course</a>

    <table>
        <thead>
            <tr>
                <th>Course Name</th>
                <th>Course Description</th>
                <th>Control</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
            <tr>
                <td>{{ $course->courseName }}</td>
                <td>{{ $course->courseDescription }}</td>
                <td>
                    <a href="{{ route('course.edit', $course->id) }}">Edit</a>
                    <form action="{{ route('course.destroy', $course->id) }}" method="POST">
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