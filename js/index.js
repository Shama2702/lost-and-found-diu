

document.getElementById("createAccount").addEventListener("click", function(){
	document.getElementById("loginForm").setAttribute("style","display: none;");
	document.getElementById("regForm").setAttribute("style","display: block;");
});

document.getElementById("alreadyHaveAccount").addEventListener("click", function(){
	document.getElementById("loginForm").setAttribute("style","display: block;");
	document.getElementById("regForm").setAttribute("style","display: none;");
});


