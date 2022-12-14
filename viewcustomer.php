<?php include('adminheader.php'); ?>
<div class="w3-content" style="max-width:1100px">
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-12 mt-4">
                <?php
                include "config.php"; //load in any variables
                $DBC = mysqli_connect("127.0.0.1", DBUSER, DBPASSWORD, DBDATABASE);

                //insert DB code from here onwards
                //check if the connection was good
                if (mysqli_connect_errno()) {
                    echo "Error: Unable to connect to MySQL. " . mysqli_connect_error();
                    exit; //stop processing the page further
                }

                //do some simple validation to check if id exists
                $id = $_GET['id'];
                if (empty($id) or !is_numeric($id)) {
                    echo "<h2>Invalid customerID</h2>"; //simple error feedback
                    exit;
                }

                //prepare a query and send it to the server
                //NOTE for simplicity purposes ONLY we are not using prepared queries
                //make sure you ALWAYS use prepared queries when creating custom SQL like below
                $query = 'SELECT * FROM customer WHERE customerid=' . $id;
                $result = mysqli_query($DBC, $query);
                $rowcount = mysqli_num_rows($result);
                ?>
                <h1>Customer Details View</h1>
                <ul>
                    <li><a href="registercustomer.php">Create New Customer</a></li>
                    <li><a href="admin.php">Home</a></li>

                </ul>
                <?php

                //makes sure we have the customer
                if ($rowcount > 0) {
                    echo "<fieldset><legend>customer detail #$id</legend><dl>";
                    $row = mysqli_fetch_assoc($result);
                    echo "<dt>Name:</dt><dd>" . $row['firstname'] . "</dd>" . PHP_EOL;
                    echo "<dt>Lastname:</dt><dd>" . $row['lastname'] . "</dd>" . PHP_EOL;
                    echo "<dt>Email:</dt><dd>" . $row['email'] . "</dd>" . PHP_EOL;
                    echo "<dt>Password:</dt><dd>" . $row['password'] . "</dd>" . PHP_EOL;
                    echo '</dl></fieldset>' . PHP_EOL;
                } else echo "<h2>No customer found!</h2>"; //suitable feedback

                mysqli_free_result($result); //free any memory used by the query
                mysqli_close($DBC); //close the connection once done
                ?>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-32">
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">Ongaonga Bed & Breakfast</a></p>
</footer>

</body>

</html>