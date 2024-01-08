	var verifbdd = document.getElementById('verifbdd').innerHTML;
	var verifbddbis = document.getElementById('verifbdd');
	var messageUrl = document.getElementById('messageUrl');
		
	if (verifbdd == '') {
	messageUrl.style.display = "block";
	verifbddbis.style.display = "none";
	}
	else {
	messageUrl.style.display = "none";
	verifbddbis.style.display = "block";
	}