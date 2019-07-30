function compareTodictionary(str) {
	var attribute = ['personalNr', 'name', 'fachgebiet', 'boss',
'matrikelNr', 'vorlesungsNr',
		'personalNr', 'name', 'rang', 'raum',
		'matrikelNr', 'vorlesungsNr', 'personalNr', 'note',
		'vorgaenger', 'nachfolger',
		'matrikelNr', 'name', 'semester',
		'vorlesungsNr', 'titel', 'sWS', 'gelesenVon'];
		var index=0;
		
		console.log(attribute.length;
		
	while (index < attribute.length) {
		if (attribute[index] == str) {
			return true;
			index++;
		}

	}
	return false;

}