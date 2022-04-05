var player;
var songList = [];
window.isLoaded = false;
window.jsonLoaded = false;
var breaks = [];
var auto = false;

window.onload = function () {
    document.querySelector("#logout-button").addEventListener("click", logOut);
    document.querySelector("#playlist-button").addEventListener("click", function () {
        location.href = "pages/playlist";
    });
    document.querySelector("#add-button").addEventListener("click", function () {
        location.href = "pages/addsong";
    });

    var tag = document.createElement('script');
    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    getSongs().then(onYouTubeIframeAPIReady);
}

$.getJSON("src/js/test.json", function(data){
    breaks = data["breaks"];
});

//Repeat every 100ms
setInterval(function(){
    checkBreak();
}, 100)

function checkBreak(){
    const date = new Date();
    const time = date.getHours()+":"+date.getMinutes();
    if(time>breaks[0][0] && time<breaks[0][1]){
        player.playVideo();
    }else if(time>breaks[1][0] && time<breaks[1][1]){
        player.playVideo();
    }else if(time>breaks[2][0] && time<breaks[2][1]){
        player.playVideo();
    }else if(time>breaks[3][0] && time<breaks[3][1]){
        player.playVideo();
    }else if(time>breaks[4][0] && time<breaks[4][1]){
        player.playVideo();
    }else if(time>breaks[5][0] && time<breaks[5][1]){
        player.playVideo();
    }else if(time>breaks[6][0] && time<breaks[6][1]){
        player.playVideo();
    }else if(time>breaks[7][0] && time<breaks[7][1]){
        player.playVideo();
    }else if(time>breaks[8][0] && time<breaks[8][1]){
        player.playVideo();
    }else if(time>breaks[9][0] && time<breaks[9][1]){
        player.playVideo();
    }else{
        stopMusic();
    }
}

async function getSongs() {
    $.ajax({
        url: "php/getsongs",
        type: "GET",
        success: function (data, string, xml) {
            window.isLoaded = true;
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
    if (window.isLoaded) {
        player = new YT.Player('player', {
            height: '360',
            width: '640',
            playerVars: { 'autoplay': 0, 'controls': 1, 'enablejsapi': 1, 'rel': 0, 'disablekb': 0 },
            videoId: songList[0],
            events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange,
            }
        });
    }
}

function onPlayerReady(event) {
    // event.target.playVideo();
}

var done = false;
function onPlayerStateChange(event) {
    // if (event.data == YT.PlayerState.PLAYING && !done) {
    //     setTimeout(stopVideo, 6000);
    //     done = true;
    // }
}

function stopMusic() {
    player.stopVideo();
}