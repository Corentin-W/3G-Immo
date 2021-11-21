const img = document.getElementById('carousel');
const rightBtn = document.getElementById('right-btn');
const leftBtn = document.getElementById('left-btn');

let pictures = ['https://v.seloger.com/s/cdn/x/visuels/1/c/4/f/1c4fu37vkil3mx4qx7z23ez58ncyfb9usjepkw0ix.jpg', 'https://v.seloger.com/s/cdn/x/visuels/0/6/y/8/06y8yek7ld3l5pzb0ddzr7u1bq98nfd7krwkajw2m.jpg', 'https://v.seloger.com/s/cdn/x/visuels/1/7/7/m/177mjdg0instj1fszo7vg5dcvz4zhjnkkte8fhbfi.jpg', 'https://v.seloger.com/s/cdn/x/visuels/0/a/5/g/0a5gn3l5goat0ax2psrmfdom0zfpkdanjhjdde593.jpg', 'https://v.seloger.com/s/cdn/x/visuels/0/3/l/m/03lmxwo34rc1lwnogsvdkfxphi7d7scddgdjb76dx.jpg'];

img.src = pictures[0];
let position = 0;

const moveRight = () => {
    if (position >= pictures.length - 1) {
        position = 0
        img.src = pictures[position];
        return;
    }
    img.src = pictures[position + 1];
    position++;
}

const moveLeft = () => {
    if (position < 1) {
        position = pictures.length - 1;
        img.src = pictures[position];
        return;
    }
    img.src = pictures[position - 1];
    position--;
}

rightBtn.addEventListener("click", moveRight);
leftBtn.addEventListener("click", moveLeft);

let closeButton = document.querySelector('.close').closest('.alert');
closeButton.addEventListener('click', closeFlash())

function closeFlash() {
    console.log("ok");
}


