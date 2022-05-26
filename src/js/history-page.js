window.onload = function(){
    document.querySelector("#logout-button").addEventListener("click", logOut);
    document.querySelector("#add-button").addEventListener("click", function(){
        location.href = "addsong";
    });
    document.querySelector("#index-button").addEventListener("click", function(){
      location.href = "../index";
    });
    document.querySelector('#playlist-button').addEventListener("click", function(){
        location.href = "playlist";
    });
    document.querySelector("#logout-button").addEventListener("click", logOut);
    
    document.querySelector('#ban-button').addEventListener("click", function(){
      location.href = "bannedmusic";
    });
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