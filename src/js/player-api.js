function
var playlistId = undefined;
var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);


var player;
function onYouTubeIframeAPIReady() {
  player = new YT.Player('player', {
    height: '360',
    width: '640',
    playerVars: { 'autoplay': 0, 'controls': 1,'enablejsapi': 1,'rel':0},
    events: {
      'onReady': onPlayerReady,
      'onStateChange': checkIfEnded,
    }
  });
}