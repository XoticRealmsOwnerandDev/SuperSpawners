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
use pocketmine\block\Block;
use utils\toggle;

class Main extends PluginBase implements Listener {
	
	


class ToggleClass {
	public function toggle() {
		if ($spawners->toggle ()) {
			$spawners->toggle ();
			return true;
		}
		if (! $spawners->toggle ()) {
			$spawners->toggle ();
			return true;
		} else {
			return false;
		}
	}
	public function spawners() {
		$spawners = spawners ();
		global $spawners;
		
		return new ToggleClass ();
	}
	
	// Constnants:
	const AUTHOR = "MajorPlayz";
	const PREFIX = "Core:";
	public function onEnable() {
		$this->getLogger ()->info ( TextFormat::GREEN . "SuperSpawners Started" );
		$this->saveDefaultConfig ();
		$this->reloadConfig ();
	}
	public function onDisable() {
		$this->getLogger ()->info ( TextFormat::GREEN . "SuperSpawners Disabled... Did the server stop?" );
		broadcast ( "Server shutting down..." );
	}
	public function broadcast($message, $specificPlayer) {
		if (isset ( $specficPlayer )) {
			$specificPlayer->sendMessage ( $message );
		} else {
			
			global $specificPlayer; // Read below
			                        
			// set $specificPlayer to null because I might need it later on :P
			$specificPlayer = null;
			
			// Send Message to all online players
			$playersOnline = $this->getOnlinePlayers ();
			foreach ( $playersOnline as $player ) {
				$player->sendMessage ( $message );
			}
		}
	}
	public function onLoad() {
		$this->getLogger ()->info ( TextFormat::GREEN . "SuperSpawners Loaded" );
		broadcast ( TextFormat::YELLOW . "SuperSpawners Loaded!" . TextFormat::BLUE . "Auto-update status: " . $this->getConfig ( "updater" ) );
	}
	public function onCommand(CommandSender $sender, Command $command, $label, array $args) {
		if (! $sender instanceof Player) { // Start of if
			$sender->sendMessage ( TextFormat::BLUE . "############################" );
			$sender->sendMessage ( TextFormat::BLUE . "#" . TextFormat::GREEN . " Use this command in-game" . TextFormat::BLUE . " #" );
			$sender->sendMessage ( TextFormat::BLUE . "############################" );
			return false;
		} else { // Start Of Else end of if
			switch ($command) {
				case "spawners" :
					{
						if (! isset ( $args [0] )) {
							if (! $sender->hasPermission ( "spawners.toggle" ))
								return;
							$sender->sendMessage ( TextFormat::GOLD . "-------------" );
							$sender->sendMessage ( TextFormat::GREEN . "SuperSpawners" );
							$sender->sendMessage ( TextFormat::GOLD . "-------------" );
							
							if (isset ( $args [1] ) && $arges [1] === (strtolower ( $args [1] ) === "toggle")) {
								$sender->sendMessage ( TextFormat::BLUE . "Toggled!" );
								$spawners->toggle ();
								return true;
							}
							if (! isset ( $args [1] )) {
								$sender->sendMessage ( TextFormart::BLUE . "Use " . TextFormat::GREEN . "/spawners toggle" . TextFormat::BLUE . "to toggle SuperSpawners" );
								return false;
							}
							
							if ((isset[$args[1]]) && (strtolower($args[1]) === "info")) {
								
								$sender->sendMessage ( TextFormat::AQUA . "S" . TextFormat::GOLD . "uper " . TextFormat::AQUA . "S" . TextFormat::GOLD . "pawners\n" );
								$sender->sendMessage ( TextFormat::BLUE . "Made by " . TextFormat::GOLD . TextFormat::BOLD . "MajorPlayz" . TextFormat::RESET . TextFormat::BLUE . " for Proj3ctGoldYT" );
								$sender->sendMessage ( TextFormat::BLUE . "Do " . TextFormat::RED . "/spawners toggle" . TextFormat::BLUE . " to toggle SuperSpawners" );
								
								return true;
							}
						}
						
						return true;
						break;
					} // End Of if
			} // End Of Case "spawners":
		} // End Of Switch
	} // End Of else
} // End Of onCommand
} // End Of Plugin
?>
