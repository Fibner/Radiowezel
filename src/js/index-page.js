window.onload = function(){
    document.querySelector("#logout-button").addEventListener("click", logOut);
}

function logOut(){
    $.ajax({
        url: "php/logout",
        type: "get",
        success: function(){
            location.href = "index"
        }
    }).fail(function(){
        alert("Błąd serwera");
    })
}