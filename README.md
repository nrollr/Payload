# Payload generator

This repository contains a concept with input/output and metadata display within a single webpage. Layout of the webpages are built with the [Semantic UI](https://semantic-ui.com/) framework. All pages have been tested with Apache **2.4.33** , PHP **7.1.16** and MySQL **5.7.22**

Download and copy the content of this repository to the DocumentRoot of your webserver… 


### Setup of the database:

- Edit the `include/db_connect.php` file and change the database settings : replace ‘**hostname**' , '**username**' , '**password**' and '**database**' with values which reflect your own configuration.

- The structure of the database (eg. Payload ) can be found in the `database/` directory. Import the `database.sql` file to create the required tables. File contains dummy data to get you started.

### Usage:
- Select a sensor from the dropdown list; associated metadata is automatically loaded via `XMLHttpRequest`
- Enter a value (int) as data
- When submitted, the recorded data appears at the bottom of the table + form fields are cleared


## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details