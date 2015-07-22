<?php

require_once "scores/Score.php";
require_once "scores/TieScore.php";
require_once "scores/StandardScore.php";
require_once "scores/AdvantageScore.php";
require_once "scores/WinScore.php";

class Referee {
  public function generateScore($namesRegister, $scoreKeeper) {

    $chainOfScoreTypes = [
      "TieScore",
      "StandardScore",
      "AdvantageScore",
      "WinScore"
    ];

    foreach($chainOfScoreTypes as $scoreType) {
      $score = new $scoreType($namesRegister, $scoreKeeper);
      if($score->isMyScenario())
        return $score;
    }

    throw new Exception();
  }
}
