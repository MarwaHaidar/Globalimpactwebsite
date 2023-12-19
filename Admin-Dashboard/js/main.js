(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Sidebar Toggler
    $('.sidebar-toggler').click(function () {
        $('.sidebar, .content').toggleClass("open");
        return false;
    });


    // Progress Bar
    $('.pg-bar').waypoint(function () {
        $('.progress .progress-bar').each(function () {
            $(this).css("width", $(this).attr("aria-valuenow") + '%');
        });
    }, {offset: '80%'});


    // Calender
    $('#calender').datetimepicker({
        inline: true,
        format: 'L'
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        items: 1,
        dots: true,
        loop: true,
        nav : false
    });
//////////////////////////////////////////////////////////////////////////////////////////////

    // Worldwide Sales Chart
    var ctx1 = $("#ActivateUsersId").get(0).getContext("2d");
    var myChart1 = new Chart(ctx1, {
        type: "bar",
        data: {
            labels: [ "2017", "2018", "2019", "2020", "2021", "2022","2023"],
            datasets: [{
                    label: "Activate Users",
                    data: [15, 30, 55, 65, 60, 80, 95],
                    backgroundColor: "rgba(0, 156, 255, .7)"
                },
                {
                    label: "Deactivate Users",
                    data: [8, 35, 40, 60, 70, 55, 75],
                    backgroundColor: "rgba(0, 156, 255, .2)"
                },
            ]
            },
        options: {
            responsive: true
        }
    });



    // Salse & Revenue Chart
    var ctx2 = $("#Like-DislikeId").get(0).getContext("2d");
    var myChart2 = new Chart(ctx2, {
        type: "line",
        data: {
            labels: [ "2017", "2018", "2019", "2020", "2021", "2022","2023"],
            datasets: [{
                    label: "Like",
                    data: [15000, 30000, 55000, 45000, 70000, 65000, 85000],
                    backgroundColor: "rgba(0, 156, 255, .2)",
                    fill: true
                },
                {
                    label: "Dislike",
                    data: [10000, 12000, 14000, 33000, 23000, 6000, 1000],
                    backgroundColor: "rgba(0, 156, 255, .7)",
                    fill: true
                }
            ]
            },
        options: {
            responsive: true
        }
    });
    
        // Single Bar Chart
var ctx4 = document.getElementById("CountryId").getContext("2d");
var myChart4 = new Chart(ctx4, {
    type: "bar",
    data: {
        labels: ["Lebanon", "Syria", "Egypt", "Emarate", "Others"],
        datasets: [{
            backgroundColor: [
                "rgba(0, 156, 255, .7)",
                "rgba(0, 156, 255, .6)",
                "rgba(0, 156, 255, .5)",
                "rgba(0, 156, 255, .4)",
                "rgba(0, 156, 255, .3)"
            ],
            data: [55, 49, 44, 24, 15]
        }]
    },
    options: {
        responsive: true
    }
});





var initialData = {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
        label: "Number of Posts",
        fill: false,
        backgroundColor: "rgba(0, 156, 255, .3)",
        data: [10, 12, 14, 18, 20, 22, 25, 28, 30, 32, 35, 38]
    }]
};

// Create the initial chart
var ctx = document.getElementById("postsYearId").getContext("2d");
var myChart = new Chart(ctx, {
    type: "line",
    data: initialData,
    options: {
        responsive: true
    }
});

// Function to change the year
function changeYear(selectedYear) {
    // Replace this with actual data fetching logic from your backend
    // For simplicity, I'll use static data
    var year = parseInt(selectedYear);
    var newData;

    if (year === 2022) {
        newData = {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Number of Posts",
                fill: false,
                backgroundColor: "rgba(0, 156, 255, .3)",
                data: [10, 12, 14, 18, 20, 22, 25, 28, 30, 32, 35, 38]
            }]
        };
    } else if (year === 2023) {
        // Data for the year 2023
        newData = {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Number of Posts",
                fill: false,
                backgroundColor: "rgba(0, 156, 255, .3)",
                data: [15, 18, 20, 22, 25, 28, 30, 32, 35, 38, 40, 42]
            }]
        };
    }

    // Update the chart with the new data
    myChart.data = newData;
    myChart.update();
}


/////////////////////////////////////////////////////////////////////////////////


    // Pie Chart
    var ctx5 = $("#pie-chart").get(0).getContext("2d");
    var myChart5 = new Chart(ctx5, {
        type: "pie",
        data: {
            labels: ["Italy", "France", "Spain", "USA", "Argentina"],
            datasets: [{
                backgroundColor: [
                    "rgba(0, 156, 255, .7)",
                    "rgba(0, 156, 255, .6)",
                    "rgba(0, 156, 255, .5)",
                    "rgba(0, 156, 255, .4)",
                    "rgba(0, 156, 255, .3)"
                ],
                data: [55, 49, 44, 24, 15]
            }]
        },
        options: {
            responsive: true
        }
    });


    // Doughnut Chart
    var ctx6 = $("#doughnut-chart").get(0).getContext("2d");
    var myChart6 = new Chart(ctx6, {
        type: "doughnut",
        data: {
            labels: ["Italy", "France", "Spain", "USA", "Argentina"],
            datasets: [{
                backgroundColor: [
                    "rgba(0, 156, 255, .7)",
                    "rgba(0, 156, 255, .6)",
                    "rgba(0, 156, 255, .5)",
                    "rgba(0, 156, 255, .4)",
                    "rgba(0, 156, 255, .3)"
                ],
                data: [55, 49, 44, 24, 15]
            }]
        },
        options: {
            responsive: true
        }
    });

    
})(jQuery);




//this for dark and light mode ----------------------------
			// this for dark mode 

            

function toggleMode() {
    const body = document.body;
    const toggleSwitch = document.getElementById('toggle-switch');
    const currentTheme = localStorage.getItem('theme');
    
    if (currentTheme) {
        body.style.background = currentTheme === 'dark-mode' ? '#0b0c10' : 'white';
        toggleSwitch.checked = currentTheme === 'dark-mode';
     

    }
    toggleSwitch.addEventListener('change', function() {
        const isDarkMode = this.checked;
        body.style.background = isDarkMode ? '#0b0c10' : 'white';
        localStorage.setItem('theme', isDarkMode ? 'dark-mode' : 'light-mode');
        
       
    });
    body.classList.toggle('darkMode');

    // Store the dark mode status in localStorage
    const isDarkMode = body.classList.contains('darkMode');
    localStorage.setItem('darkMode', isDarkMode);

    // Update the toggle switch state
    updateToggleSwitch(isDarkMode);

    // Update the background color of the content containers
    updateContentContainers(isDarkMode);
}

function checkDarkMode() {
    const isDarkMode = localStorage.getItem('darkMode') === 'true';

    // Apply dark mode if it's enabled
    if (isDarkMode) {
        document.body.classList.add('darkMode');
    }

    // Update the toggle switch state
    updateToggleSwitch(isDarkMode);

    // Update the background color of the content containers
    updateContentContainers(isDarkMode);
}

function updateToggleSwitch(isDarkMode) {
    const toggleSwitch = document.getElementById('toggle-switch');
    toggleSwitch.checked = isDarkMode;
}

function updateContentContainers(isDarkMode) {
    const contentContainers = document.querySelectorAll('.content-container');

    // Add or remove Bootstrap classes based on dark mode state for each content container
    contentContainers.forEach(container => {
        if (isDarkMode) {
            container.classList.remove('bg-light', 'text-dark');
            container.classList.add('bg-dark', 'text-light');
        } else {
            container.classList.remove('bg-dark', 'text-light');
            container.classList.add('bg-light', 'text-dark');
        }
    });
}

// Call checkDarkMode() on page load
checkDarkMode();



			