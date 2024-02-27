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
var gastado_rest = document.getElementById('gastado_rest');
if (gastado_rest) {
  gastado_rest.onblur = validacionDineroGastado;
}
var descuento_rest = document.getElementById('descuento_rest');
if (descuento_rest) {
  descuento_rest.onblur = validacionDineroDescuento;
}
var tiempo_rest = document.getElementById('tiempo_rest');
if (tiempo_rest) {
  tiempo_rest.onblur = validacionTiempoPreparacion;
}
var precio_envio_rest = document.getElementById('precio_envio_rest');
if (precio_envio_rest) {
  precio_envio_rest.onblur = validacionEnvio;
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

// // Función para validar el campo de descripción del restaurante
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

// // Función para validar el campo de imagen del restaurante
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

// // Función para validar el campo de dinero gastado
function validacionDineroGastado() {
  var dineroGastado = document.getElementById('gastado_rest').value;
  var inputDineroGastado = document.getElementById('gastado_rest');
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

// // Función para validar el campo de dinero de descuento
function validacionDineroDescuento() {
  var dineroDescuento = document.getElementById('descuento_rest').value;
  var inputDineroDescuento = document.getElementById('descuento_rest');
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

// // Función para validar el campo de tiempo de preparación
function validacionTiempoPreparacion() {
  var tiempoPreparacion = document.getElementById('tiempo_rest').value;
  var inputTiempoPreparacion = document.getElementById('tiempo_rest');
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

// // Función para validar el campo de gastos de envio
function validacionEnvio() {
  var precio_envio_rest = document.getElementById('precio_envio_rest').value;
  var inputEnvio = document.getElementById('precio_envio_rest');
  var errorVacioEnvio = document.getElementById('errorVacioPrecio');
  var errorMalEnvio = document.getElementById('errorMalPrecio');

  if (precio_envio_rest == null || precio_envio_rest.trim() === "") {
      inputEnvio.style.borderColor = 'red';
      errorVacioEnvio.textContent = "Los gastos de envío son obligatorios.";
      errorMalEnvio.textContent = "";
      return false;
  } else {
      inputEnvio.style.borderColor = '#e8ebeb';
      errorVacioEnvio.textContent = "";
      errorMalEnvio.textContent = "";
      return true;
  }
}
// // Función para validar el formulario y redirigir si es válido
function validarYRedirigir(event) {
  // Detener el envío del formulario para validar primero
  event.preventDefault();

  // Realizar validaciones aquí
  var nombreRestValido = validacionNombreRest();
  var descripcionRestValida = validacionDescripcionRest();
  var dineroDescuentoRestValida = validacionDineroDescuento();
  var dineroGastadoRestValida = validacionDineroGastado();
  var tiempoRestValida = validacionTiempoPreparacion();
  var imgRestValida = validacionImgRest();
  var envioRestValida = validacionEnvio();

  // Verificar si todas las validaciones son verdaderas
    if (nombreRestValido && descripcionRestValida && dineroDescuentoRestValida && dineroGastadoRestValida && tiempoRestValida && imgRestValida && envioRestValida) {
      // Si todas las validaciones son verdaderas, enviar el formulario
      // document.getElementById('frm').submit();
      insertarRestaurante();
  } else {
      // Si alguna validación falla, mostrar un mensaje de error
      alert("Por favor, completa todos los campos correctamente.");
  }
}

// // Obtener el botón de envío del formulario y agregar un evento de clic para llamar a la función de validación
var formRestaurante = document.getElementById('registrar');
if (formRestaurante) {
  formRestaurante.onclick = validarYRedirigir;
}

// REGISTRAR/MODIFICAR RESTAURANTES

function insertarRestaurante() {
  // Se referencia el elemento <form> con ID 'frm'
  var form = document.getElementById('frm');
  var formdata = new FormData(form);
  var ajax = new XMLHttpRequest();

  ajax.open('POST', './insert_restaurante.php');

  ajax.onload= function(){
      // El status 200 indica que se ha ejecutado correctamente la petición AJAX
      if (ajax.status===200){
          if(ajax.responseText == "Restaurante registrado"){
              Swal.fire({
                  icon: 'success',
                  title: 'Registrado',
                  showConfirmButton: false,
                  timer: 1500
              });
              // Se resetea el formulario
              form.reset();
              // Refresca el listado de registros eliminando filtros
          } else{
              console.log(ajax.responseText);

              // Si el texto recibido por la función no es el texto OK
              // Quiere decir que lo que se ha hecho es modificar un registro
              Swal.fire({
                  icon: 'success',
                  title: 'Modificado',
                  showConfirmButton: false,
                  timer: 1500
              });
              // HEMOS HECHO UNA MODIF
              registrar.value = "Registrar";
              idp.value = "";
              // Se resetea el formulario
              // form.reset();
          }
      }else{
          respuesta_ajax.innerText = 'Error';
      }
  }
  ajax.send(formdata);
}