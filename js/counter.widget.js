document.addEventListener('DOMContentLoaded', function () {
    function initializeCounters() {
        var counters = document.querySelectorAll('.counter');

        counters.forEach(function (counter) {
            var duration = parseInt(counter.getAttribute('data-duration'));
            var toValue = parseInt(counter.getAttribute('data-to-value'));
            var fromValue = parseInt(counter.getAttribute('data-from-value'));
            var delimiter = counter.getAttribute('data-delimiter') || '';

            animateCounter(counter, fromValue, toValue, duration, delimiter);
        });
    }

    function animateCounter(counter, from, to, duration, delimiter) {
        var startTime;

        function updateCounter(timestamp) {
            if (!startTime) startTime = timestamp;

            var progress = timestamp - startTime;
            var value = easeInOutQuad(progress, from, to - from, duration);

            counter.querySelector('.counter-number').textContent = addDelimiter(value, delimiter);

            if (progress < duration) {
                requestAnimationFrame(updateCounter);
            }
        }

        requestAnimationFrame(updateCounter);
    }

    function easeInOutQuad(t, b, c, d) {
        t /= d / 2;
        if (t < 1) return (c / 2) * t * t + b;
        t--;
        return (-c / 2) * (t * (t - 2) - 1) + b;
    }

    function addDelimiter(value, delimiter) {
        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, delimiter);
    }

    initializeCounters();
});
