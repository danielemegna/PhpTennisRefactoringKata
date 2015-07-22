<?php

require_once "TennisGame.php";
require_once "Player.php";
require_once "ScoreKeeper.php";
require_once "Referee.php";

class TennisGame2 implements TennisGame
{
  private $player1;
  private $player2;

  private $scoreKeeper;
  private $referee;

  public function __construct($player1Name, $player2Name)
  {
    $this->player1 = new Player($player1Name);
    $this->player2 = new Player($player2Name);

    $this->scoreKeeper = new ScoreKeeper();
    $this->referee = new Referee();
  }

  public function wonPoint($playerName)
  {
    if ($playerName == $this->player1->getName()) {
      $this->scoreKeeper->increasePlayer1Score();
      return;
    }

    $this->scoreKeeper->increasePlayer2Score();
  }

  public function getScore()
  {
      $score = $this->referee->generateScore(
        [$this->player1->getName(), $this->player2->getName()],
        $this->scoreKeeper
      );

      return $score->toString();
  }
}
