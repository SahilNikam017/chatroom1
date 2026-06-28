<?php

session_start();

require_once("users.php");

//======================================
// CHECK IF FORM SUBMITTED
//======================================

if($_SERVER["REQUEST_METHOD"] != "POST")
{
    header("Location: index.php");
    exit();
}

$username = trim($_POST["username"]);
$password = trim($_POST["password"]);

if(isset($users[$username]))
{
    if($users[$username] == $password)
    {
        $_SESSION["username"] = $username;

        header("Location: chat.php");
        exit();
    }
}

echo "<script>

alert('Invalid Username or Password');

window.location='index.php';

</script>";

?>