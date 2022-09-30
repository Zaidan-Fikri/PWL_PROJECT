describe('Register Testing', () => {
    it('User Can Register Test', () => {
      cy.visit('http://127.0.0.1:8000/register')
      cy.get('#name').type('Zaidan')
      cy.get('#email').type('zaidan11@gmail.com')
    })
  })