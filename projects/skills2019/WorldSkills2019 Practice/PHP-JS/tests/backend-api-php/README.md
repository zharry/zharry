# Backend part - API Tests

## Project setup
```bash
composer install
```

## Run tests

The backend app needs to be running for the tests.

Run all tests (resetting DB):
```bash
composer test
```

Run a single test:
```bash
composer test -- --filter EventsTest
```

## Configuration

Before the tests get executed, you see the current configuration printed out in the terminal.

You can overwrite any configuration by setting an environment variable.

For example, use a different database user and password:
```bash
DB_USER=wsc DB_PW=1234 composer test
```

Available environment variables and their defaults:
```bash
DB_HOST=mysql
DB_USER=root
DB_PW=
DB_NAME=wsc_t17

URL=http://localhost
```

## Test specification files
```
<tests/backend-api-php/>tests/Helper/Config.php
<tests/backend-api-php/>tests/Feature/*Test.php
```
