<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit</title>
</head>
<body>
    <form action="/student/{{$student->id}}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name='roll' value="{{$student->roll}}"/>
        @error('roll')
            {{ $message }}
        @enderror

        <input type="text" name='name' value="{{$student->name}}"/>
        @error('name')
            {{ $message }}
        @enderror
        <input type="submit" value="Update"/>
    </form>
</body>
</html>