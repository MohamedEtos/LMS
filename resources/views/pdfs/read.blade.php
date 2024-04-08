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
    <a href="{{ route('pdf.create') }}">Create new pdf</a>

    <table>
        <thead>
            <tr>
                <th>pdf name</th>
                <th>pdf link</th>
                <th>day video Name</th>
                <th>Control</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pdfs as $pdf)
                <tr>
                    <td>{{ $pdf->pdfName }}</td>
                    <td><a href="{{ $pdf->pdfLink }}">{{ $pdf->pdfLink }}</a></td>
                    <td>{{ $pdf->daysPdfRel->VideoName }}</td>
                    <td>
                        <a href="{{ route('pdf.edit', $pdf->id) }}">Edit</a>
                        <form action="{{ route('pdf.destroy', $pdf->id) }}" method="POST">
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
