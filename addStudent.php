<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
<nav>
    <a href="">Home</a>
    <a href="teacher_login.php">Login</a>
    <a href="#" title="you are on this page" class="active-link" style="background-color:orange;color:blue;" >Add Student</a>
    <a href="findStudent.php">Find Student</a>
    <a href="#" style="background-color:white;color:blue;border-radius:20px;"><?php echo $_SESSION["teacher_name"] ?></a>
  </nav>
  <div class="container">
    <form method="post" action="addStudent.php">
        <label>Firstname</label>
        <input type="text" name="first_name" class="form-control" required placeholder="e.g John" ><br>
        <label>Lastname</label>
        <input type="text" name="last_name" class="form-control" required placeholder="e.g Doe" ><br>
        <label>Date of Birth</label>
        <input type="text" name="date_of_birth" class="form-control" required placeholder="2000-02-09" ><br>
        <label>Email</label>
        <input type="email" name="email" class="form-control" required placeholder="example@gmail.com" ><br>
        <label>Phonenumber</label>
        <input type="text" name="phone_number" class="form-control" required placeholder="0711111111" ><br>
        <button type="submit" id="add_student" class="btn btn-primary" >Submit</button>

    </form><br>

  </div>
<?php 
//code for ther serer
$servername = "localhost";
$username = "root";
$password = "@mysql2024";
$dbname = "school";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

//end of server code


if(isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["date_of_birth"]) && isset($_POST["email"]) && isset($_POST["phone_number"]) ){
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $date_of_birth = $_POST["date_of_birth"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone_number"];
    $email_check = "SELECT email FROM Students where email = '$email' ";
    $results = mysqli_query($conn, $email_check); 
    if(mysqli_num_rows($results) > 0){
         echo '<div class="alert alert-danger"><strong>Student is already admitted!</strong></div>';
    }   
    else{
        $sql = "INSERT INTO Students(first_name, last_name, date_of_birth, email, phone_number) VALUES('$first_name', '$last_name', '$date_of_birth','$email', '$phone_number')";

    if ($conn->query($sql) == true){
    echo '<div class="alert alert-success"><strong>Student admitted successfully!</strong></div>';

    }else{
    //echo "Error: " . $sql . "<br>" . $conn->error;
    echo '<div class="alert alert-warning"><strong>An error occurred!</strong></div>';

    }
    }
}else{
    $first_name = "";
    $last_name = "";
    $date_of_birth = "";
    $email = "";
    $phone_number = "";
}
?>

<script>
  var teacher_name = "<?php echo $_SESSION['teacher_name'];?>";
  var add_student =document.getElementById("add_student");
  if(teacher_name == " "){
    add_student.disabled = true;

  }
  console.log(teacher_name);
</script>
    
</body>
</html>