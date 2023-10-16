document.addEventListener("DOMContentLoaded", function () {
    // Get references to the buttons by their unique IDs
    const aboutButton = document.getElementById("aboutButton");
    const charcuterieButton = document.getElementById("charcuterieButton");
    const cuttingButton = document.getElementById("cuttingButton");
    const specialtyButton = document.getElementById("specialtyButton");
    const customButton = document.getElementById("customButton");
    const contactButton = document.getElementById("contactButton");
    const galleryButton = document.getElementById("galleryButton");


    // Add click event listeners to the buttons
    aboutButton.addEventListener("click", function () {
        // Change the URL to the About page when the About button is clicked
        window.location.href = "About_Page.html"; // Replace with your desired URL
    });

    galleryButton.addEventListener("click", function () {
        // Change the URL to the Charcuterie page when the Charcuterie button is clicked
        window.location.href = "Gallery_Page.html"; // Replace with your desired URL
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
