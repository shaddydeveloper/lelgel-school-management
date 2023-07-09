<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update All</title>
</head>
<body>
    <form action="{{route('update_all_assigned')}}" method="POST">
    @csrf
    <input type="submit" value="Update All">
    </form>
</body>
</html>