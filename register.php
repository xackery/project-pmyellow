<HTML>
<HEAD></HEAD>
<BODY>
<?
if (isset($_POST['name']))
{
   $error = "";

   if (preg_match('/^[a-zA-Z]{3,16}$/', $_POST['name'])) $name = $_POST['name'];
   else $error .= "User name must be 3-16 alphabetic characters only.<br>";
   if (preg_match('/^(.?){8}$/', $_POST['password'])) $password = $_POST['password'];
   else $error .= "User password must be 8-32 characters long.<br>";
   if (preg_match('/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/', strtolower($_POST['email']))) $email = strtolower($_POST['email']);
   else $error .= "Invalid email address.<br>";
   $dbip  = "petdb.db.4543007.hostedresource.com";
   $dbname = $dbuser = "petdb";
   $dbpass = "jump5tartXYZ";
   $dbprefix = "po_";
   //Query DB for duplicate usernames.
   if (!$error)
   {      
      mysql_connect($dbip,$dbuser,$dbpass);
      @mysql_select_db($dbname) or die( "Registration is currently down, please try again later!");
      $query = "SELECT * FROM `".$dbprefix."main` WHERE UPPER(name) = '".strtoupper($name)."'"; //grab names alike.
      $result=mysql_query($query);
      if (!$result) die ("No results.!");    
      if (mysql_numrows($result)) $error = "User '$name' already exists. Try another name.";
      else {
         $password = crypt($password); //1 way encryption
         $query = "INSERT INTO `".$dbprefix."main` VALUES(DEFAULT,DEFAULT,DEFAULT,'$password','$name', '$email')"; //grab names alike.
         $result=mysql_query($query);
         //if ($result) die ("No results on insert");    
         //if (mysql_numrows($result)) $error = "User '$name' already exists. Try another name.";

      }
   }
   $success = "You have successfully registerd $name!";
   if ($error) echo $error;
   else die($success);   
}
?>
<form id='register' action='register.php' method='post'
    accept-charset='UTF-8'>
<fieldset >
<legend>Register</legend>
<input type='hidden' name='submitted' id='submitted' value='1'/>
<label for='name' >UserName*: </label>
<input type='text' name='name' id='name' maxlength="50" />
<label for='password' >Password*:</label>
<input type='password' name='password' id='password' maxlength="50" />
<label for='email' >Email*: </label>
<input type='text' name='email' id='email' maxlength="50" />
<input type='submit' name='Submit' value='Submit' />
</fieldset>
</form>

</BODY>
</HTML>