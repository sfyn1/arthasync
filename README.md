## PayNote Web App

A simple and user-friendly web application for tracking expenses and income. Users can add, edit, and delete transactions while viewing a summary and visual charts of their financial activity.

## Technologies Used
- Laravel 10
- PHP 8
- MySQL
- Bootstrap 5
- SASS

## Features
- Add, and delete transactions
- Summary of transactions
- Responsive design
- User authentication
- User registration


## Installation
1. Clone the repository
```bash
git clone git@github.com:sfyn1/arthasync.git
```

2. Install Composer dependencies
```bash
composer install
```

3. Install NPM dependencies
Similarly to composer, npm manages javascript, css, and node packages, so make sure to install those dependencies also.
```bash
npm install
```

4. Create a new database and import the database schema from the `database` directory
5. Create a new `.env` file and update the database configuration
6. Generate a new application key
```bash
php artisan key:generate
```

7. Run the application
```bash
php artisan serve
```

## License
This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
