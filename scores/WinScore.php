<?php

class WinScore extends Score {

  public function isMyScenario() {
    return true;
  }

  public function toString() {
    return "Win for " . $this->getAdvantagedPlayerName();
  }

}
