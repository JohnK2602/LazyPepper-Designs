$(document).ready(function () {
    $(".menu-button").click(function () {
        // Remove the yellow color from all menu items
        $(".menu-button").css("color", "#000");

        // Change the color of the clicked menu item to yellow
        $(this).css("color", "yellow");
    });
});

