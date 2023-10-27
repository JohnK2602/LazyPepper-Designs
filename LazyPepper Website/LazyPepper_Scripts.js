document.addEventListener("DOMContentLoaded", function () {
    // Get references to the buttons by their unique IDs
    const aboutButton = document.getElementById("aboutButton");
    const charcuterieButton = document.getElementById("charcuterieButton");
    const cuttingButton = document.getElementById("cuttingButton");
    const specialtyButton = document.getElementById("specialtyButton");
    const customButton = document.getElementById("customButton");
    const contactButton = document.getElementById("contactButton");
    const galleryButton = document.getElementById("galleryButton");

    const hamburgerButton = document.getElementById("hamburger-button");
    const menu = document.getElementById("menu");

    const fullMenu = document.getElementById("fullMenu")
    const ogMenuLoc = fullMenu.style.top
    const ogMenuWidth = fullMenu.style.width

    const mainContainer = document.getElementById("mainContainer");
    const ogMainContainerPadding = mainContainer.style.paddingLeft

    hamburgerButton.addEventListener("click", function () {
        if (menu.style.display === "block") {
            menu.style.display = "none";
            fullMenu.style.top = 0;
            fullMenu.style.width = fullMenu.style.padding;
            mainContainer.style.paddingLeft = mainContainer.style.marginTop;

        } else {
            menu.style.display = "block";
            fullMenu.style.top = ogMenuLoc;
            fullMenu.style.width = ogMenuWidth;
            mainContainer.style.paddingLeft = ogMainContainerPadding
        }
    });

    // Add click event listeners to the buttons
    aboutButton.addEventListener("click", function () {
        // Change the URL to the About page when the About button is clicked
        window.location.href = "About_Page.html"; // Replace with your desired URL
    });

    galleryButton.addEventListener("click", function () {
        // Change the URL to the Charcuterie page when the Charcuterie button is clicked
        window.location.href = "Gallery_Page.html"; // Replace with your desired URL
    });

    // Add the rest of the button functions when those pages are finished

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
