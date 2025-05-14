<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artists</title>
</head>
<body>
    <h1>Artists List</h1>
    <ul>
        @foreach ($artists as $artist)
            <li>{{ $artist->name }} - {{ $artist->genre }}</li>
        @endforeach
    </ul>
</body>
</html>
