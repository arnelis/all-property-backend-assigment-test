TASK No.1
=========

Please create a free account and public Git repository on GitHub for this test.
The solution for each question should be committed to different branches.
You are encouraged to make incremental commits, rather than commit everything once the solutions are finished.
You should also write down your assumptions.
Bonus: create unit tests to verify your solutions.

1. Write a script that accepts a positive integer range and, for each increment in the range, prints:
   - "Fizz" if a multiple of 3
   - "Buzz" if a multiple of 5
   - The integer itself otherwise.
   
   E.g. for f[12..16], the output is "Fizz 13 14 FizzBuzz 16".

2. Do the same as question 1, except in addition to the previous rules, now it prints "Bazz" instead of an integer after consecutive Fizzes/Buzzes.

  E.g. for f[4..11], the output is “4 Buzz Fizz Bazz 8 Fizz Buzz Bazz”.
  
SOLUTION
========
  
1) I created source code and test cases.
2) Dependencies: phpUnit 3.7.x (to run test cases).  
3.1) To execute code:
	> php runTask1_1.php -f 12 -t 16
	> php runTask1_2.php -f 4 -t 11
3.2) To execute test cases:
	> cd tests
	> phpUnit BaseTaskTest.php
	> phpUnit Task1_1Test.php
	> phpUnit Task1_2Test.php