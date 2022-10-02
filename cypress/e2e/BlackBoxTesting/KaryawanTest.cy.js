describe('Karyawan Testing', () => {
    it('User Can Add Data Karyawan', () => {
      cy.visit('http://127.0.0.1:8000/karyawan')
      cy.get('.text-left > .btn').click()
      cy.get(':nth-child(2) > .form-control').attachFile('bruce-mars.jpg')
      cy.get('#Nama').type('Zaidan')
      cy.get('#Email').type('zaidan@gmail.com')
      cy.get('#No_HP').type('085646449670')
      cy.get('#Jabatan').type('CS')
      cy.get('#myForm > .btn').click()
    })
    // it('User Can Add Data Karyawan', () => {
    //   cy.visit('http://127.0.0.1:8000/karyawan')
    //   cy.get('.btn-info').click()
    // })
    it('User Can Edit Data Karyawan', () => {
      cy.visit('http://127.0.0.1:8000/karyawan')
      cy.get('.btn-primary').click()
      cy.get('#nama').clear()
      cy.get('#nama').type('Fikri')
      cy.get('#email').clear()
      cy.get('#email').type('fikri@gmail.com')
      cy.get('#myForm > .btn').click()
    })
    it('User Can Delete Data Karyawan', () => {
      cy.visit('http://127.0.0.1:8000/karyawan')
      cy.get('.btn-danger').click()
    })
  })