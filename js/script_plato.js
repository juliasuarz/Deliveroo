// SCRIPT FROM REST
// Función para validar el campo de nombre del restaurante

var nombre_plato = document.getElementById('nombre_plato');
if (nombre_plato) {
  nombre_plato.onblur = validacionNombrePlato;
}
var precio_plato = document.getElementById('precio_plato');
if (precio_plato) {
  precio_plato.onblur = validacionPrecioPlato;
}
var img_plato = document.getElementById('img_plato');
if (img_plato) {
  img_plato.onblur = validacionImgPlato;
}
// var id_tipo_plato = document.getElementById('id_tipo_plato');
// if (id_tipo_plato) {
//   id_tipo_plato.onblur = validacionTipoPlato;
// }



function validacionNombrePlato() {
  var nombreRest = document.getElementById('nombre_plato').value;
  var inputNombreRest = document.getElementById('nombre_plato');
  var errorVacioNombreRest = document.getElementById('errorVacioNombre');
  var errorMalNombreRest = document.getElementById('errorMalNombre');

  if (nombreRest == null || nombreRest.trim() === "") {
      inputNombreRest.style.borderColor = 'red';
      errorVacioNombreRest.textContent = "El nombre del plato es obligatorio.";
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
function validacionPrecioPlato() {
  var descripcionRest = document.getElementById('precio_plato').value;
  var inputDescripcionRest = document.getElementById('precio_plato');
  var errorVacioDescripcionRest = document.getElementById('errorVacioDesc');
  var errorMalDescripcionRest = document.getElementById('errorMalDesc');

  if (descripcionRest == null || descripcionRest.trim() === "") {
      inputDescripcionRest.style.borderColor = 'red';
      errorVacioDescripcionRest.textContent = "El precio del plato es obligatorio.";
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
function validacionImgPlato() {
  var imgRest = document.getElementById('img_plato').value;
  var inputImgRest = document.getElementById('img_plato');
  var errorVacioImgRest = document.getElementById('errorVacioImg');
  var errorMalImgRest = document.getElementById('errorMalImg');

  if (imgRest == null || imgRest.trim() === "") {
      inputImgRest.style.borderColor = 'red';
      errorVacioImgRest.textContent = "La imagen del plato es obligatoria.";
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
// function validacionTipoPlato() {
//   var dineroGastado = document.getElementById('id_tipo_plato').value;
//   var inputDineroGastado = document.getElementById('id_tipo_plato');
//   var errorVacioDineroGastado = document.getElementById('errorVacioDineroGastado');

//   if (dineroGastado == null || dineroGastado === "") {
//       inputDineroGastado.style.borderColor = 'red';
//       errorVacioDineroGastado.textContent = "Selecciona el dinero gastado.";
//       return false;
//   } else {
//       inputDineroGastado.style.borderColor = '#e8ebeb';
//       errorVacioDineroGastado.textContent = "";
//       return true;
//   }
// }


// // Función para validar el formulario y redirigir si es válido
function validarYRedirigir(event) {
  // Detener el envío del formulario para validar primero
  event.preventDefault();

  // Realizar validaciones aquí
  var nombreRestValido = validacionNombrePlato();
  var precioValida = validacionPrecioPlato();
  var imgValida = validacionImgPlato();
  // var tipoPlatoValida = validacionTipoPlato();

  // Verificar si todas las validaciones son verdaderas
    if (nombreRestValido && precioValida && imgValida) {
      // Si todas las validaciones son verdaderas, enviar el formulario
      insertarPlato();
      // document.getElementById('frm').submit();
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


// REGISTRAR/MODIFICAR PLATOS

function insertarPlato() {
  // Se referencia el elemento <form> con ID 'frm'
  var form = document.getElementById('frm');
  var formdata = new FormData(form);
  var ajax = new XMLHttpRequest();

  ajax.open('POST', './insert_platos.php');

  ajax.onload= function(){

      // El status 200 indica que se ha ejecutado correctamente la petición AJAX
      if (ajax.status===200){
              
          if(ajax.responseText == "ok"){
              Swal.fire({
                  icon: 'success',
                  title: 'Registrado',
                  showConfirmButton: false,
                  timer: 1500
              });
              // Se resetea el formulario
              form.reset();
              // Refresca el listado de registros eliminando filtros
          }else{
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
              form.reset();
          }
      }else{
          respuesta_ajax.innerText = 'Error';
      }
  }
  ajax.send(formdata);
}