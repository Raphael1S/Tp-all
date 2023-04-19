<?php

namespace Raphael\Puxar;

# https://github.com/Raphael1S/Tp-all
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as TF;
use pocketmine\utils\Config;
require_once("Update.php");

class Blaze extends PluginBase {

public function onEnable() {
        $pluginName = $this->getDescription()->getName();
        $pluginVersion = $this->getDescription()->getVersion();
        atualizarPlugin($this, $pluginName, $pluginVersion);
        $this->saveResource("config.yml");
        $config = yaml_parse_file($this->getDataFolder() . "config.yml");
    if (!isset($config["permissão"]) || !is_string($config["permissão"])) {
        $this->getLogger()->error("Erro ao carregar o arquivo de configuração: a chave 'permissão' está ausente ou não é uma string.");
        $this->getServer()->getPluginManager()->disablePlugin($this);
        return;
    }
    $this->Limite = $config["Limite"];
    $this->configperm = $config["permissão"];
    $this->getLogger()->info("§aPuxarTodos habilitado! @ Raphael S.");
}
    
public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool {
    if ($cmd->getName() === "puxartodos") {
        if ($sender instanceof Player) {
            if (!$sender->hasPermission($this->configperm)) {
                $sender->sendMessage(TF::RED . "Você não tem permissão para executar este comando.");
                return true;
            }

            if (count($args) === 0) {
                $sender->sendMessage("§aAo executar este comando, você puxará todos os jogadores para si e pode causar sobrecarga no servidor. Se você tem certeza que quer fazer isso, execute o comando novamente com o argumento /puxartodos confirmar.");
                return true;
            } else if (count($args) === 1 && strtolower($args[0]) === "confirmar") {
$players = $sender->getServer()->getOnlinePlayers();
$count = count($players) - 1;
$teleportedPlayers = 0;
$teleportedAtOnce = $this->Limite;
while ($teleportedPlayers < $count) {
    $playersToTeleport = array_slice($players, $teleportedPlayers, $teleportedAtOnce);
    foreach ($playersToTeleport as $player) {
        if ($player !== $sender) {
            $player->teleport($sender);
            $player->addTitle("§aVocê foi puxado!");
        }
    }
    $teleportedPlayers += $teleportedAtOnce;
}
$message = TF::YELLOW . "× O Administrador §f" . $sender->getName() . " §eteleportou todos os §f" . $count . " §ejogadores para a sua localização!";
$sender->getServer()->broadcastMessage($message);
            } else {
                $sender->sendMessage(TF::RED . "Argumento inválido. Digite /puxartodos confirmar para puxar todos os jogadores para si.");
                return true;
            }
        } else {
            $sender->sendMessage(TF::RED . "Este comando só pode ser executado por um jogador.");
        }
        return true;
    }
    return false;
}
}
