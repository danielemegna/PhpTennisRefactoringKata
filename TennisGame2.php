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

  public function wonPoint($player)
  {
    if ($player == $this->player1->getName())
      $this->P1Score();
    else
      $this->P2Score();
  }

  public function getScore()
  {
    $player1Score = $this->player1->getScore();
    $player2Score = $this->player2->getScore();

    $pointDiff = ($player1Score - $player2Score);
    if ($player1Score > 3 && $pointDiff > 1)
      return "Win for " . $this->player1->getName();

    if ($player2Score > 3 && $pointDiff < -1)
      return "Win for " . $this->player2->getName();

    if ($player1Score > 2 && $pointDiff < 0)
      return "Advantage " . $this->player2->getName();

    if ($player2Score > 2 && $pointDiff > 0)
      return "Advantage " . $this->player1->getName();


    if ($pointDiff == 0) {
      if($player1Score >= 3)
        return "Deuce";

      $p1ScoreToString = $this->scoreToString($player1Score);
      $p2ScoreToString = "All";
    } else {
      $p1ScoreToString = $this->scoreToString($player1Score);
      $p2ScoreToString = $this->scoreToString($player2Score);
    }

    return "{$p1ScoreToString}-{$p2ScoreToString}";
  }

  private function scoreToString($score) {
    if ($score == 0)
      return "Love";
    if ($score == 1)
      return "Fifteen";
    if ($score == 2)
      return "Thirty";
    if ($score == 3)
      return "Forty";

    throw new Exception("Cannot get string for score '$score'");
  }

  private function P1Score()
  {
    $this->player1->increaseScore();
  }

  private function P2Score()
  {
    $this->player2->increaseScore();
  }
}
