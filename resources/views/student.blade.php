<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <form action="/student" method="POST">
        @csrf
        roll:-<input type="text" name="roll" value="{{ old('roll') }}">
        @error('roll')
        {{ $message }}
        @enderror
        <br>
        name:-<input type="text" name="name" value="{{ old('name') }}">
        @error('name')
        {{ $message }}
        @enderror
        <br>
        <input type="submit">
    </form>

    @foreach ($student as $s )
        roll:-{{ $s['roll'] }}
        name:-{{ $s['name'] }} 
        <form action="{{ route('student.destory',$s->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="delete">
        </form>
        <a href="student/{{$s->id}}/edit">Edit</a>
        <br>
    @endforeach
</body>
</html>