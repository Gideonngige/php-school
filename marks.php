<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>marks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="assets/styles2.css"></body>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col" id="col1">
                <h3>Add Marks</h3>
                <hr>
                <form method="post" action="marks.php">
                    <label>Student ID</label>
                    <input type="number" class="form-control" min="1" name="student_id" placeholder="Enter student's id" required>
                    <label>Calculus 1</label>
                    <input type="number" class="form-control" min="0" max="100" name="calculus1" placeholder="e.g 67" required >
                    <label>Java Programming</label>
                    <input type="number" class="form-control" min="0" max="100" name="java_programming" placeholder="e.g 67"required>
                    <label>Python Programming</label>
                    <input type="number" class="form-control" min="0" max="100" name="python_programming" placeholder="e.g 67" required>
                    <label>System Analysis and Design</label>
                    <input type="number" class="form-control" min="0" max="100" name="system_analysis_design" placeholder="e.g 67" required >
                    <label>Discrete Mathematics</label>
                    <input type="number" class="form-control" min="0" max="100" name="discrete_mathematics" placeholder="e.g 67" required>
                    <label>Linear Algebra</label>
                    <input type="number" class="form-control" min="0" max="100" name="linear_algebra" placeholder="e.g 67" required>
                    <label>Automata Theory</label>
                    <input type="number" class="form-control" min="0" max="100" name="automata_theory" placeholder="e.g 67" required>
                    <label>C Programming</label>
                    <input type="number" class="form-control" min="0" max="100" name="c_programming" placeholder="e.g 67" required ><br>
                    <button type="submit" id="add_marks" class="btn btn-secondary" id="submitBtn">Submit</button>
                </form>

                <?php 
//global server information
$servername = "localhost";
$username = "root";
$password = "@mysql2024";
$dbname = "school";
$conn = mysqli_connect($servername, $username, $password, $dbname);
//code for the add marks part

if(isset($_POST["student_id"])){
$student_id = $_POST["student_id"];
$student_marks = "SELECT student_id FROM Students WHERE student_id = '$student_id' ";
$result_marks = $conn->query($student_marks);

if($result_marks->num_rows > 0){

if (isset($_POST["student_id"]) && isset($_POST["calculus1"]) && isset($_POST["java_programming"]) && isset($_POST["python_programming"]) && isset($_POST["system_analysis_design"]) && isset($_POST["discrete_mathematics"]) && isset($_POST["linear_algebra"]) && isset($_POST["automata_theory"]) && isset($_POST["c_programming"])){
    $student_id = $_POST["student_id"];
    $calculus1 = $_POST["calculus1"];
    $java_programming = $_POST["java_programming"];
    $python_programming = $_POST["python_programming"];
    $system_analysis_design = $_POST["system_analysis_design"];
    $discrete_mathematics = $_POST["discrete_mathematics"];
    $linear_algebra = $_POST["linear_algebra"];
    $automata_theory = $_POST["automata_theory"];
    $c_programming = $_POST["c_programming"];
    $student_id2 = "SELECT student_id FROM Students WHERE student_id = '$student_id' ";
    $result = $conn->query($student_id2);
    $row = $result->fetch_assoc();
    
    $student_id_insert = $row["student_id"];
    //check if student exists in the database
    $student_select = "SELECT student_id FROM Units WHERE student_id = '$student_id_insert' ";
    $check_student = mysqli_query($conn, $student_select);
    if(mysqli_num_rows($check_student) > 0){
        echo '<div class="alert alert-danger"><strong>Marks for this student already added!!</strong></div>';

    }
    else{
        $sql2 = "INSERT INTO Units (student_id, calculus1, java_programming, python_programming, system_analysis_design, discrete_mathematics, linear_algebra, automata_theory, c_programming) 
        VALUES('$student_id_insert', '$calculus1', '$java_programming', '$python_programming','$system_analysis_design', '$discrete_mathematics', '$linear_algebra', '$automata_theory', '$c_programming')";
    
        if($conn->query($sql2) == true){
            echo '<div class="alert alert-success"><strong>Marks added successfully!!</strong></div>';

        }
        else{
            echo '<div class="alert alert-danger"><strong>An error occurred when submitting marks!!</strong></div>';

        }
    }
}

else{
    echo '<div class="alert alert-danger"><strong>Enter detail, marks for the student!!</strong></div>';
}

}
else{
    echo '<div class="alert alert-danger"><strong>Student not registered for any unit!!</strong></div>';
}
}
?>
            </div>
            <div class="col" id="col2">
                <h3>Edit Marks</h3><hr>
                <form method="post" action="marks.php">
                    <label>Student ID</label>
                    <input type="number" class="form-control" min="1" name="student_id3" placeholder="Enter student's id" required>
                    <label>Select the Unit to Edit marks</label>
                    <select class="form-select" name="unit_to_change">
                        <option>calculus1</option>
                        <option>java_programming</option>
                        <option>python_programming</option>
                        <option>system_analysis_design</option>
                        <option>discrete_mathematics</option>
                        <option>automata_theory</option>
                        <option>linear_algebra</option>
                        <option>c_programming</option>
                    </select>
                    <label>New Marks</label>
                    <input type="number" class="form-control" min="1" max="100" name="new_marks" placeholder="Enter new marks" required><br>
                    <button type="submit" id="edit_marks" class="btn btn-secondary" id="submitBtn">Submit</button>
                </form>
                <?php 
                
                if(isset($_POST["student_id3"])){
                    $student_id3 = $_POST["student_id3"];
                $student_marks = "SELECT student_id FROM Units WHERE student_id = '$student_id3' ";
                $result_marks = $conn->query($student_marks);
                if($result_marks->num_rows > 0){

                if(isset($_POST["student_id3"]) && isset($_POST["unit_to_change"]) && isset($_POST["new_marks"])){
                    $student_id3 = $_POST["student_id3"];
                    $unit_to_change = $_POST["unit_to_change"];
                    $new_marks = $_POST["new_marks"];
                    $update_marks = "UPDATE Units SET $unit_to_change = '$new_marks' WHERE student_id = '$student_id3' ";
                    if($conn->query($update_marks) == true){
                        echo '<div class="alert alert-success"><strong>Unit\'s mark changed successfully!!</strong></div>';

                    }
                    else{
                        echo '<div class="alert alert-danger"><strong>An error occurred when changing marks!!</strong></div>';

                    }
                }
                else{
                            echo '<div class="alert alert-danger"><strong>Please, fill all the fields!!</strong></div>';

                }
            }
            else{
                echo '<div class="alert alert-danger"><strong>Student not registered for any unit!!</strong></div>';


            }
        }
                ?>
            </div>
            <div class="col" id="col3">
                <h3>Check Marks</h3><hr>
                <form method="post" action="marks.php">
                    <label>Student ID</label>
                    <input type="number" class="form-control" min="1" name="student_id2" placeholder="Enter student's id" required><br>
                    <button type="submit" id="check_marks" class="btn btn-secondary" id="submitBtn">Check</button>
                    <?php 
$servername = "localhost";
$username = "root";
$password = "@mysql2024";
$dbname = "school";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if(isset($_POST["student_id2"])){
    $student_id2 = $_POST["student_id2"];
    $student_marks = "SELECT calculus1, java_programming, python_programming, system_analysis_design, discrete_mathematics, automata_theory, linear_algebra, c_programming FROM Units WHERE student_id = '$student_id2' ";
    $result_marks = $conn->query($student_marks);
    if($result_marks->num_rows > 0){
        echo "<table border='2'>
        <tr>
        <th>Unit</th>
        <th>Score</th>
        </tr>";
        while($row = $result_marks->fetch_assoc()) {
        echo "<tr>
        <td>" . "Calculus1" . "</td>
        <td>" . $row["calculus1"] . "</td>
        </tr>
        <tr>
        <td>" . "Java Programming" . "</td>
        <td>" . $row["java_programming"] . "</td>
        </tr>
        <tr>
        <td>" . "Python Programming" . "</td>
        <td>" . $row["python_programming"] . "</td>
        </tr>
        <tr>
        <td>" . "System Analysis Design" . "</td>
        <td>" . $row["system_analysis_design"] . "</td>
        </tr>
        <tr>
        <td>" . "Discrete Mathematics" . "</td>
        <td>" . $row["discrete_mathematics"] . "</td>
        </tr>
        <tr>
        <td>" . "Automata Theory" . "</td>
        <td>" . $row["automata_theory"] . "</td>
        </tr>
        <tr>
        <td>" . "Linear Algebra" . "</td>
        <td>" . $row["linear_algebra"] . "</td>
        </tr>
        <tr>
        <td>" . "C Programming" . "</td>
        <td>" . $row["c_programming"] . "</td>
        </tr>
        ";
        }
    }
    else{
        echo '<div class="alert alert-danger"><strong>Student\'s marks does not exists!!</strong></div>';

    }
}else{
    echo '<div class="alert alert-danger"><strong>Enter student Id!!</strong></div>';
}

?>

                </form>
            </div>
        </div>
    </div>
<?php 
?>
<script>
  var teacher_name = "<?php echo $_SESSION['teacher_name'];?>";
  var add_marks =document.getElementById("add_marks");
  var edit_marks =document.getElementById("edit_marks");
  var check_marks =document.getElementById("check_marks");
  if(teacher_name == " "){
    add_marks.disabled = true;
    edit_marks.disabled = true;
    check_marks.disabled = true;

  }
  console.log(teacher_name);
</script>
</body>
</html>