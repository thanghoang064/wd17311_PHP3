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
   <h1>{{ $name  }}</h1>
    <form action="{{ route('test_post') }}" method="POST">
        @csrf
        <input type="text" name="abc">
        <input type="submit" value="Gui" name="btnSend">
    </form>
    <table border="1">
        <tr>
            <td>ID</td>
            <td>Name</td>
        </tr>
        @foreach($students as $st)
        <tr>
            <td>{{ $st->id }}</td>
            <td>{{ $st->name }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
