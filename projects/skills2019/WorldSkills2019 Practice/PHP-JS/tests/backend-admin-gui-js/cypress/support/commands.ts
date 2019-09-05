// ***********************************************
// This example commands.js shows you how to
// create various custom commands and overwrite
// existing commands.
//
// For more comprehensive examples of custom
// commands please read more here:
// https://on.cypress.io/custom-commands
// ***********************************************
//
//

export function openApp() {
    cy.visit(Cypress.env('URL') || 'http://localhost:8000');
    cy.server();
}

export function login(username: string = 'adminuser1', password: string = 'adminpass1') {
    cy.contains('Login').should('be.visible');
    cy.get('[name="username"]').type(username);
    cy.get('[name="password"]').type(password);
    cy.get('#login').click();
}

export function logout() {
    cy.get('#logout').click();
}

export function resetDb() {
    cy.exec('npm run reset-db', {
        env: {
            DB_HOST: Cypress.env('DB_HOST'),
            DB_USER: Cypress.env('DB_USER'),
            DB_PW: Cypress.env('DB_PW'),
            DB_NAME: Cypress.env('DB_NAME'),
        },
        failOnNonZeroExit: false,
    }).then((res) => {
        console.log(res);
        if (res.code !== 0) {
            throw new Error(res.stderr.replace(/npm ERR![^$]*$/g, ''));
        }
    });
};
