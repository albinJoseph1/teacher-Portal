<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="less/registration.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
      #productDropdown {
            /* Add your dropdown styles here */
            width: 100%;
            padding: 10px;
            border: 1px solid gray;
            background-color: white;
            border-radius: 5px;
            justify-content: space-evenly;
            /* //color: red; */

        }
        #productDropdown option {
            /* Style individual options */
            color: #333;
            padding: 10px;
            display: flex;
           

        }
        .item{
            color: red;
        }
        .hidden {
            display: none;
        }

    </style>
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
                    <a class="nav-link active" aria-current="page" href=""> Add Marklist </a>

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


    <div class="menu">
        <div class="SET">
            <div class="sub">
            <button onclick="toggleContainer()">filter</button>

            <div class="checkset">
                <input type="checkbox" id="select-all" name="select-all" placeholder="5"> Select all subjects &nbsp;&nbsp;
                <input type="checkbox" class="subjectCheckbox" data-subject="maths"> Maths &nbsp;&nbsp;
                <input type="checkbox" class="subjectCheckbox" data-subject="science"> Science &nbsp;&nbsp;
                <input type="checkbox" class="subjectCheckbox" data-subject="physics"> Physics &nbsp;&nbsp;
            </div>
            
                                
            </div>
            <div class="sub">
                <span>Sort by</span>
                <select name="cars" id="cars">
                    <option value="volvo">Roll number</option>
                    <option value="saab">Admission Number</option>
                    
                </select>
            </div>
        </div>

        <div class="SET">
            <div class="container" id="myContainer">
                <button id="rollFilter" onclick="rollfilter()">Roll Number between 5-10</button>
            </div>
        </div>

    </div>


    <table class="marklist" id="dataTable">
        <thead>
            <tr>
                <th>Roll Number</th>
                <th>Name</th>
                <th class="subject maths hidden">Maths</th>
                <th class="subject science hidden">Science</th>
                <th class="subject physics hidden">Physics</th>
            </tr>
        </thead>
        <tbody id="tableBody"></tbody>
    </table>



    <form method="post" class="registration" id="registration"  >
        <h1>Student Mark</h1>
        choose student:
        <select id="productDropdown"></select>
        <input type="number" id="maths" name="phoneNumber" pattern="[0-9]{10}" placeholder="Maths" required>
        <span id="mathsError" class="notvalid"></span>
        <input type="number" id="science" name="phoneNumber" pattern="[0-9]{10}" placeholder="Science" required>
        <span id="scienceError" class="notvalid"></span> 
        <input type="number" id="physics" name="phoneNumber" pattern="[0-9]{10}" placeholder="Physics" required>
        <span id="physicsError" class="notvalid"></span>

        
        <button type="button" class="btn_sub" id="btn_sub" onclick="addMark()" >Submit</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="js/loaduser.js"></script>
    <script src="js/addMark.js"></script>
    <script src="js/showMarkii.js"></script>

    <script>
  $(document).ready(function() {
    $(".subjectCheckbox").change(function() {
      var subject = $(this).data("subject");
      $("." + subject).toggle(this.checked);
    });
  });
</script>



  
</body>
</html>