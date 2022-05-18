
function optionClick(e){

var x = new XMLHttpRequest();
// console.log(e)
let str = "http://localhost/quiz/confirm.php?datavalue=" + e.target.id;
x.open("GET",str,true);
x.send();
x.onreadystatechange = function(){
    var y = document.getElementsByClassName('text')[0];
    y.innerHTML = x.response;
}
}