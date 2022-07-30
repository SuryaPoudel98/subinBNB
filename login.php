<!DOCTYPE html>
<html lang="en">

<head>
    <title>Simon & Peter AirBnb Business</title>
    <link rel="icon" href="images/icon.png">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style/style.css">

</head>

<body>

    <div class="mainbody">

        <?php include('header.php'); ?>
        <?php
        //function to clean input but not validate type and content
        function cleanInput($data)
        {
            return htmlspecialchars(stripslashes(trim($data)));
        }

        //the data was sent using a form therefore we use the $_POST instead of $_GET
        //check if we are saving data first by checking if the submit button exists in the array
        if (isset($_POST['submit']) and !empty($_POST['submit']) and ($_POST['submit'] == 'Login')) {
            //if ($_SERVER["REQUEST_METHOD"] == "POST") { //alternative simpler POST test    
            include "config.php"; //load in any variables
            $DBC = mysqli_connect("127.0.0.1", DBUSER, DBPASSWORD, DBDATABASE);

            if (mysqli_connect_errno()) {
                echo "Error: Unable to connect to MySQL. " . mysqli_connect_error();
                exit; //stop processing the page further
            };


            //email
            $email = cleanInput($_POST['email']);

            //password    
            $password = cleanInput($_POST['password']);
            $error = 0;
            //save the customer data if the error flag is still clear
            if ($error == 0) {


                $query = "SELECT * FROM customer WHERE email='" . $email . "' and password='" . $password . "'";
              
                $result = mysqli_query($DBC, $query);
                $rowcount = mysqli_num_rows($result);

                if ($rowcount > 0) {
                    header('Location: admin.php');
                }
            } else {
                echo "<h2>$msg</h2>" . PHP_EOL;
            }
            mysqli_close($DBC); //close the connection once done
        }
        ?>


        <div class="">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">

                    </div>
                    <div class="col-sm-4">
                        <form method="POST" action="login.php">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                            </div>
                            <div class="form-group form-check">

                            </div>
                            <input type="submit" name="submit" value="Login">
                        </form>
                    </div>
                    <div class="col-sm-4">

                    </div>
                </div>

            </div>
        </div>



        <?php include('footer.php'); ?>


    </div>
</body>

</html>