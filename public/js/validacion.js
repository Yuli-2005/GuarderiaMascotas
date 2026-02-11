function soloLetras(event) {
    const tecla = event.key;
    const regex = /^[a-zA-Z]$/;

    if (!regex.test(tecla) &&
        tecla !== 'Backspace' &&
        tecla !== 'Delete' &&
        tecla !== 'Tab' &&
        tecla !== 'ArrowLeft' &&
        tecla !== 'ArrowRight' &&
        tecla !== ' ' &&
        tecla !== 'Enter') {
        event.preventDefault();
    }
}

function soloNumeros(event) {
    const tecla = event.key;
    const regex = /^[0-9]$/;

    if (!regex.test(tecla) &&
        tecla !== 'Backspace' &&
        tecla !== 'Delete' &&
        tecla !== 'Tab' &&
        tecla !== 'ArrowLeft' &&
        tecla !== 'ArrowRight' &&
        tecla !== 'Enter') {
        event.preventDefault();
    }
}

function soloLetrasNumerosEspacios(event) {
    const tecla = event.key;
    const regex = /^[a-zA-Z0-9\s]$/;

    if (!regex.test(tecla) &&
        tecla !== 'Backspace' &&
        tecla !== 'Delete' &&
        tecla !== 'Tab' &&
        tecla !== 'ArrowLeft' &&
        tecla !== 'ArrowRight' &&
        tecla !== 'Enter') {
        event.preventDefault();
    }
}
