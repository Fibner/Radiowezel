import alertModule from "./alertbox.js";

window.onload = function () {
    document.querySelector("#submit").addEventListener('click', function(){
        const login = document.querySelector('#newLogin').value;
        const password = document.querySelector('#newPassword').value;
        const repetedPassword = document.querySelector('#repetedNewPassword').value;

        checkData(login, password, repetedPassword);
        $.ajax({
            url: "../php/register",
            method: "post",
            data: {
                login: login,
                password: password
            },
            success: function(data, string, xml){
                console.log("Trying to register...");
                console.log(xml.responseText);
                if(xml.responseText == "false") return wrongData();
                if(xml.responseText == "true") location.reload();
            },
            error: function(){
                alertModule.alertbox(2, "Err with connection.");
            }
        })
    })
}

function checkData(login, password, password2){
    
    if(login == "" || login == null || password == "" || password == null || password2 == "" || password2 == null) return wrongData();
    if(login.length < 3) return wrongData();
    if(password.length < 8) return wrongData();
    if(password != password2) return wrongData();
    //dorobić sprawdznie SQL injection !!!!!
    console.log("Data check complete");
}

function wrongData(){
    alertModule.alertbox(0, "NIEPOPRAWNE DANE DO REJESTRACJI!")
}

