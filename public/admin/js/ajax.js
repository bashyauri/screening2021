$(document).ready(function () {
    $(".expand-button").on("click", function () {
        $(this).closest("tr").next(".hidden-row").toggle();
        var button = $(this);
        var buttonText = button.text();

        if (buttonText === "+") {
            button.text("-");
        } else {
            button.text("+");
        }
    });

    //Initially hide the rows
    $(".hidden-row").hide();
});
