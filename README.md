# Yamaha Receiver API  
### Pure PHP Script

## HOW TO USE

This is a complete PHP solution for reading from and controlling a Yamaha receiver. It utilizes the official factory API. While there are many additional parameters available, I have focused on setting up the main functions. Anyone can deploy this script and easily add more features. I'll explain how it works.

> I use this script for my Yamaha RX-V470 receiver.

## Installation

### First Step
Edit the yamaha_config.php and setup your port and ip-adress, from the yamaha device. Be sure to allow networking in the yamaha settings, on the device. (be careful: MAC-Filter)

Include the files with this code
            
```
require_once("yamaha_functions/class.php");
```

### Create a new Object
it will be automatically create a object.
    
``` 
$yamaha = new YamahaController...
``` 

### GET single Parameters 

- IMPORTANT! Be carfully. Some parameters are multiple value. 
    -  For Example getVolume() will return 3 parameters. lvl, exp, unit. It looks like:
```
    -4311db;
    lvl = -431, exp =1, unit= db
```

- To get each parameter, use **get as array**

```
    //Functions info
        getVolume(as Array, Debug Mode);
    
    $volume = $yamaha -> getVolume(true, false);
    print_r ($volume);

        // will return
        //   Array ( [@attributes] => Array ( [rsp] => GET [RC] => 0 ) [Main_Zone] => Array ( [Volume] => Array ( [Lvl] => Array ( [Val] => -435 [Exp] => 1 [Unit] => dB ) ) ) )

  
// To get Unit
  $volume = $yamaha->getVolume(true)['Main_Zone']['Volume']['Lvl']['Unit'];

//To get Val
  $volume = $yamaha->getVolume(true)['Main_Zone']['Volume']['Lvl']['Val'];
```
- The Reason of this usage is, to do one Request and get multiple values. You don't need to do a request for each value

```
$volume = $yamaha -> getVolume(true);

//Now, $Volume is a array, with all Values

```




Every request puts a strain on the server and also the device.
Therefore, I would like to show how to carry out individual requests for specific values.
Parameters will return as string (because paremter is false)
	
Every request returns the data in xml format.
If you want to get a single parameter in a single request, you need to set the parameter false.(default)

If a request contains more data, the XML can be automatically returned as an array. To do this, set the parameter to true

Yamaha have one request, to get a handful parameters with one. 
To get this parameters you can use this function
    
``` 
$yamaha->getAll_infos(true);
```
    If you want to get all datas in a array, i can give you this code or you will write a loop

```
        $all_infos = $yamaha->getAll_infos(true);

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
```

To ask a single Parameter use this syntax:
    		
``` 
    $yamaha->getVolume(false);
    $yamaha->getSurround(false);
```

## SET/PUT a Parameter

To set a parameter, you only need to run the correct function and fill in the value.
You can show, which value are accepted, by look inside the yamaha_xml file.
All the functions, will be listet in the class.php file

Example to turn on the reciever:
        
```
// $yamaha->setPower("new value", "debug Mode (Default 0 false)");
    $yamaha->setPower("On", false);
```

## XML Request Answer Example
I put all requests in the yamaha_xml.php file

Here is an example of a request with many parameters
							
```			Array
                    (
                        [@attributes] => Array
                            (
                                [rsp] => GET
                                [RC] => 0
                            )

                        [Main_Zone] => Array
                            (
                                [Basic_Status] => Array
                                    (
                                        [Power_Control] => Array
                                            (
                                                [Power] => Standby
                                                [Sleep] => Off
                                            )

                                        [Volume] => Array
                                            (
                                                [Lvl] => Array
                                                    (
                                                        [Val] => -445
                                                        [Exp] => 1
                                                        [Unit] => dB
                                                    )

                                                [Mute] => Off
                                            )

                                        [Input] => Array
                                            (
                                                [Input_Sel] => AV1
                                                [Input_Sel_Item_Info] => Array
                                                    (
                                                        [Param] => AV1
                                                        [RW] => RW
                                                        [Title] =>    AV1   
                                                        [Icon] => Array
                                                            (
                                                                [On] => /YamahaRemoteControl/Icons/icon003.png
                                                                [Off] => Array
                                                                    (
                                                                    )

                                                            )

                                                        [Src_Name] => Array
                                                            (
                                                            )

                                                        [Src_Number] => 1
                                                    )

                                            )

                                        [Surround] => Array
                                            (
                                                [Program_Sel] => Array
                                                    (
                                                        [Current] => Array
                                                            (
                                                                [Straight] => Off
                                                                [Enhancer] => Off
                                                                [Sound_Program] => 2ch Stereo
                                                            )

                                                    )

                                                [_3D_Cinema_DSP] => Auto
                                            )

                                        [Sound_Video] => Array
                                            (
                                                [Tone] => Array
                                                    (
                                                        [Bass] => Array
                                                            (
                                                                [Val] => 60
                                                                [Exp] => 1
                                                                [Unit] => dB
                                                            )

                                                        [Treble] => Array
                                                            (
                                                                [Val] => 40
                                                                [Exp] => 1
                                                                [Unit] => dB
                                                            )

                                                    )

                                                [Direct] => Array
                                                    (
                                                        [Mode] => Off
                                                    )

                                                [HDMI] => Array
                                                    (
                                                        [Standby_Through_Info] => Off
                                                        [Output] => Array
                                                            (
                                                                [OUT_1] => On
                                                            )

                                                    )

                                                [Adaptive_DRC] => Auto
                                            )

                                    )

                            )

                    )
```

## Functions Overview

### Enable Debug-Mode
Every request returns the data in xml format. If you want read this XML answer, it's important to format the callback with "htmlhtmlspecialchars()". To enable this, you need to set the second parameter to true;

```
getVolume($as_array, true);
```

### Functions for Volume Control
- getVolume()
- setVolume($value)
- stepVolume($value)

### Functions for Surround Settings
- getSurround()
- setSurround($value)

### Functions for Power Management
- getPower()
- setPower($value)

### Functions for Sleep Timer
- getSleep()
- setSleep($value)

### Functions for Mute Control
- getMute()
- setMute($value)

### Functions for Input Sources
- getInput()
- setInput($value)

### Functions for Sound Settings
- getTreble()
- setTreble($value)

### Functions for HDMI Output
- getHDMIOutput()
- setHDMIOutput($value)

### Functions for Video Output
- getVideoOutput()
- setVideoOutput($value)

### Functions for FM Channel Settings
- getUkwChannelInfo()
- setUkwChannelInfo($value)

### Functions for iPod Control
- getIpodMetaInfo()
- getIpodShuffle()
- setIpodShuffle($value)
- getIpodRepeat()
- setIpodRepeat($value)
- getIpodUsbPlayPause()
- setIpodUsbPlayPause($value)

### Functions for USB Control
- getUsbMetaInfo()
- getUsbPlayStopNextPrev()
- setUsbPlayStopNextPrev($value)
- getUsbShuffle()
- setUsbShuffle($value)
- getUsbRepeat()
- setUsbRepeat($value)

### Functions for Bass and Headphone Settings
- getBassHeadphone()
- setBassHeadphone($value)

### Function for Overall System Information
- getAll_infos()
