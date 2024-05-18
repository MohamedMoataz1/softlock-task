<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .input {
            padding: 20px 10px;
            border-radius: 10px;
            border: 2px solid grey;
            /* width: 60%; */
            cursor: pointer;

        }
        

        .input-holder {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 20px;
        }

        .submit {
            padding: 10px 15px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        .container {
            height: 100vh;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .buttons {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            gap: 10px;
        }

        .buttons input {
            padding: 10px 15px;
            cursor: pointer;
            border: none;
            border-radius: 10px;
            background-color: blue;
            color: aliceblue;
        }

        .details {
            display: none;
        }

        .confirmation {
            display: none;
        }
    </style>
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

<script>
    function fileDetailsDisplay(input) {
        let file = input.files[0];
        let name = file.name.split('.')
        let detailsDiv = document.getElementsByClassName('details')[0];
        detailsDiv.style.display = "block";
        document.getElementById('file-name').innerHTML = "file name: " + name[0];
        document.getElementById('file-size').innerHTML = "file size : " + file.size + " bytes    ";
        document.getElementById('file-extension').innerHTML = "file extension : " + "." + name[1];


    }

    function confirmation() {

        let confirmationSection = document.getElementsByClassName(confirmation)[0];
        confirmationSection.style.display = "block";
    }
</script>

</html>