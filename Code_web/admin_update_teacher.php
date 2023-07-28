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

if($_GET['teacher_id']){
    $t_id=$_GET['teacher_id'];
    $sql="SELECT * FROM teacher WHERE id='$t_id'";

    $result=mysqli_query($data,$sql);

    $info=$result->fetch_assoc();
}

if(isset($_POST['update_professor'])){
    $t_name=$_POST['name'];
    $t_description=$_POST['description'];
    $file=$_FILES['image']['name'];
    $dst="./image/".$file;
    $id=$_POST['id'];
    $dst_db="./image/".$file;

    move_uploaded_file($_FILES['image']['tmp_name'],$dst);

    if($file){

    $sql2="UPDATE teacher SET name='$t_name',description='$t_description',image='$dst_db' WHERE id='$id'";
    }
    else{
        
    $sql2="UPDATE teacher SET name='$t_name',description='$t_description' WHERE id='$id'";
    }
    $result2=mysqli_query($data,$sql2);

    if($result2){
     
        header("location:admin_view_professor.php");
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
           display:inline-block;
           text-align:right;
           width:100px;
           padding-top:10px;
           padding-bottom:10px;
        }
        .form_deg{
            border-radius:5px;
            background-color:peru;
            width: 500px;
            padding-top:70px;
            padding-bottom:70px;
        }

    
    </style>
   
</head>
<body>
<?php
    include 'admin_sidebar.php';
    ?>
    

<div class="content">
    <center>
    <h1>Update Teacher</h1>
    <form class="form_deg" action="#" method="POST" enctype="multipart/form-data">

    <input type="text" name="id" value="<?php echo "{$info['id']}";?>" hidden id="">
        <div>
            <label for="">Prof. Name</label>
            <input type="text" name="name" id="" value="<?php echo "{$info['name']}";?>" >
        </div>
        <div>
            <label for="">Subject</label>
            <input type="text" name="description" id="" value="<?php echo "{$info['description']}";?>">
        </div>
        <div>
            <label for="">Image(old)</label>
            <img height="150px" width=150px src="<?php echo "{$info['image']}";?>" alt="">
        </div>
        <div>
            <label for="">Image(new)</label>
            <input type="file" name="image" id="">
        </div>
        <div>
       
            <input class="btn btn-success" type="submit" value="Update Professor" name="update_professor" id="">
        </div>
    </form>
    </center>

</div>

    
</body>
</html>