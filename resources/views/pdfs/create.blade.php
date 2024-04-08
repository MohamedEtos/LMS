<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('pdf.store') }}" method="POST">
        @csrf

        <input type="text" placeholder="pdf name" name="pdfName" value="{{ old('pdfName') }}" />
        @error('pdfName')
            <span style="color: red">{{ $message }}</span>
        @enderror

        <input type="text" placeholder="pdf Url" name="pdfLink" value="{{ old('pdfLink') }}" />
        @error('pdfLink')
            <span style="color: red">{{ $message }}</span>
        @enderror

        <select name="dayId">
            <option value=""></option>
            @foreach ($days as $day)
                <option value="{{ $day->id }}" @selected(old('dayId') == $day->id)>
                    {{ $day->VideoName }}
                </option>
            @endforeach
        </select>
        @error('dayId')
            <span style="color: red">{{ $message }}</span>
        @enderror

        <button>Create New Day</button>
    </form>
</body>

</html>
