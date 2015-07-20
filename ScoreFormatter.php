<?php

class ScoreFormatter
{
  public function defaultMessage($player1Score, $player2Score) {
    return $this->scoreToString($player1Score)."-".
      $this->scoreToString($player2Score);
  }

  public function tieMessage($score) {
    return ($score < 3 ?
      $this->scoreToString($score)."-All" : 
      $this->deuceString()
    );
  }

  public function winMessage($playerName) {
    return "Win for " . $playerName;
  }

  public function advantageMessage($playerName) {
    return "Advantage " . $playerName;
  }

  private function deuceString() {
    return "Deuce";
  }

  private function scoreToString($score) {
    $dictionary = [
      0 => "Love",
      1 => "Fifteen",
      2 => "Thirty",
      3 => "Forty",
    ];

    return $dictionary[$score];
  }
}
