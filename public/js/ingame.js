var timeLeft = 30;
function countdown() {
    if (timeLeft <= 0) {
        clearInterval(timer);
        document.querySelector('form').submit();
    } else {
        document.getElementById("countdown").textContent = timeLeft;
    }
    timeLeft -= 1;
}

var timer = setInterval(countdown, 1000);
