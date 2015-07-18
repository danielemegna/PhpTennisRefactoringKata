<?php

require_once "TennisGame.php";
require_once "Player.php";

class TennisGame2 implements TennisGame
{
  private $player1;
  private $player2;

  public function __construct($P1name, $P2name)
  {
    $this->player1 = new Player($P1name);
    $this->player2 = new Player($P2name);
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
        return "Deuce";

      $p1ScoreToString = $this->scoreToString($player1Score);
      $p2ScoreToString = "All";
      return "{$p1ScoreToString}-{$p2ScoreToString}";
    }

    if ($player1Score > 3 && $scoreDiff > 1)
      return "Win for " . $this->player1->getName();

    if ($player2Score > 3 && $scoreDiff < -1)
      return "Win for " . $this->player2->getName();

    if ($player1Score > 2 && $scoreDiff < 0)
      return "Advantage " . $this->player2->getName();

    if ($player2Score > 2 && $scoreDiff > 0)
      return "Advantage " . $this->player1->getName();

    $p1ScoreToString = $this->scoreToString($player1Score);
    $p2ScoreToString = $this->scoreToString($player2Score);

    return "{$p1ScoreToString}-{$p2ScoreToString}";
  }

  private function scoreToString($score) {
    $dictionary = [
      0 => "Love",
      1 => "Fifteen",
      2 => "Thirty",
      3 => "Forty",
    ];

    return $dictionary[$score];
  }
}
