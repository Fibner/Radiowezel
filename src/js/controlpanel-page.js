var stopSure = false;
setInterval(function(){
    $.ajax({
        url: "../php/getAcctualSong",
        method: "POST",
        success: function(xml){
            document.querySelector("#now-playing").innerText = xml;
        }
    })
}, 1000)
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
        console.log("działa");
        location.href = "history";
    })

    document.querySelectorAll("#logout-button")[1].addEventListener("click", logOut);
    document.querySelectorAll("#playlist-button")[1].addEventListener("click", function () {
        location.href = "playlist";
    });
    document.querySelectorAll("#add-button")[1].addEventListener("click", function () {
        location.href = "addsong";
    });
    document.querySelectorAll('#list-button')[1].addEventListener("click", function () {
        location.href = "musicList";
    });
    document.querySelectorAll('#history-button')[1].addEventListener("click", function () {
        console.log("działa");
        location.href = "history";
    })
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

// jQuery.fn.rotate = function(degrees) {
//     $(this).css({'transform' : 'rotate('+ degrees +'deg)'});
//     return $(this);
// };

let isOpen = false
let mm = $("#mobile-menu");
let mmi = $("#mobile-menu-icon");
let mmt = $("#mobile-menu-tab");
$("#mobile-menu").css({"left": -Math.abs(parseFloat(mmt.css('width')))});

document.querySelector("#mobile-menu-icon").addEventListener("click", function () {
    if (!isOpen) {
        $("#mobile-menu").animate({"left": -Math.abs(parseFloat(mmt.css('width')))-15}, 300)
        $("#mobile-menu").animate({left: 0}, 700)
        isOpen = true;
    } else {
        $("#mobile-menu").animate({ "left": -Math.abs(parseFloat(mmt.css('width'))) }, 500)
        isOpen = false;
    };

})

//to idzie skrócić
document.querySelector('#pause').addEventListener('click', function(){
    $.ajax({
        url: "../php/commandExecution",
        method: "POST",
        data:{
            command: 'pause'
        }
    })
})
document.querySelector('#play').addEventListener('click', function(){
    $.ajax({
        url: "../php/commandExecution",
        method: "POST",
        data:{
            command: 'play'
        }
    })
})
document.querySelector('#next').addEventListener('click', function(){
    $.ajax({
        url: "../php/commandExecution",
        method: "POST",
        data:{
            command: 'next'
        }
    })
})
document.querySelector('#stop').addEventListener('click', function(){
    if(!stopSure){
        document.querySelector('#stop').innerText = "Na pewno?";
        stopSure = true;
        return;
    }
    $.ajax({
        url: "../php/commandExecution",
        method: "POST",
        data:{
            command: 'stop'
        }
    })
})
//