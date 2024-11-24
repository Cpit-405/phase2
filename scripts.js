
function focusFunction(id) {
    if (id == "name") {
        document.getElementById(id).placeholder = "John";

    }
    if (id == "email") {
        document.getElementById(id).placeholder = "example@example.com";
    }
    if (id == "message") {
        document.getElementById(id).placeholder = "Feel Free to write your feedback!";
    }

    if (id == "feedback-type") {
        document.getElementById(id).style.backgroundColor = "black";
    }
}
function blurFunction(id) {
    if (id == "name") {
        document.getElementById(id).placeholder = "";

    }
    if (id == "email") {
        document.getElementById(id).placeholder = "";
    }
    if (id == "message") {
        document.getElementById(id).placeholder = "";
    }

    if (id == "feedback-type") {
        document.getElementById(id).style.backgroundColor = "";
    }
}

// Validate email format
function validateEmail(emailFieldId, feedbackId) {
    const emailField = document.getElementById(emailFieldId);
    const emailFeedback = document.getElementById(feedbackId);
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (emailField && emailFeedback) {
        if (emailPattern.test(emailField.value)) {
            emailFeedback.textContent = "Valid email address";
            emailFeedback.style.color = "green";
            emailField.setCustomValidity(""); // Clear custom validity
        } else {
            emailFeedback.textContent = "Invalid email format";
            emailFeedback.style.color = "red";
            emailField.setCustomValidity("Invalid email format"); // Set custom validity
        }
    }
}


function validatePassword(passwordId, confirmPasswordId, strengthFeedbackId, matchFeedbackId) {
    const passwordField = document.getElementById(passwordId);
    const confirmPasswordField = document.getElementById(confirmPasswordId);
    const strengthFeedback = document.getElementById(strengthFeedbackId);
    const matchFeedback = document.getElementById(matchFeedbackId);

    const strongPasswordPattern = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    // Validate password strength
    if (strongPasswordPattern.test(passwordField.value)) {
        strengthFeedback.textContent = "Strong password";
        strengthFeedback.style.color = "green";
        passwordField.setCustomValidity(""); // Clear custom validity
    } else {
        strengthFeedback.textContent = "Weak password: use 8+ characters, including uppercase, number, and special character.";
        strengthFeedback.style.color = "red";
        passwordField.setCustomValidity("Weak password");
    }

    // Validate password confirmation
    if (confirmPasswordField.value === passwordField.value) {
        matchFeedback.textContent = "Passwords match";
        matchFeedback.style.color = "green";
        confirmPasswordField.setCustomValidity(""); // Clear custom validity
    } else {
        matchFeedback.textContent = "Passwords do not match";
        matchFeedback.style.color = "red";
        confirmPasswordField.setCustomValidity("Passwords do not match");
    }
}


// Function to focus the curser on the search bar when the key / is pressed
function focusSearchOnSlash() {
    document.addEventListener("keydown", function (event) {
        // Check if the pressed key is `/` and if no input field is already focused
        if (event.key === "/" && document.activeElement.tagName !== "INPUT" 
            && document.activeElement.tagName !== "TEXTAREA") {
            const searchInput = document.getElementById("search-bar");
            if (searchInput) {
                searchInput.focus(); // Set focus to the search bar
            }
        }
    });
}

focusSearchOnSlash();


function addHoverEffectToImages(selectors) {

    document.addEventListener("DOMContentLoaded", () => {
        selectors.forEach((selector) => {
            const images = document.querySelectorAll(selector);
            console.log(`Images found for selector "${selector}":`, images.length);

            images.forEach((img) => {
                img.addEventListener("mouseover", () => {
                    console.log(`Hover in on selector "${selector}":`, img);
                    img.style.transform = "scale(1.2)";
                    img.style.transition = "transform 0.3s ease";
                });

                img.addEventListener("mouseout", () => {
                    console.log(`Hover out on selector "${selector}":`, img);
                    img.style.transform = "scale(1)";
                });
            });
        });
    });
}

addHoverEffectToImages([".category-img", ".game-img"]);


// Confirmation on form submission and reset
function feedbackConfirm(){
    var form = document.getElementById("form");

    if (form) {
      form.addEventListener("submit", function (event) {
        const isConfirmed = confirm(
          "Are You Sure You Want To Send Your Feedback?"
        );
        if (!isConfirmed) {
          event.preventDefault();
        }
      });

      form.addEventListener("reset", function (event) {
        const isConfirmed = confirm("Are you sure you want to reset the form?");
        if (!isConfirmed) {
          event.preventDefault();
        }
      });
    }
}

function signupConfirm(){
    var signupForm = document.getElementById("signup-form");
    if (signupForm) {
        signupForm.addEventListener("submit", function (event) {
            const isConfirmed = confirm("Do you want to proceed with the sign-up?");
            if (!isConfirmed) {
                event.preventDefault();
            }
        });

        signupForm.addEventListener("reset", function (event) {
            const isConfirmed = confirm("Are you sure you want to reset the sign-up form?");
            if (!isConfirmed) {
                event.preventDefault();
            } 
        });
}
}
function init() {
   
feedbackConfirm();
  signupConfirm();
}

// Initialize validation logic on page load
window.addEventListener("load", init);

