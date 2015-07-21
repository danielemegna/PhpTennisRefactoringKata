<?php

require_once "TennisGame.php";
require_once "Player.php";
require_once "ScoreFormatter.php";
require_once "ScoreKeeper.php";

class TennisGame2 implements TennisGame
{
  private $player1;
  private $player2;

  private $scoreFormatter;
  private $scoreKeeper;

  public function __construct($player1Name, $player2Name)
  {
    $this->player1 = new Player($player1Name);
    $this->player2 = new Player($player2Name);

    $this->scoreFormatter = new ScoreFormatter();
    $this->scoreKeeper = new ScoreKeeper();
  }

  public function wonPoint($playerName)
  {
    if ($playerName == $this->player1->getName()) {
      $this->scoreKeeper->increasePlayer1Score();
      return;
    }

    $this->scoreKeeper->increasePlayer2Score();
  }

  public function getScore()
  {
    if($this->scoreKeeper->thereIsATie())
      return $this->scoreFormatter->tieMessage($this->scoreKeeper->getPlayer1Score());

    if($this->scoreKeeper->areScoresUnderFour()) {
      return $this->scoreFormatter->defaultMessage(
        $this->scoreKeeper->getPlayer1Score(),
        $this->scoreKeeper->getPlayer2Score()
      );
    }

    $advantagedPlayerName = $this->getAdvantagedPlayerName();

    if($this->scoreKeeper->isOneTheScoreDifference())
      return $this->scoreFormatter->advantageMessage($advantagedPlayerName);

    return $this->scoreFormatter->winMessage($advantagedPlayerName);
  }

  public function getAdvantagedPlayerName() {
    if($this->scoreKeeper->isPlayer1Advantaged())
      return $this->player1->getName();
      
    return $this->player2->getName();
  }

}
