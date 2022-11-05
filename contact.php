<?php

    // Sends form details to the specified email for review, then redirects the user.
    if (isset($_POST['submit'])) {
        $msg = "Name: " . $_POST['name'] . "\nEmail: " . md5($_POST['email']) . "\nDate: " . date("Y-m-d") . "\nComments: " . $_POST['comments'];
        $msg .= "\n---------------------------------------------------\n";
        $msg = wordwrap($msg,60);
        // Appends the feedback to the file, and also locks it so that one change is made at a time.
        file_put_contents("feedback.txt", $msg, FILE_APPEND | LOCK_EX);
        header("Location: contacted.html");
    }

?>
<!DOCTYPE HTML>
<html>

<head>
    <link rel = "stylesheet" href = "default.css" type = "text/css" />
    <link rel="icon" href="http://stocktoolz.infinityfreeapp.com/thumbnail.jpg" type="image/x-icon" />
</head>

<body>

    <!-- Background gradient -->
    <div class = "gradient">

        <h1>StockToolz</h1>

        <ul>
        <li><a href = "index.php">Back</a></li>
        </ul>
        <br>

        <div class = "mainArea">

            <form method = "POST" action = "">

                <label for = "name">Name: </label><br>
                <input type = "text" id = "name" name = "name" style = "width : 20%;" placeholder = "Optional"><br><br>
                <label for = "email">Email: </label><br>
                <input type = "email" id = "email" name = "email" style = "width : 25%;" placeholder = "Optional"><br><br>
                <label for = "comments">Comments: </label><br>
                <textarea id = "comments" name = "comments" rows = "5" cols = "50" required></textarea>
            
                <br><br>
                <button type = "submit" name = "submit">Submit</button>

            </form>
            

        </div>

    </div> <!-- Background gradient -->

</body>

</html>