<?php

require_once "TennisGame.php";
require_once "Player.php";
require_once "ScoreFormatter.php";

class TennisGame2 implements TennisGame
{
  private $player1;
  private $player2;

  private $scoreFormatter;

  public function __construct($player1Name, $player2Name)
  {
    $this->player1 = new Player($player1Name);
    $this->player2 = new Player($player2Name);

    $this->scoreFormatter = new ScoreFormatter();
  }

  public function wonPoint($playerName)
  {
    if ($playerName == $this->player1->getName()) {
      $this->player1->increaseScore();
      return;
    }

    $this->player2->increaseScore();
  }

  public function getScore()
  {
    if($this->thereIsATie())
      return $this->scoreFormatter->tieMessage($this->player1->getScore());

    if($this->areScoresUnderFour()) {
      return $this->scoreFormatter->defaultMessage(
        $this->player1->getScore(),
        $this->player2->getScore()
      );
    }

    $advantagedPlayerName = $this->getAdvantagedPlayerName();

    if($this->isOneTheScoreDifference())
      return $this->scoreFormatter->advantageMessage($advantagedPlayerName);

    return $this->scoreFormatter->winMessage($advantagedPlayerName);
  }

  private function thereIsATie() {
    return $this->player1->getScore() == $this->player2->getScore();
  }

  private function areScoresUnderFour() {
    return $this->player1->getScore() < 4 &&
      $this->player2->getScore() < 4;
  }

  private function getAdvantagedPlayerName() {
    if($this->player1->getScore() > $this->player2->getScore())
      return $this->player1->getName();
      
    return $this->player2->getName();
  }

  private function isOneTheScoreDifference() {
    $scoreDifference = $this->player1->getScore() - $this->player2->getScore();
    return (abs($scoreDifference) == 1);
  }
}
