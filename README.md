# Requirements

Create a web application with 3 screens:

* Home (simply links to the other 2)
* Flag Quizz
* Round Table Plan


## Flag Quizz

This is a small flag-guessing quizz.

A random country flag should be shown to the user.

User has to guess which country's flag it is.
The radio options should contain 10 variants with one being the correct answer.

The countries should be sorted alphabetically (by their name)

After clicking "submit" the user should see if his answer was right or wrong.

No anti-cheat mechanism is required.

The previous developer implemented this feature, but there are a few problem.

Please find and fix them.


## Round Table Plan

This is a visualization of a round-table meeting between countries.

The user should be able to select how many countries are invited (text input field).

Only even numbers are allowed.

When the users click "place" the random countries are selected and placed around the table in a circle. Each country is represented by a flag icon.

User can click a flag. For example if the Greece flag is clicked, then the message should say "Greece sits opposite to Australia". The opposite country is detected automatically based on the table layout.

Another developer started this task. Here is his todo list:

- Get countries using AJAX (both PHP and JS side)
- Support dynamic number of seats (currently there are only 4 seats supported)
- Add validation (there is no check for the even value currently)
- The opposite country detection probably needs to be updated in case of the dynamic seat count
