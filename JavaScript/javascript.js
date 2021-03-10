$(document).ready(function() {
	$(".fa-bars").on("click", function() {
		$("header nav ul").toggleClass("open");
	});
});


//alert("test");

/*
function funktion() {
	var name = "nachname";
	window.alert(name.length);
	//document.getElementById(Name).innerHTML = "Hallo";
	//window.alert(name);
}

if (3 > 5) 
				window.alert("eins");
			else 
				window.alert("zwei");
				
			
		

			
function funktion() {
	
	
	
	
	if (document.getElementById("ausgabe").innerHTML != "")
	{
		window.alert("if greift");
	}
	else {
		document.getElementById("ausgabe").innerHTML = "test";
		window.alert("else greift");
	}*/
	
	/*var name = document.getElementById("nachname").value;
	var vorname = document.getElementById("vorname").value;
	var ausgabeN = [name];
	var ausgabeV = [vorname];
	window.alert(ausgabeN);
	ausgabeN.push(name);
	
	//for (i = 0; i < name.length; i++) {
		name = document.getElementById("nachname").value;
		vorname = document.getElementById("vorname").value;
		var ausgabename = vorname + " " + name;
		//document.getElementById("ausgabe").innerHTML = vorname.join(" ") + name.join("\n");
		document.getElementById("ausgabe").innerHTML = ausgabename;
					
		document.getElementById("nachname").value = "";
		document.getElementById("vorname").value = "";
	//}
	//window.alert(name + " " + vorname);
}*/