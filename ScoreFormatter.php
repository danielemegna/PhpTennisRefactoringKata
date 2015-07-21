<?php

class ScoreFormatter
{
  private $scoreDictionary = [
      0 => "Love",
      1 => "Fifteen",
      2 => "Thirty",
      3 => "Forty",
    ];

  public function standardMessage($score1, $score2) {
    return $this->scoreToString($score1).
      "-".$this->scoreToString($score2);
  }

  public function winMessage($playerName) {
    return "Win for " . $playerName;
  }

  public function advantageMessage($playerName) {
    return "Advantage " . $playerName;
  }

  public function tieMessage($score) {
    return ($score < 3 ?
      $this->scoreToString($score)."-All" : 
      $this->deuceString()
    );
  }

  private function deuceString() {
    return "Deuce";
  }

  private function scoreToString($score) {
    return $this->scoreDictionary[$score];
  }
}
