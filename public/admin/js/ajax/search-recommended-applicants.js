$(document).ready(function () {
    $(".search-recommended-applicants").click(function (event) {
        event.preventDefault();

        // Retrieve the search parameters from the form
        let courseId = $("#course_id").val();
        $("#recommended-result").html("Loading...");

        // Send the AJAX request to the server
        $.ajax({
            url: "search-recommended-applicants-course",
            method: "GET",
            dataType: "html",
            data: {
                courseId: courseId,
            },
            success: function (response) {
                // Handle success response

                $("#recommended-result").html(response);
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText); // Display the exact error message
            },
        });
    });
});
