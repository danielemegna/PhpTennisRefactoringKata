<?php

class TieScore extends Score {

  public function isMyScenario() {
    return $this->scoreKeeper->thereIsATie();
  }

  public function toString() {
    $score = $this->scoreKeeper->getPlayer1Score();

    if($score < 3)
      return $this->scoreToString($score)."-All";
      
    return"Deuce";
  }

}

