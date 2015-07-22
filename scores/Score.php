<?php

abstract class Score {

  protected $scoreKeeper;
  private $names;
  private $scoreDictionary = [
      0 => "Love",
      1 => "Fifteen",
      2 => "Thirty",
      3 => "Forty",
    ];
  
  function __construct($names, $scoreKeeper) {
    $this->names = $names;
    $this->scoreKeeper = $scoreKeeper;
  }

  public abstract function isMyScenario();

  protected function scoreToString($score) {
    return $this->scoreDictionary[$score];
  }

  protected function getAdvantagedPlayerName() {
    if($this->scoreKeeper->isPlayer1Advantaged())
      return $this->names[0];
      
    return $this->names[1];
  }
}
