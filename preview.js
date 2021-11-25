var input = document.querySelector('audio');
var preview = document.querySelector('.preview');

input.style.opacity = 0;


input.addEventListener('change', updateSonDisplay);



const fileTypes = [
    '.mp3',
    '.wav',

]




function validFileType(file) {
    for (var i = 0; i < fileTypes.length; i++) {
        if (file.type === fileTypes[i]) {
            return true;
        }
    }

    return false;
}

function returnFileSize(number) {
    if (number < 4860) {
        return number + ' octets';
    } else if (number >= 4860 && number < 4860000) {
        return (number / 4860).toFixed(1) + ' Ko';
    } else if (number >= 4860000) {
        return (number / 48600000).toFixed(1) + ' Mo';
    }
};