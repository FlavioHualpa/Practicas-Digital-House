window.onload = function () {

   // ocultar el H1 con id=titular
   document.getElementById('titular').style.display = 'none';

   // mostrar la imagen de la lechuza en blanco y negro
   document.querySelector('#lechuza').style.filter = 'grayscale(100%)';

   // mostrar en la consola el elemento con id=copyright
   cpyrgt = document.querySelector('#copyright');
   console.log(cpyrgt);
   
   // cambiar el color del H2 a rojo
   h2 = document.querySelector('h2');
   h2.style.color = 'red';

   // cambiar el color de todos los íconos
   icons = document.querySelectorAll('.icon');
   for (var icon of icons) {
      icon.style.color = 'red';
   }

   // mostrar en consola los atributos del elemento copyright
   for (var attr of cpyrgt.attributes) {
      console.log(attr.name + ': ' + attr.value);
   }

   // mostrar la url de los links a Twitter y Facebook
   url = document.querySelector('.fa-twitter').getAttribute('href');
   console.log(url);
   url = document.querySelector('.fa-facebook').getAttribute('href');
   console.log(url);

   // cambiar el atributo href del link a youtube
   document.querySelector('.fa-youtube').setAttribute('href', 'https://www.youtube.com/channel/UCKkPOtW8gQPgIUaxF4Og7PA');

   // consultar y mostrar por consola si el formulario
   // contiene el atributo action
   var elForm = document.querySelector('.formulario');
   console.log('El formulario contiene el atributo action: ' + elForm.hasAttribute('action'));
   
   // cambiar el atributo url por action en el formulario
   var link = elForm.getAttribute('url');
   elForm.removeAttribute('url');
   elForm.setAttribute('action', link);
}