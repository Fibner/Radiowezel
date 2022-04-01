import alertModule from "./alertbox.js";
window.onload = function(){
    document.querySelector("#submit-button").addEventListener("click", function(){
        let link = document.querySelector("#link-input");
        if(link.value == "" || link.value == null) return alertModule.alertbox(2, "Nie podano linku!");
    })

}