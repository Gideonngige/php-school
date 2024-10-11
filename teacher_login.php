<?php 
session_start();
$servername = "localhost";
$username = "root";
$password = "@mysql2024";
$dbname = "school";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(isset($_POST["phone_number"])){
    $phone_number = $_POST["phone_number"];
    $sql = "SELECT teacher_id FROM Teachers WHERE phone_number = '$phone_number' ";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $password = $row["teacher_id"];
        echo '<div id="alert" class="alert alert-success"><strong>Your password is ' . $password . '</strong></div>';

    }
    else{
        echo '<div id="alert" class="alert alert-danger"><strong>Provide a valid Phonenumber</strong></div>';
    }

}
else{
    echo "";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teachers login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body style="background-color:blue;">
    <div class="container" style="display:flex;justify-content:center;align-items:center;height:100vh;">
        <div class="inner-container" style="border-radius:5px;background-color:orange;padding:4px 8px;min-width:400px;min-height:320px;">
            <h3 style="text-align:center;">Login</h3>
            <hr>
            <form method="post" action="teacher_login.php">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="e.g example@gmail.com" ><br>
                <label>Password</label>
                <input type="number" class="form-control" min="1" name="password" placeholder="e.g 2345" ><br>
                <p style="float:right;"><a href="" data-bs-toggle="modal" data-bs-target="#myModal" style="text-decoration:none;">Forgot password?</a></p>
                <button type="submit" style="width:100%;" class="btn btn-primary">LOGIN</button>
            </form>
        </div>

        <!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Reset Password</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form method="post" action="teacher_login.php">
            <label>Phonenumber</label>
            <input type="text" name="phone_number" class="form-control"placeholder="Enter your registered phonenumber"><br>
            <button type="submit" class="btn btn-primary" style="width:100%">Reset</button>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>


    </div>

    <?php 
    if(isset($_POST["email"]) && $_POST["password"]){
        $servername = "localhost";
        $username = "root";
        $password = "@mysql2024";
        $dbname = "school";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $email = $_POST["email"];
        $password = $_POST["password"];
        $sql = "SELECT teacher_id, email, first_name, last_name FROM Teachers WHERE email = '$email' and teacher_id = '$password' ";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $teacher_name = $row["first_name"] . " " . $row["last_name"];
            $_SESSION["teacher_name"] = $teacher_name;
            echo '<div id="alert" class="alert alert-success"><strong>Login Successfully!</strong></div>';
            header("Location:findstudent.php");
            exit();
        }
        else{
            echo '<div id="alert" class="alert alert-danger"><strong>Wrong email or password!!</strong></div>';
        }
    }
    else{
        echo '<div id="alert" class="alert alert-secondary"><strong>Enter login details please!!</strong></div>';
    }
    ?>
<script>
    setTimeout(function(){
        var alert =document.getElementById('alert');
        alert.style.opacity = '0';
        setTimeout(function(){
            alert.style.display = 'none';
        }, 500);
    }, 5000);
</script>
    
</body>
</html>