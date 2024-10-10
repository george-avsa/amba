vhodbut.onclick = function() {

	let name = document.getElementById('user_id'); 
	if (name.value.length == 0) {
	name.style.borderBottom = "1px solid #E11052";
	}

	let email = document.getElementById('user_email'); 
	if (email.value.length == 0) {
	email.style.borderBottom = "1px solid #E11052";
	}

};