<?php
if ( !defined('pokemon') ) exit(); //This can only be included after an initial call.

/**
 *Monsterlists contain information about each generic pokemon template
*/
class MonsterList {
	public $Name;
	public $Desc;
	public $StartAttack;
	public $StartDefense;
	public $StartSpeed;
	public $StartSpecial;
        public $StartHP;
        public $Type1 = ET_NULL;
        public $DexNumber = 0;
        public $Happy;        
        public $CaptureRate;
        public $GrowthCurve = G_MEDFAST;  //0 Slow, 1 Normal, 2 Fast, 3 fading  
        public $EvolveID;
        public $EvolveMinLevel;
        public $EvolveItem;
        public $Male = 50;
}
/**
 *Skillup Classes are evolved Skills that are obtained by pokemon when they level up.
*/
class SkillUpList {
    public $ID;
    public $MinLevel; //Minimum level to unlock ability.
    public function __construct($ID, $MinLevel) {
        $this->ID = $ID;
        $this->MinLevel = $MinLevel;
    }
    
}

function GetBaseEXP($MonsterID) {
    return 64;
    
}

// ---------------------------------------------------------------------------- MONSTER LIST ----------------------------------------------------------------------
$MonsterTemplate[PK_NULL] = new MonsterList();
$MonsterTemplate[PK_NULL]->Name = 'Missingno';
$MonsterTemplate[PK_NULL]->StartAttack = 0;
$MonsterTemplate[PK_NULL]->StartDefense = 0;
$MonsterTemplate[PK_NULL]->StartSpeed = 0;
$MonsterTemplate[PK_NULL]->StartSpecial = 0;
$MonsterTemplate[PK_NULL]->StartHP = 0;
$MonsterTemplate[PK_NULL]->DexNumber = 0;
$SkillUp[PK_NULL][0] = new SkillUpList(SK_SPLASH, 0);

$MonsterTemplate[PK_ABRA] = new MonsterList();
$MonsterTemplate[PK_ABRA]->Name = 'Abra';
$MonsterTemplate[PK_ABRA]->Desc = 'Sleeps 18 hours a day. If it senses danger, it will teleport itself to safety even as it sleeps.';
$MonsterTemplate[PK_ABRA]->StartAttack = 20;
$MonsterTemplate[PK_ABRA]->StartDefense = 15;
$MonsterTemplate[PK_ABRA]->StartSpeed = 90;
$MonsterTemplate[PK_ABRA]->StartSpecial = 105;
$MonsterTemplate[PK_ABRA]->StartHP = 25;
$MonsterTemplate[PK_ABRA]->DexNumber = 63;
$MonsterTemplate[PK_ABRA]->Happy = -1;
$MonsterTemplate[PK_ABRA]->CaptureRate = -1;
$MonsterTemplate[PK_ABRA]->GrowthCurve = G_MEDFAST;
$MonsterTemplate[PK_ABRA]->EvolveID = PK_KADABRA;
$MonsterTemplate[PK_ABRA]->EvolveMinLevel = 16;
$MonsterTemplate[PK_ABRA]->Type1 = ET_PSYCHIC;
$MonsterTemplate[PK_ABRA]->Male = 75;
$SkillUp[PK_ABRA][0] = new SkillUpList(SK_TELEPORT, 0);


$MonsterTemplate[PK_AERODACTYL] = new MonsterList();
$MonsterTemplate[PK_AERODACTYL]->Name = 'Aerodactyl';
$MonsterTemplate[PK_AERODACTYL]->StartAttack = 105;
$MonsterTemplate[PK_AERODACTYL]->StartDefense = 65;
$MonsterTemplate[PK_AERODACTYL]->StartSpeed = 130;
$MonsterTemplate[PK_AERODACTYL]->StartSpecial = 60;
$MonsterTemplate[PK_AERODACTYL]->StartHP = 80;

$MonsterTemplate[PK_ALAKAZAM] = new MonsterList();
$MonsterTemplate[PK_ALAKAZAM]->Name = 'Alakazam';
$MonsterTemplate[PK_ALAKAZAM]->StartAttack = 50;
$MonsterTemplate[PK_ALAKAZAM]->StartDefense = 45;
$MonsterTemplate[PK_ALAKAZAM]->StartSpeed = 120;
$MonsterTemplate[PK_ALAKAZAM]->StartSpecial = 135;
$MonsterTemplate[PK_ALAKAZAM]->StartHP = 55;

$MonsterTemplate[PK_ARBOK] = new MonsterList();
$MonsterTemplate[PK_ARBOK]->Name = 'Arbok';
$MonsterTemplate[PK_ARBOK]->StartAttack = 85;
$MonsterTemplate[PK_ARBOK]->StartDefense = 69;
$MonsterTemplate[PK_ARBOK]->StartSpeed = 80;
$MonsterTemplate[PK_ARBOK]->StartSpecial = 65;
$MonsterTemplate[PK_ARBOK]->StartHP = 60;

$MonsterTemplate[PK_ARCANINE] = new MonsterList();
$MonsterTemplate[PK_ARCANINE]->Name = 'Arcanine';
$MonsterTemplate[PK_ARCANINE]->StartAttack = 110;
$MonsterTemplate[PK_ARCANINE]->StartDefense = 80;
$MonsterTemplate[PK_ARCANINE]->StartSpeed = 95;
$MonsterTemplate[PK_ARCANINE]->StartSpecial = 80;
$MonsterTemplate[PK_ARCANINE]->StartHP = 90;

$MonsterTemplate[PK_ARTICUNO] = new MonsterList();
$MonsterTemplate[PK_ARTICUNO]->Name = 'Articuno';
$MonsterTemplate[PK_ARTICUNO]->StartAttack = 85;
$MonsterTemplate[PK_ARTICUNO]->StartDefense = 100;
$MonsterTemplate[PK_ARTICUNO]->StartSpeed = 85;
$MonsterTemplate[PK_ARTICUNO]->StartSpecial = 125;
$MonsterTemplate[PK_ARTICUNO]->StartHP = 90;

$MonsterTemplate[PK_BEEDRILL] = new MonsterList();
$MonsterTemplate[PK_BEEDRILL]->Name = 'Beedrill';
$MonsterTemplate[PK_BEEDRILL]->StartAttack = 80;
$MonsterTemplate[PK_BEEDRILL]->StartDefense = 40;
$MonsterTemplate[PK_BEEDRILL]->StartSpeed = 75;
$MonsterTemplate[PK_BEEDRILL]->StartSpecial = 45;
$MonsterTemplate[PK_BEEDRILL]->StartHP = 65;

$MonsterTemplate[PK_BELLSPROUT] = new MonsterList();
$MonsterTemplate[PK_BELLSPROUT]->Name = 'Bellsprout';
$MonsterTemplate[PK_BELLSPROUT]->StartAttack = 75;
$MonsterTemplate[PK_BELLSPROUT]->StartDefense = 35;
$MonsterTemplate[PK_BELLSPROUT]->StartSpeed = 40;
$MonsterTemplate[PK_BELLSPROUT]->StartSpecial = 70;
$MonsterTemplate[PK_BELLSPROUT]->StartHP = 50;

$MonsterTemplate[PK_BLASTOISE] = new MonsterList();
$MonsterTemplate[PK_BLASTOISE]->Name = 'Blastoise';
$MonsterTemplate[PK_BLASTOISE]->StartAttack = 83;
$MonsterTemplate[PK_BLASTOISE]->StartDefense = 100;
$MonsterTemplate[PK_BLASTOISE]->StartSpeed = 78;
$MonsterTemplate[PK_BLASTOISE]->StartSpecial = 85;
$MonsterTemplate[PK_BLASTOISE]->StartHP = 79;

$MonsterTemplate[PK_BULBASAUR] = new MonsterList();
$MonsterTemplate[PK_BULBASAUR]->Name = 'Bulbasaur';
$MonsterTemplate[PK_BULBASAUR]->Desc = 'It can go for days without eating a single morsel. In the bulb on its back, it stores energy.';
$MonsterTemplate[PK_BULBASAUR]->StartAttack = 49;
$MonsterTemplate[PK_BULBASAUR]->StartDefense = 49;
$MonsterTemplate[PK_BULBASAUR]->StartSpeed = 45;
$MonsterTemplate[PK_BULBASAUR]->StartSpecial = 65;
$MonsterTemplate[PK_BULBASAUR]->StartHP = 45;
$MonsterTemplate[PK_BULBASAUR]->DexNumber = 1;
$MonsterTemplate[PK_BULBASAUR]->Happy = -1;
$MonsterTemplate[PK_BULBASAUR]->CaptureRate = -1;
$MonsterTemplate[PK_BULBASAUR]->GrowthCurve = G_MEDFAST;
$MonsterTemplate[PK_BULBASAUR]->EvolveID = PK_IVYSAUR;
$MonsterTemplate[PK_BULBASAUR]->EvolveMinLevel = 16;
$MonsterTemplate[PK_BULBASAUR]->Type1 = ET_GRASS;
$MonsterTemplate[PK_BULBASAUR]->Male = 87; //Percent of males
$SkillUp[PK_BULBASAUR][0] = new SkillUpList(SK_TACKLE, 0);
$SkillUp[PK_BULBASAUR][1] = new SkillUpList(SK_GROWL, 0);
$SkillUp[PK_BULBASAUR][2] = new SkillUpList(SK_LEECHSEED, 7);
$SkillUp[PK_BULBASAUR][3] = new SkillUpList(SK_VINEWHIP, 13);
$SkillUp[PK_BULBASAUR][4] = new SkillUpList(SK_POISONPOWDER, 20);
$SkillUp[PK_BULBASAUR][5] = new SkillUpList(SK_RAZORLEAF, 27);
$SkillUp[PK_BULBASAUR][6] = new SkillUpList(SK_GROWTH, 34);
$SkillUp[PK_BULBASAUR][7] = new SkillUpList(SK_SLEEPPOWDER, 41);
$SkillUp[PK_BULBASAUR][8] = new SkillUpList(SK_SOLARBEAM, 48);

$MonsterTemplate[PK_BUTTERFREE] = new MonsterList();
$MonsterTemplate[PK_BUTTERFREE]->Name = 'Butterfree';
$MonsterTemplate[PK_BUTTERFREE]->StartAttack = 45;
$MonsterTemplate[PK_BUTTERFREE]->StartDefense = 50;
$MonsterTemplate[PK_BUTTERFREE]->StartSpeed = 70;
$MonsterTemplate[PK_BUTTERFREE]->StartSpecial = 80;
$MonsterTemplate[PK_BUTTERFREE]->StartHP = 60;

$MonsterTemplate[PK_CATERPIE] = new MonsterList();
$MonsterTemplate[PK_CATERPIE]->Name = 'Caterpie';
$MonsterTemplate[PK_CATERPIE]->StartAttack = 30;
$MonsterTemplate[PK_CATERPIE]->StartDefense = 35;
$MonsterTemplate[PK_CATERPIE]->StartSpeed = 45;
$MonsterTemplate[PK_CATERPIE]->StartSpecial = 20;
$MonsterTemplate[PK_CATERPIE]->StartHP = 45;

$MonsterTemplate[PK_CHANSEY] = new MonsterList();
$MonsterTemplate[PK_CHANSEY]->Name = 'Chansey';
$MonsterTemplate[PK_CHANSEY]->StartAttack = 5;
$MonsterTemplate[PK_CHANSEY]->StartDefense = 5;
$MonsterTemplate[PK_CHANSEY]->StartSpeed = 50;
$MonsterTemplate[PK_CHANSEY]->StartSpecial = 105;
$MonsterTemplate[PK_CHANSEY]->StartHP = 250;

$MonsterTemplate[PK_CHARIZARD] = new MonsterList();
$MonsterTemplate[PK_CHARIZARD]->Name = 'Charizard';
$MonsterTemplate[PK_CHARIZARD]->StartAttack = 84;
$MonsterTemplate[PK_CHARIZARD]->StartDefense = 78;
$MonsterTemplate[PK_CHARIZARD]->StartSpeed = 100;
$MonsterTemplate[PK_CHARIZARD]->StartSpecial = 85;
$MonsterTemplate[PK_CHARIZARD]->StartHP = 78;

$MonsterTemplate[PK_CHARMANDER] = new MonsterList();
$MonsterTemplate[PK_CHARMANDER]->Name = 'Charmander';
$MonsterTemplate[PK_CHARMANDER]->Desc = 'The flame at the tip of its tail makes a sound as it burns. You can only hear it in quiet places.';
$MonsterTemplate[PK_CHARMANDER]->StartAttack = 52;
$MonsterTemplate[PK_CHARMANDER]->StartDefense = 43;
$MonsterTemplate[PK_CHARMANDER]->StartSpeed = 65;
$MonsterTemplate[PK_CHARMANDER]->StartSpecial = 50;
$MonsterTemplate[PK_CHARMANDER]->StartHP = 39;
$MonsterTemplate[PK_CHARMANDER]->DexNumber = 4;
$MonsterTemplate[PK_CHARMANDER]->Happy = -1;
$MonsterTemplate[PK_CHARMANDER]->CaptureRate = -1;
$MonsterTemplate[PK_CHARMANDER]->GrowthCurve = G_MEDFAST;
$MonsterTemplate[PK_CHARMANDER]->EvolveID = PK_CHARIZARD;
$MonsterTemplate[PK_CHARMANDER]->EvolveMinLevel = 16;
$MonsterTemplate[PK_CHARMANDER]->Type1 = ET_FIRE;
$MonsterTemplate[PK_CHARMANDER]->Male = 87;
$SkillUp[PK_CHARMANDER][0] = new SkillUpList(SK_SCRATCH, 0);
$SkillUp[PK_CHARMANDER][1] = new SkillUpList(SK_GROWL, 0);
$SkillUp[PK_CHARMANDER][2] = new SkillUpList(SK_EMBER, 9);
$SkillUp[PK_CHARMANDER][3] = new SkillUpList(SK_LEER, 15);
$SkillUp[PK_CHARMANDER][4] = new SkillUpList(SK_RAGE, 22);
$SkillUp[PK_CHARMANDER][5] = new SkillUpList(SK_SLASH, 30);
$SkillUp[PK_CHARMANDER][6] = new SkillUpList(SK_FLAMETHROWER, 38);
$SkillUp[PK_CHARMANDER][7] = new SkillUpList(SK_FIRESPIN, 49);


$MonsterTemplate[PK_CHARMELEON] = new MonsterList();
$MonsterTemplate[PK_CHARMELEON]->Name = 'Charmeleon';
$MonsterTemplate[PK_CHARMELEON]->StartAttack = 64;
$MonsterTemplate[PK_CHARMELEON]->StartDefense = 58;
$MonsterTemplate[PK_CHARMELEON]->StartSpeed = 80;
$MonsterTemplate[PK_CHARMELEON]->StartSpecial = 65;
$MonsterTemplate[PK_CHARMELEON]->StartHP = 58;

$MonsterTemplate[PK_CLEFABLE] = new MonsterList();
$MonsterTemplate[PK_CLEFABLE]->Name = 'Clefable';
$MonsterTemplate[PK_CLEFABLE]->StartAttack = 70;
$MonsterTemplate[PK_CLEFABLE]->StartDefense = 73;
$MonsterTemplate[PK_CLEFABLE]->StartSpeed = 60;
$MonsterTemplate[PK_CLEFABLE]->StartSpecial = 85;
$MonsterTemplate[PK_CLEFABLE]->StartHP = 95;

$MonsterTemplate[PK_CLEFAIRY] = new MonsterList();
$MonsterTemplate[PK_CLEFAIRY]->Name = 'Clefairy';
$MonsterTemplate[PK_CLEFAIRY]->StartAttack = 45;
$MonsterTemplate[PK_CLEFAIRY]->StartDefense = 48;
$MonsterTemplate[PK_CLEFAIRY]->StartSpeed = 35;
$MonsterTemplate[PK_CLEFAIRY]->StartSpecial = 60;
$MonsterTemplate[PK_CLEFAIRY]->StartHP = 70;

$MonsterTemplate[PK_CLOYSTER] = new MonsterList();
$MonsterTemplate[PK_CLOYSTER]->Name = 'Cloyster';
$MonsterTemplate[PK_CLOYSTER]->StartAttack = 95;
$MonsterTemplate[PK_CLOYSTER]->StartDefense = 180;
$MonsterTemplate[PK_CLOYSTER]->StartSpeed = 70;
$MonsterTemplate[PK_CLOYSTER]->StartSpecial = 85;
$MonsterTemplate[PK_CLOYSTER]->StartHP = 50;

$MonsterTemplate[PK_CUBONE] = new MonsterList();
$MonsterTemplate[PK_CUBONE]->Name = 'Cubone';
$MonsterTemplate[PK_CUBONE]->StartAttack = 50;
$MonsterTemplate[PK_CUBONE]->StartDefense = 95;
$MonsterTemplate[PK_CUBONE]->StartSpeed = 35;
$MonsterTemplate[PK_CUBONE]->StartSpecial = 40;
$MonsterTemplate[PK_CUBONE]->StartHP = 50;

$MonsterTemplate[PK_DEWGONG] = new MonsterList();
$MonsterTemplate[PK_DEWGONG]->Name = 'Dewgong';
$MonsterTemplate[PK_DEWGONG]->StartAttack = 70;
$MonsterTemplate[PK_DEWGONG]->StartDefense = 80;
$MonsterTemplate[PK_DEWGONG]->StartSpeed = 70;
$MonsterTemplate[PK_DEWGONG]->StartSpecial = 95;
$MonsterTemplate[PK_DEWGONG]->StartHP = 90;

$MonsterTemplate[PK_DIGLETT] = new MonsterList();
$MonsterTemplate[PK_DIGLETT]->Name = 'Diglett';
$MonsterTemplate[PK_DIGLETT]->StartAttack = 55;
$MonsterTemplate[PK_DIGLETT]->StartDefense = 25;
$MonsterTemplate[PK_DIGLETT]->StartSpeed = 95;
$MonsterTemplate[PK_DIGLETT]->StartSpecial = 45;
$MonsterTemplate[PK_DIGLETT]->StartHP = 10;

$MonsterTemplate[PK_DITTO] = new MonsterList();
$MonsterTemplate[PK_DITTO]->Name = 'Ditto';
$MonsterTemplate[PK_DITTO]->StartAttack = 48;
$MonsterTemplate[PK_DITTO]->StartDefense = 48;
$MonsterTemplate[PK_DITTO]->StartSpeed = 48;
$MonsterTemplate[PK_DITTO]->StartSpecial = 48;
$MonsterTemplate[PK_DITTO]->StartHP = 48;

$MonsterTemplate[PK_DODRIO] = new MonsterList();
$MonsterTemplate[PK_DODRIO]->Name = 'Dodrio';
$MonsterTemplate[PK_DODRIO]->StartAttack = 110;
$MonsterTemplate[PK_DODRIO]->StartDefense = 70;
$MonsterTemplate[PK_DODRIO]->StartSpeed = 100;
$MonsterTemplate[PK_DODRIO]->StartSpecial = 60;
$MonsterTemplate[PK_DODRIO]->StartHP = 60;

$MonsterTemplate[PK_DODUO] = new MonsterList();
$MonsterTemplate[PK_DODUO]->Name = 'Doduo';
$MonsterTemplate[PK_DODUO]->StartAttack = 85;
$MonsterTemplate[PK_DODUO]->StartDefense = 45;
$MonsterTemplate[PK_DODUO]->StartSpeed = 75;
$MonsterTemplate[PK_DODUO]->StartSpecial = 35;
$MonsterTemplate[PK_DODUO]->StartHP = 35;

$MonsterTemplate[PK_DRAGONAIR] = new MonsterList();
$MonsterTemplate[PK_DRAGONAIR]->Name = 'Dragonair';
$MonsterTemplate[PK_DRAGONAIR]->StartAttack = 84;
$MonsterTemplate[PK_DRAGONAIR]->StartDefense = 65;
$MonsterTemplate[PK_DRAGONAIR]->StartSpeed = 70;
$MonsterTemplate[PK_DRAGONAIR]->StartSpecial = 70;
$MonsterTemplate[PK_DRAGONAIR]->StartHP = 61;

$MonsterTemplate[PK_DRAGONITE] = new MonsterList();
$MonsterTemplate[PK_DRAGONITE]->Name = 'Dragonite';
$MonsterTemplate[PK_DRAGONITE]->StartAttack = 134;
$MonsterTemplate[PK_DRAGONITE]->StartDefense = 95;
$MonsterTemplate[PK_DRAGONITE]->StartSpeed = 80;
$MonsterTemplate[PK_DRAGONITE]->StartSpecial = 100;
$MonsterTemplate[PK_DRAGONITE]->StartHP = 91;

$MonsterTemplate[PK_DRATINI] = new MonsterList();
$MonsterTemplate[PK_DRATINI]->Name = 'Dratini';
$MonsterTemplate[PK_DRATINI]->StartAttack = 64;
$MonsterTemplate[PK_DRATINI]->StartDefense = 45;
$MonsterTemplate[PK_DRATINI]->StartSpeed = 50;
$MonsterTemplate[PK_DRATINI]->StartSpecial = 50;
$MonsterTemplate[PK_DRATINI]->StartHP = 41;

$MonsterTemplate[PK_DROWZEE] = new MonsterList();
$MonsterTemplate[PK_DROWZEE]->Name = 'Drowzee';
$MonsterTemplate[PK_DROWZEE]->StartAttack = 48;
$MonsterTemplate[PK_DROWZEE]->StartDefense = 45;
$MonsterTemplate[PK_DROWZEE]->StartSpeed = 42;
$MonsterTemplate[PK_DROWZEE]->StartSpecial = 90;
$MonsterTemplate[PK_DROWZEE]->StartHP = 60;

$MonsterTemplate[PK_DUGTRIO] = new MonsterList();
$MonsterTemplate[PK_DUGTRIO]->Name = 'Dugtrio';
$MonsterTemplate[PK_DUGTRIO]->StartAttack = 80;
$MonsterTemplate[PK_DUGTRIO]->StartDefense = 50;
$MonsterTemplate[PK_DUGTRIO]->StartSpeed = 120;
$MonsterTemplate[PK_DUGTRIO]->StartSpecial = 70;
$MonsterTemplate[PK_DUGTRIO]->StartHP = 35;

$MonsterTemplate[PK_EEVEE] = new MonsterList();
$MonsterTemplate[PK_EEVEE]->Name = 'Eevee';
$MonsterTemplate[PK_EEVEE]->StartAttack = 55;
$MonsterTemplate[PK_EEVEE]->StartDefense = 50;
$MonsterTemplate[PK_EEVEE]->StartSpeed = 55;
$MonsterTemplate[PK_EEVEE]->StartSpecial = 65;
$MonsterTemplate[PK_EEVEE]->StartHP = 55;

$MonsterTemplate[PK_EKANS] = new MonsterList();
$MonsterTemplate[PK_EKANS]->Name = 'Ekans';
$MonsterTemplate[PK_EKANS]->StartAttack = 60;
$MonsterTemplate[PK_EKANS]->StartDefense = 44;
$MonsterTemplate[PK_EKANS]->StartSpeed = 55;
$MonsterTemplate[PK_EKANS]->StartSpecial = 40;
$MonsterTemplate[PK_EKANS]->StartHP = 35;

$MonsterTemplate[PK_ELECTABUZZ] = new MonsterList();
$MonsterTemplate[PK_ELECTABUZZ]->Name = 'Electabuzz';
$MonsterTemplate[PK_ELECTABUZZ]->StartAttack = 83;
$MonsterTemplate[PK_ELECTABUZZ]->StartDefense = 57;
$MonsterTemplate[PK_ELECTABUZZ]->StartSpeed = 105;
$MonsterTemplate[PK_ELECTABUZZ]->StartSpecial = 85;
$MonsterTemplate[PK_ELECTABUZZ]->StartHP = 65;

$MonsterTemplate[PK_ELECTRODE] = new MonsterList();
$MonsterTemplate[PK_ELECTRODE]->Name = 'Electrode';
$MonsterTemplate[PK_ELECTRODE]->StartAttack = 50;
$MonsterTemplate[PK_ELECTRODE]->StartDefense = 70;
$MonsterTemplate[PK_ELECTRODE]->StartSpeed = 140;
$MonsterTemplate[PK_ELECTRODE]->StartSpecial = 80;
$MonsterTemplate[PK_ELECTRODE]->StartHP = 60;

$MonsterTemplate[PK_EXEGGCUTE] = new MonsterList();
$MonsterTemplate[PK_EXEGGCUTE]->Name = 'Exeggcute';
$MonsterTemplate[PK_EXEGGCUTE]->StartAttack = 40;
$MonsterTemplate[PK_EXEGGCUTE]->StartDefense = 80;
$MonsterTemplate[PK_EXEGGCUTE]->StartSpeed = 40;
$MonsterTemplate[PK_EXEGGCUTE]->StartSpecial = 60;
$MonsterTemplate[PK_EXEGGCUTE]->StartHP = 60;

$MonsterTemplate[PK_EXEGGUTOR] = new MonsterList();
$MonsterTemplate[PK_EXEGGUTOR]->Name = 'Exeggutor';
$MonsterTemplate[PK_EXEGGUTOR]->StartAttack = 95;
$MonsterTemplate[PK_EXEGGUTOR]->StartDefense = 85;
$MonsterTemplate[PK_EXEGGUTOR]->StartSpeed = 55;
$MonsterTemplate[PK_EXEGGUTOR]->StartSpecial = 125;
$MonsterTemplate[PK_EXEGGUTOR]->StartHP = 95;

$MonsterTemplate[PK_FARFETCHD] = new MonsterList();
$MonsterTemplate[PK_FARFETCHD]->Name = 'Farfetch\'d';
$MonsterTemplate[PK_FARFETCHD]->StartAttack = 65;
$MonsterTemplate[PK_FARFETCHD]->StartDefense = 55;
$MonsterTemplate[PK_FARFETCHD]->StartSpeed = 60;
$MonsterTemplate[PK_FARFETCHD]->StartSpecial = 58;
$MonsterTemplate[PK_FARFETCHD]->StartHP = 52;

$MonsterTemplate[PK_FEAROW] = new MonsterList();
$MonsterTemplate[PK_FEAROW]->Name = 'Fearow';
$MonsterTemplate[PK_FEAROW]->StartAttack = 90;
$MonsterTemplate[PK_FEAROW]->StartDefense = 65;
$MonsterTemplate[PK_FEAROW]->StartSpeed = 100;
$MonsterTemplate[PK_FEAROW]->StartSpecial = 61;
$MonsterTemplate[PK_FEAROW]->StartHP = 65;

$MonsterTemplate[PK_FLAREON] = new MonsterList();
$MonsterTemplate[PK_FLAREON]->Name = 'Flareon';
$MonsterTemplate[PK_FLAREON]->StartAttack = 130;
$MonsterTemplate[PK_FLAREON]->StartDefense = 60;
$MonsterTemplate[PK_FLAREON]->StartSpeed = 65;
$MonsterTemplate[PK_FLAREON]->StartSpecial = 110;
$MonsterTemplate[PK_FLAREON]->StartHP = 65;

$MonsterTemplate[PK_GASTLY] = new MonsterList();
$MonsterTemplate[PK_GASTLY]->Name = 'Gastly';
$MonsterTemplate[PK_GASTLY]->StartAttack = 35;
$MonsterTemplate[PK_GASTLY]->StartDefense = 30;
$MonsterTemplate[PK_GASTLY]->StartSpeed = 80;
$MonsterTemplate[PK_GASTLY]->StartSpecial = 100;
$MonsterTemplate[PK_GASTLY]->StartHP = 30;

$MonsterTemplate[PK_GENGAR] = new MonsterList();
$MonsterTemplate[PK_GENGAR]->Name = 'Gengar';
$MonsterTemplate[PK_GENGAR]->StartAttack = 65;
$MonsterTemplate[PK_GENGAR]->StartDefense = 60;
$MonsterTemplate[PK_GENGAR]->StartSpeed = 110;
$MonsterTemplate[PK_GENGAR]->StartSpecial = 130;
$MonsterTemplate[PK_GENGAR]->StartHP = 60;

$MonsterTemplate[PK_GEODUDE] = new MonsterList();
$MonsterTemplate[PK_GEODUDE]->Name = 'Geodude';
$MonsterTemplate[PK_GEODUDE]->StartAttack = 80;
$MonsterTemplate[PK_GEODUDE]->StartDefense = 100;
$MonsterTemplate[PK_GEODUDE]->StartSpeed = 20;
$MonsterTemplate[PK_GEODUDE]->StartSpecial = 30;
$MonsterTemplate[PK_GEODUDE]->StartHP = 40;

$MonsterTemplate[PK_GLOOM] = new MonsterList();
$MonsterTemplate[PK_GLOOM]->Name = 'Gloom';
$MonsterTemplate[PK_GLOOM]->StartAttack = 65;
$MonsterTemplate[PK_GLOOM]->StartDefense = 70;
$MonsterTemplate[PK_GLOOM]->StartSpeed = 40;
$MonsterTemplate[PK_GLOOM]->StartSpecial = 85;
$MonsterTemplate[PK_GLOOM]->StartHP = 60;

$MonsterTemplate[PK_GOLBAT] = new MonsterList();
$MonsterTemplate[PK_GOLBAT]->Name = 'Golbat';
$MonsterTemplate[PK_GOLBAT]->StartAttack = 80;
$MonsterTemplate[PK_GOLBAT]->StartDefense = 70;
$MonsterTemplate[PK_GOLBAT]->StartSpeed = 90;
$MonsterTemplate[PK_GOLBAT]->StartSpecial = 75;
$MonsterTemplate[PK_GOLBAT]->StartHP = 75;

$MonsterTemplate[PK_GOLDEEN] = new MonsterList();
$MonsterTemplate[PK_GOLDEEN]->Name = 'Goldeen';
$MonsterTemplate[PK_GOLDEEN]->StartAttack = 67;
$MonsterTemplate[PK_GOLDEEN]->StartDefense = 60;
$MonsterTemplate[PK_GOLDEEN]->StartSpeed = 63;
$MonsterTemplate[PK_GOLDEEN]->StartSpecial = 50;
$MonsterTemplate[PK_GOLDEEN]->StartHP = 45;

$MonsterTemplate[PK_GOLDUCK] = new MonsterList();
$MonsterTemplate[PK_GOLDUCK]->Name = 'Golduck';
$MonsterTemplate[PK_GOLDUCK]->StartAttack = 82;
$MonsterTemplate[PK_GOLDUCK]->StartDefense = 78;
$MonsterTemplate[PK_GOLDUCK]->StartSpeed = 85;
$MonsterTemplate[PK_GOLDUCK]->StartSpecial = 80;
$MonsterTemplate[PK_GOLDUCK]->StartHP = 80;

$MonsterTemplate[PK_GOLEM] = new MonsterList();
$MonsterTemplate[PK_GOLEM]->Name = 'Golem';
$MonsterTemplate[PK_GOLEM]->StartAttack = 110;
$MonsterTemplate[PK_GOLEM]->StartDefense = 130;
$MonsterTemplate[PK_GOLEM]->StartSpeed = 45;
$MonsterTemplate[PK_GOLEM]->StartSpecial = 55;
$MonsterTemplate[PK_GOLEM]->StartHP = 80;

$MonsterTemplate[PK_GRAVELER] = new MonsterList();
$MonsterTemplate[PK_GRAVELER]->Name = 'Graveler';
$MonsterTemplate[PK_GRAVELER]->StartAttack = 95;
$MonsterTemplate[PK_GRAVELER]->StartDefense = 115;
$MonsterTemplate[PK_GRAVELER]->StartSpeed = 35;
$MonsterTemplate[PK_GRAVELER]->StartSpecial = 45;
$MonsterTemplate[PK_GRAVELER]->StartHP = 55;

$MonsterTemplate[PK_GRIMER] = new MonsterList();
$MonsterTemplate[PK_GRIMER]->Name = 'Grimer';
$MonsterTemplate[PK_GRIMER]->StartAttack = 80;
$MonsterTemplate[PK_GRIMER]->StartDefense = 50;
$MonsterTemplate[PK_GRIMER]->StartSpeed = 25;
$MonsterTemplate[PK_GRIMER]->StartSpecial = 40;
$MonsterTemplate[PK_GRIMER]->StartHP = 80;

$MonsterTemplate[PK_GROWLITHE] = new MonsterList();
$MonsterTemplate[PK_GROWLITHE]->Name = 'Growlithe';
$MonsterTemplate[PK_GROWLITHE]->StartAttack = 70;
$MonsterTemplate[PK_GROWLITHE]->StartDefense = 45;
$MonsterTemplate[PK_GROWLITHE]->StartSpeed = 60;
$MonsterTemplate[PK_GROWLITHE]->StartSpecial = 50;
$MonsterTemplate[PK_GROWLITHE]->StartHP = 55;

$MonsterTemplate[PK_GYARADOS] = new MonsterList();
$MonsterTemplate[PK_GYARADOS]->Name = 'Gyarados';
$MonsterTemplate[PK_GYARADOS]->StartAttack = 125;
$MonsterTemplate[PK_GYARADOS]->StartDefense = 79;
$MonsterTemplate[PK_GYARADOS]->StartSpeed = 81;
$MonsterTemplate[PK_GYARADOS]->StartSpecial = 100;
$MonsterTemplate[PK_GYARADOS]->StartHP = 95;

$MonsterTemplate[PK_HAUNTER] = new MonsterList();
$MonsterTemplate[PK_HAUNTER]->Name = 'Haunter';
$MonsterTemplate[PK_HAUNTER]->StartAttack = 50;
$MonsterTemplate[PK_HAUNTER]->StartDefense = 45;
$MonsterTemplate[PK_HAUNTER]->StartSpeed = 95;
$MonsterTemplate[PK_HAUNTER]->StartSpecial = 115;
$MonsterTemplate[PK_HAUNTER]->StartHP = 45;

$MonsterTemplate[PK_HITMONCHAN] = new MonsterList();
$MonsterTemplate[PK_HITMONCHAN]->Name = 'Hitmonchan';
$MonsterTemplate[PK_HITMONCHAN]->StartAttack = 105;
$MonsterTemplate[PK_HITMONCHAN]->StartDefense = 79;
$MonsterTemplate[PK_HITMONCHAN]->StartSpeed = 76;
$MonsterTemplate[PK_HITMONCHAN]->StartSpecial = 35;
$MonsterTemplate[PK_HITMONCHAN]->StartHP = 50;

$MonsterTemplate[PK_HITMONLEE] = new MonsterList();
$MonsterTemplate[PK_HITMONLEE]->Name = 'Hitmonlee';
$MonsterTemplate[PK_HITMONLEE]->StartAttack = 120;
$MonsterTemplate[PK_HITMONLEE]->StartDefense = 53;
$MonsterTemplate[PK_HITMONLEE]->StartSpeed = 87;
$MonsterTemplate[PK_HITMONLEE]->StartSpecial = 35;
$MonsterTemplate[PK_HITMONLEE]->StartHP = 50;

$MonsterTemplate[PK_HORSEA] = new MonsterList();
$MonsterTemplate[PK_HORSEA]->Name = 'Horsea';
$MonsterTemplate[PK_HORSEA]->StartAttack = 40;
$MonsterTemplate[PK_HORSEA]->StartDefense = 70;
$MonsterTemplate[PK_HORSEA]->StartSpeed = 60;
$MonsterTemplate[PK_HORSEA]->StartSpecial = 70;
$MonsterTemplate[PK_HORSEA]->StartHP = 30;

$MonsterTemplate[PK_HYPNO] = new MonsterList();
$MonsterTemplate[PK_HYPNO]->Name = 'Hypno';
$MonsterTemplate[PK_HYPNO]->StartAttack = 73;
$MonsterTemplate[PK_HYPNO]->StartDefense = 70;
$MonsterTemplate[PK_HYPNO]->StartSpeed = 67;
$MonsterTemplate[PK_HYPNO]->StartSpecial = 115;
$MonsterTemplate[PK_HYPNO]->StartHP = 85;

$MonsterTemplate[PK_IVYSAUR] = new MonsterList();
$MonsterTemplate[PK_IVYSAUR]->Name = 'Ivysaur';
$MonsterTemplate[PK_IVYSAUR]->StartAttack = 62;
$MonsterTemplate[PK_IVYSAUR]->StartDefense = 63;
$MonsterTemplate[PK_IVYSAUR]->StartSpeed = 60;
$MonsterTemplate[PK_IVYSAUR]->StartSpecial = 80;
$MonsterTemplate[PK_IVYSAUR]->StartHP = 60;

$MonsterTemplate[PK_JIGGLYPUFF] = new MonsterList();
$MonsterTemplate[PK_JIGGLYPUFF]->Name = 'Jigglypuff';
$MonsterTemplate[PK_JIGGLYPUFF]->StartAttack = 45;
$MonsterTemplate[PK_JIGGLYPUFF]->StartDefense = 20;
$MonsterTemplate[PK_JIGGLYPUFF]->StartSpeed = 20;
$MonsterTemplate[PK_JIGGLYPUFF]->StartSpecial = 25;
$MonsterTemplate[PK_JIGGLYPUFF]->StartHP = 115;

$MonsterTemplate[PK_JOLTEON] = new MonsterList();
$MonsterTemplate[PK_JOLTEON]->Name = 'Jolteon';
$MonsterTemplate[PK_JOLTEON]->StartAttack = 65;
$MonsterTemplate[PK_JOLTEON]->StartDefense = 60;
$MonsterTemplate[PK_JOLTEON]->StartSpeed = 130;
$MonsterTemplate[PK_JOLTEON]->StartSpecial = 110;
$MonsterTemplate[PK_JOLTEON]->StartHP = 65;

$MonsterTemplate[PK_JYNX] = new MonsterList();
$MonsterTemplate[PK_JYNX]->Name = 'Jynx';
$MonsterTemplate[PK_JYNX]->StartAttack = 50;
$MonsterTemplate[PK_JYNX]->StartDefense = 35;
$MonsterTemplate[PK_JYNX]->StartSpeed = 95;
$MonsterTemplate[PK_JYNX]->StartSpecial = 95;
$MonsterTemplate[PK_JYNX]->StartHP = 65;

$MonsterTemplate[PK_KABUTO] = new MonsterList();
$MonsterTemplate[PK_KABUTO]->Name = 'Kabuto';
$MonsterTemplate[PK_KABUTO]->StartAttack = 80;
$MonsterTemplate[PK_KABUTO]->StartDefense = 90;
$MonsterTemplate[PK_KABUTO]->StartSpeed = 55;
$MonsterTemplate[PK_KABUTO]->StartSpecial = 45;
$MonsterTemplate[PK_KABUTO]->StartHP = 30;

$MonsterTemplate[PK_KABUTOPS] = new MonsterList();
$MonsterTemplate[PK_KABUTOPS]->Name = 'Kabutops';
$MonsterTemplate[PK_KABUTOPS]->StartAttack = 115;
$MonsterTemplate[PK_KABUTOPS]->StartDefense = 105;
$MonsterTemplate[PK_KABUTOPS]->StartSpeed = 80;
$MonsterTemplate[PK_KABUTOPS]->StartSpecial = 70;
$MonsterTemplate[PK_KABUTOPS]->StartHP = 60;

$MonsterTemplate[PK_KADABRA] = new MonsterList();
$MonsterTemplate[PK_KADABRA]->Name = 'Kadabra';
$MonsterTemplate[PK_KADABRA]->StartAttack = 35;
$MonsterTemplate[PK_KADABRA]->StartDefense = 30;
$MonsterTemplate[PK_KADABRA]->StartSpeed = 105;
$MonsterTemplate[PK_KADABRA]->StartSpecial = 120;
$MonsterTemplate[PK_KADABRA]->StartHP = 40;

$MonsterTemplate[PK_KAKUNA] = new MonsterList();
$MonsterTemplate[PK_KAKUNA]->Name = 'Kakuna';
$MonsterTemplate[PK_KAKUNA]->StartAttack = 25;
$MonsterTemplate[PK_KAKUNA]->StartDefense = 50;
$MonsterTemplate[PK_KAKUNA]->StartSpeed = 35;
$MonsterTemplate[PK_KAKUNA]->StartSpecial = 25;
$MonsterTemplate[PK_KAKUNA]->StartHP = 45;

$MonsterTemplate[PK_KANGASKHAN] = new MonsterList();
$MonsterTemplate[PK_KANGASKHAN]->Name = 'Kangaskhan';
$MonsterTemplate[PK_KANGASKHAN]->StartAttack = 95;
$MonsterTemplate[PK_KANGASKHAN]->StartDefense = 80;
$MonsterTemplate[PK_KANGASKHAN]->StartSpeed = 90;
$MonsterTemplate[PK_KANGASKHAN]->StartSpecial = 40;
$MonsterTemplate[PK_KANGASKHAN]->StartHP = 105;

$MonsterTemplate[PK_KINGLER] = new MonsterList();
$MonsterTemplate[PK_KINGLER]->Name = 'Kingler';
$MonsterTemplate[PK_KINGLER]->StartAttack = 130;
$MonsterTemplate[PK_KINGLER]->StartDefense = 115;
$MonsterTemplate[PK_KINGLER]->StartSpeed = 75;
$MonsterTemplate[PK_KINGLER]->StartSpecial = 50;
$MonsterTemplate[PK_KINGLER]->StartHP = 55;

$MonsterTemplate[PK_KOFFING] = new MonsterList();
$MonsterTemplate[PK_KOFFING]->Name = 'Koffing';
$MonsterTemplate[PK_KOFFING]->StartAttack = 65;
$MonsterTemplate[PK_KOFFING]->StartDefense = 95;
$MonsterTemplate[PK_KOFFING]->StartSpeed = 35;
$MonsterTemplate[PK_KOFFING]->StartSpecial = 60;
$MonsterTemplate[PK_KOFFING]->StartHP = 40;

$MonsterTemplate[PK_KRABBY] = new MonsterList();
$MonsterTemplate[PK_KRABBY]->Name = 'Krabby';
$MonsterTemplate[PK_KRABBY]->StartAttack = 105;
$MonsterTemplate[PK_KRABBY]->StartDefense = 90;
$MonsterTemplate[PK_KRABBY]->StartSpeed = 50;
$MonsterTemplate[PK_KRABBY]->StartSpecial = 25;
$MonsterTemplate[PK_KRABBY]->StartHP = 30;

$MonsterTemplate[PK_LAPRAS] = new MonsterList();
$MonsterTemplate[PK_LAPRAS]->Name = 'Lapras';
$MonsterTemplate[PK_LAPRAS]->StartAttack = 85;
$MonsterTemplate[PK_LAPRAS]->StartDefense = 80;
$MonsterTemplate[PK_LAPRAS]->StartSpeed = 60;
$MonsterTemplate[PK_LAPRAS]->StartSpecial = 95;
$MonsterTemplate[PK_LAPRAS]->StartHP = 130;

$MonsterTemplate[PK_LICKITUNG] = new MonsterList();
$MonsterTemplate[PK_LICKITUNG]->Name = 'Lickitung';
$MonsterTemplate[PK_LICKITUNG]->StartAttack = 55;
$MonsterTemplate[PK_LICKITUNG]->StartDefense = 75;
$MonsterTemplate[PK_LICKITUNG]->StartSpeed = 30;
$MonsterTemplate[PK_LICKITUNG]->StartSpecial = 60;
$MonsterTemplate[PK_LICKITUNG]->StartHP = 90;

$MonsterTemplate[PK_MACHAMP] = new MonsterList();
$MonsterTemplate[PK_MACHAMP]->Name = 'Machamp';
$MonsterTemplate[PK_MACHAMP]->StartAttack = 130;
$MonsterTemplate[PK_MACHAMP]->StartDefense = 80;
$MonsterTemplate[PK_MACHAMP]->StartSpeed = 55;
$MonsterTemplate[PK_MACHAMP]->StartSpecial = 65;
$MonsterTemplate[PK_MACHAMP]->StartHP = 90;

$MonsterTemplate[PK_MACHOKE] = new MonsterList();
$MonsterTemplate[PK_MACHOKE]->Name = 'Machoke';
$MonsterTemplate[PK_MACHOKE]->StartAttack = 100;
$MonsterTemplate[PK_MACHOKE]->StartDefense = 70;
$MonsterTemplate[PK_MACHOKE]->StartSpeed = 45;
$MonsterTemplate[PK_MACHOKE]->StartSpecial = 50;
$MonsterTemplate[PK_MACHOKE]->StartHP = 80;

$MonsterTemplate[PK_MACHOP] = new MonsterList();
$MonsterTemplate[PK_MACHOP]->Name = 'Machop';
$MonsterTemplate[PK_MACHOP]->StartAttack = 80;
$MonsterTemplate[PK_MACHOP]->StartDefense = 50;
$MonsterTemplate[PK_MACHOP]->StartSpeed = 35;
$MonsterTemplate[PK_MACHOP]->StartSpecial = 35;
$MonsterTemplate[PK_MACHOP]->StartHP = 70;

$MonsterTemplate[PK_MAGIKARP] = new MonsterList();
$MonsterTemplate[PK_MAGIKARP]->Name = 'Magikarp';
$MonsterTemplate[PK_MAGIKARP]->StartAttack = 10;
$MonsterTemplate[PK_MAGIKARP]->StartDefense = 55;
$MonsterTemplate[PK_MAGIKARP]->StartSpeed = 80;
$MonsterTemplate[PK_MAGIKARP]->StartSpecial = 20;
$MonsterTemplate[PK_MAGIKARP]->StartHP = 20;

$MonsterTemplate[PK_MAGMAR] = new MonsterList();
$MonsterTemplate[PK_MAGMAR]->Name = 'Magmar';
$MonsterTemplate[PK_MAGMAR]->StartAttack = 95;
$MonsterTemplate[PK_MAGMAR]->StartDefense = 57;
$MonsterTemplate[PK_MAGMAR]->StartSpeed = 93;
$MonsterTemplate[PK_MAGMAR]->StartSpecial = 85;
$MonsterTemplate[PK_MAGMAR]->StartHP = 65;

$MonsterTemplate[PK_MAGNEMITE] = new MonsterList();
$MonsterTemplate[PK_MAGNEMITE]->Name = 'Magnemite';
$MonsterTemplate[PK_MAGNEMITE]->StartAttack = 35;
$MonsterTemplate[PK_MAGNEMITE]->StartDefense = 70;
$MonsterTemplate[PK_MAGNEMITE]->StartSpeed = 45;
$MonsterTemplate[PK_MAGNEMITE]->StartSpecial = 95;
$MonsterTemplate[PK_MAGNEMITE]->StartHP = 25;

$MonsterTemplate[PK_MAGNETON] = new MonsterList();
$MonsterTemplate[PK_MAGNETON]->Name = 'Magneton';
$MonsterTemplate[PK_MAGNETON]->StartAttack = 60;
$MonsterTemplate[PK_MAGNETON]->StartDefense = 95;
$MonsterTemplate[PK_MAGNETON]->StartSpeed = 70;
$MonsterTemplate[PK_MAGNETON]->StartSpecial = 120;
$MonsterTemplate[PK_MAGNETON]->StartHP = 50;

$MonsterTemplate[PK_MANKEY] = new MonsterList();
$MonsterTemplate[PK_MANKEY]->Name = 'Mankey';
$MonsterTemplate[PK_MANKEY]->StartAttack = 80;
$MonsterTemplate[PK_MANKEY]->StartDefense = 35;
$MonsterTemplate[PK_MANKEY]->StartSpeed = 70;
$MonsterTemplate[PK_MANKEY]->StartSpecial = 35;
$MonsterTemplate[PK_MANKEY]->StartHP = 40;

$MonsterTemplate[PK_MAROWAK] = new MonsterList();
$MonsterTemplate[PK_MAROWAK]->Name = 'Marowak';
$MonsterTemplate[PK_MAROWAK]->StartAttack = 80;
$MonsterTemplate[PK_MAROWAK]->StartDefense = 110;
$MonsterTemplate[PK_MAROWAK]->StartSpeed = 45;
$MonsterTemplate[PK_MAROWAK]->StartSpecial = 50;
$MonsterTemplate[PK_MAROWAK]->StartHP = 60;

$MonsterTemplate[PK_MEOWTH] = new MonsterList();
$MonsterTemplate[PK_MEOWTH]->Name = 'Meowth';
$MonsterTemplate[PK_MEOWTH]->StartAttack = 45;
$MonsterTemplate[PK_MEOWTH]->StartDefense = 35;
$MonsterTemplate[PK_MEOWTH]->StartSpeed = 90;
$MonsterTemplate[PK_MEOWTH]->StartSpecial = 40;
$MonsterTemplate[PK_MEOWTH]->StartHP = 40;

$MonsterTemplate[PK_METAPOD] = new MonsterList();
$MonsterTemplate[PK_METAPOD]->Name = 'Metapod';
$MonsterTemplate[PK_METAPOD]->StartAttack = 20;
$MonsterTemplate[PK_METAPOD]->StartDefense = 55;
$MonsterTemplate[PK_METAPOD]->StartSpeed = 30;
$MonsterTemplate[PK_METAPOD]->StartSpecial = 25;
$MonsterTemplate[PK_METAPOD]->StartHP = 50;

$MonsterTemplate[PK_MEW] = new MonsterList();
$MonsterTemplate[PK_MEW]->Name = 'Mew';
$MonsterTemplate[PK_MEW]->StartAttack = 100;
$MonsterTemplate[PK_MEW]->StartDefense = 100;
$MonsterTemplate[PK_MEW]->StartSpeed = 100;
$MonsterTemplate[PK_MEW]->StartSpecial = 100;
$MonsterTemplate[PK_MEW]->StartHP = 100;

$MonsterTemplate[PK_MEWTWO] = new MonsterList();
$MonsterTemplate[PK_MEWTWO]->Name = 'Mewtwo';
$MonsterTemplate[PK_MEWTWO]->StartAttack = 110;
$MonsterTemplate[PK_MEWTWO]->StartDefense = 90;
$MonsterTemplate[PK_MEWTWO]->StartSpeed = 130;
$MonsterTemplate[PK_MEWTWO]->StartSpecial = 154;
$MonsterTemplate[PK_MEWTWO]->StartHP = 106;

$MonsterTemplate[PK_MOLTRES] = new MonsterList();
$MonsterTemplate[PK_MOLTRES]->Name = 'Moltres';
$MonsterTemplate[PK_MOLTRES]->StartAttack = 100;
$MonsterTemplate[PK_MOLTRES]->StartDefense = 90;
$MonsterTemplate[PK_MOLTRES]->StartSpeed = 90;
$MonsterTemplate[PK_MOLTRES]->StartSpecial = 125;
$MonsterTemplate[PK_MOLTRES]->StartHP = 90;

$MonsterTemplate[PK_MRMIME] = new MonsterList();
$MonsterTemplate[PK_MRMIME]->Name = 'Mr. Mime';
$MonsterTemplate[PK_MRMIME]->StartAttack = 45;
$MonsterTemplate[PK_MRMIME]->StartDefense = 65;
$MonsterTemplate[PK_MRMIME]->StartSpeed = 90;
$MonsterTemplate[PK_MRMIME]->StartSpecial = 100;
$MonsterTemplate[PK_MRMIME]->StartHP = 40;

$MonsterTemplate[PK_MUK] = new MonsterList();
$MonsterTemplate[PK_MUK]->Name = 'Muk';
$MonsterTemplate[PK_MUK]->StartAttack = 105;
$MonsterTemplate[PK_MUK]->StartDefense = 75;
$MonsterTemplate[PK_MUK]->StartSpeed = 50;
$MonsterTemplate[PK_MUK]->StartSpecial = 65;
$MonsterTemplate[PK_MUK]->StartHP = 105;

$MonsterTemplate[PK_NIDOKING] = new MonsterList();
$MonsterTemplate[PK_NIDOKING]->Name = 'Nidoking';
$MonsterTemplate[PK_NIDOKING]->StartAttack = 92;
$MonsterTemplate[PK_NIDOKING]->StartDefense = 77;
$MonsterTemplate[PK_NIDOKING]->StartSpeed = 85;
$MonsterTemplate[PK_NIDOKING]->StartSpecial = 75;
$MonsterTemplate[PK_NIDOKING]->StartHP = 81;

$MonsterTemplate[PK_NIDOQUEEN] = new MonsterList();
$MonsterTemplate[PK_NIDOQUEEN]->Name = 'Nidoqueen';
$MonsterTemplate[PK_NIDOQUEEN]->StartAttack = 82;
$MonsterTemplate[PK_NIDOQUEEN]->StartDefense = 87;
$MonsterTemplate[PK_NIDOQUEEN]->StartSpeed = 76;
$MonsterTemplate[PK_NIDOQUEEN]->StartSpecial = 75;
$MonsterTemplate[PK_NIDOQUEEN]->StartHP = 90;

$MonsterTemplate[PK_NIDORANF] = new MonsterList();
$MonsterTemplate[PK_NIDORANF]->Name = 'Nidoran F';
$MonsterTemplate[PK_NIDORANF]->StartAttack = 47;
$MonsterTemplate[PK_NIDORANF]->StartDefense = 52;
$MonsterTemplate[PK_NIDORANF]->StartSpeed = 41;
$MonsterTemplate[PK_NIDORANF]->StartSpecial = 40;
$MonsterTemplate[PK_NIDORANF]->StartHP = 55;

$MonsterTemplate[PK_NIDORANM] = new MonsterList();
$MonsterTemplate[PK_NIDORANM]->Name = 'Nidoran M';
$MonsterTemplate[PK_NIDORANM]->StartAttack = 57;
$MonsterTemplate[PK_NIDORANM]->StartDefense = 40;
$MonsterTemplate[PK_NIDORANM]->StartSpeed = 50;
$MonsterTemplate[PK_NIDORANM]->StartSpecial = 40;
$MonsterTemplate[PK_NIDORANM]->StartHP = 46;

$MonsterTemplate[PK_NIDORINA] = new MonsterList();
$MonsterTemplate[PK_NIDORINA]->Name = 'Nidorina';
$MonsterTemplate[PK_NIDORINA]->StartAttack = 62;
$MonsterTemplate[PK_NIDORINA]->StartDefense = 67;
$MonsterTemplate[PK_NIDORINA]->StartSpeed = 56;
$MonsterTemplate[PK_NIDORINA]->StartSpecial = 55;
$MonsterTemplate[PK_NIDORINA]->StartHP = 70;

$MonsterTemplate[PK_NIDORINO] = new MonsterList();
$MonsterTemplate[PK_NIDORINO]->Name = 'Nidorino';
$MonsterTemplate[PK_NIDORINO]->StartAttack = 72;
$MonsterTemplate[PK_NIDORINO]->StartDefense = 57;
$MonsterTemplate[PK_NIDORINO]->StartSpeed = 65;
$MonsterTemplate[PK_NIDORINO]->StartSpecial = 55;
$MonsterTemplate[PK_NIDORINO]->StartHP = 61;

$MonsterTemplate[PK_NINETALES] = new MonsterList();
$MonsterTemplate[PK_NINETALES]->Name = 'Ninetales';
$MonsterTemplate[PK_NINETALES]->StartAttack = 76;
$MonsterTemplate[PK_NINETALES]->StartDefense = 75;
$MonsterTemplate[PK_NINETALES]->StartSpeed = 100;
$MonsterTemplate[PK_NINETALES]->StartSpecial = 100;
$MonsterTemplate[PK_NINETALES]->StartHP = 73;

$MonsterTemplate[PK_ODDISH] = new MonsterList();
$MonsterTemplate[PK_ODDISH]->Name = 'Oddish';
$MonsterTemplate[PK_ODDISH]->StartAttack = 50;
$MonsterTemplate[PK_ODDISH]->StartDefense = 55;
$MonsterTemplate[PK_ODDISH]->StartSpeed = 30;
$MonsterTemplate[PK_ODDISH]->StartSpecial = 75;
$MonsterTemplate[PK_ODDISH]->StartHP = 45;

$MonsterTemplate[PK_OMANYTE] = new MonsterList();
$MonsterTemplate[PK_OMANYTE]->Name = 'Omanyte';
$MonsterTemplate[PK_OMANYTE]->StartAttack = 40;
$MonsterTemplate[PK_OMANYTE]->StartDefense = 100;
$MonsterTemplate[PK_OMANYTE]->StartSpeed = 35;
$MonsterTemplate[PK_OMANYTE]->StartSpecial = 90;
$MonsterTemplate[PK_OMANYTE]->StartHP = 35;

$MonsterTemplate[PK_OMASTAR] = new MonsterList();
$MonsterTemplate[PK_OMASTAR]->Name = 'Omastar';
$MonsterTemplate[PK_OMASTAR]->StartAttack = 60;
$MonsterTemplate[PK_OMASTAR]->StartDefense = 125;
$MonsterTemplate[PK_OMASTAR]->StartSpeed = 55;
$MonsterTemplate[PK_OMASTAR]->StartSpecial = 115;
$MonsterTemplate[PK_OMASTAR]->StartHP = 70;

$MonsterTemplate[PK_ONIX] = new MonsterList();
$MonsterTemplate[PK_ONIX]->Name = 'Onix';
$MonsterTemplate[PK_ONIX]->StartAttack = 45;
$MonsterTemplate[PK_ONIX]->StartDefense = 160;
$MonsterTemplate[PK_ONIX]->StartSpeed = 70;
$MonsterTemplate[PK_ONIX]->StartSpecial = 30;
$MonsterTemplate[PK_ONIX]->StartHP = 35;

$MonsterTemplate[PK_PARAS] = new MonsterList();
$MonsterTemplate[PK_PARAS]->Name = 'Paras';
$MonsterTemplate[PK_PARAS]->StartAttack = 70;
$MonsterTemplate[PK_PARAS]->StartDefense = 55;
$MonsterTemplate[PK_PARAS]->StartSpeed = 25;
$MonsterTemplate[PK_PARAS]->StartSpecial = 55;
$MonsterTemplate[PK_PARAS]->StartHP = 35;

$MonsterTemplate[PK_PARASECT] = new MonsterList();
$MonsterTemplate[PK_PARASECT]->Name = 'Parasect';
$MonsterTemplate[PK_PARASECT]->StartAttack = 95;
$MonsterTemplate[PK_PARASECT]->StartDefense = 80;
$MonsterTemplate[PK_PARASECT]->StartSpeed = 30;
$MonsterTemplate[PK_PARASECT]->StartSpecial = 80;
$MonsterTemplate[PK_PARASECT]->StartHP = 60;

$MonsterTemplate[PK_PERSIAN] = new MonsterList();
$MonsterTemplate[PK_PERSIAN]->Name = 'Persian';
$MonsterTemplate[PK_PERSIAN]->StartAttack = 70;
$MonsterTemplate[PK_PERSIAN]->StartDefense = 60;
$MonsterTemplate[PK_PERSIAN]->StartSpeed = 115;
$MonsterTemplate[PK_PERSIAN]->StartSpecial = 65;
$MonsterTemplate[PK_PERSIAN]->StartHP = 65;

$MonsterTemplate[PK_PIDGEOT] = new MonsterList();
$MonsterTemplate[PK_PIDGEOT]->Name = 'Pidgeot';
$MonsterTemplate[PK_PIDGEOT]->StartAttack = 80;
$MonsterTemplate[PK_PIDGEOT]->StartDefense = 75;
$MonsterTemplate[PK_PIDGEOT]->StartSpeed = 91;
$MonsterTemplate[PK_PIDGEOT]->StartSpecial = 70;
$MonsterTemplate[PK_PIDGEOT]->StartHP = 83;

$MonsterTemplate[PK_PIDGEOTTO] = new MonsterList();
$MonsterTemplate[PK_PIDGEOTTO]->Name = 'Pidgeotto';
$MonsterTemplate[PK_PIDGEOTTO]->StartAttack = 60;
$MonsterTemplate[PK_PIDGEOTTO]->StartDefense = 55;
$MonsterTemplate[PK_PIDGEOTTO]->StartSpeed = 71;
$MonsterTemplate[PK_PIDGEOTTO]->StartSpecial = 50;
$MonsterTemplate[PK_PIDGEOTTO]->StartHP = 63;

$MonsterTemplate[PK_PIDGEY] = new MonsterList();
$MonsterTemplate[PK_PIDGEY]->Name = 'Pidgey';
$MonsterTemplate[PK_PIDGEY]->StartAttack = 45;
$MonsterTemplate[PK_PIDGEY]->StartDefense = 40;
$MonsterTemplate[PK_PIDGEY]->StartSpeed = 56;
$MonsterTemplate[PK_PIDGEY]->StartSpecial = 35;
$MonsterTemplate[PK_PIDGEY]->StartHP = 40;

$MonsterTemplate[PK_PIKACHU] = new MonsterList();
$MonsterTemplate[PK_PIKACHU]->Name = 'Pikachu';
$MonsterTemplate[PK_PIKACHU]->Desc = 'It keeps its tail raised to monitor its surroundings';
$MonsterTemplate[PK_PIKACHU]->StartAttack = 55;
$MonsterTemplate[PK_PIKACHU]->StartDefense = 30;
$MonsterTemplate[PK_PIKACHU]->StartSpeed = 90;
$MonsterTemplate[PK_PIKACHU]->StartSpecial = 50;
$MonsterTemplate[PK_PIKACHU]->StartHP = 35;
$MonsterTemplate[PK_PIKACHU]->DexNumber = 25;
$MonsterTemplate[PK_PIKACHU]->Happy = 70;
$MonsterTemplate[PK_PIKACHU]->CaptureRate = 190;
$MonsterTemplate[PK_PIKACHU]->GrowthCurve = G_MEDFAST;
$MonsterTemplate[PK_PIKACHU]->EvolveID = PK_RAICHU;
$MonsterTemplate[PK_PIKACHU]->EvolveMinLevel = 15;
$MonsterTemplate[PK_PIKACHU]->EvolveItem = IT_THUNDERSTONE;
$MonsterTemplate[PK_PIKACHU]->Type1 = ET_ELECTRIC;
$MonsterTemplate[PK_PIKACHU]->Male = 50;
$SkillUp[PK_PIKACHU][0] = new SkillUpList(SK_THUNDERSHOCK, 0);
$SkillUp[PK_PIKACHU][1] = new SkillUpList(SK_GROWL, 0);
$SkillUp[PK_PIKACHU][2] = new SkillUpList(SK_TAILWHIP, 6);
$SkillUp[PK_PIKACHU][3] = new SkillUpList(SK_THUNDERWAVE, 8);
$SkillUp[PK_PIKACHU][4] = new SkillUpList(SK_QUICKATTACK, 11);
$SkillUp[PK_PIKACHU][5] = new SkillUpList(SK_DOUBLETEAM, 15);
$SkillUp[PK_PIKACHU][6] = new SkillUpList(SK_SLAM, 20);
$SkillUp[PK_PIKACHU][7] = new SkillUpList(SK_THUNDERBOLT, 26);
$SkillUp[PK_PIKACHU][8] = new SkillUpList(SK_AGILITY, 33);
$SkillUp[PK_PIKACHU][9] = new SkillUpList(SK_THUNDER, 41);
$SkillUp[PK_PIKACHU][10] = new SkillUpList(SK_LIGHTSCREEN, 50);

$MonsterTemplate[PK_PINSIR] = new MonsterList();
$MonsterTemplate[PK_PINSIR]->Name = 'Pinsir';
$MonsterTemplate[PK_PINSIR]->StartAttack = 125;
$MonsterTemplate[PK_PINSIR]->StartDefense = 100;
$MonsterTemplate[PK_PINSIR]->StartSpeed = 85;
$MonsterTemplate[PK_PINSIR]->StartSpecial = 55;
$MonsterTemplate[PK_PINSIR]->StartHP = 65;

$MonsterTemplate[PK_POLIWAG] = new MonsterList();
$MonsterTemplate[PK_POLIWAG]->Name = 'Poliwag';
$MonsterTemplate[PK_POLIWAG]->StartAttack = 50;
$MonsterTemplate[PK_POLIWAG]->StartDefense = 40;
$MonsterTemplate[PK_POLIWAG]->StartSpeed = 90;
$MonsterTemplate[PK_POLIWAG]->StartSpecial = 40;
$MonsterTemplate[PK_POLIWAG]->StartHP = 40;

$MonsterTemplate[PK_POLIWHIRL] = new MonsterList();
$MonsterTemplate[PK_POLIWHIRL]->Name = 'Poliwhirl';
$MonsterTemplate[PK_POLIWHIRL]->StartAttack = 65;
$MonsterTemplate[PK_POLIWHIRL]->StartDefense = 65;
$MonsterTemplate[PK_POLIWHIRL]->StartSpeed = 90;
$MonsterTemplate[PK_POLIWHIRL]->StartSpecial = 50;
$MonsterTemplate[PK_POLIWHIRL]->StartHP = 65;

$MonsterTemplate[PK_POLIWRATH] = new MonsterList();
$MonsterTemplate[PK_POLIWRATH]->Name = 'Poliwrath';
$MonsterTemplate[PK_POLIWRATH]->StartAttack = 85;
$MonsterTemplate[PK_POLIWRATH]->StartDefense = 95;
$MonsterTemplate[PK_POLIWRATH]->StartSpeed = 70;
$MonsterTemplate[PK_POLIWRATH]->StartSpecial = 70;
$MonsterTemplate[PK_POLIWRATH]->StartHP = 90;

$MonsterTemplate[PK_PONYTA] = new MonsterList();
$MonsterTemplate[PK_PONYTA]->Name = 'Ponyta';
$MonsterTemplate[PK_PONYTA]->StartAttack = 85;
$MonsterTemplate[PK_PONYTA]->StartDefense = 55;
$MonsterTemplate[PK_PONYTA]->StartSpeed = 90;
$MonsterTemplate[PK_PONYTA]->StartSpecial = 65;
$MonsterTemplate[PK_PONYTA]->StartHP = 50;

$MonsterTemplate[PK_PORYGON] = new MonsterList();
$MonsterTemplate[PK_PORYGON]->Name = 'Porygon';
$MonsterTemplate[PK_PORYGON]->StartAttack = 60;
$MonsterTemplate[PK_PORYGON]->StartDefense = 70;
$MonsterTemplate[PK_PORYGON]->StartSpeed = 40;
$MonsterTemplate[PK_PORYGON]->StartSpecial = 75;
$MonsterTemplate[PK_PORYGON]->StartHP = 65;

$MonsterTemplate[PK_PRIMEAPE] = new MonsterList();
$MonsterTemplate[PK_PRIMEAPE]->Name = 'Primeape';
$MonsterTemplate[PK_PRIMEAPE]->StartAttack = 105;
$MonsterTemplate[PK_PRIMEAPE]->StartDefense = 60;
$MonsterTemplate[PK_PRIMEAPE]->StartSpeed = 95;
$MonsterTemplate[PK_PRIMEAPE]->StartSpecial = 60;
$MonsterTemplate[PK_PRIMEAPE]->StartHP = 65;

$MonsterTemplate[PK_PSYDUCK] = new MonsterList();
$MonsterTemplate[PK_PSYDUCK]->Name = 'Psyduck';
$MonsterTemplate[PK_PSYDUCK]->StartAttack = 52;
$MonsterTemplate[PK_PSYDUCK]->StartDefense = 48;
$MonsterTemplate[PK_PSYDUCK]->StartSpeed = 55;
$MonsterTemplate[PK_PSYDUCK]->StartSpecial = 50;
$MonsterTemplate[PK_PSYDUCK]->StartHP = 50;

$MonsterTemplate[PK_RAICHU] = new MonsterList();
$MonsterTemplate[PK_RAICHU]->Name = 'Raichu';
$MonsterTemplate[PK_RAICHU]->StartAttack = 90;
$MonsterTemplate[PK_RAICHU]->StartDefense = 55;
$MonsterTemplate[PK_RAICHU]->StartSpeed = 100;
$MonsterTemplate[PK_RAICHU]->StartSpecial = 90;
$MonsterTemplate[PK_RAICHU]->StartHP = 60;

$MonsterTemplate[PK_RAPIDASH] = new MonsterList();
$MonsterTemplate[PK_RAPIDASH]->Name = 'Rapidash';
$MonsterTemplate[PK_RAPIDASH]->StartAttack = 100;
$MonsterTemplate[PK_RAPIDASH]->StartDefense = 70;
$MonsterTemplate[PK_RAPIDASH]->StartSpeed = 105;
$MonsterTemplate[PK_RAPIDASH]->StartSpecial = 80;
$MonsterTemplate[PK_RAPIDASH]->StartHP = 65;

$MonsterTemplate[PK_RATICATE] = new MonsterList();
$MonsterTemplate[PK_RATICATE]->Name = 'Raticate';
$MonsterTemplate[PK_RATICATE]->StartAttack = 81;
$MonsterTemplate[PK_RATICATE]->StartDefense = 60;
$MonsterTemplate[PK_RATICATE]->StartSpeed = 97;
$MonsterTemplate[PK_RATICATE]->StartSpecial = 50;
$MonsterTemplate[PK_RATICATE]->StartHP = 55;

$MonsterTemplate[PK_RATTATA] = new MonsterList();
$MonsterTemplate[PK_RATTATA]->Name = 'Rattata';
$MonsterTemplate[PK_RATTATA]->StartAttack = 56;
$MonsterTemplate[PK_RATTATA]->StartDefense = 35;
$MonsterTemplate[PK_RATTATA]->StartSpeed = 72;
$MonsterTemplate[PK_RATTATA]->StartSpecial = 25;
$MonsterTemplate[PK_RATTATA]->StartHP = 30;

$MonsterTemplate[PK_RHYDON] = new MonsterList();
$MonsterTemplate[PK_RHYDON]->Name = 'Rhydon';
$MonsterTemplate[PK_RHYDON]->StartAttack = 130;
$MonsterTemplate[PK_RHYDON]->StartDefense = 120;
$MonsterTemplate[PK_RHYDON]->StartSpeed = 40;
$MonsterTemplate[PK_RHYDON]->StartSpecial = 45;
$MonsterTemplate[PK_RHYDON]->StartHP = 105;

$MonsterTemplate[PK_RHYHORN] = new MonsterList();
$MonsterTemplate[PK_RHYHORN]->Name = 'Rhyhorn';
$MonsterTemplate[PK_RHYHORN]->StartAttack = 85;
$MonsterTemplate[PK_RHYHORN]->StartDefense = 95;
$MonsterTemplate[PK_RHYHORN]->StartSpeed = 25;
$MonsterTemplate[PK_RHYHORN]->StartSpecial = 30;
$MonsterTemplate[PK_RHYHORN]->StartHP = 80;

$MonsterTemplate[PK_SANDSHREW] = new MonsterList();
$MonsterTemplate[PK_SANDSHREW]->Name = 'Sandshrew';
$MonsterTemplate[PK_SANDSHREW]->StartAttack = 75;
$MonsterTemplate[PK_SANDSHREW]->StartDefense = 85;
$MonsterTemplate[PK_SANDSHREW]->StartSpeed = 40;
$MonsterTemplate[PK_SANDSHREW]->StartSpecial = 30;
$MonsterTemplate[PK_SANDSHREW]->StartHP = 50;

$MonsterTemplate[PK_SANDSLASH] = new MonsterList();
$MonsterTemplate[PK_SANDSLASH]->Name = 'Sandslash';
$MonsterTemplate[PK_SANDSLASH]->StartAttack = 100;
$MonsterTemplate[PK_SANDSLASH]->StartDefense = 110;
$MonsterTemplate[PK_SANDSLASH]->StartSpeed = 65;
$MonsterTemplate[PK_SANDSLASH]->StartSpecial = 55;
$MonsterTemplate[PK_SANDSLASH]->StartHP = 75;

$MonsterTemplate[PK_SCYTHER] = new MonsterList();
$MonsterTemplate[PK_SCYTHER]->Name = 'Scyther';
$MonsterTemplate[PK_SCYTHER]->Desc = 'Leaps out of tall grass and slices prey with its scythes. The movement looks like that of a ninja.';
$MonsterTemplate[PK_SCYTHER]->StartAttack = 110;
$MonsterTemplate[PK_SCYTHER]->StartDefense = 80;
$MonsterTemplate[PK_SCYTHER]->StartSpeed = 105;
$MonsterTemplate[PK_SCYTHER]->StartSpecial = 55;
$MonsterTemplate[PK_SCYTHER]->StartHP = 70;
$MonsterTemplate[PK_SCYTHER]->DexNumber = 123;
$MonsterTemplate[PK_SCYTHER]->Happy = 70;
$MonsterTemplate[PK_SCYTHER]->CaptureRate = 45;
//$MonsterTemplate[PK_PIKACHU]->EvolveID = PK_SCIZOR;
//$MonsterTemplate[PK_PIKACHU]->EvolveMinLevel = PK_SCIZOR;
//$MonsterTemplate[PK_SCYTHER]->EvolveItem = IT_METALCOAT;
$MonsterTemplate[PK_SCYTHER]->Type1 = ET_BUG;
$MonsterTemplate[PK_SCYTHER]->GrowthCurve = G_MEDFAST;
$SkillUp[PK_SCYTHER][0] = new SkillUpList(SK_QUICKATTACK,0);
$SkillUp[PK_SCYTHER][1] = new SkillUpList(SK_LEER,17);
$SkillUp[PK_SCYTHER][2] = new SkillUpList(SK_FOCUSENERGY,20);
$SkillUp[PK_SCYTHER][3] = new SkillUpList(SK_DOUBLETEAM,24);
$SkillUp[PK_SCYTHER][4] = new SkillUpList(SK_SLASH,29);
$SkillUp[PK_SCYTHER][5] = new SkillUpList(SK_SWORDSDANCE,35);
$SkillUp[PK_SCYTHER][6] = new SkillUpList(SK_AGILITY,42);
$SkillUp[PK_SCYTHER][7] = new SkillUpList(SK_WINGATTACK,50);

$MonsterTemplate[PK_SEADRA] = new MonsterList();
$MonsterTemplate[PK_SEADRA]->Name = 'Seadra';
$MonsterTemplate[PK_SEADRA]->StartAttack = 65;
$MonsterTemplate[PK_SEADRA]->StartDefense = 95;
$MonsterTemplate[PK_SEADRA]->StartSpeed = 85;
$MonsterTemplate[PK_SEADRA]->StartSpecial = 95;
$MonsterTemplate[PK_SEADRA]->StartHP = 55;

$MonsterTemplate[PK_SEAKING] = new MonsterList();
$MonsterTemplate[PK_SEAKING]->Name = 'Seaking';
$MonsterTemplate[PK_SEAKING]->StartAttack = 92;
$MonsterTemplate[PK_SEAKING]->StartDefense = 65;
$MonsterTemplate[PK_SEAKING]->StartSpeed = 68;
$MonsterTemplate[PK_SEAKING]->StartSpecial = 80;
$MonsterTemplate[PK_SEAKING]->StartHP = 80;

$MonsterTemplate[PK_SEEL] = new MonsterList();
$MonsterTemplate[PK_SEEL]->Name = 'Seel';
$MonsterTemplate[PK_SEEL]->StartAttack = 45;
$MonsterTemplate[PK_SEEL]->StartDefense = 55;
$MonsterTemplate[PK_SEEL]->StartSpeed = 45;
$MonsterTemplate[PK_SEEL]->StartSpecial = 70;
$MonsterTemplate[PK_SEEL]->StartHP = 65;

$MonsterTemplate[PK_SHELLDER] = new MonsterList();
$MonsterTemplate[PK_SHELLDER]->Name = 'Shellder';
$MonsterTemplate[PK_SHELLDER]->StartAttack = 65;
$MonsterTemplate[PK_SHELLDER]->StartDefense = 100;
$MonsterTemplate[PK_SHELLDER]->StartSpeed = 40;
$MonsterTemplate[PK_SHELLDER]->StartSpecial = 45;
$MonsterTemplate[PK_SHELLDER]->StartHP = 30;

$MonsterTemplate[PK_SLOWBRO] = new MonsterList();
$MonsterTemplate[PK_SLOWBRO]->Name = 'Slowbro';
$MonsterTemplate[PK_SLOWBRO]->StartAttack = 75;
$MonsterTemplate[PK_SLOWBRO]->StartDefense = 110;
$MonsterTemplate[PK_SLOWBRO]->StartSpeed = 30;
$MonsterTemplate[PK_SLOWBRO]->StartSpecial = 80;
$MonsterTemplate[PK_SLOWBRO]->StartHP = 95;

$MonsterTemplate[PK_SLOWPOKE] = new MonsterList();
$MonsterTemplate[PK_SLOWPOKE]->Name = 'Slowpoke';
$MonsterTemplate[PK_SLOWPOKE]->StartAttack = 65;
$MonsterTemplate[PK_SLOWPOKE]->StartDefense = 65;
$MonsterTemplate[PK_SLOWPOKE]->StartSpeed = 15;
$MonsterTemplate[PK_SLOWPOKE]->StartSpecial = 40;
$MonsterTemplate[PK_SLOWPOKE]->StartHP = 90;

$MonsterTemplate[PK_SNORLAX] = new MonsterList();
$MonsterTemplate[PK_SNORLAX]->Name = 'Snorlax';
$MonsterTemplate[PK_SNORLAX]->StartAttack = 110;
$MonsterTemplate[PK_SNORLAX]->StartDefense = 65;
$MonsterTemplate[PK_SNORLAX]->StartSpeed = 30;
$MonsterTemplate[PK_SNORLAX]->StartSpecial = 65;
$MonsterTemplate[PK_SNORLAX]->StartHP = 160;

$MonsterTemplate[PK_SPEAROW] = new MonsterList();
$MonsterTemplate[PK_SPEAROW]->Name = 'Spearow';
$MonsterTemplate[PK_SPEAROW]->StartAttack = 60;
$MonsterTemplate[PK_SPEAROW]->StartDefense = 30;
$MonsterTemplate[PK_SPEAROW]->StartSpeed = 70;
$MonsterTemplate[PK_SPEAROW]->StartSpecial = 31;
$MonsterTemplate[PK_SPEAROW]->StartHP = 40;

$MonsterTemplate[PK_SQUIRTLE] = new MonsterList();
$MonsterTemplate[PK_SQUIRTLE]->Name = 'Squirtle';
$MonsterTemplate[PK_SQUIRTLE]->StartAttack = 48;
$MonsterTemplate[PK_SQUIRTLE]->StartDefense = 65;
$MonsterTemplate[PK_SQUIRTLE]->StartSpeed = 43;
$MonsterTemplate[PK_SQUIRTLE]->StartSpecial = 50;
$MonsterTemplate[PK_SQUIRTLE]->StartHP = 44;

$MonsterTemplate[PK_STARMIE] = new MonsterList();
$MonsterTemplate[PK_STARMIE]->Name = 'Starmie';
$MonsterTemplate[PK_STARMIE]->StartAttack = 75;
$MonsterTemplate[PK_STARMIE]->StartDefense = 85;
$MonsterTemplate[PK_STARMIE]->StartSpeed = 115;
$MonsterTemplate[PK_STARMIE]->StartSpecial = 100;
$MonsterTemplate[PK_STARMIE]->StartHP = 60;

$MonsterTemplate[PK_STARYU] = new MonsterList();
$MonsterTemplate[PK_STARYU]->Name = 'Staryu';
$MonsterTemplate[PK_STARYU]->StartAttack = 45;
$MonsterTemplate[PK_STARYU]->StartDefense = 55;
$MonsterTemplate[PK_STARYU]->StartSpeed = 85;
$MonsterTemplate[PK_STARYU]->StartSpecial = 70;
$MonsterTemplate[PK_STARYU]->StartHP = 30;

$MonsterTemplate[PK_TANGELA] = new MonsterList();
$MonsterTemplate[PK_TANGELA]->Name = 'Tangela';
$MonsterTemplate[PK_TANGELA]->StartAttack = 55;
$MonsterTemplate[PK_TANGELA]->StartDefense = 115;
$MonsterTemplate[PK_TANGELA]->StartSpeed = 60;
$MonsterTemplate[PK_TANGELA]->StartSpecial = 100;
$MonsterTemplate[PK_TANGELA]->StartHP = 65;

$MonsterTemplate[PK_TAUROS] = new MonsterList();
$MonsterTemplate[PK_TAUROS]->Name = 'Tauros';
$MonsterTemplate[PK_TAUROS]->StartAttack = 100;
$MonsterTemplate[PK_TAUROS]->StartDefense = 95;
$MonsterTemplate[PK_TAUROS]->StartSpeed = 110;
$MonsterTemplate[PK_TAUROS]->StartSpecial = 70;
$MonsterTemplate[PK_TAUROS]->StartHP = 75;

$MonsterTemplate[PK_TENTACOOL] = new MonsterList();
$MonsterTemplate[PK_TENTACOOL]->Name = 'Tentacool';
$MonsterTemplate[PK_TENTACOOL]->StartAttack = 40;
$MonsterTemplate[PK_TENTACOOL]->StartDefense = 35;
$MonsterTemplate[PK_TENTACOOL]->StartSpeed = 70;
$MonsterTemplate[PK_TENTACOOL]->StartSpecial = 100;
$MonsterTemplate[PK_TENTACOOL]->StartHP = 40;

$MonsterTemplate[PK_TENTACRUEL] = new MonsterList();
$MonsterTemplate[PK_TENTACRUEL]->Name = 'Tentacruel';
$MonsterTemplate[PK_TENTACRUEL]->StartAttack = 70;
$MonsterTemplate[PK_TENTACRUEL]->StartDefense = 65;
$MonsterTemplate[PK_TENTACRUEL]->StartSpeed = 100;
$MonsterTemplate[PK_TENTACRUEL]->StartSpecial = 120;
$MonsterTemplate[PK_TENTACRUEL]->StartHP = 80;

$MonsterTemplate[PK_VAPOREON] = new MonsterList();
$MonsterTemplate[PK_VAPOREON]->Name = 'Vaporeon';
$MonsterTemplate[PK_VAPOREON]->StartAttack = 65;
$MonsterTemplate[PK_VAPOREON]->StartDefense = 60;
$MonsterTemplate[PK_VAPOREON]->StartSpeed = 65;
$MonsterTemplate[PK_VAPOREON]->StartSpecial = 110;
$MonsterTemplate[PK_VAPOREON]->StartHP = 130;

$MonsterTemplate[PK_VENOMOTH] = new MonsterList();
$MonsterTemplate[PK_VENOMOTH]->Name = 'Venomoth';
$MonsterTemplate[PK_VENOMOTH]->StartAttack = 65;
$MonsterTemplate[PK_VENOMOTH]->StartDefense = 60;
$MonsterTemplate[PK_VENOMOTH]->StartSpeed = 90;
$MonsterTemplate[PK_VENOMOTH]->StartSpecial = 90;
$MonsterTemplate[PK_VENOMOTH]->StartHP = 70;

$MonsterTemplate[PK_VENONAT] = new MonsterList();
$MonsterTemplate[PK_VENONAT]->Name = 'Venonat';
$MonsterTemplate[PK_VENONAT]->StartAttack = 55;
$MonsterTemplate[PK_VENONAT]->StartDefense = 50;
$MonsterTemplate[PK_VENONAT]->StartSpeed = 45;
$MonsterTemplate[PK_VENONAT]->StartSpecial = 40;
$MonsterTemplate[PK_VENONAT]->StartHP = 60;

$MonsterTemplate[PK_VENUSAUR] = new MonsterList();
$MonsterTemplate[PK_VENUSAUR]->Name = 'Venusaur';
$MonsterTemplate[PK_VENUSAUR]->StartAttack = 82;
$MonsterTemplate[PK_VENUSAUR]->StartDefense = 83;
$MonsterTemplate[PK_VENUSAUR]->StartSpeed = 80;
$MonsterTemplate[PK_VENUSAUR]->StartSpecial = 100;
$MonsterTemplate[PK_VENUSAUR]->StartHP = 80;

$MonsterTemplate[PK_VICTREEBEL] = new MonsterList();
$MonsterTemplate[PK_VICTREEBEL]->Name = 'Victreebel';
$MonsterTemplate[PK_VICTREEBEL]->StartAttack = 105;
$MonsterTemplate[PK_VICTREEBEL]->StartDefense = 65;
$MonsterTemplate[PK_VICTREEBEL]->StartSpeed = 70;
$MonsterTemplate[PK_VICTREEBEL]->StartSpecial = 100;
$MonsterTemplate[PK_VICTREEBEL]->StartHP = 80;

$MonsterTemplate[PK_VILEPLUME] = new MonsterList();
$MonsterTemplate[PK_VILEPLUME]->Name = 'Vileplume';
$MonsterTemplate[PK_VILEPLUME]->StartAttack = 80;
$MonsterTemplate[PK_VILEPLUME]->StartDefense = 85;
$MonsterTemplate[PK_VILEPLUME]->StartSpeed = 50;
$MonsterTemplate[PK_VILEPLUME]->StartSpecial = 100;
$MonsterTemplate[PK_VILEPLUME]->StartHP = 75;

$MonsterTemplate[PK_VOLTORB] = new MonsterList();
$MonsterTemplate[PK_VOLTORB]->Name = 'Voltorb';
$MonsterTemplate[PK_VOLTORB]->StartAttack = 30;
$MonsterTemplate[PK_VOLTORB]->StartDefense = 50;
$MonsterTemplate[PK_VOLTORB]->StartSpeed = 100;
$MonsterTemplate[PK_VOLTORB]->StartSpecial = 55;
$MonsterTemplate[PK_VOLTORB]->StartHP = 40;

$MonsterTemplate[PK_VULPIX] = new MonsterList();
$MonsterTemplate[PK_VULPIX]->Name = 'Vulpix';
$MonsterTemplate[PK_VULPIX]->StartAttack = 41;
$MonsterTemplate[PK_VULPIX]->StartDefense = 40;
$MonsterTemplate[PK_VULPIX]->StartSpeed = 65;
$MonsterTemplate[PK_VULPIX]->StartSpecial = 65;
$MonsterTemplate[PK_VULPIX]->StartHP = 38;

$MonsterTemplate[PK_WARTORTLE] = new MonsterList();
$MonsterTemplate[PK_WARTORTLE]->Name = 'Wartortle';
$MonsterTemplate[PK_WARTORTLE]->StartAttack = 63;
$MonsterTemplate[PK_WARTORTLE]->StartDefense = 80;
$MonsterTemplate[PK_WARTORTLE]->StartSpeed = 58;
$MonsterTemplate[PK_WARTORTLE]->StartSpecial = 65;
$MonsterTemplate[PK_WARTORTLE]->StartHP = 59;

$MonsterTemplate[PK_WEEDLE] = new MonsterList();
$MonsterTemplate[PK_WEEDLE]->Name = 'Weedle';
$MonsterTemplate[PK_WEEDLE]->StartAttack = 35;
$MonsterTemplate[PK_WEEDLE]->StartDefense = 30;
$MonsterTemplate[PK_WEEDLE]->StartSpeed = 50;
$MonsterTemplate[PK_WEEDLE]->StartSpecial = 20;
$MonsterTemplate[PK_WEEDLE]->StartHP = 40;

$MonsterTemplate[PK_WEEPINBELL] = new MonsterList();
$MonsterTemplate[PK_WEEPINBELL]->Name = 'Weepinbell';
$MonsterTemplate[PK_WEEPINBELL]->StartAttack = 90;
$MonsterTemplate[PK_WEEPINBELL]->StartDefense = 50;
$MonsterTemplate[PK_WEEPINBELL]->StartSpeed = 55;
$MonsterTemplate[PK_WEEPINBELL]->StartSpecial = 85;
$MonsterTemplate[PK_WEEPINBELL]->StartHP = 65;

$MonsterTemplate[PK_WEEZING] = new MonsterList();
$MonsterTemplate[PK_WEEZING]->Name = 'Weezing';
$MonsterTemplate[PK_WEEZING]->StartAttack = 90;
$MonsterTemplate[PK_WEEZING]->StartDefense = 120;
$MonsterTemplate[PK_WEEZING]->StartSpeed = 60;
$MonsterTemplate[PK_WEEZING]->StartSpecial = 85;
$MonsterTemplate[PK_WEEZING]->StartHP = 65;

$MonsterTemplate[PK_WIGGLYTUFF] = new MonsterList();
$MonsterTemplate[PK_WIGGLYTUFF]->Name = 'Wigglytuff';
$MonsterTemplate[PK_WIGGLYTUFF]->StartAttack = 70;
$MonsterTemplate[PK_WIGGLYTUFF]->StartDefense = 45;
$MonsterTemplate[PK_WIGGLYTUFF]->StartSpeed = 45;
$MonsterTemplate[PK_WIGGLYTUFF]->StartSpecial = 50;
$MonsterTemplate[PK_WIGGLYTUFF]->StartHP = 140;

$MonsterTemplate[PK_ZAPDOS] = new MonsterList();
$MonsterTemplate[PK_ZAPDOS]->Name = 'Zapdos';
$MonsterTemplate[PK_ZAPDOS]->StartAttack = 90;
$MonsterTemplate[PK_ZAPDOS]->StartDefense = 85;
$MonsterTemplate[PK_ZAPDOS]->StartSpeed = 100;
$MonsterTemplate[PK_ZAPDOS]->StartSpecial = 125;
$MonsterTemplate[PK_ZAPDOS]->StartHP = 90;

$MonsterTemplate[PK_ZUBAT] = new MonsterList();
$MonsterTemplate[PK_ZUBAT]->Name = 'Zubat';
$MonsterTemplate[PK_ZUBAT]->StartAttack = 45;
$MonsterTemplate[PK_ZUBAT]->StartDefense = 35;
$MonsterTemplate[PK_ZUBAT]->StartSpeed = 55;
$MonsterTemplate[PK_ZUBAT]->StartSpecial = 40;
$MonsterTemplate[PK_ZUBAT]->StartHP = 40;

