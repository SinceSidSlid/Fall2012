<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Dice Roll</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<?php

/*Here there are three arrays that are created and then data is hard coded into them */
$FaceNamesSingular = array("one", "two", "three", "four", "five", "six");
$FaceNamesPlural = array("ones", "twos", "threes", "fours", "fives", "sixes");
$FaceValues = array( 1, 2, 3, 4, 5, 6);


/*This function looks at value of each dice roll and determines whether or not the value of each die is the same.
It does this with an if statement which checks the variable die1 against die2.
The else statement simply returns a string value to inform the user that the values are not the same */
function CheckForDoubles($Die1, $Die2) {
     global $FaceNamesSingular;
     global $FaceNamesPlural;
     $ReturnValue = false;

     if ($Die1 == $Die2) {// Doubles
          echo "The roll was double ", $FaceNamesPlural[$Die1-1], ".<br />";
          $ReturnValue = true;
     }
     else { // Not Doubles
          echo "The roll was a ", $FaceNamesSingular[$Die1-1],
               " and a ", $FaceNamesSingular[$Die2-1], ".<br />";
          $ReturnValue = false;
     }

     return $ReturnValue;
}



/* This switch stack prints out a statement given the combined score of the dice roll equates to certain numbers
By default it checks on even numbers to see if you have rolled doubles using the return value from the function above.
An if statement determines if the user has rolled doubles and tells the user if they did or did not achieve that */
function DisplayScoreText($Score, $Doubles) {
     switch ($Score) {
          case 2:
               echo "You rolled snake eyes!<br />";
               break;
          case 3:
               echo "You rolled a loose deuce!<br />";
               break;
          case 5:
               echo "You rolled a fever five!<br />";
               break;
          case 7:
               echo "You rolled a natural!<br />";
               break;
          case 9:
               echo "You rolled a nina!<br />";
               break;
          case 11:
               echo "You rolled a yo!<br />";
               break;
          case 12:
               echo "You rolled boxcars!<br />";
               break;
          default:
               if ($Score % 2 == 0) { /* An even
                                      number */
                    if ($Doubles) {
                         echo "You rolled a hard
                              $Score!<br />";
                    }
                    else { /* Not doubles */
                         echo "You rolled an easy
                              $Score!<br />";
                    }
               }
               break;
     }
}

$DoublesCount = 0;
$RollCount = 0;
$ScoreCount = array();
for ($PossibleRolls = 2; $PossibleRolls <= 12; ++$PossibleRolls) {
     $ScoreCount[$PossibleRolls] = 0;
}


/*The following nested loop goes through all the possible dice rolls by using nested for each loops.
THe nesting ensure that possible combinations of die1 and die2 will be used.
It also checks to see how many times doubles occured using a counter.
The loops also count how many times each total value of the dice has been reached.
While it is doing this it is printing the results.*/
foreach ($FaceValues as $Die1) {

     foreach ($FaceValues as $Die2) {

          ++$RollCount;
          $Score = $Die1 + $Die2;
          ++$ScoreCount[$Score];
          echo "<p>";
          echo "The total score for roll $RollCount was $Score.<br />";
          $Doubles = CheckForDoubles($Die1,$Die2);
          DisplayScoreText($Score, $Doubles);
          echo "</p>";

          if ($Doubles)

               ++$DoublesCount;

     } // End of the foreach loop for $Die2
} // End of the foreach loop for $Die1
echo "<p>Doubles occurred on $DoublesCount of the $RollCount rolls.</p>";


/*In the last set of nested loops it added one to a place in an array that corresponded to the total value of the dice
to see how many times each value was reached. This function loops through that array and prints the results.*/
foreach ($ScoreCount as $ScoreValue => $ScoreCount) {
     echo "<p>A combined value of $ScoreValue occurred $ScoreCount of $RollCount times.</p>";
}
?>
</body>
</html>
