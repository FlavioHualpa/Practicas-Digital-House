var estudiante = {
   nombre: 'Flavio',
   curso: 'Web developer full stack',
   dni: 22651477,
   email: 'fh@mymail.com',

   objectToArray: function (obj) {
      var prop = [];
      for (var key in obj) {
         prop.push(obj[key]);
      }
      return prop;
   }
}

console.log(estudiante.objectToArray(estudiante));

function cambiarColorDeFondoDelBody(color)
{
   var inLowerCase = color.toLowerCase();

   console.log('Intentando cambiar el color de fondo a ' + inLowerCase);
   
   if (inLowerCase != 'green' && inLowerCase != '#0f0' && inLowerCase != '#00ff00')
   {
      var body = document.querySelector('body');
      body.setAttribute('style', 'background-color: ' + inLowerCase);
      return true;
   }
   
   return false
}

var cambioOK = cambiarColorDeFondoDelBody('#009000');
if (cambioOK) {
   console.log('Se ha cambiado el color de fondo');
} else {
   console.log('NO se ha cambiado el color de fondo');
}

cambioOK = cambiarColorDeFondoDelBody('GREEN');
if (cambioOK) {
   console.log('Se ha cambiado el color de fondo');
} else {
   console.log('NO se ha cambiado el color de fondo');
}

var losParrafos = document.querySelectorAll('p');
console.log(losParrafos);

function estilizarParrafos(nodeList) {
   var pos = 0;
   var noAfectados = 0;
   for (var node of nodeList) {
      if (pos % 2 != 0) {
         node.setAttribute(
            'style',
            'color: red; font-size: 24px; font-weight: bold; text-align: center;'
         );
      }
      else {
         noAfectados++;
      }
      pos++;
   }
   return noAfectados;
}

noAfectados = estilizarParrafos(losParrafos);
console.log('Párrafos no afectados: ' + noAfectados);

function resolverEnigma() {
   var enigma = ["l", 1, "a", 2, 2, 5, "p", 5, 7, 5, 3, "e", 6,
      "r", 7, 6, 5, 3, 2, 1, "s", 9, 9, 9, 6, "e", 2, "v", 5, "e", 3, "r",
      2, "a", 1, 6, 4, 1, 2, "n", 2, "c", 3, 5, 5, 5, 7, "i", 4, "a", 5,
      2, 1, 3, "e", 6, "s", 7, "l", 4, "a", 3, "c", 2, 3, 1, 5, 3, 2, "l",
      3, "a", 4, "v", 5, "e", 6];
   
   var letras = enigma.filter(
      function (elem) {
         return typeof elem === 'string';
      }
   );

   var numeros = enigma.filter(
      function (elem) {
         return typeof elem === 'number';
      }
   );

   var calle = letras.join('');
   var altura = numeros.reduce(
      function (acum, elem) {
         return acum + elem;
      }
   );

   console.log(calle + ' ' + altura);
}

resolverEnigma();
