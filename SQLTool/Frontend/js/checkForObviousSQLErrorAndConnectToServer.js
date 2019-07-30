
//function to create a connection. doesnt get called directly from index
function ajaxSqlFunction(sendfrom) {
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

		if (ajaxRequest.readyState == 4) {
			var ajaxDisplay = document.getElementById('Ausgabebereich');
			ajaxDisplay.innerHTML = ajaxRequest.responseText;

			ajaxDisplay = document.getElementById('Ausgabebereichmobil');
			ajaxDisplay.innerHTML = ajaxRequest.responseText;

		}
	}

	// Now get the value from user and pass it to
	// server script.
	var AdvancedString = document.getElementById('textAreaSqlInput').value;

	var queryString = "";
	queryString += "pw=&advancedString=" + AdvancedString + "&advancedCheck=1";

	if (sendfrom == "desktop") {
		ajaxRequest.open("POST", "sqlAntwort.php", "sqldemo", "sql348demo", true);
	} else if (sendfrom == "mobile") {
		//console.log("jetzt wird mobil gesendet");
		ajaxRequest.open("POST", "sqlAntwortMobile.php", "sqldemo", "sql348demo", true);
	}

	ajaxRequest.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	ajaxRequest.send(queryString);
}
//-->

function sqlcheckvorher(sendfrom) { //checks beforehand if there are any obvious flaws on with the sql-query. if flawless then call ajaxSqlFunction()
	var error = 0;
	//
	document.getElementById("fehlerausgabe").innerHTML = "";
	
	try{
		errorcounter++;
	}
	catch(err){
	errorcounter=0;
	}
	console.log(errorcounter);
	
	
	
	document.getElementById('Ausgabebereich').innerHTML = "";  //sicherheitsmaßnahme, damit bei //einem neuen Befehl alles leer ist
	document.getElementById('Ausgabebereichmobil').innerHTML = ""; ;
	
	sqleingabe = document.getElementById("textAreaSqlInput").value; //inhalt der textarea soll in //sqleingabe sein
	
	//analyse der sqleingabe
	var fehlerausgabe = "";
	
	fehlerausgabe = fehlerausgabe.concat("<p class='text-justify'>Fehler: ");
	
	sqleingabe = sqleingabe.trim();
	
	
	if(errorcounter>15){
	fehlerausgabe = fehlerausgabe.concat("Vielleicht hättest du mal die<br/> Vorlesungen besuchen sollen ;)<br/>..und ");
	document.getElementById("fehlerausgabe").innerHTML = fehlerausgabe;
	}
	
	if(sqleingabe.toUpperCase().includes("BERKAY")){
		fehlerausgabe = fehlerausgabe.concat("ja? du hast nach mir gerufen? <br/>du erreichst mich unter <br/>byaman@stud.hs-offenburg.de");
	document.getElementById("fehlerausgabe").innerHTML = fehlerausgabe;
	return false;
	}

	if (sqleingabe.length == 0) { //checks if sqlinput is empty
		fehlerausgabe = fehlerausgabe.concat("Eingabebereich ist leer!");
		document.getElementById("fehlerausgabe").innerHTML = fehlerausgabe;
		return false;
	}
	console.log("ok select ist nicht leer.weiterchecken...");
	arraySQLstring = sqleingabe.split(/\n/).join(" ").split(" "); // es soll nach zeilenumbruch oder leerzeichen splitten	

	arraySQLstring[0] = arraySQLstring[0].toUpperCase();
	
	if (arraySQLstring[0] != "SELECT") { //check if first word is select
		
		fehlerausgabe = fehlerausgabe.concat(" du hast 'select' nicht oder du hast es falsch geschrieben...  ..und setz es ganz an den Anfang >");
		error=1;

		var counter = 0;
		while (counter < arraySQLstring.length) {
			
			if (arraySQLstring[counter].toUpperCase() == "SELECT" || arraySQLstring[counter].toUpperCase == "") {
				counter++;
				fehlerausgabe = ("Select ist an der Stelle " + counter + ". Es muss ganz an den Anfang");
				counter--;
			}

			counter++;
		}
		
		document.getElementById("fehlerausgabe").innerHTML = fehlerausgabe;
		
	}
	
	//check if select is touching something
	var counterToCheckSelect = 0;
	while (counterToCheckSelect < arraySQLstring.length){
		
		if(arraySQLstring[counterToCheckSelect].toUpperCase().includes("SELECT") &&  arraySQLstring[counterToCheckSelect].toUpperCase() != "SELECT" ) {
			
			fehlerausgabe = "Fehler: Select steht mit etwas in Berührung. Um Select müssen Leerzeichen sein.";
		document.getElementById("fehlerausgabe").innerHTML = fehlerausgabe;
		error = 1;
		return false;
		}
		
		
		counterToCheckSelect++;
	}
	//end check if select is touching
	
	if(error==1){return false;}
	

	if (arraySQLstring[1] == undefined) { //check if only input was "select" or else
		//console.log("Du hast nur ein Wort..");
		fehlerausgabe = fehlerausgabe.concat("Du hast nur ein Wort. Nach select kommen Attribute, z.b. '*' oder 'name'... oder auch ein distinct für einzigartigkeit ");
		document.getElementById("fehlerausgabe").innerHTML = fehlerausgabe;
		error = 1;
		return false;
	} else if (arraySQLstring[1] == "from") {

		fehlerausgabe = fehlerausgabe.concat(" du hast nen attribut vergessen <br/>weil 'from' an der zweiten Stelle steht ");
		document.getElementById("fehlerausgabe").innerHTML = fehlerausgabe;
		error = 1;

	}
	
	
	//does from exist, but from touches something then error
	var counterToCheckFrom = 0;
	while (counterToCheckFrom < arraySQLstring.length){
		
		if(arraySQLstring[counterToCheckFrom].toUpperCase().includes("FROM") &&  arraySQLstring[counterToCheckFrom].toUpperCase() != "FROM" ) {
			
			fehlerausgabe = fehlerausgabe.concat(" from steht mit etwas in Berührung");
		document.getElementById("fehlerausgabe").innerHTML = fehlerausgabe;
		error = 1;
		}
		
		
		counterToCheckFrom++;
	}
		

	if (error == 0) { //if still clean
		var selectindex,
		fromindex;
		index = 0;
		while (index < arraySQLstring.length) {
			if ("SELECT" == arraySQLstring[index].toUpperCase()) { //finde heraus wo select ist
				selectindex = index;

			}
			index++;
		}
		index = 0;
		while (index < arraySQLstring.length) {
			if ("FROM" == arraySQLstring[index].toUpperCase()) { //finde heraus wo from ist
				fromindex = index;

			}
			index++;
		}

		console.log("fromindex ist" + fromindex);
		console.log("selectindex ist" + selectindex);
		//teile gesamtstring in kleineres attributstring ein und schau, ob jedes der Attribute existiert
		index = selectindex + 1;
		var attributeString = "";
		if(fromindex == undefined){
			console.log("fromindex ist undefiniert");
			fehlerausgabe = fehlerausgabe.concat('Dir fehlt im SQL-Befehl das Schlüsselwort "From" ');
			error=1;
			document.getElementById("fehlerausgabe").innerHTML = fehlerausgabe;
			return false;
		}
		while (index < fromindex) {
			attributeString = attributeString.concat(arraySQLstring[index]);
			index++;
		
		}
		//console.log("Attributestring ist " + attributeString);
		attributeString = attributeString.trim();
		//console.log("Attributestring getrimmt ist " + attributeString);
		attributeArray = attributeString.split(",");
		var zaehlerfordic = 0;
		while (zaehlerfordic < attributeArray.length) {
			if (true != attributeCompareToDictionary(attributeArray[zaehlerfordic])) {
				error = 1;
				fehlerausgabe = fehlerausgabe.concat('dein Attribut "' + attributeArray[zaehlerfordic] + '" ist kein Attribut von irgendeiner Tabelle  Schau doch mal unter "Schemata", welche Attribute für welche Tabellen angeboten werden<br/><br/> ');

			} else {
				//console.log(attributeArray[zaehlerfordic] + "EXISTIERT IM WÖRTERBUCH!");
			}
			zaehlerfordic++;
			

		}
	
		
		//check für die tabellen ob da nicht irgendwelche Fehler vorkommen
		var tableString="";
		index= fromindex+1;
		while(index < arraySQLstring.length){
			tableString=tableString.concat(arraySQLstring[index]);
			index++;	
		}
		//console.log(tableString);
		
		tableString = tableString.trim();
		tableArray = tableString.split(",");
		
		var zaehlerfordic = 0;
		while (zaehlerfordic < tableArray.length) {
			if (true != tableCompareToDictionary(tableArray[zaehlerfordic])) {
				error = 1;
				fehlerausgabe = fehlerausgabe.concat('deine vermeintliche Tabelle "' + tableArray[zaehlerfordic] + '" existiert nicht Hier mal einige bekannte Tabellen, die man einsetzen könnte: Assistent Hoert Professor Prueft setztvoraus Student Vorlesung ');

			} else {
				//console.log(tableArray[zaehlerfordic] + "EXISTIERT IM WÖRTERBUCH!");
			}
			zaehlerfordic++;
		}
	}	
		
		
		

	
 var ausgabetitel= "<h3 class='dropdown-item'>Ausgabebereich</h3>";
 
 
	
	document.getElementById("fehlerausgabe").innerHTML = fehlerausgabe;

	if (error == 0) {
		console.log("send from ist=" + sendfrom);
		document.getElementById("fehlerausgabe").innerHTML = "";
		errorcounter=0;
		ajaxSqlFunction(sendfrom);
	}

}

function attributeCompareToDictionary(str) { //compare s word if it is withing the dictionary, is is an attribute of the database// if yes return true
	var attribute = ['personalNr', 'name', 'fachgebiet', 'boss',
		'matrikelNr', 'vorlesungsNr',
		'personalNr', 'name', 'rang', 'raum',
		'matrikelNr', 'vorlesungsNr', 'personalNr', 'note',
		'vorgaenger', 'nachfolger',
		'matrikelNr', 'name', 'semester',
		'vorlesungsNr', 'titel', 'sWS', 'gelesenVon', '*'];
	var index = 0;
	console.log(str + "is the word we search");

	console.log("länge von attribut:" + attribute.length);
	while (index < attribute.length) {
		if (str.toUpperCase().includes (attribute[index].toUpperCase())) {
			//console.log(attribute[index] + " IS THE WORD ");
			return true;
		}

		index++;
		

	}

	return false;

}


function tableCompareToDictionary(str) { //compare s word if it is withing the dictionary, is is an attribute of the database// if yes return true
	var table = ['assistent','hoert','professor','prueft','setztvoraus','student','vorlesung'];
	var index = 0;
	console.log(str + " is the word we search");

	
	while (index < table.length) {
		if (str.toLowerCase().includes(table[index])) {
			console.log(table[index] + " IS THE WORD ");
			return true;
		}

		index++;
		console.log(table[index] + " is not the word ");

	}

	return false;

}
