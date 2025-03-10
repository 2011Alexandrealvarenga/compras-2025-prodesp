document.addEventListener("DOMContentLoaded", function() {
  const modal = document.getElementById("modal_Home");
  const span = document.getElementsByClassName("close")[0];
  const imageModal = document.getElementsByClassName("img-modal");
 
  window.onload = function(){
  if (!localStorage.getItem("modalClosed")) {
        modal.style.opacity = 0;
        modal.style.display = "block";
       setTimeout(() => {
          modal.style.opacity = 1;
        }, 2000);
    }
  }
    
  span.onclick = function() {
      modal.style.display = "none";
      localStorage.setItem("modalClosed", "true"); 
  }

  window.onclick = function(event) {    
    if (event.target == modal) {      
        modal.style.display = "none";
        localStorage.setItem("modalClosed", "true"); 
    }
  }
});