<?php

require_once "TennisGame.php";

class TennisGame2 implements TennisGame
{
  private $P1point = 0;
  private $P2point = 0;

  private $P1res = "";
  private $P2res = "";
  private $P1name = "";
  private $P2name = "";

  public function __construct($P1name, $P2name)
  {
    $this->P1name = $P1name;
    $this->P2name = $P2name;
  }

  public function getScore()
  {
    if ($this->P1point >= 4 && $this->P2point >= 0 && ($this->P1point - $this->P2point) >= 2)
      return "Win for " . $this->P1name;

    if ($this->P2point >= 4 && $this->P1point >= 0 && ($this->P2point - $this->P1point) >= 2)
      return "Win for " . $this->P2name;

    if ($this->P1point > $this->P2point && $this->P2point >= 3)
      return "Advantage " . $this->P1name;

    if ($this->P2point > $this->P1point && $this->P1point >= 3)
      return "Advantage " . $this->P2name;

    $this->P1res = $this->scoreToString($this->P1point);
    $this->P2res = $this->scoreToString($this->P2point);

    if ($this->P1point == $this->P2point) {
      if($this->P1point >= 3)
        return "Deuce";

      $this->P2res = "All";
    }

    return "{$this->P1res}-{$this->P2res}";
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
  }

  private function SetP1Score($number)
  {
    for ($i = 0; $i < $number; $i++) {
      $this->P1Score();
    }

  }

  private function SetP2Score($number)
  {
    for ($i = 0; $i < $number; $i++) {
      $this->P2Score();
    }
  }

  private function P1Score()
  {
    $this->P1point++;
  }

  private function P2Score()
  {
    $this->P2point++;
  }

  public function wonPoint($player)
  {
    if ($player == $this->P1name)
      $this->P1Score();
    else
      $this->P2Score();
  }
}
