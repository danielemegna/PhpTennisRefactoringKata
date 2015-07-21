<?php

class ScoreBoard
{
  private $player1Score;
  private $player2Score;

  function __construct() {
    $this->player1Score = 0;
    $this->player2Score = 0;
  }

  function increasePlayer1Score() {
    $this->player1Score++;
  }
  
  function increasePlayer2Score() {
    $this->player2Score++;
  }

  function getPlayer1Score() {
    return $this->player1Score;
  }

  function getPlayer2Score() {
    return $this->player2Score;
  }
}
