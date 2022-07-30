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
        <a href="admin.php" class="w3-bar-item w3-button">Rooms</a>
        <a href="listcustomers.php" class="w3-bar-item w3-button">Customer</a>
        <a href="listbookings.php" class="w3-bar-item w3-button">Bookings</a>
      </div>
    </div>
  </div>

