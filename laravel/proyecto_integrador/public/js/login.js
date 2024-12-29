$(document).ready(() => {
    const $botonRegistrarse = $('#botonRegistro');
    const $botonLogin = $('#botonLogin');
    const $formRegistro = $('#formRegistro');
    const $formLogin = $('#formLogin');

    $botonRegistrarse.on('click', (event) => {
        event.preventDefault(); // Evito que se envie el form
        $formLogin.hide();
        $formRegistro.css('display', 'flex')
    })

    $botonLogin.on('click', (event) => {
        event.preventDefault(); // Evito que se envie el form
        $formRegistro.hide();
        $formLogin.show()
    })
})