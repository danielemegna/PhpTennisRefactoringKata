<?php

class ScoreBoard
{
  private $player1Score;
  private $player2Score;

  public function __construct() {
    $this->player1Score = 0;
    $this->player2Score = 0;
  }

  public function increasePlayer1Score() {
    $this->player1Score++;
  }
  
  public function increasePlayer2Score() {
    $this->player2Score++;
  }

  public function getPlayer1Score() {
    return $this->player1Score;
  }

  public function getPlayer2Score() {
    return $this->player2Score;
  }

  public function thereIsATie() {
    return $this->getPlayer1Score() == $this->getPlayer2Score();
  }

  public function areScoresUnderFour() {
    return $this->getPlayer1Score() < 4 &&
      $this->getPlayer2Score() < 4;
  }

  public function isOneTheScoreDifference() {
    $scoreDifference = $this->getPlayer1Score() - $this->getPlayer2Score();
    return (abs($scoreDifference) == 1);
  }

  public function isPlayer1Advantaged() {
    return $this->player1Score > $this->player2Score;
  }
}
