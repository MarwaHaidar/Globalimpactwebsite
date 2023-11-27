


 // Add this script to control overlay visibility and blur effect
 const overlayPage = document.getElementById("overlayPage");
 const closeOverlayButton = document.getElementById("closeOverlay");
 const mainContent = document.getElementById("main_content");
 const openoverlaybutton=document.getElementById("open_overlay");

 function openOverlay() {
     overlayPage.style.display = "block";
     overlayPage.classList.remove("blurred")
     mainContent.classList.add("blurred");
     
 }

 function closeOverlay() {
     overlayPage.style.display = "none";
     mainContent.classList.remove("blurred");
 }

 if (window.location.pathname.includes("adminpage.html") || window.location.pathname.includes("anonymous.html")){
    closeOverlayButton.addEventListener("click", closeOverlay);
   
 }
 else {
   closeOverlayButton.addEventListener("click", closeOverlay);
    openoverlaybutton.addEventListener("click",openOverlay);
 }

 // Close the overlay when clicking outside the content
 window.addEventListener("click", (event) => {
     if (event.target === overlayPage) {
         closeOverlay();
     }
 });


/*---------------home page------------------*/


/*
 //click view all comments 
     document.getElementById('CommentsId').addEventListener('click', function() {
    document.getElementById('view-Comments-Overlay-Id').style.display = 'block';
    document.querySelector('.main-content').classList.add('blurred');
  });
   
  // for exit comment form inside overlay
  document.getElementById('exit-comment').addEventListener('click', function() {
     document.getElementById('view-Comments-Overlay-Id').style.display = 'none';
     document.querySelector('.main-content').classList.remove('blurred');
  
 });*/
// Get all elements with the class 'CommentsLink'
let commentLinks = document.querySelectorAll('.CommentsLink');


// Add the click event listener to each link
commentLinks.forEach(function(link) {
 link.addEventListener('click', function() {
     document.getElementById('view-Comments-Overlay-Id').style.display = 'block';
     document.querySelector('.main-content').classList.add('blurred');
 });
});
// for exit comment form inside overlay
document.getElementById('exit-comment').addEventListener('click', function() {
     document.getElementById('view-Comments-Overlay-Id').style.display = 'none';
     document.querySelector('.main-content').classList.remove('blurred');
  
 });






