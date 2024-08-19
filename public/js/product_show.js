// highlight review when navigate from account
document.addEventListener("DOMContentLoaded", function () {
    if (window.location.hash) {
        const targetElement = document.querySelector(window.location.hash);
        if (targetElement) {
            // Scroll to the element
            targetElement.scrollIntoView({
                behavior: "smooth",
                block: "center",
            });

            // Add the highlight class
            targetElement.classList.add("highlight");

            // Remove the highlight after a delay
            setTimeout(() => {
                targetElement.classList.remove("highlight");
            }, 1000); // Adjust the time as needed
        }
    }
});

//
// write review: start
const reviewInput = $("#review-input");

async function checkLogin() {
    const checkLogin = $.ajax({
        url: "http://127.0.0.1:8000/api/check-login-ajax",
        method: "GET",
        success: function (response) {},
        error: function () {},
    });
    return checkLogin;
}

async function recommentLogin(element) {
    const isLogin = await checkLogin();

    if (!isLogin.authenticated) {
        element.attr("data-modal-target", "popup-modal");
        element.attr("data-modal-toggle", "popup-modal");
    } else {
        element.attr("data-modal-target", "");
        element.attr("data-modal-toggle", "");
    }
}
recommentLogin($("#review-form-field"));

// write review: end

// like/dislike comment: start

// like/dislike comment: end
