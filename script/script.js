const play = () =>{
    let box = document.getElementById('container-btn');
    let playBox = document.getElementById('container-name-skin');
    let sound = document.getElementById('buttonSound');
    sound.play();
    box.style.transition = " transform 1s ease";
    let saveScale = box.style.transform = "scale(0.1)";
    if(saveScale == "scale(0.1)"){
        box.style.visibility = "hidden";
        setTimeout (()=>{
            if (box.style.visibility == "hidden"){
                playBox.style.visibility = "visible";
                playBox.style.transition = " transform 1s ease";
                playBox.style.transform = "scale(1)";
            }
        },1300)
    }
}
const rank = () =>{
    let box = document.getElementById('container-btn');
    let rankBox = document.getElementById('container-rank')
    let sound = document.getElementById('buttonSound');
    sound.play();
    box.style.transition = " transform 1s ease";
    let saveScale = box.style.transform = "scale(0.1)";
    if(saveScale == "scale(0.1)"){
        box.style.visibility = "hidden";
        setTimeout (()=>{
            if (box.style.visibility == "hidden"){
                rankBox.style.visibility = "visible";
                rankBox.style.transform = "scale(1.0)";
            }
        },1300)
    }
    let rank = document.querySelector(".rank")
    let btnGoBack2 = document.getElementById('btn-goBack-2')

    rank.style.animation = 'none';
    rank.offsetHeight;
    rank.style.animation = '';

    rank.addEventListener('animationend',()=>{
        btnGoBack2.style.display = "block"
    })
}
const goBack = () =>{
    let box = document.getElementById('container-name-skin');
    let playBox = document.getElementById('container-btn');
    box.style.transition = "transform 1s ease";
    let saveScale = box.style.transform = "scale(0.1)";
    if(saveScale == "scale(0.1)"){
        setTimeout (()=>{
            box.style.visibility = "hidden";
            if (box.style.visibility == "hidden"){
                playBox.style.visibility = "visible";
                playBox.style.transition = " transform 1s ease";
                playBox.style.transform = "scale(1)";
            }
        },1000)
    }
}
const goBack2 = () =>{
    let box = document.getElementById('container-rank');
    let playBox = document.getElementById('container-btn');
    box.style.transition = " transform 1s ease";
        box.style.visibility = "hidden";
        setTimeout (()=>{
            if (box.style.visibility == "hidden"){
                playBox.style.visibility = "visible";
                playBox.style.transition = " transform 1s ease";
                playBox.style.transform = "scale(1)";
            }
        },1300)
    let rank = document.querySelector(".rank")
    let btnGoBack2 = document.getElementById('btn-goBack-2')
    rank.addEventListener('animationend',()=>{
        btnGoBack2.style.display = "none";
    })
}