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







//this for dark and light mode ----------------------------




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
  