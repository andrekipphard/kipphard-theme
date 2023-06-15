document.addEventListener("DOMContentLoaded", function() {
    var offcanvasLinks = document.querySelectorAll("#offcanvasExample a");
    offcanvasLinks.forEach(function(link) {
        link.addEventListener("click", function(event) {
            var offcanvasElement = document.getElementById("offcanvasExample");
            var offcanvas = bootstrap.Offcanvas.getInstance(offcanvasElement);
            if (offcanvas) {
                offcanvas.hide();
            }
            setTimeout(function() {
                window.location.href = link.href;
            }, 500); // Delay the navigation to allow the offcanvas to close
            event.preventDefault();
        });
    });
});