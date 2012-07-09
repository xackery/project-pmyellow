<?php
//START MY SCRIPTING STUFF---------
error_reporting(E_ALL);
define('debug',0);
define('pokemon', true);
include_once('functions.php'); /** Functions go here. */ 

CheckSession();
CheckBattle();
LoadPlayerData();
CheckReadyStatus();
//die($Player[1]->Name);

/*for ($x = 1; $x++; $x < 3)
{// populate player 1 to 2
        for ($y = 1; $y++; $y < 7)
        { //populate monster 1 to 6
                $m[$x][$y] = new Monster();
        }
}*/
/**
 * Short description
 */
//echo "Start Fighting!<br>";

StartFight();
//echo "End Fighting!<br>";
SaveGame();
//echo "Game Saved<br>";
Finish();
//echo "<a href=\"main.php?logout=1\">Logout</a><br>";
exit();

echo "Start Battle Sequence!<br>";
//Abra, scyther, bulbasaur, pikachu, charmander

//$Player[1]->Mob[1] = new Monster(PK_SCYTHER,array(15,1,1,1,1,SK_QUICKATTACK,0,0,0));

$Player[1]->Mob[1] = new Monster(PK_CHARMANDER); //,array(15,1,1,1,1,SK_QUICKATTACK,0,0,0));
$Player[1]->Mob[2] = new Monster(PK_SCYTHER); //,array(15,1,1,1,1,SK_QUICKATTACK,0,0,0));
$Player[2]->Mob[1] = new Monster(PK_BULBASAUR);
$Player[2]->Mob[2] = new Monster(PK_PIKACHU);


StartFight();
//echo "End Battle Seqence!<br>";
exit();
mysql_connect($dbip,$dbuser,$dbpass);
@mysql_select_db($dbname) or die( "Unable to select database");

// this function tweak slightly urlencode to make it behave exactly like llEscapeURL in Second Life.
function llEscapeURL($s)
{
    $s=str_replace(array(" ","+","-",".","_"),
        array("%20","%20","%2D","%2E","%5F"),
        urlencode($s));
    return $s;
}

function crunch()
{
    foreach ($_POST as $name => $value)
    {
        if ($cpt++>0) $body.="&";
        if (get_magic_quotes_gpc())
        {
            // $name = stripslashes($name); not a good idea though
            $value = stripslashes($value);
            $_POST[$name]=$value;
        }
        $body.=llEscapeURL($name)."=".llEscapeURL($value);
    }
}

// Only works with PHP compiled as an Apache module
//$headers = apache_request_headers();

$objectName = $headers["X-SecondLife-Object-Name"];
$objectKey     = $headers["X-SecondLife-Object-Key"];
$ownerKey     = $headers["X-SecondLife-Owner-Key"];
$ownerName = $headers["X-SecondLife-Owner-Name"];
$region        = $headers["X-SecondLife-Region"];
// and so on for getting all the other variables ...

//to pull out this headers in other kinds of installations, use this (Adz)
/*
$objectName    = $_SERVER['HTTP_X_SECONDLIFE_OBJECT_NAME'];
$objectKey     = $_SERVER['HTTP_X_SECONDLIFE_OBJECT_KEY'];
$region        = $_SERVER['HTTP_X_SECONDLIFE_REGION'];
$ownerName     = $_SERVER['HTTP_X_SECONDLIFE_OWNER_NAME'];
$ownerKey      = $_SERVER['HTTP_X_SECONDLIFE_OWNER_KEY'];
*/

//xtea_key_from_string("this is a test key");




function fixattribs($keyid)
{ //Update attributes to be reflective of new level up stats.
        $query = "SELECT * FROM `".$dbprefix."char` WHERE keyid = '$keyid';";
        $result=mysql_query($query);
        if (!$result) { return -1;}
        if (mysql_numrows($result)<1) { return -1; }

        $myclass = mysql_result($result,0,"class");
        $level = mysql_result($result,0,"lvl");
        $asta = mysql_result($result,0,"attrib1");
        $awil = mysql_result($result,0,"attrib2");
        $aatk = mysql_result($result,0,"attrib3");
        $adef = mysql_result($result,0,"attrib4");
        $ssen = mysql_result($result,0,"stat1");
        $send = mysql_result($result,0,"stat2");
        $swil = mysql_result($result,0,"stat3");
        $scre = mysql_result($result,0,"stat4");
        $scha = mysql_result($result,0,"stat5");
        
        $asta = $awil = 50; //Base 100 for sta/will
        $asta += round(($asta*($level *0.1)) +  ($asta*($send * 0.05)) + ($asta*($swil * 0.02))); //Figure out stamina
        $awil += round(($asta*($level *0.1)) +  ($asta*($swil * 0.05)) + ($asta*($send * 0.02))); //Figure out stamina
        $aatk = $adef = 10; //Base of 10 for atk/def
        $aatk += round($aatk*($scha * 0.1));
        $adef += round($aatk*($scha * 0.1));
        $query = "UPDATE `".$dbprefix."char` SET attribm1 = '$asta', attribm2 = '$awil', attribm3 = '$aatk', attribm4 = '$adef' WHERE keyid = '$keyid';";
        $result=mysql_query($query);
        if (!$result) { return -1; }
        //if (mysql_numrows($result)<1) { return -1; }
        //die("-4| | |Stamina|$asta|Willpower|$awil|Attack|$aatk|Defense|$adef");
        return 0;
        
}


// get things from $_POST[]
// Naturally enough, if this is empty, you won't get anything
/*
$val0 = mysql_real_escape_string(xtea_decrypt_string($_POST["Value0"]));
$val1 = mysql_real_escape_string(xtea_decrypt_string($_POST["Value1"]));
$val2 = mysql_real_escape_string(xtea_decrypt_string($_POST["Value2"]));
$val3 = mysql_real_escape_string(xtea_decrypt_string($_POST["Value3"]));
*/
$val0 = mysql_real_escape_string($_GET["Value0"]);
$val1 = mysql_real_escape_string($_GET["Value1"]);
$val2 = mysql_real_escape_string($_GET["Value2"]);
$val3 = mysql_real_escape_string($_GET["Value3"]);
$val4 = mysql_real_escape_string($_GET["Value4"]);
$val5 = mysql_real_escape_string($_GET["Value5"]);

//echo "\nValue0: $val0\nValue1: $val1\nValue2: $val2\nValue3: $val3\nValue4: $val4";
//crunch();
// You can use the parameters here by simply using $_POST["parameter_name"]



exit(); //****************************************************************************************************************************

$query = ""; //Empty Query.
$curbalance = ""; //Used for updating and managing balances.
$charid = 0; //stores a character ID.
$result = ""; //mysql result handler
$numresults = 0; //mysql number of results returned

if ($val0 == -2)
{ //Delete Account

}
else if ($val0 == 1)
{ //Move Money
/*val0 is the Identifier of what is being requested.
val1 is object ID of what requested the transaction.
val2 is the keyID of the person requesting
val3 is amount*/
    if (strlen($val1) > 0)
    {
        if ($val3 == 0) die($LANG['BADMONEY']); //No 0 money transactions.
        //See current balance.
        $query = "SELECT cash,char_id,name FROM `".$dbprefix."char` WHERE keyid = '$val2';";
        $result=mysql_query($query);
        if (!$result) { die($lang['DBERROR']);}
        if (mysql_numrows($result)<1) { die($lang['NOREG']); }

        //Update with deposit.
        $curbalance = mysql_result($result,0,"cash");
        $charid = mysql_result($result,0,"char_id");
        $name = mysql_result($result,0,"name");
        //echo "Hello $name\nStarting Balance: $curbalance\n";
        $curbalance += $val3; //Update Cash as per new deposit
        if ($curbalance < 0 ) { die($lang['NOMONEY']); }
        $query = "UPDATE `".$dbprefix."char` SET cash = $curbalance WHERE `char_id` = '$charid';";
        $result=mysql_query($query);
        if (!$result) die("Error2: ".mysql_error());
        //Log Transaction
        //echo date('Y-m-d H:i:s');
        $query = "INSERT INTO `".$dbprefix."log` VALUES (DEFAULT, '$charid', NOW(), '$val3', '$val1');";
        $result=mysql_query($query);
        if (!$result) die($lang['ERRLOG'].mysql_error());
        //return results.
        echo "-1|"; //Success.
        if ($val3 == 1) die ($lang['ADDMONEY']." $val3 ".$lang['CASHNAME'].".");
        else if ($val3 == -1) die ($lang['REMMONEY']." $val3 ".$lang['CASHNAME'].".");
        else if ($val3 > 1) die ($lang['ADDMONEY']." $val3 ".$lang['CASHNAME']."s.");
        else if ($val3 < -1) die ($lang['REMMONEY']." $val3 ".$lang['CASHNAME']."s.");
    }
    else die($lang['ERRMONEY']);
}

else if ($val0 == 2)
{ //Update User Stats

}
else if ($val0 == 3)
{ //Confirm User Info
    if (strlen($val1) > 0)
    {
        //build query depending on critera
        $query = "SELECT * FROM `".$dbprefix."char` WHERE keyid='$val1';";
        $result=mysql_query($query);
        if (!$result) { die($lang['DBERROR']); }
        $numresults=mysql_numrows($result);
        echo "-3|Found $numresults result.";
    }
}
else if ($val0 == 4)
{ //Display HUD Info
/*val0 is the Identifier of what is being requested.
val1 is object ID of what requested the transaction.
val2 is the keyID of the person requesting, except in registration, it' sthe person's name.
val3 is amount*/
    if (strlen($val1) > 0)
    {
        fixattribs($val2);
        $query = "SELECT * FROM `".$dbprefix."char` WHERE keyid = '$val2';";
        $result=mysql_query($query);
        if (!$result) { die($lang['DBERROR']); }
        if (mysql_numrows($result)<1) { die($lang['NOREG']); }
        $buffer = "-4|";
        //$buffer .= mysql_result($result,0,"name");
        $buffer .= "|".mysql_result($result,0,"cash")."|".$lang['CASHNAME']."s";
        $buffer .= "|Level: ".mysql_result($result,0,"lvl")."|, Class: ".$lang['class'][mysql_result($result,0,"class")];
        $buffer .= "|".$lang['attrib'][1].": |".mysql_result($result,0,"attrib1") ." / ".mysql_result($result,0,"attribm1");
        $buffer .= "|".$lang['attrib'][2].": |".mysql_result($result,0,"attrib2") ." / ".mysql_result($result,0,"attribm2");
        $buffer .= "|".$lang['attrib'][3].": |".mysql_result($result,0,"attrib3") ." / ".mysql_result($result,0,"attribm3");
        $buffer .= "|".$lang['attrib'][4].": |".mysql_result($result,0,"attrib4") ." / ".mysql_result($result,0,"attribm4");
        //$buffer .= "|".$lang['stat'][1].": |".mysql_result($result,0,"stat1");
        //$buffer .= "|".$lang['stat'][2].": |".mysql_result($result,0,"stat2");
        //$buffer .= "|".$lang['stat'][3].": |".mysql_result($result,0,"stat3");
        //$buffer .= "|".$lang['stat'][4].": |".mysql_result($result,0,"stat4");
        //$buffer .= "|".$lang['stat'][5].": |".mysql_result($result,0,"stat5");
        $buffer .= "|".$lang['skill'][3].": |".mysql_result($result,0,"skill3");
        die($buffer); //End with sending the buffer.
    }
}
else if ($val0 == 5)
{ //Register New User
/*val0 is the Identifier of what is being requested.
val1 is object ID of what requested the transaction.
val2 the person's name.
val3 is class*/


    //Val0= name, val1 =
    if (strlen($val1) > 0 && strlen($val2) > 0 && strlen($val3) > 0)
    {
        //First, verify user has not been registered.
        $query = "SELECT cash,char_id,name FROM `".$dbprefix."char` WHERE keyid = '$val3';";
        $result=mysql_query($query);
        if (!$result) { die("-1500|".$lang['DBERROR']); } //Error on DB select.
        if (mysql_numrows($result)>0) { die("-5|".$lang['ALREADYREG']); } //Already registered.
        
        //Second, make sure class is valid
        if ($val5 > count($lang['class'])) { die("-5|".$lang['INVALIDCLASS']); }
        
        //Lastly register.
        $query = "INSERT INTO `".$dbprefix."char` (char_id, name, keyid, email, time, lvl, class, refer)
        VALUES (DEFAULT, '$val2', '$val3', '$val4', CURRENT_TIMESTAMP, 1, '$val5', '$val1');";
        $result=mysql_query($query);
        if (!$result) die($lang['ERRREG'].mysql_error());
        die("-5|".$lang['YESREG']); //Successfully Registered.
    }
}
else if ($val0 == 6)
{ //Trade Money
/*val0 is the Identifier of what is being requested.
val1 is object ID of what requested the transaction.
val2 is the keyID of the person requesting
val3 is the target name
val4 is amount*/
        if ($val4 < 1) die($LANG['BADMONEY']); //No 0 money transactions, and in this case, no negatives.
        //Verify Src ID is valid
        $query = "SELECT cash,char_id,name FROM `".$dbprefix."char` WHERE keyid = '$val2';";
        $result=mysql_query($query);
        if (!$result) { die($lang['DBERROR']);}
        if (mysql_numrows($result)<1) { die($lang['NOREG']); }
        $curbalance = mysql_result($result,0,"cash");
        $charid = mysql_result($result,0,"char_id");
        $name = mysql_result($result,0,"name");
        //Verify Tar ID is valid
        
        $query = "SELECT cash,char_id,name FROM `".$dbprefix."char` WHERE name = '$val3';";
        $result=mysql_query($query);
        if (!$result) { die($lang['DBERROR']);}
        if (mysql_numrows($result)<1) { die($lang['NOUSER']); }
        $tarcharid = mysql_result($result,0,"char_id");
        $tarname = mysql_result($result,0,"name");
        //Verify Balance is good.
        if (($curbalance-$val4)<0) die($lang['NOMONEY']);

        $query = "UPDATE `".$dbprefix."char` SET cash = cash-$val4 WHERE `char_id` = '$charid';";
        $result=mysql_query($query);
        if (!$result) die("Error2: ".mysql_error());
        
        $query = "UPDATE `".$dbprefix."char` SET cash = cash+$val4 WHERE `char_id` = '$tarcharid';";
        $result=mysql_query($query);
        if (!$result) die("Error2: ".mysql_error());
        //Log Transaction
        //echo date('Y-m-d H:i:s');
        $query = "INSERT INTO `".$dbprefix."log` VALUES (DEFAULT, '$charid', NOW(), '-$val4', '$val1'), (DEFAULT, '$tarcharid', NOW(), '$val4', '$val1');";
        $result=mysql_query($query);
        if (!$result) die($lang['ERRLOG'].mysql_error());
        //return results.
        die("-6|You gave $tarname $val4 ".$lang['CASHNAME']."s, putting your balance to ".($curbalance-$val4).".");
}
else if ($val0 == 7)
{ //Skill Update Request.
/*val0 is the Identifier of what is being requested.
val1 is object ID of what requested the transaction.
val2 is the keyID of the person requesting, except in registration, it' sthe person's name.
val3 is the type of skill request updated
val4 is used if it's research, and raises cap*/
        //Verify Src ID is valid
        $query = "SELECT * FROM `".$dbprefix."char` WHERE keyid = '$val2';";
        $result=mysql_query($query);
        if (!$result) { die($lang['DBERROR']);}
        if (mysql_numrows($result)<1) { die($lang['NOREG']); }
        $cash = mysql_result($result,0,"cash");
        $charid = mysql_result($result,0,"char_id");
        $name = mysql_result($result,0,"name");
        $skill[1] = mysql_result($result,0,"skill1");
        $skill[2] = mysql_result($result,0,"skill2");
        $skill[3] = mysql_result($result,0,"skill3");
        $skill[4] = mysql_result($result,0,"skill4");
        $skill[5] = mysql_result($result,0,"skill5");
        $skill[6] = mysql_result($result,0,"skill6");
        $skill[7] = mysql_result($result,0,"skill7");
        $skill[8] = mysql_result($result,0,"skill8");
        $skill[9] = mysql_result($result,0,"skill9");
        $skill[10] = mysql_result($result,0,"skill10");
        
        if (strlen($skill[$val3]) > 2 && substr($skill[$val3],-2) == "00" && $val4 != 1) die($lang['SKILLCAP']." ".$lang['skill'][$val3]." (".$skill[$val3].")"); //If it contains by 00, skill cap.
        //if (rand(1,3) != 1) die("-7|Working on skill...");
        //$lang['skillpending'][3][1]
        if (rand(1,3) != 1) die("-7|".$lang['skillpending'][$val3][rand(1,count($lang['skillpending'][$val3]))]);
        //if (rand(1,3) != 1) die("Count: ".count($lang['skillpending'][$val3]));
        else
        {
            if (rand(1,3) == 1)
            { //Profit for 5-15 credits
                $tmpcash = rand(5,15);
                $query = "UPDATE `".$dbprefix."char` SET skill$val3 = skill$val3+1, cash = cash+$tmpcash WHERE keyid = '$val2';";
                $result=mysql_query($query);
                if (!$result) { die($lang['DBERROR'].mysql_error());}
                die("-7|".$lang['skillprofit'][$val3][rand(1,count($lang['skillprofit'][$val3]))]." $tmpcash ".$lang['CASHNAME']."s, putting your total to ".($cash+$tmpcash)." ".$lang['CASHNAME']."s.\n".$lang['SKILLUP']." ".$lang['skill'][$val3]."! (".($skill[$val3]+1).")");
            }
            else
            { //Non-Profit
                $query = "UPDATE `".$dbprefix."char` SET skill$val3 = skill$val3+1 WHERE keyid = '$val2';";
                $result=mysql_query($query);
                if (!$result) { die($lang['DBERROR'].mysql_error());}
                die("-7|".$lang['skillsuccess'][$val3][rand(1,count($lang['skillsuccess'][$val3]))]."\n".$lang['SKILLUP']." ".$lang['skill'][$val3]."! (".($skill[$val3]+1).")");
            }
        }
}
else if ($val0 == 8)
{ //Skill Update Request.
/*val0 is the Identifier of what is being requested.
val1 is object ID of what requested the transaction.
val2 is the keyID of the person requesting, except in registration, it' sthe person's name.
val3 is the itemID
val4 is the number of items */
        //Verify key ID is valid
        $query = "SELECT * FROM `".$dbprefix."char` WHERE keyid = '$val2';";
        $result=mysql_query($query);
        if (!$result) { die($lang['DBERROR']);}
        if (mysql_numrows($result)<1) { die($lang['NOREG']); }
        $charid = mysql_result($result,0,"char_id");
        if (!isset($lang['item'][$val3])) { die($lang['ERRITEM'].$val3); }
        if ($val4 < 1 && $val4 > 10) { die($lang['ERRITEMAMT']); }
        //Count number of items char owns.
        $query = "SELECT SUM(charges) FROM `".$dbprefix."item` WHERE charid = '$charid';";
        $result=mysql_query($query);
        if (!$result) { die($lang['DBERROR']);}
        $invsize = mysql_result($result,0,"SUM(charges)");
        if ($invsize >= 50) { die("-8|".$lang['INVFULL']); } //50 items currently.
        
        //Find if ITEM exists in DB
        $query = "SELECT * FROM `".$dbprefix."item` WHERE charid = '$charid' AND itemid = '$val3';";
        $result=mysql_query($query);
        if (!$result) { die($lang['DBERROR']);}
        if (mysql_numrows($result) > 0)
        { //If it does, add to stack.
            $query = "UPDATE `".$dbprefix."item` SET charges = charges+1 WHERE charid = '$charid' AND itemid = '$val3';";
            $result=mysql_query($query);
            if (!$result) { die($lang['DBERROR']);}
            die("-8|".$lang['ITEMADD']." ".$lang['item'][$val3]);
        }
        else
        { //Not found, insert a new item.
            $query = "INSERT INTO `".$dbprefix."item` VALUES ($charid, $val3, $val4);";
            $result=mysql_query($query);
            if (!$result) { die($lang['DBERROR']);}
            die("-8|".$lang['ITEMADD']." ".$lang['item'][$val3]);
        }
}
else if ($val0 == 9)
{ //Display HUD Info
/*val0 is the Identifier of what is being requested.
val1 is object ID of what requested the transaction.
val2 is the keyID of the person requesting, except in registration, it' sthe person's name.
val3 is amount*/
    if (strlen($val1) > 0)
    {
        //Verify key ID is valid
        $query = "SELECT * FROM `".$dbprefix."char` WHERE keyid = '$val2';";
        $result=mysql_query($query);
        if (!$result) { die($lang['DBERROR']);}
        if (mysql_numrows($result)<1) { die($lang['NOREG']); }
        $charid = mysql_result($result,0,"char_id");

        //Get Inventory
        $query = "SELECT SUM(charges) FROM `".$dbprefix."item` WHERE charid = '$charid';";
        $result=mysql_query($query);
        if (!$result) { die($lang['DBERROR']);}
        $invsize = mysql_result($result,0,"SUM(charges)");
        $buffer = "-9|";
        $query = "SELECT itemid,charges FROM `".$dbprefix."item` WHERE charid = '$charid';";
        $result=mysql_query($query);
        if (!$result) { die($lang['DBERROR']);}

        while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
            $buffer .= "|".$lang['item'][$row[0]]." (".$row[1].")";
        }
        $buffer .= "|Total Items: $invsize";
        die($buffer); //End with sending the buffer.
    }
}
else die($lang['ERRTYPE'].$val0);

//echo "\nValue0: $val0\nValue1: $val1\nValue2: $val2\nValue3: $val3";

?>
