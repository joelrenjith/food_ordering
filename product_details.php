<?php
// Start the session and include the connection file
session_start();
require 'connection.php';
$conn = Connect();

// Check if the user is not logged in, redirect to the login page
if (!isset($_SESSION['login_user2'])) {
    header("location: customerlogin.php");
    exit(); // Ensure script stops execution after redirection
}

// Retrieve the food ID from the query string
if (isset($_GET['food_id'])) {
    $foodId = $_GET['food_id'];

    // Fetch details of the selected food item
    $sql = "call GetFoodDetails($foodId)";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        // Handle case when the specified food ID is not found
        echo "Food not found.";
        exit(); // Stop script execution
    }
} else {
    // Handle case when no food ID is provided in the query string
    echo "Invalid request.";
    exit(); // Stop script execution
}
?>

<html>
<head>
    <title>Product Details | Food HungryCampus</title>
    <!-- Include CSS and JS files -->
    <link rel="stylesheet" type="text/css" href="css/foodlist.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>

<body>
    <!-- Include the navigation bar code from your previous page -->
    <!-- ... (Navigation bar code) ... -->
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
          </ul>

<?php
if(isset($_SESSION['login_user1'])){

?>


          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_user1']; ?> </a></li>
            <li><a href="myrestaurant.php">MANAGER CONTROL PANEL</a></li>
            <li><a href="logout_m.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
          </ul>
<?php
}
else if (isset($_SESSION['login_user2'])) {
  ?>
           <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_user2']; ?> </a></li>
            <li class="active" ><a href="foodlist.php"><span class="glyphicon glyphicon-cutlery"></span> Food Zone </a></li>
            <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart  (<?php
              if(isset($_SESSION["cart"])){
              $count = count($_SESSION["cart"]); 
              echo "$count"; 
            }
              else
                echo "0";
              ?>) </a></li>
            <li><a href="logout_u.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
          </ul>
  <?php        
}
else {

  ?>

<ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Sign Up <span class="caret"></span> </a>
                <ul class="dropdown-menu">
              <li> <a href="customersignup.php"> User Sign-up</a></li>
              <li> <a href="managersignup.php"> Manager Sign-up</a></li>
              <li> <a href="#"> Admin Sign-up</a></li>
            </ul>
            </li>

            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-log-in"></span> Login <span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li> <a href="customerlogin.php"> User Login</a></li>
              <li> <a href="managerlogin.php"> Manager Login</a></li>
              <li> <a href="#"> Admin Login</a></li>
            </ul>
            </li>
          </ul>
          <?php
}
?>
</div>

</div>
</nav>

    <div class="container">
        <div class="jumbotron">
            <h1><?php echo $row["food_name"]; ?> Details</h1>
        </div>

        <div class="row">
            <div class="col-md-6">
                <img src="<?php echo $row["images_path"]; ?>" class="img-responsive">
            </div>
            <div class="col-md-6">
                <h3 class="text-dark"><?php echo $row["food_name"]; ?></h4>
                <!-- <h5 class="text-info"><?php echo $row["restaurant_name"]; ?></h5> -->
                <h3 class="text-info"><?php echo $row["description"]; ?></h5>
                <h3 class="text-danger">&#8377; <?php echo $row["price"]; ?>/-</h5>
                <!-- Add more details as needed -->

                <!-- Add any additional features you want on the product details page -->

                <!-- You can also include a form for adding the product to the cart from this page -->
                <form method="post" action="cart.php?action=add&id=<?php echo $row["F_ID"]; ?>">
                <!-- <div class="mypanel" align="center";> -->
<!-- <img src="<?php echo $row["images_path"]; ?>" class="img-responsive">
<h4 class="text-dark"><a href="product_details.php?food_id=<?php echo $row["F_ID"]; ?>"><?php echo $row["food_name"]; ?></a></h4>
<h5 class="text-info"><?php echo $row["restaurant_name"]; ?></h5>
<h5 class="text-info"><?php echo $row["description"]; ?></h5>
<h5 class="text-danger">&#8377; <?php echo $row["price"]; ?>/-</h5> -->
                <h5 class="text-info">Quantity: <input type="number" min="1" max="25" name="quantity" class="form-control" value="1" style="width: 60px;"> </h5>
                <input type="hidden" name="hidden_name" value="<?php echo $row["food_name"]; ?>">
                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                <input type="hidden" name="hidden_RID" value="<?php echo $row["R_ID"]; ?>">
                <input type="submit" name="add" style="margin-top:5px;" class="btn btn-success" value="Add to Cart">
<!-- </div> -->
                </form>
                <br>
                <br>
                <h2>Restaurant Details:</h3>
                <?php
                
    echo '<table class="table table-striped table-bordered">';
    echo '<thead><tr><th>Name</th><th>Email</th><th>Contact</th><th>Address</th></tr></thead>';
    echo '<tbody>';
    echo '<tr><td>' . $row['restaurant_name'] . '</td><td>' . $row['restaurant_email'] . '</td><td>' . $row['restaurant_contact'] . '</td><td>' . $row['restaurant_address'] . '</td></tr>';
    echo '</tbody>';
    echo '</table>';
    ?>
            </div>
        
        </div>
       

    </div>
    
    <!-- ... (Additional HTML content for the product details page) ... -->
</body>
</html>
