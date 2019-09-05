import { openApp, login, resetDb } from '../support/commands';

describe('B2 - Manage an event', () => {
    beforeEach(() => {
        resetDb();
        openApp();
        login();
        cy.get('#manage-events').click();
    });

    it('B2a - Show form for new event', () => {
        cy.get('#add-event').click();
        cy.get('[name="title"]').should('be.visible');
    });

    it('B2b - Enter info for a new event - general', () => {
        cy.get('#add-event').click();
        cy.get('[name="title"]').should('be.visible');
        cy.get('[name="title"]').type('WorldSkills 2019');
        cy.get('[name="description"]').type('WorldSkills 2019 in Kazan');
        cy.get('[name="date"]').type('2019-08-22');
        cy.get('[name="time"]').type('14:00');
        cy.get('[name="duration_days"]').type('6');
        cy.get('[name="location"]').type('Kazan Expo');
        cy.get('[name="standard_price"]').type('40');
        cy.get('[name="capacity"]').type('100000');
        cy.get('#create-event').click();
        cy.contains('Event successfully created').should('be.visible');
        cy.get('#manage-events').click();
        cy.contains('WorldSkills 2019').should('be.visible');
        cy.contains('22.08.2019').should('be.visible');
    });

    it('B2c - Enter info for a new event - sessions', () => {
        cy.get('#add-event').click();
        cy.get('#add-session').should('be.visible');
        cy.get('body').then(($body) => {
            let sessions = $body.find('.session').length;
            cy.get('#add-session').click();
            cy.get('.session').its('length').should('eq', sessions + 1);
        });
    });

    it('B2d - See existing event list', () => {
        cy.get('#add-event').should('be.visible');
        cy.get('.event').its('length').should('eq', 2);

        cy.get('.event').eq(0).contains('Web conference').should('be.visible');
        cy.get('.event').eq(0).contains('15.08.2019').should('be.visible');
        cy.get('.event').eq(0).contains('500.-').should('be.visible');
        cy.get('.event').eq(0).contains('Participants list').should('be.visible');
        cy.get('.event').eq(0).contains('Rating diagram').should('be.visible');

        cy.get('.event').eq(1).contains('Fishing experience').should('be.visible');
        cy.get('.event').eq(1).contains('30.08.2019').should('be.visible');
        cy.get('.event').eq(1).contains('100.-').should('be.visible');
        cy.get('.event').eq(1).contains('Participants list').should('be.visible');
        cy.get('.event').eq(1).contains('Rating diagram').should('be.visible');
    });

    it('B2e - See existing event details', () => {
        cy.contains('Web conference').click();

        cy.contains('Web conference').should('be.visible');
        cy.contains('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.').should('be.visible');
        cy.contains('15.08.2019').should('be.visible');
        cy.contains('08:00').should('be.visible');
        cy.get('.event-duration-days').contains('1').should('be.visible')
        cy.contains('Floor1').should('be.visible');
        cy.contains('500.-').should('be.visible');
        cy.contains('250').should('be.visible');
        cy.contains('Session').should('be.visible');
        cy.contains('CSS applied').should('be.visible');
        cy.contains('8:30').should('be.visible');
        cy.contains('R05').should('be.visible');
        cy.contains('Mac Entyre').should('be.visible');
        cy.contains('JS advanced').should('be.visible');
        cy.contains('10:00').should('be.visible');
        cy.contains('R06').should('be.visible');
        cy.contains('Ann Codelle').should('be.visible');
    });

    it('B2f - Edit existing event details', () => {
        cy.contains('Web conference').click();

        cy.get('#edit-event').should('be.visible');
        cy.get('#edit-event').click();

        cy.get('[name="title"]').type('changed');
        cy.get('[name="description"]').type('changed');
        cy.get('[name="date"]').clear().type('2019-08-16');
        cy.get('[name="time"]').clear().type('09:00');
        cy.get('[name="duration_days"]').clear().type('2');
        cy.get('[name="location"]').type('{backspace}2');
        cy.get('[name="standard_price"]').type('{backspace}5');
        cy.get('[name="capacity"]').type('5');

        cy.get('#save-event').click();

        cy.contains('Event successfully saved').should('be.visible');

        cy.contains('Web conferencechanged').should('be.visible');
        cy.contains('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.changed').should('be.visible');
        cy.contains('16.08.2019').should('be.visible');
        cy.contains('09:00').should('be.visible');
        cy.get('.event-duration-days').contains('2').should('be.visible')
        cy.contains('Floor2').should('be.visible');
        cy.contains('505.-').should('be.visible');
        cy.contains('2505').should('be.visible');
    });

});
