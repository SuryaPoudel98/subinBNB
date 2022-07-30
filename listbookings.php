<script>

function searchResultByDate() {
  var searchstr=document.getElementById("check_in_date").value;
  var searchstr1=document.getElementById("check_out_date").value;
    if (searchstr.length == 0) {

      return;
    }
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //take JSON text from the server and convert it to JavaScript objects
        //mbrs will become a two dimensional array of our customers much like 
        //a PHP associative array
        var mbrs = JSON.parse(this.responseText);
        var tbl = document.getElementById("tblBooking"); //find the table in the HTML

        //clear any existing rows from any previous searches
        //if this is not cleared rows will just keep being added
        var rowCount = tbl.rows.length;
        for (var i = 1; i < rowCount; i++) {
          //delete from the top - row 0 is the table header we keep
          tbl.deleteRow(1);
        }

        //populate the table
        //mbrs.length is the size of our array
        for (var i = 0; i < mbrs.length; i++) {
      
          var room_name = mbrs[i]['roomname'];
          var type = mbrs[i]['roomtype'];
          var beds = mbrs[i]['beds'];
       
          //create a table row with three cells  
          tr = tbl.insertRow(-1);
          var tabCell = tr.insertCell(-1);
          tabCell.innerHTML = room_name; //lastname
          var tabCell = tr.insertCell(-1);
          tabCell.innerHTML = type; //firstname      
          var tabCell = tr.insertCell(-1);
          tabCell.innerHTML = beds; //firstname      
              
        }
      }
    }
    //call our php file that will look for a customer or customers matchign the seachstring
    xmlhttp.open("GET", "bookingsearchByDate.php?in=" + searchstr+"&out="+searchstr1, true);
    xmlhttp.send();
  }



  function searchResult(searchstr) {
    if (searchstr.length == 0) {

      return;
    }
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //take JSON text from the server and convert it to JavaScript objects
        //mbrs will become a two dimensional array of our customers much like 
        //a PHP associative array
        var mbrs = JSON.parse(this.responseText);
        var tbl = document.getElementById("tblBookings"); //find the table in the HTML

        //clear any existing rows from any previous searches
        //if this is not cleared rows will just keep being added
        var rowCount = tbl.rows.length;
        for (var i = 1; i < rowCount; i++) {
          //delete from the top - row 0 is the table header we keep
          tbl.deleteRow(1);
        }

        //populate the table
        //mbrs.length is the size of our array
        for (var i = 0; i < mbrs.length; i++) {
          var mbrid = mbrs[i]['id'];
          var room_name = mbrs[i]['room_name'];
          var type = mbrs[i]['type'];
          var beds = mbrs[i]['beds'];
          var check_in_date = mbrs[i]['check_in_date'];
          var check_out_date = mbrs[i]['check_out_date'];
          var contact_number = mbrs[i]['contact_number'];
          var booking_extras = mbrs[i]['booking_extras'];
          var customer_id = mbrs[i]['customer_id'];

          //concatenate our actions urls into a single string
          var urls = '<a href="viewbooking.php?id=' + mbrid + '">[view]</a>';
          urls += '<a href="editbooking.php?id=' + mbrid + '">[edit]</a>';
          urls += '<a href="deletebooking.php?id=' + mbrid + '">[delete]</a>';

          //create a table row with three cells  
          tr = tbl.insertRow(-1);
          var tabCell = tr.insertCell(-1);
          tabCell.innerHTML = room_name; //lastname
          var tabCell = tr.insertCell(-1);
          tabCell.innerHTML = type; //firstname      
          var tabCell = tr.insertCell(-1);
          tabCell.innerHTML = beds; //firstname      
          var tabCell = tr.insertCell(-1);
          tabCell.innerHTML = check_in_date; //firstname      
          var tabCell = tr.insertCell(-1);
          tabCell.innerHTML = check_out_date; //firstname      
          var tabCell = tr.insertCell(-1);
          tabCell.innerHTML = contact_number; //firstname      
          var tabCell = tr.insertCell(-1);
          tabCell.innerHTML = booking_extras; //firstname  
          var tabCell = tr.insertCell(-1);
          tabCell.innerHTML = customer_id; //firstname          
          var tabCell = tr.insertCell(-1);
          tabCell.innerHTML = urls; //action URLS            
        }
      }
    }
    //call our php file that will look for a customer or customers matchign the seachstring
    xmlhttp.open("GET", "bookingsearch.php?sq=" + searchstr, true);
    xmlhttp.send();
  }
</script>
<?php include('adminheader.php'); ?>
<div class="w3-content" style="max-width:1100px">
  <div class="container">
    <div class="row mt-5">
      <div class="col-sm-12 mt-4">
        <h1>Booking List Search by Contact Number</h1>
        <ul>
          <li><a href="addbookings.php">Add New Booking</a></li>
          <li><a href="admin.php">Home</a></li>

        </ul>
        </h2>
        <form class="form-control">
          <label for="contactNumber">Contact Number: </label>
          <input id="contactNumber" class="form-control" type="text" size="30" onkeyup="searchResult(this.value)" onclick="javascript: this.value = ''" placeholder="Start typing a contact number">

        </form>
        <table id="tblBookings" class="table">
          <thead>
            <tr>
              <th>Room Name</th>
              <th>Room Type</th>
              <th>Beds</th>
              <th>Checked In</th>
              <th>Checked Out</th>
              <th>Contact Number</th>
              <th>Booking Extras</th>
              <th>Customer Id</th>

            </tr>
          </thead>



        </table>
      </div>

      <div class="col-sm-12 mt-4">
      <h1>Check Available Room</h1>

        <form class="form-control">
         

            <div class="form-group">

              <p>
                <label for="checkedIn">Checked In: </label>
                <input type="date" class="form-control" id="check_in_date" value="" name="check_in_date">
              </p>
              <p>
                <label for="check_out_date">Checked Out: </label>
                <input type="date" class="form-control" id="check_out_date" value="" name="check_out_date">
              </p>


              <input type="button" name="submit" onclick="searchResultByDate();" value="Search">
            </div>
          </form>
        </form>
        <table id="tblBooking" class="table">
          <thead>
            <tr>
              <th>Room Name</th>
              <th>Room Type</th>
              <th>Beds</th>
              

            </tr>
          </thead>



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