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

    console.log(usernameField);

    let validFormData = {username: null, password: null, passwordRepeated: null};
    let errorFormData = {username: null, password: null, passwordRepeated: null};

    usernameIsValidator(usernameField.textContent, validFormData, errorFormData);

    console.log(validFormData);
    console.log(errorFormData);

    event.preventDefault
}

function usernameIsValidator(username, validFormData, errorFormData) {
    let usernameLength = username.length;

    // console.log(username);
    // console.log(usernameLength);

    if (!username || username === "") {
        errorFormData['username'] = 'error : username field is required';
    }
    else if (usernameLength < 3  || usernameLength > 10) {
        errorFormData['username'] = 'error : username length must be between 3 and 10 chars';
    }
    else if (username.match(/^[a-zA-Z0-9_]{3,10}$/)) {
        errorFormData['username'] = 'error : username must contain only letters, numbers and underscore _';
    }
    else {
        validFormData['username'] = username;
    }
}

validateForm();




