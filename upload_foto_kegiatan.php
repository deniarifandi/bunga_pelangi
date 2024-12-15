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
    $file = $_FILES['pp1'];
    $originalFileName = basename($file['name']);
    $fileType = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));

    // Generate a randomized file name
    $randomFileNamepp1 = uniqid("pp_", true) . '.' . $fileType;
    $targetFilePath = $uploadDir . $randomFileNamepp1;

    // Allowed file types
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

    // Validate file type
    if (in_array($fileType, $allowedTypes)) {
        // Attempt to move the uploaded file to the target directory
        if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            echo "The file has been uploaded successfully with the name: " . htmlspecialchars($randomFileNamepp1);
        } else {
            echo "Error: There was an error uploading your file.";
        }
    } else {
        $randomFileNamepp1 = $_POST['pp1alt'];
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
    $file = $_FILES['pp2'];
    $originalFileName = basename($file['name']);
    $fileType = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));

    // Generate a randomized file name
    $randomFileNamepp2 = uniqid("pp_", true) . '.' . $fileType;
    $targetFilePath = $uploadDir . $randomFileNamepp2;

    // Allowed file types
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

    // Validate file type
    if (in_array($fileType, $allowedTypes)) {
        // Attempt to move the uploaded file to the target directory
        if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            echo "The file has been uploaded successfully with the name: " . htmlspecialchars($randomFileNamepp2);
        } else {
            echo "Error: There was an error uploading your file.";
        }
    } else {
         $randomFileNamepp2 = $_POST['pp2alt'];
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
    $file = $_FILES['pp3'];
    $originalFileName = basename($file['name']);
    $fileType = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));

    // Generate a randomized file name
    $randomFileNamepp3 = uniqid("pp_", true) . '.' . $fileType;
    $targetFilePath = $uploadDir . $randomFileNamepp3;

    // Allowed file types
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

    // Validate file type
    if (in_array($fileType, $allowedTypes)) {
        // Attempt to move the uploaded file to the target directory
        if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            echo "The file has been uploaded successfully with the name: " . htmlspecialchars($randomFileNamepp3);
        } else {
            echo "Error: There was an error uploading your file.";
        }
    } else {
         $randomFileNamepp3 = $_POST['pp3alt'];
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
        $randomFileName1 = $_POST['photo1alt'];
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
        $randomFileName2 = $_POST['photo2alt'];
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
        $randomFileName3 = $_POST['photo3alt'];
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
    $file = $_FILES['photo4'];
    $originalFileName = basename($file['name']);
    $fileType = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));

    // Generate a randomized file name
    $randomFileName4 = uniqid("photo_", true) . '.' . $fileType;
    $targetFilePath = $uploadDir . $randomFileName4;

    // Allowed file types
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

    // Validate file type
    if (in_array($fileType, $allowedTypes)) {
        // Attempt to move the uploaded file to the target directory
        if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            echo "The file has been uploaded successfully with the name: " . htmlspecialchars($randomFileName4);
        } else {
            echo "Error: There was an error uploading your file.";
        }
    } else {
        $randomFileName4 = $_POST['photo4alt'];
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
    $file = $_FILES['photo5'];
    $originalFileName = basename($file['name']);
    $fileType = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));

    // Generate a randomized file name
    $randomFileName5 = uniqid("photo_", true) . '.' . $fileType;
    $targetFilePath = $uploadDir . $randomFileName5;

    // Allowed file types
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

    // Validate file type
    if (in_array($fileType, $allowedTypes)) {
        // Attempt to move the uploaded file to the target directory
        if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            echo "The file has been uploaded successfully with the name: " . htmlspecialchars($randomFileName5);
        } else {
            echo "Error: There was an error uploading your file.";
        }
    } else {
        $randomFileName5 = $_POST['photo5alt'];
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
    $file = $_FILES['photo6'];
    $originalFileName = basename($file['name']);
    $fileType = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));

    // Generate a randomized file name
    $randomFileName6 = uniqid("photo_", true) . '.' . $fileType;
    $targetFilePath = $uploadDir . $randomFileName6;

    // Allowed file types
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

    // Validate file type
    if (in_array($fileType, $allowedTypes)) {
        // Attempt to move the uploaded file to the target directory
        if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            echo "The file has been uploaded successfully with the name: " . htmlspecialchars($randomFileName6);
        } else {
            echo "Error: There was an error uploading your file.";
        }
    } else {
        $randomFileName6 = $_POST['photo6alt'];
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
    $file = $_FILES['photo7'];
    $originalFileName = basename($file['name']);
    $fileType = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));

    // Generate a randomized file name
    $randomFileName7 = uniqid("photo_", true) . '.' . $fileType;
    $targetFilePath = $uploadDir . $randomFileName7;

    // Allowed file types
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

    // Validate file type
    if (in_array($fileType, $allowedTypes)) {
        // Attempt to move the uploaded file to the target directory
        if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            echo "The file has been uploaded successfully with the name: " . htmlspecialchars($randomFileName7);
        } else {
            echo "Error: There was an error uploading your file.";
        }
    } else {
        $randomFileName7 = $_POST['photo7alt'];
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
    $file = $_FILES['photo8'];
    $originalFileName = basename($file['name']);
    $fileType = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));

    // Generate a randomized file name
    $randomFileName8 = uniqid("photo_", true) . '.' . $fileType;
    $targetFilePath = $uploadDir . $randomFileName8;

    // Allowed file types
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

    // Validate file type
    if (in_array($fileType, $allowedTypes)) {
        // Attempt to move the uploaded file to the target directory
        if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            echo "The file has been uploaded successfully with the name: " . htmlspecialchars($randomFileName8);
        } else {
            echo "Error: There was an error uploading your file.";
        }
    } else {
        $randomFileName8 = $_POST['photo8alt'];
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
    $file = $_FILES['photo9'];
    $originalFileName = basename($file['name']);
    $fileType = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));

    // Generate a randomized file name
    $randomFileName9 = uniqid("photo_", true) . '.' . $fileType;
    $targetFilePath = $uploadDir . $randomFileName9;

    // Allowed file types
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

    // Validate file type
    if (in_array($fileType, $allowedTypes)) {
        // Attempt to move the uploaded file to the target directory
        if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            echo "The file has been uploaded successfully with the name: " . htmlspecialchars($randomFileName9);
        } else {
            echo "Error: There was an error uploading your file.";
        }
    } else {
        $randomFileName9 = $_POST['photo9alt'];
        echo "Error: Only JPG, JPEG, PNG, and GIF files are allowed.";
    }
} else {
    echo "Error: Invalid request.";
}


//////////////UPLOAD PHOOTOOOO

$murid_id = $_POST['murid_id'];

 $sql = "INSERT INTO tabel_foto (
    murid_id,
 	fotoagama1,
    fotoagama2,
    fotoagama3,
    fotojati1,
    fotojati2,
    fotojati3,
    fotoliterasi1,
    fotoliterasi2,
    fotoliterasi3,
    fotopp1,
    fotopp2,
    fotopp3

 	)
 VALUES (
    '$murid_id',
 	'$randomFileName1',
    '$randomFileName2',
    '$randomFileName3',
    '$randomFileName4',
    '$randomFileName5',
    '$randomFileName6',
    '$randomFileName7',
    '$randomFileName8',
    '$randomFileName9',
    '$randomFileNamepp1',
    '$randomFileNamepp2',
    '$randomFileNamepp3'
   
 ) ON DUPLICATE KEY UPDATE
    murid_id  = '$murid_id',
    fotoagama1 = '$randomFileName1',
    fotoagama2 = '$randomFileName2',
    fotoagama3 = '$randomFileName3',
    fotojati1 = '$randomFileName4',
    fotojati2 = '$randomFileName5',
    fotojati3 = '$randomFileName6',
    fotoliterasi1 = '$randomFileName7',
    fotoliterasi2 = '$randomFileName8',
    fotoliterasi3 = '$randomFileName9',
    fotopp1 = '$randomFileNamepp1',
    fotopp2 = '$randomFileNamepp2',
    fotopp3 = '$randomFileNamepp3'
 ";

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
