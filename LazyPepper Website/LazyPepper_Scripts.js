document.addEventListener("DOMContentLoaded", function () {
    // Get references to the buttons by their unique IDs
    const aboutButton = document.getElementById("aboutButton");
    const charcuterieButton = document.getElementById("charcuterieButton");
    const cuttingButton = document.getElementById("cuttingButton");
    const specialtyButton = document.getElementById("specialtyButton");
    const customButton = document.getElementById("customButton");
    const contactButton = document.getElementById("contactButton");
    const galleryButton = document.getElementById("galleryButton");
    const headerLogo = document.getElementById("header-logo");

    const hamburgerButton = document.getElementById("hamburger-button");
    const menu = document.getElementById("menu");

    const fullMenu = document.getElementById("fullMenu")
    const ogMenuLoc = fullMenu.style.top;
    const ogMenuWidth = fullMenu.style.width;
    const ogMenuHeight = fullMenu.style.height;

    const mainContainer = document.getElementById("mainContainer");
    const ogMainContainerPadding = mainContainer.style.paddingLeft;
    const ogMainContainerMarginTop = mainContainer.style.marginTop;

    hamburgerButton.addEventListener("click", function () {
        if (window.innerWidth <= 760) {
            if ($("#menu").css("display") === "block") {
                menu.style.display = "none";
                headerLogo.style.display = "none";
                fullMenu.style.top = "0px";
                fullMenu.style.width = "40px"; // "25px" "2%"
                fullMenu.style.height = "25px";
                //mainContainer.style.paddingLeft = "40px"; // "40px" "4%"
                mainContainer.style.marginTop = "5px";

            } else {
                menu.style.display = "block";
                headerLogo.style.display = "block";
                fullMenu.style.top = ogMenuLoc;
                fullMenu.style.width = ogMenuWidth;
                fullMenu.style.height = ogMenuHeight;
                //mainContainer.style.paddingLeft = ogMainContainerPadding;
                mainContainer.style.marginTop = ogMainContainerMarginTop;
            }

            // For Desktop displays
        } else {
            if ($("#menu").css("display") === "block") {
                menu.style.display = "none";
                headerLogo.style.display = "none";
                fullMenu.style.top = 0;
                fullMenu.style.width = "25px"; // "25px" "2%"
                mainContainer.style.paddingLeft = "40px"; // "40px" "4%"

            } else {
                menu.style.display = "block";
                headerLogo.style.display = "block";
                fullMenu.style.top = ogMenuLoc;
                fullMenu.style.width = ogMenuWidth;
                mainContainer.style.paddingLeft = ogMainContainerPadding;
            }

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
