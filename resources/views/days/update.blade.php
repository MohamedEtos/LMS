<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('day.update', $day->id) }}" method="POST">

        @csrf
        @method('PUT')

        <input type="number" placeholder="Number of days" max=7 min=1 name="NumberOfDays" value="{{ old('NumberOfDays') ?? $day->NumberOfDays }}" />
        @error('NumberOfDays')
            <span style="color: red">{{ $message }}</span>
        @enderror

        <input type="text" placeholder="Video Name" name="VideoName" value="{{ old('VideoName') ?? $day->VideoName }}" />
        @error('VideoName')
            <span style="color: red">{{ $message }}</span>
        @enderror

        <input type="text" placeholder="Video Url" name="VideoUrl" value="{{ old('VideoUrl') ?? $day->VideoUrl }}" />
        @error('VideoUrl')
            <span style="color: red">{{ $message }}</span>
        @enderror

        <select name="weekId">
            <option value=""></option>
            @foreach ($courses_weeks as $week)
                <option value="{{ $week->id }}" @selected((old('weekId') ?? $day->weekId) == $week->id)>
                    week: {{ $week->id }}
                </option>
            @endforeach
        </select>

        @error('weekId')
            <span style="color: red">{{ $message }}</span>
        @enderror

        <button>Create New Day</button>
    </form>
</body>

</html>
