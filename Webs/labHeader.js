completedListeners = [];

(function () {
    var labHeaderWebSocket = new WebSocket(location.origin.replace("http", "ws") + "/academyLabHeader");
    labHeaderWebSocket.onmessage = function (evt) {
        if (document.getElementById("notification-labsolved")) {
            return;
        }
        document.getElementById("academyLabHeader").innerHTML = evt.data;
        animateLabHeader();

        for (const listener of completedListeners) {
          listener();
        }
    };
})();

function animateLabHeader() {
    setTimeout(function() {
        var labSolved = document.getElementById('notification-labsolved');
        if (labSolved)
        {
            var cl = labSolved.classList;
            cl.remove('notification-labsolved-hidden');
            cl.add('notification-labsolved');
        }

    }, 500);
}