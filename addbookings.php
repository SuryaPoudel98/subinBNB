<?php include('adminheader.php'); 
 include "config.php"; //load in any variables
 $DBC = mysqli_connect("127.0.0.1", DBUSER, DBPASSWORD, DBDATABASE);
?>

<!-- Page content -->
<div class="w3-content" style="max-width:1100px">
  <div class="container">
    <div class="row mt-5">
      <div class="col-sm-12 mt-5 mb-5">
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
         

          if (mysqli_connect_errno()) {
            echo "Error: Unable to connect to MySQL. " . mysqli_connect_error();
            exit; //stop processing the page further
          };

          //validate incoming data - only the first field is done for you in this example - rest is up to you do
          //roomname
          $error = 0; //clear our error flag
       
          //description
          $room_name = cleanInput($_POST['room_name']);
          //roomtype
          $type = cleanInput($_POST['roomtype']);
          //beds    
          $beds = cleanInput($_POST['beds']);
          $check_in_date = cleanInput($_POST['check_in_date']);
          $check_out_date = cleanInput($_POST['check_out_date']);
          $contact_number = cleanInput($_POST['contact_number']);
          $booking_extras = cleanInput($_POST['booking_extras']);
          $customer_id = cleanInput($_POST['customer_id']);
          //save the room data if the error flag is still clear
          if ($error == 0) {


            $sql = "INSERT INTO booking (room_name,type,beds,check_in_date,check_out_date,contact_number,booking_extras,customer_id) VALUES ('".$room_name."', '".$type."', '".$beds."', '".$check_in_date."','".$check_out_date."','".$contact_number."','".$booking_extras."','".$booking_extras."')";
            
            if ($DBC->query($sql) === TRUE) {
              echo "New record created successfully";
            } else {
              echo "Error: " . $sql . "<br>" . $DBC->error;
            }

          } else {
            echo "<h2>$msg</h2>" . PHP_EOL;
          }
        //  mysqli_close($DBC); //close the connection once done
        }
        ?>
        <?php
      
        //insert DB code from here onwards
        //check if the connection was good
        if (mysqli_connect_errno()) {
          echo "Error: Unable to connect to MySQL. " . mysqli_connect_error();
          exit; //stop processing the page further
        }

        //prepare a query and send it to the server
        $query = 'SELECT roomID,roomname,roomtype FROM room ORDER BY roomtype';
        $result = mysqli_query($DBC, $query);
        $rowcount = mysqli_num_rows($result);

        $query2 = 'SELECT customerID ,firstname,lastname,email FROM customer';
        $result2 = mysqli_query($DBC, $query2);
        $rowcount2 = mysqli_num_rows($result2);

        ?>

        <h1>Add a new booking</h1>
        <ul>
          <li><a href="listbookings.php">List Booking</a></li>
          <li><a href="admin.php">Home</a></li>

        </ul>
        <form method="POST" action="addbookings.php">
          <div class="form-group">
            <p>
              <label for="roomname">Room name: </label>
              <select class="form-control" name="room_name">
                <option value="">Select Room</option>
                <?php

                //makes sure we have rooms

                while ($row = mysqli_fetch_assoc($result)) {
                  echo '<option value="' . $row['roomname'] . '">' . $row['roomname'] . '</option>';
                }


                mysqli_free_result($result); //free any memory used by the query
              //  mysqli_close($DBC); //close the connection once done
                ?>



              </select>
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
            <p>
              <label for="checkedIn">Checked In: </label>
              <input type="date" class="form-control" id="check_in_date" name="check_in_date">
            </p>
            <p>
              <label for="check_out_date">Checked Out: </label>
              <input type="date" class="form-control" id="check_out_date" name="check_out_date">
            </p>
            <p>
              <label for="contactNumber">Contact Number: </label>
              <input type="number" class="form-control" id="beds" name="contact_number" value="" required>
            </p>
            <p>
              <label for="contactNumber">Extra Bookings: </label>
              <textarea name="booking_extras" class="form-control"></textarea>
            </p>
            <p>
              <label for="roomname">Customer Id </label>
              <select class="form-control" name="customer_id">
                <option value="">Select Customer</option>
                <?php

                //makes sure we have rooms

                while ($row = mysqli_fetch_assoc($result2)) {
                  echo '<option value="' . $row['customerID'] . '">' . $row['customerID'] . '-'.$row['firstname'].' '.$row['lastname'].'-'.$row['email'].'</option>';
                }


                mysqli_free_result($result2); //free any memory used by the query
                mysqli_close($DBC); //close the connection once done
                ?>



              </select>
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