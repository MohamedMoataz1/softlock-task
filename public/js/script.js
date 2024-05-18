function fileDetailsDisplay(input) {
    let file = input.files[0];
    let name = file.name.split('.')
    let detailsDiv = document.getElementsByClassName('details')[0];
    detailsDiv.style.display = "block";
    document.getElementById('file-name').innerHTML = "file name: " + name[0];
    document.getElementById('file-size').innerHTML = "file size : " + file.size + " bytes    ";
    document.getElementById('file-extension').innerHTML = "file extension : " + "." + name[1];


}