<?php

require_once "Score.php";

class AdvantageScore extends Score {

  public function isMyScenario() {
    return $this->scoreKeeper->isOneTheScoreDifference();
  }

  public function toString() {
    return "Advantage " . $this->getAdvantagedPlayerName();
  }

}
