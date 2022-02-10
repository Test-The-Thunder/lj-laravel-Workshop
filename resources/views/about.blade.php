<!DOCTYPE html>
<html lang="en">
<head>
    <title>About</title>
</head>
<body>
    About <br>
    {{-- {{ $data }} --}}
    @foreach ($data as $d )
        {{ $d }} <br>
    @endforeach

</body>
</html>