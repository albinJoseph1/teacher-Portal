<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include('connection.php'); 
    session_start();

    // $_SESSION['teacher_name'] = 'Session Value'; 
    
     if ($_POST['functionr'] === 'username') {
        echo $_SESSION['teacher_name'] ;
        // echo json_encode(array("sessionValue" => $_SESSION['teacher_name']));
     }

    else if (isset($_POST['email']) && $_POST['functionr'] === 'login') {
        $emailid = $_POST['email'];
        $passwordField = $_POST['password'];

        $sql = "SELECT * FROM teacher WHERE teacher_email = '$emailid'";
        $out = $conn->query($sql);
    
        if ($out->num_rows > 0) {
            $row = $out->fetch_assoc();
            $_SESSION["teacher_id"] = $row["teacher_id"];
            $_SESSION['teacher_name'] =  $row["teacher_name"];
            $_SESSION["teacher_batch"] = $row["teacher_batch"];
            $_SESSION["teacher_department"] = $row["teacher_dept"];
            echo json_encode(array("status" => "success", "name" => $row["teacher_name"]));
        } else {
            echo json_encode(array("status" => "error", "message" => "mismatch"));
        }
    }
    else if ($_POST['functionr'] === 'logout') {
        session_destroy();
    }


    else if(isset($_POST['functionr']) && $_POST['functionr'] === 'register') {
        $selectedStream = $_POST['ss'];
        $selectedCourse = $_POST['sc'];
        $nameid = $_POST['name'];
        $emailid = $_POST['email'];      
        $ph = $_POST['ph'];
        $passwordField = $_POST['password'];
        								

        $sql = "insert into teacher(teacher_name, teacher_dept, teacher_batch, teacher_ph, teacher_email, teacher_password, teacher_status) VALUES('$nameid','$selectedStream','$selectedCourse','$ph','$emailid','$passwordField',1)";
        // VALUES('$selectedStream','$selectedCourse','$nameid','$emailid','$ph','$passwordField',1)";
        							

        if ($conn->query($sql)) {
            echo " Congratulations $nameid, Your account created successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    else{
        echo"no action(";
    }











    // else{
    //     unset($_SESSION['user_id']);
       
    //     session_destroy();
    //     header("HTTP/1.1 301 Moved Permanently");
    //     header("Location: login.php");
    //     exit();
        
    // }
    $conn->close();

?>


