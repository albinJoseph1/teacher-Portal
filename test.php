<!DOCTYPE html>
<html>
<head>
    <title>Subject Checkbox Table</title>
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>
<body>

<h2>Subject Checkbox Table</h2>

<input type="checkbox" class="subjectCheckbox" data-subject="maths"> Maths &nbsp;&nbsp;
<input type="checkbox" class="subjectCheckbox" data-subject="science"> Science &nbsp;&nbsp;
<input type="checkbox" class="subjectCheckbox" data-subject="physics"> Physics &nbsp;&nbsp;

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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $(".subjectCheckbox").change(function() {
            var subject = $(this).data("subject");
            $("." + subject).toggle(this.checked);
            if (!$('.subject').is(':visible')) {
                $('th, .subject').addClass('hidden');
            } else {
                $('th, .subject').removeClass('hidden');
            }
        });

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

                    response.forEach(function(row) {
                        tableBody.append('<tr><td>' + row.Rollnum + '</td><td>' + row.name + '</td><td class="maths hidden">' + row.sub1 + '</td><td class="science hidden">' + row.sub2 + '</td><td class="physics hidden">' + row.sub3 + '</td></tr>');
                    });
                } else {
                    $('#tableBody').html("<tr><td colspan='5'>No data to show</td></tr>");
                }
            },
            error: function(error) {
                console.error("Error: ", error);
            }
        });
    });
</script>

</body>
</html>
