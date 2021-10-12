/// <reference types="cypress" />

describe('Carga la pagina principal', () => {
    it('Prueba el Header de la pagina principal', () => {
        cy.visit('/');

        cy.get('[data-cy="heading-sitio"]').should('exist') ;
        cy.get('[data-cy="heading-sitio"]').invoke('text').should('equal', 'Venta de Casas y Departamentos Exclusivos de Lujo') ;
        cy.get('[data-cy="heading-sitio"]').invoke('text').should('not.equal', 'Bienes Raices') ;
        
    });

    it('Prueba el Header de los Iconos Principales', () => {
        cy.get('[data-cy="heading-nosotros"]').should('exist');
        cy.get('[data-cy="heading-nosotros"]').should('have.prop', 'tagName').should('equal', 'H2');
    })
});