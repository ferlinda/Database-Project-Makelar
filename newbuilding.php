<!DOCTYPE html>

<html>
<title>Makelar Administrator</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
.w3-row-padding img {margin-bottom: 12px}
/* Set the width of the sidebar to 120px */
.w3-sidebar {width: 120px;background: #222;}
/* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
#main {margin-left: 120px}
/* Remove margins from "page content" on small screens */
@media only screen and (max-width: 600px) {#main {margin-left: 0}}
</style>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
  text-align: left;
}
table#t01 {
  width: 100%;    
  background-color: #f1f1c1;
}
</style>
<body class="w3-black">

<!-- Icon Bar (Sidebar - hidden on small screens) -->
<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
  <!-- Avatar image in top left corner -->
  <img src="/Makelar/img/broker.png" style="width:100%">
  <a href="/Makelar/admin.php" class="w3-bar-item w3-button w3-padding-large w3-black">
    <i class="fa fa-home w3-xxlarge"></i>
    <p>HOME</p>
  </a>
  <a href="/Makelar/admin.php#newowner" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-user w3-xxlarge"></i>
    <p>ADD OWNER</p>
  </a>
  <a href="/Makelar/newbuilding.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-eye w3-xxlarge"></i>
    <p>ADD BUILDING</p>
  </a>
  <a href="/Makelar/showdb.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-envelope w3-xxlarge"></i>
    <p>FULL DATABASE</p>
  </a>
  <a href="/Makelar/delete.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-envelope w3-xxlarge"></i>
    <p>DELETE OCCUPANCY</p>
  </a>
</nav>

<!-- Navbar on small screens (Hidden on medium and large screens) -->
<div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
  <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
    <a href="/Makelar/admin.php" class="w3-bar-item w3-button" style="width:25% !important">HOME</a>
    <a href="/Makelar/admin.php#newowner" class="w3-bar-item w3-button" style="width:25% !important">ADD OWNER</a>
    <a href="/Makelar/newbuilding.php" class="w3-bar-item w3-button" style="width:25% !important">ADD BUILDING</a>
    <a href="/Makelar/showdb.php" class="w3-bar-item w3-button" style="width:25% !important">FULL DATABASE</a>
    <a href="/Makelar/delete.php" class="w3-bar-item w3-button" style="width:25% !important">DELETE OCCUPANCY</a>
  </div>
</div>

  <!-- New Building Section -->
  <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="newowner">
    <h2 class="w3-text-light-grey">New Building</h2>
    <?php
      $db = pg_connect("host=localhost port=5432 dbname=your-db-name user=your-username password=your-password");
      $result = pg_query($db, "select ownerid,name from buildingowner");

      $i = 0;
      echo '<table id="t01"><tr>';
      while ($i < pg_num_fields($result))
      {
        $fieldName = pg_field_name($result, $i);
        echo '<td><b>' . $fieldName . '<b></td>';
        $i = $i + 1;
      }
      echo '</tr>';
      $i = 0;

      while ($row = pg_fetch_row($result)) 
      {
        echo '<tr>';
        $count = count($row);
        $y = 0;
        while ($y < $count)
        {
          $c_row = current($row);
          echo '<td>' . $c_row . '</td>';
          next($row);
          $y = $y + 1;
        }
        echo '</tr>';
        $i = $i + 1;
      }
      pg_free_result($result);

      echo '</table></tr>';?>
    <hr style="width:200px" class="w3-opacity">
    <form name="building" action="" method="POST" >
      <h1>Name:</h1><h1><input type="text" name="name" /></h1>
      <h1>Owner ID:</h1><h1><input type="int" name="ownerid" /></h1>
      <h1>Price:</h1><h1><input type="text" name="price" /></h1>
      <input type="submit" name="submit_1" value="Submit" class="button_active" onclick="location.href='/Makelar/admin.php#newowner';"/>
    </form>
    </div>
<!-- END PAGE CONTENT -->

</body>
</html>

<!-- PHP Insert Value -->

<?php
if (isset($_POST['submit_1'])){
  $db = pg_connect("host=localhost port=5432 dbname=your-db-name user=your-username password=your-password");
  $result = pg_query($db, "INSERT INTO building VALUES (DEFAULT,'$_POST[name]',
  '$_POST[ownerid]','$_POST[price]','Unoccupied')");
  }
