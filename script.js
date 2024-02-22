// SCRIPT INICIO

// document.addEventListener("DOMContentLoaded", function() {
//   // Obtener los elementos con los IDs "desplegable" y "desplegable1"
//   var desplegable1 = document.getElementById("desplegable1");
//   var desplegable2 = document.getElementById("desplegable2");

//   // Agregar un evento de clic a cada elemento
//   desplegable1.addEventListener("click", function() {
//     // Toggle de la clase "in"
//     this.classList.toggle("in");
//   });

//   desplegable2.addEventListener("click", function() {
//     // Toggle de la clase "in"
//     this.classList.toggle("in");
//   });
// });

// $('.carousel[data-type="multi"] .item').each(function(){
//   var next = $(this).next();
//   if (!next.length) {
//     next = $(this).siblings(':first');
//   }
//   next.children(':first-child').clone().appendTo($(this));

//   for (var i=0;i<4;i++) {
//     next=next.next();
//     if (!next.length) {
//     	next = $(this).siblings(':first');
//   	}
    
//     next.children(':first-child').clone().appendTo($(this));
//   }
// });

// FIN SCRIPT INICIO
// SCRIPT FROM REST
// Función para validar el campo de nombre del restaurante

var nombre_rest = document.getElementById('nombre_rest');
if (nombre_rest) {
  nombre_rest.onblur = validacionNombreRest;
}
var descripcion_rest = document.getElementById('descripcion_rest');
if (descripcion_rest) {
  descripcion_rest.onblur = validacionDescripcionRest;
}
var img_rest = document.getElementById('img_rest');
if (img_rest) {
  img_rest.onblur = validacionImgRest;
}
var dinero_gastado = document.getElementById('dinero_gastado');
if (dinero_gastado) {
  dinero_gastado.onblur = validacionDineroGastado;
}
var dinero_descuento = document.getElementById('dinero_descuento');
if (dinero_descuento) {
  dinero_descuento.onblur = validacionDineroDescuento;
}
var tiempo_preparacion = document.getElementById('tiempo_preparacion');
if (tiempo_preparacion) {
  tiempo_preparacion.onblur = validacionTiempoPreparacion;
}


function validacionNombreRest() {
  var nombreRest = document.getElementById('nombre_rest').value;
  var inputNombreRest = document.getElementById('nombre_rest');
  var errorVacioNombreRest = document.getElementById('errorVacioNombre');
  var errorMalNombreRest = document.getElementById('errorMalNombre');

  if (nombreRest == null || nombreRest.trim() === "") {
      inputNombreRest.style.borderColor = 'red';
      errorVacioNombreRest.textContent = "El nombre del restaurante es obligatorio.";
      errorMalNombreRest.textContent = "";
      return false;
  } else {
      inputNombreRest.style.borderColor = '#e8ebeb';
      errorVacioNombreRest.textContent = "";
      errorMalNombreRest.textContent = "";
      return true;
  }
}

// Función para validar el campo de descripción del restaurante
function validacionDescripcionRest() {
  var descripcionRest = document.getElementById('descripcion_rest').value;
  var inputDescripcionRest = document.getElementById('descripcion_rest');
  var errorVacioDescripcionRest = document.getElementById('errorVacioDesc');
  var errorMalDescripcionRest = document.getElementById('errorMalDesc');

  if (descripcionRest == null || descripcionRest.trim() === "") {
      inputDescripcionRest.style.borderColor = 'red';
      errorVacioDescripcionRest.textContent = "La descripción del restaurante es obligatoria.";
      errorMalDescripcionRest.textContent = "";
      return false;
  } else {
      inputDescripcionRest.style.borderColor = '#e8ebeb';
      errorVacioDescripcionRest.textContent = "";
      errorMalDescripcionRest.textContent = "";
      return true;
  }
}

// Función para validar el campo de imagen del restaurante
function validacionImgRest() {
  var imgRest = document.getElementById('img_rest').value;
  var inputImgRest = document.getElementById('img_rest');
  var errorVacioImgRest = document.getElementById('errorVacioImg');
  var errorMalImgRest = document.getElementById('errorMalImg');

  if (imgRest == null || imgRest.trim() === "") {
      inputImgRest.style.borderColor = 'red';
      errorVacioImgRest.textContent = "La imagen del restaurante es obligatoria.";
      errorMalImgRest.textContent = "";
      return false;
  } else {
      inputImgRest.style.borderColor = '#e8ebeb';
      errorVacioImgRest.textContent = "";
      errorMalImgRest.textContent = "";
      return true;
  }
}

// Función para validar el campo de dinero gastado
function validacionDineroGastado() {
  var dineroGastado = document.getElementById('dinero_gastado').value;
  var inputDineroGastado = document.getElementById('dinero_gastado');
  var errorVacioDineroGastado = document.getElementById('errorVacioDineroGastado');

  if (dineroGastado == null || dineroGastado === "") {
      inputDineroGastado.style.borderColor = 'red';
      errorVacioDineroGastado.textContent = "Selecciona el dinero gastado.";
      return false;
  } else {
      inputDineroGastado.style.borderColor = '#e8ebeb';
      errorVacioDineroGastado.textContent = "";
      return true;
  }
}

// Función para validar el campo de dinero de descuento
function validacionDineroDescuento() {
  var dineroDescuento = document.getElementById('dinero_descuento').value;
  var inputDineroDescuento = document.getElementById('dinero_descuento');
  var errorVacioDineroDescuento = document.getElementById('errorVacioDineroDescuento');

  if (dineroDescuento == null || dineroDescuento === "") {
      inputDineroDescuento.style.borderColor = 'red';
      errorVacioDineroDescuento.textContent = "Selecciona el dinero de descuento.";
      return false;
  } else {
      inputDineroDescuento.style.borderColor = '#e8ebeb';
      errorVacioDineroDescuento.textContent = "";
      return true;
  }
}

// Función para validar el campo de tiempo de preparación
function validacionTiempoPreparacion() {
  var tiempoPreparacion = document.getElementById('tiempo_preparacion').value;
  var inputTiempoPreparacion = document.getElementById('tiempo_preparacion');
  var errorVacioTiempoPreparacion = document.getElementById('errorVacioTiempoPreparacion');

  if (tiempoPreparacion == null || tiempoPreparacion === "") {
      inputTiempoPreparacion.style.borderColor = 'red';
      errorVacioTiempoPreparacion.textContent = "Selecciona el tiempo de preparación.";
      return false;
  } else {
      inputTiempoPreparacion.style.borderColor = '#e8ebeb';
      errorVacioTiempoPreparacion.textContent = "";
      return true;
  }
}

// Función para validar el formulario y redirigir si es válido
function validarYRedirigir(event) {
  // Detener el envío del formulario para validar primero
  event.preventDefault();

  // Realizar validaciones aquí
  var nombreRestValido = validacionNombreRest();
  var descripcionRestValida = validacionDescripcionRest();
  var imgRestValida = validacionImgRest();
  var dineroGastadoValido = validacionDineroGastado();
  var dineroDescuentoValido = validacionDineroDescuento();
  var tiempoPreparacionValido = validacionTiempoPreparacion();

  // Verificar si todas las validaciones son verdaderas
  if (nombreRestValido && descripcionRestValida && imgRestValida && dineroGastadoValido && dineroDescuentoValido && tiempoPreparacionValido) {
      // Si todas las validaciones son verdaderas, enviar el formulario
      document.getElementById('formulario_restaurante').submit();
  } else {
      // Si alguna validación falla, mostrar un mensaje de error
      alert("Por favor, completa todos los campos correctamente.");
  }
}

// Obtener el botón de envío del formulario y agregar un evento de clic para llamar a la función de validación
var formRestaurante = document.getElementById('btnAñadirRestaurante');
if (formRestaurante) {
  formRestaurante.onclick = validarYRedirigir;
}
