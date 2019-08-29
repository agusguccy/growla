//API países y provincias

window.addEventListener('load', function(){
	var paises = document.getElementById('country');
	var provincias = document.getElementById('provinces');
  fetch('https://restcountries.eu/rest/v2/all')
		.then(function(response) {
		return response.json();
	})
		.then(function(data) {
    console.log(data);
		for( var pais of data){
			paises.innerHTML += `<option value="${pais.alpha2Code}">${pais.name}</option>`;
		}


	});
	paises.addEventListener('change',function(){
		if(this.value == "Argentina"){
			fetch('https://dev.digitalhouse.com/api/getProvincias')
				.then(function(response) {
				return response.json();
			}).then(function(data) {
				for( var provincia of data.data){
					provincias.innerHTML += `<option value="${provincia.state}">${provincia.state}</option>`;
				}
				provincias.parentElement.classList.remove('hidden');
			});
		}else{
			provincias.innerHTML = "";
			provincias.parentElement.classList.add('hidden');
		}
	});
});
