$(document).ready(function () {
    $(".menu-button").click(function () {
        // Remove the yellow color from all menu items
        $(".menu-button").css("color", "#000");

        // Change the color of the clicked menu item to yellow
        $(this).css("color", "yellow");
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const clickableImages = document.querySelectorAll(".clickable-image");

    clickableImages.forEach(function (image) {
        image.addEventListener("click", function () {
            const link = image.getAttribute("data-href");
            window.location.href = link;
        })
    })
})
