<?php include('adminheader.php');?>

  <!-- Page content -->
  <div class="w3-content" style="max-width:1100px">
    <div class="container">
      <div class="row mt-5">
        <div class="col-sm-12 mt-5">
          <?php
          include "config.php"; //load in any variables
          $DBC = mysqli_connect("127.0.0.1", DBUSER, DBPASSWORD, DBDATABASE);

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
          ?>
          <h1>Room list</h1>
          <ul>
            <li><a href="addroom.php">Add Room</a></li>
            <li><a href="admin.php">Home</a></li>

          </ul>
          <table class="table">
            <thead>
              <tr>
                <th>Room Name</th>
                <th>Type</th>
                <th>Action</th>
              </tr>
            </thead>
            <?php

            //makes sure we have rooms
            if ($rowcount > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['roomID'];
                echo '<tr><td>' . $row['roomname'] . '</td><td>' . $row['roomtype'] . '</td>';
                echo     '<td><a href="viewroom.php?id=' . $id . '">[view]</a>';
                echo         '<a href="editroom.php?id=' . $id . '">[edit]</a>';
                echo         '<a href="deleteroom.php?id=' . $id . '">[delete]</a></td>';
                echo '</tr>' . PHP_EOL;
              }
            } else echo "<h2>No rooms found!</h2>"; //suitable feedback

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