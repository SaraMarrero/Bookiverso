let password = document.querySelector('#password_usuario');
let buttonPassword = document.querySelector('.button_password');
let msg = document.querySelector('.p');

buttonPassword.addEventListener('click', () => {
    console.log('a')

    if(password.value !== ''){
        if (password.type === 'password') {
            password.type = 'text';
            buttonPassword.src = '/build/img/ojo_abierto.svg';
        } else {
            password.type = 'password';
            buttonPassword.src = '/build/img/ojo_cerrado.svg';
        }
    } else{
        msg.style.color = 'red';
        msg.textContent = 'Primero introduzca una contraseña';
    }

    setTimeout(function(){
        msg.textContent = '';
    }, 2000);
});