


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

 if (window.location.pathname.includes("adminpage.html") || window.location.pathname.includes("anonymous.html")|| window.location.pathname.includes("Category.html")){
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



