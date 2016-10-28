<?php


namespace majorplayz;

use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;
use pocketmine\level\Level;
use pocketmine\level\Position;
use pocketmine\math\Vector3;

class Main extends PluginBase implements Listener {
	
	// Constnants:
	const AUTHOR = "MajorPlayz";
	const PREFIX = "Core:";
	
	public function onEnable() {
		$this->getLogger ()->info ( TextFormat::GREEN . "Majorcraft Core Started" );
		$this->saveDefaultConfig ();
		$this->reloadConfig ();
	}
	
	public function onDisable() {
		$this->getLogger ()->info ( TextFormat::GREEN . "SuperSpawners Disabled... Did the server stop?" );
	}
	
	public function onLoad() {
		$this->getLogger ()->info ( TextFormat::GREEN . "SuperSpawners Loaded" );
	}
	
	public function onBreak(BlockBreakEvent $event, Item $item){
		$player = $event->getPlayer;
		if ($event->getBlock === "MonsterSpawner") {
			$player->/* Code for giving item here */; /*Idk what :P */
		return;
		}
	}
}
?>