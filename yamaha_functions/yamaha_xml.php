<?php
// Fordert den aktuellen Zustand der Power-Einstellung an (GET)
// Mögliche Rückgabewerte:
// "Standby" - Gerät ist im Standby-Modus
// "On" - Gerät ist eingeschaltet
// "On/Standby" - Gerät kann zwischen Standby und eingeschaltetem Zustand wechseln

// Setzt den Power-Modus (PUT)
// Mögliche Werte:
// "Standby" - Gerät in Standby versetzen
// "On" - Gerät einschalten

$xml_get_full_info = '<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="GET">
		<Main_Zone>
			<Basic_Status>GetParam</Basic_Status>
		</Main_Zone>
	</YAMAHA_AV>';

/* ####### Power (Einschalten/Ausschalten) ###### */
$xml_get_power = '<?xml version="1.0" encoding="utf-8"? 
    <YAMAHA_AV cmd="GET">
        <Main_Zone>
            <Basic_Status>
                <Power_Control>
                    <Power>GetParam</Power>
                </Power_Control>
            </Basic_Status>
        </Main_Zone>
    </YAMAHA_AV>';
// Fordert den aktuellen Zustand der Power-Einstellung an
/* ####### Power (Einschalten/Ausschalten) ###### */


/* ####### Power (Einschalten/Ausschalten) ###### */

$xml_set_power = '<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="PUT">
        <Main_Zone>
            <Basic_Status>
                <Power_Control>
                    <Power>{value}</Power>
                </Power_Control>
            </Basic_Status>
        </Main_Zone>
    </YAMAHA_AV>';
// Ersetze {value} durch "On" oder "Standby" für Ein-/Ausschalten


//######################################################################
// Fordert den aktuellen Zustand des Sleep-Timers an
/* ####### Sleep-Timer ###### */
// Fordert den aktuellen Zustand des Sleep-Timers an (GET)
// Mögliche Rückgabewerte:
// "Off" - Sleep-Timer ist deaktiviert
// "30 min" - Sleep-Timer ist auf 30 Minuten eingestellt
// "60 min" - Sleep-Timer ist auf 60 Minuten eingestellt
// "90 min" - Sleep-Timer ist auf 90 Minuten eingestellt
// "120 min" - Sleep-Timer ist auf 120 Minuten eingestellt
// "Last" - Sleep-Timer ist auf die zuletzt verwendete Zeit eingestellt

// Setzt den Sleep-Timer (PUT)
// Mögliche Werte:
// "Off" - Sleep-Timer deaktivieren
// "30 min" - Sleep-Timer auf 30 Minuten einstellen
// "60 min" - Sleep-Timer auf 60 Minuten einstellen
// "90 min" - Sleep-Timer auf 90 Minuten einstellen
// "120 min" - Sleep-Timer auf 120 Minuten einstellen
// "Last" - Sleep-Timer auf die zuletzt verwendete Zeit einstellen


/* ####### Sleep-Timer ###### */
$xml_get_sleep = '<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="GET">
        <Main_Zone>
            <Basic_Status>
                <Power_Control>
                    <Sleep>GetParam</Sleep>
                </Power_Control>
            </Basic_Status>
        </Main_Zone>
    </YAMAHA_AV>';




/* ####### Sleep-Timer ###### */
$xml_set_sleep = '<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="PUT">
    <Main_Zone>
        <Basic_Status>
            <Power_Control>
                <Sleep>{value}</Sleep>
            </Power_Control>
        </Basic_Status>
    </Main_Zone>
    </YAMAHA_AV>';
// Ersetze {value} durch "Off" oder eine Zeit in Minuten (z. B. "30" für 30 Minuten)


//######################################################################
/* ####### Volume (Lautstärke) ###### */
// Fordert den aktuellen Lautstärkewert an (GET)
// Min/Max: -805, 165, 5 
// Min. Lautstärke: -805 dB, 
// Max. Lautstärke: 165 dB, Schritte: 5 dB

// Setzt die Lautstärke (PUT)
// Mögliche Werte:
// Exapmle: -390 
// Min. Lautstärke: -805 dB, Max. Lautstärke: 165 dB, 


/* ####### Lautstärke ###### */
$xml_get_volume = '<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="GET">
        <Main_Zone>
            <Volume>
                <Lvl>GetParam</Lvl>
            </Volume>
        </Main_Zone>
    </YAMAHA_AV>';
// Fordert den aktuellen Lautstärkewert an


/* ####### Lautstärke ###### */
$xml_set_volume = '<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="PUT">
        <Main_Zone>
            <Volume>
                <Lvl>
                    <Val>{value}</Val>
                    <Exp>1</Exp>
                    <Unit>dB</Unit>
                </Lvl>
            </Volume>
        </Main_Zone>
    </YAMAHA_AV>';
// Ersetze {value} durch den gewünschten Dezibelwert, z. B. "-300" für -30.0 dB

// Mögliche Werte:
// "Down" - Lautstärke verringern
// "Up" - Lautstärke erhöhen
// "Down 1 dB" - Lautstärke um 1 dB verringern
// "Up 1 dB" - Lautstärke um 1 dB erhöhen
// "Down 2 dB" - Lautstärke um 2 dB verringern
// "Up 2 dB" - Lautstärke um 2 dB erhöhen
// "Down 5 dB" - Lautstärke um 5 dB verringern
// "Up 5 dB" - Lautstärke um 5 dB erhöhen
$xml_step_volume ='<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="PUT">
        <Main_Zone>
            <Volume>
                <Lvl>
                    <Val>{value}</Val>
                    <Exp></Exp>
                    <Unit></Unit>
                </Lvl>
            </Volume>
        </Main_Zone>
    </YAMAHA_AV>';

//######################################################################
/* ####### Mute (Stummschaltung) ###### */
// Fordert den aktuellen Zustand der Mute-Einstellung an (GET)
// Mögliche Rückgabewerte:
// "Off" - Stummschaltung ist deaktiviert
// "Att -40 dB" - Lautstärke wurde um 40 dB reduziert (Stummschaltung bei -40 dB)
// "Att -20 dB" - Lautstärke wurde um 20 dB reduziert (Stummschaltung bei -20 dB)
// "On" - Stummschaltung ist aktiv
// "On/Off" - Stummschaltung kann zwischen aktiv und deaktiviert wechseln

// Setzt den Mute-Modus (PUT)
// Mögliche Werte:
// "Off" - Stummschaltung deaktivieren
// "Att -40 dB" - Lautstärke um 40 dB reduzieren (Stummschaltung bei -40 dB)
// "Att -20 dB" - Lautstärke um 20 dB reduzieren (Stummschaltung bei -20 dB)
// "On" - Stummschaltung aktivieren
// "On/Off" - Stummschaltung zwischen aktiv und deaktiviert wechseln



/* ####### Mute (Stummschaltung) ###### */
$xml_get_mute = '<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="GET">
        <Main_Zone>
            <Volume>
                <Mute>GetParam</Mute>
            </Volume>
        </Main_Zone>
    </YAMAHA_AV>';
// Fordert den aktuellen Zustand der Stummschaltung an


/* ####### Mute (Stummschaltung) ###### */
$xml_set_mute = '<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="PUT">
        <Main_Zone>
            <Volume>
                <Mute>{value}</Mute>
            </Volume>
        </Main_Zone>
    </YAMAHA_AV>';
// Ersetze {value} durch "On" oder "Off" für Stummschaltung ein-/ausschalten



//#######################################################################
/* ####### Input (Eingangsauswahl) ###### */
// Fordert den aktuellen Eingang des Geräts an (GET)
// Mögliche Rückgabewerte:
// "SIRIUS" - SIRIUS Radio als Eingang
// "TUNER" - Tuner-Eingang
// "MULTI CH" - Mehrkanal-Eingang
// "PHONO" - Phono-Eingang
// "HDMI1" bis "HDMI7" - HDMI-Eingänge (HDMI1 bis HDMI7)
// "AV1" bis "AV7" - AV-Eingänge (AV1 bis AV7)
// "V-AUX" - Virtueller AUX-Eingang
// "AUDIO1" bis "AUDIO4" - Audio-Eingänge (AUDIO1 bis AUDIO4)
// "DOCK" - Dock-Eingang
// "iPod" - iPod-Eingang
// "Bluetooth" - Bluetooth-Eingang
// "UAW" - UAW-Eingang (z.B. USB Audio Wireless)
// "NET" - Netzwerk-Eingang
// "Rhapsody" - Rhapsody-Musikdienst
// "SIRIUS InternetRadio" - SIRIUS Internet Radio
// "Pandora" - Pandora-Musikdienst
// "Napster" - Napster-Musikdienst
// "PC" - PC-Eingang
// "NET RADIO" - Internet Radio
// "USB" - USB-Eingang
// "iPod (USB)" - iPod über USB-Eingang

// Setzt den Eingang (PUT)
// Mögliche Werte:
// "SIRIUS" - SIRIUS Radio als Eingang wählen
// "TUNER" - Tuner-Eingang wählen
// "MULTI CH" - Mehrkanal-Eingang wählen
// "PHONO" - Phono-Eingang wählen
// "HDMI1" bis "HDMI7" - HDMI-Eingang wählen (HDMI1 bis HDMI7)
// "AV1" bis "AV7" - AV-Eingang wählen (AV1 bis AV7)
// "V-AUX" - Virtuellen AUX-Eingang wählen
// "AUDIO1" bis "AUDIO4" - Audio-Eingang wählen (AUDIO1 bis AUDIO4)
// "DOCK" - Dock-Eingang wählen
// "iPod" - iPod-Eingang wählen
// "Bluetooth" - Bluetooth-Eingang wählen
// "UAW" - UAW-Eingang wählen
// "NET" - Netzwerk-Eingang wählen
// "Rhapsody" - Rhapsody-Musikdienst als Eingang wählen
// "SIRIUS InternetRadio" - SIRIUS Internet Radio als Eingang wählen
// "Pandora" - Pandora-Musikdienst als Eingang wählen
// "Napster" - Napster-Musikdienst als Eingang wählen
// "PC" - PC-Eingang wählen
// "NET RADIO" - Internet Radio als Eingang wählen
// "USB" - USB-Eingang wählen
// "iPod (USB)" - iPod über USB-Eingang wählen



/* ####### Eingangsquelle ###### */
$xml_get_input = '<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="GET">
        <Main_Zone>
            <Input>
                <Input_Sel>GetParam</Input_Sel>
            </Input>
        </Main_Zone>
    </YAMAHA_AV>';
// Fordert die aktuelle Eingangsquelle an

/* ####### Eingangsquelle ###### */
$xml_set_input = '<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="PUT">
        <Main_Zone>
            <Input>
                <Input_Sel>{value}</Input_Sel>
            </Input>
        </Main_Zone>
    </YAMAHA_AV>';
// Ersetze {value} durch den Namen der Quelle, z. B. "AV1", "HDMI1", oder "Tuner"


//######################################################################################
/* ####### Surround-Modus ###### */
/* ####### Surround-Programm (Surround Sound Mode) ###### */
// Fordert das aktuell eingestellte Surround-Programm an (GET)
// Mögliche Rückgabewerte:
// "Hall in Munich" - Hall-Effekt in München (z.B. für klassische Musik)
// "Hall in Vienna" - Hall-Effekt in Wien (für orchestrale oder klassische Musik)
// "Hall in Amsterdam" - Hall-Effekt in Amsterdam (für verschiedene Musikstile)
// "Church in Freiburg" - Kirchenklang in Freiburg (echte Akustik einer Kirche)
// "Church in Royaumont" - Kirchenklang in Royaumont (Akustik einer historischen Kirche)
// "Chamber" - Kammermusik-Modus (ideal für kleine Ensembles)
// "Village Vanguard" - Modus inspiriert vom Village Vanguard Jazz Club (ideal für Jazz)
// "Warehouse Loft" - Modus für die Atmosphäre eines Lagerhauses oder Lofts
// "Cellar Club" - Modus für Clubs mit niedriger Deckenhöhe und gedämpftem Klang
// "The Roxy Theatre" - Modus, der das Ambiente des Roxy Theaters nachahmt
// "The Bottom Line" - Modus, inspiriert von der Klanglandschaft des Bottom Line Clubs
// "Sports" - Surround-Modus für Sportübertragungen
// "Action Game" - Surround-Modus für Action-Spiele mit intensiven Effekten
// "Roleplaying Game" - Surround-Modus für Rollenspiele, bei denen die Atmosphäre wichtig ist
// "Music Video" - Modus für Musikvideos, mit Fokus auf visuelle und klangliche Effekte
// "Recital/Opera" - Modus für Opern- oder Konzertdarbietungen
// "Standard" - Standard Surround Sound Mode, keine besondere Klangbearbeitung
// "Spectacle" - Surround-Modus für große Filme oder epische Erlebnisse
// "Sci-Fi" - Surround-Modus für Science-Fiction Filme (mit futuristischen Klanglandschaften)
// "Adventure" - Surround-Modus für Abenteuerfilme mit vielen actionreichen Szenen
// "Drama" - Surround-Modus für Dramen, wo die Stimme und Musik im Vordergrund stehen
// "Mono Movie" - Mono-Modus für ältere Filme, die in Mono aufgenommen wurden
// "2ch Stereo" - 2-Kanal Stereo-Modus, klassischer Stereoklang
// "7ch Stereo" - 7-Kanal Stereo-Modus, erweitert das Stereo-Erlebnis auf 7 Lautsprecher
// "9ch Stereo" - 9-Kanal Stereo-Modus, noch breitere Klanglandschaft für Stereo
// "Straight Enhancer" - Verstärkter "Straight" Modus, ideal für klangtreue Wiedergabe
// "7ch Enhancer" - Verstärkter 7-Kanal-Modus für erweiterten Surround-Sound
// "Surround Decoder" - Surround-Dekoder-Modus, der verschiedene Surround-Tonformate decodiert

// Setzt das Surround-Programm (PUT)
// Mögliche Werte:
// "Hall in Munich" - Hall-Effekt in München (für klassische Musik)
// "Hall in Vienna" - Hall-Effekt in Wien (für orchestrale oder klassische Musik)
// "Hall in Amsterdam" - Hall-Effekt in Amsterdam (für verschiedene Musikstile)
// "Church in Freiburg" - Kirchenklang in Freiburg (echte Akustik einer Kirche)
// "Church in Royaumont" - Kirchenklang in Royaumont (Akustik einer historischen Kirche)
// "Chamber" - Kammermusik-Modus (ideal für kleine Ensembles)
// "Village Vanguard" - Modus inspiriert vom Village Vanguard Jazz Club (ideal für Jazz)
// "Warehouse Loft" - Modus für die Atmosphäre eines Lagerhauses oder Lofts
// "Cellar Club" - Modus für Clubs mit niedriger Deckenhöhe und gedämpftem Klang
// "The Roxy Theatre" - Modus, der das Ambiente des Roxy Theaters nachahmt
// "The Bottom Line" - Modus, inspiriert von der Klanglandschaft des Bottom Line Clubs
// "Sports" - Surround-Modus für Sportübertragungen
// "Action Game" - Surround-Modus für Action-Spiele mit intensiven Effekten
// "Roleplaying Game" - Surround-Modus für Rollenspiele, bei denen die Atmosphäre wichtig ist
// "Music Video" - Modus für Musikvideos, mit Fokus auf visuelle und klangliche Effekte
// "Recital/Opera" - Modus für Opern- oder Konzertdarbietungen
// "Standard" - Standard Surround Sound Mode, keine besondere Klangbearbeitung
// "Spectacle" - Surround-Modus für große Filme oder epische Erlebnisse
// "Sci-Fi" - Surround-Modus für Science-Fiction Filme (mit futuristischen Klanglandschaften)
// "Adventure" - Surround-Modus für Abenteuerfilme mit vielen actionreichen Szenen
// "Drama" - Surround-Modus für Dramen, wo die Stimme und Musik im Vordergrund stehen
// "Mono Movie" - Mono-Modus für ältere Filme, die in Mono aufgenommen wurden
// "2ch Stereo" - 2-Kanal Stereo-Modus, klassischer Stereoklang
// "7ch Stereo" - 7-Kanal Stereo-Modus, erweitert das Stereo-Erlebnis auf 7 Lautsprecher
// "9ch Stereo" - 9-Kanal Stereo-Modus, noch breitere Klanglandschaft für Stereo
// "Straight Enhancer" - Verstärkter "Stra


$xml_set_surround = '<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="PUT">
        <Main_Zone>
            <Surround>
                <Program_Sel>
                    <Current>
                        <Sound_Program>{value}</Sound_Program>
                    </Current>
                </Program_Sel>
            </Surround>
        </Main_Zone>
    </YAMAHA_AV>';
// Ersetze {value} durch den gewünschten Surround-Modus, z. B. "2ch Stereo", "Movie", oder "Music"

/* ####### Surround-Modus ###### */
$xml_get_surround = '<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="GET">
        <Main_Zone>
            <Surround>
                <Program_Sel>
                    <Current>GetParam</Current>
                </Program_Sel>
            </Surround>
        </Main_Zone>
    </YAMAHA_AV>';
// Fordert den aktuellen Surround-Modus an

//#####################################################################################
/* ####### Sound Video - Bass (Bassregelung) ###### */
// Fordert den aktuellen Basswert an (GET)
// Mögliche Rückgabewerte:
// Ein Wert zwischen -60 dB und +60 dB mit einer Schrittweite von 5 dB
// Der Wert stellt die Bassverstärkung oder -absenkung dar:
// - Negative Werte (z.B. -60 dB bis -5 dB) verringern den Bass
// - Positive Werte (z.B. +5 dB bis +60 dB) verstärken den Bass

// Setzt den Basswert (PUT)
// Mögliche Werte:
// Ein Wert zwischen -60 dB und +60 dB mit einer Schrittweite von 5 dB
// Der Wert stellt die gewünschte Bassverstärkung oder -absenkung dar:
// - Negative Werte (z.B. -60 dB bis -5 dB) reduzieren den Bass
// - Positive Werte (z.B. +5 dB bis +60 dB) verstärken den Bass
/* ####### Bass ###### */
$xml_get_bass = '<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="GET">
        <Main_Zone>
            <Sound_Video>
                <Tone>
                    <Bass>
                        <Val>GetParam</Val>
                    </Bass>
                </Tone>
            </Sound_Video>
        </Main_Zone>
    </YAMAHA_AV>';
// Fordert den aktuellen Basswert an

/* ####### Sound Video Bass ###### */
$xml_set_bass = '<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="PUT">
        <Main_Zone>
            <Sound_Video>
                <Tone>
                    <Bass>
                        <Val>{value}</Val>
                        <Exp>1</Exp>
                        <Unit>dB</Unit>
                    </Bass>
                </Tone>
            </Sound_Video>
        </Main_Zone>
    </YAMAHA_AV>';
// Ersetze {value} durch den gewünschten Basswert, z. B. "50" (5.0 dB)

/* ####### Treble ###### */
$xml_get_treble = '<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="GET">
        <Main_Zone>
            <Sound_Video>
                <Tone>
                    <Treble>
                        <Val>GetParam</Val>
                    </Treble>
                </Tone>
            </Sound_Video>
        </Main_Zone>
    </YAMAHA_AV>';
// Fordert den aktuellen Treblewert an


/* ####### Treble ###### */
$xml_set_treble = '<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="PUT">
    <Main_Zone>
        <Sound_Video>
            <Tone>
                <Treble>
                    <Val>{value}</Val>
                    <Exp>1</Exp>
                    <Unit>dB</Unit>
                </Treble>
            </Tone>
        </Sound_Video>
    </Main_Zone>
    </YAMAHA_AV>';
// Ersetze {value} durch den gewünschten Treblewert, z. B. "40" (4.0 dB)

//####################################################################
/* ####### Sound Video - HDMI Output (HDMI-Ausgang) ###### */
// Fordert den aktuellen HDMI-Ausgangsstatus an (GET)
// Mögliche Rückgabewerte:
// "Off" - HDMI-Ausgang ist deaktiviert, kein Video- oder Audiosignal über HDMI
// "OUT" - HDMI-Ausgang ist aktiv (Standardausgang)
// "OUT1" - HDMI-Ausgang 1 ist aktiv
// "OUT2" - HDMI-Ausgang 2 ist aktiv
// "OUT1 + 2" - Beide HDMI-Ausgänge (OUT1 und OUT2) sind aktiv

// Setzt den HDMI-Ausgangsstatus (PUT)
// Mögliche Werte:
// "Off" - HDMI-Ausgang deaktivieren (kein Signal über HDMI)
// "OUT" - HDMI-Ausgang aktivieren (Standardausgang)
// "OUT1" - HDMI-Ausgang 1 aktivieren
// "OUT2" - HDMI-Ausgang 2 aktivieren
// "OUT1 + 2" - Beide HDMI-Ausgänge (OUT1 und OUT2) aktivieren


/* ####### Bassregelung für Headphone (Kopfhörer) ###### */
// Fordert den aktuellen Basswert im Headphone Tone Bereich an (GET)
// Mögliche Rückgabewerte:
// Ein Wert zwischen -60 dB und +60 dB in 5 dB Schritten:
// - Negative Werte (z.B. -60 dB bis -5 dB) reduzieren den Bass
// - Positive Werte (z.B. +5 dB bis +60 dB) verstärken den Bass

// Setzt den Basswert im Headphone Tone Bereich (PUT)
// Mögliche Werte:
// Ein Wert zwischen -60 dB und +60 dB in 5 dB Schritten:
// - Negative Werte (z.B. -60 dB bis -5 dB) reduzieren den Bass
// - Positive Werte (z.B. +5 dB bis +60 dB) verstärken den Bass

/* ####### HDMI-Output ###### */
$xml_get_hdmi_output = '<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="GET">
        <Main_Zone>
            <Sound_Video>
                <HDMI>
                    <Output>
                        <OUT_1>GetParam</OUT_1>
                    </Output>
                </HDMI>
            </Sound_Video>
        </Main_Zone>
    </YAMAHA_AV>';
// Fordert den aktuellen Zustand des HDMI-Ausgangs an

/* ####### HDMI-Output ###### */
$xml_set_hdmi_output = '<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="PUT">
    <Main_Zone>
        <Sound_Video>
            <HDMI>
                <Output>
                    <OUT_1>{value}</OUT_1>
                </Output>
            </HDMI>
        </Sound_Video>
    </Main_Zone>
    </YAMAHA_AV>';
// Ersetze {value} durch "On" oder "Off" für den HDMI-Ausgang ein-/ausschalten


//#################################################################################

/* ####### Video Out (Video-Ausgang) ###### */
// Fordert den aktuellen Video-Ausgang zugeordneten Parameter an (GET)
// Mögliche Rückgabewerte:
// "HDMI1" - Video-Ausgang ist auf HDMI1 zugeordnet
// "HDMI2" - Video-Ausgang ist auf HDMI2 zugeordnet
// "HDMI3" - Video-Ausgang ist auf HDMI3 zugeordnet
// "HDMI4" - Video-Ausgang ist auf HDMI4 zugeordnet
// "HDMI5" - Video-Ausgang ist auf HDMI5 zugeordnet
// "HDMI6" - Video-Ausgang ist auf HDMI6 zugeordnet
// "HDMI7" - Video-Ausgang ist auf HDMI7 zugeordnet
// "AV1" - Video-Ausgang ist auf AV1 zugeordnet
// "AV2" - Video-Ausgang ist auf AV2 zugeordnet
// "AV3" - Video-Ausgang ist auf AV3 zugeordnet
// "AV4" - Video-Ausgang ist auf AV4 zugeordnet
// "AV5" - Video-Ausgang ist auf AV5 zugeordnet
// "AV6" - Video-Ausgang ist auf AV6 zugeordnet
// "AV7" - Video-Ausgang ist auf AV7 zugeordnet
// "V-AUX" - Video-Ausgang ist auf den V-AUX zugeordnet
// "OFF" - Kein Video-Ausgang zugeordnet (Video-Ausgang deaktiviert)

// Setzt den Video-Ausgang (PUT)
// Mögliche Werte:
// "HDMI1" - Video-Ausgang auf HDMI1 setzen
// "HDMI2" - Video-Ausgang auf HDMI2 setzen
// "HDMI3" - Video-Ausgang auf HDMI3 setzen
// "HDMI4" - Video-Ausgang auf HDMI4 setzen
// "HDMI5" - Video-Ausgang auf HDMI5 setzen
// "HDMI6" - Video-Ausgang auf HDMI6 setzen
// "HDMI7" - Video-Ausgang auf HDMI7 setzen
// "AV1" - Video-Ausgang auf AV1 setzen
// "AV2" - Video-Ausgang auf AV2 setzen
// "AV3" - Video-Ausgang auf AV3 setzen
// "AV4" - Video-Ausgang auf AV4 setzen
// "AV5" - Video-Ausgang auf AV5 setzen
// "AV6" - Video-Ausgang auf AV6 setzen
// "AV7" - Video-Ausgang auf AV7 setzen
// "V-AUX" - Video-Ausgang auf V-AUX setzen
// "OFF" - Video-Ausgang deaktivieren (kein Video-Signal ausgeben)

$xml_get_video_output = '<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="GET">
    <System>
        <Input_Output>
            <Assign>
                <Video_Out>GetParam</Video_Out>
            </Assign>
        </Input_Output>
    </System>
    </YAMAHA_AV>';

$xml_set_video_output = '<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="PUT">
    <System>
        <Input_Output>
            <Assign>
                <Video_Out>{value}</Video_Out>
            </Assign>
        </Input_Output>
    </System>
    </YAMAHA_AV>';

//##################################################################
/* ####### UKW-Tuner Channel Info (GET) ###### */
// Fordert Informationen zum aktuell ausgewählten Preset-Item des UKW-Tuners an (GET)
// Diese Anfrage gibt Informationen zum gewählten Preset-Item des UKW-Tuners zurück, wie z.B. Name und Details des Presets.
// Mögliche Werte: Item_1, Item_2, ..., Item_41
$xml_get_ukw_tuner_channel_info = '<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="GET">
    <Tuner>
        <Play_Control>
            <Preset>
                <Preset_Sel_Item>GetParam</Preset_Sel_Item> <!-- Fordert Informationen zum aktuell gewählten Preset-Item des UKW-Tuners an -->
            </Preset>
        </Play_Control>
    </Tuner>
    </YAMAHA_AV>';

/* ####### UKW-Tuner Channel Select (PUT) ###### */
// Setzt das UKW-Tuner-Preset auf das gewünschte Preset-Slot (PUT)
// Mögliche Werte: 1 bis 40 (Preset-Slots)
// Der Platzhalter {value} sollte durch eine Zahl von 1 bis 40 ersetzt werden, z.B. "1", "2", ..., "40"
$xml_set_ukw_tuner_select_channel = '<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="PUT">
    <Tuner>
        <Play_Control>
            <Preset>
                <Preset_Sel>{value}</Preset_Sel> <!-- Setzt das gewünschte Preset für den UKW-Tuner -->
            </Preset>
        </Play_Control>
    </Tuner>
    </YAMAHA_AV>';


//##################################################################################


/* ####### UKW-Tuner Channel Select (GET) ###### */
// Fordert das aktuell ausgewählte Preset des UKW-Tuners an (GET)
// Diese Anfrage gibt das derzeit gewählte Preset-Item des UKW-Tuners zurück.
// Mögliche Werte: 1 bis 40 (Preset-Slots)
// Beispiel: "Preset_Sel" könnte auf "1", "2", ..., "40" gesetzt sein.
$xml_get_ukw_tuner_select_channel = '<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="GET">
    <Tuner>
        <Play_Control>
            <Preset>
                <Preset_Sel>GetParam</Preset_Sel> <!-- Fordert das aktuell ausgewählte Preset des UKW-Tuners an -->
            </Preset>
        </Play_Control>
    </Tuner>
    </YAMAHA_AV>';

//##################################################################################
/* ####### iPod Meta Information ###### */
// Fordert die aktuellen Meta-Informationen des iPod an (GET)
// Diese Anfrage gibt Informationen zum Titel, Künstler, Album, etc. zurück, die momentan abgespielt werden.
$xml_get_ipod_meta_info = '<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="GET">
    <iPod>
        <Play_Info>
            <Meta_Info>GetParam</Meta_Info> <!-- Fordert die Meta-Informationen des iPod an -->
        </Play_Info>
    </iPod>
    </YAMAHA_AV>';

//###############################################################################

/* ####### iPod Play Mode Shuffle ###### */
// Setzt den Shuffle-Status des iPod Play Modus (PUT)
// Mögliche Werte:
// "Off" - Shuffle ist ausgeschaltet
// "Songs" - Shuffle für Songs aktiviert
// "Albums" - Shuffle für Alben aktiviert
$xml_set_ipod_play_mode_shuffle = '<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="PUT">
    <iPod>
        <Play_Control>
            <Play_Mode>
                <Shuffle>{value}</Shuffle> <!-- Setzt den gewünschten Shuffle-Status des iPod Play Modus -->
            </Play_Mode>
        </Play_Control>
    </iPod>
    </YAMAHA_AV>';



/* ####### iPod Play Mode Shuffle ###### */
// Fordert den aktuellen Shuffle-Status des iPod Play Modus an (GET)
// Mögliche Rückgabewerte:
// "Off" - Shuffle ist ausgeschaltet
// "Songs" - Shuffle ist für Songs aktiviert
// "Albums" - Shuffle ist für Alben aktiviert
$xml_get_ipod_play_mode_shuffle = '<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="GET">
    <iPod>
        <Play_Control>
            <Play_Mode>
                <Shuffle>GetParam</Shuffle> <!-- Fordert den aktuellen Shuffle-Status des iPod Play Modus an -->
            </Play_Mode>
        </Play_Control>
    </iPod>
    </YAMAHA_AV>';

//###########################################################################


/* ####### iPod Play Mode Repeat ###### */
// Setzt den Repeat-Status des iPod Play Modus (PUT)
// Mögliche Werte:
// "Off" - Wiederholung ausgeschaltet
// "One" - Wiederholung eines einzelnen Titels
// "All" - Wiederholung aller Titel
$xml_set_ipod_play_mode_repeat = '<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="PUT">
    <iPod>
        <Play_Control>
            <Play_Mode>
                <Repeat>{value}</Repeat> <!-- Setzt den gewünschten Repeat-Status des iPod Play Modus -->
            </Play_Mode>
        </Play_Control>
    </iPod>
    </YAMAHA_AV>';


/* ####### iPod Play Mode Repeat ###### */
// Fordert den aktuellen Repeat-Status des iPod Play Modus an (GET)
// Mögliche Rückgabewerte:
// "Off" - Wiederholung ausgeschaltet
// "One" - Wiederholung eines einzelnen Titels
// "All" - Wiederholung aller Titel
$xml_get_ipod_play_mode_repeat = '<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="GET">
    <iPod>
        <Play_Control>
            <Play_Mode>
                <Repeat>GetParam</Repeat> <!-- Fordert den aktuellen Repeat-Status des iPod Play Modus an -->
            </Play_Mode>
        </Play_Control>
    </iPod>
    </YAMAHA_AV>';

//########################################################

/* ####### iPod Meta Info ###### */
// Fordert die Metainformationen der aktuellen iPod-Wiedergabe an (GET)
// Mögliche Rückgabewerte:
// Enthält die Metadaten wie Titel, Künstler, Album, etc. der aktuellen Wiedergabe
$xml_get_ipod_usb_meta_info = '<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="GET">
    <iPod_USB>
        <Play_Info>
            <Meta_Info>GetParam</Meta_Info> <!-- Fordert die Metadaten der aktuellen iPod-Wiedergabe an -->
        </Play_Info>
    </iPod_USB>
    </YAMAHA_AV>';

//#########################################################

/* ####### iPod Play/Pause/Stop/Next/Prev Status ###### */
// Fordert den aktuellen Status der iPod-Wiedergabe an (GET)
// Mögliche Rückgabewerte:
// "Stop" - Wiedergabe gestoppt
// "Pause" - Wiedergabe pausiert
// "Play" - Wiedergabe läuft
// "|<<" - Springt zum vorherigen Titel
// ">>|" - Springt zum nächsten Titel
// "Skip Rev" - Überspringt rückwärts (vergangene Titel)
// "Skip Fwd" - Überspringt vorwärts (nächste Titel)
$xml_get_ipod_usb_play_pause = '<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="GET">
    <iPod_USB>
        <Play_Control>
            <Playback>GetParam</Playback> <!-- Fordert den aktuellen Status der iPod-Wiedergabe an -->
        </Play_Control>
    </iPod_USB>
    </YAMAHA_AV>';

/* ####### iPod Play/Pause/Stop/Next/Prev Status ###### */
// Setzt den iPod Play/Pause/Stop/Next/Prev Status (PUT)
// Mögliche Werte:
// "Stop" - Wiedergabe gestoppt
// "Pause" - Wiedergabe pausiert
// "Play" - Wiedergabe läuft
// "|<<" - Springt zum vorherigen Titel
// ">>|" - Springt zum nächsten Titel
// "Skip Rev" - Überspringt rückwärts (vergangene Titel)
// "Skip Fwd" - Überspringt vorwärts (nächste Titel)
$xml_set_ipod_usb_play_pause = '<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="PUT">
    <iPod_USB>
        <Play_Control>
            <Playback>{value}</Playback> <!-- Setzt den gewünschten Status für die iPod-Wiedergabe -->
        </Play_Control>
    </iPod_USB>
    </YAMAHA_AV>';

//################################################################

/* ####### USB Meta Info ###### */
// Fordert die Metainformationen der aktuellen USB-Wiedergabe an (GET)
// Mögliche Rückgabewerte:
// Enthält die Metadaten wie Titel, Künstler, Album, etc. der aktuellen Wiedergabe
$xml_get_usb_meta_info = '<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="GET">
    <USB>
        <Play_Info>
            <Meta_Info>GetParam</Meta_Info> <!-- Fordert die Metadaten der aktuellen USB-Wiedergabe an -->
        </Play_Info>
    </USB>
    </YAMAHA_AV>';


//#######################################################################



/* ####### USB Play/Stop/Next/Prev Status ###### */
// Fordert den aktuellen Status der USB-Wiedergabe an (GET)
// Mögliche Rückgabewerte:
// "Stop" - Wiedergabe gestoppt
// "Play" - Wiedergabe läuft
// "|<<" - Springt zum vorherigen Titel
// ">>|" - Springt zum nächsten Titel
// "Skip Rev" - Überspringt rückwärts (vergangene Titel)
// "Skip Fwd" - Überspringt vorwärts (nächste Titel)
$xml_get_usb_play_stop_next_prev = '<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="GET">
    <USB>
        <Play_Control>
            <Playback>GetParam</Playback> <!-- Fordert den aktuellen Status der USB-Wiedergabe an -->
        </Play_Control>
    </USB>
    </YAMAHA_AV>';

/* ####### USB Play/Stop/Next/Prev Status ###### */
// Setzt den USB Play/Stop/Next/Prev Status (PUT)
// Mögliche Werte:
// "Stop" - Wiedergabe gestoppt
// "Play" - Wiedergabe läuft
// "|<<" - Springt zum vorherigen Titel
// ">>|" - Springt zum nächsten Titel
// "Skip Rev" - Überspringt rückwärts (vergangene Titel)
// "Skip Fwd" - Überspringt vorwärts (nächste Titel)
$xml_set_usb_play_stop_next_prev = '<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="PUT">
    <USB>
        <Play_Control>
            <Playback>{value}</Playback> <!-- Setzt den gewünschten Status für die USB-Wiedergabe -->
        </Play_Control>
    </USB>
    </YAMAHA_AV>';



//#############################################################

/* ####### USB Playmode Shuffle ###### */
// Fordert den aktuellen Zustand des USB Playmode Shuffle an (GET)
// Mögliche Rückgabewerte:
// "Off" - Shuffle deaktiviert
// "On" - Shuffle aktiviert
$xml_get_usb_shuffle = '<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="GET">
    <USB>
        <Play_Control>
            <Play_Mode>
                <Shuffle>GetParam</Shuffle> <!-- Fordert den aktuellen Zustand des Shuffle-Playmode an -->
            </Play_Mode>
        </Play_Control>
    </USB>
    </YAMAHA_AV>';

/* ####### USB Playmode Shuffle ###### */
// Setzt den Zustand des USB Playmode Shuffle (PUT)
// Mögliche Werte:
// "Off" - Shuffle deaktiviert
// "On" - Shuffle aktiviert
$xml_set_usb_shuffle = '<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="PUT">
    <USB>
        <Play_Control>
            <Play_Mode>
                <Shuffle>{value}</Shuffle> <!-- Setzt den gewünschten Zustand des Shuffle-Playmode -->
            </Play_Mode>
        </Play_Control>
    </USB>
    </YAMAHA_AV>';

//####################################################################

/* ####### USB Playmode Repeat ###### */
// Fordert den aktuellen Zustand des USB Playmode Repeat an (GET)
// Mögliche Rückgabewerte:
// "Off" - Wiederholung deaktiviert
// "Single" - Wiederholung eines einzelnen Titels
// "All" - Wiederholung aller Titel
$xml_get_usb_repeat = '<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="GET">
    <USB>
        <Play_Control>
            <Play_Mode>
                <Repeat>GetParam</Repeat> <!-- Fordert den aktuellen Zustand des Repeat-Playmode an -->
            </Play_Mode>
        </Play_Control>
    </USB>
    </YAMAHA_AV>';

/* ####### USB Playmode Repeat ###### */
// Setzt den Zustand des USB Playmode Repeat (PUT)
// Mögliche Werte:
// "Off" - Wiederholung deaktiviert
// "Single" - Wiederholung eines einzelnen Titels
// "All" - Wiederholung aller Titel
$xml_set_usb_repeat = '<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="PUT">
    <USB>
        <Play_Control>
            <Play_Mode>
                <Repeat>{value}</Repeat> <!-- Setzt den gewünschten Zustand des Repeat-Playmode -->
            </Play_Mode>
        </Play_Control>
    </USB>
    </YAMAHA_AV>';


//###################################################################################

$xml_set_bass_headphone = '<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="PUT">
    <Main_Zone>
        <Sound_Video>
            <Headphone>
                <Tone>
                    <Bass>
                        <Val>{value}</Val> <!-- Setzt den Basswert im Headphone Tone Bereich -->
                    </Bass>
                </Tone>
            </Headphone>
        </Sound_Video>
    </Main_Zone>
    </YAMAHA_AV>';

$xml_get_bass_headphone = '<?xml version="1.0" encoding="utf-8"?>
    <YAMAHA_AV cmd="GET">
    <Main_Zone>
        <Sound_Video>
            <Headphone>
                <Tone>
                    <Bass>
                        <Val>GetParam</Val> <!-- Fordert den aktuellen Basswert im Headphone Tone Bereich an -->
                    </Bass>
                </Tone>
            </Headphone>
        </Sound_Video>
    </Main_Zone>
    </YAMAHA_AV>';
