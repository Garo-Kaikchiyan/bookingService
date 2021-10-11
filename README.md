
Welcome to my booking project! This application allows the user to book seats for employees in an office for an hour or a full day. 
The user can:
- create offices with an N amount of seats.
- register employees with their names, payroll number and email address.
- create office seat bookings for registered employees.

 A seat cannot be booked:
 - if the timeslot is already booked
 - if the seat is booked for the whole day
 - on weekends
 - for the whole day if there already is a booking for an hour

This is my first Laravel project. I used Laravel's Sail command-line interface to set it up.
This application uses a MySQL database. Migrations for all tables can be found in /database/migrations.
There is also a database seeder in /database/seeders.
The database must be seeded for the application to work properly.