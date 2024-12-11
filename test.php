<?php

ini_set('display_errors', 1); // Fehleranzeige aktivieren
error_reporting(E_ALL);

// Setzen Sie den Content-Type Header auf UTF-8 für XML-Daten
header('charset=UTF-8');

require_once(__DIR__ . "/yamaha_functions/class.php");

//Check how long request need
$start = microtime(true);

//create array for overviwe info - it's a yamaha request, to get a handful option 
$all_infos = [];

//all infos are inside the array
$all_infos = $yamaha->getAll_infos(true);

//split the array to each parameter, manually, or by loop
if (isset($all_infos['Main_Zone'])) {
	$power_state = $all_infos['Main_Zone']['Basic_Status']['Power_Control']['Power'];
	$sleep_state = $all_infos['Main_Zone']['Basic_Status']['Power_Control']['Sleep'];

	// Volume is in my case a negativ value like -455 db. it need to be maultiple with 10, to get the correct value
	$volume_val = $all_infos['Main_Zone']['Basic_Status']['Volume']['Lvl']['Val'];
	$volume_exp = $all_infos['Main_Zone']['Basic_Status']['Volume']['Lvl']['Exp'];
	$volume_unit = $all_infos['Main_Zone']['Basic_Status']['Volume']['Lvl']['Unit'];
	$volume_mute = $all_infos['Main_Zone']['Basic_Status']['Volume']['Mute'];

	$input_sel = $all_infos['Main_Zone']['Basic_Status']['Input']['Input_Sel'];
	$input_sel_param = $all_infos['Main_Zone']['Basic_Status']['Input']['Input_Sel_Item_Info']['Param'];
	$input_sel_rw = $all_infos['Main_Zone']['Basic_Status']['Input']['Input_Sel_Item_Info']['RW'];
	$input_sel_title = $all_infos['Main_Zone']['Basic_Status']['Input']['Input_Sel_Item_Info']['Title'];
	$input_sel_icon_on = $all_infos['Main_Zone']['Basic_Status']['Input']['Input_Sel_Item_Info']['Icon']['On'];
	$input_sel_icon_off = $all_infos['Main_Zone']['Basic_Status']['Input']['Input_Sel_Item_Info']['Icon']['Off'];
	$input_sel_src_number = $all_infos['Main_Zone']['Basic_Status']['Input']['Input_Sel_Item_Info']['Src_Number'];

	$sound_program = $all_infos['Main_Zone']['Basic_Status']['Surround']['Program_Sel']['Current']['Sound_Program'];
	$straight = $all_infos['Main_Zone']['Basic_Status']['Surround']['Program_Sel']['Current']['Straight'];
	$enhancer = $all_infos['Main_Zone']['Basic_Status']['Surround']['Program_Sel']['Current']['Enhancer'];
	$cinema_dsp = $all_infos['Main_Zone']['Basic_Status']['Surround']['_3D_Cinema_DSP'];

	$tone_bass_val = $all_infos['Main_Zone']['Basic_Status']['Sound_Video']['Tone']['Bass']['Val'];
	$tone_bass_exp = $all_infos['Main_Zone']['Basic_Status']['Sound_Video']['Tone']['Bass']['Exp'];
	$tone_bass_unit = $all_infos['Main_Zone']['Basic_Status']['Sound_Video']['Tone']['Bass']['Unit'];
	$tone_treble_val = $all_infos['Main_Zone']['Basic_Status']['Sound_Video']['Tone']['Treble']['Val'];
	$tone_treble_exp = $all_infos['Main_Zone']['Basic_Status']['Sound_Video']['Tone']['Treble']['Exp'];
	$tone_treble_unit = $all_infos['Main_Zone']['Basic_Status']['Sound_Video']['Tone']['Treble']['Unit'];

	$direct_mode = $all_infos['Main_Zone']['Basic_Status']['Sound_Video']['Direct']['Mode'];
	$hdmi_standby_through = $all_infos['Main_Zone']['Basic_Status']['Sound_Video']['HDMI']['Standby_Through_Info'];
	$hdmi_output_out_1 = $all_infos['Main_Zone']['Basic_Status']['Sound_Video']['HDMI']['Output']['OUT_1'];

	$adaptive_drc = $all_infos['Main_Zone']['Basic_Status']['Sound_Video']['Adaptive_DRC'];
}



//Testing, set the volume
$Do_setVolume = $yamaha->stepVolume("Down 5 dB", true);
var_dump($Do_setVolume);

$end = microtime(true);

// Calculate the difference in milliseconds
$millisec = floor(($end - $start) * 1000);

echo "<br>Script needs: " . $millisec . " ms";

?>