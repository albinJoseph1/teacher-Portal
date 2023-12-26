<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include('connection.php'); 
    session_start();


    if ($_POST['function'] === 'addStudent') {
       
        $nameid = $_POST['name'];
        $ph = $_POST['ph'];
        $roll = $_POST['roll'];
        $stu_dept =$_SESSION['teacher_department'];
        $stu_batch =$_SESSION['teacher_batch'];
        $teacher_id	=$_SESSION['teacher_id'];
        						

        $sql = "insert into student(stu_name, stu_ph, stu_dept, stu_batch,teacher_id,status,rollnumber)VALUES('$nameid','$ph','$stu_dept','$stu_batch',$teacher_id,1,$roll)";
        							

        if ($conn->query($sql)) {
            echo "user 'name' added successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    else if ($_POST['function'] === 'addmark') {
       
         
        $maths = $_POST['maths'];
        $science = $_POST['science'];
        $physics = $_POST['physics'];
        $teacher_id	=$_SESSION['teacher_id'];
        $stu_id	= $_POST['rollNumber'];
        							
        		

        $sql = "insert into studentMark(stu_id, teacher_id, s1, s2,s3,status)VALUES('$stu_id','$teacher_id','$maths','$science',$physics,1)";
        							

        if ($conn->query($sql)) {
            echo "user 'name' added successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }






   if ($_POST['function'] === 'StudentList') {
        
        $teacher = $_SESSION["teacher_id"];

        $sql = "SELECT * FROM student where teacher_id=$teacher";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $data = array();
        
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        
            echo json_encode($data);
        } else {
            echo json_encode(array()); 
        }


    }




    // }
    // else{
    //     echo"no action(";
    // }

    
    



    $conn->close();

?>