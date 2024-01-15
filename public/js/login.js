// Get the form element
const form = document.querySelector(".form-login");
//  id alert
const alert = document.querySelector(".alert");
// id remember
const remember = document.getElementById("remember");
const usernameInput = document.getElementById("username");
const passwordInput = document.getElementById("password");
function showAlert(message) {
    // check alert exist alert-danger
    if (!alert.classList.contains("alert-danger")) {
        alert.classList.remove("alert-success");
        alert.classList.add("alert-danger");
    }
    alert.classList.remove("d-none");
    alert.innerText = message;
}

// on type hide alert
form.addEventListener("keyup", function () {
    alert?.classList.add("d-none");
});

// Add event listener for form submission
form.addEventListener("submit", function (event) {
    // Prevent the form from submitting
    event.preventDefault();

    // Validate the form inputs

    if (usernameInput.value.trim() === "") {
        showAlert("Vui lòng nhập tên tài khoản");
        return;
    }

    if (passwordInput.value.trim() === "") {
        showAlert("Vui lòng nhập mật khẩu");
        return;
    }

    //check remember is checked save the username
    if (remember.checked) {
        localStorage.setItem("username", usernameInput.value);
    } else {
        localStorage.removeItem("username");
    }

    // If all inputs are valid, submit the form
    form.submit();
});

// function get username from localstorage and set value for username input
const username = localStorage.getItem("username");
if (username) {
    usernameInput.value = username;
    remember.checked = true;
}
