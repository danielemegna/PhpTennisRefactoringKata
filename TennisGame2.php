<?php

require_once "TennisGame.php";
require_once "Referee.php";
require_once "ScoreKeeper.php";
require_once "NamesRegister.php";

class TennisGame2 implements TennisGame
{
  private $referee;
  private $scoreKeeper;
  private $namesRegister;

  public function __construct($player1Name, $player2Name) {
    $this->namesRegister = new NamesRegister($player1Name, $player2Name);
    $this->scoreKeeper = new ScoreKeeper();
    $this->referee = new Referee();
  }

  public function wonPoint($playerName) {
    if ($playerName == $this->namesRegister->getPlayer1Name()) {
      $this->scoreKeeper->increasePlayer1Score();
      return;
    }
    
    $this->scoreKeeper->increasePlayer2Score();
  }

  public function getScore() {
    $score = $this->referee->generateScore(
      $this->namesRegister,
      $this->scoreKeeper
    );

    return $score->toString();
  }
}
