let type_file = document.querySelector("input[type=file]");
let preview = document.querySelector('label img');

type_file.addEventListener('change', function(display){ // le change est comme le click sauf que c'est quand le type file change si je ne me trompe pas
    let fichier = display.target.files[0]; // selon un post sur medium, target.file récupère le fichier qu'on a ajouté
    image = URL.createObjectURL(fichier); // URL.createObjectURL permet de récupérer le chemin du fichier (j'ai essayé de mettre un >value à la place mais je n'y arrive pas (la console me dit toujours : An attempt was made to use an object that is not, or is no longer, usable))
    preview.setAttribute('src', image);
})