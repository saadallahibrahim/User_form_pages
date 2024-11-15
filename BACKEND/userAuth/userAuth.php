<?php

require "../config/connection.php";


if(isset($_POST('Sign-Up'))){

    // declaration of the variables start here

    $First_name = htmlspecialchars($_POST('First_name'));
    $Last_name = htmlspecialchars($_POST('Last-name'));
    $Email = htmlspecialchars($_POST('Email'));
    $Phone_number = htmlspecialchars($_POST('Phone_number'));
    $password = htmlspecialchars($_POST('Password'));
    $Cpassword = htmlspecialchars($_POST('Cpassword'));
    $hasshed_password = sha1($password);

     // return $result;
    // pattern for the email
    $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z]{2,3})$^";
    // pattern for the password
    $number = preg_match('@[0-9]@', $password);
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
 

    // DATA VALIDATION START HERE

    if(empty($username)){
        echo "<script>('username field is required')</script>";  
    }elseif(!preg_match("/^[a-zA-z]*$/", $username)){
        echo echo "<script>('Only alphabets and whitespace are allowed.')</script>"
    }elseif(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
        echo "<script>alert('email field is required.')</script>";
    }elseif(!preg_match($pattern, $Email)){
        echo "<script>alert('Email not valid.')</script>";
    }elseif(empty($phone)){
        echo "<script>alert('Phone number field is required.')</script>";
    }elseif(strlen ($phone) <11){
        echo "<script>alert('invalid phone number.')</script>";
    }elseif(strlen ($phone) >11){
        echo "<script>alert('invalid phone number(you inserted more than eleven <N>).')</script>";
    }elseif(!preg_match ('/^[0-9]*$/', $phone)){
        echo "<script>alert('Only numeric value is allowed.')</script>";
    }elseif(empty($password)){
        echo "<script>alert('Passsword field is required.')</script>";
    }elseif(strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars ){
        echo "<script>alert('Password should at least 8 characters in length and must contain at leaset one number, one uppercase letter,
        one lowercase letter and one special character.')</script>";
    }elseif(empty($Cpassword)){
        echo "<script>alert('Comfirm Password field is required.')</script>";
    }elseif($cpassword != $password){
        echo "<script>alert('Password doesn't match.')</script>";
    }
    else(
        $query = "INSERT INTO user_details (id,First_name,Last_name,Email,Phone_number,Password) VALUES(null, '$First_name', '$Last_name', '$Email', '$Phone_number',  'hasshed_password')";

        $result = mysqli_query($conn,$query) OR die(mysqli_error($conn)){

            if($result){
                echo "<script>('successfully registered, click the link sent to your email to verify your account.')</script>";
                header("location: ");
            }
            else(
                echo "<script>('Sorry something is wrong with the database try again later.')</script>";
            )
        }
    )




}


?>