$(document).ready(function () {
    $(".search-course").click(function (event) {
        event.preventDefault();

        // Retrieve the search parameters from the form
        let courseId = $("#course_id").val();
        $("#result").html("Loading...");

        // Send the AJAX request to the server
        $.ajax({
            url: "search-course-applicants",
            method: "GET",
            dataType: "html",
            data: {
                courseId: courseId,
            },
            success: function (response) {
                // Handle success response

                $("#result").html(response);
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText); // Display the exact error message
            },
        });
    });
});
