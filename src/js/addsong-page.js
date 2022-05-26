import alertModule from "./alertbox.js";
window.onload = function () {
    document.querySelector("#playlist-button").addEventListener("click", function(){
        location.href = "playlist";
    });
    document.querySelector("#index-button").addEventListener("click", function(){
        location.href = "../index";
    });
    document.querySelector('#list-button').addEventListener("click", function(){
        location.href = "musicList";
    });
    document.querySelector('#history-button').addEventListener("click", function () {
        location.href = "history";
    });
    document.querySelector("#logout-button").addEventListener("click", logOut);
    
    document.querySelector("#add-button").addEventListener("click", function () {
        let link = document.querySelector("#link-input");
        if (link.value == null || link.value == "") return alertModule.alertbox(2, "Nie podano linku!");

        if (checkLink(link.value)) {
            $.ajax({
                url: "../php/addsong",
                method: "POST",
                data: {
                    link: link.value
                },
                success: function (data, string, xml) {
                    console.log("Sending song to playlist...");
                     console.log(xml.responseText);
                    if (xml.responseText == "false"){
                        return alertModule.alertbox(0, "Nie poprawny link do youtube.");
                    }

                    if(xml.responseText == "wrg"){
                        return alertModule.alertbox(0, "Film nie jest piosenką!");
                    }

                    if (xml.responseText == "true") {
                        link.value = "";
                        return alertModule.alertbox(1, "Pomyślnie dodano utwór do playlisty.");
                    }

                    if(xml.responseText == "is"){
                        return alertModule.alertbox(2, "Podana piosenka istnieje już w bazie.");
                    }

                    if(xml.responseText == "err"){
                        return alertModule.alertbox(2, "Err with connection.");
                    }
                },
                error: function () {
                    alertModule.alertbox(2, "Err with connection.");
                }
            }
            );
        } else {
            return alertModule.alertbox(0, "Nie poprawny link do youtube.")
        }
    })

}

function checkLink(link) {
    let correctLinks = new Array("https://www.youtube.com/watch?v=", "https://youtu.be/", "youtube.com/watch?v=");

    for (let i = 0; i < correctLinks.length; i++) {

        if (correctLinks[i].length < link.length) {

            if (correctLinks[i] == link.substring(0, correctLinks[i].length)) {

                if (link.substring(correctLinks[i].length).length == 11)
                    return true;
            }
        }
    }
    return false;
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