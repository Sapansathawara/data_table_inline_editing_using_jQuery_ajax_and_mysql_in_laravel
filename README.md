# Data Table Inline Editing using jQuery, Ajax, and MySQL in Laravel

This Laravel project demonstrates the implementation of Data Table Inline Editing using jQuery, Ajax, and MySQL. The application provides functionalities such as Add, Update, Delete, Inline Edit, Bulk Delete, and more.

## Table of Contents

- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [Screenshots](#screenshots)
- [Contributing](#contributing)
- [License](#license)

## Features

1. **Add / Update / Delete Operations**: Perform CRUD operations on the data table.
2. **Inline Edit**: Edit data directly within the table row using Ajax.
3. **Delete Confirmation**: Confirm before deleting a particular row's data using Ajax.
4. **Bulk Delete**: Delete selected rows with confirmation using Ajax.
5. **Add New Form**: Hide the current table and show an add form using Ajax.
6. **Category Dropdown**: Populate categories from the category table.
7. **Save Button**: Hide the current form and show the table on Save using Ajax.

## Requirements

PHP: Version 7.2 or higher is required for running the Laravel application.
Composer: Composer is used for managing PHP dependencies in the project.
Laravel: The project is built on Laravel framework version 8 or higher.
MySQL Database: Laravel typically uses MySQL as the default database system.
Web Server (e.g., Apache, Nginx): A web server is required to serve the Laravel application.

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/Sapansathawara/data_table_inline_editing_using_jQuery_ajax_and_mysql_in_laravel.git
    ```

2. Navigate to the project directory:

    ```bash
    cd data_table_inline_editing_using_jQuery_ajax_and_mysql_in_laravel
    ```

3. Install dependencies:

    ```bash
    composer install
    ```

4. Copy the `.env.example` file to `.env` and configure your database:

    ```bash
    cp .env.example .env
    ```

5. Generate application key:

    ```bash
    php artisan key:generate
    ```

6. Run database migrations and seed:

    ```bash
    php artisan migrate --seed
    ```

## Usage

1. Start the Laravel development server:

    ```bash
    php artisan serve
    ```

2. Visit [http://localhost:8000](http://localhost:8000) in your web browser.

## Contributing

Contributions are welcome! If you have any suggestions, improvements, or issues, please open an [issue](https://github.com/yourusername/laravel-datatable-inline-editing/issues) or submit a [pull request](https://github.com/yourusername/laravel-datatable-inline-editing/pulls).

## License

This project is licensed under the [MIT License](LICENSE).
