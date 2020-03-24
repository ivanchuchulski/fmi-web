// 
(function() {
    let submitButton = document.getElementById('registerButton');


    submitButton.addEventListener('click', submitForm);
})();

function submitForm(clickEvent) {
    clickEvent.preventDefault();

    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    var passwordRepeated = document.getElementById('passwordRepeated').value;

    var formData = {    
        username, 
        password, 
        passwordRepeated
    };

    console.log("formData :");
    printObject(formData);

    sendAjaxRequest('register.php', 'POST', `data=${JSON.stringify(formData)}`);
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
    
    console.log("type of response : ");
    console.log(typeof response);
    
    const okStatus = 200;
    
    if (xhr.status === okStatus) {
        console.log("response : ");
        printObject(response);
    }
    else {
        console.log("errors : ");
        printObject(response);
    }

}

function printObject(object) {
    console.log(JSON.stringify(object, null, 4));
}

function printObject2(object) {
    Object.values(object).forEach(data => console.log(data));
}