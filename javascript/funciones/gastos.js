window.onload = function ()
{
   var resp = prompt('Quiere iniciar?', 'sí').toLowerCase().trim();

   if (resp != 'si' && resp != 'sí') {
      alert('Gracias por haber venido');
      window.location = 'http:\\www.netflix.com';
   }

   function pedirNumber(mensaje, minVal) {
      var resp;

      do {
         resp = prompt(mensaje);
         if (isNaN(resp)) {
            alert('Debe ingresar un número');
            continue;
         }
         if (resp == 0 || resp >= minVal) {
            break;
         }
         alert('El número debe ser mayor a ' + (minVal - 1));
      } while (true);

      return parseFloat(resp);
   }

   function pedirString(mensaje) {
      var resp;

      do {
         resp = prompt(mensaje).trim();
         if (resp.length == 0) {
            alert('Por favor ingrese un nombre');
            continue;
         }
         break;
      } while (true);

      return resp;
   }

   var integrantes;
   var gastos = [];
   var nombre;
   var gasto;

   integrantes = pedirNumber('Cuántos integrantes tiene la familia?', 3);
   if (integrantes == 0) {
      return;
   }

   for (var i = 0; i < integrantes; i++) {
      nombre = pedirString(`Nombre del integrante ${i + 1} de la familia`);
      gasto = pedirNumber('Gasto del día', 0);
      gastos.push({ nombre: nombre, gasto: gasto });
   }

   console.log(gastos);
   
   function crearElemento(tagName, innerText) {
      var elem = document.createElement(tagName);
      elem.appendChild(document.createTextNode(innerText));
      return elem;
   }

   var body = document.body;
   body.appendChild(crearElemento('h1', 'Reporte de gastos familiares'));

   var primerGasto = gastos[0].gasto;
   var gastoMayor = gastos.reduce((acum, elem) => elem.gasto > acum ? elem.gasto : acum, primerGasto);
   var gastoMenor = gastos.reduce((acum, elem) => elem.gasto < acum ? elem.gasto : acum, primerGasto);
   var totalDeGastos = gastos.reduce((acum, elem) => elem.gasto + acum, 0);
   var promedioDeGastos = totalDeGastos / gastos.length;
   var integranteQueMasGasto = gastos.find((elem) => elem.gasto == gastoMayor);
   var integranteQueMenosGasto = gastos.find((elem) => elem.gasto == gastoMenor);

   var lista = document.createElement('ul');

   var item = document.createElement('li');
   var texto = document.createTextNode(
      'El integrante que más gastó fue ' +
      integranteQueMasGasto.nombre +
      ': $ ' +
      gastoMayor
   );
   item.append(texto);
   item.setAttribute('title', texto.innerText);
   lista.append(item);

   item = document.createElement('li');
   texto = document.createTextNode(
      'El integrante que menos gastó fue ' +
      integranteQueMenosGasto.nombre +
      ': $ ' +
      gastoMenor
   );
   item.append(texto);
   item.setAttribute('title', texto.innerText);
   lista.append(item);

   item = document.createElement('li');
   texto = document.createTextNode(
      'El total de gastos de toda la familia es de $ ' +
      totalDeGastos
   );
   item.append(texto);
   item.setAttribute('title', texto.innerText);
   lista.append(item);

   item = document.createElement('li');
   texto = document.createTextNode(
      'El promedio de gastos de toda la familia es de $ ' +
      promedioDeGastos
   );
   item.append(texto);
   item.setAttribute('title', texto.innerText);
   lista.append(item);

   body.append(lista);

   var boton = document.createElement('button');
   texto = document.createTextNode('¿Nos pasamos del presupuesto?');
   boton.append(texto);
   boton.addEventListener('click', function () {
      if (totalDeGastos > 1200) {
         alert('ATENCIÓN: LA FAMILIA HA SOBREPASADO EL PRESUPUESTO MÁXIMO DIARIO DE $ 1200');
      }
      else
      {
         alert('No, tranqui, el gasto fue menor al tope diario de $ 1200');
      }
   });

   body.append(boton);

   boton = document.createElement('button');
   texto = document.createTextNode('Alternar tema oscuro');
   boton.append(texto);
   boton.addEventListener('click', function () {
      body.classList.toggle('dark-theme');
   });

   body.append(boton);
}
