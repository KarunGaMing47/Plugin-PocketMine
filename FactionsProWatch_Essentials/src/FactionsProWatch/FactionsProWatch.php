<?php

namespace FactionsProWatch;

use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\Listener;

use Praxthisnovcht\EssentialsPEChat\EssentialsPEChat;
use FactionsPro\FactionsMain;

class FactionsProWatch extends PluginBase{
	
	public function onEnable(){
        @mkdir($this->getDataFolder());
        $this->saveDefaultConfig();
        $cfg = $this->getConfig();
        if(!$cfg->exists("if-player-has-no-faction")){
            $cfg->set("if-player-has-no-faction", "NoFaction");
        }
        $cfg->save();
        $cfg->reload();
		$this->getLogger()->info("FactionsProWatch Enabled");
		EssentialsPEChat::getInstance()->registerExtension($this);
	}
	public function onRegisterPrefix(){
		$getUserFaction = $this->factionspro->getPlayerFaction(strtolower($player->getName())); 
		EssentialsChat::getInstance()->replacePrefix("{FACTION}", FactionsPro::getInstance()->getUserFaction(EssentialsChat::getInstance()->getCurrentEvent()->getPlayer()->getName()));
		}else{
			$getNoFac = $this->getConfig ()->get ( "if-player-has-no-faction");
		EssentialsChat::getInstance()->replacePrefix("{FACTION}", FactionsProWatch::getInstance()->getNoFac(EssentialsChat::getInstance()->getCurrentEvent()->getPlayer()->getName()));		
	}
}