window.onload = function(){
    document.querySelector("#logout-button").addEventListener("click", logOut);
    document.querySelector("#add-button").addEventListener("click", function(){
        location.href = "addsong";
    });
    document.querySelector("#index-button").addEventListener("click", function(){
      location.href = "../index";
    });
    document.querySelector('#playlist-button').addEventListener("click", function(){
        location.href = "playlist";
    });
    
    document.querySelector('#list-button').addEventListener("click", function(){
      location.href = "musicList";
    });
  
    const howManyElements = document.querySelector("#musicList-conteiner").children.length;
  
    var i = 0;
    while(i <= howManyElements -1){
      const text = "#info" + i;
  
      $(text).hide();
  
      document.querySelector("#element" + i).addEventListener('click', function(){
        $(text).toggle();
      })
  
      i++;
    }
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