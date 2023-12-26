$.ajax({
    url: 'registrationAndLogin.php',
    method: 'POST',
    data: {
        functionr: 'username',
    },
    //dataType: 'json',
    success: function(response) {
        //alert(response);
        // Check if response.sessionValue exists and is valid
        // if (response && response !== undefined) {
            document.getElementById("username").innerHTML = response;
        // } else {
        //     alert("Invalid response from the server");
        // }
    },
    error: function( error) {
        alert("Error here: " + error);
    }
});
