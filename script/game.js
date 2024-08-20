function simpleJump(pulos) {
    const character = document.querySelector('.character');
    character.style.top = '-30px';
    setTimeout(() => {
        character.style.top = '0px';
    }, 500);

    fetch('../endpoint/mover.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            pulos: pulos
        })
    })
    .then(response => response.text())
    .then(result => {
        console.log('Resultado do servidor:', result);
    })
    .catch(error => {
        console.error('Erro:', error);
    });
}

function simpleJump_2() {
    const character = document.querySelector('.character');
    character.style.top = '-60px';
    setTimeout(() => {
        character.style.top = '0px';
    }, 500);
}

function simpleJump_3() {
    const character = document.querySelector('.character');
    character.style.top = '-120px';
    setTimeout(() => {
        character.style.top = '0px';
    }, 500);
}
