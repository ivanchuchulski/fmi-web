(function() {
    let submitButton = document.getElementById('submit-button');


    submitButton.addEventListener('click', submitForm);
})();

function submitForm(clickEvent) {
    try {
        clickEvent.preventDefault();

        let formData = {
                        firstname: null, 
                        surname : null, 
                        major: null, 
                        course:null,  
                        facultynum: null,
                        group: null,
                        motivation: null
                    };

        formData['firstname'] = validateFirstname();
        formData['surname'] = validateSurname();    
        formData['major'] = validateMajor();
        formData['course'] = validateCourse();
        formData['facultynum'] = validateFacultynum();
        formData['group'] = validateGroup();
        formData['motivation'] = validateMotivation();
        
        console.log("formData :");
        printObject(formData);

        sendAjaxRequest('backend/register.php', 'POST', `formData=${JSON.stringify(formData)}`);
    }
    catch (exception) {
        displayErrors(exception);
    }
}

/**
*   we could use this function for text data fields, 
*   but it's error reporting isn't that good because
*   we can't exlicity change the name of the field in the error message
*   and have to pass it as parameter
*   @param {*} idOfTheField id of the field in html document
*   @param {*} nameOfTheField name of the field, it's displayed in the error message 
*   @param {*} lowerLimit lower limit of the lenght of the field 
*   @param {*} upperLimit upper limit of the lenght of the field 
*   @return {*} the formatted data of the field, formatting is done by 
*/
function validateTextField(idOfTheField, nameOfTheField, lowerLimit, upperLimit, ) {
    const pattern = new RegExp(`/^[A-Za-z]{${lowerLimit},${upperLimit}}$/`);

    let field = document.getElementById(idOfTheField).value;

    if (field === '') {
        throw `error : ${nameOfTheField} is required`;
    }

    if (!field.match(pattern)) {
        throw `error : ${nameOfTheField} must contain only letters and be between ${lowerLimit} and ${upperLimit} symbols`;
    }

    return formatInput(field);
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
    const facultynumPattern = new RegExp(/^[1-9]{1}[0-9]{4,7}$/);

    let facultynum = document.getElementById('facultynum').value;

    if (facultynum === '') {
        throw 'error : facultynum is required';
    }

    if (!facultynum.match(facultynumPattern)) {
        throw 'error : faculty number must contain between 5 and 8 digits';
    }

    return formatInput(facultynum);
}

function validateMajor() {
    const majorPattern = new RegExp(/^[A-Za-z]{2,20}$/);

    let major = document.getElementById('major').value;

    if (major === '') {
        throw 'error : major is required';
    }

    if (!major.match(majorPattern)) {
        throw 'error : major must contain only letters';
    }

    return formatInput(major);
}

function validateCourse() {
    const coursePattern = new RegExp(/^[1-4]{1}$/);

    let course = document.getElementById('course').value;

    if (course === '') {
        throw 'error : course is required';
    }

    if (!course.match(coursePattern)) {
        throw 'error : course must be between 1 and 4';
    }

    return formatInput(course);
}

function validateGroup() {
    const groupPattern = new RegExp(/^[1-8]{1}$/);

    let group = document.getElementById('group').value;

    if (group === '') {
        throw 'error : group is required';
    }

    if (!group.match(groupPattern)) {
        throw 'error : group must be between 1 and 8';
    }

    return formatInput(group);
}

function validateMotivation() {
    const motivationPattern = new RegExp(/^[A-Za-z0-9 ]{2,30}$/);

    let motivation = document.getElementById('motivation').value;

    console.log(motivation);

    // motivation is not required, so if it's empty we return null
    if (motivation === '') {
        return null;
    }

    if (!motivation.match(motivationPattern)) {
        throw 'error : motivation must constain letters, digits and spaces only and have length between 2 and 30';
    }

    return formatInput(motivation);
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