<script>
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
        var tbl = document.getElementById("tblcustomers"); //find the table in the HTML

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
          var mbrid = mbrs[i]['customerID'];
          var fn = mbrs[i]['firstname'];
          var ln = mbrs[i]['lastname'];

          //concatenate our actions urls into a single string
          var urls = '<a href="viewcustomer.php?id=' + mbrid + '">[view]</a>';
          urls += '<a href="editcustomer.php?id=' + mbrid + '">[edit]</a>';
          urls += '<a href="deletecustomer.php?id=' + mbrid + '">[delete]</a>';

          //create a table row with three cells  
          tr = tbl.insertRow(-1);
          var tabCell = tr.insertCell(-1);
          tabCell.innerHTML = ln; //lastname
          var tabCell = tr.insertCell(-1);
          tabCell.innerHTML = fn; //firstname      
          var tabCell = tr.insertCell(-1);
          tabCell.innerHTML = urls; //action URLS            
        }
      }
    }
    //call our php file that will look for a customer or customers matchign the seachstring
    xmlhttp.open("GET", "customersearch.php?sq=" + searchstr, true);
    xmlhttp.send();
  }
</script>
<?php include('adminheader.php'); ?>
<div class="w3-content" style="max-width:1100px">
  <div class="container">
    <div class="row mt-5">
      <div class="col-sm-12 mt-4">
        <h1>Customer List Search by Lastname</h1>
        <ul>
              <li><a href="registercustomer.php">Create New Customer</a></li>
              <li><a href="admin.php">Home</a></li>

            </ul>
        </h2>
        <form class="form-control">
          <label for="lastname">Lastname: </label>
          <input id="lastname" class="form-control" type="text" size="30" onkeyup="searchResult(this.value)" onclick="javascript: this.value = ''" placeholder="Start typing a last name">

        </form>
        <table id="tblcustomers" class="table">
          <thead>
            <tr>
              <th>Lastname</th>
              <th>Firstname</th>
              <th>actions</th>
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