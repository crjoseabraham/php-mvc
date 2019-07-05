# Pure PHP Ready to use MVC structure
This is a personal project I made to teach myself how MVC works so I can use it for future projects. I did it by taking portions of code from different PHP courses I took (see **Acknowledgements** below). Some of the topics I learnt by doing this:  
- MVC pattern and OOP
- WTH is a Router and how does that work?
- How to use regular expressions
- Handling databases with PDO

## Installation
1. Download as .zip or clone this repo using  
`git clone https://github.com/crjoseabraham/php-mvc.git`  
2. Import the `data/todo_db.sql` file to phpMyAdmin
3. Install composer  
https://getcomposer.org/download/
4. Run `composer install`
3. Start your Apache server and go to http://localhost/php-basic-mvc  

You're done :)

## Project structure
As most MVC frameworks, this project flows through `public/index.php` and loads the correspondant page base on the URL
```
php-mvc/
    config/             # Database credentials, utility functions, constants used frequently
    data/               # SQL database file
    public/             # Accessible files. What final users see
        css/            # Compiled css file
        js/             # Compiled javascript file
        index.php       # Starting point for the entire app
    src/                # Application source code
        app/            # Router class, routes.php
        controllers/    # Controller classes
        models/         # Model classes
        views/          # Views
        .htaccess       # Make src/ unaccessible for users
    vendor/             # Composer files, autoloader !ignored
    .gitignore          # Files/folders to be ignored by version control
    .htaccess           # Redirect everything to public/ folder
    composer.json       # Composer dependency file
```

## Acknowledgements
I did this by making a combination of what I learnt from some online PHP courses I took  
- [The PHP Practitioner](https://github.com/laracasts/The-PHP-Practitioner-Full-Source-Code) by Laracasts
- [Write PHP like a Pro](https://github.com/daveh/php-mvc) by Dave Hollingworth
- [Object Oriented PHP & MVC](https://www.udemy.com/object-oriented-php-mvc/) by Brad Traversy
