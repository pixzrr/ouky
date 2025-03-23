const carrousel = document.querySelector(".carrousel"); //boutton aussi
firstImg = carrousel.querySelectorAll("div")[0]; //boutton
const arrowIcons = document.querySelectorAll(".wrapper i"); //boutton

let isDragStart = false, prevPageX, prevScrollLeft;
let firstImgWidth = firstImg.clientWidth // + 14 (c'est le margin gauche de notre caroussel (je ai pas mis donc je met en commentaire)) boutton 

arrowIcons.forEach(icon => { // boutton
    icon.addEventListener("click", () => { //boutton
        if (icon.id == "left") { //boutton
            carrousel.scrollLeft -= firstImgWidth; //boutton
        } //boutton
        else { //boutton
            carrousel.scrollLeft += firstImgWidth; //boutton
        } //boutton
    }); //boutton
}) //boutton

const dragStart = (e) => {
    isDragStart = true;
    prevPageX = e.pageX;
    prevScrollLeft = carrousel.scrollLeft;
}

const dragging = (e) => {
    if(!isDragStart) return;
    e.preventDefault();
    let positionDiff = e.pageX - prevPageX;
    carrousel.scrollLeft = prevScrollLeft - positionDiff;
}

const dragStop = () => {
    isDragStart = false;
}

carrousel.addEventListener("mousedown", dragStart);
carrousel.addEventListener("mousemove", dragging);
carrousel.addEventListener("mouseup", dragStop);