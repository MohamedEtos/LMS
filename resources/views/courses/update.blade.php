<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('course.update', $course->id) }}" method="post">

        @csrf
        @method('PUT')

        <input type="text" name="courseName" value="{{ old('courseName') ?? $course->courseName }}" />
        @error('courseName')
            <span style="color: red">{{ $message }}</span>
        @enderror

        <textarea name="courseDescription" id="" cols="30" rows="10">{{ old('courseDescription') ?? $course->courseDescription }}</textarea>
        @error('courseDescription')
            <span style="color: red">{{ $message }}</span>
        @enderror

        <button>Update Course</button>

    </form>
</body>
</html>