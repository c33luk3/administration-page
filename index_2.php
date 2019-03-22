<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Echo session variables that were set on previous page
echo "admin is " . $_SESSION["Bobby"] . ".<br>";
echo "Password is " . $_SESSION["Droptables"] . ".";
?>

</body>
</html>