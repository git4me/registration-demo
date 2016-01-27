window.onload = function () {
	document.getElementById("password").onchange = validatePassword;
	document.getElementById("password_confirm").onchange = validatePassword;
};

function validatePassword() {
	var pass2 = document.getElementById("password_confirm").value;
	var pass1 = document.getElementById("password").value;
	if (pass1 != pass2) {
		document.getElementById("password_confirm").setCustomValidity("Passwords must match");
	} else {
		document.getElementById("password_confirm").setCustomValidity('');
	}
}