<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail Lesson</title>
</head>
<body>
    <form action="" method="post">
        @csrf
        <div class="mb-5">
            <label for="email"></label>
            <input type="text" id="email" name="email">
            @erro
                <p>{{$message}}</p>
            @enderror
        </div>
        <button type="submit">Submit</button>
        @if (session('message'))
            <p>
                {{session('message')}}
            </p>
        @endif
    </form>
</body>
</html>