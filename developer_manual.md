
 Necessary software/libraries: 
==================================

Amazon EC2 Instance: hosts the server. <br />
Amazon RDS Database: database of the site, in the cloud. <br />

MySQL Workbench: connection to the RDS database and allow editing/handling of the db from local computer. <br />
WinSCP: transfer of local/github files to the EC2 instance, where the server lies. <br />
Ubuntu (terminal): used to move files from files that were dragged into the root directory of the instance, <br />
				   and dragged directly into the path /var/www/html/ (where files become live on the server).

File structure: 
===================

All files are within the /var/www/html/ file directory of the Amazon EC2 instance server. Files should be placed <br />
into folders titled 'Front_Page', 'Manager_Page', 'Checkout_Page', and 'CSS'.

System environment: 
=======================

All activity related to moving files to server were conducted on Windows 10. 

Database Structure: 
=======================

5 tables, listed with their respective column names and purpose:

Employees: 
	- employee_id: unique id number of each employee_id
	- full_name: name of employee
	- currently_employed: a flag of 'Y' or 'N' for each employee; to be utilized when adding or removing an employee
	- username: the login value of the employee in the front page of site
	- password: password for each employee/username when logging in the front page
	
Services:
	- service_id: unique id number of each service available at the business
	- type_of_service_id: a number value of 1 (for Nail service) or 2 (for Waxing service)
	- service_name: name of each service
	- service_price: price of each service
	- available: a flag of 'Y' or 'N' for each service: utilized when adding/removing items (dynamic dropdown menu of items)
	
Transaction_Details:
	- transaction_details_id: unique id for every transaction for every employee that happens at the business
	- transaction_id: id for every transaction; same unique value as transaction_details_id
	- service_id: the id of the particular service that was ordered by the customer
	- employee_id: id of employee that handle that particular transaction
	- service_quantity: the number amount of the service ordered: typically 1, just in case they pay for another person
	- service_total: total amount paid by customer for that particular transaction
	- transaction_date: time and date of when transaction took place
	
Transactions:
	- transaction_id: unique id of each transaction that took place at the business
	- employee_id: id of employee that handled that particular transaction
	
Type of Services:
	- type_of_service_id: unique id number of different types of services the business can offer
	- type_of_service_name: name of the type of service (in this case, would be 'Nail' and 'Waxing'
