const buttons = document.querySelectorAll('.accordion-hiring-button')
    buttons.forEach((button) => {
		

      button.addEventListener('click', (e) => {
        e.preventDefault()

		  console.log(button.children)
        const dataId = button.getAttribute('data-id')
        const content = document.getElementById(dataId)
		const item = button.parentNode
		item.classList.toggle('active')
        content.classList.toggle('active')

      })

    })