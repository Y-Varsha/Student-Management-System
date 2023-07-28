<?php
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

if(isset($_POST['add_professor'])){
    $_name=$_POST['name'];
    $_description=$_POST['description'];
    $file=$_FILES['image']['name'];

    $dst="./image/".$file;

    $dst_db="./image/".$file;

    move_uploaded_file($_FILES['image']['tmp_name'],$dst);

    
    
    $sql="INSERT INTO teacher(name,description,image) VALUES('$_name','$_description','$dst_db')";

    $result=mysqli_query($data,$sql);

    if($result){
        echo "<script type='text/javascript'>
        alert('Data Upload Success');
        </script>";
        header("location:admin_add_professor.php");
       
    }
    else{
        echo "Upload Failed";
        header("location:admin_add_professor.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        label{
           display:inline-block;
           text-align:right;
           width:100px;
           padding-top:10px;
           padding-bottom:10px;
        }
        .div_design{
            border-radius:5px;
            background-color:peru;
            width: 500px;
            padding-top:70px;
            padding-bottom:70px;
        }

    </style>
    <?php
    include 'admin_css.php';
    ?>
   
</head>
<body>
<?php
    include 'admin_sidebar.php';
    ?>
    

<div class="content">
    <center>
    <h1>Add Professor</h1>
    <br>
    <div class="div_design">
        <form action="#" method="POST" enctype="multipart/form-data">
            <div>
                <label for="">Professor</label>
                <input type="text" name="name">
            </div>
            <div>
                <label for="">Description</label>
                 <textarea name="description" id="" cols="30" rows="10"></textarea>
            </div>
            <div>
                <label for="">Image</label>
                <input type="file" name="image">
            </div>
            
            <div>

                <input type="submit" class="btn btn-primary" value="Add Professor"name="add_professor">
            </div>
        </form>
    </div>
    
    </center>
</div>

    
</body>
</html>