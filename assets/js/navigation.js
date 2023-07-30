/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function menuClose() {
    var nav = document.getElementById("navigation");
    var burger = document.getElementById("navigation_burger");
    var cross = document.getElementById("navigation_cross");
    if (nav.className === "navigation") {
      nav.className += " responsive";
      cross.style.display="block";
      burger.style.display="none";
    } else {
      nav.className = "navigation";
      cross.style.display="none";
      burger.style.display="block";
    }
  }
