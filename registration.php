<?php
    include("connect.php");

    $name = $_POST['name'];
    $mobile = $_POST['mobileno'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $address = $_POST['address'];
    $role = $_POST['role'];

    if($password == $cpassword){
        $insert = mysqli_query($connect,"INSERT INTO user (name,mobile,address,password,role,status,votes) VALUES ('$name','$mobile','$address','$password','$role',0,0)");
        if($insert){
            echo '
            <script>
                alert("Registration Successful");
                window.location = "login.html";
            </script>
            ';
        }
        else{
            '
            <script>
                alert("error occured ");
                window.location = "registration.html";
            </script> 
            ';
        }
    }
    else{
        echo '
            <script>
                alert("Password and Confirm Passwrod Does not match");
                window.location = "registration.html";
            </script>
            ';
    }
?>