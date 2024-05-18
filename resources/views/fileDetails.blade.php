<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
    </style>
</head>

<body>
    <form method="post" class="container" action="{{route('operateFile')}}">
        @csrf
        <h1>you Upload File with details</h1>
        <p>
            file name : {{$fileName}}</p>
        <p>
            file size : {{$fileSize}}</p>
        <p>
            file extesnsion : {{$fileExtension}}</p>
        <input type="hidden" name="file" value="{{$fileName}}">
        <div class="buttons">
            <input type="submit" name="opType" value="encrypt">
            <input type="submit" name="opType" value="decrypt">
        </div>
    </form>
</body>

</html>