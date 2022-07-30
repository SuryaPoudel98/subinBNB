<!DOCTYPE html>
<html>

<head>
  <title>Amin Panel</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <style>
    body {
      font-family: "Times New Roman", Georgia, Serif;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-family: "Playfair Display";
      letter-spacing: 5px;
    }

    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
    }

    li {
      float: left;
    }

    li a {
      display: block;
      padding: 8px;
      background-color: #dddddd;
    }
  </style>
</head>

<body>

  <!-- Navbar (sit on top) -->
  <div class="w3-top">
    <div class="w3-bar w3-white w3-padding w3-card" style="letter-spacing:4px;">
      <a href="#home" class="w3-bar-item w3-button">Admin Panel</a>
      <!-- Right-sided navbar links. Hide them on small screens -->
      <div class="w3-right w3-hide-small">
        <a href="admin.php" class="w3-bar-item w3-button">Home</a>
        <a href="" class="w3-bar-item w3-button">Rooms</a>
        <a href="#contact" class="w3-bar-item w3-button">Customer</a>
        <a href="#contact" class="w3-bar-item w3-button">Bookings</a>
      </div>
    </div>
  </div>



  <!-- Page content -->
  <div class="w3-content" style="max-width:1100px">
    <div class="container">
      <div class="row mt-5">
        <div class="col-sm-12 mt-5">
          <?php
          //function to clean input but not validate type and content
          function cleanInput($data)
          {
            return htmlspecialchars(stripslashes(trim($data)));
          }

          //the data was sent using a formtherefore we use the $_POST instead of $_GET
          //check if we are saving data first by checking if the submit button exists in the array
          if (isset($_POST['submit']) and !empty($_POST['submit']) and ($_POST['submit'] == 'Add')) {
            //if ($_SERVER["REQUEST_METHOD"] == "POST") { //alternative simpler POST test    
            include "config.php"; //load in any variables
            $DBC = mysqli_connect("127.0.0.1", DBUSER, DBPASSWORD, DBDATABASE);

            if (mysqli_connect_errno()) {
              echo "Error: Unable to connect to MySQL. " . mysqli_connect_error();
              exit; //stop processing the page further
            };

            //validate incoming data - only the first field is done for you in this example - rest is up to you do
            //roomname
            $error = 0; //clear our error flag
            $msg = 'Error: ';
            if (isset($_POST['roomname']) and !empty($_POST['roomname']) and is_string($_POST['roomname'])) {
              $fn = cleanInput($_POST['roomname']);
              $roomname = (strlen($fn) > 50) ? substr($fn, 1, 50) : $fn; //check length and clip if too big
              //we would also do context checking here for contents, etc       
            } else {
              $error++; //bump the error flag
              $msg .= 'Invalid roomname '; //append eror message
              $roomname = '';
            }

            //description
            $description = cleanInput($_POST['description']);
            //roomtype
            $roomtype = cleanInput($_POST['roomtype']);
            //beds    
            $beds = cleanInput($_POST['beds']);

            //save the room data if the error flag is still clear
            if ($error == 0) {
              $query = "INSERT INTO room (roomname,description,roomtype,beds) VALUES (?,?,?,?)";
              $stmt = mysqli_prepare($DBC, $query); //prepare the query
              mysqli_stmt_bind_param($stmt, 'sssd', $roomname, $description, $roomtype, $beds);
              mysqli_stmt_execute($stmt);
              mysqli_stmt_close($stmt);
              echo "<h2>New room added to the list</h2>";
            } else {
              echo "<h2>$msg</h2>" . PHP_EOL;
            }
            mysqli_close($DBC); //close the connection once done
          }
          ?>
          <h1>Add a new room</h1>
          <ul>
            <li><a href="admin.php">List Rooms</a></li>
            <li><a href="admin.php">Home</a></li>

          </ul>
          <form method="POST" action="addroom.php">
            <div class="form-group">
              <p>
                <label for="roomname">Room name: </label>
                <input type="text" class="form-control" id="roomname" name="roomname" minlength="5" maxlength="50" required>
              </p>
              <p>
                <label for="description">Description: </label>
                <input type="text" class="form-control" id="description" size="100" name="description" minlength="5" maxlength="200" required>
              </p>
              <p>
                <label for="roomtype">Room type: </label>
                <input type="radio" id="roomtype" name="roomtype" value="S"> Single
                <input type="radio" id="roomtype" name="roomtype" value="D" Checked> Double
              </p>
              <p>
                <label for="beds">Beds (1-5): </label>
                <input type="number" class="form-control" id="beds" name="beds" min="1" max="5" value="1" required>
              </p>

              <input type="submit" name="submit" value="Add">
            </div>
          </form>
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