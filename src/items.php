<?php
if ( !defined('pokemon') ) exit(); //This can only be included after an initial call.
/**
 *Skill Lists contain properties about what each skill does
*/
class ItemList {
	public $Name;
	public $Desc;
	public $Cost; //Element Type
}



/**
 *
 */
$Item[IT_ANTIDOTE]  =  new ItemList;
$Item[IT_ANTIDOTE]->Name = 'ANTIDOTE';
$Item[IT_ANTIDOTE]->Cost =100;
$item[IT_ANTIDOTE]->Desc = 'Cures poison.';

$Item[IT_AWAKENING]  =  new ItemList;
$Item[IT_AWAKENING]->Name = 'AWAKENING';
$Item[IT_AWAKENING]->Cost =250;
$item[IT_AWAKENING]->Desc = 'Cures sleep.';

$Item[IT_BICYCLE]  =  new ItemList;
$Item[IT_BICYCLE]->Name = 'BICYCLE';
$Item[IT_BICYCLE]->Cost = -1;
$item[IT_BICYCLE]->Desc = 'Allows you to move at double speed.';

$Item[IT_BIKEVOUCHER]  =  new ItemList;
$Item[IT_BIKEVOUCHER]->Name = 'BIKE VOUCHER';
$Item[IT_BIKEVOUCHER]->Cost = -1;
$item[IT_BIKEVOUCHER]->Desc = 'Redeem at Cerulean Bike Shop for free bike.';

$Item[IT_BURNHEAL]  =  new ItemList;
$Item[IT_BURNHEAL]->Name = 'BURN HEAL';
$Item[IT_BURNHEAL]->Cost =250;
$item[IT_BURNHEAL]->Desc = 'Cures burn.';

$Item[IT_CALCIUM]  =  new ItemList;
$Item[IT_CALCIUM]->Name = 'CALCIUM';
$Item[IT_CALCIUM]->Cost =9800;
$item[IT_CALCIUM]->Desc = 'floor.';

$Item[IT_CARDKEY]  =  new ItemList;
$Item[IT_CARDKEY]->Name = 'CARD KEY';
$Item[IT_CARDKEY]->Cost = -1;
$item[IT_CARDKEY]->Desc = 'Unlock certain doors at the Silph Company Building.';

$Item[IT_COINCASE]  =  new ItemList;
$Item[IT_COINCASE]->Name = 'COIN CASE';
$Item[IT_COINCASE]->Cost = -1;
$item[IT_COINCASE]->Desc = 'Allows you to hold up to 9';

$Item[IT_DIREHIT]  =  new ItemList;
$Item[IT_DIREHIT]->Name = 'DIRE HIT';
$Item[IT_DIREHIT]->Cost =650;
$item[IT_DIREHIT]->Desc = 'floor.';

$Item[IT_DOMEFOSSIL]  =  new ItemList;
$Item[IT_DOMEFOSSIL]->Name = 'DOME FOSSIL';
$Item[IT_DOMEFOSSIL]->Cost = -1;
$item[IT_DOMEFOSSIL]->Desc = 'Can be cloned into a Kabuto at the Cinnibar Island Lab.';

$Item[IT_ELIXER]  =  new ItemList;
$Item[IT_ELIXER]->Name = 'ELIXER';
$Item[IT_ELIXER]->Cost = -1;
$item[IT_ELIXER]->Desc = 'Restores 10PP to all techniques of one Pokemon.';

$Item[IT_ESCAPEROPE]  =  new ItemList;
$Item[IT_ESCAPEROPE]->Name = 'ESCAPE ROPE';
$Item[IT_ESCAPEROPE]->Cost =550;
$item[IT_ESCAPEROPE]->Desc = 'Teleport from any dungeon to last visited Poke Center.';

$Item[IT_ETHER]  =  new ItemList;
$Item[IT_ETHER]->Name = 'ETHER';
$Item[IT_ETHER]->Cost = -1;
$item[IT_ETHER]->Desc = 'Restores 10PP to one technique of one Pokemon.';

$Item[IT_EXPERIENCEALL]  =  new ItemList;
$Item[IT_EXPERIENCEALL]->Name = 'EXPERIENCE ALL';
$Item[IT_EXPERIENCEALL]->Cost = -1;
$item[IT_EXPERIENCEALL]->Desc = 'Splits EXP received in battle between all Pokemon in party.';

$Item[IT_FIRESTONE]  =  new ItemList;
$Item[IT_FIRESTONE]->Name = 'FIRE STONE';
$Item[IT_FIRESTONE]->Cost =2100;
$item[IT_FIRESTONE]->Desc = 'Can be used to evolve Growlithe';

$Item[IT_FRESHWATER]  =  new ItemList;
$Item[IT_FRESHWATER]->Name = 'FRESH WATER';
$Item[IT_FRESHWATER]->Cost =200;
$item[IT_FRESHWATER]->Desc = 'Recover 50 HP for one Pokemon';

$Item[IT_FULLHEAL]  =  new ItemList;
$Item[IT_FULLHEAL]->Name = 'FULL HEAL';
$Item[IT_FULLHEAL]->Cost =600;
$item[IT_FULLHEAL]->Desc = 'Cures any condition from one Pokemon.';

$Item[IT_FULLRESTORE]  =  new ItemList;
$Item[IT_FULLRESTORE]->Name = 'FULL RESTORE';
$Item[IT_FULLRESTORE]->Cost =3000;
$item[IT_FULLRESTORE]->Desc = 'Restores all HP and cures conditions of one Pokemon.';

$Item[IT_GOLDTEETH]  =  new ItemList;
$Item[IT_GOLDTEETH]->Name = 'GOLD TEETH';
$Item[IT_GOLDTEETH]->Cost = -1;
$item[IT_GOLDTEETH]->Desc = 'Return to Safari Zone Warden for HM04.';

$Item[IT_GOODROD]  =  new ItemList;
$Item[IT_GOODROD]->Name = 'GOOD ROD';
$Item[IT_GOODROD]->Cost = -1;
$item[IT_GOODROD]->Desc = 'Use this near water to fish for Poliwags and Goldeens.';

$Item[IT_GREATBALL]  =  new ItemList;
$Item[IT_GREATBALL]->Name = 'GREAT BALL';
$Item[IT_GREATBALL]->Cost =600;
$item[IT_GREATBALL]->Desc = 'Can be used to capture wild Pokemon. (medium)';

$Item[IT_GUARDSPECIAL]  =  new ItemList;
$Item[IT_GUARDSPECIAL]->Name = 'GUARD SPECIAL';
$Item[IT_GUARDSPECIAL]->Cost =700;
$item[IT_GUARDSPECIAL]->Desc = 'Temporarily protects one Pokemon from special attacks.';

$Item[IT_HELIXFOSSIL]  =  new ItemList;
$Item[IT_HELIXFOSSIL]->Name = 'HELIX FOSSIL';
$Item[IT_HELIXFOSSIL]->Cost = -1;
$item[IT_HELIXFOSSIL]->Desc = 'Can be cloned into an Omanyte at the Cinnibar Island Lab.';

$Item[IT_HPUP]  =  new ItemList;
$Item[IT_HPUP]->Name = 'HP UP';
$Item[IT_HPUP]->Cost =9800;
$item[IT_HPUP]->Desc = 'Boosts the max HP for one Pokemon.';

$Item[IT_HYPERPOTION]  =  new ItemList;
$Item[IT_HYPERPOTION]->Name = 'HYPER POTION';
$Item[IT_HYPERPOTION]->Cost =1500;
$item[IT_HYPERPOTION]->Desc = 'Recovers 200 HP for one Pokemon';

$Item[IT_ICEHEAL]  =  new ItemList;
$Item[IT_ICEHEAL]->Name = 'ICE HEAL';
$Item[IT_ICEHEAL]->Cost =250;
$item[IT_ICEHEAL]->Desc = 'Cures frozen.';

$Item[IT_IRON]  =  new ItemList;
$Item[IT_IRON]->Name = 'Iron';
$Item[IT_IRON]->Cost =9800;
$item[IT_IRON]->Desc = 'Boosts the Defense Stat of one Pokemon.';

$Item[IT_ITEMFINDER]  =  new ItemList;
$Item[IT_ITEMFINDER]->Name = 'ITEM FINDER';
$Item[IT_ITEMFINDER]->Cost = -1;
$item[IT_ITEMFINDER]->Desc = 'Reveals locations of hidden items in certain areas.';

$Item[IT_LEAFSTONE]  =  new ItemList;
$Item[IT_LEAFSTONE]->Name = 'LEAF STONE';
$Item[IT_LEAFSTONE]->Cost =2100;
$item[IT_LEAFSTONE]->Desc = 'Can be used to evolve Gloom';

$Item[IT_LEMONADE]  =  new ItemList;
$Item[IT_LEMONADE]->Name = 'LEMONADE';
$Item[IT_LEMONADE]->Cost =350;
$item[IT_LEMONADE]->Desc = 'Recovers 80 HP for one Pokemon';

$Item[IT_LIFTKEY]  =  new ItemList;
$Item[IT_LIFTKEY]->Name = 'LIFT KEY';
$Item[IT_LIFTKEY]->Cost = -1;
$item[IT_LIFTKEY]->Desc = 'Unlocks elevators in Celadon\'s Team Rocket Hideout.';

$Item[IT_MASTERBALL]  =  new ItemList;
$Item[IT_MASTERBALL]->Name = 'Master Ball';
$Item[IT_MASTERBALL]->Cost = -1;
$item[IT_MASTERBALL]->Desc = 'Absolutely never fails to capture a Pokemon.';

$Item[IT_MAXELIXIR]  =  new ItemList;
$Item[IT_MAXELIXIR]->Name = 'Max Elixir';
$Item[IT_MAXELIXIR]->Cost = -1;
$item[IT_MAXELIXIR]->Desc = 'Restores max PP to all techniques of one Pokemon.';

$Item[IT_MAXETHER]  =  new ItemList;
$Item[IT_MAXETHER]->Name = 'MAX ETHER';
$Item[IT_MAXETHER]->Cost = -1;
$item[IT_MAXETHER]->Desc = 'Restores max PP to one technique for one Pokemon.';

$Item[IT_MAXPOTION]  =  new ItemList;
$Item[IT_MAXPOTION]->Name = 'MAX POTION';
$Item[IT_MAXPOTION]->Cost =2500;
$item[IT_MAXPOTION]->Desc = 'Restores max HP for one Pokemon';

$Item[IT_MAXREPEL]  =  new ItemList;
$Item[IT_MAXREPEL]->Name = 'MAX REPEL';
$Item[IT_MAXREPEL]->Cost =700;
$item[IT_MAXREPEL]->Desc = 'Weak Pokemon will not attack for the next 250 steps.';

$Item[IT_MAXREVIVE]  =  new ItemList;
$Item[IT_MAXREVIVE]->Name = 'MAX REVIVE';
$Item[IT_MAXREVIVE]->Cost = -1;
$item[IT_MAXREVIVE]->Desc = 'Recovers one fainted Pokemon to full health.';

$Item[IT_MOONSTONE]  =  new ItemList;
$Item[IT_MOONSTONE]->Name = 'MOON STONE';
$Item[IT_MOONSTONE]->Cost = -1;
$item[IT_MOONSTONE]->Desc = ' Rocket Hideout';

$Item[IT_NUGGET]  =  new ItemList;
$Item[IT_NUGGET]->Name = 'NUGGET';
$Item[IT_NUGGET]->Cost = -1;
$item[IT_NUGGET]->Desc = 'No other use then to be sold for cash';

$Item[IT_OAKSPARCEL]  =  new ItemList;
$Item[IT_OAKSPARCEL]->Name = 'OAK\'S PARCEL';
$Item[IT_OAKSPARCEL]->Cost = -1;
$item[IT_OAKSPARCEL]->Desc = 'Deliver to Professor Oak in Pallet Town to receive your';

$Item[IT_OLDAMBER]  =  new ItemList;
$Item[IT_OLDAMBER]->Name = 'OLD AMBER';
$Item[IT_OLDAMBER]->Cost = -1;
$item[IT_OLDAMBER]->Desc = 'Can be cloned into an Aerodactyl in Cinnibar Island Lab.';

$Item[IT_OLDROD]  =  new ItemList;
$Item[IT_OLDROD]->Name = 'OLD ROD';
$Item[IT_OLDROD]->Cost = -1;
$item[IT_OLDROD]->Desc = 'Use this near water to fish for Magikarps.';

$Item[IT_PARALYZEHEAL]  =  new ItemList;
$Item[IT_PARALYZEHEAL]->Name = 'PARALYZE HEAL';
$Item[IT_PARALYZEHEAL]->Cost =200;
$item[IT_PARALYZEHEAL]->Desc = 'Cures Paralyzed.';

$Item[IT_POKEBALL]  =  new ItemList;
$Item[IT_POKEBALL]->Name = 'POKE BALL';
$Item[IT_POKEBALL]->Cost =200;
$item[IT_POKEBALL]->Desc = 'Can be used to capture wild Pokemon. (weakest)';

$Item[IT_POKEDOLL]  =  new ItemList;
$Item[IT_POKEDOLL]->Name = 'POKE DOLL';
$Item[IT_POKEDOLL]->Cost =1000;
$item[IT_POKEDOLL]->Desc = 'TM 31 for it in Saffron City.';

$Item[IT_POKEFLUTE]  =  new ItemList;
$Item[IT_POKEFLUTE]->Name = 'POKE FLUTE';
$Item[IT_POKEFLUTE]->Cost = -1;
$item[IT_POKEFLUTE]->Desc = 'Cures Sleep.';

$Item[IT_POTION]  =  new ItemList;
$Item[IT_POTION]->Name = 'POTION';
$Item[IT_POTION]->Cost =300;
$item[IT_POTION]->Desc = 'Recover 20 HP from one Pokemon';

$Item[IT_PPUP]  =  new ItemList;
$Item[IT_PPUP]->Name = 'PP UP';
$Item[IT_PPUP]->Cost = -1;
$item[IT_PPUP]->Desc = 'Boosts max PP of one technique for one of your Pokemon by 20';

$Item[IT_PROTEIN]  =  new ItemList;
$Item[IT_PROTEIN]->Name = 'PROTEIN';
$Item[IT_PROTEIN]->Cost =9800;
$item[IT_PROTEIN]->Desc = 'Boosts the Attack Stat of one Pokemon.';

$Item[IT_RARECANDY]  =  new ItemList;
$Item[IT_RARECANDY]->Name = 'RARE CANDY';
$Item[IT_RARECANDY]->Cost = -1;
$item[IT_RARECANDY]->Desc = 'Raises the level of any Pokemon by one.';

$Item[IT_REPEL]  =  new ItemList;
$Item[IT_REPEL]->Name = 'REPEL';
$Item[IT_REPEL]->Cost =350;
$item[IT_REPEL]->Desc = 'Weak Pokemon will not be able to attack you for the next 100';

$Item[IT_REVIVE]  =  new ItemList;
$Item[IT_REVIVE]->Name = 'REVIVE';
$Item[IT_REVIVE]->Cost =1500;
$item[IT_REVIVE]->Desc = 'Recovers one fainted Pokemon\'s HP to 1/2 max HP.';

$Item[IT_SSTICKET]  =  new ItemList;
$Item[IT_SSTICKET]->Name = 'S.S. TICKET';
$Item[IT_SSTICKET]->Cost = -1;
$item[IT_SSTICKET]->Desc = 'Allows you to bard the S.S. Anne in Vermillion City.';

$Item[IT_SAFARIBALL]  =  new ItemList;
$Item[IT_SAFARIBALL]->Name = 'SAFARI BALL';
$Item[IT_SAFARIBALL]->Cost = -1;
$item[IT_SAFARIBALL]->Desc = 'Can be used to capture wild Pokemon in the Safari Zone.';

$Item[IT_SECRETKEY]  =  new ItemList;
$Item[IT_SECRETKEY]->Name = 'SECRET KEY';
$Item[IT_SECRETKEY]->Cost = -1;
$item[IT_SECRETKEY]->Desc = 'Unlocks door to Blaine\'s Gym in Cinnibar Island.';

$Item[IT_SILPHSCOPE]  =  new ItemList;
$Item[IT_SILPHSCOPE]->Name = 'SILPH SCOPE';
$Item[IT_SILPHSCOPE]->Cost = -1;
$item[IT_SILPHSCOPE]->Desc = 'Allows you to see ghosts';

$Item[IT_SODAPOP]  =  new ItemList;
$Item[IT_SODAPOP]->Name = 'SODA POP';
$Item[IT_SODAPOP]->Cost =300;
$item[IT_SODAPOP]->Desc = 'Recovers 60 HP for one of your Pokemon';

$Item[IT_SUPERPOTION]  =  new ItemList;
$Item[IT_SUPERPOTION]->Name = 'SUPER POTION';
$Item[IT_SUPERPOTION]->Cost =700;
$item[IT_SUPERPOTION]->Desc = 'Recovers 70 HP for one of your Pokemon in or out of battle.';

$Item[IT_SUPERREPEL]  =  new ItemList;
$Item[IT_SUPERREPEL]->Name = 'SUPER REPEL';
$Item[IT_SUPERREPEL]->Cost =500;
$item[IT_SUPERREPEL]->Desc = 'Weak Pokemon will not attack you for the next 200 steps.';

$Item[IT_SUPERROD]  =  new ItemList;
$Item[IT_SUPERROD]->Name = 'SUPER ROD';
$Item[IT_SUPERROD]->Cost = -1;
$item[IT_SUPERROD]->Desc = 'Use this near water to fish for any Pokemon.';

$Item[IT_THUNDERSTONE]  =  new ItemList;
$Item[IT_THUNDERSTONE]->Name = 'THUNDER STONE';
$Item[IT_THUNDERSTONE]->Cost =2100;
$item[IT_THUNDERSTONE]->Desc = 'Can be used to evolve Eevee and Pikachu.';

$Item[IT_TOWNMAP]  =  new ItemList;
$Item[IT_TOWNMAP]->Name = 'TOWN MAP';
$Item[IT_TOWNMAP]->Cost = -1;
$item[IT_TOWNMAP]->Desc = 'Shows your position on the Pokemon\'s World Map.';

$Item[IT_ULTRABALL]  =  new ItemList;
$Item[IT_ULTRABALL]->Name = 'ULTRA BALL';
$Item[IT_ULTRABALL]->Cost = -1;
$item[IT_ULTRABALL]->Desc = 'Can be used to capture wild Pokemon. (strongest)';

$Item[IT_WATERSTONE]  =  new ItemList;
$Item[IT_WATERSTONE]->Name = 'WATER STONE';
$Item[IT_WATERSTONE]->Cost =2100;
$item[IT_WATERSTONE]->Desc = 'Can be used to evolve Poliwhirl';

$Item[IT_XACCURACY]  =  new ItemList;
$Item[IT_XACCURACY]->Name = 'X ACCURACY';
$Item[IT_XACCURACY]->Cost =950;
$item[IT_XACCURACY]->Desc = 'Temporarily raises the Accuracy of one Pokemon.';

$Item[IT_XATTACK]  =  new ItemList;
$Item[IT_XATTACK]->Name = 'X ATTACK';
$Item[IT_XATTACK]->Cost =500;
$item[IT_XATTACK]->Desc = 'Temporarily raises one Pokemon\'s Attack Stat.';

$Item[IT_XDEFEND]  =  new ItemList;
$Item[IT_XDEFEND]->Name = 'X DEFEND';
$Item[IT_XDEFEND]->Cost =550;
$item[IT_XDEFEND]->Desc = 'Temporarily raises one Pokemon\'s Defense Stat.';

$Item[IT_XSPECIAL]  =  new ItemList;
$Item[IT_XSPECIAL]->Name = 'X SPECIAL';
$Item[IT_XSPECIAL]->Cost =350;
$item[IT_XSPECIAL]->Desc = 'Temporarily raises on Pokemon\'s Special Stat.';

$Item[IT_XSPEED]  =  new ItemList;
$Item[IT_XSPEED]->Name = 'X SPEED';
$Item[IT_XSPEED]->Cost =350;
$item[IT_XSPEED]->Desc = 'Temporarily raises one Pokemon\'s Speed Stat.';


