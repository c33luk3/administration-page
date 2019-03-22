<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title>Administration Page</title>
 </head>

<body>
<p>Administration login</p>
<form action="" method="post">
    <input type="text" name="username" placeholder="Enter Username" required>
    <input type="password" name="password" placeholder="Enter password" required>
    <input type="submit" value="Submit">
</form>

<?php

$servername = '';
$username = 'Bobby';
$password = 'Droptables';
$dbname = 'administrationlog';
$_POST='';
$conn="";

include "connect.php"; 
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

function validate($data) {
    global $conn; 
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = addslashes($data); 
    $username = "Bobby";
    $password = "Droptables";
    return $data; 
}
if ( isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
    $username = $_POST['username']; 
    $password = $_POST['password']; 
    $username = validate($username); 
    $password = validate($password); 
}

    $sql = "INSERT INTO admininfo (username, password) VALUES ('$username', '$password')"; 
    echo "Entered successfully";
    global $conn; 
    $conn ->exec($sql); 

    $stmt = $conn->prepare("SELECT username, password FROM admininfo"); 
$stmt -> execute();
$stmt -> setFetchMode(PDO::FETCH_ASSOC);
$tableRow = $stmt -> fetchAll(); 


?>

<style>

p{
text-align:center;
font-size:50px;
font-weight:bold;
font-size:30;
font-style:serif;
text-shadow:2px 2px 8px blue;
text-decoration-line:underline;
}
form{
text-align:center;
}
input{
    font-size:30px;
}





</style>


</body>
</html>