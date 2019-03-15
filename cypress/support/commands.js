// ***********************************************
// This example commands.js shows you how to
// create various custom commands and overwrite
// existing commands.
//
// For more comprehensive examples of custom
// commands please read more here:
// https://on.cypress.io/custom-commands
// ***********************************************
 Cypress.Commands.add("login", (username, password) => { 
	 cy.visit('/login.php')
	 cy.request({
	 	 method: 'POST',
	 	 url: '/action.php',
	 	 body: {
	   		username: 'cypress',
	   		password: 'cypress',
	   		confirm:'login'
	 	 }
	 })
 })