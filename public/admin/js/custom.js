$(document).ready(function () {
    $("#current_password").keyup(function () {
        var current_password = $("#current_password").val();
        // console.log("Current password: " + current_password);
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "POST",
            url: "check-admin-password",
            data: { current_password: current_password },
            success: function (response) {
                if (response === "false") {
                    $("#check_password").html(
                        "<font color='red'>Current Password is incorrect!</font>"
                    );
                } else if (response === "true") {
                    $("#check_password").html(
                        "<font color='green'>Current Password is Correct!</font>"
                    );
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            },
        });
    });
});
