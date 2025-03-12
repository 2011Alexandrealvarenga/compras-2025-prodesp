const ProdespResponsiveMenu = (options = {}) => {

	const defaults = {
		wrapper: '.main-navigation',
		menu: '.menu',
		threshold: 640, // Minimal menu width,
		mobileMenuClass: 'mobile-menu',
		mobileMenuOpenClass: 'mobile-menu-open',
		// mobileMenuToggleButtonClass: 'mobile-menu-toggle-button',
		toggleButtonTemplate: '<i class="mobile-menu-close fa fa-bars" aria-hidden="true"></i><i class="mobile-menu-open fa fa-times" aria-hidden="true"></i>'
	}
	options = Object.assign(defaults, options);

	const wrapper = options.wrapper.nodeType ?
		options.wrapper :
		document.querySelector(options.wrapper);

	const menu = options.menu.nodeType ?
		options.menu :
		document.querySelector(options.menu);

	let toggleButton,
		toggleButtonOpenBlock,
		toggleButtonCloseBlock,
		isMobileMenu,
		isMobileMenuOpen;

	// series

	const init = [
		addToggleButton,
		checkScreenWidth,
		addResizeHandler
	]

	if (wrapper && menu) {
		runSeries(init);
	}

	function addToggleButton() {
		toggleButton = document.createElement('button');

		toggleButton.innerHTML = options.toggleButtonTemplate.trim();
		// toggleButton.className = options.mobileMenuToggleButtonClass;
		wrapper.insertBefore(toggleButton, wrapper.children[0]);

		toggleButtonOpenBlock = toggleButton.querySelector('.mobile-menu-open');
		toggleButtonCloseBlock = toggleButton.querySelector('.mobile-menu-close');

		toggleButton.addEventListener('click', mobileMenuToggle);
	}

	// menu switchers

	function switchToMobileMenu() {
		wrapper.classList.add(options.mobileMenuClass);
		toggleButton.style.display = "block";
		isMobileMenuOpen = false;
		hideMenu();
	}

	function switchToDesktopMenu() {
		wrapper.classList.remove(options.mobileMenuClass);
		toggleButton.style.display = "none";
		showMenu();
	}

	// mobile menu toggle

	function mobileMenuToggle() {
		if (isMobileMenuOpen) {
			hideMenu();
		} else {
			showMenu();
		}
		isMobileMenuOpen = !isMobileMenuOpen;
	}

	function hideMenu() {
		wrapper.classList.remove(options.mobileMenuOpenClass);
		menu.style.display = "none";
		toggleButtonOpenBlock.style.display = "none";
		toggleButtonCloseBlock.style.display = "block";
	}

	function showMenu() {
		wrapper.classList.add(options.mobileMenuOpenClass);
		menu.style.display = "block";
		toggleButtonOpenBlock.style.display = "block";
		toggleButtonCloseBlock.style.display = "none";
	}

	// resize helpers

	function checkScreenWidth() {
		let currentMobileMenuStatus = window.innerWidth < options.threshold ? true : false;

		if (isMobileMenu !== currentMobileMenuStatus) {
			isMobileMenu = currentMobileMenuStatus;
			isMobileMenu ? switchToMobileMenu() : switchToDesktopMenu();
		}
	}

	function addResizeHandler() {
		window.addEventListener('resize', resizeHandler);
	}

	function resizeHandler() {
		window.requestAnimationFrame(checkScreenWidth)
	}

	// general helpers
	function runSeries(functions) {
		functions.forEach(func => func());
	}
}

// menu lateral
const menu_lateral_desktop = document.getElementById("menu-lateral-desktop");
const menu_lateral_mobile = document.getElementById("menu-lateral-mobile");

const button_desktop = document.getElementById("btn-menu-desktop");
const button_mobile = document.getElementById("btn-menu-mobile");

const buttons_close = document.querySelectorAll(".btn-ham-close");

// const back_menu = document.getElementById("page");
const background_header = document.querySelector(".site-header__wrap");

const box_menu_content = document.querySelector(".back-ativo");

const id_back_menu = document.querySelector(".back-menu");
const const_back_menu = document.querySelector(".box-menu-content");

const back_menu_desktop = document.getElementById("back-menu-desktop");
const back_menu_mobile = document.getElementById("back-menu-mobile");


button_desktop.onclick = function(){	
	back_menu_desktop.classList.add("active");
	back_menu.classList.add("back-ativo");
}


button_mobile.onclick = function(){	
	back_menu_mobile.classList.add("active");
	// back_menu.classList.add("back-ativo");
}

window.addEventListener('resize', function(event) {
	back_menu_desktop.classList.remove("active");
	back_menu_mobile.classList.remove("active");
})


buttons_close.forEach((button_close) => {
	button_close.onclick=function(){
		back_menu_desktop.classList.remove("active");
		back_menu_mobile.classList.remove("active");
		back_menu.classList.remove("back-ativo");

	}
})

back_menu_desktop.onclick = function(e){
	if(e.target.classList[1] == 'active'){
		back_menu_desktop.classList.remove("active");
		// back_menu_mobile.classList.remove("active");
		// back_menu.classList.remove("back-ativo");
	}
	
	console.log(e.target.classList)
}
back_menu_mobile.onclick = function(e){
	if(e.target.classList[1] == 'active'){
		// back_menu_desktop.classList.remove("active");
		back_menu_mobile.classList.remove("active");
		// back_menu.classList.remove("back-ativo");
	}
	
	console.log(e.target.classList)
}


// function fecharMenu(){

// 	if(box_menu_content.classList.contains("active")){

// 		document.addEventListener("click", function(event) {
// 				if (event.target.closest(".box-menu-content.active")) 
// 				return
// 				// menu_lateral_desktop.style.display="none";
// 				// back_menu.style.display="none";
	
// 				alert('ola');
// 			})

// 	}else{
// 		alert('nao tem')
// 	}

// }
// Inicio - acessibilidade
  // inicio - inverter cores     
  const btnInverterColor = document.querySelector('#invertColors');
  btnInverterColor.addEventListener('click', ()=>{
      document.body.classList.toggle('inversed');
      console.log('testando inverter color');
  });
// fim - inverter cores
// inicio - aumenta fonte e diminui
  const increaseButton = document.getElementById('increase');
  const decreaseButton = document.getElementById('decrease');
  function increaseFontSize() {
      event.preventDefault();
      const elements = document.querySelectorAll('h1, h2, h3, h4, h5, h6, span, a, p');      
      elements.forEach(element => {
          const currentSize = window.getComputedStyle(element).fontSize;
          const currentSizeValue = parseFloat(currentSize);
          element.style.fontSize = (currentSizeValue + 2) + 'px';
      });
  }
  function decreaseFontSize() {
      event.preventDefault();
      const elements = document.querySelectorAll('h1, h2, h3, h4, h5, h6, span, a, p');
      elements.forEach(element => {
          const currentSize = window.getComputedStyle(element).fontSize;
          const currentSizeValue = parseFloat(currentSize);
          element.style.fontSize = (currentSizeValue - 2) + 'px';
      });
  }
  increaseButton.addEventListener('click', increaseFontSize);
  decreaseButton.addEventListener('click', decreaseFontSize);
// fim - aumenta fonte e diminui
// 
  const iconCallAcess = document.querySelector('#btnAcessibilidade');
  const listIcons = document.querySelector('#menuAcessibilidade');
  iconCallAcess.addEventListener('click', function(){
      listIcons.classList.toggle('display-grid');
  });
// 
// inicio - destacar link
const destacarLink = document.querySelector('#highlightLinks');
const elementLinks = document.querySelectorAll('a');
destacarLink.addEventListener('click', ()=>{
    elementLinks.forEach(element => {
        element.classList.toggle('back-link');
    });
})
// fim - destacar link
// inicio - contrast
  const contrast = document.querySelector('.altocontrasteAcessibilidade');
  const elements = document.querySelectorAll('p, h1, h2, h3, h4, h5, h6, a, span, body, div, section, li, ul');
  const iconBranco = document.querySelectorAll('.iconBranco');
  const iconPreto = document.querySelectorAll('.iconPreto');
  contrast.addEventListener('click', function() {
    elements.forEach(element => {
      element.classList.toggle('contrast-color');
    });
    iconBranco.forEach(iBranco => {
      iBranco.classList.toggle('displayBlock');
    });
    iconPreto.forEach(iPreto => {
      iPreto.classList.toggle('displayNone');
    });

  })
// fim - contrast
// fim -acessibilidade

jQuery(document).ready(function( $ ){
	
	if ($(window).width() > 960) {
		$(window).scroll(function () {
			if($(window).scrollTop() > 200) {
				$("#menu").addClass('hfe-sticky');
				$( "#menu" ).slideDown( "slow" );
			} else {
				$( "#menu" ).slideDown( "slow" );
				$("#menu").removeClass('hfe-sticky');
			}
		});
	}
	
	// RELOAD TO TOP
	
	window.onbeforeunload = function () {
	  window.scrollTo(0, 0);
	}
		
});
	