<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
}
elseif($_SESSION['usertype']=='admin'){
    header("location:login.php");
}
$host="localhost";
$user="root";
$password="";
$db="schoolproject";
$data=mysqli_connect($host,$user,$password,$db);

$name=$_SESSION['username'];

$sql="SELECT * FROM user WHERE Username='$name'";

$result=mysqli_query($data,$sql);

$info=mysqli_fetch_assoc($result);


if(isset($_POST['update_profile'])){
    $_email=$_POST['email'];
    $_phone=$_POST['phone'];
    $_password=$_POST['password'];

    $sql2="UPDATE user SET Email='$_email', Phone='$_phone',Password='$_password' WHERE Username='$name'";

    $result2=mysqli_query($data,$sql2);

    if($result2){
        echo "Update Success!";
        header('location:student_profile.php');
    }
}

   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <?php
    include 'student_css.php';
    ?>
    <style type="text/css">
        .label_deg{
            display:inline-block;
            text-align:right;
            width:100px;
            padding-top:10px;
            padding-bottom:10px;
        }
        .div_deg{
            background-color:peru;
            width:500px;
            padding-top:70px;
            padding-bottom:70px;
            border-radius:5px;
        }
    </style>
   
</head>
<body>
    <?php
    include 'student_sidebar.php';
    ?>
    

<div class="content">
    <center>
        <h1>Edit Profile</h1>
        <br><br>
    <form action="#" method="POST">
        <div class="div_deg">
        <div>
            <label  class="label_deg"  for="">Email</label>
            <input type="text" name="email" value='<?php echo"{$info['Email']}"?>'>
        </div>
        <div>
            <label  class="label_deg"  for="">Phone</label>
            <input type="number" name="phone" value='<?php echo"{$info['Phone']}"?>'>
        </div>
        <div>
            <label class="label_deg"  for="">Password</label>
            <input type="text" name="password" value='<?php echo"{$info['Password']}"?>'>
        </div>
        <div>
            <input type="submit" class="btn btn-primary" value="Update" name="update_profile">
        </div>
        </div>

        
    </form>
    </center>
    

</div>

    
</body>
</html>