<?php
if ( !defined('pokemon') ) exit(); //This can only be included after an initial call.
$dbip  = "IPHERE";
$dbname = $dbuser = "DBHERE";
$dbpass = "PASSHERE";
$dbprefix = "po_";
mysql_connect($dbip,$dbuser,$dbpass);
@mysql_select_db($dbname) or die( "Unable to select database");
//InitDB
include_once('src/constants.php'); //Constants
include_once('src/skills.php'); //Skill Template Info
include_once('src/monsters.php'); //Monster Template Info
include_once('src/items.php'); //Item  Template Info

class MobStatList { //Monster stats
    /** Current Health */	
	public $CurHP = 0;
	/** Maximum Health */
	public $MaxHP = 0;
	/** Current Attack */
	public $Attack = 0;
	/** Current Defense */
	public $Defense = 0;
	/** Current Speed */
	public $Speed =  0;
	/** Current Special */
	public $Special =  0;
	public function __construct() {
		
	}
}
class MobStatusEffectList { //Status Effects affecting the mob
	public $Name;
	public $Duration;
}
class Player {
	/** My Next Move */
	public $NextMove;
	public $UID; //Database Account ID
	public $CID; //Database Character ID
	public $Name;
	public $BattleID;
	public $Round;
	public $BattlesWon; //number of battles
	public $BattlesLost; //number of battles
	public $Type; //Type of player (NPC. player, etc)
	/** Next Move Value Argument */
	public $Mob;
	public $FightingMob = 1; //Which mob is fighting?
	public function __construct()
	{
		/*for($x = 1; $x < 7; $x++) {
			$this->Mob[$x] = new Monster(PK_NULL);
		}*/
	}
}
 /**
   * This class is in package mypackage
   * @package mypackage
   */
class Monster {
	//DB Based info.
	/** ID Name of Monster */
	public $DID; //Database ID entry of monster
	public $ID = PK_NULL; //Mosnter Type ID
	public $Level = 10;
	/** Current Rage */
	public $Status = 0;
	public $PrepareMove = 0; //Status is Preparing a move, can't do anything next turn.
	public $Move1 = SK_NULL;
	public $Move2 = SK_NULL;
	public $Move3 = SK_NULL;
	public $Move4 = SK_NULL;
	public $OriginalTrainer = 0; //Players are 0+, -1 is Wild, -2 is Trainer.
	public $Experience;
	public $EVHP;
	public $EVAttack;
	public $EVDefense;
	public $EVSpeed;
	public $EVSpecial;
	
	public $IVHP = 1;
	public $IVAttack = 1;
	public $IVDefense = 1;
	public $IVSpeed = 1;
	public $IVSpecial = 1;

	public $Move1PP;
	public $Move2PP;
	public $Move3PP;
	public $Move4PP;
	public $Move1PPMax;
	public $Move2PPMax;
	public $Move3PPMax;
	public $Move4PPMax;
	public $BattlesWon;
	public $BattlesLost;
	/** Player provided name of pokemon */
	public $Name;

	/** Major Status Applied */
	public $MajorStatus = 0; //mediumint 4
	/** Major Status Argument */
	public $MajorValue = 0; //value that major effect targets
	/** Major Status Duration Remaining*/
	public $MajorTick = 0;
	/** Major Status Applied */
	public $MinorStatus = array(); //mediumint 4
	/** Major Status Argument */
	//public $MinorValue; //value that minor effect targets
	/** Major Status Duration Remaining */
	//public $MinorTick = array();
	/** Current mood statistic */
	public $Happy;
	public $CatchRate; //Static on first aquisition, even after evolve.	
	public $Sex; //Gender



	//Temporary Vars that are changed/calculated each game.

	/** Contains HP, Attack, Defense, Speed, Special */	
	public $BaseStats;
	public $BuffStats;	
	public $Participated = 0; //When a monster is used in battle, flag to 1
	
	/** Element Type of Monster */
	public $Type1 = 0;
	//public $Type2 = 0;
	public $MaxExperience;
	
	public $HPMod =0;
	public $AttackMod=0;
	public $DefenseMod=0;
	public $SpeedMod=0;
	public $SpecialMod=0;
	


	
	/**
	 * Creates a monster based on PK_TYPE in arg MonsterID
	 *
	*/	
	public function __construct($MonsterID) { //Premade: HP, Attack,Defense,Speed,Special
		/**
		 * During monster construction, we take some template level stats and fill them with defaults as per a monster type.
		 * We then update those stats with a seed modifier, or plug in premade stats when loading an older/preset pokemon.
		 */
		global $MonsterTemplate,$SkillUp, $Skill;
		//First load generic stats.
		$this->ID = $MonsterID;
		$this->Name = $MonsterTemplate[$this->ID]->Name;
		$this->Type1 = $MonsterTemplate[$this->ID]->Type1;
		$this->BaseStats = new MobStatList(); //Declare instance of base stats.
		$this->BuffStats = new MobStatList(); //Declare instance of base stats.
		if (!$this->ID) return; //PK_NULL placeholder.
		
			//Monster is wild, random stats
			//Seed modifiers
			mt_srand(make_seed());
			$this->IVHP = mt_rand(1,15);
			mt_srand(make_seed());
			$this->IVAttack= mt_rand(1,15);
			mt_srand(make_seed());
			$this->IVDefense = mt_rand(1,15);
			mt_srand(make_seed());
			$this->IVSpeed = mt_rand(1,15);
			mt_srand(make_seed());
			$this->IVSpecial = mt_rand(1,15);
			//Set PPMAX


			//Determine Moves
			//echo "Number of Skills for ".$this->ID.": ".sizeof($SkillUp[$this->ID]);
			$CurMove = 1; //Current Move to set
			
			for ($x = (sizeof($SkillUp[$this->ID])-1); $x >= 0; $x--)
			{ //Strongest skills first, cycle each one on list.
				if ($SkillUp[$this->ID][$x]->MinLevel <= $this->Level)
				{ //Pokemon can have this skill.
					if($CurMove == 1)
					{
						$this->Move1 = $SkillUp[$this->ID][$x]->ID; //Train skill.
						$this->Move1PP = $this->Move1PPMax = $Skill[$this->Move1]->PP;
					}
					if($CurMove == 2)
					{
						$this->Move2 = $SkillUp[$this->ID][$x]->ID; //Train skill.
						$this->Move2PP = $this->Move2PPMax = $Skill[$this->Move2]->PP;
					}
					if($CurMove == 3)
					{
						$this->Move3 = $SkillUp[$this->ID][$x]->ID; //Train skill.
						$this->Move3PP = $this->Move3PPMax = $Skill[$this->Move3]->PP;
					}
					if($CurMove == 4)
					{
						$this->Move4 = $SkillUp[$this->ID][$x]->ID; //Train skill.
						$this->Move4PP = $this->Move4PPMax = $Skill[$this->Move4]->PP;
					}
					$CurMove++; //Increment CurMove pointer.
					if ($CurMove == 5) $x = 0; //Done setting skills, set skillup to 0.
				}
			}				
			/*echo "<br>List of Wild Skills:<br>";
			echo "1:".$Skill[$this->Move1]->Name."<br>";
			echo "2:".$Skill[$this->Move2]->Name."<br>";
			echo "3:".$Skill[$this->Move3]->Name."<br>";
			echo "4:".$Skill[$this->Move4]->Name."<br>";*/
		
		//Now calculate Base Statistics now that we have modifiers.
		$this->CalculateStats(1);
	}
	public function CalculateStats($Creation = 0) {
		global $MonsterTemplate;
		//Another MaxHP Cheat Sheet Not Used: Stat = int((2 * B + I + E) * L / 100 + L + 10)
		//MaxHP cheat sheet: HP = (IV + Base+ (sqrtEV / 8) + 50)* Level / 50 + 10
		//old maxhp from bulbapedia $this->BaseStats->MaxHP = floor(((($this->IVHP + $MonsterTemplate[$this->ID]->StartHP + (sqrt($this->EVHP)/8) + 50) * $this->Level) / 50) + 10);
		//new maxhp from http://www.dragonflycave.com/stats.aspx
		$this->BaseStats->MaxHP = floor((2 * $MonsterTemplate[$this->ID]->StartHP + $this->IVHP + $this->EVHP) * $this->Level / 100 + $this->Level+ 10);
		//Other stats: //MaxHP cheat sheet: HP = (IV + Base+ (sqrtEV / 8) + 50)* Level / 50 + 10
		/*$this->BaseStats->Attack = floor(((($this->IVAttack + $MonsterTemplate[$this->ID]->StartAttack + (sqrt($this->EVAttack)/8) + 50) * $this->Level) / 50) + 5);
		$this->BaseStats->Defense = floor(((($this->IVDefense + $MonsterTemplate[$this->ID]->StartDefense+ (sqrt($this->EVDefense)/8) + 50) * $this->Level) / 50) + 5);
		$this->BaseStats->Speed = floor(((($this->IVSpeed + $MonsterTemplate[$this->ID]->StartSpeed+ (sqrt($this->EVSpeed)/8) + 50) * $this->Level) / 50) + 5);
		$this->BaseStats->Special = floor(((($this->IVSpecial+ $MonsterTemplate[$this->ID]->StartSpecial+ (sqrt($this->EVSpecial)/8) + 50) * $this->Level) / 50) + 5);*/
		//from dragonflycave Stat = int(int((2 * B + I + E) * L / 100 + 5) * N)
		$this->BaseStats->Attack = floor(((2 * $MonsterTemplate[$this->ID]->StartAttack + $this->IVAttack+ $this->EVAttack) * $this->Level / 100 + 5) * 1);
		$this->BaseStats->Defense = floor(((2 * $MonsterTemplate[$this->ID]->StartDefense + $this->IVDefense + $this->EVDefense) * $this->Level / 100 + 5) * 1);		
		$this->BaseStats->Speed = floor(((2 * $MonsterTemplate[$this->ID]->StartSpeed + $this->IVSpeed+ $this->EVSpeed) * $this->Level / 100 + 5) * 1);
		$this->BaseStats->Special = floor(((2 * $MonsterTemplate[$this->ID]->StartSpecial+ $this->IVSpecial+ $this->EVSpecial) * $this->Level / 100 + 5) * 1);
		
		//Base stats done, now to get current stats.
		//Base stat affecting major effects (paralyze)				
		if ($this->MajorStatus == ST_PARALYZE) $this->BaseStats->Speed = $this->BaseStats->Speed * .75; //75% Speed w/ paralyze
		if ($this->MajorStatus == ST_BURN) $this->BaseStats->Attack = $this->BaseStats->Attack * .5; //50% attack w/ burn
		
		
		//flush old Modifiers
		$this->AttackMod = $this->DefenseMod = $this->SpeedMod = $this->SpecialMod = $this->HPMod = 0 ;
		foreach ($this->MinorStatus as $Stat)
		{
			if ($Stat == SK_SWORDSDANCE) $this->AttackMod = $this->AttackMod+2;
			if ($Stat == SK_AGILITY) $this->SpeedMod = $this->SpeedMod+2;
			if ($Stat == SK_GROWL) $this->AttackMod--;
			if ($Stat == SK_TAILWHIP) $this->DefenseMod--;
			if ($Stat == SK_GROWTH) $this->SpecialMod++;
			
		}
		
		//Do Modifier Caps
		if ($this->AttackMod > 6) $this->AttackMod = 6;
		if ($this->AttackMod < -6) $this->AttackMod = -6;
		if ($this->DefenseMod > 6) $this->DefenseMod = 6;
		if ($this->DefenseMod < -6) $this->DefenseMod = -6;
		if ($this->SpeedMod > 6) $this->SpeedMod = 6;
		if ($this->SpeedMod < -6) $this->SpeedMod = -6;
		if ($this->SpecialMod > 6) $this->SpecialMod = 6;
		if ($this->SpecialMod < -6) $this->SpecialMod = -6;
		if ($this->HPMod > 6) $this->HPMod = 6;
		if ($this->HPMod < -6) $this->HPMod = -6;
		
		//Do Base Stat Caps
		$this->BaseStats->MaxHP = max($this->BaseStats->MaxHP, 1); //HP is minimum 1
		$this->BaseStats->Attack = max($this->BaseStats->Attack, 1); //Attack is minimum 1
		$this->BaseStats->Defense = max($this->BaseStats->Defense, 1); //Attack is minimum 1
		$this->BaseStats->Speed = max($this->BaseStats->Speed, 1); //Attack is minimum 1
		$this->BaseStats->Special = max($this->BaseStats->Special, 1); //Attack is minimum 1
		
		$this->BaseStats->CurHP = min($this->BaseStats->CurHP, $this->BaseStats->MaxHP); //If CurHP > MaxHP, set to MaxHP
				
		
		//Copy Base Stats to Buff Stats.
		$this->BuffStats->MaxHP = $this->BaseStats->MaxHP;
		$this->BuffStats->Attack = $this->BaseStats->Attack;
		$this->BuffStats->Defense = $this->BaseStats->Defense;
		$this->BuffStats->Speed = $this->BaseStats->Speed;
		$this->BuffStats->Special = $this->BaseStats->Special;
		//Now Calculate buff stats
		if ($this->AttackMod >= 0) //Positive buff
			$this->BuffStats->Attack = floor($this->BaseStats->Attack * ((2+$this->AttackMod)/2));
		if ($this->AttackMod < 0) //Negative buff
			$this->BuffStats->Attack = floor($this->BaseStats->Attack * (2/(2-$this->AttackMod)));
			
		if ($this->DefenseMod >= 0) //Positive buff
			$this->BuffStats->Defense = floor($this->BaseStats->Defense * ((2+$this->DefenseMod)/2));
		if ($this->DefenseMod < 0) //Negative buff
			$this->BuffStats->Defense = floor($this->BaseStats->Defense * (2/(2-$this->DefenseMod)));
			
		if ($this->SpeedMod >= 0) //Positive buff
			$this->BuffStats->Speed = floor($this->BaseStats->Speed * ((2+$this->SpeedMod)/2));
		if ($this->SpeedMod < 0) //Negative buff
			$this->BuffStats->Speed = floor($this->BaseStats->Speed * (2/(2-$this->SpeedMod)));
			
		if ($this->SpecialMod >= 0) //Positive buff
			$this->BuffStats->Special = floor($this->BaseStats->Special * ((2+$this->SpecialMod)/2));
		if ($this->SpecialMod < 0) //Negative buff
			$this->BuffStats->Special = floor($this->BaseStats->Special * (2/(2-$this->SpecialMod)));
			
		if ($this->HPMod >= 0) //Positive buff
			$this->BuffStats->MaxHP = floor($this->BaseStats->MaxHP * ((2+$this->HPMod)/2));
		if ($this->HPMod < 0) //Negative buff
			$this->BuffStats->MaxHP = floor($this->BaseStats->MaxHP * (2/(2-$this->HPMod)));

		//Do Buff Stat Caps
		$this->BuffStats->MaxHP = max($this->BuffStats->MaxHP, 1); //HP is minimum 1
		$this->BuffStats->Attack = max($this->BuffStats->Attack, 1); //Attack is minimum 1
		$this->BuffStats->Defense = max($this->BuffStats->Defense, 1); //Attack is minimum 1
		$this->BuffStats->Speed = max($this->BuffStats->Speed, 1); //Attack is minimum 1
		$this->BuffStats->Special= max($this->BuffStats->Special, 1); //Attack is minimum 1
		$this->BuffStats->CurHP = min($this->BuffStats->CurHP, $this->BuffStats->MaxHP); //If CurHP > MaxHP, set to MaxHP
		
			
		//echo $this->Name."'s Attack: ".$this->BuffStats->Attack."(+".$this->AttackMod."), Base: ".$this->BaseStats->Attack."<br>";
		//Do EXP max calculations.
		if ($MonsterTemplate[$this->ID]->GrowthCurve == G_SLOW) $this->MaxExperience = (5*pow($this->Level,3))/4;		
		if ($MonsterTemplate[$this->ID]->GrowthCurve == G_MEDSLOW) $this->MaxExperience = 1.2*pow($this->Level,3) - 15 * pow($this->Level,2) + 100 * $this->Level- 140;
		if ($MonsterTemplate[$this->ID]->GrowthCurve == G_MEDFAST) $this->MaxExperience = pow($this->Level,3);
		if ($MonsterTemplate[$this->ID]->GrowthCurve == G_FAST) $this->MaxExperience = (4*pow($this->Level,3))/5;		
		if ($Creation)
		{ //Creature was created, heal.
			$this->BuffStats->CurHP = $this->BuffStats->MaxHP;
		}
	}
	
	
	public function HasMinorStatus($SkillID) {
		for ($x = 0; $x<sizeof($this->MinorStatus); $x++)
		     if ($this->MinorStatus[$x] == $SkillID) return 1;
		return 0;
	}
	//TODO: Does a comparison to see if using a certain buff will have no effect on self/enemy.
	public function HasMaxModifier($SkillID) {
		for ($x = 0; $x<sizeof($this->MinorStatus); $x++)
		     if ($this->MinorStatus[$x] == $SkillID) return 1;
		return 0;
	}
	public function AddMinorStatus($SkillID, $SkillValue = -1, $SkillDuration = 999) {
		array_push($this->MinorStatus, $SkillID); //Add effect	
	}
	public function DisplayStats() {
		echo "Name: ".$this->Name." (Lvl ".$this->Level."), ATK: ".$this->BuffStats->Attack.",Def: ".$this->BuffStats->Defense." (".$this->DefenseMod."),Speed: ".$this->BuffStats->Speed.",Special: ".$this->BuffStats->Special.",HP: ".$this->BuffStats->CurHP." / ".$this->BuffStats->MaxHP."<br>";
		echo "IV list: ".$this->IVHP.", ".$this->IVAttack.", ".$this->IVDefense.", ".$this->IVSpeed.", ".$this->IVSpecial."<br>";
	}
}


/**
 * Begin a fight
 */
function StartFight() {
	global $Skill, $Player, $CurPlayer, $DefPlayer, $CurMob, $DefMob, $CurSkill, $DefSkill;
	/** Starts a fight between 2 pokemon.
	 * Note this is the primary loop for determining all elements of the game.
	 */
	//Start round.
	$Knockout = 0;
	$Winner = 0;
	$Round = $Player[1]->Round;
	$Round++;
	$Player[2]->Round = $Player[1]->Round = $Round;
	//while(!$Winner)
	//{ //Loop until winner is set, THIS IS TEMPORARY.
		$Knockout = 0;
		CalculateAIMove(); //Decides what the AI is going to do this round, factored into who goes first.
		SetCurPlayer(WhoGoesFirst()); //Determine who goes first, sets CurPlayer accordingly.
		//echo "Cur player: $CurPlayer";
		DoMonsterTurn(); //Do first player's turn.
		$Knockout = CheckStatus();
		if (!GetAlivePokemon($DefPlayer)) $Winner = $CurPlayer;
		if (!GetAlivePokemon($CurPlayer)) $Winner = $DefPlayer;
		if (!$Winner && !$Knockout)
		{
			SetCurPlayer($DefPlayer); //Switch to defending player.
			DoMonsterTurn(); //Do other player's turn.
			$Knockout = CheckStatus();
			if (!GetAlivePokemon($DefPlayer)) $Winner = $CurPlayer;
			if (!GetAlivePokemon($CurPlayer)) $Winner = $DefPlayer;			
		}	
	//}
	if (!$Knockout) CheckStatus();
	//echo "Player $Winner has won!<br>";
	if ($Knockout && debug) echo "Found a result that ends game, Player $Winner won!.<br><a href=\"main.php?battle=1\">Start Another Battle!</a>"; //End game			
	if (!$Knockout) DisplayActions();
}


function CheckStatus() {
	global $Skill, $Player, $CurPlayer, $DefPlayer, $CurMob, $DefMob, $CurSkill, $DefSkill;
	if ($Player[$CurPlayer]->Mob[$CurMob]->MajorStatus == ST_FAINT)
	{		
		GiveEXP($DefPlayer);
		return 1;
	}
	else if ($Player[$DefPlayer]->Mob[$DefMob]->MajorStatus == ST_FAINT)
	{
		GiveEXP($CurPlayer);
		return 1;
	}
	return 0;
}
//Used in deciding what an AI's move will be.
function CalculateAIMove() {
	global $Player, $Skill;
	$TmpSkill = 0;
	//AI Check
	for ($TmpPlayer = 1; $TmpPlayer <= 2; $TmpPlayer++)
	{
		if ($Player[$TmpPlayer]->NextMove == MV_AI || !$Player[$TmpPlayer]->NextMove )
		{
			$TmpMob = $Player[$TmpPlayer]->FightingMob;
			for ($x = 0; $x < 10; $x++) //10 tries.
			{
				mt_srand(make_seed()); //Seed random number
				$m = mt_rand(1,4); //Pick a random move.
				if ($m == 1 && $Player[$TmpPlayer]->Mob[$TmpMob]->Move1 > 0) $Player[$TmpPlayer]->NextMove = MV_MOVE1;
				if ($m == 2 && $Player[$TmpPlayer]->Mob[$TmpMob]->Move2 > 0) $Player[$TmpPlayer]->NextMove = MV_MOVE2;
				if ($m == 3 && $Player[$TmpPlayer]->Mob[$TmpMob]->Move3 > 0) $Player[$TmpPlayer]->NextMove = MV_MOVE3;
				if ($m == 4 && $Player[$TmpPlayer]->Mob[$TmpMob]->Move4 > 0) $Player[$TmpPlayer]->NextMove = MV_MOVE4;
				//SMART AI IMPROVEMENT: Do some logistics to ensure the move is a good one for the round.
				//$TmpSkill = GetNextMoveSkillID($TmpPlayer);				
				
				/*if ($Player[$TmpPlayer]->Mob[$TmpMob]->HasMaxModifier($TmpSkill) && $Skill[$TmpSkill]->Power < 1)
				{ //Mob already has the maximum this modifier gives and skill deals no damage, don't use
					$Player[$TmpPlayer]->NextMove = MV_AI; //Reset to AI mode.
				}*/
				if ($Player[$TmpPlayer]->NextMove > 0 && $Player[$TmpPlayer]->NextMove < 5 ) $x = 11;//We found a move, now get out.
			}
			//Failsafe, it just doesn't want to pick, so default to move 1. (e.g. all buff skills, all used)
			if ($Player[$TmpPlayer]->NextMove < 0 || $Player[$TmpPlayer]->NextMove > 5) $Player[$TmpPlayer]->NextMove = MV_MOVE1;
		}		
	}
	
}
/**
 * Determines who goes first, returns 1 or 2
 */ 
function WhoGoesFirst() {
	global $Skill, $Player, $CurPlayer, $DefPlayer, $CurMob, $DefMob, $CurSkill, $DefSkill;
	$CurSkill = $DefSkill = 0;
	$CurQuick = $DefQuick = 0;
	//Prep for comparison
	SetCurPlayer(1); //When determining who goes first, CurPlayer is set to 1.
	$CurSkill = GetNextMoveSkillID($CurPlayer); //Set attacker skill
	$DefSkill = GetNextMoveSkillID($DefPlayer); //Set defender skill
	
	//PRIORITY 1: QUICK SKILLS
	//First determine if any quick moves queue'd.
	if ($CurSkill == SK_QUICKATTACK) $CurQuick = 1;
	if ($DefSkill == SK_QUICKATTACK) $DefQuick = 1;
	
	//If both are quick moves, negate it out and calculate on next priority
	if ($CurQuick && $DefQuick) $CurQuick = $DefQuick = 0;
	if ($CurQuick && !$DefQuick) return $CurPlayer; //First player is doing quick attack, goes first.
	if (!$CurQuick && $DefQuick) return $DefPlayer; //Second player is doing quick attack, goes first.
	
	//PRIORITY 2: SPEED COMPARISON
	if ($Player[$CurPlayer]->Mob[$CurMob]->BuffStats->Speed > $Player[$DefPlayer]->Mob[$DefMob]->BuffStats->Speed) return $CurPlayer;
	if ($Player[$CurPlayer]->Mob[$CurMob]->BuffStats->Speed < $Player[$DefPlayer]->Mob[$DefMob]->BuffStats->Speed) return $DefPlayer;
	
	//PRIORITY 3: Same quick attack, same speed, so randomize!
	return (mt_rand(1,2));
	
}

/**
 *Sets who is the current player attacking.
 */
function SetCurPlayer($PlayerID)
{
	global $Player, $CurPlayer, $DefPlayer, $CurMob, $DefMob;
	$CurPlayer = $PlayerID;
	$DefPlayer = ($CurPlayer == 1) ? 2 : 1; //Set defending player.
	$CurMob = $Player[$CurPlayer]->FightingMob; //Set current fighting mob
	$DefMob = $Player[$DefPlayer]->FightingMob; //Set current fighting mob	
}
/**
 *Returns the next move's ID, when a player's next move is called.
 */
function GetNextMoveSkillID($PlayerID)
{
	global $Skill, $Player;
	$TmpMob = $Player[$PlayerID]->FightingMob;
	if($Player[$PlayerID]->NextMove == MV_MOVE1) return $Player[$PlayerID]->Mob[$TmpMob]->Move1;
	if($Player[$PlayerID]->NextMove == MV_MOVE2) return $Player[$PlayerID]->Mob[$TmpMob]->Move2;
	if($Player[$PlayerID]->NextMove == MV_MOVE3) return $Player[$PlayerID]->Mob[$TmpMob]->Move3;
	if($Player[$PlayerID]->NextMove == MV_MOVE4) return $Player[$PlayerID]->Mob[$TmpMob]->Move4;
	return 0;
}


function DoMonsterTurn() {
	global $Skill, $Player, $CurPlayer, $DefPlayer, $CurMob, $DefMob, $CurSkill, $DefSkill, $Damage;
	$CurSkill = 0; //Reset currently used skill
	$Damage = 0;
	
	$StabMod = 1.0; //Normal damage
	$TypeMod = 1.0; //Normal damage
	$CriticalMod = 1; //Normal damage.
	$AttackLanded = 1; //0 if fail for any reason.
	$CurDisabled = 0; //Currently disabled due to sleep/disable etc.
	$CurMove = $Player[$CurPlayer]->NextMove; //Current player's move
	$DefMove = $Player[$DefPlayer]->NextMove; //Defending player's move
	$CurMob = $Player[$CurPlayer]->FightingMob; //Current player's move
	$DefMob = $Player[$DefPlayer]->FightingMob; //Defending player's move

	//echo "Cur Move: $CurMove";
	//if (debug) echo "Current player: $CurPlayer<br>";
	//Convert CurSkill properly before doing turn.
	if ($Player[$CurPlayer]->NextMove == MV_MOVE1) $CurSkill = $Player[$CurPlayer]->Mob[$CurMob]->Move1;
	if ($Player[$CurPlayer]->NextMove == MV_MOVE2) $CurSkill = $Player[$CurPlayer]->Mob[$CurMob]->Move2;
	if ($Player[$CurPlayer]->NextMove == MV_MOVE3) $CurSkill = $Player[$CurPlayer]->Mob[$CurMob]->Move3;
	if ($Player[$CurPlayer]->NextMove == MV_MOVE4) $CurSkill = $Player[$CurPlayer]->Mob[$CurMob]->Move4;
	if ($Player[$CurPlayer]->NextMove == MV_PREPARE) $CurSkill = $Player[$CurPlayer]->Mob[$CurMob]->PrepareMove;
	
	
	if ($Player[$CurPlayer]->Mob[$CurMob]->MajorStatus == ST_SLEEP)
	{ //Sleep upkeep
		$Player[$CurPlayer]->Mob[$CurMob]->MajorTick--;
		if ($Player[$CurPlayer]->Mob[$CurMob]->MajorTick<1)
		{ //Duration faded			
			$Player[$CurPlayer]->Mob[$CurMob]->MajorStatus = ST_NULL; 
			echo $Player[$CurPlayer]->Mob[$CurMob]->Name." wakes up.<br>"; 
		} else {
			$AttackLanded = 0;
			$CurDisabled = 1;
			echo $Player[$CurPlayer]->Mob[$CurMob]->Name." is asleep.<br>"; 
		}
	
	}
	
		
	//TODO: Recharge turn?
	
	if ($Player[$CurPlayer]->Mob[$CurMob]->MajorStatus == ST_DISABLE)
	{ //Disable upkeep
		$Player[$CurPlayer]->Mob[$CurMob]->MajorTick--;
		if ($Player[$CurPlayer]->Mob[$CurMob]->MajorTick<1)
		{ //Duration faded
			announce($Player[$CurPlayer]->Mob[$CurMob]->Name." is disabled no more."); 
			$Player[$CurPlayer]->Mob[$CurMob]->MajorStatus = ST_NULL; 
		}
		else { $AttackLanded = 0; $CurDisabled = 1; } //In theory, can't do any moves due to being asleep.
	}
		
	if ($Player[$CurPlayer]->Mob[$CurMob]->MajorStatus == ST_CONFUSE)
	{ //confuse upkeep
		$Player[$CurPlayer]->Mob[$CurMob]->MajorTick--;
		if ($Player[$CurPlayer]->Mob[$CurMob]->MajorTick<1)
		{ //Duration faded
			announce($Player[$CurPlayer]->Mob[$CurMob]->Name." is confused no more."); 
			$Player[$CurPlayer]->Mob[$CurMob]->MajorStatus = ST_NULL; 
		}
		else { return; } //In theory, can't do any moves due to being asleep.
	}
			
	if ($Player[$CurPlayer]->Mob[$CurMob]->MajorStatus == ST_PARALYZE) 
	{ //Paralyze Upkeep
		$Player[$CurPlayer]->Mob[$CurMob]->MajorTick--;
		if ($Player[$CurPlayer]->Mob[$CurMob]->MajorTick<1)
		{ //Duration faded
			AddMessage($Player[$CurPlayer]->Mob[$CurMob]->Name." is paralyzed no more."); 
			$Player[$CurPlayer]->Mob[$CurMob]->MajorStatus = ST_NULL;
			$Player[$CurPlayer]->Mob[$CurMob]->MajorTick = -1; 
		}
		else if (mt_rand(1,100) <= 25)
		{  //25% chance of miss.
			$AttackLanded = 0;
			$CurDisabled = 1;
			AddMessage($Player[$CurPlayer]->Mob[$CurMob]->Name." is paralyzed and misses.");
		}
	}
	
	if ($AttackLanded)
	{ //This is to verify paralyze did not fail the skill already.
		
		if ($Skill[$CurSkill]->Style == MV_PREPARE && !$Player[$CurPlayer]->Mob[$CurMob]->PrepareMove)
		{ //We're revving up a prepared shot.
			switch ($CurSkill)
			{
				case SK_SOLARBEAM:
					echo $Player[$CurPlayer]->Mob[$CurMob]->Name." gathers light.<br>";					
					break;
			}
			$Player[$CurPlayer]->Mob[$CurMob]->PrepareMove = $CurSkill;
			$CurMove = MV_PREPARE;
		}
		else if ($Player[$CurPlayer]->Mob[$CurMob]->PrepareMove)
		{ //Some cases, you have a prepare shot. Convert back to a Move!
			if ($Player[$CurPlayer]->Mob[$CurMob]->Move1 == $Player[$CurPlayer]->Mob[$CurMob]->PrepareMove) $CurMove = MV_MOVE1;
			if ($Player[$CurPlayer]->Mob[$CurMob]->Move2 == $Player[$CurPlayer]->Mob[$CurMob]->PrepareMove) $CurMove = MV_MOVE2;
			if ($Player[$CurPlayer]->Mob[$CurMob]->Move3 == $Player[$CurPlayer]->Mob[$CurMob]->PrepareMove) $CurMove = MV_MOVE3;
			if ($Player[$CurPlayer]->Mob[$CurMob]->Move4 == $Player[$CurPlayer]->Mob[$CurMob]->PrepareMove) $CurMove = MV_MOVE4;
			$Player[$CurPlayer]->Mob[$CurMob]->PrepareMove = 0;
		}		
		if ($CurMove == MV_MOVE1 || $CurMove == MV_MOVE2 || $CurMove == MV_MOVE3 || $CurMove == MV_MOVE4)
		{ //Doing a move attack
			if ($Skill[$CurSkill]->PP == -1) echo "Skill is -1 PP! Fix!";
			switch ($CurMove)
			{
				case (MV_MOVE1):					
					if ($Player[$CurPlayer]->Mob[$CurMob]->Move1PP)
					{ //Have enough PP to cast, subtract amount.
						$Player[$CurPlayer]->Mob[$CurMob]->Move1PP--;
					} else { //Not enough PP to cast
						$AttackLanded = 0;
					}
					break;
				case (MV_MOVE2):
					if ($Player[$CurPlayer]->Mob[$CurMob]->Move2PP)
					{ //Have enough PP to cast, subtract amount.
						$Player[$CurPlayer]->Mob[$CurMob]->Move2PP--;
					} else { //Not enough PP to cast
						$AttackLanded = 0;
					}					
					break;
				case (MV_MOVE3):
					if ($Player[$CurPlayer]->Mob[$CurMob]->Move3PP)
					{ //Have enough PP to cast, subtract amount.
						//$Player[$CurPlayer]->Mob[$CurMob]->Move3PP = $Player[$CurPlayer]->Mob[$CurMob]->Move3PP - $Skill[$CurSkill]->PP;
						$Player[$CurPlayer]->Mob[$CurMob]->Move3PP--;
					} else { //Not enough PP to cast
						$AttackLanded = 0;
					}					
					break;
				case (MV_MOVE4):
					if ($Player[$CurPlayer]->Mob[$CurMob]->Move4PP)
					{ //Have enough PP to cast, subtract amount.
						$Player[$CurPlayer]->Mob[$CurMob]->Move4PP--;											
					} else { //Not enough PP to cast
						$AttackLanded = 0;
					}					
					break;							
			}						
			//TODO: Execute Attack.
			//echo strtoupper($Player[$CurPlayer]->Mob[$CurMob]->Name)." used ".strtoupper($Skill[$CurSkill]->Name)."!<br>";		
			AddMessage($Player[$CurPlayer]->Mob[$CurMob]->Name." used ".strtoupper($Skill[$CurSkill]->Name)."!");
			//echo strtoupper($Player[$CurPlayer]->Mob[$CurMob]->Name)." used ".strtoupper($Skill[$CurSkill]->Name)."!<br>";		
		}
			//$Rand = ET_rand(0, 10000) / 100; //creates a number between 0.00 and 100.00
		
		//TODO: ACCURACY CHECK
		
	}
	//Attack Misses.
	if (!$AttackLanded && !$CurDisabled) 
	{ 
		echo $Player[$CurPlayer]->Mob[$CurMob]->Name." misses.<br>";
	}
	else if ($Skill[$CurSkill]->Power > 0 && !$CurDisabled && !$Player[$CurPlayer]->Mob[$CurMob]->PrepareMove) //If skill has power.
	{
		
		//Damage Calculation including criticals.
		
		if ($Player[$CurPlayer]->Mob[$CurMob]->Type1 == $Skill[$CurSkill]->Type1) $StabMod = 1.5; //%50 damage bonus for Same-Type Attack Bonus
		//Type is the type effectiveness. This can be either 0, 0.25, 0.5, 1, 2, or 4 depending on the type of attack and the type of the defending Pokémon.
		$TypeMod = GetTypeMod($Skill[$CurSkill]->Type1, $Player[$DefPlayer]->Mob[$DefMob]->Type1); //Calculate Type bonuses.		
		$CriticalMod = GetCritical($CurSkill); //2 if crit, 1 normal
		$Damage = (2*$Player[$CurPlayer]->Mob[$CurMob]->Level+10)/250;
		//echo "dmg1: $Damage";
		//TODO: REMOVE NEXT TWO LINES
		$TmpAtk = $Player[$CurPlayer]->Mob[$CurMob]->BuffStats->Attack ;
		$TmpDef = $Player[$DefPlayer]->Mob[$DefMob]->BuffStats->Defense;
		//TODO REMOVE ABOVE TWO LINES
		
		
		if ($Skill[$CurSkill]->Type2 == ATK_SPECIAL)
		{
			$TmpAtk = $Player[$CurPlayer]->Mob[$CurMob]->BuffStats->Special;
			$TmpDef = $Player[$DefPlayer]->Mob[$DefMob]->BuffStats->Special;
			if ($Player[$DefPlayer]->Mob[$DefMob]->HasMinorStatus(SK_LIGHTSCREEN)) $TmpDef = $Player[$DefPlayer]->Mob[$DefMob]->BuffStats->Special*2; //Double Defense

		}
		if ($Skill[$CurSkill]->Type2 == ATK_NORMAL)
		{
			$TmpAtk = $Player[$CurPlayer]->Mob[$CurMob]->BuffStats->Attack ;
			$TmpDef = $Player[$DefPlayer]->Mob[$DefMob]->BuffStats->Defense;
		}
		//ATK_STATUS has formula-style skills.
		$TmpDef = min(1, $TmpDef);
		$TmpAtk = min(1, $TmpAtk);
		$Damage = $Damage * ($TmpAtk / $TmpDef);		
		//echo "dmg2: $Damage";
		$Damage = $Damage * $Skill[$CurSkill]->Power + 2;
		//echo "dmg3: $Damage";
		mt_srand(make_seed()); //Seed random number
		$Damage = $Damage * $StabMod * $TypeMod * $CriticalMod * (mt_rand(85,100)/100);
		$Damage = max(floor($Damage),1);
		//echo "dmg4: $Damage";
		//TODO: Animation
		//*Damage and primary effects of attack*
			
		if (!$Damage) DoUniqueDamage($CurSkill); //Apply unique damage in cases damage is not calculated.
		if ($Damage) $Player[$DefPlayer]->Mob[$CurMob]->BuffStats->CurHP = $Player[$DefPlayer]->Mob[$DefMob]->BuffStats->CurHP - $Damage;

		if ($Damage && $AttackLanded) AddMessage($Damage,"DamageToEnemy");
		//if ($Damage && $AttackLanded) echo $Player[$CurPlayer]->Mob[$CurMob]->Name." deals $Damage points of damage.<br>";
			
	}
	
	//TODO:   [Second pokémon's substitute took the damage]X
	//TODO:[Second pokémon's substitute broke]X
	//TODO:[Critical hit]X
	if ($CriticalMod == 2) AddMessage("Critical Hit!");
	//[Type effectiveness of attack]
	if ($TypeMod == 2) AdddMessage("It is super effective!");
	if ($TypeMod == 0.5) AddMessage("It is not very effective...");
	//TODO:[Any flavor text associated with the executed attack]X
	
	//([Second pokémon faints])X
	if ($Player[$DefPlayer]->Mob[$DefMob]->BuffStats->CurHP < 1 && $Player[$DefPlayer]->Mob[$DefMob]->MajorStatus != ST_FAINT)
	{ //Faint
		$Player[$DefPlayer]->Mob[$DefMob]->MajorStatus = ST_FAINT;
		//echo $Player[$DefPlayer]->Mob[$DefMob]->Name." has fainted!";
		AddMessage(0,"FaintEnemy");
		//TODO: End round early??? You don't take recurrant damage if they faint..?
	}
	//TODO:*[Second pokémon's rage builds]*X
	//TODO:*[Secondary effects of attack]*X
	if ($AttackLanded && !$CurDisabled) DoStatusEffect($CurSkill);
	//*[Recurrent poison/burn damage to first pokémon]*X
	if ($Player[$DefPlayer]->Mob[$DefMob]->MajorStatus != ST_FAINT && $Player[$CurPlayer]->Mob[$CurMob]->MajorStatus == ST_POISON)
	{ //Not fainted, has poison effect
		
		//TODO: VERIFY POISON DURATION TICK IS DONE HERE OR NOT.
		$Player[$CurPlayer]->Mob[$CurMob]->MajorTick--;
		if ($Player[$CurPlayer]->Mob[$CurMob]->MajorTick<1)
		{ //Duration faded
			echo $Player[$CurPlayer]->Mob[$CurMob]->Name." is no longer poisoned.<br>";
			$Player[$CurPlayer]->Mob[$CurMob]->MajorStatus = ST_NULL;
		} else
		{		
			$PoisonDamage = max(floor($Player[$CurPlayer]->Mob[$CurMob]->BuffStats->MaxHP/16),1);
			$Player[$CurPlayer]->Mob[$CurMob]->BuffStats->CurHP -= $PoisonDamage;
			echo $Player[$CurPlayer]->Mob[$CurMob]->Name." is poisoned.<br>";
		}
	}
	if ($Player[$DefPlayer]->Mob[$DefMob]->MajorStatus != ST_FAINT && $Player[$CurPlayer]->Mob[$CurMob]->MajorStatus == ST_BURN)
	{ //Not fainted, has burn effect
		
		$Player[$CurPlayer]->Mob[$CurMob]->MajorTick--;
		if ($Player[$CurPlayer]->Mob[$CurMob]->MajorTick<1)
		{ //Duration faded
			echo $Player[$CurPlayer]->Mob[$CurMob]->Name." is no longer burning.<br>";
			$Player[$CurPlayer]->Mob[$CurMob]->MajorStatus = ST_NULL;
		} else
		{		
			$BurnDamage = max(floor($Player[$CurPlayer]->Mob[$CurMob]->BuffStats->MaxHP/16),1);
			$Player[$CurPlayer]->Mob[$CurMob]->BuffStats->CurHP -= $BurnDamage;
			echo $Player[$CurPlayer]->Mob[$CurMob]->Name." is burning.<br>";
		}
	}
	
	//*[Recurrent Leech Seed damage to first pokémon]*X
	if ($Player[$DefPlayer]->Mob[$DefMob]->MajorStatus != ST_FAINT && $Player[$CurPlayer]->Mob[$CurMob]->HasMinorStatus(SK_LEECHSEED))
	{ //Not fainted, has leech seed effect.
		$LeechDamage = max(floor($Player[$CurPlayer]->Mob[$CurMob]->BuffStats->CurHP/16),1);
		$Player[$CurPlayer]->Mob[$CurMob]->BuffStats->CurHP -= $LeechDamage;
		$Player[$DefPlayer]->Mob[$DefMob]->BuffStats->CurHP += min(max(($LeechDamage/2),1),$Player[$DefPlayer]->Mob[$DefMob]->BuffStats->MaxHP);
		echo $Player[$CurPlayer]->Mob[$CurMob]->Name." is affected by Leech Seed.<br>";
	}
	//TODO:*[Second pokémon flinches]*

	//if ($Damage && $AttackLanded) echo $Player[$DefPlayer]->Mob[$DefMob]->Name." has ".$Player[$DefPlayer]->Mob[$DefMob]->BuffStats->CurHP." HP left.<br>";
	//if ($Player[$DefPlayer]->Mob[$DefMob]->BuffStats->CurHP > 0) echo $Player[$DefPlayer]->Mob[$DefMob]->Name." has ".floor(($Player[$DefPlayer]->Mob[$DefMob]->BuffStats->CurHP / $Player[$DefPlayer]->Mob[$DefMob]->BuffStats->MaxHP)*100)." % health left.<br>";
	//if ($Player[$DefPlayer]->Mob[$DefMob]->BuffStats->CurHP > 0) AddMessage(floor(($Player[$DefPlayer]->Mob[$DefMob]->BuffStats->CurHP / $Player[$DefPlayer]->Mob[$DefMob]->BuffStats->MaxHP)*100),"HP$DefMob");
	
	
	//Check if CurPlayer fainted from dots
	if ($Player[$CurPlayer]->Mob[$CurMob]->BuffStats->CurHP < 1 && $Player[$CurPlayer]->Mob[$CurMob]->MajorStatus != ST_FAINT)
	{ //Faint
		$Player[$CurPlayer]->Mob[$CurMob]->MajorStatus = ST_FAINT;
		echo $Player[$CurPlayer]->Mob[$CurMob]->Name." has fainted!<br>";
	}
	
	//Flush moves
	$Player[$CurPlayer]->NextMove = MV_NULL;
	if ($Player[$CurPlayer]->Mob[$CurMob]->PrepareMove)
	{ //Charge up skills are prepared, and disable you from stopping them.
		$Player[$CurPlayer]->NextMove = MV_PREPARE;
	}
	$Player[$CurPlayer]->Mob[$CurMob]->CalculateStats();
	$Player[$DefPlayer]->Mob[$DefMob]->CalculateStats();
	
}
function DoUniqueDamage($CurSkill)
{ //Certain Skills do special damage types with variable routines. That's what this is for.
	global $Player, $CurPlayer, $DefPlayer, $CurMob, $DefMob, $Skill;	
	switch ($CurSkill)
	{
		
	}
}

function DoStatusEffect($CurSkill)
{
	global $Player, $CurPlayer, $DefPlayer, $CurMob, $DefMob, $Skill, $Damage;	
	switch ($CurSkill)
	{
		case SK_THUNDERSHOCK: //Has a ~10% chance to paralyze the target.
			if (mt_rand(1,100)>=10)
			{
				if (!$Player[$DefPlayer]->Mob[$DefMob]->MajorStatus || !$Player[$DefPlayer]->Mob[$DefMob]->Type1 = ET_GROUND)
				{ //Won't stick if another status on, or if applied to ground unit.
					$Player[$DefPlayer]->Mob[$DefMob]->MajorStatus = ST_PARALYZE; //Add Paralyze Effect
					$Player[$DefPlayer]->Mob[$DefMob]->MajorTick = mt_rand(1,4); //Durating of 1-4 rounds
					//echo $Player[$DefPlayer]->Mob[$DefMob]->Name." was paralyzed. (".$Player[$DefPlayer]->Mob[$DefMob]->MajorTick." ticks)<br>";
					AddMessage(ST_PARALYZE, "MajorStatus$DefMob");
				}
			}
			return;
			break;
		case SK_THUNDERWAVE: //'Paralyzes the target.';
			if (!$Player[$DefPlayer]->Mob[$DefMob]->MajorStatus || !$Player[$DefPlayer]->Mob[$DefMob]->Type1 = ET_GROUND)
			{ //Won't stick if another status on, or if applied to ground unit.
				$Player[$DefPlayer]->Mob[$DefMob]->MajorStatus = ST_PARALYZE; //Add Paralyze Effect
				$Player[$DefPlayer]->Mob[$DefMob]->MajorTick = mt_rand(1,4); //Duration of 1-4 rounds
				//echo $Player[$DefPlayer]->Mob[$DefMob]->Name." was paralyzed.<br>";
				AddMessage(ST_PARALYZE, "MajorStatus$DefMob");
			}
			return;
			break;
		case SK_LIGHTSCREEN: //The user receives 1/2 damage from Special attacks until it switches out or either Pokemon uses Haze.			
			if (!$Player[$CurPlayer]->Mob[$CurMob]->HasMinorStatus($CurSkill))
			{
				$Player[$CurPlayer]->Mob[$CurMob]->AddMinorStatus(SK_LIGHTSCREEN);
				echo $Player[$CurPlayer]->Mob[$CurMob]->Name." is affected by ".$Skill[$CurSkill]->Name."<br>";
			} else echo $Player[$CurPlayer]->Mob[$CurMob]->Name." is already under the effect of ".$Skill[$CurSkill]->Name."<br>";
			return;
			break;
		case SK_GROWL: //'Lowers the target\'s Attack by 1 stage.';
			if (!$Player[$DefPlayer]->Mob[$DefMob]->HasMinorStatus(SK_MIST) && !$Player[$DefPlayer]->Mob[$DefMob]->HasMinorStatus(SK_SUBSTITUTE))
			{
				$Player[$DefPlayer]->Mob[$DefMob]->AddMinorStatus(SK_GROWL);
			}
			AddMessage($Player[$DefPlayer]->Mob[$DefMob]->Name."'s attack fell.");
			return;
			break;
		case SK_TAILWHIP: //'Lowers the target\'s Defense by 1 stage.';
			if (!$Player[$DefPlayer]->Mob[$DefMob]->HasMinorStatus(SK_MIST) && !$Player[$DefPlayer]->Mob[$DefMob]->HasMinorStatus(SK_SUBSTITUTE))
			{
				$Player[$DefPlayer]->Mob[$DefMob]->AddMinorStatus(SK_TAILWHIP);
			}
			echo $Player[$DefPlayer]->Mob[$DefMob]->Name."'s defense fell.<br>";
			return;
			break;
		case SK_SWORDSDANCE: //'Raises the user\'s Attack by 2 stages.';
			$Player[$CurPlayer]->Mob[$CurMob]->AddMinorStatus(SK_SWORDSDANCE);
			echo $Player[$CurPlayer]->Mob[$CurMob]->Name."'s attack sharply rose.<br>";
			return;
			break;
		case SK_AGILITY: //'Raises the user\'s Speed by 2 stages.';
			$Player[$CurPlayer]->Mob[$CurMob]->AddMinorStatus(SK_AGILITY);
			echo $Player[$CurPlayer]->Mob[$CurMob]->Name."'s speed sharply rose.<br>";
			return;
			break;
		case SK_GROWTH: //'Raises the user\'s Special by 1 stage.';
			$Player[$CurPlayer]->Mob[$CurMob]->AddMinorStatus(SK_GROWTH);
			echo $Player[$CurPlayer]->Mob[$CurMob]->Name."'s special sharply rose.<br>";
			return;
			break;
		case SK_ABSORB: // 'Restores the user\'s HP by 1/2 of the damage inflicted on the target.';
			$Player[$CurPlayer]->Mob[$CurMob]->BuffStats->CurHP += max($Damage/2,1); //Heal for half HP of damage
			echo $Player[$CurPlayer]->Mob[$CurMob]->Name." is healed.<br>";
			return;
			break;
		case SK_LEECHSEED: //'The user steals 1/16 of the target\'s max HP (or more if used in conjunction with Toxic) until either Pokemon uses Haze or the target is switched out or KO\'ed;
			//does not work on Grass-type Pokemon, but will work against Pokemon behind Substitutes.';
			if (!$Player[$DefPlayer]->Mob[$DefMob]->Type1 != ET_GRASS)
			{
				$Player[$DefPlayer]->Mob[$DefMob]->AddMinorStatus(SK_LEECHSEED);
			}
			return;
			break;
		case SK_POISONPOWDER: //'Poisons the target.';
			if (!$Player[$DefPlayer]->Mob[$DefMob]->MajorStatus || !$Player[$DefPlayer]->Mob[$DefMob]->Type1 = ET_POISON)
			{ //Won't stick if another status on, or if applied to POISON unit.
				$Player[$DefPlayer]->Mob[$DefMob]->MajorStatus = ST_POISON; //Add Paralyze Effect
				$Player[$DefPlayer]->Mob[$DefMob]->MajorTick = mt_rand(1,4); //Duration of 1-4 rounds
				echo $Player[$DefPlayer]->Mob[$DefMob]->Name." was poisoned.<br>";
			}
			return;
			break;
		case SK_SLEEPPOWDER: //'Puts the target to sleep.';
			if (!$Player[$DefPlayer]->Mob[$DefMob]->MajorStatus || !$Player[$DefPlayer]->Mob[$DefMob]->HasMinorStatus(SK_SUBSTITUTE))
			{ //Won't stick if another status on
				$Player[$DefPlayer]->Mob[$DefMob]->MajorStatus = ST_SLEEP;
				$Player[$DefPlayer]->Mob[$DefMob]->MajorTick = mt_rand(1,7); //Duration of 1-7 rounds
				echo $Player[$DefPlayer]->Mob[$DefMob]->Name." fell asleep.<br>";
			}
			return;
			break;
		case SK_TELEPORT: //'Teleport runs away in wild battles only.
			return;
			break;
		case SK_EMBER: //'Burns the target. 10% chance';
			if (!$Player[$DefPlayer]->Mob[$DefMob]->MajorStatus || !$Player[$DefPlayer]->Mob[$DefMob]->HasMinorStatus(SK_SUBSTITUTE))
			{ //Won't stick if another status on, or status
				$Player[$DefPlayer]->Mob[$DefMob]->MajorStatus = ST_BURN; //Add Paralyze Effect
				$Player[$DefPlayer]->Mob[$DefMob]->MajorTick = mt_rand(1,4); //Duration of 1-4 rounds
				AddMessage($Player[$DefPlayer]->Mob[$DefMob]->Name." was burned.");
			}
			return;
			break;	

	}
}

/**
 * Make a seed for random numbers according to microseconds.
 */
function make_seed()
{
  list($usec, $sec) = explode(' ', microtime());
  return (float) $sec + ((float) $usec * 100000);
}

function GiveEXP($PlayerID) {
	global $Skill, $Player, $CurPlayer, $DefPlayer, $CurMob, $DefMob, $CurSkill, $DefSkill;
	//Formulate EXP gain.
	SetCurPlayer($PlayerID); //Switch to player gaining EXP.
	//echo "This was called by $PlayerID, who is now $CurPlayer, so I imagine this fainted: ".$Player[$DefPlayer]->Mob[$DefMob]->Name;
	//Set new fighting mob.
	//Giving EXP.
	for ($x = 1; $x < (sizeof($Player[$DefPlayer]->Mob)+1); $x++)
	{
		if ($Player[$DefPlayer]->Mob[$x]->MajorStatus != ST_FAINT) $Player[$DefPlayer]->FightingMob = $x;
	}
	$ExpGain = ($Player[$DefPlayer]->Mob[$DefMob]->OriginalTrainer == -2) ? 1.5 : 1; //If a trainer, 50% bonus exp
	$ExpGain *= ($Player[$CurPlayer]->Mob[$CurMob]->OriginalTrainer == $Player[$CurPlayer]->Mob[$CurMob]->ID) ? 1 : 1.5; //if you didn't originally catch it, 50% bonus
	$ExpGain *= GetBaseEXP($Player[$DefPlayer]->Mob[$DefMob]->ID); //Get BaseEXP multiplier for each pokemon.
	//50% bonus if pokemon is holding lucky egg, not in yellow
	$ExpGain *= $Player[$DefPlayer]->Mob[$DefMob]->Level; //Add in level.
	$ExpGain /= (7*(max(GetAlivePokemon($CurPlayer),1))*2); //Number of participants, times two.
	$ExpGain = floor($ExpGain); //Floor it.
	//echo $Player[$CurPlayer]->Mob[$CurMob]->Name." gained $ExpGain EXP. points!<br>";
	AddMessage($Player[$CurPlayer]->Mob[$CurMob]->Name." gained $ExpGain EXP. points!");
	$Player[$CurPlayer]->Mob[$CurMob]->Experience += $ExpGain;
	
	while ($Player[$CurPlayer]->Mob[$CurMob]->MaxExperience <= $Player[$CurPlayer]->Mob[$CurMob]->Experience)
	{ //DING!
		$ExpGain -= $Player[$CurPlayer]->Mob[$CurMob]->Experience - $Player[$CurPlayer]->Mob[$CurMob]->MaxExperience;
		$Player[$CurPlayer]->Mob[$CurMob]->Level++;
		AddMessage($Player[$CurPlayer]->Mob[$CurMob]->Name." gained level ".$Player[$CurPlayer]->Mob[$CurMob]->Level."!");
		$ExpGain = $Player[$CurPlayer]->Mob[$CurMob]->Experience;
		$ExpGain = $Player[$CurPlayer]->Mob[$CurMob]->CalculateStats();
	}
	$Player[$CurPlayer]->BattlesWon++; //add a battle to winning player.
	$Player[$DefPlayer]->BattlesLost++; //add a battle to winning player.
	AddMessage($Player[$CurPlayer]->BattlesWon,"PlayerWins");
	//echo "Your total wins: ".$Player[$CurPlayer]->BattlesWon."<br>";
	$Player[$CurPlayer]->MinorStatus = 0; //Blank out statuses
	$Player[$DefPlayer]->MinorStatus = 0;
	EndBattle();
	SaveGame();
	DisplayActions();
	//echo "<a href=\"main.php?battle=1\">Start a battle.</a><br>";
	//echo "<a href=\"main.php?heal=1\">(Cheat) Heal</a><br>";
/*	for ($x =0; $x < sizeof($Player[$PlayerID]->Mob); $x++)
	{
		echo $Player[$PlayerID]->Mob[$x]->Name." gained 1 EXP. points!<br>";
	}
*/
}

function GetAlivePokemon($PlayerID) {
	global $Skill, $Player, $CurPlayer, $DefPlayer, $CurMob, $DefMob, $CurSkill, $DefSkill;
	//TODO: Write this
	$AlivePokemon = 0;
	for ($x = 1; $x < (sizeof($Player[$PlayerID]->Mob)+1); $x++)
	{
		if ($Player[$PlayerID]->Mob[$x]->MajorStatus != ST_FAINT) $AlivePokemon++;
	}
	return $AlivePokemon;
}
function GetCritical($CurSkill)
{
	global $Skill, $Player, $CurPlayer, $DefPlayer, $CurMob, $DefMob, $CurSkill, $DefSkill;
	$CritSkill = 1; //Default is 1 for crit modifier.
	if ($CurSkill == SK_RAZORLEAF) $CritSkill *= 8;
	if ($CurSkill == SK_KARATECHOP) $CritSkill *= 8;
	if ($CurSkill == SK_CRABHAMMER) $CritSkill *= 8;
	if ($CurSkill == SK_SLASH) $CritSkill *= 8;
	if ($CurSkill == SK_FOCUSENERGY) $CritSkill /= 4; //In gameboy battles.. ??
		
	if (max(255, ($CritSkill* ($CritSkill * $Player[$CurPlayer]->Mob[$CurMob]->BuffStats->Speed/2))) < mt_rand(0,255)) return 2;
	return 1;
}
function GetTypeMod($TypeA, $TypeD) {
		
		switch($TypeA)
		{
			case ET_BUG:
				if ($TypeD == ET_BUG) return 1;
				if ($TypeD == ET_DRAGON) return 1;
				if ($TypeD == ET_ELECTRIC) return 1;
				if ($TypeD == ET_FIRE) return 0.5;
				if ($TypeD == ET_FIGHTING) return 0.5;
				if ($TypeD == ET_FLYING) return 0.5;
				if ($TypeD == ET_GHOST) return 0.5;
				if ($TypeD == ET_GRASS) return 2;
				if ($TypeD == ET_GROUND) return 1;
				if ($TypeD == ET_ICE) return 1;
				if ($TypeD == ET_NORMAL) return 1;
				if ($TypeD == ET_POISON) return 2;
				if ($TypeD == ET_PSYCHIC) return 2;
				if ($TypeD == ET_ROCK) return 1;
				if ($TypeD == ET_WATER) return 1;
				break;
			case ET_DRAGON:
				if ($TypeD == ET_BUG) return 1;
				if ($TypeD == ET_DRAGON) return 2;
				if ($TypeD == ET_ELECTRIC) return 1;
				if ($TypeD == ET_FIRE) return 1;
				if ($TypeD == ET_FIGHTING) return 1;
				if ($TypeD == ET_FLYING) return 1;
				if ($TypeD == ET_GHOST) return 1;
				if ($TypeD == ET_GRASS) return 1;
				if ($TypeD == ET_GROUND) return 1;
				if ($TypeD == ET_ICE) return 1;
				if ($TypeD == ET_NORMAL) return 1;
				if ($TypeD == ET_POISON) return 1;
				if ($TypeD == ET_PSYCHIC) return 1;
				if ($TypeD == ET_ROCK) return 1;
				if ($TypeD == ET_WATER) return 1;
				break;			
			case ET_ELECTRIC:
				if ($TypeD == ET_BUG) return 1;
				if ($TypeD == ET_DRAGON) return 0.5;
				if ($TypeD == ET_ELECTRIC) return 0.5;
				if ($TypeD == ET_FIRE) return 1;
				if ($TypeD == ET_FIGHTING) return 1;
				if ($TypeD == ET_FLYING) return 2;
				if ($TypeD == ET_GHOST) return 1;
				if ($TypeD == ET_GRASS) return 0.5;
				if ($TypeD == ET_GROUND) return 0;
				if ($TypeD == ET_ICE) return 1;
				if ($TypeD == ET_NORMAL) return 1;
				if ($TypeD == ET_POISON) return 1;
				if ($TypeD == ET_PSYCHIC) return 1;
				if ($TypeD == ET_ROCK) return 1;
				if ($TypeD == ET_WATER) return 2;
				break;
			case ET_FIRE:
				if ($TypeD == ET_BUG) return 2;
				if ($TypeD == ET_DRAGON) return 0.5;
				if ($TypeD == ET_ELECTRIC) return 1;
				if ($TypeD == ET_FIRE) return 9.5;
				if ($TypeD == ET_FIGHTING) return 1;
				if ($TypeD == ET_FLYING) return 1;
				if ($TypeD == ET_GHOST) return 1;
				if ($TypeD == ET_GRASS) return 2;
				if ($TypeD == ET_GROUND) return 1;
				if ($TypeD == ET_ICE) return 2;
				if ($TypeD == ET_NORMAL) return 1;
				if ($TypeD == ET_POISON) return 1;
				if ($TypeD == ET_PSYCHIC) return 1;
				if ($TypeD == ET_ROCK) return 0.5;
				if ($TypeD == ET_WATER) return 0.5;
				break;
			case ET_FIGHTING:
				if ($TypeD == ET_BUG) return 0.5;
				if ($TypeD == ET_DRAGON) return 1;
				if ($TypeD == ET_ELECTRIC) return 1;
				if ($TypeD == ET_FIRE) return 1;
				if ($TypeD == ET_FIGHTING) return 1;
				if ($TypeD == ET_FLYING) return 0.5;
				if ($TypeD == ET_GHOST) return 0;
				if ($TypeD == ET_GRASS) return 1;
				if ($TypeD == ET_GROUND) return 1;
				if ($TypeD == ET_ICE) return 2;
				if ($TypeD == ET_NORMAL) return 2;
				if ($TypeD == ET_POISON) return 0.5;
				if ($TypeD == ET_PSYCHIC) return 0.5;
				if ($TypeD == ET_ROCK) return 2;
				if ($TypeD == ET_WATER) return 1;
				break;
			case ET_FLYING:
				if ($TypeD == ET_BUG) return 2;
				if ($TypeD == ET_DRAGON) return 1;
				if ($TypeD == ET_ELECTRIC) return 0.5;
				if ($TypeD == ET_FIRE) return 1;
				if ($TypeD == ET_FIGHTING) return 2;
				if ($TypeD == ET_FLYING) return 1;
				if ($TypeD == ET_GHOST) return 1;
				if ($TypeD == ET_GRASS) return 2;
				if ($TypeD == ET_GROUND) return 1;
				if ($TypeD == ET_ICE) return 1;
				if ($TypeD == ET_NORMAL) return 1;
				if ($TypeD == ET_POISON) return 1;
				if ($TypeD == ET_PSYCHIC) return 1;
				if ($TypeD == ET_ROCK) return 0.5;
				if ($TypeD == ET_WATER) return 1;
				break;
			case ET_GHOST:
				if ($TypeD == ET_BUG) return 1;
				if ($TypeD == ET_DRAGON) return 1;
				if ($TypeD == ET_ELECTRIC) return 1;
				if ($TypeD == ET_FIRE) return 1;
				if ($TypeD == ET_FIGHTING) return 1;
				if ($TypeD == ET_FLYING) return 1;
				if ($TypeD == ET_GHOST) return 2;
				if ($TypeD == ET_GRASS) return 1;
				if ($TypeD == ET_GROUND) return 1;
				if ($TypeD == ET_ICE) return 1;
				if ($TypeD == ET_NORMAL) return 0;
				if ($TypeD == ET_POISON) return 1;
				if ($TypeD == ET_PSYCHIC) return 0;
				if ($TypeD == ET_ROCK) return 1;
				if ($TypeD == ET_WATER) return 1;
				break;
			case ET_GRASS:
				if ($TypeD == ET_BUG) return 0.5;
				if ($TypeD == ET_DRAGON) return 0.5;
				if ($TypeD == ET_ELECTRIC) return 1;
				if ($TypeD == ET_FIRE) return 0.5;
				if ($TypeD == ET_FIGHTING) return 1;
				if ($TypeD == ET_FLYING) return 0.5;
				if ($TypeD == ET_GHOST) return 1;
				if ($TypeD == ET_GRASS) return 0.5;
				if ($TypeD == ET_GROUND) return 2;
				if ($TypeD == ET_ICE) return 1;
				if ($TypeD == ET_NORMAL) return 1;
				if ($TypeD == ET_POISON) return 0.5;
				if ($TypeD == ET_PSYCHIC) return 1;
				if ($TypeD == ET_ROCK) return 2;
				if ($TypeD == ET_WATER) return 2;
				break;
			case ET_GROUND:
				if ($TypeD == ET_BUG) return 0.5;
				if ($TypeD == ET_DRAGON) return 1;
				if ($TypeD == ET_ELECTRIC) return 2;
				if ($TypeD == ET_FIRE) return 2;
				if ($TypeD == ET_FIGHTING) return 1;
				if ($TypeD == ET_FLYING) return 0;
				if ($TypeD == ET_GHOST) return 1;
				if ($TypeD == ET_GRASS) return 0.5;
				if ($TypeD == ET_GROUND) return 1;
				if ($TypeD == ET_ICE) return 1;
				if ($TypeD == ET_NORMAL) return 1;
				if ($TypeD == ET_POISON) return 2;
				if ($TypeD == ET_PSYCHIC) return 1;
				if ($TypeD == ET_ROCK) return 2;
				if ($TypeD == ET_WATER) return 1;
				break;
			case ET_ICE:
				if ($TypeD == ET_BUG) return 1;
				if ($TypeD == ET_DRAGON) return 2;
				if ($TypeD == ET_ELECTRIC) return 1;
				if ($TypeD == ET_FIRE) return 1;
				if ($TypeD == ET_FIGHTING) return 1;
				if ($TypeD == ET_FLYING) return 2;
				if ($TypeD == ET_GHOST) return 1;
				if ($TypeD == ET_GRASS) return 2;
				if ($TypeD == ET_GROUND) return 2;
				if ($TypeD == ET_ICE) return 0.5;
				if ($TypeD == ET_NORMAL) return 1;
				if ($TypeD == ET_POISON) return 1;
				if ($TypeD == ET_PSYCHIC) return 1;
				if ($TypeD == ET_ROCK) return 1;
				if ($TypeD == ET_WATER) return 0.5;
				break;
			case ET_NORMAL:
				if ($TypeD == ET_BUG) return 1;
				if ($TypeD == ET_DRAGON) return 1;
				if ($TypeD == ET_ELECTRIC) return 1;
				if ($TypeD == ET_FIRE) return 1;
				if ($TypeD == ET_FIGHTING) return 1;
				if ($TypeD == ET_FLYING) return 1;
				if ($TypeD == ET_GHOST) return 0;
				if ($TypeD == ET_GRASS) return 1;
				if ($TypeD == ET_GROUND) return 1;
				if ($TypeD == ET_ICE) return 1;
				if ($TypeD == ET_NORMAL) return 1;
				if ($TypeD == ET_POISON) return 1;
				if ($TypeD == ET_PSYCHIC) return 1;
				if ($TypeD == ET_ROCK) return 0.5;
				if ($TypeD == ET_WATER) return 1;
				break;
			case ET_POISON:
				if ($TypeD == ET_BUG) return 2;
				if ($TypeD == ET_DRAGON) return 1;
				if ($TypeD == ET_ELECTRIC) return 1;
				if ($TypeD == ET_FIRE) return 1;
				if ($TypeD == ET_FIGHTING) return 1;
				if ($TypeD == ET_FLYING) return 1;
				if ($TypeD == ET_GHOST) return 0.5;
				if ($TypeD == ET_GRASS) return 2;
				if ($TypeD == ET_GROUND) return 0.5;
				if ($TypeD == ET_ICE) return 1;
				if ($TypeD == ET_NORMAL) return 1;
				if ($TypeD == ET_POISON) return 0.5;
				if ($TypeD == ET_PSYCHIC) return 1;
				if ($TypeD == ET_ROCK) return 0.5;
				if ($TypeD == ET_WATER) return 1;
				break;
			case ET_PSYCHIC:
				if ($TypeD == ET_BUG) return 1;
				if ($TypeD == ET_DRAGON) return 1;
				if ($TypeD == ET_ELECTRIC) return 1;
				if ($TypeD == ET_FIRE) return 1;
				if ($TypeD == ET_FIGHTING) return 1;
				if ($TypeD == ET_FLYING) return 2;
				if ($TypeD == ET_GHOST) return 1;
				if ($TypeD == ET_GRASS) return 1;
				if ($TypeD == ET_GROUND) return 1;
				if ($TypeD == ET_ICE) return 1;
				if ($TypeD == ET_NORMAL) return 1;
				if ($TypeD == ET_POISON) return 2;
				if ($TypeD == ET_PSYCHIC) return 0.5;
				if ($TypeD == ET_ROCK) return 1;
				if ($TypeD == ET_WATER) return 1;
				break;
			case ET_ROCK:
				if ($TypeD == ET_BUG) return 2;
				if ($TypeD == ET_DRAGON) return 1;
				if ($TypeD == ET_ELECTRIC) return 1;
				if ($TypeD == ET_FIRE) return 2;
				if ($TypeD == ET_FIGHTING) return 0.5;
				if ($TypeD == ET_FLYING) return 2;
				if ($TypeD == ET_GHOST) return 1;
				if ($TypeD == ET_GRASS) return 1;
				if ($TypeD == ET_GROUND) return 0.5;
				if ($TypeD == ET_ICE) return 2;
				if ($TypeD == ET_NORMAL) return 1;
				if ($TypeD == ET_POISON) return 1;
				if ($TypeD == ET_PSYCHIC) return 1;
				if ($TypeD == ET_ROCK) return 1;
				if ($TypeD == ET_WATER) return 1;
				break;
			case ET_WATER:
				if ($TypeD == ET_BUG) return 1;
				if ($TypeD == ET_DRAGON) return 0.5;
				if ($TypeD == ET_ELECTRIC) return 1;
				if ($TypeD == ET_FIRE) return 2;
				if ($TypeD == ET_FIGHTING) return 1;
				if ($TypeD == ET_FLYING) return 1;
				if ($TypeD == ET_GHOST) return 1;
				if ($TypeD == ET_GRASS) return 0.5;
				if ($TypeD == ET_GROUND) return 2;
				if ($TypeD == ET_ICE) return 1;
				if ($TypeD == ET_NORMAL) return 1;
				if ($TypeD == ET_POISON) return 1;
				if ($TypeD == ET_PSYCHIC) return 1;
				if ($TypeD == ET_ROCK) return 2;
				if ($TypeD == ET_WATER) return 0.5;
				break;
		}
		return 1; //Default catch all bug.
}

function EndBattle() {
	global $Skill, $Player, $CurPlayer, $DefPlayer, $CurMob, $DefMob, $CurSkill, $DefSkill, $CurMove;
	global $dbip, $dbname, $dbpass, $dbprefix, $dbuser;
	global $uid, $MyCID;
	$query = "DELETE FROM ".$dbprefix."battle WHERE id = '".$Player[1]->Battle."';";
	$result = mysql_query($query);
	if (debug) echo "Deleted battle entry.<br>";
	for ($x = 1; $x < 3; $x++)
	{
		if ($Player[$x]->Type) { //Player is not human made, delete it from database.
			$query = "DELETE FROM ".$dbprefix."player WHERE id = '".$Player[$x]->CID."';";		
			$result = mysql_query($query);
			if (debug) echo "Deleted player $x due to being a non-player character.";
			$query = "DELETE FROM ".$dbprefix."pet WHERE pid = '".$Player[$x]->CID."';";		
			$result = mysql_query($query);
			if (debug) echo "Deleted player $x's pokemon";
		}
	}	 

}




function CreatePokemon($PlayerID, $MobID) {
	global $Skill, $Player, $CurPlayer, $DefPlayer, $CurMob, $DefMob, $CurSkill, $DefSkill;
	global $uid, $MyCID, $dbprefix;
	$query = "INSERT INTO `".$dbprefix."pet` VALUES (";
	//id, pid, mid, name, level, exp
	$query .= "DEFAULT, '".$Player[$PlayerID]->CID."', '".$Player[$PlayerID]->Mob[$MobID]->ID."', '".$Player[$PlayerID]->Mob[$MobID]->Name."', '".$Player[$PlayerID]->Mob[$MobID]->Level."', DEFAULT";
	//move1,move2,move3,move4
	$query .= ", '".$Player[$PlayerID]->Mob[$MobID]->Move1."', '".$Player[$PlayerID]->Mob[$MobID]->Move2."', '".$Player[$PlayerID]->Mob[$MobID]->Move3."', '".$Player[$PlayerID]->Mob[$MobID]->Move4."'";
	//move1pp,move2pp,move3pp,move4pp
	$query .= ", '".$Player[$PlayerID]->Mob[$MobID]->Move1PP."', '".$Player[$PlayerID]->Mob[$MobID]->Move2PP."', '".$Player[$PlayerID]->Mob[$MobID]->Move3PP."', '".$Player[$PlayerID]->Mob[$MobID]->Move4PP."'";
	//move1maxpp,move2maxpp,move3maxpp,move4maxpp
	$query .= ", '".$Player[$PlayerID]->Mob[$MobID]->Move1PPMax."', '".$Player[$PlayerID]->Mob[$MobID]->Move2PPMax."', '".$Player[$PlayerID]->Mob[$MobID]->Move3PPMax."', '".$Player[$PlayerID]->Mob[$MobID]->Move4PPMax."'";
	//ivattack, ivdefense, ivspeed, ivhp, ivspecial
	$query .= ", '".$Player[$PlayerID]->Mob[$MobID]->IVAttack."', '".$Player[$PlayerID]->Mob[$MobID]->IVDefense."', '".$Player[$PlayerID]->Mob[$MobID]->IVSpeed."', '".$Player[$PlayerID]->Mob[$MobID]->IVHP."', '".$Player[$PlayerID]->Mob[$MobID]->IVSpecial."'";
	//evhp, evattack,evdefense,evspeed,evspecial
	$query .=", '".$Player[$PlayerID]->Mob[$MobID]->EVHP."', '".$Player[$PlayerID]->Mob[$MobID]->EVAttack."', '".$Player[$PlayerID]->Mob[$MobID]->EVDefense."', '".$Player[$PlayerID]->Mob[$MobID]->EVSpeed."', '".$Player[$PlayerID]->Mob[$MobID]->EVSpecial."'";
	//majorstatus,majorvalue,majortick/minorstatus
	$query .=", '".$Player[$PlayerID]->Mob[$MobID]->MajorStatus."', '".$Player[$PlayerID]->Mob[$MobID]->MajorValue."', '".$Player[$PlayerID]->Mob[$MobID]->MajorTick."', ''";
	//happy, sex,onhand,order,originaltrainer,preparemove, hp
	$query .=", '".$Player[$PlayerID]->Mob[$MobID]->Happy."', '".$Player[$PlayerID]->Mob[$MobID]->Sex."', '1', '$MobID', '".$Player[$PlayerID]->Mob[$MobID]->OriginalTrainer."', '".$Player[$PlayerID]->Mob[$MobID]->PrepareMove."', '".$Player[$PlayerID]->Mob[$MobID]->BuffStats->CurHP."'";
	//Battleswon, battleslost
	$query .=", '".$Player[$PlayerID]->Mob[$MobID]->BattlesWon."', '".$Player[$PlayerID]->Mob[$MobID]->BattlesLost."'";
	$query .= ");";
	$result=mysql_query($query);
	//echo "Added new pokemon<br>";
	AddMessage("Query for createpokemon: "+$query);
	//if (!$result) die("Unable to query DB for battle information!");
	//if (mysql_numrows($result)<1)  $Player[1]->Battle = 0; //There is no real battle going

	
}
function SaveGame() {
	global $Skill, $Player, $CurPlayer, $DefPlayer, $CurMob, $DefMob, $CurSkill, $DefSkill;
	global $uid, $MyCID, $dbprefix;	
	for ($x = 1; $x < 3; $x++)
	{ //x for player
		$query = "UPDATE `".$dbprefix."player` SET ";
		$query .= "`battleswon` = ".$Player[$x]->BattlesWon;	
		$query .= ", `battleslost` = ".$Player[$x]->BattlesLost;			
		$query .= ", `nextmove` = ".$Player[$x]->NextMove;
		$query .= ", `fightingmob` = ".$Player[$x]->FightingMob;
		$query .= " WHERE id = '".$Player[$x]->CID."'"; //grab UID
		$result=mysql_query($query);
		//if (debug) echo "Saved Player $x.";
		for ($y = 1; $y < (sizeof($Player[$x]->Mob)+1); $y++) { //y for each pokemon.
			//echo "pet update $y: <br>";
			$query = "UPDATE `".$dbprefix."pet` SET ";
			$query .= "`name` = '".$Player[$x]->Mob[$y]->Name."', ";
			$query .= "`ivhp` = '".$Player[$x]->Mob[$y]->IVHP."', ";
			$query .= "`ivattack` = '".$Player[$x]->Mob[$y]->IVAttack."', ";
			$query .= "`ivdefense` = '".$Player[$x]->Mob[$y]->IVDefense."', ";
			$query .= "`ivspeed` = '".$Player[$x]->Mob[$y]->IVSpeed."', ";
			$query .= "`ivspecial` = '".$Player[$x]->Mob[$y]->IVSpecial."', ";
			$query .= "`evhp` = '".$Player[$x]->Mob[$y]->EVHP."', ";
			$query .= "`evattack` = '".$Player[$x]->Mob[$y]->EVAttack."', ";
			$query .= "`evdefense` = '".$Player[$x]->Mob[$y]->EVDefense."', ";
			$query .= "`evspeed` = '".$Player[$x]->Mob[$y]->EVSpeed."', ";
			$query .= "`evspecial` = '".$Player[$x]->Mob[$y]->EVSpecial."', ";
			$query .= "`hp` = '".$Player[$x]->Mob[$y]->BuffStats->CurHP."', ";
			$query .= "`originaltrainer` = '".$Player[$x]->Mob[$y]->OriginalTrainer."', ";
			$query .= "`exp` = '".$Player[$x]->Mob[$y]->Experience."', ";
			$query .= "`lvl` = '".$Player[$x]->Mob[$y]->Level."', ";
			$query .= "`move1` = '".$Player[$x]->Mob[$y]->Move1."', ";
			$query .= "`move2` = '".$Player[$x]->Mob[$y]->Move2."', ";
			$query .= "`move3` = '".$Player[$x]->Mob[$y]->Move3."', ";
			$query .= "`move4` = '".$Player[$x]->Mob[$y]->Move4."', ";				
			$query .= "`move1PPMax` = '".$Player[$x]->Mob[$y]->Move1PPMax."', ";
			$query .= "`move2PPMax` = '".$Player[$x]->Mob[$y]->Move2PPMax."', ";
			$query .= "`move3PPMax` = '".$Player[$x]->Mob[$y]->Move3PPMax."', ";
			$query .= "`move4PPMax` = '".$Player[$x]->Mob[$y]->Move4PPMax."', ";
			$query .= "`sex` = '".$Player[$x]->Mob[$y]->Sex."', ";
			$query .= "`happy` = '".$Player[$x]->Mob[$y]->Happy."', ";
			$query .= "`preparemove` = '".$Player[$x]->Mob[$y]->PrepareMove."'";
			$query .= " WHERE id = '".$Player[$x]->Mob[$y]->DID."';"; //grab DID
			$result=mysql_query($query);
			//if (debug) "Saved Pokemon $y<br>";
		}
	}
	$query = "UPDATE `".$dbprefix."battle` SET ";
		$query .= "`round` = ".$Player[1]->Round;	
		$query .= " WHERE id = '".$Player[1]->Battle."'"; //grab UID
		$result=mysql_query($query);
		//if (debug) echo "Saved Battle.";
}


function CreateOpponent() {  //Check
	global $Skill, $Player, $CurPlayer, $DefPlayer, $CurMob, $DefMob, $CurSkill, $DefSkill;
	global $dbip, $dbname, $dbpass, $dbprefix, $dbuser;			
 	global $uid, $MyCID;	
		//Create NPC Player
	$query = "INSERT INTO ".$dbprefix."player VALUES (";
	//uid, id, name, battleswon, type, nextmove, fightingmob, battleslost
	$query .= "'0', DEFAULT, 'NPC', 0, 1, 0, 1, 0, 1);";
	$result = mysql_query($query);
	if (!$result) {
		die("Creating opponent failed for some reason. $query");
	}
	$id = mysql_insert_id();
	//Create pokemon for NPC.

	$Player[2]->Mob[1] = new Monster(PK_CHARMANDER,1);
	$Player[2]->CID = $id; //Set character ID to player's.
	CreatePokemon(2, 1); //Make a new pokemon via info on playerx, slot 1
}


function DisplayActions() { //Display actions to use.
	global $Skill, $Player, $CurPlayer, $DefPlayer, $CurMob, $DefMob, $CurSkill, $DefSkill;
	global $dbip, $dbname, $dbpass, $dbprefix, $dbuser;			
 	global $uid, $MyCID;		
	//echo "Select a move: <br>";
		AddMessage((string)floor(($Player[1]->Mob[1]->BuffStats->CurHP / $Player[1]->Mob[1]->BuffStats->MaxHP)*100),"HP1");
		if ($Player[1]->Battle) AddMessage((string)floor(($Player[2]->Mob[1]->BuffStats->CurHP / $Player[2]->Mob[1]->BuffStats->MaxHP)*100),"HP2");
		if ($Player[1]->Mob[$CurMob]->Move1) AddMessage($Skill[$Player[1]->Mob[$CurMob]->Move1]->Name,"Move1");
		if ($Player[1]->Mob[$CurMob]->Move2) AddMessage($Skill[$Player[1]->Mob[$CurMob]->Move2]->Name,"Move2");
		if ($Player[1]->Mob[$CurMob]->Move3) AddMessage($Skill[$Player[1]->Mob[$CurMob]->Move3]->Name,"Move3");
		if ($Player[1]->Mob[$CurMob]->Move4) AddMessage($Skill[$Player[1]->Mob[$CurMob]->Move4]->Name,"Move4");
		if ($Player[2]->Type == 1) AddMessage("Run", "Run"); //If player is fighting vs. Wild, give option to run.
}

/*
 * Check if session exists, if not, try to create by logging in Or just show login. STEP 1
 */
function CheckSession() {
 	global $uid, $MyCID;
 	global $dbprefix;

   $name = "";
   $password = "";
 	session_start();  	 	 	 		
	if (isset($_GET['logout'])) { session_destroy(); ShowLogin(); }//KEEL THE SESSION 
 	if (isset($_SESSION['uid'])) $uid = $_SESSION['uid']; //Unique ID for Account
 	else { //No UID? Log in if possible.

 		//First see if user is possibly creating a new account.
 		if (isset($_GET['create'])) {
	 	   $error = "";
	 	   $success = "";
		   if (preg_match('/^[a-zA-Z]{3,16}$/', $_GET['name'])) $name = $_GET['name'];
		   else $error .= "User name must be 3-16 alphabetic characters only.";
		   if (preg_match('/^[A-Za-z]\w{6,}[A-Za-z]$/', $_GET['password'])) $password = $_GET['password'];
		   else $error .= "User password must be 8-32 characters long.";
		   //if (preg_match('/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/', strtolower($_POST['email']))) $email = strtolower($_POST['email']);
		   //else $error .= "Invalid email address.<br>";
		   //Query DB for duplicate usernames.
		   if (!$error)
		   {      
		      $query = "SELECT * FROM `".$dbprefix."main` WHERE UPPER(name) = '".strtoupper($name)."'"; //grab names alike.
		      $result=mysql_query($query);
		      if (!$result) ShowLogin("The registration server is temporarily down. Try again later!");    
		      if (mysql_numrows($result)) $error = "User '$name' already exists. Try another name.";
		      else {
		         $password = crypt($password); //1 way encryption
		         $query = "INSERT INTO `".$dbprefix."main` VALUES(DEFAULT,DEFAULT,DEFAULT,'$password','$name', '')"; //grab names alike.
		         $result=mysql_query($query);
		         //if ($result) die ("No results on insert");    
		         //if (mysql_numrows($result)) $error = "User '$name' already exists. Try another name.";
		      }
		   }
		   $success = "You have successfully registerd $name!";
		   if ($error) ShowLogin($error);
		   else ShowLogin($success); 
	   }  
 		//Check if login info.
 		if (!isset($_SESSION['name'])) {
	 		if (isset($_GET['name'])) {
	 			if (isset($_GET['password'])) {
	 				$query = "SELECT * FROM `".$dbprefix."main` WHERE UPPER(name) = '".strtoupper($_GET['name'])."';"; //grab UID
					$result=mysql_query($query);
					if (!$result) die("Unable to query DB for login info!");
					if (mysql_numrows($result)<1) ShowLogin("You don't have an account.");
					else {
						if (crypt($_GET['password'],mysql_result($result,0,"password")) == mysql_result($result,0,"password")) {
							//Password correct!
							$uid = $_SESSION['uid'] = mysql_result($result,0,"id"); //attacker is player 1.
							$name = $_SESSION['name'] = mysql_result($result,0,"id");
						}
						else ShowLogin("Password entered was incorrect.");  //Failed to log in.
					}
	 			} else ShowLogin("No password provided, try again");
	 		} else ShowLogin();
		 } else $name = $_SESSION['name'];

 		if (!isset($_SESSION['cid'])) 
 		{ //I've got a UID, Figure out character ID, since no session data about it.
 			//TODO: Make it show a menu, and you can grab your character ID accordingly. For now, let's just make it.
 			$query = "SELECT * FROM `".$dbprefix."player` WHERE uid = '$uid';";
				$result=mysql_query($query);
				if (!$result) Fail("Unable to query DB for login info!");
				if (mysql_numrows($result)<1) {
					//No character? No problem!
					//INSERT INTO `po_player` VALUES(12,DEFAULT,12,0,0,0,0,0,0)
					$query = "INSERT INTO `".$dbprefix."player` VALUES($uid,DEFAULT,".$_SESSION['name'].",0,0,0,0,0,0)"; //grab names alike.
		         	$result=mysql_query($query);
		         	if (!$result) Fail("Unable to insert DB Player info! $query");		         	
				} else {
					$MyCID = $_SESSION['cid'] = mysql_result($result,0,"id");
					AddMessage("$MyCID");
				}
 		} else $MyCID = $_SESSION['cid']; //Restore Character ID
 		 		
 	}
}


function LoadPlayerData() {
	global $Skill, $Player, $CurPlayer, $DefPlayer, $CurMob, $DefMob, $CurSkill, $DefSkill, $CurMove;
	global $dbip, $dbname, $dbpass, $dbprefix, $dbuser;
	global $uid, $MyCID;
	$Player[1] = new Player();
	$Player[2] = new Player();
	if (debug) echo "Start loading player data.<br>";
	for ($x = 1; $x < 3; $x++)
	{
		if ($Player[$x]->CID) { //If player entity exists
			$query = "SELECT * FROM `".$dbprefix."player` WHERE id = '".$Player[$x]->CID."'"; //grab UID
			$result=mysql_query($query);
			if (!$result) die ("unable to query DB for player info, used ".$query); 
			if (mysql_numrows($result)<1)  die('no player found with id provided, $query'); 
			$Player[$x]->UID = mysql_result($result,0,"uid");
			$Player[$x]->Name = mysql_result($result,0,"name");
			$Player[$x]->BattlesWon = mysql_result($result,0,"battleswon");
			$Player[$x]->BattlesLost = mysql_result($result,0,"battleslost");
			$Player[$x]->Type = mysql_result($result,0,"type");
			$Player[$x]->NextMove = mysql_result($result,0,"nextmove");
			//echo "Next Move: ".$Player[$x]->NextMove;
			if (!$Player[$x]->NextMove && $Player[$x]->UID == $uid && isset($_GET['nextmove'])) {
				//TODO: REGEX check
				$Player[$x]->NextMove = $_GET['nextmove'];
			} 
			$Player[$x]->FightingMob = mysql_result($result,0,"fightingmob");
			if (!$Player[$x]->FightingMob) $Player[$x]->FightingMob = 1; //Sanity check
			$CurMob = $Player[$x]->FightingMob;
			if (!$Player[$x]->Name) die($Player->Name." has no name!");

			//Grab pokemon
			$query = "SELECT * FROM `".$dbprefix."pet` WHERE pid = '".$Player[$x]->CID."' and onhand = 1 ORDER BY `order` ASC"; //grab all onhand pokemon
			$result=mysql_query($query);
			if (!$result) die ("unable to query DB ".$query); 
			if (mysql_numrows($result)<1)  { //die('unable to find any pokemon'); 
				AddMessage("No pokemon found, creating new one");
				if (debug) echo "No pokemon found, making a new one!";
				$Player[$x]->Mob[1] = new Monster(PK_PIKACHU);
				CreatePokemon($x, 1); //Make a new pokemon via info on playerx, slot 1
			}
			for ($y =1; $y <= mysql_numrows($result); $y++) {
				if (debug) echo "I found a pokemon, let's load it.<br>";
				$z = $y-1;
				$Player[$x]->Mob[$y] = new Monster(mysql_result($result,($z),"mid")); //Make new generic monster based on mid.	
				$Player[$x]->Mob[$y]->DID = mysql_result($result,($z),"id"); //Database ID 
				$Player[$x]->Mob[$y]->Name = mysql_result($result,($z),"name");
				$Player[$x]->Mob[$y]->IVHP = mysql_result($result,($z),"ivhp");
				$Player[$x]->Mob[$y]->IVAttack = mysql_result($result,($z),"ivattack");
				$Player[$x]->Mob[$y]->IVDefense = mysql_result($result,($z),"ivdefense");
				$Player[$x]->Mob[$y]->IVSpeed = mysql_result($result,($z),"ivspeed");				
				$Player[$x]->Mob[$y]->IVSpecial = mysql_result($result,($z),"ivspecial");
				$Player[$x]->Mob[$y]->EVHP = mysql_result($result,($z),"evhp");
				$Player[$x]->Mob[$y]->EVAttack = mysql_result($result,($z),"evattack");
				$Player[$x]->Mob[$y]->EVDefense = mysql_result($result,($z),"evdefense");
				$Player[$x]->Mob[$y]->EVSpeed = mysql_result($result,($z),"evspeed");				
				$Player[$x]->Mob[$y]->EVSpecial = mysql_result($result,($z),"evspecial");
				$Player[$x]->Mob[$y]->BaseStats->CurHP = mysql_result($result,($z),"hp");
				$Player[$x]->Mob[$y]->BuffStats->CurHP = mysql_result($result,($z),"hp");
				$Player[$x]->Mob[$y]->Move1 = mysql_result($result,($z),"move1");
				$Player[$x]->Mob[$y]->Move2 = mysql_result($result,($z),"move2");
				$Player[$x]->Mob[$y]->Move3 = mysql_result($result,($z),"move3");
				$Player[$x]->Mob[$y]->Move4 = mysql_result($result,($z),"move4");
				$Player[$x]->Mob[$y]->OriginalTrainer = mysql_result($result,($z),"originaltrainer");
				$Player[$x]->Mob[$y]->Experience = mysql_result($result,($z),"exp");
				$Player[$x]->Mob[$y]->Level = mysql_result($result,($z),"lvl");
				$Player[$x]->Mob[$y]->Move1PPMax = mysql_result($result,($z),"move1PPMax");
				$Player[$x]->Mob[$y]->Move2PPMax = mysql_result($result,($z),"move2PPMax");
				$Player[$x]->Mob[$y]->Move3PPMax = mysql_result($result,($z),"move3PPMax");
				$Player[$x]->Mob[$y]->Move4PPMax = mysql_result($result,($z),"move4PPMax");
				$Player[$x]->Mob[$y]->Sex = mysql_result($result,($z),"sex");
				$Player[$x]->Mob[$y]->Happy = mysql_result($result,($z),"happy");
				$Player[$x]->Mob[$y]->PrepareMove = mysql_result($result,($z),"preparemove");
				$Player[$x]->Mob[$y]->CalculateStats(); //Update stats with new info.
				//$Player[$x]->Mob[$y]->DisplayStats();
			}

			if (isset($_GET['battle'])) {
				CreateBattle();		
			}
			//if (!is_int($Player[$PlayerID]->UID)) die($Player->Name." has an invalid Battle ID: ".$Player[$PlayerID]->Battle);			

	
		} else {  //Player does not exist, do menu options.
			AddMessage("Heal (Cheat)","lm1");
			AddMessage("Make Battle (Cheat)","lm2");
			Finish();
		}
	}
}

//This is to fail a log in that was partially occuring, cleaning out any session data.
function Fail($Message = "") {
	session_destroy();
	ShowLogin($Message);
	
}


function CreateBattle() {
	global $Skill, $Player, $CurPlayer, $DefPlayer, $CurMob, $DefMob, $CurSkill, $DefSkill;
	global $dbip, $dbname, $dbpass, $dbprefix, $dbuser;			
 	global $uid, $MyCID;	
	//First, query if a battle is going down.
	$query = "SELECT * FROM `".$dbprefix."pet` WHERE pid = '".$MyCID."' and onhand = 1 ORDER BY `order` ASC"; //grab all onhand pokemon
	$result=mysql_query($query);
	if (!$result) die ("unable to query DB ".$query); 
	if (mysql_numrows($result)<1) die('unable to find any pokemon while on create battle. o.O; You shouldn\'t see this.<br>'); 
	$Alive = 0;
	for ($y =1; $y <= mysql_numrows($result); $y++) {
		if (mysql_result($result,(($y-1)),"hp")) $Alive++;
	}
	if (!$Alive) { AddMessage("You don't have any living pokemon, slacker!"); 	Finish(); }




	$query = "SELECT * FROM `".$dbprefix."battle` WHERE curid = '$MyCID' OR defid = '$MyCID';"; //grab battle ID
	$result=mysql_query($query);
	if (!$result) die("Unable to query DB for battle information!");
	if (mysql_numrows($result)) return; //If any battle info, ignore the flag.
	//Next, Make a new opponent.
	//TODO: This needs to be revamped for pvp.
	CreateOpponent();
	//Now, we insert the battle data.
 	$query = "INSERT INTO ".$dbprefix."battle VALUES (";
 	//id, curid, defid, round
 	$query .= "DEFAULT, '".$MyCID."', '".$Player[2]->CID."', '0')";
 	if (!mysql_query($query)) {
 		die("For some reason, wasn't able to create battle: $query");
 	}
 	if (debug) echo "Battle made. <br>";
 
}


function AddMessage($Message, $ElementName = "Log", $Delay = 0) {
	global $Elements, $Messages, $Delays;
		$Elements[] = $ElementName;
		$Messages[] = $Message;
		$Delays[] = $Delay;
}



 function ShowLogin($Message = "") {
 	echo "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n";
 	echo "<Events>\n";
	echo "<Message>$Message</Message>\n";
	echo "<Login>-1</Login>\n";
	echo "</Events>\n";
 	exit();
 }


 /*
  * Check if players is in a battle.
  */
function CheckBattle() {
	global $Skill, $Player, $CurPlayer, $DefPlayer, $CurMob, $DefMob, $CurSkill, $DefSkill;
	global $dbip, $dbname, $dbpass, $dbprefix, $dbuser;			
 	global $uid, $MyCID;

	
	//END OF TEMPORARY
	if (isset($_GET['heal'])) {
		$query = "UPDATE `".$dbprefix."pet` SET hp = 999, majorstatus = 0 WHERE pid = $MyCID";
		mysql_query($query);
		AddMessage("Healed!");
	}

	$query = "SELECT * FROM `".$dbprefix."battle` WHERE curid = '$MyCID' OR defid = '$MyCID';"; //grab battle ID
	$result=mysql_query($query);
	if (!$result) die("Unable to query DB for battle information!");
	if (mysql_numrows($result)<1)  {
		$Player[1]->Battle = 0; //There is no real battle going		
		//Finish();
	}
	else { //Get battle info.
		$Player[1]->CID = mysql_result($result,0,"curid"); //attacker is player 1.
		$Player[2]->CID = mysql_result($result,0,"defid"); //defender is player 2.
		//echo "Player1 CID: ".$Player[1]->CID.", Player2 CID:".$Player[2]->CID;
		$Player[1]->Battle = $Player[2]->Battle = mysql_result($result,0,"id"); //save battle info.
		$Player[1]->Round = $Player[2]->Round = mysql_result($result,0,"round");
		if (debug) echo "Found a Battle, enemy primed, we're on round ".$Player[1]->Round."<br>";
	}
		if ($Player[1]->Battle) AddMessage(1,"Battle");
	else AddMessage(0,"Battle");
}


function CheckReadyStatus() { //Checks if both players are ready to fight.
	global $Skill, $Player, $CurPlayer, $DefPlayer, $CurMob, $DefMob, $CurSkill, $DefSkill;
	global $dbip, $dbname, $dbpass, $dbprefix, $dbuser;			
 	global $uid, $MyCID;	
 	$BothReady = 0;

	for ($x = 1; $x < 3; $x++) {
		if (!$Player[$x]->NextMove && $Player[$x]->UID == $_SESSION['uid'] && isset($_GET['move'])) {
			if ($_GET['move'] == 1) $Player[$x]->NextMove = 1;
			if ($_GET['move'] == 2) $Player[$x]->NextMove = 2;
			if ($_GET['move'] == 3) $Player[$x]->NextMove = 3;
			if ($_GET['move'] == 4) $Player[$x]->NextMove = 4;			
			SaveGame();		
		}
		//echo $Player[$x]->NextMove;
		if (!$Player[$x]->Type && !$Player[$x]->NextMove) { //Move not set.
			if ($Player[$x]->UID == $_SESSION['uid']) { //We haven't given move yet.
				DisplayActions();
				Finish();
			} else $BothReady += $x;
		}
	}
	if ($BothReady) { AddMessage("Waiting on $BothReady turn."); DisplayActions(); Finish(); }
}

function Finish() {	//complete xml send.
	global $Skill, $Player, $CurPlayer, $DefPlayer, $CurMob, $DefMob, $CurSkill, $DefSkill;
	global $dbip, $dbname, $dbpass, $dbprefix, $dbuser;			
 	global $uid, $MyCID;		
 	global $MonsterTemplate;
	global $Elements, $Messages, $Delays;
 	echo "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n";
 	echo "<Events>\n"; 	
	echo "<Login>1</Login>\n"; 	
	echo "<PlayerName>".$Player[1]->Name."</PlayerName>\n";	
	echo "<PlayerType>".$Player[1]->Type."</PlayerType>\n";
	echo "<PlayerFightingMob>".$Player[1]->FightingMob."</PlayerFightingMob>\n";	
	echo "<EnemyName>".$Player[2]->Name."</EnemyName>\n";
	echo "<EnemyType>".$Player[2]->Type."</EnemyType>\n";
	for ($x = 0; $x < sizeof($Messages); $x++)
		echo "<".$Elements[$x].(($Delays[$x] > 0) ? " delay=\"".$Delays[$x]."\"" : "").">".$Messages[$x]."</".$Elements[$x].">\n";
	for ($x = 1; $x < (sizeof($Player[1]->Mob)+1); $x++)
	{
		echo "<PlayerPet$x>".$Player[1]->Mob[$x]->Name."</PlayerPet$x>\n";
		echo "<PlayerPetID$x>".$MonsterTemplate[$Player[1]->Mob[$x]->ID]->DexNumber."</PlayerPetID$x>\n";
		echo "<PlayerPetHP$x>".floor(($Player[1]->Mob[$x]->BuffStats->CurHP / $Player[1]->Mob[$x]->BuffStats->MaxHP)*100)."</PlayerPetHP$x>\n";
		echo "<PlayerPetLvl$x>".$Player[1]->Mob[$x]->Level."</PlayerPetLvl$x>\n";
	}
	$x = $Player[2]->FightingMob; //Only display enemy's fighting mob
		if ($x < (sizeof($Player[2]->Mob)+1)) {
			echo "<EnemyPet$x>".$Player[2]->Mob[$x]->Name."</EnemyPet$x>\n";
			echo "<EnemyPetID$x>".$MonsterTemplate[$Player[2]->Mob[$x]->ID]->DexNumber."</EnemyPetID$x>\n";
			echo "<EnemyPetHP$x>".floor(($Player[2]->Mob[$x]->BuffStats->CurHP / $Player[2]->Mob[$x]->BuffStats->MaxHP)*100)."</EnemyPetHP$x>\n";
			echo "<EnemyPetLvl$x>".$Player[2]->Mob[$x]->Level."</EnemyPetLvl$x>\n";
		}
		//echo "<".$Elements[$x]." id=\"".$Delays[$x]."\">".$Messages[$x]."</".$Elements[$x].">\n";
	echo "</Events>\n";		
	exit();	
}
