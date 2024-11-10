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

// Function to validate email format
function validateEmail() {
    const emailField = document.getElementById("email");
    const emailFeedback = document.getElementById("email-feedback");
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (emailPattern.test(emailField.value)) {
        emailFeedback.textContent = "Valid email address";
        emailFeedback.style.color = "green";
    } else {
        emailFeedback.textContent = "Invalid email format";
        emailFeedback.style.color = "red";
    }
}

// Function to validate password strength
function validatePasswordStrength() {
    const passwordField = document.getElementById("password");
    const passwordFeedback = document.getElementById("password-feedback");
    const strongPasswordPattern = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    if (strongPasswordPattern.test(passwordField.value)) {
        passwordFeedback.textContent = "Strong password";
        passwordFeedback.style.color = "green";
    } else {
        passwordFeedback.textContent = "Weak password: use 8+ characters, including uppercase, number, and special character.";
        passwordFeedback.style.color = "red";
    }
}

// Function to confirm password matching
function validatePasswordConfirmation() {
    const passwordField = document.getElementById("password");
    const confirmPasswordField = document.getElementById("password_confirmation");
    const passwordFeedback = document.getElementById("password-confirmation-feedback");

    if (confirmPasswordField.value === passwordField.value) {
        passwordFeedback.textContent = "Passwords match";
        passwordFeedback.style.color = "green";
    } else {
        passwordFeedback.textContent = "Passwords do not match";
        passwordFeedback.style.color = "red";
    }
}

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


// c: add Confirmation to form submition
function init() {
    var form = document.getElementById("form");
    if (form) {
        form.addEventListener("submit", function(event) {
            var isConfirmed = confirm("Are You Sure You Want To Send Your Feedback?");
            if (!isConfirmed) {
                event.preventDefault(); 
            }
        });

        form.addEventListener("reset", function(event) {
            var isConfirmed = confirm("Are you sure you want to reset the form?");
            if (!isConfirmed) {
                event.preventDefault();
            } else {
                document.getElementById("name").value = "";
                document.getElementById("email").value = "";
                document.getElementById("feedback-type").value = "";
                document.getElementById("message").value = "";
            }
        });
    } else {
        console.log("Form element not found!");
    }
}

// Ensure init is only called once the page loads
window.addEventListener("load", init, false);

