<?php


class PokemonList {
	public $ID;
	public $ItemReq; //Item requirement.
	public $Level;
	public $Rarity;
	public $Hops; //Found on any hop in map	
}

class NodeList {
	public $DestID;
	public $DestReq = 0;
	public $DestHops = 0;
}

class DialogList {
	public $TextOrder;
	public $Text; //Message displayed talking to NPC
	public $TextReq; //Requirement to get text
	public $ChoiceOrder;
	public $Choice; //Choice list, e.g. Choice[0] = "Yes";
	public $ChoiceReq; //Requirements to get a list item.
}

class NPCList {	
	public $Name;
	public $Type; 
	public $Image;
	public $Dialog;
	public $Pokemon;
	public function AddPokemon($PokemonID, $Level = -1, $ItemReq = IT_NULL, $Rarity = R_COMMON, $Hops = -1) {
		$this->Pokemon[] = new PokemonList;
		$CurPokemon = sizeof($this->Pokemon);
		$this->Pokemon[$CurPokemon]->ID = $PokemonID;
		$this->Pokemon[$CurPokemon]->Level = $Level;
		$this->Pokemon[$CurPokemon]->ItemReq = $ItemReq;
		$this->Pokemon[$CurPokemon]->Rarity = $Rarity;
		$this->Pokemon[$CurPokemon]->Hops = $Hops;
		return $CurPokemon;
	}
}

class BuildingList {
	public $Name;
	public $Type;	
	public $Item;
	public $Image;	
	public $Services;
	public $NPC;
	public function AddItem($ItemID) {
		$this->Item[] = $ItemID;
		$CurItem = sizeof($this->Item);
		return $CurItem;
	}
}

class TownList {
	public $Name;
	public $Node;
	public $Image;
	public $Pokemon;	
	public $Building;
	public $NPC;
	public function __construct(){
	}	
	public function AddWildPokemon($PokemonID, $Level = -1, $ItemReq = IT_NULL, $Rarity = R_COMMON, $Hops = -1) {
		$this->Pokemon[] = new PokemonList;
		$CurPokemon = sizeof($this->Pokemon);
		$this->Pokemon[$CurPokemon]->ID = $PokemonID;
		$this->Pokemon[$CurPokemon]->Level = $Level;
		$this->Pokemon[$CurPokemon]->ItemReq = $ItemReq;
		$this->Pokemon[$CurPokemon]->Rarity = $Rarity;
		$this->Pokemon[$CurPokemon]->Hops = $Hops;
		return $CurPokemon;
	}
	public function AddNode($DestID, $DestHops = 0, $DestReq = 0) {
		$this->Node[] = new NodeList();
		$CurNode = sizeof($this->Node);
		$this->Node[$CurNode]->DestID = $DestID;
		$this->Node[$CurNode]->DestReq = $DestReq;
		$this->Node[$CurNode]->DestHops = $DestHops;
		return $CurNode;
	}
	public function AddNPC($Name, $Type = N_NULL, $Image = "") {
		$this->NPC[] = new NPCList();
		$CurNPC = sizeof($this->NPC);
		$this->Node[$CurNPC]->Name = $Name;
		$this->Node[$CurNPC]->Type = $Type;
		$this->Node[$CurNPC]->Image = $Image;
		return $CurNPC;
	}

	public function AddBuilding($BuildingType = 0, $Name = "") {
		$this->Building[] = new BuildingList();
		$CurBuilding = sizeof($this->Building);
		switch ($BuildingType) {
			case BLD_CUSTOM: //default
				$this->Building[$CurBuilding]->Name = $BuildingType;
			break;
			case BLD_POKEMART: //pokemart
				$this->Building[$CurBuilding]->Name = "Pokemart";
			break;
			case BLD_POKECENTER: //pokemart
				$this->Building[$CurBuilding]->Name = "PokeCenter";
			break;
			case BLD_POKECEMTER: //pokemart
				$this->Building[$CurBuilding]->Name = "PokeCenter";
			break;
		}
		return $CurBuilding;		
	}

}
function AddTown($TownID, $TownName, $Image = "") {
		global $Town;
		$Town[$TownID] = new TownList();
		$Town[$TownID]->Name = $TownName;
		$Town[$TownID]->Name = $Image;
}

define("T_PALLET",0,true); //Starting Town
define("T_ROUTE1",1,true);
define("T_VIRIDIAN",2,true); //First town visit
define("T_ROUTE22",3,true);
define("T_ROUTE2",4,true); //North of viridian
define("T_VIRIDIANFOREST",5,true); //North of route2
define("T_PEWTER",6,true);
define("T_MTMOON",7,true);
define("T_ROUTE4",8,true);
define("T_PEWYERGYM",9,true); //Pewter Gym

define("N_NULL",0,true); //NPC is neutral, does nothing unless talked to.
define("N_ALWAYSAGGRO",1,true); //Always attack the passerby.
define("N_SOMETIMESAGGRO",1,true); //Some times attack the passerby.

define("R_COMMON4",0,true);
define("R_UNCOMMON",1,true);
define("R_RARE",2,true);

define("BLD_CUSTOM",0,true);
define("BLD_POKEMART",1,true);
define("BLD_POKECENTER",2,true);

AddTown(T_PALLET, "Pallet Town");
$Town[T_PALLET]->AddNode(T_ROUTE1);


AddTown(T_ROUTE1, "Route 1");
$Town[T_ROUTE1]->AddNode(T_PALLET, 2);
$Town[T_ROUTE1]->AddPokemon(PK_PIDGEY);
$Town[T_ROUTE1]->AddPokemon(PK_RATTATA);

AddTown(T_VIRIDIAN, "Viridian City");
$Town[T_VIRIDIAN]->AddNode(T_ROUTE1,1);
$CurBuilding = $Town[T_VIRIDIAN]->AddBuilding(BLD_POKEMART);
$Town[T_VIRIDIAN]->Building[$CurBuilding]->AddItem(IT_POKEBALL);
$Town[T_VIRIDIAN]->Building[$CurBuilding]->AddItem(IT_ANTIDOTE);
$Town[T_VIRIDIAN]->Building[$CurBuilding]->AddItem(IT_PARALYZEHEAL);
$Town[T_VIRIDIAN]->Building[$CurBuilding]->AddItem(IT_BURNHEAL);

AddTown(T_ROUTE22, "Route 22");
$Town[T_ROUTE22]->AddNode(T_VIRIDIAN,2);
$Town[T_ROUTE22]->AddNode(T_ROUTE2,2);
$Town[T_ROUTE22]->AddWildPokemon(PK_SPEAROW);
$Town[T_ROUTE22]->AddWildPokemon(PK_MANKEY);
$Town[T_ROUTE22]->AddWildPokemon(PK_NIDORANM);
$Town[T_ROUTE22]->AddWildPokemon(PK_NIDORANF);
$Town[T_ROUTE22]->AddWildPokemon(PK_RATTATA);
$Town[T_ROUTE22]->AddWildPokemon(PK_POLIWHIRL,IT_SUPERROD);
$Town[T_ROUTE22]->AddWildPokemon(PK_POLIWAG,IT_SUPERROD);
$Town[T_ROUTE22]->AddWildPokemon(PK_GOLDEEN,IT_GOODROD);
$Town[T_ROUTE22]->AddWildPokemon(PK_POLIWAG,IT_GOODROD);
$Town[T_ROUTE22]->AddWildPokemon(PK_MAGICARP,IT_OLDROD);
$CurNPC = $Town[T_ROUTE22]->AddNPC("%RIVAL%", N_ALWAYSAGGRO); //First encounter with %RIVAL%
$Town[T_ROUTE22]->NPC[$CurNPC]->AddPokemon(PK_SPEAROW, 9);
$Town[T_ROUTE22]->NPC[$CurNPC]->AddPokemon(PK_EEVEE, 8);

AddTown(T_ROUTE2, "Route 2");
$Town[T_ROUTE2]->AddNode(T_VIRIDIAN,2);
$Town[T_ROUTE2]->AddNode(T_VIRIDIANFOREST,2);
$Town[T_ROUTE2]->AddWildPokemon(PK_PIDGEY);
$Town[T_ROUTE2]->AddWildPokemon(PK_RATTATA);
$Town[T_ROUTE2]->AddWildPokemon(PK_CATERPIE);
$Town[T_ROUTE2]->AddWildPokemon(PK_NIDORANM);
$Town[T_ROUTE2]->AddWildPokemon(PK_NIDORANF);

AddTown(T_VIRIDIANFOREST, "Viridian Forest");
$Town[T_VIRIDIANFOREST]->AddNode(T_ROUTE2,2);
$Town[T_VIRIDIANFOREST]->AddNode(T_PEWTER,2);
$Town[T_VIRIDIANFOREST]->AddWildPokemon(PK_PIDGEY);
$Town[T_VIRIDIANFOREST]->AddWildPokemon(PK_PIDGEOTTO,R_RARE);
$Town[T_VIRIDIANFOREST]->AddWildPokemon(PK_CATERPIE);
$Town[T_VIRIDIANFOREST]->AddWildPokemon(PK_METAPOD);

$CurNPC = $Town[T_VIRIDIANFOREST]->AddNPC("Lass", N_ALWAYSAGGRO);
$Town[T_VIRIDIANFOREST]->NPC[$CurNPC]->AddPokemon(PK_NIDORANF, 6);
$Town[T_VIRIDIANFOREST]->NPC[$CurNPC]->AddPokemon(PK_NIDORANM, 6);

$CurNPC = $Town[T_VIRIDIANFOREST]->AddNPC("Bug Catcher", N_ALWAYSAGGRO);
$Town[T_VIRIDIANFOREST]->NPC[$CurNPC]->AddPokemon(PK_CATERPIE, 7);
$Town[T_VIRIDIANFOREST]->NPC[$CurNPC]->AddPokemon(PK_CATERPIE, 7);

$CurNPC = $Town[T_VIRIDIANFOREST]->AddNPC("Bug Catcher", N_ALWAYSAGGRO);
$Town[T_VIRIDIANFOREST]->NPC[$CurNPC]->AddPokemon(PK_METAPOD, 8);
$Town[T_VIRIDIANFOREST]->NPC[$CurNPC]->AddPokemon(PK_CATERPIE, 8);

$CurNPC = $Town[T_VIRIDIANFOREST]->AddNPC("Bug Catcher", N_ALWAYSAGGRO);
$Town[T_VIRIDIANFOREST]->NPC[$CurNPC]->AddPokemon(PK_METAPOD, 6);
$Town[T_VIRIDIANFOREST]->NPC[$CurNPC]->AddPokemon(PK_CATERPIE, 8);
$Town[T_VIRIDIANFOREST]->NPC[$CurNPC]->AddPokemon(PK_METAPOD, 6);

$CurNPC = $Town[T_VIRIDIANFOREST]->AddNPC("Bug Catcher", N_ALWAYSAGGRO);
$Town[T_VIRIDIANFOREST]->NPC[$CurNPC]->AddPokemon (PK_CATERPIE, 10);

AddTown(T_PEWTER, "Pewter City");
$Town[T_PEWTER]->AddNode(T_VIRIDIANFOREST,2);
$Town[T_PEWTER]->AddNode(T_ROUTE3,2);
$CurBuilding = $Town[T_PEWTER]->AddBuilding(BLD_POKECENTER);

$CurBuilding = $Town[T_PEWTER]->AddBuilding(BLD_POKEMART);
$Town[T_PEWTER]->Building[$CurBuilding]->AddItem(IT_POKEBALL);
$Town[T_PEWTER]->Building[$CurBuilding]->AddItem(IT_POTION);
$Town[T_PEWTER]->Building[$CurBuilding]->AddItem(IT_ESCAPEROPE);
$Town[T_PEWTER]->Building[$CurBuilding]->AddItem(IT_AWAKENING);
$Town[T_PEWTER]->Building[$CurBuilding]->AddItem(IT_ANTIDOTE);
$Town[T_PEWTER]->Building[$CurBuilding]->AddItem(IT_PARALYZEHEAL);
$Town[T_PEWTER]->Building[$CurBuilding]->AddItem(IT_BURNHEAL);

AddTown(T_ROUTE3, "Route 3");
$Town[T_ROUTE3]->AddNode(T_PEWTER,2);
$Town[T_ROUTE3]->AddNode(T_MTMOON,2);

AddTown(T_MTMOON, "Mt. Moon");
$Town[T_MTMOON]->AddNode(T_ROUTE3,2);
$Town[T_MTMOON]->AddNode(T_ROUTE4,2);

AddTown(T_ROUTE4, "Route 4");
$Town[T_ROUTE4]->AddNode(T_MTMOON,2);
$Town[T_ROUTE4]->AddNode(T_CERULEAN,2);

AddTown(T_PEWTERGYM, "Pewter City Gym");
$Town[T_PEWTERGYM]->AddNode(T_PEWTER,2);
$CurNPC = $Town[T_PEWTERGYM]->AddNPC("Jr. Trainer", N_ALWAYSAGGRO);
$Town[T_PEWTERGYM]->NPC[$CurNPC]->AddPokemon(PK_DIGLETT, 8);
$Town[T_PEWTERGYM]->NPC[$CurNPC]->AddPokemon(PK_SANDSHREW, 8);
$CurNPC = $Town[T_PEWTERGYM]->AddNPC("Brock", N_ALWAYSAGGRO);
$Town[T_PEWTERGYM]->NPC[$CurNPC]->AddPokemon(PK_GEODUDE, 8);
$Town[T_PEWTERGYM]->NPC[$CurNPC]->AddPokemon(PK_ONIX, 8);