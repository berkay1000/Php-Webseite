  function tabellenhilfetoggle() {

  	//sends an ajaxrequest to the server for an printout to servernames and attributes
  	var ajaxRequest; // The variable that makes Ajax possible!

  	try {
  		// Opera 8.0+, Firefox, Safari
  		ajaxRequest = new XMLHttpRequest();
  	} catch (e) {

  		// Internet Explorer Browsers
  		try {
  			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
  		} catch (e) {

  			try {
  				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
  			} catch (e) {
  				// Something went wrong
  				alert("Your browser broke!");
  				return false;
  			}
  		}
  	}

  	// Create a function that will receive data
  	// sent from the server and will update
  	// div section in the same page.
  	ajaxRequest.onreadystatechange = function () {

  		if (ajaxRequest.readyState == 4) { //if element with
  			var ajaxDisplay = document.getElementById('Tabellenanzeige'); //if element with id "tabelleanzeige" is empty then fill it with table and attributenames...
  			if (ajaxDisplay.innerHTML == "") {

  				ajaxDisplay.innerHTML = ajaxRequest.responseText;
  			} else {
  				ajaxDisplay.innerHTML = ""; //...else empty it
  			}
  		}
  	}

  	// Now get the value from user and pass it to
  	// server script.


  	ajaxRequest.open("GET", "tabellenhilfeanzeigen.php", true);
  	ajaxRequest.send(null);
	
	document.getElementById("textAreaSqlInput").focus();
  }