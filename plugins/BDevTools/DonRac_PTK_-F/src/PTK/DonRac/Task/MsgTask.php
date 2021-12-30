<?php
namespace PTK\DonRac\Task;

use pocketmine\scheduler\PluginTask;
use pocketmine\Server;
use pocketmine\utils\TextFormat as F;
use PTK\DonRac\Main;

/**
 * Class MsgTask
 * @package PTK\DonRac\Task
 */
class MsgTask extends PluginTask
{
    /**
     * @param Main $main
     */
    function __construct(Main $main)
    {
        parent::__construct($main);
        $this->plugin = $main;
    }

    /**
     * @param $currentTick
     */
    function onRun($currentTick)
    {
        Server::getInstance()->broadcastMessage(F::GREEN . Main::getInstance()->config->get("ThongBao-msg"));
 
        Server::getInstance()->broadcastMessage(F::GREEN . "§b[§bL§aO§6G§6-§9Dọn Rác§b]§c Chúng Tôi Không Chịu Trách Nhiệm Nếu Bạn Bị Xóa Đồ Khi Rơi Ở Đất");
    }
}