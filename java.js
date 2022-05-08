function changebg()
{
const img=[
    'url("bk-1.jpg")',
    'url("bk-3.jpg")',
    'url("bk-5.jpg")',
    'url("bk-6.webp")',
]
const Section=document.querySelector('#home');
console.log(Section);
const b=img[Math.floor(Math.random()*img.length)];
Section.style.backgroundImage=b;

}
setInterval(changebg,2000);