<?php

class Player {
  private $name;
  private $score;

  public function __construct($name) {
    $this->name = $name;
    $this->score = 0;
  }

  public function getName() {
    return $this->name;
  }

  public function getScore() {
    return $this->score;
  }

  public function increaseScore() {
    $this->score++;
  }
}
