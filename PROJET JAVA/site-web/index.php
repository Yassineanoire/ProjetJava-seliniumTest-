<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>project-php</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<div class="wrapper">
    <div class="modalsform">
    <div class="btns">
        <button class="act-btn sign">signup</button>
        <button class="move-btn">signup</button>
        <button class="act-btn login">login</button>
    </div>
    <form action="" method="post" class="form signn sign-upp">
        <div class="first-input">
            <input type="text" name="fname" id="" placeholder="Enter ur first name" autocomplete="off">
        </div>
        <div class="second-input">
            <input type="text" name="lname" id="" placeholder="Enter ur last name" autocomplete="off">
        </div>
        <div class="third-input">
            <input type="email" name="email" id="" placeholder="Enter ur email adress" autocomplete="off">
        </div>
        <div class="last-input">
            <input type="password" name="mdps" id="" placeholder="Enter ur password" autocomplete="off">
        </div>
        <div class="sign-up ">
           <button name="submit">register</button>
        </div>
        
    </form>
    <form action="" method="post" class="form loginn">
      
        <div class="third-input">
            <input type="email" name="email1" id="" placeholder="Enter ur email adress" autocomplete="off">
        </div>
        <div class="last-input">
            <input type="password" name="pswd1" id="" placeholder="Enter ur password" autocomplete="off">
        </div>
        <div class="sign-up ">
           <button name="submit2">login</button>
        </div>
        
    </form>
</div>
</div>
    
  </body>
  <script src="./app.js"></script>
</html>
<?php
include_once('config.php');


if(isset($_POST['submit'])){
    $fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$mdps=$_POST['mdps'];
    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($mdps)){
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            $sql="SELECT email From inscription where email='{$email}'";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
                echo "<script>alert('email already exist ')</script>";
            }
            else{
          
            $sql ="INSERT INTO inscription (firstname, lastname, email,mdps) VALUES ('$fname', '$lname', '$email','$mdps')";
            $result =mysqli_query($conn, $sql);
        if($result){
            echo "<script>alert('this user is registred succesfully go login now')</script>";
        }
            else{
                echo "<script>alert('3atab ti9ni')</script>";
            }
      
    }
}
else{
    echo "<script>alert('enter a valide email')</script>";
}

}
else{
    echo "<script>alert('enter ur infos')</script>"; 
}
}
if(isset($_POST['submit2'])){
    $email1=$_POST['email1'];
$mdps1=$_POST['pswd1'];
if( !empty($email1) && !empty($mdps1)){
    $sql="SELECT email,mdps From inscription where email='{$email1}' AND mdps='{$mdps1}'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
  header("location:verification.php");
    }
    else
    echo "<script>alert('ghalat')</script>";
}
else{
    echo "<script>alert('enter ur infos')</script>";
}
}
    



?>