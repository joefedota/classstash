function test() {
	alert(test);
}
function formhash(form, password) {
	var p = document.createElement("input");
	
	form.appendChild(p);
	p.name = "p";
	p.type = "hidden";
	p.value = hex_sha512(password.value);
	
	password.value = "";
	
	form.submit();
}
function regformhash(form, uid, email, pass, conf) {
	
	if (uid.value == '' || email.value == '' || pass.value == '' || conf.value == '') {
		alert("You must fill out all of the fields before you can register.");
		return false;
	}
	
	//Check the username
	
	re = /^[a-zA-Z_\s]+$/;
	if(!re.test(form.fullname.value)) {
		alert("Name must contain only letters and spaces. Please try again"); 
       		form.fullname.focus();
        	return false; 
	}
	
	if (pass.value.length < 6) {
        	alert('Passwords must be at least 6 characters long.  Please try again');
        	form.password.focus();
        	return false;
    	}
	
	var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/; 
    	if (!re.test(pass.value)) {
        	alert('Passwords must contain at least one number, one lowercase and one uppercase letter.  Please try again');
       		return false;
    	}
    	
    	if (pass.value != conf.value) {
        	alert('Your password and confirmation do not match. Please try again');
        	form.password.focus();
        	return false;
    	}
    	
    	var p = document.createElement("input");
 
    	// Add the new element to our form. 
    	form.appendChild(p);
   	p.name = "p";
    	p.type = "hidden";
    	p.value = hex_sha512(pass.value);
 
    	// Make sure the plaintext password doesnt get sent. 
    	pass.value = "";
   	conf.value = "";
 
    	// Finally submit the form. 
    	form.submit();
    	return true;
}