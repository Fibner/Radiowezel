window.onload = function () {

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