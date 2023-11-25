document.addEventListener('DOMContentLoaded', function () {
    // Get all carousel item links
    var carouselItemLinks = document.querySelectorAll('#carouselExample .carousel-indicators li a');

    // Add an event listener to each link
    carouselItemLinks.forEach(function (link) {
        link.addEventListener('click', function (event) {
            // Prevent the default behavior of the link
            event.preventDefault();

            // Get the href attribute of the clicked link
            var targetPage = this.getAttribute('href');

            // Redirect to the target page
            window.location.href = targetPage;
        });
    });
});