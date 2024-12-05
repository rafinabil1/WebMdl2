<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
</head>
<body>
    <h1>Daftar Posts</h1>
    <ul>
        @foreach ($posts as $post)
            <li>
                <strong>{{ $post->title }}</strong><br>
                <img src="{{ asset('storage/posts/' . $post->image) }}" alt="Image" width="200"><br>
                {{ $post->content }}
            </li>
        @endforeach
    </ul>
</body>
</html>
