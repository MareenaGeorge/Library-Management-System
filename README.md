# Library Management System

#Description
This Database programming project involves the creation of a web application implementing a Library Management System for Librarians.

#Working of the system
1)Search a Book - Allows the user to search any book using any combinations of Book id and/or Book Title and /or Book Author. 
2)Checkout a Book – Allows a user to check-out the book based on its availability and book borrowers credibility provided with the card no of the borrower. 
3)Checkin a Book - Allows a user to check-in the book. This feature first searches for all the book loans the borrower has taken which are not checked-in yet and then allows the user to check in the selected the book. 
4)Register New Borrower - Allows the user to register a new borrower to the library loan system by specifying the SSN, name, address, and phone number. 
5)Fine - This feature allows two types of fine computation. 


## Software Requirements
Front-end : HTML,CSS,Javascript
Server-side Scripting language:PHP 7
Platform : Mac, Windows
Database : MySQL

## Installation
Install XAMPP
Load phpMyAdmin
Load MySQl
Execute library.sql file
Copy the folder library into "htdocs" folder of XAMPP
Load http://localhost/library/index.html
The Application works!

#Design Model
index.html is the Homepage where you can search, Register Borrowers, Update or Get Fine, Return Books
book-return.html - Return books
register.html -Create new  borrower to the library loan system by specifying the SSN, name, address, and phone number.
fine-mgmt.html-Get/Update fine by providing card number as the input.
