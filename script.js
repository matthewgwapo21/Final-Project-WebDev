function goLogin(){

    window.location.href =  "http://127.0.0.1:5500/preloader.html";
}

function goEdit(){
    document.getElementById("form1").style.display = "none";
    document.getElementById("form2").style.display = "block";
}

function cancel(){
    document.getElementById("form2").style.display = "none";
    document.getElementById("form1").style.display = "block";
}

function godelete(){
    document.getElementById("pro").style.display = "block";
}

function godecline(){
    document.getElementById("pro").style.display = "none";
}

function wow(){
    document.getElementById("upper").style.display = "none";
    document.getElementById("users-container").style.display = "block";
}

function hideUsers(){
    document.getElementById("upper").style.display = "block";
    document.getElementById("lower").style.display = "block";
    document.getElementById("users-container").style.display = "none";
}