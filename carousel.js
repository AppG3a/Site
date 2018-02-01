window.onload = function () {
    var container = document.getElementById('container');
    var list = document.getElementById('list');
    var buttons = document.getElementById('buttons').getElementsByTagName('span');
    var prev = document.getElementById('prev');
    var next = document.getElementById('next');
    var index = 1;  //Enregistrez l'indice de chaque image de diapositive
    var len = 5;
    var animated = false;
    var interval = 3000;
    var timer;    //Utilisez la minuterie pour animer l'image

    // Tout d'abord, nous réalisons d'abord le manuel, cliquez sur les deux flèches pour changer l'animation de l'image
    
    function animate (offset) {
        if (offset == 0) {
            return;
        }
        animated = true;
        //Durée de déplacement
        var time = 300;
        //Intervalle de déplacement
        var inteval = 50;
       //px de chaque deplacement
        var speed = offset/(time/inteval);
        var left = parseInt(list.style.left) + offset;
        var go = function (){
            //Juger de la nécessité du déplacement
           
            if ( (speed > 0 && parseInt(list.style.left) < left) || (speed < 0 && parseInt(list.style.left) > left)) {
                list.style.left = parseInt(list.style.left) + speed + 'px';
                
                setTimeout(go, inteval);
            }
            
            else {      
                list.style.left = left + 'px';
               //Déterminer si c'est du 1 a 5, réinitialiser en cas de dépassement
                if(left>-404){
                    list.style.left = -1212 + 'px';
                }
                if(left<-1212) {
                    list.style.left = -404 + 'px';
                }
                animated = false;
            }
        }
        go();
    }
    
    // Traversez chaque bouton pour passer à l'image correspondante
    function showButton() {
     
        for (var i = 0; i < buttons.length ; i++) {
            if( buttons[i].className == 'on'){
                buttons[i].className = '';
                break;
            }
        }
        buttons[index - 1].className = 'on';
    }
    //Fonction de lecture automatique
    function play() {
        timer = setTimeout(function () {
            prev.onclick();
            play();
        }, interval);
    }
    //Arrête la fonction de lecture automatique
    function stop() {
        clearTimeout(timer);
    }
    //Cliquez sur la flèche droite pour changer d'événement
    next.onclick = function () {
        if (animated) {
           return;
        }
        //Synchroniser les points
        if (index == 1) {
            index = 5;
        }
        else {
            index -= 1;
        }
        animate(202);
        showButton();
    }
    //Cliquez sur la flèche gauche pour changer d'événement
    prev.onclick = function () {
        if (animated) {
            return;
        }
        
        if (index == 5) {
            index = 1;
        }
        else {
            index += 1;
        }
        animate(-202);
        showButton();
    }
   //Cliquez sur les points pour basculer l'image（ne marche pas)
    for (var i = 0; i < buttons.length; i++) {
        buttons[i].onclick = function () {
           //Rester dans l'image actuelle, cliquer ne rafraîchit pas
            if (animated) {
                return;
            }
            if(this.className == 'on') {
                return;
            }
            var myIndex = parseInt(this.getAttribute('index'));
            var offset = -202 * (myIndex - index);
            animate(offset);
            //Mettre à jour la valeur de l'index
            index = myIndex;
            showButton();
        }
    }
    container.onmouseover = stop;
    container.onmouseout = play;
    play();
}