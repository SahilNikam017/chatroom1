<?php
session_start();

// If already logged in, go directly to chat
if(isset($_SESSION["username"]))
{
    header("Location: chat.php");
    exit();
}
?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>Sakura Messenger</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="background">

    <div class="loginBox">

        <h1>Sakura Messenger</h1>

        <p class="subtitle">
            LAN Based Chat System
        </p>

        <form
            id="loginForm"
            action="login.php"
            method="POST">

            <input
                type="text"
                name="username"
                placeholder="Username"
                required>

            <input
                type="password"
                name="password"
                placeholder="Password"
                required>

            <button type="submit">

                Login

            </button>

        </form>

        <div id="loginMessage">

        </div>

        <div class="demo">

            <h3>Demo Credentials</h3>

            <table>

                <tr>

                    <th>Username</th>

                    <th>Password</th>

                </tr>

                <tr>

                    <td>Demo1</td>

                    <td>1234567890</td>

                </tr>

                <tr>

                    <td>Demo2</td>

                    <td>1234567890</td>

                </tr>

            </table>

        </div>

    </div>

</div>

<script src="script.js"></script>

</body>

</html>