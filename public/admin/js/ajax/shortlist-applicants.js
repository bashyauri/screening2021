$(document).ready(function () {
    $(".shortlist-checkbox").change(function () {
        var accountId = $(this).val();
        var isChecked = $(this).is(":checked");
        var messageContainer = $(this).closest("tr").find(".message-container");

        // Send AJAX request to update the table based on the account_id and checkbox state
        $.ajax({
            url: "shortlist-applicants", // Replace with your Laravel route
            method: "POST", // or 'GET' depending on your route configuration
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                accountId: accountId,
                checked: isChecked,
            },
            success: function (response) {
                console.log(accountId);
                messageContainer
                    .text("shortlisted successfully")
                    .removeClass("error")
                    .addClass("success text-success");
                // Handle the response and update the table as needed
                // You can update the specific row or the entire table
            },
            error: function (xhr, status, error) {
                // Handle error if any
                messageContainer
                    .text("shortlisting failed")
                    .removeClass("success")
                    .addClass("error text-danger");
            },
        });
    });
});
