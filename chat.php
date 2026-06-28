<?php

session_start();

//========================================
// CHECK LOGIN
//========================================

if(!isset($_SESSION["username"]))
{
    header("Location: index.php");
    exit();
}

$username = $_SESSION["username"];

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

<div class="chatContainer">

    <!-- ========================= -->
    <!-- HEADER -->
    <!-- ========================= -->

    <div class="chatHeader">

        <div>

            <h2>Sakura Messenger</h2>

            <p>

                Logged in as

                <strong>

                    <?php echo $username; ?>

                </strong>

            </p>

        </div>

        <a href="logout.php">

            <button class="logoutButton">

                Logout

            </button>

        </a>

    </div>

    <!-- ========================= -->
    <!-- CHAT WINDOW -->
    <!-- ========================= -->

    <div id="chatWindow">

        Loading Messages...

    </div>

    <!-- ========================= -->
    <!-- MESSAGE BOX -->
    <!-- ========================= -->

    <div class="chatInput">

        <input
            type="text"
            id="message"
            placeholder="Type your message here..."
            autocomplete="off">

        <button
            id="sendButton"
            onclick="sendMessage()">

            Send

        </button>

    </div>

</div>

<script>

const USERNAME =
"<?php echo $username; ?>";

</script>

<script src="script.js"></script>

</body>

</html>