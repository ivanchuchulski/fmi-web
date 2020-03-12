

// of=ifthe  script wasn't included with async we have to wait to DOM to load in order to select nodes 
// window.onload =  function playground() {
// }

let title = document.getElementById('page-title');
let items = document.getElementsByTagName('li');
let foods = document.getElementsByClassName('food');

console.log(title);
console.log(items);
console.log(foods);

title.innerHTML += ' <em>emphasised text</em>';
foods[0].textContent += ' hut';

console.log(title.textContent);

var text = document.createTextNode('text node content');
var div = document.createElement('div');

// Add
div.appendChild(text);
document.body.appendChild(div);

// Delete
var list = document.getElementById('menu-list');

console.log(list.childNodes);

// 0th child is the text content of the element
list.removeChild(list.childNodes[0]);

console.log(list.childNodes);

// pizza was originally 1-st was but then it becomes 0-th
list.removeChild(list.childNodes[0]);






