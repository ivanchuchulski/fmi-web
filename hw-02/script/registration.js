(function() {
    let submitButton = document.getElementById('submit-button');


    submitButton.addEventListener('click', submitForm);
})();

function submitForm(clickEvent) {
    clickEvent.preventDefault();

    let firstname = document.getElementById('firstname').value;
    let surname = document.getElementById('surname').value;
    let facultynum = document.getElementById('facultynum').value;

    var formData = {    
        firstname: firstname, 
        surname: surname, 
        facultynum: facultynum
    };

    // console.log("formData :");
    // printObject(formData);

    sendAjaxRequest('backend/register.php', 'POST', `formData=${JSON.stringify(formData)}`);
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
        // console.log("response : ");
        // printObject(response);
        
        window.location = 'success.html';
    }
    else {
        // console.log("errors : ");
        // printObject(response);

        let errors = document.getElementById('errorsLabel');
        errors.innerHTML = response.error;
    }
}

function printObject(object) {
    console.log(JSON.stringify(object, null, 4));
}

function printObject2(object) {
    Object.values(object).forEach(data => console.log(data));
}