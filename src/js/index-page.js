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
}

function logOut() {
    $.ajax({
        url: "php/logout",
        type: "POST",
        success: function () {
            location.href = "index"
        }
    }).fail(function () {
        alert("Błąd serwera");
    })
}

function goTo(pageLink) {
    alert(pageLink);
    location.href = "pages/" + pageLink;
}

var player;
function onYouTubeIframeAPIReady() {
    $.ajax({
        url: "php/getsong",
        type: "GET",
        success: function (data, string, xml) {
            player = new YT.Player('player', {
                height: '360',
                width: '640',
                playerVars: { 'autoplay': 0, 'controls': 1, 'enablejsapi': 1, 'rel': 0 },
                videoId: xml.responseText,
                events: {
                    'onReady': onPlayerReady,
                    'onStateChange': onPlayerStateChange,
                    //'onError': getNewMusic
                }
            });
        }
    })
}

function onPlayerReady(event) {
    event.target.playVideo();
}

var done = false;
function onPlayerStateChange(event) {
    // if (event.data == YT.PlayerState.PLAYING && !done) {
    //     setTimeout(stopVideo, 6000);
    //     done = true;
    // }
}

function stopVideo() {
    player.stopVideo();
}