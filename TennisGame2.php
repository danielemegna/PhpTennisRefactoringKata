<?php

require_once "TennisGame.php";
require_once "Player.php";
require_once "ScoreFormatter.php";

class TennisGame2 implements TennisGame
{
  private $player1;
  private $player2;

  private $scoreFormatter;

  public function __construct($player1Name, $player2Name)
  {
    $this->player1 = new Player($player1Name);
    $this->player2 = new Player($player2Name);

    $this->scoreFormatter = new ScoreFormatter();
  }

  public function wonPoint($playerName)
  {
    if ($playerName == $this->player1->getName()) {
      $this->player1->increaseScore();
      return;
    }

    $this->player2->increaseScore();
  }

  public function getScore()
  {
    $player1Score = $this->player1->getScore();
    $player2Score = $this->player2->getScore();
    
    if ($player1Score == $player2Score) {
      return ($player1Score < 3 ?
        $this->scoreFormatter->tieString($player1Score) :
        $this->scoreFormatter->deuceString()
      );
    }

    if($player1Score < 4 && $player2Score < 4) {
      return $this->scoreFormatter->scoreToString($player1Score)
        ."-".$this->scoreFormatter->scoreToString($player2Score);
    }

    $advantagedPlayerName = ($player1Score > $player2Score ?
      $this->player1->getName() :
      $this->player2->getName()
    );
    
    if(abs($player1Score - $player2Score) == 1)
      return $this->scoreFormatter->advantageString($advantagedPlayerName);

    return $this->scoreFormatter->winString($advantagedPlayerName);
  }

}
