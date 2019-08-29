var registerForm = document.querySelector('.theForm');
var formElements = Array.from(registerForm.elements);


// Saco el submit de mi array de elementos
formElements.pop();

var regexEmail = /\S+@\S+\.\S+/;

var errors = {};

formElements.forEach(function (oneElement) {

	var divError = null;

	if (oneElement.type !== 'file') {
		divError = oneElement.nextElementSibling;
	} else {
		divError = oneElement.parentElement.nextElementSibling;
	}
// cuando el campo pierde foco..
	oneElement.addEventListener('blur', function () {

		var elementValue = oneElement.value.trim();


		if (elementValue === '') {
			this.classList.add('is-invalid');
			divError.innerText = `El campo ${this.name} es obligatorio`;
			divError.style.display = 'block';
			errors[this.name] = true;
		} else {
			this.classList.remove('is-invalid');
			divError.style.display = 'none';
			divError.innerText = '';

			delete errors[this.name];

			if (this.name === 'email') {

				if (!regexEmail.test(elementValue)) {
					this.classList.add('is-invalid');
					divError.style.display = 'block';
					divError.innerText = `Ingresá un email válido`;

					errors[this.name] = true;
				} else {

					this.classList.remove('is-invalid');
					divError.style.display = 'none';
					divError.innerText = '';
				}
			}
		}

		console.log(errors);
	});


	if (oneElement.name === 'foto') {
		oneElement.addEventListener('change', function () {

			var avatarName = this.value.split('\\').pop();
			this.nextElementSibling.innerText = avatarName

			var fileExt = this.value.split('.').pop();


			var imageType = ['jpg', 'jpeg', 'png',];

			var myExt= imageType.find(function (ext) {
				return ext === fileExt;
			});

			if (myExt === undefined) {
				this.classList.add('is-invalid');
				divError.style.display = 'block';
				divError.innerText = 'Inserte una imagen con los siguiente formatos: jpg, jpeg y png';

				errors[this.name] = true;
			} else {
				this.classList.remove('is-invalid');
				divError.style.display = 'none';
				divError.innerText = '';

				delete errors[this.name];
			}
		})
	}
});

registerForm.addEventListener('submit', function (event) {
	formElements.forEach(function (oneElement) {
		var finalValue = oneElement.value.trim();

		if (finalValue === '') {
			errors[oneElement.name] = true;
		}
	});

	if (Object.keys(errors).length > 0) {
		alert('completá los campos');
		console.log(errors);
		event.preventDefault();
	}
})
