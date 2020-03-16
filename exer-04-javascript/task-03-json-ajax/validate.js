function validateForm() {
    let formField = document.getElementById('myForm');

    console.log(formField);
    formField.addEventListener('submit', formSubmit);
    
    // remove the event listener
    // formField.removeEventListener('submit', formSubmit);
}

function formSubmit(event) {
    let usernameField = document.getElementById('username');
    let passwordField = document.getElementById('password');
    let passwordRepeated = document.getElementById('passwordRepeated');

    let validFormData = {username: null, password: null};
    let errorFormData = {username: null, password: null};

    usernameValidator(usernameField.value, validFormData, errorFormData);
    passwordValidator(passwordField.value, passwordRepeated.value, validFormData, errorFormData);

    console.log(validFormData);
    console.log(errorFormData);

    // added this for debugging, disables form submittion
    event.preventDefault();
}

function usernameValidator(username, validFormData, errorFormData) {
    let usernamePattern = new RegExp(/^\w{3,10}$/);
    let usernameLength = username.length;

    if (username === "") {
        errorFormData['username'] = 'error : username field is required';
    }
    else if (usernameLength < 3  || usernameLength > 10) {
        errorFormData['username'] = 'error : username length must be between 3 and 10 chars';
    }
    else if (!username.match(usernamePattern)) {
        errorFormData['username'] = 'error : username must contain only letters, numbers and underscore _';
    }
    else {
        validFormData['username'] = username;
    }
}

function passwordValidator(password, passwordRepeated, validFormData, errorFormData) {
    if (password === "") {
        errorFormData['password'] = 'error : password field is required';
    } 
    else if (password !== passwordRepeated ) {
        errorFormData['password'] = 'error : the repeated password doesn\'t match the first one';
    }
    else if (password.length < 6) {
        errorFormData['password'] = 'error : password length must be at least 6 chars';
    }
    else if (!ContainsUppercaseLetter(password) ) {
        errorFormData['password'] = 'error : password must contain at least one uppercase character';
    } 
    else if (!ContainsDigit(password)) {
        errorFormData['password'] = 'error : password must contain at least one digit';
    }
    else {
        validFormData['password'] = password;
    }
}

function ContainsUppercaseLetter(str) {
    return str.match(/[A-Z]/);
}

function ContainsDigit(str) {
    return str.match(/[0-9]/);
}


validateForm();




