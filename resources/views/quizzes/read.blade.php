<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    @if (session('error_delete'))
        <span style="color: red">{{ session('error_delete') }}</span>
    @endif
    <a href="{{ route('main') }}">Go back</a>
    <br><br>
    <a href="{{ route('quiz.create') }}">Create new Quiz</a>

    <table>
        <thead>
            <tr>
                <th>quizzes name</th>
                <th>quizzes content</th>
                <th>day video Name</th>
                <th>Control</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($quizzes as $quiz)
                <tr>
                    <td>{{ $quiz->quizName }}</td>
                    <td>{{ $quiz->quizContent }}</td>
                    <td>{{ $quiz->daysQuizRel->VideoName }}</td>
                    <td>
                        <a href="{{ route('quiz.edit', $quiz->id) }}">Edit</a>
                        <form action="{{ route('quiz.destroy', $quiz->id) }}" method="POST">
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
