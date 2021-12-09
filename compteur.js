const text = document.querySelector('h2');

/*console.log(now, countdownDate);*/
function getChrono() {

    /*par du 1 janvier 1970*/

    const now = new Date().getTime();
    const countdownDate = new Date('April 28,2022').getTime();


    const distanceBase = countdownDate - now;
    /* donne 1 jour en milliseconde*/
    const days = Math.floor(distanceBase / (1000 * 60 * 60 * 24));

    const hours = Math.floor((distanceBase % (1000 * 60 * 60 * 24)) /
        (1000 * 60 * 60))
    const minutes = Math.floor((distanceBase % (1000 * 60 * 60)) /
        (1000 * 60))
    const seconds = Math.floor((distanceBase % (1000 * 60)) / 1000);


    console.log(days, hours, minutes, seconds);

    text.innerText = `${days}j ${hours}h ${minutes}m ${seconds}s`;



}

getChrono()

const countdownInterval = setInterval(() => {

    getChrono()

}, 1000);