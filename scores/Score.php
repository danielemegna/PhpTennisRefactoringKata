<?php

abstract class Score {

  protected $scoreKeeper;
  private $namesRegister;

  private $scoreDictionary = [
      0 => "Love",
      1 => "Fifteen",
      2 => "Thirty",
      3 => "Forty",
    ];
  
  function __construct($namesRegister, $scoreKeeper) {
    $this->namesRegister = $namesRegister;
    $this->scoreKeeper = $scoreKeeper;
  }

  public abstract function isMyScenario();

  protected function scoreToString($score) {
    return $this->scoreDictionary[$score];
  }

  protected function getAdvantagedPlayerName() {
    if($this->scoreKeeper->isPlayer1Advantaged())
      return $this->namesRegister->getPlayer1Name();
      
    return $this->namesRegister->getPlayer2Name();
  }
}
