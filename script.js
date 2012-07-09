
gw = 0;
gh = 0;
gx = 0;
gy = 0;
$Login = -1;
animating = 0;
$tmpUser = ""; //Used to retain user when ajax refresh login occurs.



$targetw = 800;
$targeth = 600;
$actionw = 400;
$actionh = 400;

function PlayerList() {
	this.Name = "";
	this.Type;	
	this.FightingMob = 0;
}

function Monster() {
	this.cid = "#Player";
	this.Name = "";
	this.ID;
	this.HP;
	this.Level;
	this.RaceName;
	this.FightingMob = 0;
	this.Resize = function() {		
		if (!this.HP) $(this.cid+"HP").css('width',0);
		if (!this.HP) $(this.cid+"HPBar").hide();
		else $(this.cid+"HPBar").show();
		console.log(this.HP);
	}
	this.Flush = function() {
		this.ID = 0;
		this.HP = 0;
		this.Level = 0;
		this.RaceName = 0;
		this.FightingMob = 0;
	}
}
function CommandList() {
	this.Hide = function () {
		$("#lc1").hide();
		$("#lc2").hide();
		$("#lc3").hide();
		$("#lc4").hide();
		$("#rc1").hide();
		$("#rc2").hide();
		$("#rc3").hide();
		$("#rc4").hide();
	};
	this.Show = function () {
		$("#lc1").show();
		$("#lc2").show();
		$("#lc3").show();
		$("#lc4").show();
		$("#rc1").show();
		$("#rc2").show();
		$("#rc3").show();
		$("#rc4").show();		
	};
}

function MainBoxList (name) {
	this.id = name;
	this.width = 0;
	this.height = 0;
	this.x = 0;
	this.y = 0;
	if (this.id == "#MenuBox")
	{
		for (var $x = 1; $x < 5; $x++) {
			$('#lm'+$x).css({'text-align': center,	'float': left,	position: relative,	'background-color': white});
		}
	}

	this.GetResize = function () { 
		$(this.id).css( { position: 'fixed', 'background-color': 'white' } );	//All boxes are fixed, white.
		if ($Login == -1) 	{ //Not Logged in
			switch (this.id) {
				case "#MainBox":
					$(this.id).hide(); //Not supposed to be visible.
					//MainBox min 314 width.
					this.y = ($(window).height()/2); 
					//this.y = 500; 
					this.x = ($(window).width()/4);
					this.width = this.x*2;
					if (this.width<314) this.width = 314;
					//1/3rds heithis.heightt of width.
					this.height = (this.width/3);
				break;
				case "#PlayerBox":
				$CmdBoxMin = 314;
				$PlayBoxMin = 100;		
		    	$CommandButtons.Hide();
		    	//if ($(window).heithis.heightt() < ($CmdBoxMin+$PlayBoxMin)) //
				this.y = ($(window).height()/4); 
				this.x = ($(window).width()/8);
				this.width = this.x;
				if (this.width<314) this.width = 314;
				//1/3rds heithis.heightt of width.
				this.height = 200;
				break;
				default:
					$(this.id).hide(); //Not supposed to be visible.
				break;
			} //end switch
			
		} else { //Logged in =============================================================
			//Ratio is based on 800x600.
			var $targetw=800;
			var $targeth=600;
			var $modifier = 0;
			if (($(window).width() / $targetw) > ($(window).height() / $targeth)) { //Height is limiting factor
				$modifier = ($(window).height() / $targeth); //set modifier to height's ratio.				
			} else { //width is limiting factor
				$modifier = ($(window).width() / $targetw); //set modifier to height's ratio.				
			}
			switch (this.id) {
				case "#ActionBox":
					//$(this.id).css({'background-color':'red'});
					$(this.id).show();
					this.width = $actionw*$modifier;
					this.x = (($(window).width()/2)-(this.width/2));
					this.height = $actionh*$modifier;
					this.y = 0; //center top of screen.
					$('#EnemySprite').css( { left: 0, top: 0 });
					if ($EnemyMob.ID.length) $('#EnemySprite').css('background-image', "url('images/front/"+$EnemyMob.ID+".png')");
					$('#Enemy').css('top', 50);
					$('#Enemy').css('left', 0);
					$('#PlayerSprite').css( { left: 0, top: 0 });
					if ($PlayerMob.ID.length) $('#PlayerSprite').css('background-image', "url('images/back/"+$PlayerMob.ID+".png')");
					$('#Player').css('top', 50);
					$('#Player').css('left', 0);
					var $hpmod = ($('#PlayerHPBar').width() / 100);
					if ($PlayerMob.HP) $('#PlayerHP').css('width', ($PlayerMob.HP * $hpmod));
					if ($EnemyMob.HP) $('#EnemyHP').css('width', ($EnemyMob.HP * $hpmod));
					//$('#EnemySprite').css('left', ((this.width/2))); //TEMPORARY
					//$('#EnemySprite').css('top', (this.height-$('#EnemySprite').height()));
					//$('#Enemy').css('top', (this.height-$('#EnemySprite').height()-$('#Enemy').height()-1));
					//$('#Enemy').css('left', ((this.width/2)));
				break;
				case "#MainBox":				
					var $tmpw = 400;
					var $tmph = 200;
					$(this.id).show();
					
					//$(this.id+'> .box').hide();
					$CommandButtons.Show();	 //Show commands.
					this.width = $tmpw*$modifier;
					this.x = (($(window).width()/2)-(this.width/2));
					this.height = $tmph*$modifier;
					this.y = $ActionBox.height;
					var $tmpbw = ((this.width - ($(this.id+"> .tlborder").width()*2))/2)
					var $tmpbh = ((this.height - ($(this.id+"> .tlborder").height()*2))/4)
					for ($x = 1; $x < 5; $x++) { 
						$(this.id+'> .box > .lc'+$x).css({ width : $tmpbw, height: $tmpbh });
						if ($Move[$x].length) $(this.id+'> .box > .lc'+$x).text($Move[$x]);
						$(this.id+'> .box > .rc'+$x).css({ width : $tmpbw, height: $tmpbh });
						$(this.id+'> .box > .rc'+$x).text('rc'+$x);
					}
					//this.y = $targeth-this.height; //center top of screen.
				break;
				case "#PlayerBox":		
					var $tmpw = 200;					
					var $tmph = 400; //was 200							
					$(this.id).show();
					this.width = $tmpw*$modifier;
					this.x = (($(window).width()/2)+(($actionw*$modifier)/2));
					this.height = $tmph*$modifier;
					this.y = 0;
					//this.y = $targeth-this.height; //center top of screen.
				break;
				case "#MenuBox":		
					var $tmpw = 200;
					var $tmph = 400; //was 200
					$(this.id).show();
					this.width = $tmpw*$modifier;
					//this.x = ($('#ActionBox').left - this.width);
					this.x = (($(window).width()/2)-(($actionw*$modifier)/2)-this.width);
					this.height = $tmph*$modifier;
					this.y = 0;
					var $tmpbw = ((this.width - ($(this.id+"> .tlborder").width()*2)))
					var $tmpbh = ((this.height - ($(this.id+"> .tlborder").height()*2))/4)
					for ($x = 1; $x < 5; $x++) { 
						$('#lm'+$x).css({ width : $tmpbw, height: $tmpbh });}
				break;

			} //end switch this.id			

		}	//End else logged in
	}; //end GetResize Function
	this.Animate = function (duration) {
		$(this.id).animate( { left: this.x, top: this.y, width: this.width, height: this.height },duration);
		$(this.id+ "> .top").animate( { width: (this.width - ($(this.id+"> .tlborder").width()*2))},duration);
		$(this.id+ "> .left").animate( { height: (this.height - ($(this.id+"> .tlborder").height()*2))},duration);
		$(this.id+ "> .box").animate( { width: (this.width - ($(this.id+"> .tlborder").width()*2)), height: (this.height - ($(this.id+"> .tlborder").height()*2))},duration);
		$(this.id+ "> .right").animate( { height: (this.height - ($(this.id+"> .tlborder").height()*2))},duration);
		$(this.id+ "> .bot").animate( { width: (this.width - ($(this.id+"> .tlborder").width()*2))},duration);
		//$(this.id).animate({ left: gx+gw-$(".tlborder").width(), top: gy}, duration);
	};
	this.Resize = function (Animate) {
		this.GetResize();
		if (Animate) return this.Animate(Animate);
		$(this.id).css( { left: this.x, top: this.y, width: this.width, height: this.height });
		$(this.id+ "> .top").css( { width: ($(this.id).width() - ($(this.id+"> .tlborder").width()*2))})
		$(this.id+ "> .left").css( { height: ($(this.id).height() - ($(this.id+"> .tlborder").height()*2))})
		$(this.id+ "> .box").css( { width: ($(this.id).width() - ($(this.id+"> .tlborder").width()*2)), height: ($(this.id).height() - ($(this.id+"> .tlborder").height()*2))})
		$(this.id+ "> .right").css( { height: ($(this.id).height() - ($(this.id+"> .tlborder").height()*2))})
		$(this.id+ "> .bot").css( { width: ($(this.id).width() - ($(this.id+"> .tlborder").width()*2))})

	};
}

$ActionBox = new MainBoxList;
$ActionBox.id = "#ActionBox";
$MenuBox = new MainBoxList;
$MenuBox.id = "#MenuBox";
$MainBox = new MainBoxList;
$MainBox.id = "#MainBox";
$PlayerBox = new MainBoxList;
$PlayerBox.id = "#PlayerBox";

$Player = new PlayerList;
$Enemy = new PlayerList;

$PlayerMob = new Monster;
$PlayerMob.cid = "#Player";
$EnemyMob = new Monster;
$EnemyMob.cid = "#Enemy";
$CommandButtons = new CommandList();



function UpdateWindows(Animate) {	
	$ActionBox.Resize(Animate);	
	$MainBox.Resize(Animate);
	$PlayerBox.Resize(Animate);	
	$MenuBox.Resize(Animate);
	$EnemyMob.Resize();
	$PlayerMob.Resize();

}



$(window).resize(function() { //Screen was resized.	
	UpdateWindows();
});


//$loginhtml = '<form id="Login">	Name: <input type="text" id="name" />	Password: <input type="password" id="password" />    	<BUTTON name="Rawr" value="Login"/><br />	</form>';
//$Loginhtml = '<form id="Login" action="javascript:TryLogin();">Name: <input type="text" id="name" /><br>Password: <input type="password" id="password" /> <input class="button" type="submit" value="Log In" name="SubmitButton"><br />	</form>';
$Loginhtml = '<form id="Login" action="javascript:TryLogin();">Name: <input type="text" id="name" /><br>Password: <input type="password" id="password" /> <input class="button" type="submit" value="Log In" name="SubmitButton"> </form><form action="javascript:TryCreate();"><input class="button" type="submit" value="Create Account" name="CreateButton"></form>';
//<input class=button type=submit value="Log In" name=submitbutton id=submitbutton>
//$loginhtml = '<form id="login"><label for=name" >UserName*: </label><input type="text" name="name" id="name" maxlength="50" /><label for="password" >Password*:</label><input type="password" name="password" id="password" maxlength="50" /><input type="button" name="Button" value="Login" onClick="SendLogin()"></form>';


//*********************************************************************************************************************************************
//int main() {



function TryCreate() {
	$tmpUser = $("#name").val();
	$.get("main.php",{
						name: $("#name").val(),
						password: $("#password").val(),
						create: 1
						}, function(data) {
											ProcessAjax(data);
							});
}

function TryLogin() {
	$tmpUser = $("#name").val();
	$.get("main.php",{
						name: $("#name").val(),
						password: $("#password").val(),
						}, function(data) {
											ProcessAjax(data);
							});
}

function TryLogOut() {
	$tmpUser = $("#name").val();
	$.get("main.php",{
						logout: 1
						}, function(data) {
											ProcessAjax(data);
							});
}

function ProcessAjax(data) {
	$XmlDoc = $.parseXML( data ),
    $Xml = $( $XmlDoc ),
    $OldLogin = $Login;
    $Login = $Xml.find("Login").text();
    $Message = $Xml.find("Message").text();
    if ($Login == -1) { //Login failed.       
 		UpdateWindows(); 		
	    $('#PlayerBox > .box').text(''); //Erase box contents.
	    if ($Message.length) $Message += "<br>";
    	$('#PlayerBox > .box').append($Message+$Loginhtml); //Show error message.
    	$("#name").val($tmpUser);
	} else { //Logged in.		
		//Flush vars.
		$EnemyMob.Flush();
		$PlayerMob.Flush();

		$Player.Name = $Xml.find("PlayerName").text();
		$Player.Type = $Xml.find("PlayerType").text();
		$Player.FightingMob = $Xml.find("PlayerFightingMob").text();
		
		$Enemy.Name = $Xml.find("EnemyName").text();
		$Enemy.Type = $Xml.find("EnemyType").text();
		$Enemy.FightingMob = $Xml.find("EnemyFightingMob").text();

		//TODO: MAKE THIS BETTER PLEASE, add an array to grab all pets etc
		$PlayerMob.Name = $Xml.find("PlayerPet1").text();		
		$PlayerMob.ID = $Xml.find("PlayerPetID1").text();
		$PlayerMob.HP = $Xml.find("PlayerPetHP1").text();
		$PlayerMob.Lvl = $Xml.find("PlayerPetLvl1").text();
		if ($PlayerMob.Name && !$PlayerMob.HP) $('#PlayerName').text("<del>"+$PlayerMob.Name+" Lvl. "+$PlayerMob.Lvl+"</del>");
		else if ($PlayerMob.Name) $('#PlayerName').text($PlayerMob.Name+" Lvl. "+$PlayerMob.Lvl);
		$EnemyMob.Name = $Xml.find("EnemyPet1").text();
		$EnemyMob.ID = $Xml.find("EnemyPetID1").text();
		$EnemyMob.HP = $Xml.find("EnemyPetHP1").text();
		$EnemyMob.Lvl = $Xml.find("EnemyPetLvl1").text();
		if ($EnemyMob.Name && !$EnemyMob.HP) $('#EnemyName').text("<del>"+$EnemyMob.Name+" Lvl. "+$EnemyMob.Lvl+"</del>");
		if ($EnemyMob.Name) $('#EnemyName').text($EnemyMob.Name+" Lvl. "+$EnemyMob.Lvl);
		//END TODO
		$Log = $Xml.find("Log").text();
		$Move = new Array();
		$Move[1] = $Xml.find("Move1").text();
		$Move[2] = $Xml.find("Move2").text();
		$Move[3] = $Xml.find("Move3").text();
		$Move[4] = $Xml.find("Move4").text();
		$Run = $Xml.find("Run").text();
		$lm1 = $Xml.find("lm1").text();
		$lm2 = $Xml.find("lm2").text();
		for ($x = 1; $x < 5; $x++) if ($Move[$x].length) $('#lc'+$x).text($Move[$x]);
		if ($Run.length) $('#MainBox > .rc4').text($Run);
		if ($Log.length) console.log($Log);
		if ($lm1.length) $('#lm1').text($lm1);
		if ($lm2.length) $('#lm2').text($lm2);
		$('#lm4').text('logoff');
		//$('#rc4').text("Log out");

		$($PlayerBox.id+' > .box').html('Name: '+$Player.Name+'<br>Enemy: '+$Enemy.Name);
		//alert($Enemy.Name);
		console.log(data);		
 		if ($OldLogin != $Login) UpdateWindows(250);
 		else UpdateWindows();
	}
}

$('#PlayerBox').click(function (event) { 

});
$(document).ready(function(){
	//UpdateWindows();
	$('#MainBox > .box > .lc1').click( function (event) {	console.log("lc1 click"); $.get("main.php",{move: 1}, function(data) { ProcessAjax(data); }); });
	$('#MainBox > .box > .lc2').click( function (event) {	console.log("lc2 click"); $.get("main.php",{move: 2}, function(data) { ProcessAjax(data); }); });
	$('#MainBox > .box > .lc3').click( function (event) {	console.log("lc3 click"); $.get("main.php",{move: 3}, function(data) { ProcessAjax(data); }); });
	$('#MainBox > .box > .lc4').click( function (event) {	console.log("lc4 click"); $.get("main.php",{move: 4}, function(data) { ProcessAjax(data); }); });
	$('#lm1').click( function (event) {	if ($('#lm1').text() == "Heal (Cheat)") $.get("main.php",{heal: 1}, function(data) { ProcessAjax(data); }); });
	$('#lm2').click( function (event) {	if ($('#lm2').text() == "Make Battle (Cheat)") $.get("main.php",{battle: 1}, function(data) { ProcessAjax(data); }); });
	$('#lm4').click( function (event) {	if ($('#lm4').text() == "logoff") $.get("main.php",{logout: 1}, function(data) { ProcessAjax(data); }); });
	//$('#lc1').click(function(event) { 	alert("Move1"); });
	//$('#MainBox > .box > .rc4').click(function(event) { 	TryLogOut(); }); //Temporary
	$.get("main.php",{}, function(data) { ProcessAjax(data); });
	//Half their screen size x 2 ?
	$("#PlayerBox").click(function(event) {
		//if (animating) return;
		//login = login ^ 1;
		//AnimateResize(250);
	});
});


/*
 * Set global variables by getting resize data.
 */


