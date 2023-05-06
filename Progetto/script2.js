var modal= document.getElementById("Modal");

var btn = document.getElementById("single_search");

var close = document.getElementsByClassName("material-symbols-outlined")[0];

btn.onclick = function(){
    modal.style.display = "block";
}

close.onclick=function(){
    modal.style.display= "none";
}

window.onclick = function(event){
    if (event.target==modal){
        modal.style.display="none";
    }
}