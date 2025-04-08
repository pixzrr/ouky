let toggle = document.querySelector('nav');
let bmain = document.querySelector('main');
let bfooter = document.querySelector('footer');

// Condition trouvée sur reddit : si la largeur de l'écran est inférieure à 1200px...
if(screen.width < 1200){

    let rechercher = document.querySelector('nav');


    boutton.addEventListener('click', function(){
        if(toggle.getAttribute('id') != 'mobile_burger'){
            toggle.setAttribute('id', 'mobile_burger');
            bmain.setAttribute('id', 'mobile_burger_main');
        } else {
            toggle.setAttribute('id', '');
            bmain.setAttribute('id', '');
        }
    });

} else {

if(bmain.getAttribute('id') == 'wideview'){
    toggle.setAttribute('id', 'burger');
    bmain.setAttribute('id', 'burger_main');
    bfooter.setAttribute('id', 'burger_footer');
}

boutton.addEventListener('click', function(){
    if(toggle.getAttribute('id') != 'burger'){
        toggle.setAttribute('id', 'burger');
        bmain.setAttribute('id', 'burger_main');
        bfooter.setAttribute('id', 'burger_footer');
    } else {
        toggle.setAttribute('id', '');
        bmain.setAttribute('id', '');
        bfooter.setAttribute('id', '');
    }
});
}