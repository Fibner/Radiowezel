window.onload() = function(){
    document.querySelector("#orPlay").addEventListener("click", changeIcon);
}

function changeIcon(){
    if(document.getElementById("#orPlay").className=="fa-thin fa-circle-play"){
        document.getElementById("#orPlay").className = "fa-solid fa-circle-play";
      }else{
        document.getElementById("#orPlay").className = "fa-thin fa-circle-play";
      }
}