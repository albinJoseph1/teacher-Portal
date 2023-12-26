

document.addEventListener("DOMContentLoaded", function() {

    var nameField = document.getElementById("name");

    nameField.addEventListener("input", validateName);

   // alert('load2');
   table();

   
    $.ajax({
        type: "GET",
        url: "addStudent.php",
        data: {
          functionr: 'dropdown',
        },
        dataType: "json",
        success: function(response) {
            var dropdown = $('#productDropdown');
            $.each(response, function(index, item) {
                dropdown.append($('<option></option>').attr('value', item.rollnumber).text(item.stu_name));
            });
        },
        error: function(xhr, status, error) {
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
    var roll = document.getElementById("roll").value;

    validateName();
   
    var errorMessages = document.querySelectorAll(".notvalid");
    var isValid = true;
    errorMessages.forEach(function(errorMessage) {
      if (errorMessage.textContent !== "") {
        isValid = false;
      }
    });

    if (isValid) {
      alert(name + ph);
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
                alert(response);
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
  alert();
  var maths = document.getElementById("maths").value;
  var science = document.getElementById("science").value;
  var physics = document.getElementById("physics").value;

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

        maths: maths,
        science:science,
        physics,physics
      },

      success: function(response) {
              // $('#messageModal').modal('show');
              // $('#modalMessage').text(response);
              // $('#username').val('');
              alert(response);
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
