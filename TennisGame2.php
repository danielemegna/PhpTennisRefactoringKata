<?php

require_once "TennisGame.php";
require_once "Referee.php";
require_once "ScoreKeeper.php";
require_once "NamesRegister.php";

class TennisGame2 implements TennisGame
{
  private $referee;

  public function __construct($player1Name, $player2Name) {
    $this->referee = new Referee(
      new NamesRegister($player1Name, $player2Name),
      new ScoreKeeper()
    );
  }

  public function wonPoint($playerName) {
    $this->referee->wonPoint($playerName);
  }

  public function getScore() {
    return $this->referee->getScore();
  }
}
