document.addEventListener("DOMContentLoaded", function() {
    // Obtener el elemento con el id "miDesplegable"
    var desplegable = document.getElementById("desplegable");
  
    // Agregar un evento de clic al elemento
    desplegable.addEventListener("click", function() {
      // Toggle de la clase "desplegado"
      this.classList.toggle("desplegado");
    });
  });