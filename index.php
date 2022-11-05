<?php

    if (isset($_GET['long']))
        header("Location: trade-planner-long.html");
    else if (isset($_GET['short']))
        header("Location: trade-planner-short.html");
    else if (isset($_GET['profit']))
        header("Location: profit-calculator.html");
    else if (isset($_GET['cbt']))
        header("Location: cost-basis-calculator.php");

?>

<!DOCTYPE HTML>
<html>

<head>
    <link rel = "stylesheet" href = "default.css" type = "text/css" />
    <link rel="icon" href="http://stocktoolz.infinityfreeapp.com/thumbnail.jpg" type="image/x-icon" />
</head>

<body>

    <div class = "gradient">

        <h1>StockToolz</h1>

        <ul>
            <li><a href = "contact.php">Contact</a></li>
            <li><a href = "about.html">About</a></li>
        </ul>
        <br>

        <div class = "mainArea">

            <p>
                Welcome to <b>StockToolz</b>! Your home for lots of quick tools
                to help you make your trades!
            </p>
            <p>
                Found a bug? Or have a great idea for a tool? Click "Contact"
                and let us know!
            </p>
            <br><br>

            <form method = "GET" action = "">

                <button name = "long">Trade Planner (Long)</button>
                <br><br>
                <button name = "short">Trade Planner (Short)</button>
                <br><br>
                <button name = "profit">Profit Calculator</button>
                <br><br>
                <button name = "cbt">Cost Basis Total Calculator</button>

            </form>

        </div>

    </div> <!-- Background gradient -->

    <div class = "disclaimer">
        <p><i>Nothing</i> on this website is intended to be financial advice.
            All calculations do not take into account fees, taxes, or other
            unfortunate things.
        </p>
    </div>

</body>

</html>