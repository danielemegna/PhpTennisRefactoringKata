<?php

class ScoreFormatter
{
  public function winString($playerName) {
    return "Win for " . $playerName;
  }

  public function advantageString($playerName) {
    return "Advantage " . $playerName;
  }

  public function deuceString() {
    return "Deuce";
  }

  public function tieString($score) {
    return $this->scoreToString($score)."-All";
  }

  public function scoreToString($score) {
    $dictionary = [
      0 => "Love",
      1 => "Fifteen",
      2 => "Thirty",
      3 => "Forty",
    ];

    return $dictionary[$score];
  }
}
