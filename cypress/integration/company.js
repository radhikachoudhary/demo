import Chance from 'chance'
const chance = new Chance();
const RandomEmail 		= chance.email();
	describe('Test Employee Benefits', function() {
		before(function(){
			cy.login()
		})
		beforeEach(function(){
			cy.visit('/company.php')
		})
		it('If employee benefits is set to yes then Employee Benefits list show', function() {
			cy.get('input[name=employee_benefits]').check('yes')
			cy.get('#employee_benifits').should('be.visible') 
		})
		it('If employee benefits is set to no then Employee Benefits list hide', function() {
			cy.get('input[name=employee_benefits]').check('no')
			cy.get('#employee_benifits').should('be.not.visible') 
		})
		it('security code lenght test',function(){
			cy.get('input[name=security_code]').type('123kjkhj4')
			assert.lengthOf('123kjkhj4', 4, 'security code must be length of 4');
		})		
	})
	describe('Submit Form Successfully',function(){
		 beforeEach(() => {
			cy.fixture("db/company.json").as("company");
		 })
		 it('Fill Up form successfully', function() {
			cy.get('input[name=company]').type(this.company[0]['company_name'])
			cy.get('select[name=country]').select(this.company[0]["company_location"])
			cy.get('input[name=company_email]').type(RandomEmail)
			  .should("have.value", RandomEmail)
			cy.get('input[name=security_code]').type(this.company[0]['security_code'])
			cy.get('input[name=company_type]').check(this.company[0]['company_type'])
			cy.get('input[name=company_type]').check('no')
		})
	})
