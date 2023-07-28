<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
}
elseif($_SESSION['usertype']=='student'){
    header("location:login.php");
}
$host="localhost";
$user="root";
$password="";
$db="schoolproject";

$data=mysqli_connect($host,$user,$password,$db);

$id=$_GET['student_id'];

$sql="SELECT* FROM user WHERE ID='$id'";

$result=mysqli_query($data,$sql);

$info=$result->fetch_assoc();

if(isset($_POST['update']))
{
   $name=$_POST['name'];
   $email=$_POST['email'];
   $phone=$_POST['phone'];
   $password=$_POST['password'];

   $query="UPDATE user SET Username='$name',Email='$email',Phone='$phone',Password='$password' WHERE ID='$id'";
   $result2=mysqli_query($data,$query);

   if($result2){
    $_SESSION['message1']='Update student is successful!';
    header("location:view_student.php");
   }
  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <?php
    include 'admin_css.php';
    ?>
   <style>
    label{
    display: inline-block;
    
    width: 100px;
    text-align: right;
    padding-top: 10px;
    padding-bottom: 10px;
    }
    .div_deg{
        background-color:peru;
        width:400px;
        padding-bottom:70px;
        padding-top:70px;
        border-radius:5px;
    }
   </style>
</head>
<body>
<?php
    include 'admin_sidebar.php';
    ?>
    

<div class="content">
    <center>
    <h1>Update Student</h1>
     <br>

    <div class="div_deg">
        <form action="#" method="POST">
            <div>
                <label for="">Username</label>
                <input type="text" name="name" value="<?php echo "{$info['Username']}";?>">
            </div>
            <div>
                <label for="">Email</label>
                <input type="email" name="email" value="<?php echo "{$info['Email']}";?>">
            </div>
            <div>
                <label for="">Phone</label>
                <input type="nummber" name="phone" value="<?php echo "{$info['Phone']}";?>">
            </div>
            <div>
                <label for="">Password</label>
                <input type="text" name="password" value="<?php echo "{$info['Password']}";?>">
            </div>
            <div>

                <input class="btn btn-success" type="submit" name="update" value="Update">
            </div>
        </form>
    </div>
    </center>
    

</div>

    
</body>
</html>