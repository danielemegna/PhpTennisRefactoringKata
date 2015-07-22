<?php

require_once "Score.php";

class StandardScore extends Score {

  public function isMyScenario() {
    return $this->scoreKeeper->areScoresUnderFour();
  }

  public function toString() {
    $score1 = $this->scoreKeeper->getPlayer1Score();
    $score2 = $this->scoreKeeper->getPlayer2Score();

    return $this->scoreToString($score1).
      "-".$this->scoreToString($score2);
  }

}
