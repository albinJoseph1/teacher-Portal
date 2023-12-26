var selectedStream = "";
var selectedCourse = "";


document.addEventListener("DOMContentLoaded", function() {

    var nameField = document.getElementById("name");
    var emailField = document.getElementById("email");
    var phoneNumber = document.getElementById("phoneNumber");
    var passwordField = document.getElementById("password");
    var confirmPasswordField = document.getElementById("confirmPassword");

    nameField.addEventListener("input", validateName);
    phoneNumber.addEventListener("input", validPhoneNumber);
    emailField.addEventListener("input", validateEmail);
    passwordField.addEventListener("input", validatePassword);
    confirmPasswordField.addEventListener("input", validateConfirmPassword);

});
var selectedValue=null;

function populateSubDropdown() {
  var mainDropdown = document.getElementById("mainDropdown");
  var subDropdown = document.getElementById("subDropdown");
  
  selectedStream = mainDropdown.value;
  
  subDropdown.innerHTML = "";
  
  if (selectedStream === "computer_science") {
      subDropdown.options.add(new Option("BCA", "bca"));
      subDropdown.options.add(new Option("MCA", "mca"));
  } else if (selectedStream === "commerce") {
      subDropdown.options.add(new Option("B.Com", "bcom"));
      subDropdown.options.add(new Option("M.Com", "mcom"));
  }

  selectedCourse = subDropdown.value;

}

function validateName() {
    var name = document.getElementById("name").value;
    var nameError = document.getElementById("nameError");

    if (name === "") {
      nameError.textContent = "Please enter your name.";
    } else {
      nameError.textContent = "";
    }
}

function validPhoneNumber() {
  var phoneNumber = document.getElementById("phoneNumber").value;
  var PhError = document.getElementById("PhError");

  if (phoneNumber === "") {
    PhError.textContent = "Please enter your phone number.";
  } else {
    PhError.textContent = "";
  }
}

function validateEmail() {
    var email = document.getElementById("email").value;
    var emailError = document.getElementById("emailError");

    if (email === "") {
      emailError.textContent = "Please enter your email.";
    } else {
      emailError.textContent = "";
    }
  }

  function validatePassword() {
    var password = document.getElementById("password").value;
    var passwordError = document.getElementById("passwordError");

    if (password === "") {
      passwordError.textContent = "Please enter a password.";
    } else {
      passwordError.textContent = "";
    }
  }

  function validateConfirmPassword() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmPassword").value;
    var confirmPasswordError = document.getElementById("confirmPasswordError");

    if (confirmPassword === "") {
      confirmPasswordError.textContent = "Please confirm your password.";
    } else if (password !== confirmPassword) {
      confirmPasswordError.textContent = "Passwords do not match.";
    } else {
      confirmPasswordError.textContent = "";
    }
  }

  function submitForm() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var ph = document.getElementById("phoneNumber").value;
    var password = document.getElementById("password").value;
    var ss=selectedStream;
    var sc=selectedCourse;

    validateName();
    validPhoneNumber();
    validateEmail();
    validatePassword();
    validateConfirmPassword();

    var errorMessages = document.querySelectorAll(".notvalid");
    var isValid = true;
    errorMessages.forEach(function(errorMessage) {
      if (errorMessage.textContent !== "") {
        isValid = false;
      }
    });

    if (isValid) {
      $.ajax({
        url: 'registrationAndLogin.php',
        method: 'POST',
        data: {
          submit:true,
          functionr: 'register',
          ss:ss,
          sc:sc,
          name: name,
          email: email, 
          ph:ph,
          password: password
        },

        success: function(response) {
                // $('#messageModal').modal('show');
                // $('#modalMessage').text(response);
                // $('#username').val('');
                alert(response);
                // alert("Registration successfully!");
                window.location.href="login.php";
        },
        error: function(error) {
          alert("error area"+error);

        //console.error(error);
        },
      });
      document.getElementById("registration").reset();
    }
  }


function login(){
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;
  alert(email);

  $.ajax({
    url: 'login.php',
    method: 'POST',
    data: {email: email, password: password },

    success: function(response) {
      alert("block22");
      window.location.href="home.html";

    },
    error: function(xhr, status, error) {
    console.error(error);
    },
  });
  window.location.assign("home.html");

}