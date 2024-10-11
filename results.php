<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="assets/results.css">
    <title>student results</title>
</head>
<body>
    <div class="container">
        <h3>Results</h3>
        <div class="row">
            <div class="col">Name: <?php echo $_SESSION["student_name"]; ?></div>
            <div class="col">Admission number: <?php echo  $_SESSION["student_id"]; ?></div>
            <div class="col">G-Tech School of Technology</div>

        </div>
        <?php 
        $servername = "localhost";
        $username = "root";
        $password = "@mysql2024";
        $dbname = "school";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if(!isset($_SESSION["student_name"]) || !isset($_SESSION["student_id"])){
            $_SESSION["student_name"] = "";
            $_SESSION["student_id"] = "";
          }
        if(isset($_SESSION["student_name"])){
            $student_id = $_SESSION["student_id"];
            $student_marks = "SELECT calculus1, java_programming, python_programming, system_analysis_design, discrete_mathematics, automata_theory, linear_algebra, c_programming FROM Units WHERE student_id = '$student_id' ";
            $result_marks = $conn->query($student_marks);
            if($result_marks->num_rows > 0){
                echo "<table border='2'>
                <tr>
                <th>Unit</th>
                <th>Score</th>
                </tr>";
                while($row = $result_marks->fetch_assoc()) {
                    $total = $row["calculus1"] + $row["java_programming"] + $row["python_programming"] + $row["system_analysis_design"] + $row["discrete_mathematics"] + $row["automata_theory"] + $row["linear_algebra"] + $row["c_programming"];
                    $average = $total / 8;
                    $grade = "";
                    if($average >= 70 && $average <= 100){$grade = "A";}
                    else if($average >=60 && $average < 70){$grade = "B";}
                    else if($average >=50 && $average < 60){ $grade = "C";}
                    else if($average >=40 && $average < 50){ $grade = "D";}
                    else{$grade = "Fail";}
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
                <tr>
                <td>" . "Total" . "</td>
                <td>" . $total . "</td>
                </tr>
                <tr>
                <td>" . "Average" . "</td>
                <td>" . $average . "</td>
                </tr>
                <tr>
                <td>" . "Grade" . "</td>
                <td>" . $grade . "</td>
                </tr>
                
                ";
                }
            }
            else{
                echo '<div class="alert alert-secondary"><strong>Please wait,Marks are not yet added!!</strong></div>';

            }
        }
        else{
            echo '<div class="alert alert-danger"><strong>Please Login!!</strong></div>';

        }
        ?>

    </div>
    
</body>
</html>