<?php
    include 'connection.php'; 
?>

<!-- <html>
    <head>
    </head>
    <body>
        

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="js/registration.js"></script>
    </body>
</html> -->




<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Teacher Registration Form</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="less/registration.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    </head>

  <body>

    <form method="post" class="registration" id="registration">
        <h1>Teacher Registration Form</h1>

        <select class="mainDropdown" id="mainDropdown" onchange="populateSubDropdown()">
            <option value="">Department</option>
            <option value="computer_science">Computer Science</option>
            <option value="commerce">Commerce</option>
        </select>
        
        <span id="mainDropError" class="notvalid"></span>


        <select id="subDropdown" class="subDropdown">
            <option value="">Batch</option>
        </select>
        <span id="subDropError" class="notvalid"></span>


        <input type="text" id="name" name="name" placeholder="Enter your Name">
        <span id="nameError" class="notvalid"></span>

        <input type="email" id="email" name="email" placeholder="Enter your Email" pattern="^[^\s@]+@[^\s@]+\.[^\s@]+$" required>
        <span id="emailError" class="notvalid"></span>

        <input type="text" id="phoneNumber" name="phoneNumber" pattern="[0-9]{10}" placeholder="Enter your contact number" required>
        <span id="PhError" class="notvalid"></span>
        

        <input type="password" id="password" name="password" placeholder="Enter your Password">
        <span id="passwordError" class="notvalid"></span>

        <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm your Password">
        <span id="confirmPasswordError" class="notvalid"></span>

        <button type="button" class="btn_sub" id="btn_sub" onclick="submitForm()" >Submit</button>
        <a href="login.php">Already have an account?</a>
    </form>
        

    <!-- <h1>Hello, world!</h1> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="js/registration.js"></script>

</body>
</html>