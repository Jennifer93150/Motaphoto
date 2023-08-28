//DISPLAY MODAL
window.addEventListener("DOMContentLoaded", (event) => {
  const modal = document.getElementById('modal');
  const contactLink = document.querySelector('li#menu-item-27');
  const btnContactSinglePage = document.getElementById('single-page-button');

  contactLink.addEventListener('click', function () {
    modal.style.display = "block";
  })
  
  if(btnContactSinglePage){
    btnContactSinglePage.addEventListener('click', function () {
      modal.style.display = "block";
    })
  }
 
});

function modalClose() {
  modal.style.display = "none";
}