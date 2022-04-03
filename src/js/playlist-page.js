window.onload = function(){
    document.querySelector("#logout-button").addEventListener("click", logOut);
    document.querySelector("#add-button").addEventListener("click", function(){
        location.href = "addsong";
    });
    document.querySelector("#index-button").addEventListener("click", function(){
        location.href = "http://localhost/Radiowezel/index";
    });

    document.querySelector('#save-button').addEventListener("click", save);
    document.querySelector('#delete-button').addEventListener("click", deletePlaylist);
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
    console.log('delete')
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

containers.forEach(container =>{
    container.addEventListener('dragover', e=>{
        e.preventDefault(); 
        /*
        const afterElement = getDragAfterElement(container, e.clientY);
        console.log(afterElement);
        */
        const draggable = document.querySelector('.draging');
        container.appendChild(draggable);
    })
})

/*
function getDragAfterElement(container, y){
    const draggableElements = [...container.querySelectorAll('draggable:not(.draging)')];
    
    return draggableElements.reduce(function(closest, child){           funkcja reduce nie wykonuje się i nie wiem dlaczego kurde !!!!
        
        const box = child.getBoundingClientRects()
        const offset = y - box.top - box.height / 2;
        console.log(offset);

        if(offset < 0 && offset > closest.offset){
            return { offset: offset, element: child }
        }else{
            return closest;
        }

    }, { offset: Number.NEGATIVE_INFINITY }).element
}
*/



