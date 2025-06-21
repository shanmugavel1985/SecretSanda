This project is a modular, extensible PHP Object-Oriented implementation of a Secret Santa assignment generator. It fulfills the challenge set by DigitalXC for automating Secret Santa assignments among employees, ensuring:

    ->No self-assignment
    ->No repetition from the previous year
    ->One-to-one unique assignments

Designed using OOP best practices
Tested with PHPUnit
Error handling included


Directory Structure

/SecretSanta
├── src/                  # Source code (OOP PHP classes)
│   ├── Entity/
│   ├── Repository/
│   ├── Service/
│   └── Exporter/
├── data/                 # Input CSV files
│   ├── Employee-List.csv
│   └── Secret-Santa-Game-Result-2023.csv
├── output/               # Output CSV (generated assignments)
├── tests/                # PHPUnit tests + fixtures
├── vendor/               # Composer dependencies
├── run.php               # Main execution script
├── composer.json         # Composer configuration
├── phpunit.xml           # PHPUnit configuration
└── README.md             # Project documentation (this file)


Installation
Requirements

    PHP >= 8.0
    Composer (for dependencies & PHPUnit)

Steps

1️1 Clone or download the repository:
    git clone https://github.com/your-username/secret-santa-php.git
    cd secret-santa-php

2️2 Install dependencies (for PHPUnit):
    composer install

Usage

    Prepare Employee List CSV file in data/Employee-List.csv:[sample data exists]
    Add Previous Year Assignments in data/Secret-Santa-Game-Result-2023.csv (optional, but recommended)
    Run the program:  php main.php
    Output file generated at: output/Secret-Santa-Assignments-2024.csv

Running Tests
    Run PHPUnit tests:
    ./vendor/bin/phpunit