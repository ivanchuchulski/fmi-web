var clickHandler = function(event) {
    console.log(event);
}

var button = document.getElementById('mybutton');
var paragraph = document.getElementById('mypara');

// if we press the button the click handler for the paragraph 
// also turns on for all of his parent elements
// this way the bublling effect is in action
button.addEventListener('click', clickHandler);
paragraph.addEventListener('click', clickHandler);


// button.removeEventListener('click', clickHandler);
// paragraph.removeEventListener('click', clickHandler);



