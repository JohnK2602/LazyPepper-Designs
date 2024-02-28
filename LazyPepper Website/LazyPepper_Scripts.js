document.addEventListener("DOMContentLoaded", function () {
    // Page Buttons
    const pageButtons = document.getElementById("menu");

    // Add click event listeners to the buttons
    pageButtons.addEventListener("click", function () {
        // Change the URL to the About page when the About button is clicked
        window.location.href = pageButtons.href; // Replace with your desired URL
    });

    document.addEventListener("DOMContentLoaded", function () {
        document.querySelector('table').addEventListener('click', function (e) {
            if (e.target && e.target.classList.contains('remove-btn')) {
                window.location.reload();
            }

        });

    });

});

function setCookie(name, value, days) {
    const expires = new Date();
    expires.setTime(expires.getTime() + days * 24 * 60 * 60 * 1000);
    document.cookie = `${name}=${value};expires=${expires.toUTCString()};path=/`;
}

function getCookie(name) {
    const cookieName = `${name}=`;
    const cookies = document.cookie.split(';');
    for (let i = 0; i < cookies.length; i++) {
        let cookie = cookies[i].trim();
        if (cookie.indexOf(cookieName) === 0) {
            return cookie.substring(cookieName.length, cookie.length);
        }
    }
    return null;
}

if (JSON.stringify(currentCart) !== getCookie('cart')) {
    setCookie('cart', JSON.stringify(currentCart), 1);
}

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
