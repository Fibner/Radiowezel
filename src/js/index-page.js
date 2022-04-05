var player;
var trackNumber = 0;
var songList = [];
var isLoaded = false;
window.jsonLoaded = false;
var breaks = [];
var auto = false;
var emergencyMode = false;
var delay = 0;

window.onload = function () {
    document.querySelector("#emergency").addEventListener("click", emergency);
    document.querySelector("#manual").addEventListener("click", function () { auto = false })
    document.querySelector("#auto").addEventListener("click", function () { auto = true })
    document.querySelector("#manual").checked = true;
    document.querySelector("#logout-button").addEventListener("click", logOut);
    document.querySelector("#playlist-button").addEventListener("click", function () {
        location.href = "pages/playlist";
    });
    document.querySelector("#add-button").addEventListener("click", function () {
        location.href = "pages/addsong";
    });
    document.querySelector('#list-button').addEventListener("click", function(){
        location.href = "pages/musicList";
    })
    
    var tag = document.createElement('script');
    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    getSongs().then(onYouTubeIframeAPIReady);
}

//Get breaks from json file
//CHANGE TEST BEFORE PUBLISH TO: breaks.json
$.getJSON("src/js/test.json", function (data) {
    breaks = data["breaks"];
});

//Repeat every 100ms
function repeater() {
    setInterval(function () {
        if (auto) checkBreak();
    }, 100)
}

function checkBreak() {
    const date = new Date();
    const time = date.toLocaleTimeString('pl-PL');

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
    } else if (time > breaks[9][0] && time < breaks[9][1]) {
        unMuteMusicAnim();
    } else {
        muteMusicAnim();
    }
}

async function getSongs() {
    $.ajax({
        url: "php/getsongs",
        type: "GET",
        success: function (data, string, xml) {
            isLoaded = true;
            return songList = JSON.parse(xml.responseText)
        }
    }).fail(function () {
        alert.alertbox(2, "Błąd serwera");
    })
}

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
    if (isLoaded) {
        player = new YT.Player('player', {
            height: '360',
            width: '640',
            playerVars: { 'autoplay': 0, 'controls': 1, 'enablejsapi': 1, 'rel': 0, 'disablekb': 0 },
            videoId: songList[trackNumber],
            events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange,
            }
        });
    }
}

function onPlayerReady(event) {
    repeater();
    event.target.playVideo();
}

function onPlayerStateChange(event) {
    switch (event.data) {
        case 1:
            player.playVideo();
            break;
        case 0:
            trackNumber++;
            player.loadVideoById(songList[trackNumber])
            break;
    }
}

function muteMusicAnim() {
    if (player.getVolume() != 0) {
        console.log(player.getVolume());
        player.setVolume(player.getVolume() - 2)
    } else {
        player.pauseVideo();
    }
}

function unMuteMusicAnim() {
    player.playVideo();
    if(player.getVolume() != 100) player.setVolume(player.getVolume() + 2);
}

function emergency() {
    emergencyMode = true;
    auto = false;
    player.stopVideo();
    document.querySelector("#manual").checked = true; 
}