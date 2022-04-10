var player;
var trackNumber = 0;
var songID = "";
var isLoaded = false;
window.jsonLoaded = false;
var breaks = [];
var auto = true;
var emergencyMode = false;
var delay = 0;
var muteAnim = false;

window.onload = function () {
    document.querySelector("#emergency").addEventListener("click", emergency);
    document.querySelector("#manual").addEventListener("click", function () { auto = false })
    document.querySelector("#auto").addEventListener("click", function () { auto = true })
    document.querySelector("#auto").checked = true;
    document.querySelector("#next-button").addEventListener("click", playNewSong);
    document.querySelector("#logout-button").addEventListener("click", logOut);
    document.querySelector("#playlist-button").addEventListener("click", function () {
        location.href = "pages/playlist";
    });
    document.querySelector("#add-button").addEventListener("click", function () {
        location.href = "pages/addsong";
    });
    document.querySelector('#list-button').addEventListener("click", function () {
        location.href = "pages/musicList";
    })

    var tag = document.createElement('script');
    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
}

//Get breaks from json file
//CHANGE TEST BEFORE PUBLISH TO: breaks.json
$.getJSON("src/js/breaks.json", function (data) {                                                             //TU DO ZMIANY!!!!
    breaks = data["breaks"];
});

//Repeat every 100ms
function repeater() {
    setInterval(function () {
        if (checkDay()) {                                                                           //TU DO ZMIANY!!!!
            if (auto) checkBreak();
        }else{
            player.pauseVideo();
        }
    }, 100)
}

function checkBreak() {
    const time = checkTime();

    if (time > breaks[0][0] && time < breaks[0][1]) {
        unMuteMusicAnim();
    } else if (time > breaks[1][0] && time < breaks[1][1]) {
        unMuteMusicAnim();
    } else if (time > breaks[2][0] && time < breaks[2][1]) {
        unMuteMusicAnim();
    } else if (time > breaks[3][0] && time < breaks[3][1]) {
        unMuteMusicAnim();
    } else if (time > breaks[4][0] && time < breaks[4][1]) {
        unMuteMusicAnim();
    } else if (time > breaks[5][0] && time < breaks[5][1]) {
        unMuteMusicAnim();
    } else if (time > breaks[6][0] && time < breaks[6][1]) {
        unMuteMusicAnim();
    } else if (time > breaks[7][0] && time < breaks[7][1]) {
        unMuteMusicAnim();
    } else if (time > breaks[8][0] && time < breaks[8][1]) {
        unMuteMusicAnim();
    } else {
        muteMusicAnim();
    }
}
function checkDay() {
    if (checkTime() == "07:00:00") console.log("Tu trzeba losować");
    var date = new Date();
    if (date.getDay() > 0 && date.getDay() < 6) return true;
    return false
}
function checkTime() {
    const date = new Date();
    return date.toLocaleTimeString('pl-PL');
}
// function weekendMode() {
//     clearInterval(repeater)
//     const weekendRepeater = setInterval(function () {
//         if (checkDay() > 0 && checkDay() < 6) repeater;
//     }, 1000)
// }
function logOut() {
    $.ajax({
        url: "php/logout",
        type: "POST",
        success: function () {
            location.href = "index"
        }
    }).fail(function () {
        alert.alertbox(2, "Błąd serwera");
    })
}

function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
        height: '360',
        width: '640',
        playerVars: { 'autoplay': 0, 'controls': 1, 'enablejsapi': 1, 'rel': 0, 'disablekb': 1, 'fs': 0 },
        events: {
            'onReady': playNewSong,
            'onStateChange': onPlayerStateChange,
            'onError': onPlayerError
        }
    });
    repeater();
}

function getSong() {
    return new Promise((resolve) => {
        $.ajax({
            url: "php/getsong",
            success: function (xml) {
                resolve(JSON.parse(xml));
            }
        })
    })
}

function removeSong(id) {
    $.ajax({
        url: "php/removesong",
        method: "POST",
        data: {
            id: id
        }
    })
}

async function playNewSong(event) {
    songID = await getSong();
    removeSong(songID['id']);
    player.loadVideoById(songID['songId']);
//     player.setVolume(0);
//     player.playVideo();
}

function onPlayerStateChange(event) {
    switch (event.data) {
        case 0:
            playNewSong();
            break;
    }
}

function onPlayerError() {
    console.log("BRAK PLAYLISTY");
}

function muteMusicAnim() {
    if(muteAnim){
        if (player.getVolume() != 0) {
            // console.log(player.getVolume());
            player.setVolume(player.getVolume() - 2)
        } else {
            player.pauseVideo();
        }
    }else{
        player.mute();
        player.pauseVideo();
        muteAnim = false;
    }
}

function unMuteMusicAnim() {
    muteAnim = true;
    player.playVideo();
    if(player.isMuted()){
        player.setVolume(0)
        player.unMute()
    }
    if (player.getVolume() != 100) player.setVolume(player.getVolume() + 2);
}

function emergency() {
    emergencyMode = true;
    auto = false;
    player.stopVideo();
    document.querySelector("#manual").checked = true;
}