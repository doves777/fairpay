(1) Title
 
Fairpay

(2) Team members

Andrew Hung <br>
Kelvin Huynh <br>
Sai Tipirneni <br>
Suneel Rahman <br>
Robert Sacker <br>

(3) Project Code

https://github.com/doves777/fairpay

(4) VCL account or URL to the server where the application is running 

http://18.217.100.65/login.php

(5) Information problem that we try to solve 

The information problem we tried to solve was to fix the way small buisnesses pay their employees. Small business owners have to hand write and input data into spreadsheets that track and calculate employee pay per week. This is time consuming and at times can be unreliable. There can also be trust issues that arise with the manager manually keeping track of payments and paying out the employees. Most small businessess have no real point-of-sales systems, and especially one that can deal with commissions.

(6) Strategies/solutions to solve the problem 

The solution for this problem that we can up with was to create a point-of-sales application that can be accessed and used on a computer. 

(7) Rationales and Justifications on system design and technology 

We went with technologies we knew to the best extent for our system. We wanted to choose the technolgies that we knew how to use best to build the system we wanted to build. We used AWS EC2 to host the server and then used AWS RDS to host the MySQL database. For editing and the handle of our files we used workbench, WinSCP, and Ubuntu. We used workbench to connect to our RDS and handle the Fairplay database we are using. We used WinSCP to transfer our files from github and any local files to the server. Lastly, we decided to use a Ubuntu terminal to move files from the root directory to /var/www/html folder where it could be live on the server.    

(8) How the final system solves the problem 

The final system would solve the problem by giving the managers a "manager access page" where they can control information about their employees and products/services, look at previous sales they made, and changing the manager and employee payout percentages.

(9) Challenges faced and their impact on the final design

It's still a challenge to get the checkout page to work. We can't figure how to implement the part that employees would use to checkout a customer. An example is selecting a service a customer wants and getting that to show up on the order screen. As a result, we don't have functionaltiies for the employees to use the system.

(10) Future work
