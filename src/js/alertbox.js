function alertbox(type,textmessage){
    const main = document.createElement("div");
    const icon = document.createElement("i");
    const text = document.createTextNode(textmessage);
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
    icon.style.cssText = 'margin:20px;';
    main.style.cssText = 'position:absolute;width:25%;height:55%;opacity:0;z-index:10;background:gray;left:35%;top:-40%;text-align:center;border-radius: 30px;';
    main.id = "alertbox"
    document.body.appendChild(main);
    main.addEventListener("click", function(){
        if($("#alertbox").css('opacity') == 1) $("#alertbox").animate({top: "40%", opacity: "0%"},"slow",function(){main.remove();});
    })
    $("#alertbox").animate({top: "20%", opacity: "100%"},"slow");
}

export default {alertbox}