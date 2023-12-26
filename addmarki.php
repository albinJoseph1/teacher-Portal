<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include('connection.php'); 
    session_start();


    if ($_POST['functionr'] === 'dropdown') {
       
        $teacher = $_SESSION["teacher_id"];

       //$sql = "SELECT stu_id, rollnumber, stu_name FROM student where teacher_id= $teacher"; 
       $sql= "SELECT stu_id, rollnumber, stu_name FROM student where teacher_id= $teacher and stu_id not in (SELECT stu_id FROM studentMark)";

       
       $result = $conn->query($sql);
   
       if ($result->num_rows > 0) {
           $products = array();
   
           // Fetch data row by row and store it in an array
           while ($row = $result->fetch_assoc()) {
               $products[] = $row;
               //echo $row['rollnumber'];

           }
           echo json_encode($products);

           
           // Return products as JSON
       } 
       else {
        //    $conn->close();
           $message = "No students found.";
           //echo json_encode($message);

           echo json_encode(array("message" => $message));
           //return json_encode([]); // Empty array if no products found
       }
    }
    else if ($_POST['functionr'] === 'markList') {

        $teacher = $_SESSION["teacher_id"];
        $sql = "SELECT * FROM studentMark where teacher_id = $teacher";


        $result = $conn->query($sql);
            
        if ($result->num_rows > 0) {
                $data = array();       
                
                while ($row = $result->fetch_assoc()) {
                    $stu_id=$row['stu_id'];
                    $sql2 = "SELECT stu_name,rollnumber FROM student where stu_id= $stu_id";


                  

                    $result2 = $conn->query($sql2);

                    if ($result2->num_rows > 0) {
                        $row2 = $result2->fetch_assoc();
                    }
                    $multiDimArray[] = array(
                        "Rollnum" => $row2['rollnumber'],
                        "name" => $row2['stu_name'],
                        "sub1" => $row['s1'],
                        "sub2" => $row['s2'],
                        "sub3" => $row['s3']
                    );               
                }
            
                echo json_encode($multiDimArray);
                // echo ($result2);
        }

       

        else {
            echo json_encode(array()); 
        }
    }
    else if ($_POST['functionr'] === 'roll') {

        $teacher = $_SESSION["teacher_id"];
        $sql = "SELECT stu_id, stu_name, rollnumber FROM student WHERE  rollnumber between 1 and 5 and teacher_id = $teacher";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
                $data = array();
                while ($row = $result->fetch_assoc()) {
                    $stu_id = $row['stu_id'];
                    $sql2 = "SELECT * FROM studentMark where stu_id = $stu_id";
                    $result2 = $conn->query($sql2);

                    if ($result2->num_rows > 0) {
                         $row2 = $result2->fetch_assoc();
                    }

                    $multiDimArray[] = array(
                        "Rollnum" => $row['rollnumber'],
                        "name" => $row['stu_name'],
                        "sub1" => $row2['s1'],
                        "sub2" => $row2['s2'],
                        "sub3" => $row2['s3']
                    );               
                }
            
                echo json_encode($multiDimArray);
        }      
        else {
            echo json_encode(array()); 
        }
    }

    else{
        echo json_encode(array());
    }


   $conn->close();



//   


    ?>