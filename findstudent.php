<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>find student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
<nav>
    <a href="index.php">Home</a>
    <a href="teacher_login.php">Login</a>
    <a href="addStudent.php">Add Student</a>
    <a href="marks.php">Marks</a>
    <a href="#" title="you are on this page" class="active-link" style="background-color:orange;color:blue;">Find Student</a>
    <a href="#" style="background-color:white;color:blue;border-radius:20px;"><?php echo $_SESSION["teacher_name"] ?></a>
  </nav>

  
  <div class="row">
  <div class="col">
  <form action="findstudent.php" method="post">
    <label for="sel1" class="form-label">Select form of the students</label>
    <select class="form-select" id="form" name="form">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
    </select>
    <button type="submit" class="btn btn-primary mt-3" id="submit">SUBMIT</button>
    </form>
  </div>
  <div class="col">
  <form action="findstudent.php" method="post">
    <label for="email" class="form-label">Student Email to Delete</label>
    <input type="email" class="form-control" name="email" placeholder="example@gmail.com">
    <button type="submit" id="delete" class="btn btn-danger mt-3">DELETE</button>
    </form>
  </div>
</div>
  
  <?php 
if(isset($_POST["form"])){
  $form = $_POST['form'];
  echo $form;
}else{
  $form = "";
}
if(!isset($_SESSION["teacher_name"])){
  $_SESSION["teacher_name"] = "Unknown Teacher";
}

$servername = "localhost";
$username = "root";
$password = "@mysql2024";
$dbname = "school";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

$sql = "SELECT first_name, last_name, email FROM Students";
$result = $conn->query($sql);


  if ($result->num_rows > 0) {
    echo "<table border='2'>
    <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    </tr>";
    while($row = $result->fetch_assoc()) {
      echo "<tr>
      <td>" . $row["first_name"] . "</td>
      <td>" . $row["last_name"] . "</td>
      <td>" . $row["email"] . "</td>
      </tr>";
    }
    echo "</table>";
  } else {
    echo "0 results";
  }
  

  //code for deleting students
  if(isset($_POST["email"])){
    $email = $_POST["email"];
    $sql = "DELETE FROM Students WHERE email = '$email' ";
    if($conn->query($sql) == true){
      echo '<div class="alert alert-success"><strong>Student deleted Successfully!</strong></div>';
    }
    else{
      echo '<div class="alert alert-danger"><strong>Error deleting student</strong></div>';
    }
  }

  $conn->close();
?>
<script>
  var teacher_name = "<?php echo $_SESSION['teacher_name'];?>";
  var submit =document.getElementById("submit");
  var deleteBtn =document.getElementById("delete");
  if(teacher_name == " "){
    submit.disabled = true;
    deleteBtn.disabled = true;

  }
  console.log(teacher_name);
</script>
    
</body>
</html>