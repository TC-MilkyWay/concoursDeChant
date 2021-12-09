/*var input = document.querySelector('audio');
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
};*/

/*const settings = {
    "async": true,
    "crossDomain": true,
    "url": "https://shazam.p.rapidapi.com/search?term=kiss%20the%20rain&locale=en-US&offset=0&limit=5",
    "method": "GET",
    "headers": {
        "x-rapidapi-host": "shazam.p.rapidapi.com",
        "x-rapidapi-key": "55f0349011mshaa0e4a27c587732p12d202jsnb3a490669d3a"
    }
};

$.ajax(settings).done(function(response) {
    console.log(response);
});*/


document.querySelector("#queryArtists").addEventListener("input", (e) => {
    const query = e.target.value;
    search(query);
});

function search(param) {
    const url = `http://217.182.174.155:5000/ws/2/artist?query=${param}&fmt=json`;
    fetch(url)
        .then((response) => response.json())
        .then((data) => {
            console.log("data", data);
            const artists = data.artists;
            artists.forEach((element) => {
                const nameArtist = element["sort-name"];
                document.querySelector(
                    "#artists"
                ).innerHTML += `<option value="${nameArtist}">${nameArtist}</option>`;
            });
        })
        .catch((err) => console.log(err));
}