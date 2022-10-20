<html>
<head></head>
<body>
    <ul>
        @foreach($repairsPending as $repair)
            <li>{{$repair->car_imm}}</li>
        @endforeach
    </ul>
</body>
</html>
