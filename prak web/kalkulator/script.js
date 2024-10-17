function insert(value) {
    document.getElementById('display').value += value;
}

function calculate() {
    let display = document.getElementById('display').value;
    if (display) {
        document.getElementById('display').value = eval(display);
    }
}

function backspace() {
    let display = document.getElementById('display').value;
    document.getElementById('display').value = display.substring(0, display.length - 1);
}

document.querySelector('.clear').addEventListener('click', function () {
    document.getElementById('display').value = '';
});
