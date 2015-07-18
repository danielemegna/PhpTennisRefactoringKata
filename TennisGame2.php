<?php

require_once "TennisGame.php";

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
    $pointDiff = ($this->player1->getScore() - $this->player2->getScore());
    if ($this->player1->getScore() > 3 && $pointDiff > 1)
      return "Win for " . $this->player1->getName();

    if ($this->player2->getScore() > 3 && $pointDiff < -1)
      return "Win for " . $this->player2->getName();

    if ($this->player1->getScore() > 2 && $pointDiff < 0)
      return "Advantage " . $this->player2->getName();

    if ($this->player2->getScore() > 2 && $pointDiff > 0)
      return "Advantage " . $this->player1->getName();


    if ($pointDiff == 0) {
      if($this->player1->getScore() >= 3)
        return "Deuce";

      $p1ScoreToString = $this->scoreToString($this->player1->getScore());
      $p2ScoreToString = "All";
    } else {
      $p1ScoreToString = $this->scoreToString($this->player1->getScore());
      $p2ScoreToString = $this->scoreToString($this->player2->getScore());
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

class Player {
  private $name;
  private $score;

  public function __construct($name) {
    $this->name = $name;
    $this->score = 0;
  }

  public function getName() {
    return $this->name;
  }

  public function getScore() {
    return $this->score;
  }

  public function increaseScore() {
    $this->score++;
  }
}
