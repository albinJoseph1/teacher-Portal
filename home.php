<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="less/registration.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  
</head>
  <body>
  <nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container-fluid ">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
                <div class="navbar-nav me-auto mb-2 mb-lg-0">
                    <a class="nav-link active" aria-current="page" href="home.php">Add Student</a>
                    <a class="nav-link " aria-current="page" href="addMark.php"> Add Marklist </a>

                </div>
                <div class="navbar-nav left">
                <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664z"/>
                </svg>
                    <span id="username">my account</span>
                    <a class="nav-link " aria-current="page" onclick="logout()">Logout </a>
                </div> 

            </div>
        </div>
    </nav>

<br>    
<div class="menu">
    <button onclick="toggleContainer()">filter</button>

        <span>Sort by</span>
        <select name="cars" id="cars">
            <option value="volvo">Roll number</option>
            <option value="saab">Admission Number</option>
            
        </select>
    </div>
    
    <table class="studentTable" id="dataTable">
        <thead>
            <tr>
                <th>Admission Number</th>
                <th>Name</th>
                <th>Contact Number</th>
                <th>Roll Number</th>
                <!-- Add other column headers -->
            </tr>
        </thead>
        <tbody id="tableBody"></tbody>
    </table>





    <form method="post" class="registration" id="registration">
        <h1>New Student</h1>

        <input type="text" id="roll" name="name1" placeholder="Enter Roll Number">
        <span id="Roll" class="notvalid"></span>

        <input type="text" id="name" name="name" placeholder="Enter Student Name">
        <span id="nameError" class="notvalid"></span>

        <input type="tel" id="phoneNumber" name="phoneNumber" pattern="[0-9]{10}" placeholder="Enter student contact number" required>
        <span id="PhError" class="notvalid"></span>

        <button type="button" class="btn_sub" id="btn_sub" onclick="submitForm()" >Submit</button>
        <a href="login.php">Already have an account?</a>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="js/addStudent.js"></script>
    <script src="js/loaduser.js"></script>

  
</body>
</html>