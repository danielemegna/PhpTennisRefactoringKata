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
			switch ($this->player1Score) {
				case 0:
					return "Love-All";
				case 1:
					return "Fifteen-All";
				case 2:
					return "Thirty-All";
				default:
					return "Deuce";
			}
		}
    
    if ($this->player1Score >= 4 || $this->player2Score >= 4) {
			$minusResult = $this->player1Score - $this->player2Score;
				if ($minusResult == 1)
          return "Advantage player1";
				if ($minusResult == -1)
          return "Advantage player2";
				if ($minusResult >= 2)
          return "Win for player1";

				return "Win for player2";
		}

    $score = $this->scoreToString($this->player1Score);
    $score .= "-";
    $score.= $this->scoreToString($this->player2Score);
		return $score;
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

