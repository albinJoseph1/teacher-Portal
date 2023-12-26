
var rollNumber =null;
document.addEventListener("DOMContentLoaded", function() {
 
   
    $.ajax({
        type: "Post",
        url: "addmarki.php",
        data: {
          functionr: 'dropdown',
        },
        dataType: "json",
        success: function(response) {

          

          if (response.hasOwnProperty('message')) {
            var dropdown = $('#productDropdown');

            var unselectableOption = $('<option disabled selected value="">No student data is avilable!!</option>');
            dropdown.append(unselectableOption);
            //dropdown.append($('<option disabled selected value="">there is no students!!</option>'));

          } 
          else {
            var dropdown = $('#productDropdown');
            $.each(response, function(index, item) {
              //ropdown.append($('<option></option>').attr('value', item.product_id).text(item.product_name));
              dropdown.append($('<option value="' + item.stu_id + '">Roll number: ' +item.rollnumber+' Name:'+item.stu_name +'</div></option>'));
              // dropdown.append($('<option></option>').attr('value', item.stu_name).text(item.stu_name));
            });
          }
        },
        error: function(xhr, status, error) {
          alert("error0"+xhr.responseText);
            console.error(error);
        }
    });
});
   


function validateName() {
    var name = document.getElementById("name").value;
    var nameError = document.getElementById("nameError");

    if (name === "") {
      nameError.textContent = "Please enter your name.";
    } else {
      nameError.textContent = "";
    }
}

  function submitForm() {
    var name = document.getElementById("name").value;
    var ph = document.getElementById("phoneNumber").value;
    var roll = document.getElementById("productDropdown").value;

    validateName();
   
    var errorMessages = document.querySelectorAll(".notvalid");
    var isValid = true;
    errorMessages.forEach(function(errorMessage) {
      if (errorMessage.textContent !== "") {
        isValid = false;
      }
    });

    if (isValid) {
      $.ajax({
        url: 'addStudent.php',
        method: 'POST',
        data: {
          submit:true,
          function: 'addStudent',

          name: name,
          ph:ph,
          roll,roll
        },

        success: function(response) {
                // $('#messageModal').modal('show');
                // $('#modalMessage').text(response);
                // $('#username').val('');
                alert("Registration successfully!");
                table();
                // window.location.href="login.php";
        },
        error: function(error) {
          alert("error area"+error);

        //console.error(error);
        },
      });
      document.getElementById("registration").reset();
    }
  }


function table(){
  $.ajax({
    type: "POST",
    url: "addStudent.php",
    data: {
      function: 'StudentList',
    },
    dataType: "json",

    success: function(response) {
      // alert("34242342"+response);
        if (response.length > 0) {
            var tableBody = $('#tableBody');
            tableBody.empty();

            response.forEach(function(row) {
                tableBody.append('<tr><td>' + row.stu_id + '</td><td>' + row.stu_name + '</td><td>' + row.stu_ph + '</td><td>' + row.rollnumber + '</td></tr>');
                // Append other columns if needed
            });
        } else {
            $('#tableBody').html("<tr><td colspan='2'>No data to show</td></tr>");
        }
    },
    error: function(error) {
        console.error(error);
    }
});
 }


 function addMark(){

  var maths = document.getElementById("maths").value;
  var science = document.getElementById("science").value;
  var physics = document.getElementById("physics").value;
  var rollNumber = document.getElementById("productDropdown").value;

  //validateName();
   
  var errorMessages = document.querySelectorAll(".notvalid");
  var isValid = true;
  errorMessages.forEach(function(errorMessage) {
    if (errorMessage.textContent !== "") {
      isValid = false;
    }
  });

  if (isValid) {
    $.ajax({
      url: 'addStudent.php',
      method: 'POST',
      data: {
        submit:true,
        function: 'addmark',
        rollNumber:rollNumber,
        maths: maths,
        science:science,
        physics,physics
      },

      success: function(response) {
              // $('#messageModal').modal('show');
              // $('#modalMessage').text(response);
              // $('#username').val('');
              alert("Registration successfully!");
              table();
              // window.location.href="login.php";
      },
      error: function(error) {
        alert("error area"+error);

      //console.error(error);
      },
    });
    document.getElementById("registration").reset();
  }


 }

 function logout(){

  $.ajax({
    type: "Post",
    url: 'registrationAndLogin.php',
    data: {
      functionr: 'logout',
    },
    success: function(response) {
      
       window.location.href = 'login.php';

        
    },
    error: function(xhr, status, error) {
      alert("error"+xhr.responseText);
        console.error(error);
    }
});
 }












 // Assuming this is your dropdown change event handler
$('#productDropdown').on('change', function() {
  var selectedValue = $(this).val(); // Get the selected value
   rollNumber = selectedValue.split(' ')[2]; // Extract roll number from the combined value

  // Pass the selected value to another function
  anotherFunction(rollNumber);
});

function anotherFunction(selectedValue) {
  // Do something with the selected value
  console.log('Selected value:', selectedValue);
  // You can perform any other actions with the selected value here
  return selectedValue;
}
