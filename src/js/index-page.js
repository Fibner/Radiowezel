window.onload = function(){
    document.querySelector("#logout-button").addEventListener("click", logOut);
    document.querySelector("#playlist-button").addEventListener("click", function(){
        location.href = "pages/playlist";
    });
    document.querySelector("#add-button").addEventListener("click", function(){
        location.href = "pages/addsong";
    });
    // document.querySelector("#musicPlayer").addEventListener("click", musicPlayer);
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

function goTo(pageLink){
    alert(pageLink);
    location.href = "pages/"+pageLink;
}