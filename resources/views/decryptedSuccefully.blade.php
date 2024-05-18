<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" action="{{route('downloadfile')}}" class="container">
        @csrf
        <h3>File "{{$fileName}}" decrypted successfully</h3>
        <input type="hidden" name="decryptedFileName" value="{{$decryptedFileName}}">
        <input type="submit" name="EncOrDec" value="Download decrypted File">

    </form>
</body>

</html>