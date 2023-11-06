<?php




include('session_m.php');

if(!isset($login_session)){
header('Location: managerlogin.php'); 
}




if (isset($_POST['checkbox'])) {
    $cheks = implode("','", $_POST['checkbox']);
    $sql = "UPDATE FOOD SET `options` = 'DISABLE' WHERE F_ID IN ('$cheks')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
}

header('Location: delete_food_items.php');
$conn->close();


?>