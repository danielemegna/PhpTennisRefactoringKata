<?php

require_once "TennisGame.php";

class TennisGame1 implements TennisGame
{
	private $player1Score = 0;
	private $player2Score = 0;
	private $player1Name = '';
	private $player2Name = '';

	public function __construct($player1Name, $player2Name)
	{
		$this->player1Name = $player1Name;
		$this->player2Name = $player2Name;
	}

	public function wonPoint($playerName)
	{
		if($playerName == $this->player1Name) {
			$this->player1Score++;
      return;
    }
    
    $this->player2Score++;
	}

	public function getScore()
	{
		if ($this->player1Score == $this->player2Score) {
      $tieScore = $this->player1Score;

      if($tieScore > 2)
        return "Deuce";
      
      return $this->scoreToString($tieScore)."-All";
		}
    
    if ($this->player1Score > 3 || $this->player2Score > 3) {
			$scoreDiff = $this->player1Score - $this->player2Score;
      if ($scoreDiff == 1)
        return "Advantage " . $this->player1Name;
      if ($scoreDiff == -1)
        return "Advantage " . $this->player2Name;
      if ($scoreDiff >= 2)
        return "Win for " . $this->player1Name;

      return "Win for " . $this->player2Name;
		}

    return $this->scoreToString($this->player1Score)
      . "-" . $this->scoreToString($this->player2Score);
	}

  private function scoreToString($score) {
    switch ($score) {
      case 0:
        return "Love";
      case 1:
        return "Fifteen";
      case 2:
        return "Thirty";
      case 3:
        return "Forty";
    }
  }
}

