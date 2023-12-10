function showMenu(icon) {
    // Hide all other menus
    hideAllMenus();

    // Find the parent menu and show its actions-menu
    const parentMenu = icon.closest('.post_menu');
    const actionsMenu = parentMenu.querySelector('.actions-menu');
    actionsMenu.style.display = 'block';

    // Close the menu when clicking outside of it
    document.addEventListener('click', function closeMenu(event) {
        if (!parentMenu.contains(event.target)) {
            actionsMenu.style.display = 'none';
            document.removeEventListener('click', closeMenu);
        }
    });
}

function hideAllMenus() {
    // Hide all actions-menus
    const allMenus = document.querySelectorAll('.actions-menu');
    allMenus.forEach(menu => {
        menu.style.display = 'none';
    });
}







//this for dark and light mode index  ----------------------------




document.addEventListener('DOMContentLoaded', function() {
 const body = document.body;
 const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');

 // Check for saved dark mode preference
 const currentTheme = localStorage.getItem('theme');
 if (currentTheme) {
     body.classList.add(currentTheme);
     if (currentTheme === 'dark-mode') {
         toggleSwitch.checked = true;
     }
 }

 // Toggle dark mode
 toggleSwitch.addEventListener('change', function() {
     if (this.checked) {
         body.classList.replace('light-mode', 'dark-mode');
         localStorage.setItem('theme', 'dark-mode');
     } else {
         body.classList.replace('dark-mode', 'light-mode');
         localStorage.setItem('theme', 'light-mode');
     }
 });
});


//this dark mode for categories  ----------------------------
document.addEventListener('DOMContentLoaded', function() {
  const postsSection = document.getElementById('POSTS');
  const postsSectionNews = document.getElementById('POSTSNews');
  const postsSectionTechnologie = document.getElementById('POSTSTechnologie');
  const postsSectionMovies = document.getElementById('POSTSMovies');
  const postsSectionArt = document.getElementById('POSTSArt');
  const sectionColorModeId = document.getElementById('SectionColorModeId');
  const SectionColorModeIdNews = document.getElementById('SectionColorModeIdNews');
  const sectionColorModeIdTechnologies= document.getElementById('sectionColorModeIdTechnologies');
  const SectionColorModeIdMovies = document.getElementById('SectionColorModeIdMovies');
  const sectionColorModeIdArts = document.getElementById('sectionColorModeIdArts');



  const currentTheme = localStorage.getItem('theme');
  if (currentTheme === 'dark-mode') {
      enableDarkMode();
      toggleSwitch.checked = true;
  }


  function toggleBackground() {
     
      if (toggleSwitch.checked) {
        
          enableDarkMode();
      } else {
        
          enableLightMode();
      }
  }

  function enableDarkMode() {
      const pageType = document.body.getAttribute('data-page-type');

      switch (pageType) {
          case 'sports':
              postsSection.style.backgroundColor = '#0b0c10';
              sectionColorModeId.style.backgroundColor = '#0099ff';
              break;
          case 'news':
              postsSectionNews.style.backgroundColor = '#0b0c10';
              SectionColorModeIdNews.style.backgroundColor = 'grey';
              break;
              case 'Technologies':
                  postsSectionTechnologie.style.backgroundColor= '#0b0c10';
                  sectionColorModeIdTechnologies.style.backgroundColor = 'rgb(59, 59, 94)';
                  break;
                  case 'Movies':
                      postsSectionMovies.style.backgroundColor = '#0b0c10';
                      SectionColorModeIdMovies.style.backgroundColor = 'rgb(184, 139, 139)';
                      break;
                      case 'Arts':
                          postsSectionArt.style.backgroundColor = '#0b0c10';
                          sectionColorModeIdArts.style.backgroundColor = '#0099ff';
                          break;
          
          default:
              break;
      }

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
      
          default:
              break;
      }

  }

  toggleSwitch.addEventListener('change', toggleBackground);
});
//this dark mode for categories  ----------------------------


// document.addEventListener('DOMContentLoaded', function() {
//     const body = document.body;
//     const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');

//     // Check for saved dark mode preference
//     const currentTheme = localStorage.getItem('theme');
//     if (currentTheme) {
//         body.classList.add(currentTheme);
//         if (currentTheme === 'dark-mode') {
//             toggleSwitch.checked = true;
//             enableDarkMode();
//         } else {
//             enableLightMode();
//         }
//     }

//     // Toggle dark mode
//     toggleSwitch.addEventListener('change', function() {
//         if (this.checked) {
//             body.classList.replace('light-mode', 'dark-mode');
//             localStorage.setItem('theme', 'dark-mode');
//             enableDarkMode();
//         } else {
//             body.classList.replace('dark-mode', 'light-mode');
//             localStorage.setItem('theme', 'light-mode');
//             enableLightMode();
//         }
//     });

//     function enableDarkMode() {
//         // Adjust background color for dark mode
//         body.style.backgroundColor = 'black';
//         document.documentElement.style.backgroundColor = 'black';
//     }

//     function enableLightMode() {
//         // Adjust background color for light mode
//         body.style.backgroundColor = 'white';
//         document.documentElement.style.backgroundColor = 'white';
//     }
// });


// --------------------this for story next and privous buttom-------------------------- 

document.addEventListener("DOMContentLoaded", function () {
    const scrollContainer = document.querySelector(".scroll-container");
    const innerContainer = document.querySelector(".inner-container");
    const leftButton = document.querySelector(".navigation.left");
    const rightButton = document.querySelector(".navigation.right");
  
    const scrollDistance = 200; // Adjust the scroll distance as needed
  
    leftButton.addEventListener("click", function () {
      scrollContainer.scrollBy({
        left: -scrollDistance,
        behavior: "smooth",
      });
    });
  
    rightButton.addEventListener("click", function () {
      scrollContainer.scrollBy({
        left: scrollDistance,
        behavior: "smooth",
      });
    });
  });
  

// ----------overlay Stories------------ 

document.addEventListener("DOMContentLoaded", function () {
    const stories = document.querySelectorAll(".story");
    const overlayStories = document.getElementById("overlayStories");
    const overlayImageStory = document.getElementById("overlayimageStory");
  
    stories.forEach((story, index) => {
      story.addEventListener("click", function () {
        showOverlayS(index);
      });
    });
  
    function showOverlayS(index) {
        overlayImageStory.src = `./images/StoryImage${index + 1}.jpg`; // Change this based on your image naming convention
        overlayStories.style.display = "flex";
    }
  
    window.closeOverlayStory = function () {
        overlayStories.style.display = "none";
    };
  });
  



// --------------overlay Stories my self--------------------- 
function openFileInput() {
    const fileInput = document.getElementById("fileInput");
    fileInput.click();
  }
  
  function displaySelectedImage() {
    const fileInput = document.getElementById("fileInput");
    const postImage = document.getElementById("postImage");
    const story2 = document.getElementById("story2");
    const selectedImageContainer = document.getElementById("selectedImageContainer");
    const selectedImage = document.getElementById("selectedImage");
  
    if (fileInput.files && fileInput.files[0]) {
      const reader = new FileReader();
  
      reader.onload = function (e) {
        postImage.src = e.target.result;
        selectedImage.src = e.target.result;
        selectedImageContainer.style.display = "block"; // Show the selected image container
  
        // Move the "story2" card to make space for the selected image
        story2.style.marginRight = "120px"; // Adjust the margin as needed
      };
  
      reader.readAsDataURL(fileInput.files[0]);
    }
  }
  
  function closeOverlayStoryMySelf() {
    const overlayMySelf = document.getElementById("overlayStoriesMyself");
    overlayMySelf.style.display = "none";
  }
  
// this for profile my html to display the pic from my create story

//   document.addEventListener("DOMContentLoaded", function () {
//     const selectedImageContainer = document.getElementById("selectedImageContainer");
//     const selectedImage = document.getElementById("selectedImage");
  
//     // Retrieve the selected image from localStorage
//     const selectedImageBase64 = localStorage.getItem("selectedImage");
  
//     if (selectedImageBase64) {
//       // Display the selected image
//       selectedImage.src = selectedImageBase64;
//       selectedImageContainer.style.display = "block";
//     }
//   });
  


// this for Community path -------------

document.getElementById('ComunityPath').addEventListener('click', function(){
  window.location.href = 'communityall.html';
});

// -------------this for Profile  path-----------------

document.getElementById('ProfilePath').addEventListener('click', function(){
  window.location.href = 'profilepage.html';
});