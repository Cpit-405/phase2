// TASK1
// a: add Focus on form fields
function focusFunction(id) {
    if(id == "name"){
        document.getElementById(id).placeholder = "John";  
       
    }
    if(id == "email"){
        document.getElementById(id).placeholder = "emaple@example.com";   
    }
    if(id == "message"){
        document.getElementById(id).placeholder = "Feel Free to write your feedback!"; 
    }

    if(id == "feedback-type"){
        document.getElementById(id).style.backgroundColor = "black";  
    }
}
function blurFunction(id) {
    if(id == "name"){
        document.getElementById(id).placeholder = "";  
       
    }
    if(id == "email"){
        document.getElementById(id).placeholder = "";   
    }
    if(id == "message"){
        document.getElementById(id).placeholder = ""; 
    }

    if(id == "feedback-type"){
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

// Check form validity and enable/disable submit button
// function checkFormValidity(formId, submitButtonId) {
//     const form = document.getElementById(formId);
//     const submitButton = document.getElementById(submitButtonId);

//     if (form && submitButton) {
//         submitButton.disabled = !form.checkValidity(); // Enable if the form is valid, disable otherwise
//     }
// }

// Function to focus the curser on the search bar when the key / is pressed
function focusSearchOnSlash() {
    document.addEventListener("keydown", function(event) {
        // Check if the pressed key is `/` and if no input field is already focused
        if (event.key === "/" && document.activeElement.tagName !== "INPUT" && document.activeElement.tagName !== "TEXTAREA") {
            event.preventDefault(); // Prevent the default action of `/` if necessary
            const searchInput = document.getElementById("search-bar");
            if (searchInput) {
                searchInput.focus(); // Set focus to the search bar
            }
        }
    });
}

focusSearchOnSlash();


// Confirmation on form submission and reset
function init() {
    const form = document.getElementById("feedback-form");
    const submitButton = document.getElementById("feedback-submit");

    if (form) {
        form.addEventListener("submit", function(event) {
            const isConfirmed = confirm("Are You Sure You Want To Send Your Feedback?");
            if (!isConfirmed) {
                event.preventDefault();
            }
        });

        form.addEventListener("reset", function(event) {
            const isConfirmed = confirm("Are you sure you want to reset the form?");
            if (!isConfirmed) {
                event.preventDefault();
            } else {
                document.getElementById("feedback-email-feedback").textContent = ""; // Clear feedback messages
            }
        });
    }
    // For signup form
    const signupForm = document.getElementById("signup-form");
    const signupSubmitButton = document.getElementById("signup-submit");

    if (signupForm) {
        signupForm.addEventListener("submit", function(event) {
            const isConfirmed = confirm("Do you want to proceed with the signup?");
            if (!isConfirmed) {
                event.preventDefault();
            }
        });

        signupForm.addEventListener("reset", function(event) {
            const isConfirmed = confirm("Are you sure you want to reset the signup form?");
            if (!isConfirmed) {
                event.preventDefault();
            } else {
                document.getElementById("password-feedback").textContent = ""; // Clear password feedback
                document.getElementById("password-confirmation-feedback").textContent = ""; // Clear password confirmation feedback
                document.getElementById("signup-email-feedback").textContent = ""; // Clear email feedback
            }
        });
    }
}

// Initialize validation logic on page load
window.addEventListener("load", init);

