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
                    <a class="nav-link " aria-current="page" href="home.php">Add Student</a>
                    <a class="nav-link " aria-current="page" href=""> Add Marklist </a>
                    <a class="nav-link active" aria-current="page" href=""> Show Marklist </a>
                </div>
                <div class="navbar-nav">
                <a class="nav-link " aria-current="page" onclick="logout()">Logout </a>
                </div> 

            </div>
        </div>

    </nav>
<br>    
    <table class="marklist" id="dataTable">
        <thead>
            <tr>
                <th>Number</th>
                <th>Roll Number</th>
                <th>Name</th>
                <th>sub1</th>
                <th>sub2</th>
                <th>sub3</th>
                <!-- <th>action</th> -->

             

            </tr>
        </thead>
        <tbody id="tableBody"></tbody>
    </table>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="js/showMarkii.js"></script>
  
</body>
</html>