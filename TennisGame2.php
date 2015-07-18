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
    $player1Score = $this->player1->getScore();
    $player2Score = $this->player2->getScore();
    
    if ($player1Score == $player2Score) {
      if($player1Score > 2)
        return $this->scoreFormatter->deuceString();

      return $this->scoreFormatter->tieString($player1Score);
    }
    
    $scoreDiff = ($player1Score - $player2Score);
    if ($player1Score > 3 && $scoreDiff > 1)
      return $this->scoreFormatter->winString($this->player1->getName());

    if ($player2Score > 3 && $scoreDiff < -1)
      return $this->scoreFormatter->winString($this->player2->getName());

    if ($player1Score > 2 && $scoreDiff == -1)
      return $this->scoreFormatter->advantageString($this->player2->getName());

    if ($player2Score > 2 && $scoreDiff == 1)
      return $this->scoreFormatter->advantageString($this->player1->getName());

    $p1ScoreToString = $this->scoreFormatter->scoreToString($player1Score);
    $p2ScoreToString = $this->scoreFormatter->scoreToString($player2Score);
    return "{$p1ScoreToString}-{$p2ScoreToString}";
  }

}
