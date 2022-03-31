window.onload = function(){
    document.querySelector("#logout-button").addEventListener("click", logOut);
    document.querySelector("#musicPlayer").addEventListener("click", musicPlayer);
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

function musicPlayer(){
    $.ajax({
        success: function(){
            location.href = "pages/musicPlayer.php"
        }
    })
}