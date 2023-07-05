$(document).ready(function () {
    // Handle checkbox change
    $(document).on("change", ".recommend-checkbox", function () {
        // Get the row with the hidden-row class.
        var $row = $(this).closest("tr.hidden-row");

        // Get the value of the criteria field
        var criteriaValue = $row.find(".criteria").val();

        // Perform client-side validation
        if (criteriaValue === "") {
            // Display error message for empty criteria field
            $(".message-container").html(
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">Criteria field is required.' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                    '<span aria-hidden="true">&times;</span></button></div>'
            );

            // Set a timeout to remove the error message after 3000 milliseconds (3 seconds)
            setTimeout(function () {
                $(".message-container").html(""); // Clear the message container
            }, 3000);

            return; // Stop further execution
        }

        // Get the values of the form elements in the row.
        var data = {
            criteria: criteriaValue,
            comments: $row.find(".comments").val(),
            accountId: $row.find(".recommend-checkbox").val(),
            recommend: $(this).is(":checked") ? 1 : 0,
        };

        // Send an Ajax request to the server.
        $.ajax({
            url: "recommend",
            type: "POST", // Change the request type to GET
            data: data,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                // If the request was successful, update the row with the hidden-row class.
                $row.removeClass("hidden-row");

                // Display success message
                $(".message-container").html(
                    '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Recommend Successfully</strong>' +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                        '<span aria-hidden="true">&times;</span></button></div>'
                );

                console.log("The request was successful.");
                console.log(response);

                // Set a timeout to remove the success message after 3000 milliseconds (3 seconds)
                setTimeout(function () {
                    $(".message-container").html(""); // Clear the message container
                }, 3000);
            },
            error: function (error) {
                // If the request failed, show an error message.
                alert(error);

                // Display error message
                $(".message-container").html(
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error Storing Item</strong>' +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                        '<span aria-hidden="true">&times;</span></button></div>'
                );

                // Set a timeout to remove the error message after 3000 milliseconds (3 seconds)
                setTimeout(function () {
                    $(".message-container").html(""); // Clear the message container
                }, 3000);
            },
        });
    });
});
