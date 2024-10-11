<?php 
$servername = "localhost";
$username = "root";
$password = "@mysql2024";
$dbname = "school";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if(isset($_POST["student_id2"])){
    $student_id2 = $_POST["student_id2"];
    $student_marks = "SELECT calculus1, java_programming, python_programming FROM Units WHERE student_id = '$student_id2' ";
    $result_marks = $conn->query($student_marks);
    if($result_marks->num_rows > 0){
        echo "<table border='2'>
        <tr>
        <th>Calculus1</th>
        <th>Java Programming</th>
        <th>Python Programming</th>
        </tr>";
        while($row = $result_marks->fetch_assoc()) {
        echo "<tr>
        <td>" . $row["calculus1"] . "</td>
        <td>" . $row["java_programming"] . "</td>
        <td>" . $row["python_programming"] . "</td>
        </tr>";
        }
    }
    else{
        echo "Student's marks does not exists!!";
    }
}else{
    echo "The field is not set!!";
}

