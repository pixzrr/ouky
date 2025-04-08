let more = document.querySelectorAll('aside');
let cards = document.querySelectorAll('main section article div img');
let view_less = document.querySelectorAll('aside #view_less');


// Boutton pour fermer le aside
for (let i = 0 ; i < cards.length ; i++){
view_less[i].addEventListener('click', function(){
    more[i].setAttribute('id', '');
});
}



// Condition trouvée sur reddit : si la largeur de l'écran est inférieure à 1200px...
if(screen.width < 1200){

    for (let i = 0 ; i < cards.length ; i++){
        cards[i].addEventListener('click', function(){
        
            if(more[i].getAttribute('id') != 'aside'){
                for (let j = 0 ; j < cards.length ; j++){
                    more[j].setAttribute('id', '');
                }
                more[i].setAttribute('id', 'aside');
            } else {
                more[i].setAttribute('id', '');
            }
        
        });
            }

} else {

    for (let i = 0 ; i < cards.length ; i++){
cards[i].addEventListener('click', function(){

    if(more[i].getAttribute('id') != 'aside'){
        for (let j = 0 ; j < cards.length ; j++){
            more[j].setAttribute('id', '');
        }
        more[i].setAttribute('id', 'aside');
    } else {
        more[i].setAttribute('id', '');
    }

});
    }
}