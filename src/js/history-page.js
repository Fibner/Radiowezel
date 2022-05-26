window.onload = function(){
    document.querySelector("#logout-button").addEventListener("click", logOut);
    document.querySelector("#add-button").addEventListener("click", function(){
        location.href = "addsong";
    });
    if(document.querySelector("#index-button")){
        document.querySelector("#index-button").addEventListener("click", function(){
            location.href = "../index";
        });
    }
    if(document.querySelector("#playlist-button")){
    document.querySelector('#playlist-button').addEventListener("click", function(){
        location.href = "playlist";
    });
    }
    document.querySelector("#logout-button").addEventListener("click", logOut);
}

function logOut() {
    $.ajax({
        url: "../php/logout",
        type: "POST",
        success: function () {
            location.href = "login"
        }
    })
}