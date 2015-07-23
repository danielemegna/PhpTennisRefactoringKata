# PhpTennisRefactoringKata
A refactoring kata in php - taken from https://github.com/emilybache/Tennis-Refactoring-Kata 

## Kata Description:
Imagine you work for a consultancy company, and one of your colleagues
has been doing some work for the Tennis Society. The contract is for
10 hours billable work, and your colleague has spent 8.5 hours working
on it. Unfortunately he has now fallen ill. He says he has completed
the work, and the tests all pass. Your boss has asked you to take over
from him. She wants you to spend an hour or so on the code so she can
bill the client for the full 10 hours. She instructs you to tidy up
the code a little and perhaps make some notes so you can give your
colleague some feedback on his chosen design.

##### Tennis score system notes:
A game is won by the first player to have won at least four points in
total and at least two points more than the opponent.
The running score of each game is described in a manner peculiar to
tennis: scores from zero to three points are described as "love",
"fifteen", "thirty", and "forty" respectively.
If at least three points have been scored by each player, and the
scores are equal, the score is "deuce".
If at least three points have been scored by each side and a player
has one more point than his opponent, the score of the game is
"advantage" for the player in the lead.

## Chosen Design notes
I refactored the **TennisGame2** class.

Towards the end of my refactoring, I decided to get out TennisGame2 from any responsabilities.
Indeed, TennisGame2 has the only goal to receive messages from outside (through the TennisGame interface contract) and foreward them to another class, the Referee.
Therefore, TennisGame2 in its constructor, build the **Referee** collaborator through the constructor.

As in a real tennis game, Referee class is the orchestrator: it coordinates the game flow and use two collaborators to keeping track of the current game situation, namely *NamesRegister* and *ScoreKeeper*.

Using the **ScoreKeeper** the *Referee* can:
- keeps track of the current score of the two players
- ask to it some easy evaluation, like "there is a tie situation?" or "scores are both under 4?"

Using the **NamesRegister** the *Referee* can simply "annotate" the players names and fetch them when it needs.

The *getScore* responsabilites of the *Referee* (the core of the program), is handled with a strategy pattern through a chain of "score scenarios". A **Score** abstract class defines what a Score has to implement to be used in the chain. The *Referee* class, in order to handle the *getScore* request, loops an ordered list of score implementations and for each asks to a new instance "is this your scenario?". If the current score implementation recognizes the scenario as compatible, it will handle the request. Otherwise, the request is demanded to the next score implementation. Of course, every score implementation needs access to the ScoreKeeper (in order to recognize the scenario) and the NamesRegister (in order to fetch the player names if it needs) passed through the constructor. The score chain order is *very important*: every score implementations evaluates the scenario aware of the not-compatibility of the previous implementations, avoiding redundant scenario's checks.

I chose this design structure to keep separated every score cases and the related conditions and message formatting: if you need to modify the "Advanced" scenario case, you have to look in a single place for the handle condition and the displayed message. I tried to keep the score system open for extension, feasible implementing a new Score implementation and adding it in the right place into the chain.
