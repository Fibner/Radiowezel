import alertModule from "./alertbox.js";

window.onload = function () {
    document.querySelector("#submit").addEventListener("click", function () {
        let inputLogin = document.querySelector("#login-input");
        let inputPassword = document.querySelector("#password-input");
        if(inputLogin.value == "" || inputLogin.value == null || inputPassword.value == "" || inputPassword.value == null) return wrongData();
        $.ajax({
            url: "../php/login",
            method: "post",
            data: {
                login: inputLogin.value,
                password: inputPassword.value
            },
            success: function(data, string, xml){
                console.log("Trying to login...");
                console.log(xml.responseText);
                if(xml.responseText == "false") return wrongData();
                location.reload();
            },
            error: function(){
                alertModule.alertbox(2,"Err with connection.");
            }
        });
    })
}

function wrongData(){
    alertModule.alertbox(0, "Niepoprawny login lub hasło!")
}