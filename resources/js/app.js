require('./bootstrap');

window.addEventListener("load", function () {
    const deleteForms = document.querySelectorAll(".areUsure");
  
    deleteForms.forEach(form => {
  
        form.addEventListener("submit", (event) => {
    
            if (!confirm("Sei sicuro di voler cancellare questo elemento?")) {
            event.preventDefault();
            }
    
        });
  
    });
});