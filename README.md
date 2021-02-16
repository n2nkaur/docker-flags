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


## Round Table Plan

This is a visualization of a round-table meeting between countries.

The user should be able to select how many countries are invited (text input field).

Only even numbers are allowed.

When the users click "place" the random countries are selected and placed around the table in a circle. Each country is represented by a flag icon.

User can click a flag. For example if the Greece flag is clicked, then the message should say "Greece sits opposite to Australia". The opposite country is detected automatically based on the table layout.


# Notes from the developer

Default Slim dummy project was sued. Probaly some code is redundant (unused)

I have done the Flag Quizz and created a prototype for the Round Table Plan.

I didn't test Flag Quizz properly. Could you test and fix if I forgot there something?

In the Round Table Plan there's much to do:

- Get countries by AJAX (both PHP and JS side)
- In my prototype only 4 seats are supported. But it should be dynamic based on input
- I didn't do the input validation (no check for the even value)
- The opposite country detection probably needs to be updated in case of the dynamic seat count
