function alertbox(type,textmessage){
    const background = document.createElement("div");
    const main = document.createElement("div");
    const icon = document.createElement("i");
    const text = document.createTextNode(textmessage);
    background.appendChild(main);
    main.appendChild(icon);
    main.appendChild(document.createElement("br"));
    main.appendChild(text);
    switch(type){
        case 0:
            icon.className = "fa-solid fa-xmark fa-10x";
            break;
        case 1:
            icon.className = "fa-solid fa-check fa-10x";
            break;
        default:
            icon.className = "fa-solid fa-triangle-exclamation fa-10x";
            break;
    }
    background.style.cssText = "position: absolute;z-index:10;top:-40%;left:0%;width:100%;height:100%;opacity:0;text-align:center;background-color: transparent;"
    main.style.cssText = 'position:relative;width:25%;height:55%;background:gray;left:35%;top:20%;text-align:center;border-radius: 30px;';
    icon.style.cssText = 'margin:20px;background:gray;';
    background.id = "alertbox"
    document.body.appendChild(background);
    background.addEventListener("click", function(){
        if($("#alertbox").css('opacity') == 1) $("#alertbox").animate({top: "-40%", opacity: "0%"},"slow",function(){background.remove();});
    })
    $("#alertbox").animate({top: "0%", opacity: "100%"},"slow");
}

export default {alertbox}