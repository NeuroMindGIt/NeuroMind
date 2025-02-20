document.addEventListener("DOMContentLoaded",function(){
document.getElementById("mainlogin").hidden=false;
    document.getElementById("maincadastro").hidden=true;
});



function login(){
    document.getElementById("mainlogin").hidden=false;
    document.getElementById("maincadastro").hidden=true;
}

function cadastrar(){
    document.getElementById("maincadastro").hidden=false;
    document.getElementById("mainlogin").hidden=true;
}