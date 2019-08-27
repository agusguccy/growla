// Primero evento a window cuando carga todos los elementos
​
window.addEventListener('load', function(){
​
	// Capturo el select de paises
	var paises = document.getElementById('country');
​
	// Capturo el select de provincias
	var provincias = document.getElementById('provinces');
​
	// Consulta a la api de Paises
​
	fetch('https://restcountries.eu/rest/v2/all')
		.then(function(response) {
		// Parseo el json a Objetos
		return response.json();
	})
		.then(function(data) {
		// Resibo el objeto y lo recorro con for of
		for( var pais of data){
			// Inserto en el select de paises las opciones
			// ${pais.name} se llama interpolar no es màs que poder pasar una variable dentro de un string
			paises.innerHTML += `<option value="${pais.name}">${pais.name}</option>`;
		}
	});
​
	// Llamos al evento change que se ejecuta cada ves que cambiamos el valor en el select de paises
	paises.addEventListener('change',function(){
		// this.value representa el valor actual del select
		if(this.value == "Argentina"){
			fetch('https://dev.digitalhouse.com/api/getProvincias')
				.then(function(response) {
				return response.json();
			}).then(function(data) {
				for( var provincia of data.data){
					provincias.innerHTML += `<option value="${provincia.state}">${provincia.state}</option>`;
				}
				// Como ocultamos el select de provincias por defecto
				// lo que hacer es remover la clase hidden al padre
				// parentElement selecciona padre del elemento que estamos llamando actualmente
				// classList nos devuelve un array con las clases que tiene esa etiqueta
				provincias.parentElement.classList.remove('hidden');
​
			});
		}else{
			provincias.innerHTML = "";
			provincias.parentElement.classList.add('hidden');
		}
	});
});
