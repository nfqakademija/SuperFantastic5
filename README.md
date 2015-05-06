nfqakademija
============
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/nfqakademija/SuperFantastic5/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/nfqakademija/SuperFantastic5/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/nfqakademija/SuperFantastic5/badges/build.png?b=master)](https://scrutinizer-ci.com/g/nfqakademija/SuperFantastic5/build-status/master)

============
DONE:

* Books by ISBN
* Doctrine Fixtures Bundle fills database with test data
* New / popular books queries added
* Searching of string in author, title, description and publisher fields
* Added orders and reservations of books
* Get full list of unreturned orders / reservations for a specific user
* fosuser bundle integeration

how to see it?
---------------
Just add to your base url:

* /book/{id} - book page
* /new - newest books
* /popular - most popular books
* /search - to see full list of books
* /search/{keyword} - searches some text in four fields of description table
* /order/{descriptionId} - add an order/reservation 
* /login
* /register

   do not forget* "composer update" before<br />
============
A Symfony project created on April 16, 2015, 3:19 pm.
