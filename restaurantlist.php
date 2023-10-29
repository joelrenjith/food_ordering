<!-- <?php
// // Database connection parameters

// require 'connection.php';
// $conn1 = Connect();


// // Check the connection
// if ($conn1->connect_error) {
//     die("Connection failed: " . $conn1->connect_error);
// }

// // Assuming you have a manager's username
// $manager_username = $_SESSION['login_user1'];

// // SQL query to retrieve restaurants owned by the manager
// $sql = "SELECT name FROM restaurants WHERE M_ID = ?";
// $stmt = $conn1->prepare($sql);
// $stmt->bind_param("s", $manager_username);
// $stmt->execute();
// $result = $stmt->get_result();

// // Check if there are any restaurants owned by the manager
// if ($result->num_rows > 0) {
//     echo "<table border='1'>";
//     echo "<tr><th>Restaurant Name</th><tr>";
    
//     while ($row = $result->fetch_assoc()) {
//         echo "<tr><td>" . $row["name"] . "</td></tr>";
//     }
    
//     echo "</table>";
// } else {
//     echo "No restaurants found for this manager.";
// }

// // Close the database connection

// ?> -->




<?php
include('session_m.php');
// require 'connection.php';
// $conn1 = Connect();

// if ($conn1->connect_error) {
//     die("Connection failed: " . $conn1->connect_error);

if(!isset($login_session)){
header('Location: managerlogin.php'); // Redirecting To Home Page
}

?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

<html>

  <head>
    <title> Manager Login | HungryCampus </title>
  </head>

  <link rel="stylesheet" type = "text/css" href ="css/myrestaurant.css">
  <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>

  <body>


    <button onclick="topFunction()" id="myBtn" title="Go to top">
      <span class="glyphicon glyphicon-chevron-up"></span>
    </button>
  
    <script type="text/javascript">
      window.onscroll = function()
      {
        scrollFunction()
      };

      function scrollFunction(){
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          document.getElementById("myBtn").style.display = "block";
        } else {
          document.getElementById("myBtn").style.display = "none";
        }
      }

      function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
    </script>

    <nav class="navbar navbar-inverse navbar-fixed-top navigation-clean-search" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">HungryCampus</a>
        </div>

        <div class="collapse navbar-collapse " id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="dashboard.php">About</a></li>
            <li><a href="contactus.php">Contact Us</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $login_session; ?> </a></li>
            <li class="active"> <a href="managerlogin.php">MANAGER CONTROL PANEL</a></li>
            <li><a href="logout_m.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
          </ul>
        </div>

      </div>
    </nav>




<div class="container">
    <div class="jumbotron">
     <h1>Hello Manager! </h1>
     <p>Manage all your restaurant from here</p>

    </div>
    </div>
<div class="container">
    <div class="container">
    	<div class="col">
    		
    	</div>
    </div>

    
    	<div class="col-xs-3" style="text-align: center;">

    	<div class="list-group">
    		<a href="myrestaurant.php" class="list-group-item active">Add New Restaurant</a>
        <a href="restaurantlist.php" class="list-group-item ">Your Restaurants</a>
    		<a href="view_food_items.php" class="list-group-item ">View Food Items</a>
    		<a href="add_food_items.php" class="list-group-item ">Add Food Items</a>
    		<a href="edit_food_items.php" class="list-group-item ">Edit Food Items</a>
    		<a href="delete_food_items.php" class="list-group-item ">Delete Food Items</a>
    	</div>
    </div>

    


    
    <div class="col-xs-9">
      <div class="form-area" style="padding: 0px 100px 100px 100px;">
      <?php
// Database connection parameters

require_once 'connection.php';
$conn1 = Connect();


// Check the connection
if ($conn1->connect_error) {
    die("Connection failed: " . $conn1->connect_error);
}

// Assuming you have a manager's username
$manager_username = $_SESSION['login_user1'];

// SQL query to retrieve restaurants owned by the manager
$sql = "SELECT name FROM restaurants WHERE M_ID = ?";
$stmt = $conn1->prepare($sql);
$stmt->bind_param("s", $manager_username);
$stmt->execute();
$result = $stmt->get_result();

// Check if there are any restaurants owned by the manager
// if ($result->num_rows > 0) {
//     echo "<table border='1'>";
//     echo "<tr><th>Restaurant Name</th><tr>";
    
//     while ($row = $result->fetch_assoc()) {
//         echo "<tr><td>" . $row["name"] . "</td></tr>";
//     }
    
//     echo "</table>";
// } else {
//     echo "No restaurants found for this manager.";
// }
if ($result->num_rows > 0) {
    echo '<table class="table table-striped table-bordered">';
    echo '<thead><tr><th>Restaurant Name</th></tr></thead>';
    echo '<tbody>';
    
    while ($row = $result->fetch_assoc()) {
        echo '<tr><td>' . $row['name'] . '</td></tr>';
    }
    
    echo '</tbody>';
    echo '</table>';
} else {
    echo 'No restaurants found for this manager.';
}


// Close the database connection

?>

        

        
        </div>
      
    </div>
</div>

  </body>
</html>