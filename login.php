<?php
    include 'connection.php'; 
?>
<html>
    <head>
        <link rel="stylesheet" href="less/login.css">
    </head>

    <body>
        <div class="loginform">
            <div class="headsection">
                LOGIN
            </div>
            <div class="dataSec" id="login">
                <input type="text" placeholder="Email" name="email" id="email" class="email">
                <input type="password" name="password" id="password"  placeholder="Password " class="password">
                <button type="button" onclick="login()"> Login </button>
                <div class="operations">
                    <a href="registration.php">Create new Account</a>
                    <a href="#fg">Forgot password?</a>
                </div>                
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="js/login.js"></script>
    </body>
</html>
