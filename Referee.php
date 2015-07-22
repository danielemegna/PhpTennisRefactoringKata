<?php

require_once "scores/TieScore.php";
require_once "scores/StandardScore.php";
require_once "scores/AdvantageScore.php";
require_once "scores/WinScore.php";

class Referee {

  private $scoreKeeper;
  private $namesRegister;

  function __construct($namesRegister, $scoreKeeper) {
    $this->scoreKeeper = $scoreKeeper;
    $this->namesRegister = $namesRegister;
  }

  public function wonPoint($playerName) {
    if ($playerName == $this->namesRegister->getPlayer1Name()) {
      $this->scoreKeeper->increasePlayer1Score();
      return;
    }
    
    $this->scoreKeeper->increasePlayer2Score();
  }

  public function getScore() {

    $chainOfScoreTypes = [
      "TieScore",
      "StandardScore",
      "AdvantageScore",
      "WinScore"
    ];

    foreach($chainOfScoreTypes as $scoreType) {
      $score = new $scoreType($this->namesRegister, $this->scoreKeeper);
      if($score->isMyScenario())
        return $score->toString();
    }

    throw new Exception("Referee cannot generate score for this scenario");
  }

}
