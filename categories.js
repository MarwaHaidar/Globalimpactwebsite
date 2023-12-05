document.addEventListener('DOMContentLoaded', function() {
    const postsSection = document.getElementById('POSTS');
    const postsSectionNews = document.getElementById('POSTSNews');
    const postsSectionTechnologie = document.getElementById('POSTSTechnologie');
    const postsSectionMovies = document.getElementById('POSTSMovies');
    const postsSectionArt = document.getElementById('POSTSArt');
    const toggleSwitch = document.getElementById('toggle-switch');
    const sectionColorModeId = document.getElementById('SectionColorModeId');
    const SectionColorModeIdNews = document.getElementById('SectionColorModeIdNews');
    const sectionColorModeIdTechnologies= document.getElementById('sectionColorModeIdTechnologies');
    const SectionColorModeIdMovies = document.getElementById('SectionColorModeIdMovies');
    const sectionColorModeIdArts = document.getElementById('sectionColorModeIdArts');


    // Check for saved dark mode preference
    const currentTheme = localStorage.getItem('theme');
    if (currentTheme === 'dark-mode') {
        // Set the initial styles for dark mode
        enableDarkMode();
        toggleSwitch.checked = true;
    }

    // Toggle dark mode
    function toggleBackground() {
        // Check if the checkbox is checked
        if (toggleSwitch.checked) {
            // Enable dark mode
            enableDarkMode();
        } else {
            // Enable light mode
            enableLightMode();
        }
    }

    function enableDarkMode() {
        const pageType = document.body.getAttribute('data-page-type');

        switch (pageType) {
            case 'sports':
                postsSection.style.backgroundColor = 'black';
                sectionColorModeId.style.backgroundColor = 'black';
                break;
            case 'news':
                postsSectionNews.style.backgroundColor = 'black';
                SectionColorModeIdNews.style.backgroundColor = 'black';
                break;
                case 'Technologies':
                    postsSectionTechnologie.style.backgroundColor = 'black';
                    sectionColorModeIdTechnologies.style.backgroundColor = 'black';
                    break;
                    case 'Movies':
                        postsSectionMovies.style.backgroundColor = 'black';
                        SectionColorModeIdMovies.style.backgroundColor = 'black';
                        break;
                        case 'Arts':
                            postsSectionArt.style.backgroundColor = 'black';
                            sectionColorModeIdArts.style.backgroundColor = 'black';
                            break;
            // Add cases for other page types if needed
            default:
                break;
        }

        // Optionally, you can set other styles for dark mode here
    }

    function enableLightMode() {
        const pageType = document.body.getAttribute('data-page-type');

        switch (pageType) {
            case 'sports':
                postsSection.style.backgroundColor = 'white';
                sectionColorModeId.style.backgroundColor = '#0099ff';
                break;
            case 'news':
                postsSectionNews.style.backgroundColor = 'white';
                SectionColorModeIdNews.style.background = 'grey';

                break;
                case 'Technologies':
                    postsSectionTechnologie.style.backgroundColor = 'white';
                    sectionColorModeIdTechnologies.style.backgroundColor = 'rgb(59, 59, 94)';
                    break;
                    case 'Movies':
                        postsSectionMovies.style.backgroundColor = 'white';
                        SectionColorModeIdMovies.style.background = 'rgb(184, 139, 139)';
                        break;
                        case 'Arts':
                            postsSectionArt.style.backgroundColor = 'white';
                            sectionColorModeIdArts.style.backgroundColor = '#0099ff';
                            break;
            // Add cases for other page types if needed
            default:
                break;
        }

        // Optionally, you can reset other styles for light mode here
    }

    // Add event listener to the dark mode toggle switch
    toggleSwitch.addEventListener('change', toggleBackground);
});
