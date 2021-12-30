<?php

namespace Vo\Vo;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\math\Vector3;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\utils\Config;
use pocketmine\level\Position;
use pocketmine\level\Level;

class Vo extends PluginBase implements Listener {
	
	public function onEnable() {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getServer()->getLogger()->info("§aNoVoid đã hoạt động");
	}
	
	public function onDisable() {
		$this->getServer()->getLogger()->info("§cNoVoid disabled!");
	}
	
	public function onMove(PlayerMoveEvent $event) {
		$player = $event->getPlayer();
        $world = $player->getLevel();
		if($event->getPlayer()->getY() < -5) {
			$name = $player->getName();
	$player->teleport(new Position(-40, 1074, 145, $this->getServer()->getLevelByName("world")));
			$event->getPlayer()->teleport($event->getPlayer()->getLevel()->getSafeSpawn());
		}
	}
	
	/*public function onDamage(EntityDamageEvent $event) {
		$player = $event->getPlayer();
        $world = $player->getLevel();
		if($event->getEntity() instanceof Player && $event->getEntity()->getY() < 0) {
			$event->setCancelled();
			$name = $player->getName();
	$player->teleport(new Position(-40, 1074, 145, $this->getServer()->getLevelByName("world")));
		}
	}*/
}