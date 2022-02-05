//Js script to show/hide lists

  function switchShowFishs(text){
      switch (text){

          case "Water": 
              var elems = document.getElementsByClassName('waterfishs');
              if(elems[0].style.display == "none")
              {
                  for (var i=0;i<elems.length;i+=1){
                      elems[i].style.display = 'inherit';
                  }
              }
              else{
                  for (var i=0;i<elems.length;i+=1){
                      elems[i].style.display = 'none';
                  }
              }

              break;

          case "Choco": 
              var elems = document.getElementsByClassName('chocofishs');
              if(elems[0].style.display == "none")
              {
                  for (var i=0;i<elems.length;i+=1){
                      elems[i].style.display = 'inherit';
                  }
              }
              else{
                  for (var i=0;i<elems.length;i+=1){
                      elems[i].style.display = 'none';
                  }
              }
              break;

          case "Lava": 
              var elems = document.getElementsByClassName('lavafishs');
              if(elems[0].style.display == "none")
              {
                  for (var i=0;i<elems.length;i+=1){
                      elems[i].style.display = 'inherit';
                  }
              }
              else{
                  for (var i=0;i<elems.length;i+=1){
                      elems[i].style.display = 'none';
                  }
              }
              break;

          case "Plasma": 
              var elems = document.getElementsByClassName('plasmafishs');
              if(elems[0].style.display == "none")
              {
                  for (var i=0;i<elems.length;i+=1){
                      elems[i].style.display = 'inherit';
                  }
              }
              else{
                  for (var i=0;i<elems.length;i+=1){
                      elems[i].style.display = 'none';
                  }
              }
              break;

          default:
              break;
      }
  }