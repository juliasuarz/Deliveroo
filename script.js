document.addEventListener("DOMContentLoaded", function() {
  // Obtener los elementos con los IDs "desplegable" y "desplegable1"
  var desplegable1 = document.getElementById("desplegable1");
  var desplegable2 = document.getElementById("desplegable2");

  // Agregar un evento de clic a cada elemento
  desplegable1.addEventListener("click", function() {
    // Toggle de la clase "in"
    this.classList.toggle("in");
  });

  desplegable2.addEventListener("click", function() {
    // Toggle de la clase "in"
    this.classList.toggle("in");
  });
});

$('.carousel[data-type="multi"] .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));

  for (var i=0;i<4;i++) {
    next=next.next();
    if (!next.length) {
    	next = $(this).siblings(':first');
  	}
    
    next.children(':first-child').clone().appendTo($(this));
  }
});

