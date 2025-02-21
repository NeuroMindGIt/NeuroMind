
/* Ao iniciar o site ele entra automaticamente na tela de login - Vw*/
document.addEventListener("DOMContentLoaded",function(){
document.getElementById("mainlogin").hidden=false;
    document.getElementById("maincadastro").hidden=true;
});


/* Ao clicar que tem uma conta vai pra tela de login - Vw */
function login(){
    document.getElementById("mainlogin").hidden=false;
    document.getElementById("maincadastro").hidden=true;
}

/*Ao clicsr que não tem uma conta ele ira para tela de cadastro -Vw */

function cadastrar(){
    document.getElementById("maincadastro").hidden=false;
    document.getElementById("mainlogin").hidden=true;
}