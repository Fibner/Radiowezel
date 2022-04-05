window.onload = function(){
    document.querySelector("#logout-button").addEventListener("click", logOut);
    document.querySelector("#add-button").addEventListener("click", function(){
        location.href = "addsong";
    });
    document.querySelector("#index-button").addEventListener("click", function(){
        location.href = "http://localhost/Radiowezel/index";
    });
    document.querySelector('#list-button').addEventListener("click", function(){
        location.href = "musicList";
    })

    document.querySelector('#save-button').addEventListener("click", save);
    document.querySelector('#delete-button').addEventListener("click", deletePlaylist);
    document.querySelector('#random-button').addEventListener("click", randomPlaylist);
}

function logOut(){
    $.ajax({
        url: "php/logout",
        type: "POST",
        success: function(){
            location.href = "index"
        }
    }).fail(function(){
        alert("Błąd serwera");
    })
}
function save(){
    var div = document.querySelector('#playlist-list').children;
    
    const elementsId = [];

    for (i = 1; i <= div.length - 1; i++) {
        elementsId.push(div[i].id);
    }

    $.ajax({
        url: "../php/playlistSave",
        method: "post",
        data: {
            id: elementsId
        },
        success: function(data, string, xml){
            console.log(xml.responseText);
            if(xml.responseText == "false") return wrongData();
            location.reload();
        },
        error: function(){
            alertModule.alertbox(2,"Err with connection.");
        }
    });
    function wrongData(){
        alertModule.alertbox(0, "Błąd")
    }
}
function deletePlaylist(){
    $.ajax({
        url: "../php/playlistDelete",
        success: function(){
            location.reload();
        },
        error: function(){
            alertModule.alertbox(2,"Err with connection.");
        }
    });
}
function randomPlaylist(){
    console.log('losowe');
    $.ajax({
        url: "../php/playlistRandom",
        success: function(){
            location.reload();
        },
        error: function(){
            alertModule.alertbox(2,"Err with connection.");
        }
    });
}

// drag and drop z możliwością dowolnego ukladania elementów
const draggable = document.querySelectorAll(".draggable");
const containers = document.querySelectorAll(".container");

const playlist = [];

draggable.forEach(draggable =>{
    draggable.addEventListener('dragstart', ()=>{
        draggable.classList.add('draging');
    })

    draggable.addEventListener('dragend', ()=>{
        draggable.classList.remove('draging');
    })
})

containers.forEach(container => {
    container.addEventListener('dragover', e => {
        e.preventDefault(); 
        const afterElement = getDragAfterElement(container, e.clientY);

        const draggable = document.querySelector('.draging');

        if(afterElement == null){
            container.appendChild(draggable);
        }else{
            container.insertBefore(draggable, afterElement)
        }
        
    })
})

function getDragAfterElement(container, y){
    const draggableElements = [...container.querySelectorAll('.draggable:not(.draging)')];
    

    return draggableElements.reduce((closest, child) => {
        const box = child.getBoundingClientRect();
        const offset = y - box.top - box.height / 2;
        
        if(offset < 0 && offset > closest.offset){
            return { offset: offset, element: child }
        }else{
            return closest;
        }

    }, { offset: Number.NEGATIVE_INFINITY }).element
}




