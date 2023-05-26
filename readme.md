# PHP news

This repository contains a school project developed in PHP. The goal was to create a Blog page. The project includes features such as a database, login and session management, as well as functionalities for managing articles, categories, authors, and administrators. The platform also allows editors to utilize a WYSIWYG HTML editor for creating and editing articles, and it provides the ability to publish or hide articles.

## Features

- User authentication: Authors can register and login to the platform.
- Role-based access control: Authors can only edit their own articles, while the admin has the ability to edit all articles.
- WYSIWYG HTML editor: Editors can use a powerful WYSIWYG editor to create and edit articles visually, without requiring extensive knowledge of HTML.
- Article management: Authors can create, edit, delete, publish, and hide their own articles.
- Category management: Authors can assign categories to their articles, making it easier for readers to navigate the platform.
- Author management: Admins can manage authors
- Database integration: The project utilizes a database to store article, author, and category information.
- Session management: The platform utilizes session handling to keep track of logged-in users.

## Technologies Used

- PHP: The project was developed using PHP
- Database: The project integrates a database system (e.g., MySQL) to store and retrieve data.
- HTML/CSS: The user interface is built using HTML and CSS
- WYSIWYG Editor: TinyMCE
- Frameworks/Libraries: No external frameworks or libraries were used in this project to focus on the fundamentals.

## Setup and Installation

1. Clone the repository to your local machine.
2. Configure the database connection settings by modifying the appropriate configuration files. (`/models/Database.php`).
3. Import database from provided init script (`/resources/database_init.sql`)  or create your own with databse schema (`/resources/diagram.png`).
4. Launch a web server or use a development environment (e.g., XAMPP, WAMP) to host the project files.
5. Access the project in your web browser.

![Database diagram](https://raw.githubusercontent.com/TroliksMan/pvy_PHPNews/main/resources/diagram.png)

## Usage

1. Register as an author or use the provided admin/editor account to log in.
2. Once logged in, authors can create new articles using the WYSIWYG HTML editor, assign categories, and manage their own articles.
3. Editors can publish or hide their articles, controlling their visibility on the platform.
4. The admin account has additional privileges and can edit all articles and manage authors.
5. Explore the platform, read articles, and navigate through categories to discover content.

|Role|Username|Password|
|--|--|--|
|Admin|admin|admin|
|Editor|editor|1234|
