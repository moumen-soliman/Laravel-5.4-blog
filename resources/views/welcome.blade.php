
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<ul>
    @foreach ($tasks as $task)
        <li>{{ $task->body . $task->user_id}}</li>
    @endforeach 
</ul>

</body>
</html>