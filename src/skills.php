<?php

if ( !defined('pokemon') ) exit(); //This can only be included after an initial call.

/**
 *Skill Lists contain properties about what each skill does
*/

class SkillList {

	public $ID = 0; //This is used when $CurSkill is obtained, otherwise $Skill[ID]-> will not call ID.

	public $Name;
	public $Desc;
	public $Type1; //Element Type

        public $Type2; //Attack Type

	public $PP;
	public $Style = 0; //Style of Attack, MV_PREPARE require prepare time.

	public $Power;
	public $Accuracy;		

}


function ConvertMachineID($ItemID) { //Converts a TM to a skill.
	if ($ItemID = IT_TM01) return SK_MEGAPUNCH;
	if ($ItemID = IT_TM02) return SK_RAZORWIND;
	if ($ItemID = IT_TM03) return SK_SWORDSDANCE;
	if ($ItemID = IT_TM04) return SK_WHIRLWIND;
	if ($ItemID = IT_TM05) return SK_MEGAKICK;
	if ($ItemID = IT_TM06) return SK_TOXIC;
	if ($ItemID = IT_TM07) return SK_HORNDRILL;
	if ($ItemID = IT_TM08) return SK_BODYSLAM;
	if ($ItemID = IT_TM09) return SK_TAKEDOWN;
	if ($ItemID = IT_TM10) return SK_DOUBLEEDGE;
	if ($ItemID = IT_TM11) return SK_BUBBLEBEAM;
	if ($ItemID = IT_TM12) return SK_WATERGUN;
	if ($ItemID = IT_TM13) return SK_ICEBEAM;
	if ($ItemID = IT_TM14) return SK_BLIZZARD;
	if ($ItemID = IT_TM15) return SK_HYPERBEAM;
	if ($ItemID = IT_TM16) return SK_PAYDAY;
	if ($ItemID = IT_TM17) return SK_SUBMISSION;
	if ($ItemID = IT_TM18) return SK_COUNTER;
	if ($ItemID = IT_TM19) return SK_SEISMICTOSS;
	if ($ItemID = IT_TM20) return SK_RAGE;
	if ($ItemID = IT_TM21) return SK_MEGADRAIN;
	if ($ItemID = IT_TM22) return SK_SOLARBEAM;
	if ($ItemID = IT_TM23) return SK_DRAGONRAGE;
	if ($ItemID = IT_TM24) return SK_THUNDERBOLT;
	if ($ItemID = IT_TM25) return SK_THUNDER;
	if ($ItemID = IT_TM26) return SK_EARTHQUAKE;
	if ($ItemID = IT_TM27) return SK_FISSURE;
	if ($ItemID = IT_TM28) return SK_DIG;
	if ($ItemID = IT_TM29) return SK_PSYCHIC;
	if ($ItemID = IT_TM30) return SK_TELEPORT;
	if ($ItemID = IT_TM31) return SK_MIMIC;
	if ($ItemID = IT_TM32) return SK_DOUBLETEAM;
	if ($ItemID = IT_TM33) return SK_REFLECT;
	if ($ItemID = IT_TM34) return SK_BIDE;
	if ($ItemID = IT_TM35) return SK_METRONOME;
	if ($ItemID = IT_TM36) return SK_SELFDESTRUCT;
	if ($ItemID = IT_TM37) return SK_EGGBOMB;
	if ($ItemID = IT_TM38) return SK_FIREBLAST;
	if ($ItemID = IT_TM39) return SK_SWIFT;
	if ($ItemID = IT_TM40) return SK_SKULLBASH;
	if ($ItemID = IT_TM41) return SK_SOFTBOILED;
	if ($ItemID = IT_TM42) return SK_DREAMEATER;
	if ($ItemID = IT_TM43) return SK_SKYATTACK;
	if ($ItemID = IT_TM44) return SK_REST;
	if ($ItemID = IT_TM45) return SK_THUNDERWAVE;
	if ($ItemID = IT_TM46) return SK_PSYWAVE;
	if ($ItemID = IT_TM47) return SK_EXPLOSION;
	if ($ItemID = IT_TM48) return SK_ROCKSLIDE;
	if ($ItemID = IT_TM49) return SK_TRIATTACK;
	if ($ItemID = IT_TM50) return SK_SUBSTITUTE;
	if ($ItemID = IT_TM50) return SK_SUBSTITUTE;
	if ($ItemID = IT_HM01) return SK_CUT;
	if ($ItemID = IT_HM02) return SK_FLY;
	if ($ItemID = IT_HM03) return SK_SURF;
	if ($ItemID = IT_HM04) return SK_STRENGTH;
	if ($ItemID = IT_HM05) return SK_FLASH;
}

function CanLearnMachine($CurPokemon, $CurMachine) {
	if ($CurMachine == IT_HM01 && in_array($CurPokemon, array(PK_BULBASAUR,PK_IVYSAUR,PK_VENUSAUR,PK_CHARMANDER,PK_CHARMELEON,PK_CHARIZARD,PK_BEEDRILL,PK_SANDSHREW,PK_SANDSLASH,PK_ODDISH,PK_GLOOM,PK_VILEPLUME,PK_PARAS,PK_PARASECT,PK_BELLSPROUT,PK_WEEPINBELL,PK_VICTREEBEL,PK_TENTACOOL,PK_TENTACRUEL,PK_FARFETCHD,PK_KRABBY,PK_KINGLER,PK_LICKITUNG,PK_TANGELA,PK_SCYTHER,PK_PINSIR,PK_MEW))) return 1; //CUT
	if ($CurMachine == IT_HM02 && in_array($CurPokemon, array(PK_CHARIZARD,PK_PIDGEY,PK_PIDGEOTTO,PK_PIDGEOT,PK_SPEAROW,PK_FEAROW,PK_FARFETCHD,PK_DODUO,PK_DODRIO,PK_AERODACTYL,PK_ARTICUNO,PK_ZAPDOS,PK_MOLTRES,PK_MEW))) return 1; //FLY
	if ($CurMachine == IT_HM03 && in_array($CurPokemon, array(PK_SQUIRTLE,PK_WARTORTLE,PK_BLASTOISE,PK_NIDOQUEEN,PK_NIDOKING,PK_POLIWAG,PK_POLIWHIRL,PK_POLIWRATH,PK_SLOWPOKE,PK_SLOWBRO,PK_SEEL,PK_DEWGONG,PK_SHELLDER,PK_CLOYSTER,PK_KRABBY,PK_KINGLER,PK_LICKITUNG,PK_RHYDON,PK_KANGASKHAN,PK_HORSEA,PK_SEADRA,PK_GOLDEEN,PK_SEAKING,PK_STARYU,PK_STARMIE,PK_GYRADOS,PK_LAPRAS,PK_VAPOREAN,PK_OMANYTE,PK_OMASTAR,PK_KABUTO,PK_KABUTOPS,PK_SNORLAX,PK_DRATINI,PK_DRAGONAIR,PK_DRAGONITE,PK_MEW))) return 1; //SURF
	if ($CurMachine == IT_HM04 && in_array($CurPokemon, array(PK_CHARMANDER,PK_CHARMELEON,PK_CHARIZARD,PK_SQUIRTLE,PK_WARTORTLE,PK_BLASTOISE,PK_BUTTERFREE,PK_EKANS,PK_ARBOK,PK_SANDSHREW,PK_SANDSLASH,PK_NIDOQUEEN,PK_NIDOKING,PK_CLEFAIRY,PK_CLEFABLE,PK_JIGGLYPUFF,PK_WIGGLYTUFF,PK_PSYDUCK,PK_GOLDUCK,PK_MANKEY,PK_PRIMEAPE,PK_POLIWHIRL,PK_POLIWRATH,PK_MACHOP,PK_MACHOKE,PK_MACHMP,PK_GEODUDE,PK_GRAVELER,PK_GOLEM,PK_SLOWPOKE,PK_SLOWBRO,PK_SEEL,PK_DEWGONG,PK_GENGAR,PK_ONIX,PK_KRABBY,PK_KINGLER,PK_EXEGGUTOR,PK_CUBONE,PK_MAROWAK,PK_HITMONLEE,PK_HITMONCHAN,PK_LICKITUNG,PK_RHYHORN,PK_RHYDON, PK_CHANSEY,PK_KANGASKHAN,PK_ELECTRABUZZ,PK_MAGMAR,PK_PINSIR,PK_TAUROS, PK_GYRADOS, PK_LAPRAS, PK_SNORLAX, PK_DRAGONITE, PK_MEWTWO, PK_MEW))) return 1; //STRENGTH
	if ($CurMachine == IT_HM01 && in_array($CurPokemon, array(PK_PIKACHU,PK_RAICHU,PK_CLEFAIRY,PK_CLEFABLE,PK_JIGGLYPUFF,PK_WIGGLYTUFF,PK_PSYDUCK,PK_GOLDUCK,PK_ABRA,PK_KADABRA,PK_ALAKHAZAM,PK_SLOWPOKE,PK_SLOWBRO,PK_MAGMEMITE,PK_MAGNETON,PK_DROWZEE,PK_HYPNO,PK_VOLTROB,PK_ELECTRODE,PK_CHANSEY,PK_STARYU,PK_STARMIE,PK_MRMIME,PK_ELECTRABUZZ,PK_JOLTEON,PORYGON,ZAPDOS,MEWTWO,MEW))) return 1; //FLASH
}
/**
*-------------------------------------------- SKILL SETS ------------------------------------------------------------------------------------------------------------------------------*
*/





$Skill[SK_NULL] = new SkillList;
$Skill[SK_NULL]->Name = '???';
$Skill[SK_NULL]->Desc = 'UNKNOWN';
$Skill[SK_NULL]->Type1 = ET_GRASS;
$Skill[SK_NULL]->Type2 = ATK_NORMAL;
$Skill[SK_NULL]->PP = 0;
$Skill[SK_NULL]->Power = '0';
$Skill[SK_NULL]->Accuracy = '100';


$Skill[SK_ABSORB] = new SkillList;
$Skill[SK_ABSORB]->Name = 'Absorb';
$Skill[SK_ABSORB]->Desc = 'Restores the user\'s HP by 1/2 of the damage inflicted on the target.';
$Skill[SK_ABSORB]->Type1 = ET_GRASS;
$Skill[SK_ABSORB]->Type2 = ATK_SPECIAL;
$Skill[SK_ABSORB]->PP = 20;
$Skill[SK_ABSORB]->Power = '20';
$Skill[SK_ABSORB]->Accuracy = '100';


$Skill[SK_ACID] = new SkillList;
$Skill[SK_ACID]->Name = 'Acid';
$Skill[SK_ACID]->Desc = 'Has a ~10% chance to lower the target\'s Defense by 1 stage.';
$Skill[SK_ACID]->Type1 = ET_POISON;
$Skill[SK_ACID]->Type2 = ATK_SPECIAL;
$Skill[SK_ACID]->PP = 30;
$Skill[SK_ACID]->Power = '40';
$Skill[SK_ACID]->Accuracy = '100';


$Skill[SK_ACIDARMOR] = new SkillList;
$Skill[SK_ACIDARMOR]->Name = 'Acid Armor';
$Skill[SK_ACIDARMOR]->Desc = 'Raises the user\'s Defense by 2 stages.';
$Skill[SK_ACIDARMOR]->Type1 = ET_POISON;
$Skill[SK_ACIDARMOR]->Type2 = ATK_STATUS;
$Skill[SK_ACIDARMOR]->PP = 40;
$Skill[SK_ACIDARMOR]->Power = '-1';
$Skill[SK_ACIDARMOR]->Accuracy = 'N/A';


$Skill[SK_AGILITY] = new SkillList;
$Skill[SK_AGILITY]->Name = 'Agility';
$Skill[SK_AGILITY]->Desc = 'Raises the user\'s Speed by 2 stages.';
$Skill[SK_AGILITY]->Type1 = ET_PSYCHIC;
$Skill[SK_AGILITY]->Type2 = ATK_STATUS;
$Skill[SK_AGILITY]->PP = 30;
$Skill[SK_AGILITY]->Power = '-1';
$Skill[SK_AGILITY]->Accuracy = 'N/A';


$Skill[SK_AMNESIA] = new SkillList;
$Skill[SK_AMNESIA]->Name = 'Amnesia';
$Skill[SK_AMNESIA]->Desc = 'Raises the user\'s Special by 2 stages.';
$Skill[SK_AMNESIA]->Type1 = ET_PSYCHIC;
$Skill[SK_AMNESIA]->PP = 20;
$Skill[SK_AMNESIA]->Power = '-1';
$Skill[SK_AMNESIA]->Accuracy = 'N/A';


$Skill[SK_AURORABEAM] = new SkillList;
$Skill[SK_AURORABEAM]->Name = 'Aurora Beam';
$Skill[SK_AURORABEAM]->Desc = 'Has a ~10% chance to lower the target\'s Attack by 1 stage.';
$Skill[SK_AURORABEAM]->Type1 = ET_ICE;
$Skill[SK_AURORABEAM]->PP = 20;
$Skill[SK_AURORABEAM]->Power = '65';
$Skill[SK_AURORABEAM]->Accuracy = '100';


$Skill[SK_BARRAGE] = new SkillList;
$Skill[SK_BARRAGE]->Name = 'Barrage';
$Skill[SK_BARRAGE]->Desc = 'Attacks 2-5 times in one turn;
if one of these attacks breaks a target\'s Substitute, the target will take damage for the rest of the hits. This move has a 3/8 chance to hit twice, a 3/8 chance to hit three times, a 1/8 chance to hit four times and a 1/8 chance to hit five times.';
$Skill[SK_BARRAGE]->Type1 = ET_NORMAL;
$Skill[SK_BARRAGE]->PP = 20;
$Skill[SK_BARRAGE]->Power = '15';
$Skill[SK_BARRAGE]->Accuracy = '85';


$Skill[SK_BARRIER] = new SkillList;
$Skill[SK_BARRIER]->Name = 'Barrier';
$Skill[SK_BARRIER]->Desc = 'Raises the user\'s Defense by 2 stages.';
$Skill[SK_BARRIER]->Type1 = ET_PSYCHIC;
$Skill[SK_BARRIER]->PP = 30;
$Skill[SK_BARRIER]->Power = '-1';
$Skill[SK_BARRIER]->Accuracy = 'N/A';


$Skill[SK_BIDE] = new SkillList;
$Skill[SK_BIDE]->Name = 'Bide';
$Skill[SK_BIDE]->Desc = 'The user absorbs all damage for 2-3 turns and then inflicts twice the absorbed damage on its target. This move ignores the target\'s type but still cannot hit Ghost-type Pokemon.';
$Skill[SK_BIDE]->Type1 = ET_NORMAL;
$Skill[SK_BIDE]->PP = 10;
$Skill[SK_BIDE]->Power = '-2';
$Skill[SK_BIDE]->Accuracy = '100';


$Skill[SK_BIND] = new SkillList;
$Skill[SK_BIND]->Name = 'Bind';
$Skill[SK_BIND]->Desc = 'The user becomes uncontrollable and attacks for 2-5 consecutive turns;
the target cannot make attacks of its own during this time, but it may switch out, use items or run away.';
$Skill[SK_BIND]->Type1 = ET_NORMAL;
$Skill[SK_BIND]->PP = 20;
$Skill[SK_BIND]->Power = '15';
$Skill[SK_BIND]->Accuracy = '75';


$Skill[SK_BITE] = new SkillList;
$Skill[SK_BITE]->Name = 'Bite';
$Skill[SK_BITE]->Desc = 'Has a ~10% chance to make the target flinch.';
$Skill[SK_BITE]->Type1 = ET_NORMAL;
$Skill[SK_BITE]->PP = 25;
$Skill[SK_BITE]->Power = '60';
$Skill[SK_BITE]->Accuracy = '100';


$Skill[SK_BLIZZARD] = new SkillList;
$Skill[SK_BLIZZARD]->Name = 'Blizzard';
$Skill[SK_BLIZZARD]->Desc = 'Has a ~10% chance to freeze the target.';
$Skill[SK_BLIZZARD]->Type1 = ET_ICE;
$Skill[SK_BLIZZARD]->PP = 5;
$Skill[SK_BLIZZARD]->Power = '120';
$Skill[SK_BLIZZARD]->Accuracy = '90';


$Skill[SK_BODYSLAM] = new SkillList;
$Skill[SK_BODYSLAM]->Name = 'Body Slam';
$Skill[SK_BODYSLAM]->Desc = 'Has a ~30% chance to paralyze the target.';
$Skill[SK_BODYSLAM]->Type1 = ET_NORMAL;
$Skill[SK_BODYSLAM]->PP = 15;
$Skill[SK_BODYSLAM]->Power = '85';
$Skill[SK_BODYSLAM]->Accuracy = '100';


$Skill[SK_BONECLUB] = new SkillList;
$Skill[SK_BONECLUB]->Name = 'Bone Club';
$Skill[SK_BONECLUB]->Desc = 'Has a ~10% chance to make the target flinch.';
$Skill[SK_BONECLUB]->Type1 = ET_GROUND;
$Skill[SK_BONECLUB]->PP = 20;
$Skill[SK_BONECLUB]->Power = '65';
$Skill[SK_BONECLUB]->Accuracy = '85';


$Skill[SK_BONEMERANG] = new SkillList;
$Skill[SK_BONEMERANG]->Name = 'Bonemerang';
$Skill[SK_BONEMERANG]->Desc = 'Strikes twice;
if the first hit breaks the target\'s Substitute, the real Pokemon will take damage from the second hit.';
$Skill[SK_BONEMERANG]->Type1 = ET_GROUND;
$Skill[SK_BONEMERANG]->PP = 10;
$Skill[SK_BONEMERANG]->Power = '50';
$Skill[SK_BONEMERANG]->Accuracy = '90';


$Skill[SK_BUBBLE] = new SkillList;
$Skill[SK_BUBBLE]->Name = 'Bubble';
$Skill[SK_BUBBLE]->Desc = 'Has a ~10% chance to lower the target\'s Speed by 1 stage.';
$Skill[SK_BUBBLE]->Type1 = ET_WATER;
$Skill[SK_BUBBLE]->PP = 30;
$Skill[SK_BUBBLE]->Power = '20';
$Skill[SK_BUBBLE]->Accuracy = '100';


$Skill[SK_BUBBLEBEAM] = new SkillList;
$Skill[SK_BUBBLEBEAM]->Name = 'Bubblebeam';
$Skill[SK_BUBBLEBEAM]->Desc = 'Has a ~10% chance to lower the target\'s Speed by 1 stage.';
$Skill[SK_BUBBLEBEAM]->Type1 = ET_WATER;
$Skill[SK_BUBBLEBEAM]->PP = 20;
$Skill[SK_BUBBLEBEAM]->Power = '65';
$Skill[SK_BUBBLEBEAM]->Accuracy = '100';


$Skill[SK_CLAMP] = new SkillList;
$Skill[SK_CLAMP]->Name = 'Clamp';
$Skill[SK_CLAMP]->Desc = 'The user becomes uncontrollable and attacks for 2-5 consecutive turns;
the target cannot make attacks of its own during this time, but it may switch out, use items or run away.';
$Skill[SK_CLAMP]->Type1 = ET_WATER;
$Skill[SK_CLAMP]->PP = 10;
$Skill[SK_CLAMP]->Power = '35';
$Skill[SK_CLAMP]->Accuracy = '75';


$Skill[SK_COMETPUNCH] = new SkillList;
$Skill[SK_COMETPUNCH]->Name = 'Comet Punch';
$Skill[SK_COMETPUNCH]->Desc = 'Attacks 2-5 times in one turn;
if one of these attacks breaks a target\'s Substitute, the target will take damage for the rest of the hits. This move has a 3/8 chance to hit twice, a 3/8 chance to hit three times, a 1/8 chance to hit four times and a 1/8 chance to hit five times.';
$Skill[SK_COMETPUNCH]->Type1 = ET_NORMAL;
$Skill[SK_COMETPUNCH]->PP = 15;
$Skill[SK_COMETPUNCH]->Power = '18';
$Skill[SK_COMETPUNCH]->Accuracy = '85';


$Skill[SK_CONFUSERAY] = new SkillList;
$Skill[SK_CONFUSERAY]->Name = 'Confuse Ray';
$Skill[SK_CONFUSERAY]->Desc = 'Confuses the target.';
$Skill[SK_CONFUSERAY]->Type1 = ET_GHOST;
$Skill[SK_CONFUSERAY]->PP = 10;
$Skill[SK_CONFUSERAY]->Power = '-1';
$Skill[SK_CONFUSERAY]->Accuracy = '100';


$Skill[SK_CONFUSION] = new SkillList;
$Skill[SK_CONFUSION]->Name = 'Confusion';
$Skill[SK_CONFUSION]->Desc = 'Has a ~10% chance to confuse the target.';
$Skill[SK_CONFUSION]->Type1 = ET_PSYCHIC;
$Skill[SK_CONFUSION]->PP = 25;
$Skill[SK_CONFUSION]->Power = '50';
$Skill[SK_CONFUSION]->Accuracy = '100';


$Skill[SK_CONSTRICT] = new SkillList;
$Skill[SK_CONSTRICT]->Name = 'Constrict';
$Skill[SK_CONSTRICT]->Desc = 'Has a ~10% chance to lower the target\'s Speed by 1 stage.';
$Skill[SK_CONSTRICT]->Type1 = ET_NORMAL;
$Skill[SK_CONSTRICT]->PP = 35;
$Skill[SK_CONSTRICT]->Power = '10';
$Skill[SK_CONSTRICT]->Accuracy = '100';


$Skill[SK_CONVERSION] = new SkillList;
$Skill[SK_CONVERSION]->Name = 'Conversion';
$Skill[SK_CONVERSION]->Desc = 'The user\'s type changes to match the type of one of its four attacks. This move fails if the user cannot change its type under this condition.';
$Skill[SK_CONVERSION]->Type1 = ET_NORMAL;
$Skill[SK_CONVERSION]->PP = 30;
$Skill[SK_CONVERSION]->Power = '-1';
$Skill[SK_CONVERSION]->Accuracy = 'N/A';


$Skill[SK_COUNTER] = new SkillList;
$Skill[SK_COUNTER]->Name = 'Counter';
$Skill[SK_COUNTER]->Desc = 'Almost always goes last;
if an opponent strikes with a Normal- or Fighting-type attack before the user\'s turn, the user retaliates for twice the damage it had endured.';
$Skill[SK_COUNTER]->Type1 = ET_FLYING;
$Skill[SK_COUNTER]->PP = 20;
$Skill[SK_COUNTER]->Power = '-2';
$Skill[SK_COUNTER]->Accuracy = '100';


$Skill[SK_CRABHAMMER] = new SkillList;
$Skill[SK_CRABHAMMER]->Name = 'Crabhammer';
$Skill[SK_CRABHAMMER]->Desc = 'Has a high critical hit ratio.';
$Skill[SK_CRABHAMMER]->Type1 = ET_WATER;
$Skill[SK_CRABHAMMER]->PP = 10;
$Skill[SK_CRABHAMMER]->Power = '90';
$Skill[SK_CRABHAMMER]->Accuracy = '85';


$Skill[SK_CUT] = new SkillList;
$Skill[SK_CUT]->Name = 'Cut';
$Skill[SK_CUT]->Desc = 'Damages the target.';
$Skill[SK_CUT]->Type1 = ET_NORMAL;
$Skill[SK_CUT]->PP = 30;
$Skill[SK_CUT]->Power = '50';
$Skill[SK_CUT]->Accuracy = '95';


$Skill[SK_DEFENSECURL] = new SkillList;
$Skill[SK_DEFENSECURL]->Name = 'Defense Curl';
$Skill[SK_DEFENSECURL]->Desc = 'Raises the user\'s Defense by 1 stage.';
$Skill[SK_DEFENSECURL]->Type1 = ET_NORMAL;
$Skill[SK_DEFENSECURL]->PP = 40;
$Skill[SK_DEFENSECURL]->Power = '-1';
$Skill[SK_DEFENSECURL]->Accuracy = 'N/A';


$Skill[SK_DIG] = new SkillList;
$Skill[SK_DIG]->Name = 'Dig';
$Skill[SK_DIG]->Desc = 'On the first turn, the user digs underground, becoming uncontrollable, and evades all attacks. Swift may still hit a Pokemon underground. On the second turn, the user attacks.';
$Skill[SK_DIG]->Type1 = ET_GROUND;
$Skill[SK_DIG]->PP = 10;
$Skill[SK_DIG]->Power = '100';
$Skill[SK_DIG]->Accuracy = '100';


$Skill[SK_DISABLE] = new SkillList;
$Skill[SK_DISABLE]->Name = 'Disable';
$Skill[SK_DISABLE]->Desc = 'One randomly selected move of the target\'s cannot be selected for 1-7 turns. Disable only works on one move at a time. The target does nothing if it is about to use a move that becomes disabled.';
$Skill[SK_DISABLE]->Type1 = ET_NORMAL;
$Skill[SK_DISABLE]->PP = 20;
$Skill[SK_DISABLE]->Power = '-1';
$Skill[SK_DISABLE]->Accuracy = '55';


$Skill[SK_DIZZYPUNCH] = new SkillList;
$Skill[SK_DIZZYPUNCH]->Name = 'Dizzy Punch';
$Skill[SK_DIZZYPUNCH]->Desc = 'Damages the target.';
$Skill[SK_DIZZYPUNCH]->Type1 = ET_NORMAL;
$Skill[SK_DIZZYPUNCH]->PP = 10;
$Skill[SK_DIZZYPUNCH]->Power = '70';
$Skill[SK_DIZZYPUNCH]->Accuracy = '100';


$Skill[SK_DOUBLEKICK] = new SkillList;
$Skill[SK_DOUBLEKICK]->Name = 'Double Kick';
$Skill[SK_DOUBLEKICK]->Desc = 'Strikes twice;
if the first hit breaks the target\'s Substitute, the real Pokemon will take damage from the second hit.';
$Skill[SK_DOUBLEKICK]->Type1 = ET_FLYING;
$Skill[SK_DOUBLEKICK]->PP = 30;
$Skill[SK_DOUBLEKICK]->Power = '30';
$Skill[SK_DOUBLEKICK]->Accuracy = '100';


$Skill[SK_DOUBLETEAM] = new SkillList;
$Skill[SK_DOUBLETEAM]->Name = 'Double Team';
$Skill[SK_DOUBLETEAM]->Desc = 'Raises the user\'s Evasion by 1 stage.';
$Skill[SK_DOUBLETEAM]->Type1 = ET_NORMAL;
$Skill[SK_DOUBLETEAM]->PP = 15;
$Skill[SK_DOUBLETEAM]->Power = '-1';
$Skill[SK_DOUBLETEAM]->Accuracy = 'N/A';


$Skill[SK_DOUBLEEDGE] = new SkillList;
$Skill[SK_DOUBLEEDGE]->Name = 'Double-edge';
$Skill[SK_DOUBLEEDGE]->Desc = 'The user receives 1/4 recoil damage.';
$Skill[SK_DOUBLEEDGE]->Type1 = ET_NORMAL;
$Skill[SK_DOUBLEEDGE]->PP = 15;
$Skill[SK_DOUBLEEDGE]->Power = '100';
$Skill[SK_DOUBLEEDGE]->Accuracy = '100';


$Skill[SK_DOUBLESLAP] = new SkillList;
$Skill[SK_DOUBLESLAP]->Name = 'Doubleslap';
$Skill[SK_DOUBLESLAP]->Desc = 'Attacks 2-5 times in one turn;
if one of these attacks breaks a target\'s Substitute, the target will take damage for the rest of the hits. This move has a 3/8 chance to hit twice, a 3/8 chance to hit three times, a 1/8 chance to hit four times and a 1/8 chance to hit five times.';
$Skill[SK_DOUBLESLAP]->Type1 = ET_NORMAL;
$Skill[SK_DOUBLESLAP]->PP = 10;
$Skill[SK_DOUBLESLAP]->Power = '15';
$Skill[SK_DOUBLESLAP]->Accuracy = '85';


$Skill[SK_DRAGONRAGE] = new SkillList;
$Skill[SK_DRAGONRAGE]->Name = 'Dragon Rage';
$Skill[SK_DRAGONRAGE]->Desc = 'Always deals 40 points of damage.';
$Skill[SK_DRAGONRAGE]->Type1 = ET_DRAGON;
$Skill[SK_DRAGONRAGE]->PP = 10;
$Skill[SK_DRAGONRAGE]->Power = 'Set';
$Skill[SK_DRAGONRAGE]->Accuracy = '100';


$Skill[SK_DREAMEATER] = new SkillList;
$Skill[SK_DREAMEATER]->Name = 'Dream Eater';
$Skill[SK_DREAMEATER]->Desc = 'Restores the user\'s HP by 1/2 of the damage inflicted on the target but only works on a sleeping target.';
$Skill[SK_DREAMEATER]->Type1 = ET_PSYCHIC;
$Skill[SK_DREAMEATER]->PP = 15;
$Skill[SK_DREAMEATER]->Power = '100';
$Skill[SK_DREAMEATER]->Accuracy = '100';


$Skill[SK_DRILLPECK] = new SkillList;
$Skill[SK_DRILLPECK]->Name = 'Drill Peck';
$Skill[SK_DRILLPECK]->Desc = 'Damages the target.';
$Skill[SK_DRILLPECK]->Type1 = ET_FLYING;
$Skill[SK_DRILLPECK]->PP = 20;
$Skill[SK_DRILLPECK]->Power = '80';
$Skill[SK_DRILLPECK]->Accuracy = '100';


$Skill[SK_EARTHQUAKE] = new SkillList;
$Skill[SK_EARTHQUAKE]->Name = 'Earthquake';
$Skill[SK_EARTHQUAKE]->Desc = 'Damages the target.';
$Skill[SK_EARTHQUAKE]->Type1 = ET_GROUND;
$Skill[SK_EARTHQUAKE]->PP = 10;
$Skill[SK_EARTHQUAKE]->Power = '100';
$Skill[SK_EARTHQUAKE]->Accuracy = '100';


$Skill[SK_EGGBOMB] = new SkillList;
$Skill[SK_EGGBOMB]->Name = 'Egg Bomb';
$Skill[SK_EGGBOMB]->Desc = 'Damages the target.';
$Skill[SK_EGGBOMB]->Type1 = ET_NORMAL;
$Skill[SK_EGGBOMB]->PP = 10;
$Skill[SK_EGGBOMB]->Power = '100';
$Skill[SK_EGGBOMB]->Accuracy = '75';
//Added

$Skill[SK_EMBER] = new SkillList;
$Skill[SK_EMBER]->Name = 'Ember';
$Skill[SK_EMBER]->Desc = 'Has a ~10% chance to burn the target.';
$Skill[SK_EMBER]->Type1 = ET_FIRE;
$Skill[SK_EMBER]->Type2 = ATK_SPECIAL;
$Skill[SK_EMBER]->PP = 25;
$Skill[SK_EMBER]->Power = '40';
$Skill[SK_EMBER]->Accuracy = '100';


$Skill[SK_EXPLOSION] = new SkillList;
$Skill[SK_EXPLOSION]->Name = 'Explosion';
$Skill[SK_EXPLOSION]->Desc = 'The Defense stat of other Pokemon is halved against this attack, essentially doubling the move\'s base power;
causes the user to faint.';
$Skill[SK_EXPLOSION]->Type1 = ET_NORMAL;
$Skill[SK_EXPLOSION]->PP = 5;
$Skill[SK_EXPLOSION]->Power = '170';
$Skill[SK_EXPLOSION]->Accuracy = '100';


$Skill[SK_FIREBLAST] = new SkillList;
$Skill[SK_FIREBLAST]->Name = 'Fire Blast';
$Skill[SK_FIREBLAST]->Desc = 'Has a ~30% chance to burn the target.';
$Skill[SK_FIREBLAST]->Type1 = ET_FIRE;
$Skill[SK_FIREBLAST]->PP = 5;
$Skill[SK_FIREBLAST]->Power = '120';
$Skill[SK_FIREBLAST]->Accuracy = '85';


$Skill[SK_FIREPUNCH] = new SkillList;
$Skill[SK_FIREPUNCH]->Name = 'Fire Punch';
$Skill[SK_FIREPUNCH]->Desc = 'Has a ~10% chance to burn the target.';
$Skill[SK_FIREPUNCH]->Type1 = ET_FIRE;
$Skill[SK_FIREPUNCH]->PP = 15;
$Skill[SK_FIREPUNCH]->Power = '75';
$Skill[SK_FIREPUNCH]->Accuracy = '100';


$Skill[SK_FIRESPIN] = new SkillList;
$Skill[SK_FIRESPIN]->Name = 'Fire Spin';
$Skill[SK_FIRESPIN]->Desc = 'The user becomes uncontrollable and attacks for 2-5 consecutive turns;
the target cannot make attacks of its own during this time, but it may switch out, use items or run away.';
$Skill[SK_FIRESPIN]->Type1 = ET_FIRE;
$Skill[SK_FIRESPIN]->PP = 15;
$Skill[SK_FIRESPIN]->Power = '15';
$Skill[SK_FIRESPIN]->Accuracy = '70';


$Skill[SK_FISSURE] = new SkillList;
$Skill[SK_FISSURE]->Name = 'Fissure';
$Skill[SK_FISSURE]->Desc = 'The target faints;
doesn\'t work on faster or higher-leveled Pokemon.';
$Skill[SK_FISSURE]->Type1 = ET_GROUND;
$Skill[SK_FISSURE]->PP = 5;
$Skill[SK_FISSURE]->Power = 'KO';
$Skill[SK_FISSURE]->Accuracy = '30';


$Skill[SK_FLAMETHROWER] = new SkillList;
$Skill[SK_FLAMETHROWER]->Name = 'Flamethrower';
$Skill[SK_FLAMETHROWER]->Desc = 'Has a ~10% chance to burn the target.';
$Skill[SK_FLAMETHROWER]->Type1 = ET_FIRE;
$Skill[SK_FLAMETHROWER]->PP = 15;
$Skill[SK_FLAMETHROWER]->Power = '95';
$Skill[SK_FLAMETHROWER]->Accuracy = '100';


$Skill[SK_FLASH] = new SkillList;
$Skill[SK_FLASH]->Name = 'Flash';
$Skill[SK_FLASH]->Desc = 'Lowers the target\'s Accuracy by 1 stage.';
$Skill[SK_FLASH]->Type1 = ET_NORMAL;
$Skill[SK_FLASH]->PP = 20;
$Skill[SK_FLASH]->Power = '-1';
$Skill[SK_FLASH]->Accuracy = '70';


$Skill[SK_FLY] = new SkillList;
$Skill[SK_FLY]->Name = 'Fly';
$Skill[SK_FLY]->Desc = 'On the first turn, the user flies into the air, becoming uncontrollable, and evades most attacks. Swift may still hit a Pokemon in the air. On the second turn, the user attacks.';
$Skill[SK_FLY]->Type1 = ET_FLYING;
$Skill[SK_FLY]->PP = 15;
$Skill[SK_FLY]->Power = '70';
$Skill[SK_FLY]->Accuracy = '95';


$Skill[SK_FOCUSENERGY] = new SkillList;
$Skill[SK_FOCUSENERGY]->Name = 'Focus Energy';
$Skill[SK_FOCUSENERGY]->Desc = 'Decreases critical hit ratio in-game, but raises it in Pokemon Stadium.';
$Skill[SK_FOCUSENERGY]->Type1 = ET_NORMAL;
$Skill[SK_FOCUSENERGY]->PP = 30;
$Skill[SK_FOCUSENERGY]->Power = '-1';
$Skill[SK_FOCUSENERGY]->Accuracy = 'N/A';


$Skill[SK_FURYATTACK] = new SkillList;
$Skill[SK_FURYATTACK]->Name = 'Fury Attack';
$Skill[SK_FURYATTACK]->Desc = 'Attacks 2-5 times in one turn;
if one of these attacks breaks a target\'s Substitute, the target will take damage for the rest of the hits. This move has a 3/8 chance to hit twice, a 3/8 chance to hit three times, a 1/8 chance to hit four times and a 1/8 chance to hit five times.';
$Skill[SK_FURYATTACK]->Type1 = ET_NORMAL;
$Skill[SK_FURYATTACK]->PP = 20;
$Skill[SK_FURYATTACK]->Power = '15';
$Skill[SK_FURYATTACK]->Accuracy = '85';


$Skill[SK_FURYSWIPES] = new SkillList;
$Skill[SK_FURYSWIPES]->Name = 'Fury Swipes';
$Skill[SK_FURYSWIPES]->Desc = 'Attacks 2-5 times in one turn;
if one of these attacks breaks a target\'s Substitute, the target will take damage for the rest of the hits. This move has a 3/8 chance to hit twice, a 3/8 chance to hit three times, a 1/8 chance to hit four times and a 1/8 chance to hit five times.';
$Skill[SK_FURYSWIPES]->Type1 = ET_NORMAL;
$Skill[SK_FURYSWIPES]->PP = 15;
$Skill[SK_FURYSWIPES]->Power = '10';
$Skill[SK_FURYSWIPES]->Accuracy = '80';


$Skill[SK_GLARE] = new SkillList;
$Skill[SK_GLARE]->Name = 'Glare';
$Skill[SK_GLARE]->Desc = 'Paralyzes the target. This move works on Ghost-type Pokemon.';
$Skill[SK_GLARE]->Type1 = ET_NORMAL;
$Skill[SK_GLARE]->PP = 30;
$Skill[SK_GLARE]->Power = '-1';
$Skill[SK_GLARE]->Accuracy = '75';


//ADDED

$Skill[SK_GROWL] = new SkillList;
$Skill[SK_GROWL]->Name = 'Growl';
$Skill[SK_GROWL]->Desc = 'Lowers the target\'s Attack by 1 stage.';
$Skill[SK_GROWL]->Type1 = ET_NORMAL;
$Skill[SK_GROWL]->Type2 = ATK_STATUS;
$Skill[SK_GROWL]->PP = 40;
$Skill[SK_GROWL]->Power = '-1';
$Skill[SK_GROWL]->Accuracy = '100';
//ADDED

$Skill[SK_GROWTH] = new SkillList;
$Skill[SK_GROWTH]->Name = 'Growth';
$Skill[SK_GROWTH]->Desc = 'Raises the user\'s Special by 1 stage.';
$Skill[SK_GROWTH]->Type1 = ET_NORMAL;
$Skill[SK_GROWTH]->Type2 = ATK_STATUS;
$Skill[SK_GROWTH]->PP = 40;
$Skill[SK_GROWTH]->Power = '-1';
$Skill[SK_GROWTH]->Accuracy = 'N/A';


$Skill[SK_GUILLOTINE] = new SkillList;
$Skill[SK_GUILLOTINE]->Name = 'Guillotine';
$Skill[SK_GUILLOTINE]->Desc = 'The target faints;
doesn\'t work on faster or higher-leveled Pokemon.';
$Skill[SK_GUILLOTINE]->Type1 = ET_NORMAL;
$Skill[SK_GUILLOTINE]->PP = 5;
$Skill[SK_GUILLOTINE]->Power = 'KO';
$Skill[SK_GUILLOTINE]->Accuracy = '30';


$Skill[SK_GUST] = new SkillList;
$Skill[SK_GUST]->Name = 'Gust';
$Skill[SK_GUST]->Desc = 'Damages the target.';
$Skill[SK_GUST]->Type1 = ET_NORMAL;
$Skill[SK_GUST]->PP = 35;
$Skill[SK_GUST]->Power = '40';
$Skill[SK_GUST]->Accuracy = '100';


$Skill[SK_HARDEN] = new SkillList;
$Skill[SK_HARDEN]->Name = 'Harden';
$Skill[SK_HARDEN]->Desc = 'Raises the user\'s Defense by 1 stage.';
$Skill[SK_HARDEN]->Type1 = ET_NORMAL;
$Skill[SK_HARDEN]->PP = 30;
$Skill[SK_HARDEN]->Power = '-1';
$Skill[SK_HARDEN]->Accuracy = 'N/A';


$Skill[SK_HAZE] = new SkillList;
$Skill[SK_HAZE]->Name = 'Haze';
$Skill[SK_HAZE]->Desc = 'Eliminates any stat modifiers from all active Pokemon. Also removes Leech Seed, Reflect and Light Screen from either Pokemon and cures the opponent of any status conditions (including Toxic). If the user of Haze has Toxic poisoning, it will be downgraded to regular poisoning.';
$Skill[SK_HAZE]->Type1 = ET_ICE;
$Skill[SK_HAZE]->PP = 30;
$Skill[SK_HAZE]->Power = '-1';
$Skill[SK_HAZE]->Accuracy = 'N/A';


$Skill[SK_HEADBUTT] = new SkillList;
$Skill[SK_HEADBUTT]->Name = 'Headbutt';
$Skill[SK_HEADBUTT]->Desc = 'Has a ~30% chance to make the target flinch.';
$Skill[SK_HEADBUTT]->Type1 = ET_NORMAL;
$Skill[SK_HEADBUTT]->PP = 15;
$Skill[SK_HEADBUTT]->Power = '70';
$Skill[SK_HEADBUTT]->Accuracy = '100';


$Skill[SK_HIJUMPKICK] = new SkillList;
$Skill[SK_HIJUMPKICK]->Name = 'Hi Jump Kick';
$Skill[SK_HIJUMPKICK]->Desc = 'If this attack misses the target, the user receives 1 HP of damage.';
$Skill[SK_HIJUMPKICK]->Type1 = ET_FLYING;
$Skill[SK_HIJUMPKICK]->PP = 20;
$Skill[SK_HIJUMPKICK]->Power = '85';
$Skill[SK_HIJUMPKICK]->Accuracy = '90';


$Skill[SK_HORNATTACK] = new SkillList;
$Skill[SK_HORNATTACK]->Name = 'Horn Attack';
$Skill[SK_HORNATTACK]->Desc = 'Damages the target.';
$Skill[SK_HORNATTACK]->Type1 = ET_NORMAL;
$Skill[SK_HORNATTACK]->PP = 25;
$Skill[SK_HORNATTACK]->Power = '65';
$Skill[SK_HORNATTACK]->Accuracy = '100';


$Skill[SK_HORNDRILL] = new SkillList;
$Skill[SK_HORNDRILL]->Name = 'Horn Drill';
$Skill[SK_HORNDRILL]->Desc = 'The target faints;
doesn\'t work on faster or higher-leveled Pokemon.';
$Skill[SK_HORNDRILL]->Type1 = ET_NORMAL;
$Skill[SK_HORNDRILL]->PP = 5;
$Skill[SK_HORNDRILL]->Power = 'KO';
$Skill[SK_HORNDRILL]->Accuracy = '30';


$Skill[SK_HYDROPUMP] = new SkillList;
$Skill[SK_HYDROPUMP]->Name = 'Hydro Pump';
$Skill[SK_HYDROPUMP]->Desc = 'Damages the target.';
$Skill[SK_HYDROPUMP]->Type1 = ET_WATER;
$Skill[SK_HYDROPUMP]->PP = 5;
$Skill[SK_HYDROPUMP]->Power = '120';
$Skill[SK_HYDROPUMP]->Accuracy = '80';


$Skill[SK_HYPERBEAM] = new SkillList;
$Skill[SK_HYPERBEAM]->Name = 'Hyper Beam';
$Skill[SK_HYPERBEAM]->Desc = 'In Stadium, the user becomes uncontrollable during its next turn. Otherwise, the user attacks on turn one but it doesn\'t recharge on turn two if it KOs the target, breaks its Substitute or misses entirely.';
$Skill[SK_HYPERBEAM]->Type1 = ET_NORMAL;
$Skill[SK_HYPERBEAM]->PP = 5;
$Skill[SK_HYPERBEAM]->Power = '150';
$Skill[SK_HYPERBEAM]->Accuracy = '90';


$Skill[SK_HYPERFANG] = new SkillList;
$Skill[SK_HYPERFANG]->Name = 'Hyper Fang';
$Skill[SK_HYPERFANG]->Desc = 'Has a ~10% chance to make the target flinch.';
$Skill[SK_HYPERFANG]->Type1 = ET_NORMAL;
$Skill[SK_HYPERFANG]->PP = 15;
$Skill[SK_HYPERFANG]->Power = '80';
$Skill[SK_HYPERFANG]->Accuracy = '90';


$Skill[SK_HYPNOSIS] = new SkillList;
$Skill[SK_HYPNOSIS]->Name = 'Hypnosis';
$Skill[SK_HYPNOSIS]->Desc = 'Puts the target to sleep.';
$Skill[SK_HYPNOSIS]->Type1 = ET_PSYCHIC;
$Skill[SK_HYPNOSIS]->PP = 20;
$Skill[SK_HYPNOSIS]->Power = '-1';
$Skill[SK_HYPNOSIS]->Accuracy = '60';


$Skill[SK_ICEBEAM] = new SkillList;
$Skill[SK_ICEBEAM]->Name = 'Ice Beam';
$Skill[SK_ICEBEAM]->Desc = 'Has a ~10% chance to freeze the target.';
$Skill[SK_ICEBEAM]->Type1 = ET_ICE;
$Skill[SK_ICEBEAM]->PP = 10;
$Skill[SK_ICEBEAM]->Power = '95';
$Skill[SK_ICEBEAM]->Accuracy = '100';


$Skill[SK_ICEPUNCH] = new SkillList;
$Skill[SK_ICEPUNCH]->Name = 'Ice Punch';
$Skill[SK_ICEPUNCH]->Desc = 'Has a ~10% chance to freeze the target.';
$Skill[SK_ICEPUNCH]->Type1 = ET_ICE;
$Skill[SK_ICEPUNCH]->PP = 15;
$Skill[SK_ICEPUNCH]->Power = '75';
$Skill[SK_ICEPUNCH]->Accuracy = '100';


$Skill[SK_JUMPKICK] = new SkillList;
$Skill[SK_JUMPKICK]->Name = 'Jump Kick';
$Skill[SK_JUMPKICK]->Desc = 'If this attack misses the target, the user receives 1 HP of damage.';
$Skill[SK_JUMPKICK]->Type1 = ET_FLYING;
$Skill[SK_JUMPKICK]->PP = 20;
$Skill[SK_JUMPKICK]->Power = '70';
$Skill[SK_JUMPKICK]->Accuracy = '95';


$Skill[SK_KARATECHOP] = new SkillList;
$Skill[SK_KARATECHOP]->Name = 'Karate Chop';
$Skill[SK_KARATECHOP]->Desc = 'Has a high critical hit ratio.';
$Skill[SK_KARATECHOP]->Type1 = ET_NORMAL;
$Skill[SK_KARATECHOP]->PP = 25;
$Skill[SK_KARATECHOP]->Power = '55';
$Skill[SK_KARATECHOP]->Accuracy = '100';


$Skill[SK_KINESIS] = new SkillList;
$Skill[SK_KINESIS]->Name = 'Kinesis';
$Skill[SK_KINESIS]->Desc = 'Lowers the target\'s Accuracy by 1 stage.';
$Skill[SK_KINESIS]->Type1 = ET_PSYCHIC;
$Skill[SK_KINESIS]->PP = 15;
$Skill[SK_KINESIS]->Power = '-1';
$Skill[SK_KINESIS]->Accuracy = '80';


$Skill[SK_LEECHLIFE] = new SkillList;
$Skill[SK_LEECHLIFE]->Name = 'Leech Life';
$Skill[SK_LEECHLIFE]->Desc = 'Restores the user\'s HP by 1/2 of the damage inflicted on the target.';
$Skill[SK_LEECHLIFE]->Type1 = ET_BUG;
$Skill[SK_LEECHLIFE]->PP = 15;
$Skill[SK_LEECHLIFE]->Power = '20';
$Skill[SK_LEECHLIFE]->Accuracy = '100';


$Skill[SK_LEECHSEED] = new SkillList;
$Skill[SK_LEECHSEED]->Name = 'Leech Seed';
$Skill[SK_LEECHSEED]->Desc = 'The user steals 1/16 of the target\'s max HP (or more if used in conjunction with Toxic) until either Pokemon uses Haze or the target is switched out or KO\'ed;
does not work on Grass-type Pokemon, but will work against Pokemon behind Substitutes.';
$Skill[SK_LEECHSEED]->Type1 = ET_GRASS;
$Skill[SK_LEECHSEED]->Type2 = ATK_STATUS;
$Skill[SK_LEECHSEED]->PP = 10;
$Skill[SK_LEECHSEED]->Power = '-1';
$Skill[SK_LEECHSEED]->Accuracy = '90';


$Skill[SK_LEER] = new SkillList;
$Skill[SK_LEER]->Name = 'Leer';
$Skill[SK_LEER]->Desc = 'Lowers the target\'s Defense by 1 stage.';
$Skill[SK_LEER]->Type1 = ET_NORMAL;
$Skill[SK_LEER]->Type1 = ATK_STATUS;
$Skill[SK_LEER]->PP = 30;
$Skill[SK_LEER]->Power = '-1';
$Skill[SK_LEER]->Accuracy = '100';


$Skill[SK_LICK] = new SkillList;
$Skill[SK_LICK]->Name = 'Lick';
$Skill[SK_LICK]->Desc = 'Has a ~30% chance to paralyze the target. This move fails against Psychic-type Pokemon.';
$Skill[SK_LICK]->Type1 = ET_GHOST;
$Skill[SK_LICK]->PP = 30;
$Skill[SK_LICK]->Power = '20';
$Skill[SK_LICK]->Accuracy = '100';
//Added

$Skill[SK_LIGHTSCREEN] = new SkillList;
$Skill[SK_LIGHTSCREEN]->Name = 'Light Screen';
$Skill[SK_LIGHTSCREEN]->Desc = 'The user receives 1/2 damage from Special attacks until it switches out or either Pokemon uses Haze.';
$Skill[SK_LIGHTSCREEN]->Type1 = ET_PSYCHIC;
$Skill[SK_LIGHTSCREEN]->PP = 30;
$Skill[SK_LIGHTSCREEN]->Power = '-1';
$Skill[SK_LIGHTSCREEN]->Accuracy = 'N/A';


$Skill[SK_LOVELYKISS] = new SkillList;
$Skill[SK_LOVELYKISS]->Name = 'Lovely Kiss';
$Skill[SK_LOVELYKISS]->Desc = 'Puts the target to sleep.';
$Skill[SK_LOVELYKISS]->Type1 = ET_NORMAL;
$Skill[SK_LOVELYKISS]->PP = 10;
$Skill[SK_LOVELYKISS]->Power = '-1';
$Skill[SK_LOVELYKISS]->Accuracy = '75';


$Skill[SK_LOWKICK] = new SkillList;
$Skill[SK_LOWKICK]->Name = 'Low Kick';
$Skill[SK_LOWKICK]->Desc = 'Has a ~30% chance to make the target flinch.';
$Skill[SK_LOWKICK]->Type1 = ET_FLYING;
$Skill[SK_LOWKICK]->PP = 20;
$Skill[SK_LOWKICK]->Power = '50';
$Skill[SK_LOWKICK]->Accuracy = '90';


$Skill[SK_MEDITATE] = new SkillList;
$Skill[SK_MEDITATE]->Name = 'Meditate';
$Skill[SK_MEDITATE]->Desc = 'Raises the user\'s Attack by 1 stage.';
$Skill[SK_MEDITATE]->Type1 = ET_PSYCHIC;
$Skill[SK_MEDITATE]->PP = 40;
$Skill[SK_MEDITATE]->Power = '-1';
$Skill[SK_MEDITATE]->Accuracy = 'N/A';


$Skill[SK_MEGADRAIN] = new SkillList;
$Skill[SK_MEGADRAIN]->Name = 'Mega Drain';
$Skill[SK_MEGADRAIN]->Desc = 'Restores the user\'s HP by 1/2 of the damage inflicted on the target.';
$Skill[SK_MEGADRAIN]->Type1 = ET_GRASS;
$Skill[SK_MEGADRAIN]->PP = 10;
$Skill[SK_MEGADRAIN]->Power = '40';
$Skill[SK_MEGADRAIN]->Accuracy = '100';


$Skill[SK_MEGAKICK] = new SkillList;
$Skill[SK_MEGAKICK]->Name = 'Mega Kick';
$Skill[SK_MEGAKICK]->Desc = 'Damages the target.';
$Skill[SK_MEGAKICK]->Type1 = ET_NORMAL;
$Skill[SK_MEGAKICK]->PP = 5;
$Skill[SK_MEGAKICK]->Power = '120';
$Skill[SK_MEGAKICK]->Accuracy = '75';


$Skill[SK_MEGAPUNCH] = new SkillList;
$Skill[SK_MEGAPUNCH]->Name = 'Mega Punch';
$Skill[SK_MEGAPUNCH]->Desc = 'Damages the target.';
$Skill[SK_MEGAPUNCH]->Type1 = ET_NORMAL;
$Skill[SK_MEGAPUNCH]->PP = 20;
$Skill[SK_MEGAPUNCH]->Power = '80';
$Skill[SK_MEGAPUNCH]->Accuracy = '85';


$Skill[SK_METRONOME] = new SkillList;
$Skill[SK_METRONOME]->Name = 'Metronome';
$Skill[SK_METRONOME]->Desc = 'The user performs a randomly selected move;
almost any move in the game could be picked. Metronome cannot generate itself, Struggle or any move that the user already knows.';
$Skill[SK_METRONOME]->Type1 = ET_NORMAL;
$Skill[SK_METRONOME]->PP = 10;
$Skill[SK_METRONOME]->Power = '-1';
$Skill[SK_METRONOME]->Accuracy = 'N/A';


$Skill[SK_MIMIC] = new SkillList;
$Skill[SK_MIMIC]->Name = 'Mimic';
$Skill[SK_MIMIC]->Desc = 'This move is temporarily replaced by one of the target\'s moves;
after one PP is subtracted to use this move, the replacement move will retain Mimic\'s remaining PP. The user can select any of the target\'s moves to copy until the end of the battle or until the user switches out. There are no move restrictions on Mimic other than itself and Struggle. However, in a link battle, Mimic will copy one of the target\'s attacks randomly.';
$Skill[SK_MIMIC]->Type1 = ET_NORMAL;
$Skill[SK_MIMIC]->PP = 10;
$Skill[SK_MIMIC]->Power = '-1';
$Skill[SK_MIMIC]->Accuracy = '100';


$Skill[SK_MINIMIZE] = new SkillList;
$Skill[SK_MINIMIZE]->Name = 'Minimize';
$Skill[SK_MINIMIZE]->Desc = 'Raises the user\'s Evasion by 1 stage.';
$Skill[SK_MINIMIZE]->Type1 = ET_NORMAL;
$Skill[SK_MINIMIZE]->PP = 20;
$Skill[SK_MINIMIZE]->Power = '-1';
$Skill[SK_MINIMIZE]->Accuracy = 'N/A';


$Skill[SK_MIRRORMOVE] = new SkillList;
$Skill[SK_MIRRORMOVE]->Name = 'Mirror Move';
$Skill[SK_MIRRORMOVE]->Desc = 'The user performs the last move executed by its target;
if applicable, an attack\'s damage is calculated with the user\'s stats, level and type(s). This moves fails if the target has not yet used a move. Mirror Move also cannot copy itself.';
$Skill[SK_MIRRORMOVE]->Type1 = ET_FLYING;
$Skill[SK_MIRRORMOVE]->PP = 20;
$Skill[SK_MIRRORMOVE]->Power = 'Copy';
$Skill[SK_MIRRORMOVE]->Accuracy = 'N/A';


$Skill[SK_MIST] = new SkillList;
$Skill[SK_MIST]->Name = 'Mist';
$Skill[SK_MIST]->Desc = 'Protects the user from negative stat modifiers caused by other Pokemon until it switches out. The user\'s Accuracy and Evasion stats are also protected. Moves that cause negative stat modifiers as a secondary effect, such as Psychic, still deal their regular damage.';
$Skill[SK_MIST]->Type1 = ET_ICE;
$Skill[SK_MIST]->PP = 30;
$Skill[SK_MIST]->Power = '-1';
$Skill[SK_MIST]->Accuracy = 'N/A';


$Skill[SK_NIGHTSHADE] = new SkillList;
$Skill[SK_NIGHTSHADE]->Name = 'Night Shade';
$Skill[SK_NIGHTSHADE]->Desc = 'Does damage equal to user\'s level. This move hits Normal-type Pokemon.';
$Skill[SK_NIGHTSHADE]->Type1 = ET_GHOST;
$Skill[SK_NIGHTSHADE]->PP = 15;
$Skill[SK_NIGHTSHADE]->Power = '-2';
$Skill[SK_NIGHTSHADE]->Accuracy = '100';


$Skill[SK_PAYDAY] = new SkillList;
$Skill[SK_PAYDAY]->Name = 'Pay Day';
$Skill[SK_PAYDAY]->Desc = 'The player picks up extra money after in-game battles;
the money received is equal to: [user\'s level * 2 * number of times Pay Day is used]. The player does not lose money if the opponent uses Pay Day but the player wins the battle.';
$Skill[SK_PAYDAY]->Type1 = ET_NORMAL;
$Skill[SK_PAYDAY]->PP = 20;
$Skill[SK_PAYDAY]->Power = '40';
$Skill[SK_PAYDAY]->Accuracy = '100';


$Skill[SK_PECK] = new SkillList;
$Skill[SK_PECK]->Name = 'Peck';
$Skill[SK_PECK]->Desc = 'Damages the target.';
$Skill[SK_PECK]->Type1 = ET_FLYING;
$Skill[SK_PECK]->PP = 35;
$Skill[SK_PECK]->Power = '35';
$Skill[SK_PECK]->Accuracy = '100';


$Skill[SK_PETALDANCE] = new SkillList;
$Skill[SK_PETALDANCE]->Name = 'Petal Dance';
$Skill[SK_PETALDANCE]->Desc = 'The user attacks uncontrollably for 2-3 turns and then gets confused.';
$Skill[SK_PETALDANCE]->Type1 = ET_GRASS;
$Skill[SK_PETALDANCE]->PP = 20;
$Skill[SK_PETALDANCE]->Power = '70';
$Skill[SK_PETALDANCE]->Accuracy = '100';


$Skill[SK_PINMISSILE] = new SkillList;
$Skill[SK_PINMISSILE]->Name = 'Pin Missile';
$Skill[SK_PINMISSILE]->Desc = 'Attacks 2-5 times in one turn;
if one of these attacks breaks a target\'s Substitute, the target will take damage for the rest of the hits. This move has a 3/8 chance to hit twice, a 3/8 chance to hit three times, a 1/8 chance to hit four times and a 1/8 chance to hit five times.';
$Skill[SK_PINMISSILE]->Type1 = ET_BUG;
$Skill[SK_PINMISSILE]->PP = 20;
$Skill[SK_PINMISSILE]->Power = '14';
$Skill[SK_PINMISSILE]->Accuracy = '85';


$Skill[SK_POISONGAS] = new SkillList;
$Skill[SK_POISONGAS]->Name = 'Poison Gas';
$Skill[SK_POISONGAS]->Desc = 'Poisons the target.';
$Skill[SK_POISONGAS]->Type1 = ET_POISON;
$Skill[SK_POISONGAS]->PP = 40;
$Skill[SK_POISONGAS]->Power = '-1';
$Skill[SK_POISONGAS]->Accuracy = '55';


$Skill[SK_POISONSTING] = new SkillList;
$Skill[SK_POISONSTING]->Name = 'Poison Sting';
$Skill[SK_POISONSTING]->Desc = 'Has a ~20% chance to poison the target.';
$Skill[SK_POISONSTING]->Type1 = ET_POISON;
$Skill[SK_POISONSTING]->PP = 35;
$Skill[SK_POISONSTING]->Power = '15';
$Skill[SK_POISONSTING]->Accuracy = '100';


$Skill[SK_POISONPOWDER] = new SkillList;
$Skill[SK_POISONPOWDER]->Name = 'Poisonpowder';
$Skill[SK_POISONPOWDER]->Desc = 'Poisons the target.';
$Skill[SK_POISONPOWDER]->Type1 = ET_POISON;
$Skill[SK_POISONPOWDER]->Type2 = ATK_STATUS;
$Skill[SK_POISONPOWDER]->PP = 35;
$Skill[SK_POISONPOWDER]->Power = '-1';
$Skill[SK_POISONPOWDER]->Accuracy = '75';


$Skill[SK_POUND] = new SkillList;
$Skill[SK_POUND]->Name = 'Pound';
$Skill[SK_POUND]->Desc = 'Damages the target.';
$Skill[SK_POUND]->Type1 = ET_NORMAL;
$Skill[SK_POUND]->PP = 35;
$Skill[SK_POUND]->Power = '40';
$Skill[SK_POUND]->Accuracy = '100';


$Skill[SK_PSYBEAM] = new SkillList;
$Skill[SK_PSYBEAM]->Name = 'Psybeam';
$Skill[SK_PSYBEAM]->Desc = 'Has a ~10% chance to confuse the target.';
$Skill[SK_PSYBEAM]->Type1 = ET_PSYCHIC;
$Skill[SK_PSYBEAM]->PP = 20;
$Skill[SK_PSYBEAM]->Power = '65';
$Skill[SK_PSYBEAM]->Accuracy = '100';


$Skill[SK_PSYCHIC] = new SkillList;
$Skill[SK_PSYCHIC]->Name = 'Psychic';
$Skill[SK_PSYCHIC]->Desc = 'Has a ~30% chance to lower the target\'s Special by 1 stage.';
$Skill[SK_PSYCHIC]->Type1 = ET_PSYCHIC;
$Skill[SK_PSYCHIC]->PP = 10;
$Skill[SK_PSYCHIC]->Power = '90';
$Skill[SK_PSYCHIC]->Accuracy = '100';


$Skill[SK_PSYWAVE] = new SkillList;
$Skill[SK_PSYWAVE]->Name = 'Psywave';
$Skill[SK_PSYWAVE]->Desc = 'Randomly inflicts set damage between a minimum of 1 HP and a maximum of [1.5x the user\'s level] HP.';
$Skill[SK_PSYWAVE]->Type1 = ET_PSYCHIC;
$Skill[SK_PSYWAVE]->PP = 15;
$Skill[SK_PSYWAVE]->Power = '-2';
$Skill[SK_PSYWAVE]->Accuracy = '80';


$Skill[SK_QUICKATTACK] = new SkillList;
$Skill[SK_QUICKATTACK]->Name = 'Quick Attack';
$Skill[SK_QUICKATTACK]->Desc = 'Usually goes first.';
$Skill[SK_QUICKATTACK]->Type1 = ET_NORMAL;
$Skill[SK_QUICKATTACK]->PP = 30;
$Skill[SK_QUICKATTACK]->Power = '40';
$Skill[SK_QUICKATTACK]->Accuracy = '100';


$Skill[SK_RAGE] = new SkillList;
$Skill[SK_RAGE]->Name = 'Rage';
$Skill[SK_RAGE]->Desc = 'The user attacks uncontrollably until it faints or its target faints. During this time, the user\'s Attack increases by 1 stage for each time it is hit by the target. If this move misses, the user continues to attack but has only a 1/256 chance to land a hit.';
$Skill[SK_RAGE]->Type1 = ET_NORMAL;
$Skill[SK_RAGE]->PP = 20;
$Skill[SK_RAGE]->Power = '20';
$Skill[SK_RAGE]->Accuracy = '100';


$Skill[SK_RAZORLEAF] = new SkillList;
$Skill[SK_RAZORLEAF]->Name = 'Razor Leaf';
$Skill[SK_RAZORLEAF]->Desc = 'Has a high critical hit ratio.';
$Skill[SK_RAZORLEAF]->Type1 = ET_GRASS;
$Skill[SK_RAZORLEAF]->Type2 = ATK_NORMAL;
$Skill[SK_RAZORLEAF]->PP = 25;
$Skill[SK_RAZORLEAF]->Power = '55';
$Skill[SK_RAZORLEAF]->Accuracy = '95';


$Skill[SK_RAZORWIND] = new SkillList;
$Skill[SK_RAZORWIND]->Name = 'Razor Wind';
$Skill[SK_RAZORWIND]->Desc = 'The user prepares on turn one, becoming uncontrollable, and then attacks on turn two.';
$Skill[SK_RAZORWIND]->Type1 = ET_NORMAL;
$Skill[SK_RAZORWIND]->PP = 10;
$Skill[SK_RAZORWIND]->Power = '80';
$Skill[SK_RAZORWIND]->Accuracy = '75';


$Skill[SK_RECOVER] = new SkillList;
$Skill[SK_RECOVER]->Name = 'Recover';
$Skill[SK_RECOVER]->Desc = 'Restores 1/2 of the user\'s max HP. However, this move fails if the user\'s current HP is 511 or 255 HP below its value at full health.';
$Skill[SK_RECOVER]->Type1 = ET_NORMAL;
$Skill[SK_RECOVER]->PP = 20;
$Skill[SK_RECOVER]->Power = '-1';
$Skill[SK_RECOVER]->Accuracy = 'N/A';


$Skill[SK_REFLECT] = new SkillList;
$Skill[SK_REFLECT]->Name = 'Reflect';
$Skill[SK_REFLECT]->Desc = 'The user receives 1/2 damage from Physical attacks until it switches out or either Pokemon uses Haze.';
$Skill[SK_REFLECT]->Type1 = ET_PSYCHIC;
$Skill[SK_REFLECT]->PP = 20;
$Skill[SK_REFLECT]->Power = '-1';
$Skill[SK_REFLECT]->Accuracy = 'N/A';


$Skill[SK_REST] = new SkillList;
$Skill[SK_REST]->Name = 'Rest';
$Skill[SK_REST]->Desc = 'The user is cured of status effects (and confusion), and recovers full HP, but falls asleep for 2 turns (and then uses a third turn to wake up). However, this move fails if the user\'s current HP is 511 or 255 HP below its value at full health.';
$Skill[SK_REST]->Type1 = ET_PSYCHIC;
$Skill[SK_REST]->PP = 10;
$Skill[SK_REST]->Power = '-1';
$Skill[SK_REST]->Accuracy = 'N/A';


$Skill[SK_ROAR] = new SkillList;
$Skill[SK_ROAR]->Name = 'Roar';
$Skill[SK_ROAR]->Desc = 'Escapes from wild battles;
fails automatically in trainer and link battles.';
$Skill[SK_ROAR]->Type1 = ET_NORMAL;
$Skill[SK_ROAR]->PP = 20;
$Skill[SK_ROAR]->Power = '-1';
$Skill[SK_ROAR]->Accuracy = '100';


$Skill[SK_ROCKSLIDE] = new SkillList;
$Skill[SK_ROCKSLIDE]->Name = 'Rock Slide';
$Skill[SK_ROCKSLIDE]->Desc = 'Damages the target.';
$Skill[SK_ROCKSLIDE]->Type1 = ET_ROCK;
$Skill[SK_ROCKSLIDE]->PP = 10;
$Skill[SK_ROCKSLIDE]->Power = '75';
$Skill[SK_ROCKSLIDE]->Accuracy = '90';


$Skill[SK_ROCKTHROW] = new SkillList;
$Skill[SK_ROCKTHROW]->Name = 'Rock Throw';
$Skill[SK_ROCKTHROW]->Desc = 'Damages the target.';
$Skill[SK_ROCKTHROW]->Type1 = ET_ROCK;
$Skill[SK_ROCKTHROW]->PP = 15;
$Skill[SK_ROCKTHROW]->Power = '50';
$Skill[SK_ROCKTHROW]->Accuracy = '90';


$Skill[SK_ROLLINGKICK] = new SkillList;
$Skill[SK_ROLLINGKICK]->Name = 'Rolling Kick';
$Skill[SK_ROLLINGKICK]->Desc = 'Has a ~30% chance to make the target flinch.';
$Skill[SK_ROLLINGKICK]->Type1 = ET_FLYING;
$Skill[SK_ROLLINGKICK]->PP = 15;
$Skill[SK_ROLLINGKICK]->Power = '60';
$Skill[SK_ROLLINGKICK]->Accuracy = '85';


$Skill[SK_SANDATTACK] = new SkillList;
$Skill[SK_SANDATTACK]->Name = 'Sand-Attack';
$Skill[SK_SANDATTACK]->Desc = 'Lowers the target\'s Accuracy by 1 stage.';
$Skill[SK_SANDATTACK]->Type1 = ET_GROUND;
$Skill[SK_SANDATTACK]->PP = 15;
$Skill[SK_SANDATTACK]->Power = '-1';
$Skill[SK_SANDATTACK]->Accuracy = '100';


$Skill[SK_SCRATCH] = new SkillList;
$Skill[SK_SCRATCH]->Name = 'Scratch';
$Skill[SK_SCRATCH]->Desc = 'Damages the target.';
$Skill[SK_SCRATCH]->Type1 = ET_NORMAL;
$Skill[SK_SCRATCH]->Type2 = ATK_NORMAL;
$Skill[SK_SCRATCH]->PP = 35;
$Skill[SK_SCRATCH]->Power = '40';
$Skill[SK_SCRATCH]->Accuracy = '100';


$Skill[SK_SCREECH] = new SkillList;
$Skill[SK_SCREECH]->Name = 'Screech';
$Skill[SK_SCREECH]->Desc = 'Lowers the target\'s Defense by 2 stages.';
$Skill[SK_SCREECH]->Type1 = ET_NORMAL;
$Skill[SK_SCREECH]->PP = 10;
$Skill[SK_SCREECH]->Power = '-1';
$Skill[SK_SCREECH]->Accuracy = '85';


$Skill[SK_SEISMICTOSS] = new SkillList;
$Skill[SK_SEISMICTOSS]->Name = 'Seismic Toss';
$Skill[SK_SEISMICTOSS]->Desc = 'Does damage equal to user\'s level. Hits Ghost-type Pokemon.';
$Skill[SK_SEISMICTOSS]->Type1 = ET_FLYING;
$Skill[SK_SEISMICTOSS]->PP = 20;
$Skill[SK_SEISMICTOSS]->Power = '-2';
$Skill[SK_SEISMICTOSS]->Accuracy = '100';


$Skill[SK_SELFDESTRUCT] = new SkillList;
$Skill[SK_SELFDESTRUCT]->Name = 'Selfdestruct';
$Skill[SK_SELFDESTRUCT]->Desc = 'The Defense stat of other Pokemon is halved against this attack, essentially doubling the move\'s base power;
causes the user to faint.';
$Skill[SK_SELFDESTRUCT]->Type1 = ET_NORMAL;
$Skill[SK_SELFDESTRUCT]->PP = 5;
$Skill[SK_SELFDESTRUCT]->Power = '130';
$Skill[SK_SELFDESTRUCT]->Accuracy = '100';


$Skill[SK_SHARPEN] = new SkillList;
$Skill[SK_SHARPEN]->Name = 'Sharpen';
$Skill[SK_SHARPEN]->Desc = 'Raises the user\'s Attack by 1 stage.';
$Skill[SK_SHARPEN]->Type1 = ET_NORMAL;
$Skill[SK_SHARPEN]->PP = 30;
$Skill[SK_SHARPEN]->Power = '-1';
$Skill[SK_SHARPEN]->Accuracy = 'N/A';


$Skill[SK_SING] = new SkillList;
$Skill[SK_SING]->Name = 'Sing';
$Skill[SK_SING]->Desc = 'Puts the target to sleep.';
$Skill[SK_SING]->Type1 = ET_NORMAL;
$Skill[SK_SING]->PP = 15;
$Skill[SK_SING]->Power = '-1';
$Skill[SK_SING]->Accuracy = '55';


$Skill[SK_SKULLBASH] = new SkillList;
$Skill[SK_SKULLBASH]->Name = 'Skull Bash';
$Skill[SK_SKULLBASH]->Desc = 'The user prepares on turn one, becoming uncontrollable, and then attacks on turn two.';
$Skill[SK_SKULLBASH]->Type1 = ET_NORMAL;
$Skill[SK_SKULLBASH]->PP = 15;
$Skill[SK_SKULLBASH]->Power = '100';
$Skill[SK_SKULLBASH]->Accuracy = '100';


$Skill[SK_SKYATTACK] = new SkillList;
$Skill[SK_SKYATTACK]->Name = 'Sky Attack';
$Skill[SK_SKYATTACK]->Desc = 'The user prepares on turn one, becoming uncontrollable, and then attacks on turn two.';
$Skill[SK_SKYATTACK]->Type1 = ET_FLYING;
$Skill[SK_SKYATTACK]->PP = 5;
$Skill[SK_SKYATTACK]->Power = '140';
$Skill[SK_SKYATTACK]->Accuracy = '90';


$Skill[SK_SLAM] = new SkillList;
$Skill[SK_SLAM]->Name = 'Slam';
$Skill[SK_SLAM]->Desc = 'Damages the target.';
$Skill[SK_SLAM]->Type1 = ET_NORMAL;
$Skill[SK_SLAM]->PP = 20;
$Skill[SK_SLAM]->Power = '80';
$Skill[SK_SLAM]->Accuracy = '75';


$Skill[SK_SLASH] = new SkillList;
$Skill[SK_SLASH]->Name = 'Slash';
$Skill[SK_SLASH]->Desc = 'Has a high critical hit ratio.';


$Skill[SK_SLASH]->Type1 = ET_NORMAL;
$Skill[SK_SLASH]->PP = 20;
$Skill[SK_SLASH]->Power = '70';
$Skill[SK_SLASH]->Accuracy = '100';


//Added

$Skill[SK_SLEEPPOWDER] = new SkillList;
$Skill[SK_SLEEPPOWDER]->Name = 'Sleep Powder';
$Skill[SK_SLEEPPOWDER]->Desc = 'Puts the target to sleep.';
$Skill[SK_SLEEPPOWDER]->Type1 = ET_GRASS;
$Skill[SK_SLEEPPOWDER]->Type2 = ATK_STATUS;
$Skill[SK_SLEEPPOWDER]->PP = 15;
$Skill[SK_SLEEPPOWDER]->Power = '-1';
$Skill[SK_SLEEPPOWDER]->Accuracy = '75';


$Skill[SK_SLUDGE] = new SkillList;
$Skill[SK_SLUDGE]->Name = 'Sludge';
$Skill[SK_SLUDGE]->Desc = 'Has a ~30% chance to poison the target.';
$Skill[SK_SLUDGE]->Type1 = ET_POISON;
$Skill[SK_SLUDGE]->PP = 20;
$Skill[SK_SLUDGE]->Power = '65';
$Skill[SK_SLUDGE]->Accuracy = '100';


$Skill[SK_SMOG] = new SkillList;
$Skill[SK_SMOG]->Name = 'Smog';
$Skill[SK_SMOG]->Desc = 'Has a ~30% chance to poison the target.';
$Skill[SK_SMOG]->Type1 = ET_POISON;
$Skill[SK_SMOG]->PP = 20;
$Skill[SK_SMOG]->Power = '20';
$Skill[SK_SMOG]->Accuracy = '100';


$Skill[SK_SMOKESCREEN] = new SkillList;
$Skill[SK_SMOKESCREEN]->Name = 'Smokescreen';
$Skill[SK_SMOKESCREEN]->Desc = 'Lowers the target\'s Accuracy by 1 stage.';
$Skill[SK_SMOKESCREEN]->Type1 = ET_NORMAL;
$Skill[SK_SMOKESCREEN]->PP = 20;
$Skill[SK_SMOKESCREEN]->Power = '-1';
$Skill[SK_SMOKESCREEN]->Accuracy = '100';


$Skill[SK_SOFTBOILED] = new SkillList;
$Skill[SK_SOFTBOILED]->Name = 'Softboiled';
$Skill[SK_SOFTBOILED]->Desc = 'Restores 1/2 of the user\'s max HP. However, this move fails if the user\'s current HP is 511 or 255 HP below its value at full health.';
$Skill[SK_SOFTBOILED]->Type1 = ET_NORMAL;
$Skill[SK_SOFTBOILED]->PP = 10;
$Skill[SK_SOFTBOILED]->Power = '-1';
$Skill[SK_SOFTBOILED]->Accuracy = 'N/A';


//Added

$Skill[SK_SOLARBEAM] = new SkillList;
$Skill[SK_SOLARBEAM]->Name = 'Solarbeam';
$Skill[SK_SOLARBEAM]->Desc = 'The user prepares on turn one, becoming uncontrollable, and then attacks on turn two.';
$Skill[SK_SOLARBEAM]->Type1 = ET_GRASS;
$Skill[SK_SOLARBEAM]->Type2 = ATK_SPECIAL;
$Skill[SK_SOLARBEAM]->Style = MV_PREPARE;
$Skill[SK_SOLARBEAM]->PP = 10;
$Skill[SK_SOLARBEAM]->Power = '120';
$Skill[SK_SOLARBEAM]->Accuracy = '100';


$Skill[SK_SONICBOOM] = new SkillList;
$Skill[SK_SONICBOOM]->Name = 'Sonicboom';
$Skill[SK_SONICBOOM]->Desc = 'Always deals 20 points of damage.';
$Skill[SK_SONICBOOM]->Type1 = ET_NORMAL;
$Skill[SK_SONICBOOM]->PP = 20;
$Skill[SK_SONICBOOM]->Power = 'Set';
$Skill[SK_SONICBOOM]->Accuracy = '90';


$Skill[SK_SPIKECANNON] = new SkillList;
$Skill[SK_SPIKECANNON]->Name = 'Spike Cannon';
$Skill[SK_SPIKECANNON]->Desc = 'Attacks 2-5 times in one turn;
if one of these attacks breaks a target\'s Substitute, the target will take damage for the rest of the hits. This move has a 3/8 chance to hit twice, a 3/8 chance to hit three times, a 1/8 chance to hit four times and a 1/8 chance to hit five times.';
$Skill[SK_SPIKECANNON]->Type1 = ET_NORMAL;
$Skill[SK_SPIKECANNON]->PP = 15;
$Skill[SK_SPIKECANNON]->Power = '20';
$Skill[SK_SPIKECANNON]->Accuracy = '100';


$Skill[SK_SPLASH] = new SkillList;
$Skill[SK_SPLASH]->Name = 'Splash';
$Skill[SK_SPLASH]->Desc = 'doesn\'t do anything (but we still love it).';
$Skill[SK_SPLASH]->Type1 = ET_NORMAL;
$Skill[SK_SPLASH]->PP = 40;
$Skill[SK_SPLASH]->Power = '-1';
$Skill[SK_SPLASH]->Accuracy = 'N/A';


$Skill[SK_SPORE] = new SkillList;
$Skill[SK_SPORE]->Name = 'Spore';
$Skill[SK_SPORE]->Desc = 'Puts the target to sleep.';
$Skill[SK_SPORE]->Type1 = ET_GRASS;
$Skill[SK_SPORE]->PP = 15;
$Skill[SK_SPORE]->Power = '-1';
$Skill[SK_SPORE]->Accuracy = '100';


$Skill[SK_STOMP] = new SkillList;
$Skill[SK_STOMP]->Name = 'Stomp';
$Skill[SK_STOMP]->Desc = 'Has a ~30% chance to make the target flinch.';
$Skill[SK_STOMP]->Type1 = ET_NORMAL;
$Skill[SK_STOMP]->PP = 20;
$Skill[SK_STOMP]->Power = '65';
$Skill[SK_STOMP]->Accuracy = '100';


$Skill[SK_STRENGTH] = new SkillList;
$Skill[SK_STRENGTH]->Name = 'Strength';
$Skill[SK_STRENGTH]->Desc = 'Damages the target.';
$Skill[SK_STRENGTH]->Type1 = ET_NORMAL;
$Skill[SK_STRENGTH]->PP = 15;
$Skill[SK_STRENGTH]->Power = '80';
$Skill[SK_STRENGTH]->Accuracy = '100';


$Skill[SK_STRINGSHOT] = new SkillList;
$Skill[SK_STRINGSHOT]->Name = 'String Shot';
$Skill[SK_STRINGSHOT]->Desc = 'Lowers the target\'s Speed by 1 stage.';
$Skill[SK_STRINGSHOT]->Type1 = ET_BUG;
$Skill[SK_STRINGSHOT]->PP = 40;
$Skill[SK_STRINGSHOT]->Power = '-1';
$Skill[SK_STRINGSHOT]->Accuracy = '95';


$Skill[SK_STRUGGLE] = new SkillList;
$Skill[SK_STRUGGLE]->Name = 'Struggle';
$Skill[SK_STRUGGLE]->Desc = 'Used automatically when all of the user\'s other moves have run out of PP or are otherwise inaccessible. The user receives 1/4 recoil damage. Struggle is classified as a Normal-type move, so it is resisted by Rock-type Pokemon and cannot hit Ghost-type Pokemon at all.';
$Skill[SK_STRUGGLE]->Type1 = ET_NORMAL;
$Skill[SK_STRUGGLE]->PP = 1;
$Skill[SK_STRUGGLE]->Power = '50';
$Skill[SK_STRUGGLE]->Accuracy = '100';


$Skill[SK_STUNSPORE] = new SkillList;
$Skill[SK_STUNSPORE]->Name = 'Stun Spore';
$Skill[SK_STUNSPORE]->Desc = 'Paralyzes the target.';
$Skill[SK_STUNSPORE]->Type1 = ET_GRASS;
$Skill[SK_STUNSPORE]->PP = 30;
$Skill[SK_STUNSPORE]->Power = '-1';
$Skill[SK_STUNSPORE]->Accuracy = '75';


$Skill[SK_SUBMISSION] = new SkillList;
$Skill[SK_SUBMISSION]->Name = 'Submission';
$Skill[SK_SUBMISSION]->Desc = 'The user receives 1/4 recoil damage.';
$Skill[SK_SUBMISSION]->Type1 = ET_FLYING;
$Skill[SK_SUBMISSION]->PP = 20;
$Skill[SK_SUBMISSION]->Power = '80';
$Skill[SK_SUBMISSION]->Accuracy = '80';


$Skill[SK_SUBSTITUTE] = new SkillList;
$Skill[SK_SUBSTITUTE]->Name = 'Substitute';
$Skill[SK_SUBSTITUTE]->Desc = 'The user takes one-fourth of its maximum HP to create a substitute;
this move fails if the user does not have enough HP for this. Until the substitute is broken, it receives damage from all attacks made by other Pokemon. In-game, the user can still be inflicted with status effects and stat modifiers from other Pokemon, but this is fixed in Pokemon Stadium. If a Substitute breaks from a hit during a multistrike move such as Fury Attack, the user takes damage from the remaining strikes.';
$Skill[SK_SUBSTITUTE]->Type1 = ET_NORMAL;
$Skill[SK_SUBSTITUTE]->PP = 10;
$Skill[SK_SUBSTITUTE]->Power = '-1';
$Skill[SK_SUBSTITUTE]->Accuracy = 'N/A';


$Skill[SK_SUPERFANG] = new SkillList;
$Skill[SK_SUPERFANG]->Name = 'Super Fang';
$Skill[SK_SUPERFANG]->Desc = 'This move halves the target\'s current HP.';
$Skill[SK_SUPERFANG]->Type1 = ET_NORMAL;
$Skill[SK_SUPERFANG]->PP = 10;
$Skill[SK_SUPERFANG]->Power = '-2';
$Skill[SK_SUPERFANG]->Accuracy = '90';


$Skill[SK_SUPERSONIC] = new SkillList;
$Skill[SK_SUPERSONIC]->Name = 'Supersonic';
$Skill[SK_SUPERSONIC]->Desc = 'Confuses the target.';
$Skill[SK_SUPERSONIC]->Type1 = ET_NORMAL;
$Skill[SK_SUPERSONIC]->PP = 20;
$Skill[SK_SUPERSONIC]->Power = '-1';
$Skill[SK_SUPERSONIC]->Accuracy = '55';


$Skill[SK_SURF] = new SkillList;
$Skill[SK_SURF]->Name = 'Surf';
$Skill[SK_SURF]->Desc = 'Damages the target.';
$Skill[SK_SURF]->Type1 = ET_WATER;
$Skill[SK_SURF]->PP = 15;
$Skill[SK_SURF]->Power = '95';
$Skill[SK_SURF]->Accuracy = '100';


$Skill[SK_SWIFT] = new SkillList;
$Skill[SK_SWIFT]->Name = 'Swift';
$Skill[SK_SWIFT]->Desc = 'Ignores Evasion and Accuracy modifiers and will hit Pokemon even if they are in the middle of Fly or Dig. Has a 1-in-256 chance of missing.';
$Skill[SK_SWIFT]->Type1 = ET_NORMAL;
$Skill[SK_SWIFT]->PP = 20;
$Skill[SK_SWIFT]->Power = '60';
$Skill[SK_SWIFT]->Accuracy = '100';


$Skill[SK_SWORDSDANCE] = new SkillList;
$Skill[SK_SWORDSDANCE]->Name = 'Swords Dance';
$Skill[SK_SWORDSDANCE]->Desc = 'Raises the user\'s Attack by 2 stages.';
$Skill[SK_SWORDSDANCE]->Type1 = ET_NORMAL;
$Skill[SK_SWORDSDANCE]->PP = 30;
$Skill[SK_SWORDSDANCE]->Power = '-1';
$Skill[SK_SWORDSDANCE]->Accuracy = 'N/A';


$Skill[SK_TACKLE] = new SkillList;
$Skill[SK_TACKLE]->Name = 'Tackle';
$Skill[SK_TACKLE]->Desc = 'Damages the target.';
$Skill[SK_TACKLE]->Type1 = ET_NORMAL;
$Skill[SK_TACKLE]->Type2 = ATK_NORMAL;
$Skill[SK_TACKLE]->PP = 35;
$Skill[SK_TACKLE]->Power = '35';
$Skill[SK_TACKLE]->Accuracy = '95';


$Skill[SK_TAILWHIP] = new SkillList;
$Skill[SK_TAILWHIP]->Name = 'Tail Whip';
$Skill[SK_TAILWHIP]->Desc = 'Lowers the target\'s Defense by 1 stage.';
$Skill[SK_TAILWHIP]->Type1 = ET_NORMAL;
$Skill[SK_TAILWHIP]->Type2 = ATK_STATUS;
$Skill[SK_TAILWHIP]->PP = 30;
$Skill[SK_TAILWHIP]->Power = '-1';
$Skill[SK_TAILWHIP]->Accuracy = '100';


$Skill[SK_TAKEDOWN] = new SkillList;
$Skill[SK_TAKEDOWN]->Name = 'Take Down';
$Skill[SK_TAKEDOWN]->Desc = 'The user receives 1/4 recoil damage.';
$Skill[SK_TAKEDOWN]->Type1 = ET_NORMAL;
$Skill[SK_TAKEDOWN]->PP = 20;
$Skill[SK_TAKEDOWN]->Power = '90';
$Skill[SK_TAKEDOWN]->Accuracy = '85';


$Skill[SK_TELEPORT] = new SkillList;
$Skill[SK_TELEPORT]->Name = 'Teleport';
$Skill[SK_TELEPORT]->Desc = 'Escapes from wild battles; fails automatically in trainer and link battles.';
$Skill[SK_TELEPORT]->Type1 = ET_PSYCHIC;
$Skill[SK_TELEPORT]->PP = 20;
$Skill[SK_TELEPORT]->Power = '-1';
$Skill[SK_TELEPORT]->Accuracy = 'N/A';


$Skill[SK_THRASH] = new SkillList;
$Skill[SK_THRASH]->Name = 'Thrash';
$Skill[SK_THRASH]->Desc = 'The user attacks uncontrollably for 2-3 turns and then gets confused.';
$Skill[SK_THRASH]->Type1 = ET_NORMAL;
$Skill[SK_THRASH]->PP = 20;
$Skill[SK_THRASH]->Power = '90';
$Skill[SK_THRASH]->Accuracy = '100';


$Skill[SK_THUNDER] = new SkillList;
$Skill[SK_THUNDER]->Name = 'Thunder';
$Skill[SK_THUNDER]->Desc = 'Has a ~10% chance to paralyze the target.';
$Skill[SK_THUNDER]->Type1 = ET_ELECTRIC;
$Skill[SK_THUNDER]->PP = 10;
$Skill[SK_THUNDER]->Power = '120';
$Skill[SK_THUNDER]->Accuracy = '70';


//Added

$Skill[SK_THUNDERWAVE] = new SkillList; 

$Skill[SK_THUNDERWAVE]->Name = 'Thunder Wave';
$Skill[SK_THUNDERWAVE]->Desc = 'Paralyzes the target.';
$Skill[SK_THUNDERWAVE]->Type1 = ET_ELECTRIC;
$Skill[SK_THUNDERWAVE]->Type2 = ATK_STATUS;
$Skill[SK_THUNDERWAVE]->PP = 20;
$Skill[SK_THUNDERWAVE]->Power = '-1';
$Skill[SK_THUNDERWAVE]->Accuracy = '100';


$Skill[SK_THUNDERBOLT] = new SkillList;
$Skill[SK_THUNDERBOLT]->Name = 'Thunderbolt';
$Skill[SK_THUNDERBOLT]->Desc = 'Has a ~10% chance to paralyze the target.';
$Skill[SK_THUNDERBOLT]->Type1 = ET_ELECTRIC;
$Skill[SK_THUNDERBOLT]->PP = 15;
$Skill[SK_THUNDERBOLT]->Power = '95';
$Skill[SK_THUNDERBOLT]->Accuracy = '100';


$Skill[SK_THUNDERPUNCH] = new SkillList;
$Skill[SK_THUNDERPUNCH]->Name = 'Thunderpunch';
$Skill[SK_THUNDERPUNCH]->Desc = 'Has a ~10% chance to paralyze the target.';
$Skill[SK_THUNDERPUNCH]->Type1 = ET_ELECTRIC;
$Skill[SK_THUNDERPUNCH]->PP = 15;
$Skill[SK_THUNDERPUNCH]->Power = '75';
$Skill[SK_THUNDERPUNCH]->Accuracy = '100';
//Added

$Skill[SK_THUNDERSHOCK] = new SkillList;
$Skill[SK_THUNDERSHOCK]->Name = 'Thundershock';
$Skill[SK_THUNDERSHOCK]->Desc = 'Has a ~10% chance to paralyze the target.';
$Skill[SK_THUNDERSHOCK]->Type1 = ET_ELECTRIC;
$Skill[SK_THUNDERSHOCK]->Type2 = ATK_SPECIAL;
$Skill[SK_THUNDERSHOCK]->PP = 30;
$Skill[SK_THUNDERSHOCK]->Power = '40';
$Skill[SK_THUNDERSHOCK]->Accuracy = '100';


$Skill[SK_TOXIC] = new SkillList;
$Skill[SK_TOXIC]->Name = 'Toxic';
$Skill[SK_TOXIC]->Desc = 'The target is badly poisoned, with the damage caused by poison doubling after each turn. However, Toxic poisoning will revert to normal poisoning if the poisoned Pokemon is switched out or uses Haze. Damage caused by Leech Seed will also increase as Toxic damage increases.';
$Skill[SK_TOXIC]->Type1 = ET_POISON;
$Skill[SK_TOXIC]->PP = 10;
$Skill[SK_TOXIC]->Power = '-1';
$Skill[SK_TOXIC]->Accuracy = '85';


$Skill[SK_TRANSFORM] = new SkillList;
$Skill[SK_TRANSFORM]->Name = 'Transform';
$Skill[SK_TRANSFORM]->Desc = 'The user morphs into a near-exact copy of the target. Stats, stat modifiers, type, moves and appearance are changed;
the user\'s level and HP remain the same and each copied move receives only 5 PP.';
$Skill[SK_TRANSFORM]->Type1 = ET_NORMAL;
$Skill[SK_TRANSFORM]->PP = 10;
$Skill[SK_TRANSFORM]->Power = '-1';
$Skill[SK_TRANSFORM]->Accuracy = 'N/A';


$Skill[SK_TRIATTACK] = new SkillList;
$Skill[SK_TRIATTACK]->Name = 'Tri Attack';
$Skill[SK_TRIATTACK]->Desc = 'Damages the target.';
$Skill[SK_TRIATTACK]->Type1 = ET_NORMAL;
$Skill[SK_TRIATTACK]->PP = 10;
$Skill[SK_TRIATTACK]->Power = '80';
$Skill[SK_TRIATTACK]->Accuracy = '100';


$Skill[SK_TWINEEDLE] = new SkillList;
$Skill[SK_TWINEEDLE]->Name = 'Twineedle';
$Skill[SK_TWINEEDLE]->Desc = 'Strikes twice;
if the first hit breaks the target\'s Substitute, the real Pokemon will take damage from the second hit. Has a ~20% chance to poison the target .';
$Skill[SK_TWINEEDLE]->Type1 = ET_BUG;
$Skill[SK_TWINEEDLE]->PP = 20;
$Skill[SK_TWINEEDLE]->Power = '25';
$Skill[SK_TWINEEDLE]->Accuracy = '100';


$Skill[SK_VICEGRIP] = new SkillList;
$Skill[SK_VICEGRIP]->Name = 'Vicegrip';
$Skill[SK_VICEGRIP]->Desc = 'Damages the target.';
$Skill[SK_VICEGRIP]->Type1 = ET_NORMAL;
$Skill[SK_VICEGRIP]->PP = 30;
$Skill[SK_VICEGRIP]->Power = '55';
$Skill[SK_VICEGRIP]->Accuracy = '100';


$Skill[SK_VINEWHIP] = new SkillList;
$Skill[SK_VINEWHIP]->Name = 'Vine Whip';
$Skill[SK_VINEWHIP]->Desc = 'Damages the target.';
$Skill[SK_VINEWHIP]->Type1 = ET_GRASS;
$Skill[SK_VINEWHIP]->Type1 = ATK_NORMAL;
$Skill[SK_VINEWHIP]->PP = 10;
$Skill[SK_VINEWHIP]->Power = '35';
$Skill[SK_VINEWHIP]->Accuracy = '100';


$Skill[SK_WATERGUN] = new SkillList;
$Skill[SK_WATERGUN]->Name = 'Water Gun';
$Skill[SK_WATERGUN]->Desc = 'Damages the target.';
$Skill[SK_WATERGUN]->Type1 = ET_WATER;
$Skill[SK_WATERGUN]->PP = 25;
$Skill[SK_WATERGUN]->Power = '40';
$Skill[SK_WATERGUN]->Accuracy = '100';


$Skill[SK_WATERFALL] = new SkillList;
$Skill[SK_WATERFALL]->Name = 'Waterfall';
$Skill[SK_WATERFALL]->Desc = 'Damages the target.';
$Skill[SK_WATERFALL]->Type1 = ET_WATER;
$Skill[SK_WATERFALL]->PP = 15;
$Skill[SK_WATERFALL]->Power = '80';
$Skill[SK_WATERFALL]->Accuracy = '100';


$Skill[SK_WHIRLWIND] = new SkillList;
$Skill[SK_WHIRLWIND]->Name = 'Whirlwind';
$Skill[SK_WHIRLWIND]->Desc = 'Escapes from wild battles;
fails automatically in trainer and link battles.';
$Skill[SK_WHIRLWIND]->Type1 = ET_NORMAL;
$Skill[SK_WHIRLWIND]->PP = 20;
$Skill[SK_WHIRLWIND]->Power = '-1';
$Skill[SK_WHIRLWIND]->Accuracy = '100';


$Skill[SK_WINGATTACK] = new SkillList;
$Skill[SK_WINGATTACK]->Name = 'Wing Attack';
$Skill[SK_WINGATTACK]->Desc = 'Damages the target.';
$Skill[SK_WINGATTACK]->Type1 = ET_FLYING;
$Skill[SK_WINGATTACK]->PP = 35;
$Skill[SK_WINGATTACK]->Power = '35';
$Skill[SK_WINGATTACK]->Accuracy = '100';


$Skill[SK_WITHDRAW] = new SkillList;
$Skill[SK_WITHDRAW]->Name = 'Withdraw';
$Skill[SK_WITHDRAW]->Desc = 'Raises the user\'s Defense by 1 stage.';
$Skill[SK_WITHDRAW]->Type1 = ET_WATER;
$Skill[SK_WITHDRAW]->PP = 40;
$Skill[SK_WITHDRAW]->Power = '-1';
$Skill[SK_WITHDRAW]->Accuracy = 'N/A';


$Skill[SK_WRAP] = new SkillList;
$Skill[SK_WRAP]->Name = 'Wrap';
$Skill[SK_WRAP]->Desc = 'The user becomes uncontrollable and attacks for 2-5 consecutive turns;
the target cannot make attacks of its own during this time, but it may switch out, use items or run away.';
$Skill[SK_WRAP]->Type1 = ET_NORMAL;
$Skill[SK_WRAP]->PP = 20;
$Skill[SK_WRAP]->Power = '15';
$Skill[SK_WRAP]->Accuracy = '85';
