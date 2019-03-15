describe('Testing the Login Page', function() {
	beforeEach(function(){
		cy.visit('/login.php')
		cy.viewport(400, 600)
	})
	it('Submit empty form', function() {
		cy.get('input[type=submit]').click()
		cy.get('.error-msg').should('be.visible') 
	})
	it('username is required', function() {
		cy.get('input[name=password]')
		.type('admin')
		cy.get('input[type=submit]').click()
		cy.get('.error-msg').should('be.visible') 
	})
	it('password is required', function() {
		cy.get('input[name=username]')
		.type('radhika')
		cy.get('input[type=submit]').click()
		cy.get('.error-msg').should('be.visible') 
	})
	it('Wrong email and password', function() {
		cy.get('input[name=username]')
		.type('radhika')
		cy.get('input[name=password]')
		.type('admin')
		cy.get('input[type=submit]').click()
		cy.get('.error-msg').should('be.visible') 
	})
	it('successfully Login', function() {
		cy.get('input[name=username]')
		.type('cypress')
		cy.get('input[name=password]')
		.type('cypress')
		cy.get('input[type=submit]').click()
		cy.url().should('eq', Cypress.config().baseUrl +'/company.php')
	})
});


