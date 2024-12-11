<?php


function get_param_curl($xmlData, $url, $as_array, $debug){
	// cURL initialisieren
		$ch = curl_init();

		// cURL-Optionen setzen
		curl_setopt($ch, CURLOPT_URL, $url);          // Ziel-URL setzen
		curl_setopt($ch, CURLOPT_POST, true);                // POST-Methode verwenden
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlData);     // XML-Daten als POST-Felder setzen
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);     // Rückgabewert von cURL als String erhalten
		curl_setopt($ch, CURLOPT_HTTPHEADER, [              // Header setzen
			"Content-Type: text/xml; charset=UTF-8",        // Content-Type auf XML setzen
			"Content-Length: " . strlen($xmlData)           // Länge der XML-Daten setzen
		]);

		// Anfrage ausführen
		$response = curl_exec($ch);
		// cURL schließen

		 // Prüfen, ob ein Fehler aufgetreten ist
		 if (curl_errno($ch)) {
			$error_msg = curl_error($ch); // Fehlernachricht abrufen
			curl_close($ch); // cURL schließen
			return "cURL Error: " . $error_msg; // Fehler ausgeben
		}

		curl_close($ch);
		
		//wenn debug eingeschaltet ist, gibt es keine "als array" funktion, da der pure xml als html code angezeigt wird
		if ($debug == true){
			$as_array = false;
		}

		if ($as_array === false && $debug === false){
			return $response;
		}
		else if ($as_array === false && $debug === true){
			// Anfrage ausführen
			$debuginfo = htmlspecialchars($response);
			return $debuginfo;
	}
		else if ($as_array === true && $debug === false){
					// Anfrage ausführen
			$xmlObject = simplexml_load_string($response);
			$json = json_encode($xmlObject);
			$array = json_decode($json, true);
			return $array;
		}
		
			
} 

function set_param_curl ($xmlData, $url,$edit_value, $debug){
	$xmlData = str_replace("{value}", $edit_value, $xmlData);
	// Gebe den XML-String aus, nachdem der Platzhalter ersetzt wurde
	// cURL initialisieren
	$ch = curl_init();

	// cURL-Optionen setzen
	curl_setopt($ch, CURLOPT_URL, $url);          // Ziel-URL setzen
	curl_setopt($ch, CURLOPT_POST, true);                // POST-Methode verwenden
	curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlData);     // XML-Daten als POST-Felder setzen
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);     // Rückgabewert von cURL als String erhalten
	curl_setopt($ch, CURLOPT_HTTPHEADER, [              // Header setzen
		"Content-Type: text/xml; charset=UTF-8",        // Content-Type auf XML setzen
		"Content-Length: " . strlen($xmlData)           // Länge der XML-Daten setzen
	]);
	

	// Anfrage ausführen
	$response = curl_exec($ch);

	 // Prüfen, ob ein Fehler aufgetreten ist
	 if (curl_errno($ch)) {
        $error_msg = curl_error($ch); // Fehlernachricht abrufen
        curl_close($ch); // cURL schließen
        return "cURL Error: " . $error_msg; // Fehler ausgeben
    }

	// cURL schließen
	curl_close($ch);
	//wenn die anfrage scheitert, ist der response 0 zeichen lang
	$repsonse_length = strlen($response);
	
	if ($debug == true){
		var_dump($response);
		echo htmlspecialchars($response);
	}
	else if ($repsonse_length > 0){
		echo ($response);
	}
	else if ($repsonse_length <= 0 && $debug == false){
		echo "Wert konnte nicht gesetzt werden. XML fehlerhaft. Nutze den Debug Modus für mehr Inforamtionen";
	}
		
}



?>
