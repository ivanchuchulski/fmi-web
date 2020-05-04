(function() {
    let submitButton = document.getElementById('submit-button');


    submitButton.addEventListener('click', submitForm);
})();

function submitForm(clickEvent) {
    try {
        clickEvent.preventDefault();

        let formData = {firstname: null, surname, facultynum: null};

        formData['firstname'] = validateFirstname();
        formData['surname'] = validateSurname();
        formData['facultynum'] = validateFacultynum();
        
        console.log("formData :");
        printObject(formData);

        sendAjaxRequest('backend/register.php', 'POST', `formData=${JSON.stringify(formData)}`);
    }
    catch (exception) {
        displayErrors(exception);
    }
}

function validateFirstname() {
    const firstnamePattern = new RegExp(/^[A-Za-z]{2,50}$/);

    let firstname = document.getElementById('firstname').value;

    if (firstname === '') {
        throw 'error : first name is required';
    }

    if (!firstname.match(firstnamePattern)) {
        throw 'error : first name must contain only letters and be between 2 and 50 symbols';
    }
    
    return formatInput(firstname);
}

function validateSurname() {
    const surnamePattern = new RegExp(/^[A-Za-z]{2,50}$/);

    let surname = document.getElementById('surname').value;

    if (surname === '') {
        throw 'error : surname is required';
    }

    if (!surname.match(surnamePattern)) {
        throw 'error : surnname must contain only letters and be between 2 and 50 symbols';
    }

    return formatInput(surname);
}

function validateFacultynum() {
    const facultynumPattern = new RegExp(/^[0-9]{5,8}$/);

    let facultynum = document.getElementById('facultynum').value;

    if (facultynum === '') {
        throw 'error : facultynum is required';
    }

    if (!facultynum.match(facultynumPattern)) {
        throw 'error : faculty number must contain between 5 and 8 digits';
    }

    return formatInput(facultynum);
}

function formatInput(formField) {
    formField = trimTrailingWhitespace(formField);
    formField = removeSlashes(formField);
    formField = removeHTMLSpecialCharacters(formField);
    
    return formField;
}

function trimTrailingWhitespace(str) {
    return str.trim();
}

function removeSlashes(str) {
    return str.replace(/\//g, '');
}

function removeHTMLSpecialCharacters(str) {

    let htmlSpecialCharactersMap = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#039;'
      };
    
      return str.replace(/[&<>"']/g, function(symbol) { return htmlSpecialCharactersMap[symbol]; });
}

function sendAjaxRequest(url, method, data) {
    let xhr = new XMLHttpRequest();

    xhr.addEventListener('load', r => requestHandler(xhr));

    xhr.open(method, url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send(data);
}

function requestHandler(xhr) {
    let response = JSON.parse(xhr.responseText);
    
    if (response.success) {
        displaySuccessPage('success.html');
    }
    else {
        displayErrors(response.error);
    }
}

function displaySuccessPage(pageURL) {
    window.location = pageURL;
}

function displayErrors(error) {
    let errors = document.getElementById('errorsLabel');
    errors.innerHTML = error; 
}

function printObject(object) {
    console.log(JSON.stringify(object, null, 4));
}

function printObject2(object) {
    Object.values(object).forEach(data => console.log(data));
}