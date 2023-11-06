<?php
echo "meee";
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

if(isset($_SESSION['cart'])) {

  $total = 0;

  foreach($_SESSION['cart'] as $F_ID => $quantity) {

    $result = $mysqli->query("SELECT * FROM FOOD WHERE id = ".$F_ID);
    

    if($result){

      if($obj = $result->fetch_object()) {


        $cost = $obj->price * $quantity;

        $user = $_SESSION["username"];

        $query = $mysqli->query("INSERT INTO orders (product_code, product_name, product_desc, price, units, total, email) VALUES('$obj->product_code', '$obj->product_name', '$obj->product_desc', $obj->price, $quantity, $cost, '$user')");
        echo "inserted F_ID: $F_ID<br>";
        
          $newqty = $obj->quantity - $quantity;
          if ($newqty <= 0) {
            echo "Updating food options to 'DISABLE' for F_ID: $F_ID<br>";
            $update_food = $mysqli->query("UPDATE food SET options = 'DISABLE' WHERE id = ".$F_ID);
        } else {
            echo "Updating food quantity to $newqty for F_ID: $F_ID<br>";
            $update_food = $mysqli->query("UPDATE food SET quantity = $newqty WHERE id = ".$F_ID);
        }

        

           }



      }
    }
  }



header("location:bill.php");

?>
