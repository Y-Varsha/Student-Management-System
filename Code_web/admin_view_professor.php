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

$sql="SELECT* FROM teacher";

$result=mysqli_query($data,$sql);

if(isset($_GET['teacher_id'])){
    $t_id=$_GET['teacher_id'];
    $sql2="DELETE FROM teacher WHERE id='$t_id'";

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
        .table_th{
            padding:20px;
            font-size:20px;
            background-color:lemonchiffon;
        }
        .table_td{
            padding:20px;
            font-size:20px;
            background-color:peru;
        }
    </style>
   
</head>
<body>
<?php
    include 'admin_sidebar.php';
    ?>
    

<div class="content">
    <center>
    <h1>Professor Data</h1>
    <table border="1px">
        <tr>
            <th class="table_th">Professor Name</th>
            <th class="table_th">Subject</th>
            <th class="table_th">Image</th>
            <th class="table_th">Delete</th>
            <th class="table_th">Update</th>
        </tr>
        <?php
        while($info=$result->fetch_assoc()){
        ?>
        <tr>
            <td class="table_td"><?php echo "{$info['name']}"?></td>
            <td class="table_td"><?php echo "{$info['description']}"?></td>
            <td class="table_td"><img height="100px" width="100px" src="<?php echo "{$info['image']}"?>"></td>
            <td class="table_td">
                <?php
                echo"
                
            <a onClick=\"javascript:return confirm('Do you wish to delete this? Click ok to continue.');\"class='btn btn-danger' href='admin_view_professor.php?teacher_id={$info['id']}'>
            Delete
            </a>"
            ?>
            </td>
            <td class="table_td">
              <?php
              echo "
                <a class='btn btn-primary'href='admin_update_teacher.php?teacher_id={$info['id']}'>
                Update
                </a>"
                ?>

            </td>
        </tr>
        <?php
        }
        ?>
    </table>
    </center>
    

</div>

    
</body>
</html>