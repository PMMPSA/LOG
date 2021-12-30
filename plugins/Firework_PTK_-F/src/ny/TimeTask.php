<?php

namespace ny;
use pocketmine\level\sound\BatSound;
use pocketmine\level\sound\ClickSound;
use pocketmine\level\sound\DoorSound;
use pocketmine\level\sound\FizzSound;
use pocketmine\level\sound\GenericSound;
use pocketmine\level\sound\LaunchSound;
use pocketmine\level\sound\PopSound;
use pocketmine\plugin\PluginBase;
use pocketmine\scheduler\CallbackTask;
use pocketmine\scheduler\PluginTask;
use pocketmine\event\Listener;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\bkock\BlockPlaceEvent;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\level\Position;
use pocketmine\level\particle\DustParticle;
use pocketmine\level\particle\DestroyBlockParticle as TheMaksParticle_Gold;
use pocketmine\level\particle\ItemBreakParticle;
use pocketmine\level\particle\HeartParticle;
use pocketmine\level\particle\ExplodeParticle;
use pocketmine\level\particle\FloatingTextParticle;
use pocketmine\math\Vector3;
use pocketmine\item\Item;
use pocketmine\block\Block;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\level\particle\FlameParticle;
use pocketmine\level\particle\RedstoneParticle;
use pocketmine\level\particle\LavaDripParticle;
use pocketmine\level\particle\PortalParticle;
use pocketmine\network\protocol\AddEntityPacket;
use pocketmine\entity\Entity;
class TimeTask extends PluginTask{public function __construct(p $plugin){parent::__construct($plugin);$this->p = $plugin;$this->time = 10;}public function onRun($currentTick){ $this->time--; switch($this->time){ case 9:{ $x = $this->p->getServer()->getDefaultLevel()->getSafeSpawn()->getX(); $y = $this->p->getServer()->getDefaultLevel()->getSafeSpawn()-> getY(); $z = $this->p->getServer()->getDefaultLevel()->getSafeSpawn()->getZ(); $l = $this->p->getServer()->getDefaultLevel(); $l->addParticle(new FlameParticle(new Vector3($x, $y, $z))); $l->addParticle(new FlameParticle(new Vector3($x, $y + 1, $z))); $l->addParticle(new FlameParticle(new Vector3($x, $y + 2, $z))); break; } case 8:{ $x = $this->p->getServer()->getDefaultLevel()->getSafeSpawn()->getX(); $y = $this->p->getServer()->getDefaultLevel()->getSafeSpawn()-> getY(); $z = $this->p->getServer()->getDefaultLevel()->getSafeSpawn()->getZ(); $l = $this->p->getServer()->getDefaultLevel(); $l->addParticle(new FlameParticle(new Vector3($x, $y, $z))); $l->addParticle(new FlameParticle(new Vector3($x, $y + 1, $z))); $l->addParticle(new FlameParticle(new Vector3($x, $y + 2, $z))); $l->addParticle(new FlameParticle(new Vector3($x, $y + 3, $z))); $l->addParticle(new FlameParticle(new Vector3($x, $y + 4, $z))); $l->addParticle(new FlameParticle(new Vector3($x, $y + 5, $z))); break; } case 7:{ $x = $this->p->getServer()->getDefaultLevel()->getSafeSpawn()->getX(); $y = $this->p->getServer()->getDefaultLevel()->getSafeSpawn()-> getY(); $z = $this->p->getServer()->getDefaultLevel()->getSafeSpawn()->getZ(); $l = $this->p->getServer()->getDefaultLevel(); $l->addParticle(new FlameParticle(new Vector3($x, $y, $z))); $l->addParticle(new FlameParticle(new Vector3($x, $y + 1, $z))); $l->addParticle(new FlameParticle(new Vector3($x, $y + 2, $z))); $l->addParticle(new FlameParticle(new Vector3($x, $y + 3, $z))); $l->addParticle(new FlameParticle(new Vector3($x, $y + 4, $z))); $l->addParticle(new FlameParticle(new Vector3($x, $y + 5, $z))); $l->addParticle(new FlameParticle(new Vector3($x, $y + 6, $z))); $l->addParticle(new FlameParticle(new Vector3($x, $y + 7, $z ))); $l->addParticle(new FlameParticle(new Vector3($x, $y + 8, $z))); $this->ll(); $this->l(); $l->addSound(new FizzSound(new Vector3($x, $y + 9, $z))); $l->addSound(new PopSound(new Vector3($x, $y + 9, $z))); $l->addSound(new ClickSound(new Vector3($x, $y + 9, $z))); break; } case 0:{ $this->time = 10; break; } } } public function l() { $level = $this->p->getServer()->getDefaultLevel(); $x = $this->p->getServer()->getDefaultLevel()->getSafeSpawn()->getX(); $yy = $this->p->getServer()->getDefaultLevel()->getSafeSpawn()-> getY(); $z = $this->p->getServer()->getDefaultLevel()->getSafeSpawn()->getZ(); $y = $yy + 10; $center = new Vector3($x, $y, $z); $radius = 4.0; $count = 650; $r = mt_rand(0, 300); $g = mt_rand(0, 300); $b = mt_rand(0, 300); $center = new Vector3($x, $y + 1, $z); $particle = new DustParticle($center, $r, $g, $b); for ($i = 0; $i < $count; $i++) { $pitch = (mt_rand() / mt_getrandmax() - 0.5) * M_PI; $yaw = mt_rand() / mt_getrandmax() * 2 * M_PI; $y = -sin($pitch); $delta = cos($pitch); $x = -sin($yaw) * $delta; $z = cos($yaw) * $delta; $v = new Vector3($x, $y, $z); $p = $center->add($v->normalize()->multiply($radius)); $particle->setComponents($p->x, $p->y, $p->z); $level->addParticle($particle); } } public function ll() { $level = $this->p->getServer()->getDefaultLevel(); $x = $this->p->getServer()->getDefaultLevel()->getSafeSpawn()->getX(); $yy = $this->p->getServer()->getDefaultLevel()->getSafeSpawn()-> getY(); $z = $this->p->getServer()->getDefaultLevel()->getSafeSpawn()->getZ(); $y = $yy + 10; $center = new Vector3($x, $y, $z); $radius = 3.0; $count = 650; $r = mt_rand(0, 200); $g = mt_rand(0, 200); $b = mt_rand(0, 200); $center = new Vector3($x, $y + 1, $z); $particle = new DustParticle($center, $r, $g, $b); for ($i = 0; $i < $count; $i++) { $pitch = (mt_rand() / mt_getrandmax() - 0.5) * M_PI; $yaw = mt_rand() / mt_getrandmax() * 2 * M_PI; $y = -sin($pitch); $delta = cos($pitch); $x = -sin($yaw) * $delta; $z = cos($yaw) * $delta; $v = new Vector3($x, $y, $z); $p = $center->add($v->normalize()->multiply($radius)); $particle->setComponents($p->x, $p->y, $p->z); $level->addParticle($particle); } } }