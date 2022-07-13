<?php

namespace Auslatos;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\entity\effect\EffectInstance;
use pocketmine\entity\effect\VanillaEffects;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\player\Player;

class Main extends PluginBase implements Listener{

    public function onEnable(): void
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->notice("The NightVision Plugin Is Perfectly Working !");
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool
    {
        $commandname = $command->getName();
            if($commandname == "nightvision"){
                if($sender instanceof Player){
                     if($sender->getEffects()->has(VanillaEffects::NIGHT_VISION())){
                $sender->getEffects()->remove(VanillaEffects::NIGHT_VISION());
                $sender->sendMessage("You are no longer affected by NightVision");
        }else{
            $effect = new EffectInstance(VanillaEffects::NIGHT_VISION(), 20*10000, 0, false);
            $sender->getEffects()->add($effect);
            $sender->sendMessage("You are now affected by NightVision");
                }
            }
        }return true;
    }
}