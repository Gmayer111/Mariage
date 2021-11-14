const MINUTES = 60;
const HOURS = MINUTES * 60;
const DAYS = HOURS * 24;

// Calculer la différence en secondes entre les deux dates

function refreshCountDown() {
    const countdown = document.querySelector('#countdown');
    // Pour récupérer la date de lancement > dataset.time récupère la valeur de time
    // Parse change la valeur en timestamp
    // /1000 pour récupérer la valeur en secondes
    const launchDate = Date.parse(countdown.dataset.time) / 1000;
    // Date actuelle
    const difference = launchDate - Date.now() / 1000
    const diff = {
        days: Math.floor(difference / DAYS),
        hours: Math.floor(difference % DAYS / HOURS),
        minutes: Math.floor(difference % HOURS / MINUTES),
        seconds: Math.floor(difference % MINUTES)
    }
    document.getElementById('days').innerText = diff.days;
    document.getElementById('hours').innerText = diff.hours;
    document.getElementById('minutes').innerText = diff.minutes;
    document.getElementById('seconds').innerText = diff.seconds;
    window.setTimeout(() => {
        window.requestAnimationFrame(refreshCountDown)
    }, 1000)
}

refreshCountDown();

// Créé un objet qui contient les heures, minutes et secondes
// On va envoyer cet objet à une fonction qui mettra à jour l'HTML
// Modifier html pour injecter heure, jours, minutes et secondes