<?php
include('connect.php');

///////////////////PHHOOOTOOO

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Define the upload directory
    $uploadDir = "rapot/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true); // Create the directory if it doesn't exist
    }

    // Get file details
    $file = $_FILES['photo1'];
    $originalFileName = basename($file['name']);
    $fileType = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));

    // Generate a randomized file name
    $randomFileName1 = uniqid("photo_", true) . '.' . $fileType;
    $targetFilePath = $uploadDir . $randomFileName1;

    // Allowed file types
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

    // Validate file type
    if (in_array($fileType, $allowedTypes)) {
        // Attempt to move the uploaded file to the target directory
        if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            echo "The file has been uploaded successfully with the name: " . htmlspecialchars($randomFileName1);
        } else {
            echo "Error: There was an error uploading your file.";
        }
    } else {
        echo "Error: Only JPG, JPEG, PNG, and GIF files are allowed.";
    }
} else {
    echo "Error: Invalid request.";
}


//////////////UPLOAD PHOOTOOOO


///////////////////PHHOOOTOOO

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Define the upload directory
    $uploadDir = "rapot/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true); // Create the directory if it doesn't exist
    }

    // Get file details
    $file = $_FILES['photo2'];
    $originalFileName = basename($file['name']);
    $fileType = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));

    // Generate a randomized file name
    $randomFileName2 = uniqid("photo_", true) . '.' . $fileType;
    $targetFilePath = $uploadDir . $randomFileName2;

    // Allowed file types
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

    // Validate file type
    if (in_array($fileType, $allowedTypes)) {
        // Attempt to move the uploaded file to the target directory
        if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            echo "The file has been uploaded successfully with the name: " . htmlspecialchars($randomFileName2);
        } else {
            echo "Error: There was an error uploading your file.";
        }
    } else {
        echo "Error: Only JPG, JPEG, PNG, and GIF files are allowed.";
    }
} else {
    echo "Error: Invalid request.";
}


//////////////UPLOAD PHOOTOOOO

///////////////////PHHOOOTOOO

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Define the upload directory
    $uploadDir = "rapot/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true); // Create the directory if it doesn't exist
    }

    // Get file details
    $file = $_FILES['photo3'];
    $originalFileName = basename($file['name']);
    $fileType = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));

    // Generate a randomized file name
    $randomFileName3 = uniqid("photo_", true) . '.' . $fileType;
    $targetFilePath = $uploadDir . $randomFileName3;

    // Allowed file types
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

    // Validate file type
    if (in_array($fileType, $allowedTypes)) {
        // Attempt to move the uploaded file to the target directory
        if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            echo "The file has been uploaded successfully with the name: " . htmlspecialchars($randomFileName3);
        } else {
            echo "Error: There was an error uploading your file.";
        }
    } else {
        echo "Error: Only JPG, JPEG, PNG, and GIF files are allowed.";
    }
} else {
    echo "Error: Invalid request.";
}


//////////////UPLOAD PHOOTOOOO


$murid_id = $_POST['murid_id'];
$pp = $_POST['pp'];
$mulok1 = $_POST['mulok1'];
$mulok2 = $_POST['mulok2'];
$mulok3 = $_POST['mulok3'];
$mata = $_POST['mata'];
$telinga = $_POST['telinga'];
$mulut = $_POST['mulut'];
$pakaian = $_POST['pakaian'];
$berat = $_POST['berat'];
$tinggi = $_POST['tinggi'];
$sakit = $_POST['sakit'];
$ijin = $_POST['ijin'];
$alpha = $_POST['alpha'];
$refleksi = $_POST['refleksi'];

 $sql = "INSERT INTO detail_rapot (
 	murid_id,
 	pp,
 	potopp1,
 	potopp2,
 	potopp3,
 	mulok1,
 	mulok2,
 	mulok3,
 	mata,
 	telinga,
 	mulut,
 	pakaian,
 	berat,
 	tinggi,
 	sakit,
 	ijin,
 	alpha,
 	refleksi
 	)
 VALUES (
 	'$murid_id',
 	'$pp',
 	'$randomFileName1',
 	'$randomFileName2',
 	'$randomFileName3',
 	'$mulok1',
 	'$mulok2',
 	'$mulok3',
 	'$mata',
 	'$telinga',
 	'$mulut',
 	'$pakaian',
 	'$berat',
 	'$tinggi',
 	'$sakit',
 	'$ijin',
 	'$alpha',
 	'$refleksi'
 )";

 if ($conn->query($sql) === TRUE) {
  echo "DATA BERHASIL DISIMPAN";

  ?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sukses Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    
      	<a class="btn btn-success" href="index_rapot.php">back</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>





  <?php
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


?>
