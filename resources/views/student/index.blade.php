<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>
<body>
    <h1>{{ $name }}</h1>
    <form action="{{ url('/student') }}" method="post">
        @csrf
        <label>
            Email
            <input type="text" name="email" >
        </label>
        <input type="submit" name="btnSearch" value="Tìm kiếm">
    </form>
    <table border="1">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Hình ảnh</td>
        </tr>
        @foreach($students as $st)
        <tr>
            <td>{{ $st->id }}</td>
            <td>{{ $st->name }}</td>
            <td><img src="{{ $st->image?''.Storage::url($st->image):''}}" style="width: 100px" /></td>
            <td><a href="{{ route('route_student_delete',['id'=>$st->id]) }}">Xóa</a></td>
        </tr>
        @endforeach
    </table>
</body>
</html>
