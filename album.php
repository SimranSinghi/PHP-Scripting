<!DOCTYPE html>
<html>
<head>
<h1 style="color:black;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; text-align: center; ">SIMRAN SINGHI:PROJECT4:WDM</h1>
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">
    <title></title>
</head>
<body>
<form style="background-color:cornflowerblue; border: 5px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;border-radius: 10px;" action="album.php" method="POST" enctype="multipart/form-data">
     <input type="file" name="file">
     <button type="submit" name="submit">UPLOAD A FILE</button>
</form> 
<div>
  <h2 style="color:black;"  name="IS">--IMAGE SECTION--</h2>
  <img style="height: 300px; width: 300px" id="displayImg" src="images\6178aec164f6c7.82676252.png">
  
</div>   
<style>
      <!-- /* Always set the map height explicitly to define the size of the div -->
       <!-- * element that contains the map. */ -->
      
      body{
        background-image: url('image2.jpg');
      }
      a:link {
  color: red;
}

a:visited {
  color: green;
}

a:hover {
  color: hotpink;
}

a:active {
  color:blue;
}
  </style>
</body>
</html>

<?php
if (isset($_POST['submit'])){
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'jfif');

    if (in_array($fileActualExt, $allowed)){
        if ($fileError ===0) {
            if ($fileSize < 1000000) {
                $NewFileName = uniqid('', true).".".$fileActualExt;
                $FileDestination = 'images/'.$NewFileName;
                echo "Upload Successful!";
                move_uploaded_file($fileTmpName, $FileDestination);

                header(("Location: album.php?uploadsuccess"));
                
            } else {
                echo "File is too large!";
            }
        } else {
            echo "Erro uploading file!";
        }
    } else {
        echo "You cannot upload file of this type!";
    }
}

$folder = "images";
$files = scandir($folder);
$imagesarray =array();
$ulist = "<h2>Images List: click on the below names to change images </h2> <br>";
$ulist .= "<ul>";
foreach ($files as $file) {
    if ($file != "." && $file !="..") {
        array_push($imagesarray,$file);
        $basename = basename($file);
        $ulist .= "<li > <a  onclick='myFunction(this)'>$file</a> </li>";
      
    }
  }

  $ulist .= "</ul>";
  echo $ulist;

?>


<script type="text/javascript">

  function myFunction(fileName){
    let format = 'images/'
    console.log("--->",format.concat(fileName.innerHTML))
    document.getElementById("displayImg").src = format.concat(fileName.innerHTML)
  }

</script>