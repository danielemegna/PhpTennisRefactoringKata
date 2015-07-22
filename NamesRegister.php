<?php

class NamesRegister
{
  private $player1Name;
  private $player2Name;

  function __construct($player1Name, $player2Name) {
    $this->player1Name = $player1Name;
    $this->player2Name = $player2Name;
  }

  public function getPlayer1Name() {
    return $this->player1Name;
  }

  public function getPlayer2Name() {
    return $this->player2Name;
  }
}
