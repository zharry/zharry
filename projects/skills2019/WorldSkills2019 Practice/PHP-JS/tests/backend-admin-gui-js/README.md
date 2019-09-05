# Admin GUI - End to End Tests

## Project setup
```
npm install
```

## Run tests

The admin gui needs to be running for the tests.

Start Cypress GUI:
```
npm run cypress -- open
```

Run integration tests in background/headless mode (resetting DB):
```
npm run cypress -- run
```

## Configuration

You can overwrite any configuration by passing an environment variable to cypress.

For example, use a different database user and password:
```bash
npm run cypress -- open --env DB_USER=wsc,DB_PW=1234
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
<tests/backend-admin-gui-js/>cypress/support/commands.ts
<tests/backend-admin-gui-js/>cypress/integration/*_spec.ts
```
