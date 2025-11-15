<?php
require 'config.php';
require 'functions.php';
redirectIfNotLoggedIn();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Chat</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<h2>Welcome, <?php echo $_SESSION['username']; ?></h2>
<a href="logout.php">Logout</a>

<div>
    <h3>Chat Room: General</h3>
    <div id="chatBox" style="border:1px solid #000; height:300px; overflow-y:scroll;"></div>
    <input type="text" id="message" placeholder="Type message">
    <button id="sendBtn">Send</button>
</div>

<script src="assets/js/chat.js"></script>
</body>
</html>
