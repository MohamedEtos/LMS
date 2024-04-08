<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('week.update', $week->id) }}" method="post">

        @csrf
        @method('PUT')

        <input type="text" name="NumberOfWeeks" value="{{ old('NumberOfWeeks') ?? $week->NumberOfWeeks }}" />
        @error('NumberOfWeeks')
            <span style="color: red">{{ $message }}</span>
        @enderror

        <select name="coursesId">
            <option value=""></option>
            @foreach ($courses as $course)
                <option value="{{ $course->id }}" @selected((old('coursesId') ?? $week->coursesId ) == $course->id)>
                    {{ $course->courseName }}
                </option>
            @endforeach
        </select>
        @error('coursesId')
            <span style="color: red">{{ $message }}</span>
        @enderror

        <button>Update Week</button>
    </form>
</body>

</html>
