<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="50">
<nav class="navbar navbar-expand-sm bg-primary navbar-dark fixed-top">
  <div class="container-fluid">
    <ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="#" title="you are on this page" class="active-link" style="background-color:orange;color:blue;">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#section1">School</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#section2">Students</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#section3">Teachers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="results.php">Results</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="" style="background-color:white;color:blue;border-radius:20px;"><?php echo $_SESSION["student_name"]?></a>
      </li>
      
    </ul>
  </div>
</nav>

<div id="section1" class="container-fluid" style="padding:100px 20px;">
  <h1>School</h1>
  <div class="row">
    <div class="col">
      <img class="my-image" src="assets/images/background.png" style="width:600px;">
    </div>
    <div class="col">
      Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eum architecto molestias dignissimos vel, illum ducimus cum facilis natus itaque, numquam facere temporibus saepe, commodi aspernatur veritatis. Quod delectus quisquam porro.
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum facilis modi rerum deleniti voluptas? Excepturi vel tenetur ducimus nulla quae ipsum! Eligendi ullam esse iste in dolor corporis veritatis maiores.
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi quasi id rerum mollitia ad, sit et! Aperiam blanditiis distinctio vel nihil quos voluptas est quasi repellendus, rem eligendi laboriosam perferendis.\
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur repellendus eveniet suscipit saepe maiores perferendis, ad accusamus magni quisquam perspiciatis modi qui corrupti culpa est mollitia, et ipsa sed odit!
    </div>
  </div>
</div>

<div id="section2" class="container-fluid bg-primary" style="padding:100px 20px;">
  <h1>Students</h1>
  <div class="row">
    <div class="col">
      Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eum architecto molestias dignissimos vel, illum ducimus cum facilis natus itaque, numquam facere temporibus saepe, commodi aspernatur veritatis. Quod delectus quisquam porro.
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum facilis modi rerum deleniti voluptas? Excepturi vel tenetur ducimus nulla quae ipsum! Eligendi ullam esse iste in dolor corporis veritatis maiores.
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi quasi id rerum mollitia ad, sit et! Aperiam blanditiis distinctio vel nihil quos voluptas est quasi repellendus, rem eligendi laboriosam perferendis.\
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur repellendus eveniet suscipit saepe maiores perferendis, ad accusamus magni quisquam perspiciatis modi qui corrupti culpa est mollitia, et ipsa sed odit!
    </div>
    <div class="col">
    <img src="assets/images/greenOrange.png" style="width:600px;">
      
    </div>
  </div>
</div>

<div id="section3" class="container-fluid" style="padding:100px 20px;">
  <h1>Teachers</h1>
  <div class="row">
    <div class="col">
      <img src="assets/images/mySoft.png" style="width:600px;height:300px;">
    </div>
    <div class="col">
      Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eum architecto molestias dignissimos vel, illum ducimus cum facilis natus itaque, numquam facere temporibus saepe, commodi aspernatur veritatis. Quod delectus quisquam porro.
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum facilis modi rerum deleniti voluptas? Excepturi vel tenetur ducimus nulla quae ipsum! Eligendi ullam esse iste in dolor corporis veritatis maiores.
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi quasi id rerum mollitia ad, sit et! Aperiam blanditiis distinctio vel nihil quos voluptas est quasi repellendus, rem eligendi laboriosam perferendis.\
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur repellendus eveniet suscipit saepe maiores perferendis, ad accusamus magni quisquam perspiciatis modi qui corrupti culpa est mollitia, et ipsa sed odit!
    </div>
  </div>
</div>

<div id="section3" class="container-fluid bg-dark" style="padding:100px 20px;">
  
  <div class="row">
    <div class="col">
      <a href="" style="color:white;text-decoration:none;">login</a><br>
      <a href="" style="color:white;text-decoration:none;">login</a><br>
      <a href="" style="color:white;text-decoration:none;">login</a><br>
      <a href="" style="color:white;text-decoration:none;">login</a>
    </div>
    <div class="col">
    <a href="" style="color:white;text-decoration:none;">Register</a><br>
      <a href="" style="color:white;text-decoration:none;">Register</a><br>
      <a href="" style="color:white;text-decoration:none;">Register</a><br>
      <a href="" style="color:white;text-decoration:none;">Register</a>
    </div>
    <div class="col">
    <a href="" style="color:white;text-decoration:none;">Add Student</a><br>
      <a href="" style="color:white;text-decoration:none;">Add Student</a><br>
      <a href="" style="color:white;text-decoration:none;">Add Student</a><br>
      <a href="" style="color:white;text-decoration:none;">Add Student</a>
    </div>
    <h4 style="color:white;text-align:center;">&copy; G-Tech Company <?php echo date("Y") ?><h4/>
  </div>
</div>

<?php 
if(!isset($_SESSION["student_name"])){
  $_SESSION["student_name"] = "Unknown Student";
}
?>

</body>
</html>