<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>

    <form action="{{route('uploadPost')}}"  method="post" class="container" enctype="multipart/form-data" >
        @csrf
        
        <input type="file" name="file" onchange="fileDetailsDisplay(this)" class="input" required>
        <div class="details">
            <h1>you Upload File with details</h1>
            <p id='file-name'></p>
            <p id='file-size'></p>
            <p id='file-extension'></p>
            <div class="buttons">
                <input type="submit" name="opType" value="encrypt">
                <input type="submit" name="opType" value="decrypt">
            </div>
        </div>
        

    </form>

</body>

<script src="{{ asset('js/scripts.js') }}"></script>

</html>