window.onload = function () {
    document.querySelector("#submit").addEventListener("click", function () {
        let inputLogin = document.querySelector("#login-input");
        let inputPassword = document.querySelector("#password-input");
        if(inputLogin.value == "" || inputLogin.value == null || inputPassword.value == "" || inputPassword.value == null) return noData(inputLogin, inputPassword);
        $.ajax({
            url: "../php/login",
            method: "post",
            data: {
                login: inputLogin.value,
                password: inputPassword.value
            },
            success: function(){
                console.log("Trying to login...");
            },
            error: function(){
                console.log("Err with connection.");
            }
        }).done(function(){
            location.reload();
        });
    })
}

function noData(inputLogin, inputPassword){
    if(inputLogin.value == null || inputLogin.value == "") alert("Proszę podać login");
    if(inputPassword.value == null || inputPassword.value == "") alert("Proszę podać hasło");
}