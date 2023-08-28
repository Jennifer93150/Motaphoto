/**
 * FOR NAVIGATION BAR
 * Toggle between adding and removing the "responsive" 
 * class to topnav when the user clicks on the icon
 */
function menuClose() {
    var nav = document.getElementById("navigation");
    if (nav.className === "navigation") {
      nav.className += " responsive";
    } else {
      nav.className = "navigation";
    }
  }
