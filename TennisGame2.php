<?php

require_once "TennisGame.php";
require_once "Player.php";
require_once "ScoreFormatter.php";
require_once "ScoreBoard.php";

class TennisGame2 implements TennisGame
{
  private $player1;
  private $player2;

  private $scoreFormatter;
  private $scoreBoard;

  public function __construct($player1Name, $player2Name)
  {
    $this->player1 = new Player($player1Name);
    $this->player2 = new Player($player2Name);

    $this->scoreFormatter = new ScoreFormatter();
    $this->scoreBoard = new ScoreBoard();
  }

  public function wonPoint($playerName)
  {
    if ($playerName == $this->player1->getName()) {
      $this->scoreBoard->increasePlayer1Score();
      return;
    }

    $this->scoreBoard->increasePlayer2Score();
  }

  public function getScore()
  {
    if($this->thereIsATie())
      return $this->scoreFormatter->tieMessage($this->scoreBoard->getPlayer1Score());

    if($this->areScoresUnderFour()) {
      return $this->scoreFormatter->defaultMessage(
        $this->scoreBoard->getPlayer1Score(),
        $this->scoreBoard->getPlayer2Score()
      );
    }

    $advantagedPlayerName = $this->getAdvantagedPlayerName();

    if($this->isOneTheScoreDifference())
      return $this->scoreFormatter->advantageMessage($advantagedPlayerName);

    return $this->scoreFormatter->winMessage($advantagedPlayerName);
  }

  private function thereIsATie() {
    return $this->scoreBoard->getPlayer1Score() == $this->scoreBoard->getPlayer2Score();
  }

  private function areScoresUnderFour() {
    return $this->scoreBoard->getPlayer1Score() < 4 &&
      $this->scoreBoard->getPlayer2Score() < 4;
  }

  private function getAdvantagedPlayerName() {
    if($this->scoreBoard->getPlayer1Score() > $this->scoreBoard->getPlayer2Score())
      return $this->player1->getName();
      
    return $this->player2->getName();
  }

  private function isOneTheScoreDifference() {
    $scoreDifference = $this->scoreBoard->getPlayer1Score() - $this->scoreBoard->getPlayer2Score();
    return (abs($scoreDifference) == 1);
  }
}
