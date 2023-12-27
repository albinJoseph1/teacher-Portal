

document.addEventListener("DOMContentLoaded", function() {
  
   table();
 
});
   


function table(){
    $.ajax({
        type: "POST",
        url: "addmarki.php",
        data: {
            functionr: 'markList',
            roll: 'true'
        },
        dataType: "json",
        success: function(response) {
            if (response.length > 0) {
                var tableBody = $('#tableBody');
                tableBody.empty();

                tableBody.append('<th>Roll Number</th><th>Name</th><td id="subject1-header">Maths</td><td id="subject2-header">Science</td><td id="subject3-header">Physics</td>');
    
                response.forEach(function(row) {
                    tableBody.append('<tr><td>' + row.Rollnum + '</td><td>' + row.name + '</td><td class="maths">' + row.sub1 + '</td><td class="science">' + row.sub2 + '</td><td class="physics">' + row.sub3 + '</td></tr>');
                });
    
                // Show/hide columns based on checkbox status
                $(".subjectCheckbox").change(function() {
                    var subject = $(this).data("subject");
                    $("." + subject).toggle(this.checked);
                    if (!$('.subject').is(':visible')) {
                        $('th, .subject').addClass('hidden');
                        $('td, .subject').addClass('hidden');
                    } else {
                        $('th, .subject').removeClass('hidden');
                    }
                });
                
            } else {
                $('#tableBody').html("<tr><td colspan='5'>No data to show</td></tr>");
            }
        },
        error: function(error) {
            alert("Error: " + error);
            console.error(error);
        }
    });
    
   }

function rollfilter(){
    $.ajax({
        type: "POST",
        url: "addmarki.php",
        data: {
          functionr: 'roll',
          roll: 'false'
        },
        dataType: "json",  
        success: function(response) {
            if (response.length > 0) {

                var tableBody = $('#tableBody');
                tableBody.empty();

                response.forEach(function(row) {

                    tableBody.append('<tr><td>' + row.Rollnum + '</td><td>' + row.name + '</td><td class="subject1">' + row.sub1 + '</td><td class="subject2">' + row.sub2 + '</td><td class="subject3">' + row.sub3 + '</td></tr>');

                    //  tableBody.append('<tr><td>' + row.Rollnum + '</td><td>' + row.name + '</td><td >' + row.sub1 + '</td><td>' + row.sub2 + '</td><td>' + row.sub3 + '</td></tr>');
                    //tableBody.append('<tr><td>' + row.Rollnum + '</td><td>' + row.name + '</td></tr>');
                });
            } else {
                $('#tableBody').html("<tr><td colspan='2'>No data to show</td></tr>");
            }
        },
        // error: function(error) {
        //   alert("Error5: " + error);
        //     console.error(error);
        // }

        error: function(jqXHR, textStatus, errorThrown) {
            alert("Error: " + textStatus + " - " + errorThrown);
            console.error("AJAX Error:", jqXHR.responseText);
        }
    });


}




   function toggleContainer() {
    var container = document.getElementById("myContainer");
    container.classList.toggle("active");
  }