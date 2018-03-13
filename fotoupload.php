<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["foto"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Kontrollera om det är en riktig bild
if(isset($_POST['laddauppfoto'])) {
    $check = getimagesize($_FILES['foto']['tmp_name']);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Finns den redan?
if (file_exists($target_file)) {
    echo "Bilden finns redan!.";
    $uploadOk = 0;
}
// Filstorlek
if ($_FILES["foto"]["size"] > 500000) {
    echo "Filen är för stor!";
    $uploadOk = 0;
}
// Tillåt särskilda filformat
if($imageFileType != "jpg" && $imageFileType != "jpeg") {
    echo "Bilden måste vara i formaten JPG eller JPEG";
    $uploadOk = 0;
}
// Kolla om $uploadOk=0 (isåfall har ett fel inträffat)
if ($uploadOk == 0) {
    echo "Din bild kunde inte laddas upp.";
	
// Om allting funkar, ladda upp filen
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Bild ". basename( $_FILES["foto"]["name"]). " är nu uppladdad!";
    } else {
        echo "Din bild kunde tyvärr inte laddas upp.";
    }
}
?> 