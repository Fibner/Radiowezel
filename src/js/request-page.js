window.onload = function () {
    getRequest()

    document.querySelectorAll("#logout-button")[0].addEventListener("click", logOut);
    document.querySelectorAll("#playlist-button")[0].addEventListener("click", function () {
        location.href = "playlist";
    });
    document.querySelectorAll("#add-button")[0].addEventListener("click", function () {
        location.href = "addsong";
    });
    document.querySelectorAll('#list-button')[0].addEventListener("click", function () {
        location.href = "musicList";
    });
    document.querySelectorAll('#history-button')[0].addEventListener("click", function () {
        location.href = "history";
    });
    document.querySelectorAll('#controlpanel-button')[0].addEventListener("click", function () {
        location.href = "controlpanel";
    });
}

function logOut() {
    $.ajax({
        url: "../php/logout",
        type: "POST",
        success: function () {
            location.href = "login"
        }
    }).fail(function () {
        alertbox(2, "Błąd serwera");
    })
}

function getRequest(){
    $.ajax({
        url: "../php/getrequest",
        type: "POST",
        success: function (xml) {
            document.querySelector("#request-container").innerHTML = "";
            document.querySelector("#request-container").innerHTML = xml;
            for(const item of document.querySelectorAll(".accept")){
                item.addEventListener("click", function(event){
                    acceptSong(this.value);
                });
            }
            for(const item of document.querySelectorAll(".decline")){
                item.addEventListener("click", function(event){
                    declineSong(this.value);
                });
            }
        }
    }).fail(function () {
        alertbox(2, "Błąd serwera");
    })
}

function acceptSong(songId){
    console.log("sd");
    $.ajax({
        url: "../php/requestverdict",
        type: "POST",
        data:{
            id: songId,
            verdict: true
        },
        success: function () {
            getRequest();
        }
    }).fail(function () {
        alertbox(2, "Błąd serwera");
    })
}
function declineSong(songId){
    $.ajax({
        url: "../php/requestverdict",
        type: "POST",
        data:{
            id: songId,
            verdict: false
        },
        success: function () {
            getRequest();
        }
    }).fail(function () {
        alertbox(2, "Błąd serwera");
    })
}