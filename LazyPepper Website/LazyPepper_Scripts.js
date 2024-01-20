document.addEventListener("DOMContentLoaded", function () {
    // Page Buttons
    const pageButtons = document.getElementById("menu");
    const buyButton = document.getElementById("buyButton");

    // Formatting Elements (used when converting to mobile view)
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
    pageButtons.addEventListener("click", function () {
        // Change the URL to the About page when the About button is clicked
        window.location.href = pageButtons.href; // Replace with your desired URL
    });

    buyButton.addEventListener("click", function () {
        //localStorage.clear();
        sessionStorage.setItem("price", buyButton.title);
        // Change the URL to the Charcuterie page when the Charcuterie button is clicked
        window.location.href = buyButton.href; // Replace with your desired URL
    });

    // Add the rest of the button functions when those pages are finished

});


document.addEventListener("DOMContentLoaded", function () {
    const clickableImages = document.querySelectorAll(".clickable-image");
    const clickableImages2 = document.querySelectorAll(".clickable-image2");

    clickableImages.forEach(function (image) {
        image.addEventListener("click", function () {
            const link = image.getAttribute("data-href");
            window.location.href = link;
        });
    });

    clickableImages2.forEach(function (image) {
        image.addEventListener("click", function () {
            const link = image.getAttribute("data-href");
            window.location.href = link;
        });
    });
});
