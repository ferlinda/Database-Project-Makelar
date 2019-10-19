<!DOCTYPE html>

<html>
<title>Agoda Side</title>
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
  <a href="/Makelar/agoda.php" class="w3-bar-item w3-button w3-padding-large w3-black">
    <i class="fa fa-home w3-xxlarge"></i>
    <p>HOME</p>
  </a>
  <a href="/Makelar/agoda.php#PersonalData" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-user w3-xxlarge"></i>
    <p>REGISTER</p>
  </a>
  <a href="/Makelar/agodachoose.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-eye w3-xxlarge"></i>
    <p>BOOK</p>
  </a>
</nav>

<!-- Navbar on small screens (Hidden on medium and large screens) -->
<div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
  <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
    <a href="/Makelar/agoda.php" class="w3-bar-item w3-button" style="width:25% !important">HOME</a>
    <a href="/Makelar/agoda.php#PersonalData" class="w3-bar-item w3-button" style="width:25% !important">BOOK</a>
    <a href="/Makelar/agodachoose.php" class="w3-bar-item w3-button" style="width:25% !important">CHOOSE</a>
  </div>
</div>

  <!-- Property Choices Section -->
  <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="choose">
    <h2 class="w3-text-light-grey">Property Choices</h2>
<!-- PHP Table Interface -->
    <?php
    $db = pg_connect("host=localhost port=5432 dbname=your-db-name user=your-username password=your-password");
    $result = pg_query($db, "select buildingid,name,price from building where status='Unoccupied'
    ORDER BY buildingid asc;");

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
    <form name="property" action="" method="POST" >
      <h1>Registered Phone Number:</h1><h1><input type="int" name="contact" /></h1>
      <h1>Building:</h1><h1><input type="int" name="buildingid" /></h1>
      <h1>Start Date (YYYY/MM/DD):</h1><h1><input type="text" name="startdate" /></h1>
      <h1>End Date (YYYY/MM/DD):</h1><h1><input type="text" name="enddate" /></h1>
      <input type="submit" name="submit_2" value="Submit" class="button_active" onclick="location.href='/Makelar/agodastatus.php';"/>
    </form>
    </div> 
<!-- END PAGE CONTENT -->

</body>
</html>

<!-- PHP Insert Value -->

<?php
if(isset($_POST['submit_2'])){
  $db = pg_connect("host=localhost port=5432 dbname=your-db-name user=your-username password=your-password");
  $result = pg_query($db, "INSERT INTO makelar VALUES (DEFAULT,'$_POST[buildingid]',
  '$_POST[contact]','$_POST[startdate]','$_POST[enddate]','1')");
  $result = pg_query($db, "UPDATE building SET status='Occupied' WHERE buildingid='$_POST[buildingid]'");
  }
?> 
