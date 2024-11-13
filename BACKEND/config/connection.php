
<?php
$server = "localhost";
$username = "root";
$password = "";
$db_name = "user_data";
$conn = mysqli_connect($server,$username,$password,$db_name);


if($conn){
    echo "successfull";
}else{
    echo "error";
}

?>