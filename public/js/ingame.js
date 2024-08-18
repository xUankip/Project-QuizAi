var timeLeft = 30;
function countdown() {
    if (timeLeft <= 0) {
        clearInterval(timer);
        document.querySelector('form').submit();
    } else {
        document.getElementById("countdown").textContent = timeLeft;
        document.getElementById("time_left").value = timeLeft;
    }
    timeLeft -= 1;
}

var timer = setInterval(countdown, 1000);
