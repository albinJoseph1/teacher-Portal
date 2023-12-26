function login(){
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    alert(email);

    $.ajax({
      url: 'registrationAndLogin.php',
      method: 'POST',
      data: {
        functionr: 'login',
        email: email,
        password: password
    },
    dataType: 'json',
    success: function(response) {
        if (response.status === "success") {
            alert("Welcome, " + response.name);
            window.location.href = 'home.php';
        } else if (response.status === "error") {
            alert("Error: " + response.message);
        } else {
            alert("Unknown response"); 
        }
    },    
    error: function(error) {
        alert("Error: " + error);
        //console.error(error);
    },

  });
  alert("completed");

}