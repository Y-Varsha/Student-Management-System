<?php
error_reporting(0);
session_start();
session_destroy();
if($_SESSION['message']){
    $message=$_SESSION['message'];
    echo "<script type='text/javascript'>
    alert('$message');
    </script>";
}
session_start();
$host="localhost";
$user="root";
$password="";
$db="schoolproject";
$data=mysqli_connect($host,$user,$password,$db);

$sql="SELECT * FROM teacher";

$result=mysqli_query($data,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bigelow+Rules&family=IM+Fell+English+SC&family=Permanent+Marker&display=swap" rel="stylesheet">

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
</head>
<body>
    <nav>
        <label class="logo">Hogwarts</label>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="">Admission</a></li>
            <li><a href="login.php" class="btn btn-primary">Login</a></li>
        </ul>
    </nav>
    <div class="section1">
        <label class="img_text" for=""></label>
        <img class="main_img"src="mainbg.jpg" alt="">

    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="welcome_img" src="hogwarts.jpg" alt="">
            </div>

            <div class="col-md-8">
                <h1>Welcome to Hogwarts</h1>
                <p>The exterior of Hogwarts is awe-inspiring, with its towering turrets, majestic spires, and ancient stone walls. As you approach the castle, you would see the vast grounds surrounding it, including a lake, a dense forest called the Forbidden Forest, and well-kept lawns. The castle itself is perched on a hilltop, overlooking the picturesque landscape.Throughout the castle, there are various classrooms dedicated to different subjects such as Potions, Charms, Transfiguration, and Defense Against the Dark Arts. Each classroom is unique, reflecting the personality and expertise of the respective professor. The castle also holds other notable places like the library, the hospital wing, the Quidditch pitch, and the common rooms for each Hogwarts house.Hogwarts is not just a place of education; it also serves as a home for the students during the school year.</p>

            </div>
            
        </div>
    </div>
    <br><br>
    <center>
        <h1>THE HOUSES</h1>
    </center>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h4>GRYFFINDOR</h4>
                <img class="house"src="gryffindor.jpg" alt="">
            </div>
            <div class="col-md-3">
                 <h4>HUFFLEPUFF</h4>   
                <img class="house"src="hufflepuff.jpg" alt="">
            </div>
            <div class="col-md-3">
                 <h4>RAVENCLAW</h4>
                <img class="house" src="ravenclaw.jpg" alt="">
            </div>
            <div class="col-md-3">
                 <h4>SLYTHERIN</h4>
                <img class="house" src="slytherin.jpg" alt="">
            </div>
          

        </div>
    </div>
    <br><br>
    <center>
        <h1>OUR PROFESSORS </h1>
    </center>
    <div class="container">
        <div class="row">
            <?php
            while($info=$result-> fetch_assoc()){
                ?>
            
            <div class="col-md-3">
                 <h4><?php echo "{$info['name']}" ?></h4>
                 <h5><?php echo "{$info['description']}" ?></h5>
                <img class="house1" src="<?php echo "{$info['image']}" ?>" alt="">
            </div>
            
            <?php
            }
            ?>

        </div>
    </div>
    <center>
        <h1 class="adm">Admission form</h1>
    </center>
    <div align="center" class="admission_form">
        <form action="data_check.php" method="POST">
            <div class="adm_int" >
                <label class="label_text" for="">Name</label>
                <input class="input_design" type="text" name="name">
            </div>
            <div class="adm_int">
                <label class="label_text"  for="">Email-id</label>
                <input class="input_design" type="text" name="email">
            </div>
            <div class="adm_int">
                <label class="label_text" for="">Phone</label>
                <input class="input_design"type="text" name="phone">
            </div>
            <div class="adm_int">
                <label class="label_text"  for="">Message</label>
                <textarea class="input_txt" name="message" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="adm_int">
               
                <input class="btn btn-primary" name="apply" type="submit" id="submit" value="APPLY"  >
            </div>
        </form>
    </div>
    <footer>
        <h4 class="footer_text">All @copyright reserved to Wizadry & Witchcraft Education.Ltd </h4>
    </footer>
  
</body>
</html>