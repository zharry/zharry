import { openApp, login, logout } from '../support/commands';

describe('B1 - Login and logout as admin', () => {
    beforeEach(() => {
        openApp();
    });

    it('B1a - Admin login ok', () => {
        cy.contains('Login').should('be.visible');
        login('adminuser1', 'adminpass1');
        cy.contains('Login').should('not.be.visible');
        cy.get('#logout').should('be.visible');
        cy.contains('adminuser1').should('be.visible');
        cy.contains('Manage events').should('be.visible');
    });

    it('B1b - Admin login fail', () => {
        cy.contains('Login').should('be.visible');
        cy.get('[name="username"]').type('adminuser1');
        cy.get('[name="password"]').type('wrong_password');
        cy.get('#login').click();
        cy.contains('User or password not correct').should('be.visible');
    });

    it('B1c - Admin logout', () => {
        login();
        cy.contains('Login').should('not.be.visible');
        cy.get('#logout').should('be.visible');
        cy.contains('adminuser1').should('be.visible');

        logout();
        cy.contains('Login').should('be.visible');
        cy.get('#logout').should('not.be.visible');
        cy.contains('adminuser1').should('not.be.visible');
    });
});
