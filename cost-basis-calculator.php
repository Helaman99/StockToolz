<!DOCTYPE HTML>
<html>
    <head>
        <!-- Keeps track of what number row we are adding (if any) -->
        <script>var x = 3;</script>

        <link rel = "stylesheet" href = "default.css" type = "text/css" />
        <link rel="icon" href="http://stocktoolz.infinityfreeapp.com/thumbnail.jpg" type="image/x-icon" />
    </head>
    <body>

        <!-- Background gradient -->
        <div class = "gradient">

        <h1>StockToolz - Cost Basis Per Share Calculator</h1>
        
        <ul>
            <li><a href = "index.php">Home</a></li>
            <li><a href = "contact.php">Contact</a></li>
            <li><a href = "about.html">About</a></li>
        </ul>
        <br>

        <div class = "mainArea">
            <p>
                Bought multiple shares at seperate times at different prices?
                Or maybe you sold your position in stages and need to find the
                average price you sold your position at. Whatever your situation,
                this tool will help you find out the cost basis for all your
                shares.
            </p>
            <p>
                For every order, fill out a "Shares" and "Cost" field. If you
                need to add more fields, simply click the "Add Shares" button
                until you have enough fields. Then click "Calculate" when you're
                done to see your Cost Basis per Share!
            </p>
            <p>
                Empty, as well as semi-empty, rows will be skipped!
            </p>
            <h3>As always, thank you for using StockToolz!</h3>

            <button onclick = "addShares(x);x++;">Add Shares</button>
            <br><br>

            <form method = "GET" action = "">

                <table id = "sharesTable">

                    <tr><td><label>Shares: </label><input type = "text" name = "shares1"></td>
                        <td><label>Cost: </label><input type = "text" name = "cost1"></td></tr>

                    <tr><td><label>Shares: </label><input type = "text" name = "shares2"></td>
                        <td><label>Cost: </label><input type = "text" name = "cost2"></td></tr>

                <script>

                    // Every time we click the 'Add Shares' button, we add a row using 'x' to keep track
                    // of the number row we are adding.
                    function addShares(x) {
                        document.getElementById("sharesTable").innerHTML += 
                        "<tr><td><label>Shares: </label><input type = 'text' name = 'shares" + x + "'></td>"
                        + "<td><label>Cost: </label><input type = 'text' name = 'cost" + x + "'></td></tr>";
                    }

                </script>

                </table>

                <br>
                <button name = "submit">Calculate</button>
                <br><br><br>
            
            </form>

            <!-- Calculates the cost basis per share once the 'Calculate' button is pressed -->
            <?php

                if (isset($_GET['submit'])) {

                    $x = 1;
                    $totalShares = 0;
                    $totalCost = 0;
                    $cbps = 0;
                    $flag = 0; // Will signal if a non-numerical is detected

                    // echo $_GET['shares' . $x]; // For testing

                    // Combines all the shares and their cost
                    while (isset($_GET['shares' . $x]) && isset($_GET['cost' . $x])) {
                        // If both fields are filled out
                        if ($_GET['shares' . $x] && $_GET['cost' . $x]) {
                            if (is_numeric($_GET['shares' . $x]) && is_numeric($_GET['cost' . $x])) {
                                $totalShares += $_GET['shares' . $x]; // Share count
                                $totalCost += $_GET['shares' . $x] * $_GET['cost' . $x]; // Shares multiplied by their cost
                                $x++;
                            }
                            else {
                                $flag = 1;
                                break;
                            }
                        }
                        else // Skip this row if one of the fields are emty - Helps prevent errors
                            $x++;
                    }

                    if ($flag == 1) // Error case if a non-numerical is detected.
                        echo "<font color = 'red'>Please enter numbers only. (Decimals are fine)</font>";
                    else if ($totalCost == 0 || $totalShares == 0) // Error case if nothing is filled out all the way.
                        echo "<font color = 'red'>Huh, some rows aren't filled out all the way!</font>";
                    else {
                        // Divide the total cost of all shares by the number of shares and display.
                        $cbps = $totalCost/$totalShares;
                        echo "Cost Basis Per Share: $" . number_format($cbps, 4);
                    }

                }

            ?>

        </div>

        </div> <!-- Background gradient -->

    </body>
</html>