<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="2;url=index.html">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>

<?php
    $servername='db';
    $username='root';
    $password='password';
    $dbname = 'mydb';
//    $port='3006'
    $conn=mysqli_connect($servername,$username,$password,$dbname);
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }

//<?php



//$link = mysqli_connect("172.17.0.4", "root", "my-secret-pw");
//echo "$link";
//if (!$link) {
//    echo "Error: Unable to connect to MySQL." . PHP_EOL;
//    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
//    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
//    exit;
//}

//echo "Success: A proper connection to MySQL was made!" . PHP_EOL;
//echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

//mysqli_close($link);



if(isset($_POST['submit']))
{    
     $nom = $_POST['nom'];
     $prenom = $_POST['prenom'];
     $mail = $_POST['email'];
 
     $sql = "INSERT INTO contacts (prenom,nom,mail)
     VALUES ('$prenom','$nom','$mail')";
 
     if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);
}
?>

</body>
