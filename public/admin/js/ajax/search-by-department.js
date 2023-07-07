$(document).ready(function () {
    $(".search-department").click(function (event) {
        event.preventDefault();

        // Retrieve the search parameters from the form
        let departmentId = $("#department_id").val();
        $("#search-by-department").html("Loading...");

        // Send the AJAX request to the server
        $.ajax({
            url: "search-recommended-by-department",
            method: "GET",
            dataType: "html",
            data: {
                departmentId: departmentId,
            },
            success: function (response) {
                // Handle success response

                $("#search-by-department").html(response);
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText); // Display the exact error message
            },
        });
    });
});
