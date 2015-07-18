<?php

require_once "TennisGame.php";
require_once "Player.php";
require_once "ScoreFormatter.php";

class TennisGame2 implements TennisGame
{
  private $player1;
  private $player2;

  private $scoreFormatter;

  public function __construct($P1name, $P2name)
  {
    $this->player1 = new Player($P1name);
    $this->player2 = new Player($P2name);

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
    $scoreDiff = ($player1Score - $player2Score);

    if ($scoreDiff == 0) {
      if($player1Score >= 3)
        return $this->scoreFormatter->deuceString();

      return $this->scoreFormatter->tieString($player1Score);
    }

    if ($player1Score > 3 && $scoreDiff > 1)
      return $this->scoreFormatter->winString($this->player1->getName());

    if ($player2Score > 3 && $scoreDiff < -1)
      return $this->scoreFormatter->winString($this->player2->getName());

    if ($player1Score > 2 && $scoreDiff < 0)
      return $this->scoreFormatter->advantageString($this->player2->getName());

    if ($player2Score > 2 && $scoreDiff > 0)
      return $this->scoreFormatter->advantageString($this->player1->getName());

    $p1ScoreToString = $this->scoreFormatter->scoreToString($player1Score);
    $p2ScoreToString = $this->scoreFormatter->scoreToString($player2Score);
    return "{$p1ScoreToString}-{$p2ScoreToString}";
  }

}
