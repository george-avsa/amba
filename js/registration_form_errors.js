vhodbut.onclick = function() {

	let name = document.getElementById('name'); 
	if (name.value.length == 0) {
	name.style.borderBottom = "1px solid #E11052";
	}

	let last_name = document.getElementById('last_name'); 
	if (last_name.value.length == 0) {
	last_name.style.borderBottom = "1px solid #E11052";
	}

	let birth_day = document.getElementById('birth_day'); 
	if (birth_day.value.length == 0) {
	birth_day.style.borderBottom = "1px solid #E11052";
	}

	let city = document.getElementById('city'); 
	if (city.value.length == 0) {
	city.style.borderBottom = "1px solid #E11052";
	}

	let phone = document.getElementById('phone'); 
	if (phone.value.length == 0) {
	phone.style.borderBottom = "1px solid #E11052";
	}

	let email = document.getElementById('email'); 
	if (email.value.length == 0) {
	email.style.borderBottom = "1px solid #E11052";
	}

	// let promocode = document.getElementById('promocode'); 
	// if (promocode.value.length == 0) {
	// promocode.style.borderBottom = "1px solid #E11052";
	// }

	let password = document.getElementById('password'); 
	if (password.value.length == 0) {
	password.style.borderBottom = "1px solid #E11052";
	}

	let password_check = document.getElementById('password_check'); 
	if (password_check.value.length == 0) {
	password_check.style.borderBottom = "1px solid #E11052";
	}

};