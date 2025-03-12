jQuery(document).ready(function(){
  jQuery(".step").click(function() {
    jQuery('html, body').animate({
        scrollTop: jQuery(".hiring").offset().top
    }, 1000);
  });


  jQuery('#btn-cad-usuarios').click(
    function(){
    jQuery('.cadastro-content').css('display','block');
    jQuery('.perfis-content').css('display','none');
    jQuery('.sistema-content').css('display','none');

  }
  );
  jQuery('#btn-conhe-perfis').click(
    function(){
    jQuery('.perfis-content').css('display','block');
    jQuery('.cadastro-content').css('display','none');
    jQuery('.sistema-content').css('display','none');
    }
  );
  jQuery('#btn-acesso-sistema').click(
    function(){
    jQuery('.sistema-content').css('display','block');
    jQuery('.perfis-content').css('display','none');
    jQuery('.cadastro-content').css('display','none');
    }
  );
  
});
 
//  ancora 
if (window.location.href.includes("ircomecar")) {
  console.log('ir começar2');
    window.scrollBy(0, 400);
}else if(window.location.href.includes("irfluxo-das-contratacoes")) {
  console.log('ir contratacoes');

  window.scrollBy(0, 680);
}
// inicio - conteudo js do plugin da pagina capacitacao
const steps = document.querySelectorAll('.step')
const groups = document.getElementsByClassName('group')
const panels = document.getElementsByClassName('panel')

steps.forEach((step) => {
  step.addEventListener('click', (e) => {
    const button = e.target.parentNode
    const id = document.getElementById(step.getAttribute('hiring-data'))

    for (let i = 0; i < steps.length; i++) {
      steps[i].classList.remove('active')
      panels[i].classList.remove('active')
    }

    id.classList.add('active')
    button.classList.add('active')

    if (button.classList.contains('group')) {
      for (let i = 0; i < groups.length; i++) {
        groups[i].classList.add('active')
      }
    }

const size = screen.width
  if (size <= 768) {
  const allSteps = document.querySelector('.new-steps')
  const offsetHeight = 100
  allSteps.scrollTop += offsetHeight
  allSteps.lastElementChild.scrollIntoView({ behavior: 'smooth' })
}
  })
}) 
let currentTab = 0
const subs = document.querySelectorAll('.different svg g')
const textBox = document.querySelector('.text-box')

function goTab() {

  const steps = document.querySelectorAll('.steps svg g')
  const buttons = document.querySelectorAll('.buttons button')
  const stepsDiv = document.querySelectorAll('.steps')
  const tabs = document.getElementsByClassName('tabs')
  const subTabs = document.getElementsByClassName('subtabs')
  const nextBtn = document.getElementById('nextBtn')
  const nextBtn1 = document.getElementById('nextBtn1')
  const nextBtn2 = document.getElementById('nextBtn2')
  const nextBtn3 = document.getElementById('nextBtn3')
  const nextBtn4 = document.getElementById('nextBtn4')
  const prevBtn = document.getElementById('prevBtn')
  const secondItem = document.querySelector('.second-item')
  const thirdItem = document.querySelector('.third-item')
  const fourthItem = document.querySelector('.fourth-item')
  const fifthItem = document.querySelector('.fifth-item')
  const mainItem = document.querySelector('.main-item')
  const different = document.querySelector('.different')
  const subs = document.querySelectorAll('.different svg g')

  for (let i = 0; i < subs.length; i++) {
    subs[i].classList.remove('active')
    subs[i].addEventListener('click', (e) => {
      e.preventDefault()
      different.classList.add('active')
    })
  }
  subs[0].addEventListener('click', () => {
    for (let i = 0; i < subTabs.length; i++) {
      subTabs[i].classList.remove('active')
    }
    for (let i = 0; i < tabs.length; i++) {
      stepsDiv[i].classList.remove('active')
      tabs[i].classList.remove('active')
    }
    subs[0].classList.add('active')
    subs[1].classList.remove('active-3')
    subs[1].classList.remove('active')
    subs[2].classList.remove('active-2')
    subs[2].classList.remove('active-3')
subs[2].classList.remove('active')
    subs[3].classList.remove('active-3')
subs[3].classList.remove('active')
    subs[4].classList.remove('active-3')
subs[4].classList.remove('active')
    tabs[4].classList.add('active')
  })

  subs[1].addEventListener('click', (e) => {
    e.preventDefault()

    for (let i = 0; i < tabs.length; i++) {
      stepsDiv[i].classList.remove('active')
      tabs[i].classList.remove('active')
    }
    for (let i = 0; i < subTabs.length; i++) {
      subTabs[i].classList.remove('active')
    }
  
subs[0].classList.remove('active')

    subs[1].classList.add('active')
    subs[1].classList.remove('active-3')
    subs[2].classList.remove('active-3')
subs[2].classList.add('active')
    subs[3].classList.remove('active-3')
 subs[3].classList.remove('active')
subs[4].classList.add('active')
    subs[4].classList.remove('active-3')
    subTabs[1].classList.add('active')
  })

  subs[2].addEventListener('click', () => {
    for (let i = 0; i < tabs.length; i++) {
      stepsDiv[i].classList.remove('active')
      tabs[i].classList.remove('active')
    }

    for (let i = 0; i < subTabs.length; i++) {
      subTabs[i].classList.remove('active')
    }

    subs[0].classList.remove('active')
    subs[2].classList.add('active')
    subs[1].classList.remove('active')
    subs[1].classList.remove('active-3')
    subs[3].classList.remove('active-3')
subs[3].classList.remove('active')
subs[1].classList.add('active')
    subs[4].classList.remove('active-3')
subs[4].classList.add('active')
    subTabs[3].classList.add('active')
  })
  subs[3].addEventListener('click', () => {
    for (let i = 0; i < tabs.length; i++) {
      stepsDiv[i].classList.remove('active')
      tabs[i].classList.remove('active')
    }
    for (let i = 0; i < subTabs.length; i++) {
      subTabs[i].classList.remove('active')
    }
    subs[0].classList.remove('active')
    subs[1].classList.remove('active')
    subs[1].classList.remove('active-3')
    subs[2].classList.remove('active-3')
subs[2].classList.remove('active')
    subs[3].classList.add('active')
    subs[4].classList.remove('active-3')
subs[4].classList.remove('active')

    subTabs[0].classList.add('active')
  })

  subs[4].addEventListener('click', () => {

    for (let i = 0; i < tabs.length; i++) {
      stepsDiv[i].classList.remove('active')
      tabs[i].classList.remove('active')
    }

    for (let i = 0; i < subTabs.length; i++) {
      subTabs[i].classList.remove('active')
    }

    subs[0].classList.remove('active')
    subs[1].classList.add('active')
    subs[1].classList.remove('active-3')
    subs[2].classList.remove('active-3')
subs[2].classList.add('active')
    subs[3].classList.remove('active-3')
subs[3].classList.remove('active')
    subs[4].classList.add('active')
    subTabs[2].classList.add('active')
  })
  for (let i = 0; i < 4; i++) {
    stepsDiv[i].addEventListener('click', (e) => {

      const groups = document.querySelectorAll('.different g')

      let classes = ['active', 'active-2', 'active-3']

      groups.forEach((group) => {
        group.classList.remove(...classes)
      })

      for (let i = 0; i < subTabs.length; i++) {
        subTabs[i].classList.remove('active')
      }

      for (let tab = 0; tab < tabs.length; tab++) {
        tabs[tab].classList.remove('active')
        stepsDiv[tab].classList.remove('active')
      }

      const step = e.target.parentNode
      tabs[i].classList.add('active')
      stepsDiv[i].classList.add('active')
      prevBtn.classList.add('show')
    })
  }

  stepsDiv[5].addEventListener('click', (e) => {
    const groups = document.querySelectorAll('.different g')
    let classes = ['active', 'active-2', 'active-3']

    groups.forEach((group) => {
      group.classList.remove(...classes)
    })

    for (let i = 0; i < subTabs.length; i++) {
      subTabs[i].classList.remove('active')
    }

    for (let tab = 0; tab < tabs.length; tab++) {
      tabs[tab].classList.remove('active')
      stepsDiv[tab].classList.remove('active')
    }

    const step = e.target.parentNode
    tabs[5].classList.add('active')
    stepsDiv[5].classList.add('active')
  })
  nextBtn.addEventListener('click', (e) => {
    const correctTab = currentTab === steps.length - 1 ? currentTab = 0 : ++currentTab
    nextBtn.innerHTML = steps[correctTab + 1].textContent
    manipulateTabs(correctTab)

    if (correctTab !== 0) {
      document.getElementById("prevBtn").classList.add('show')
    } else {
      document.getElementById("prevBtn").classList.remove('show')
    }
  })
  prevBtn.addEventListener('click', () => {

    let correctTab = ''

    if (currentTab === 0) {
      correctTab = currentTab = steps.length - 1

    } else {
      correctTab = --currentTab
    }
    manipulateTabs(correctTab)
  })

  stepsDiv[0].addEventListener('click', () => {
    for (let i = 0; i < subTabs.length; i++) {
      subTabs[i].classList.remove('active')
    }


    prevBtn.classList.add('hidden')
    nextBtn.classList.add('hidden')

    nextBtn1.classList.remove('hidden')
    nextBtn1.classList.add('btn-gray')
    nextBtn1.classList.remove('btn-white')
    nextBtn1.innerHTML = 'ETP'

    nextBtn2.classList.add('hidden')
    nextBtn3.classList.add('hidden')
    nextBtn4.classList.add('hidden')
    nextBtn5.classList.add('hidden')
  })

  stepsDiv[1].addEventListener('click', () => {
    prevBtn.classList.remove('hidden')
    prevBtn.classList.remove('btn-gray')
    prevBtn.classList.add('btn-red')
    prevBtn.innerHTML = 'Voltar'
    nextBtn.classList.add('hidden')

    nextBtn1.classList.remove('hidden')
    nextBtn1.classList.add('btn-gray')
    nextBtn1.classList.remove('btn-white')
    nextBtn1.innerHTML = 'Gestão de Riscos'

    nextBtn2.classList.add('hidden')
    nextBtn3.classList.add('hidden')
    nextBtn4.classList.add('hidden')
    nextBtn5.classList.add('hidden')
  })

  stepsDiv[2].addEventListener('click', () => {
    prevBtn.classList.remove('hidden')
    prevBtn.classList.remove('btn-gray')
    prevBtn.classList.add('btn-red')
    prevBtn.classList.add('show')
    prevBtn.innerHTML = 'Voltar'
    nextBtn.classList.add('hidden')

    nextBtn1.classList.remove('hidden')
    nextBtn1.classList.add('btn-gray')
    nextBtn1.classList.remove('btn-white')
    nextBtn1.innerHTML = 'Pesquisa de Preços'

    nextBtn2.classList.add('hidden')
    nextBtn3.classList.add('hidden')
    nextBtn4.classList.add('hidden')
    nextBtn5.classList.add('hidden')
  })
  stepsDiv[3].addEventListener('click', () => {
    prevBtn.classList.remove('hidden')
    prevBtn.classList.remove('btn-gray')
    prevBtn.classList.add('btn-red')
    prevBtn.classList.add('show')
    prevBtn.innerHTML = 'Voltar'
    nextBtn.classList.add('hidden')

    nextBtn1.classList.remove('hidden')
    nextBtn1.classList.add('btn-gray')
    nextBtn1.classList.remove('btn-white')
    nextBtn1.innerHTML = 'Termo de Referência'

    nextBtn2.classList.add('hidden')
    nextBtn3.classList.add('hidden')
    nextBtn4.classList.add('hidden')
    nextBtn5.classList.add('hidden')
  })
  stepsDiv[4].addEventListener('click', () => {

    prevBtn.classList.remove('hidden')
    prevBtn.classList.remove('btn-gray')
    prevBtn.classList.add('btn-red')
    prevBtn.classList.add('show')
    prevBtn.innerHTML = 'Voltar'
    nextBtn.classList.add('hidden')

    nextBtn1.classList.remove('hidden')
    nextBtn1.classList.add('btn-gray')
    nextBtn1.classList.remove('btn-white')
    nextBtn1.innerHTML = 'Termo de Referência'

    nextBtn2.classList.remove('hidden')
    nextBtn2.classList.add('btn-white')
    nextBtn2.classList.remove('btn-gray')

    nextBtn2.innerHTML = 'Licitação'

    nextBtn.classList.remove('hidden')
    nextBtn.classList.remove('btn-gray')
    nextBtn.innerHTML = 'Contratação Direta'

    nextBtn3.classList.remove('hidden')
    nextBtn3.classList.remove('btn-gray')
    nextBtn3.classList.add('btn-white')
    nextBtn3.innerHTML = 'Inexibilidade'

    nextBtn4.classList.remove('hidden')
    nextBtn4.classList.remove('btn-gray')
    nextBtn4.innerHTML = 'Dispensa de Licitação'

    nextBtn5.classList.remove('hidden')
    nextBtn5.classList.remove('btn-gray')
    nextBtn5.innerHTML = 'Gestão de Contratos'
  })
}
goTab()

function showTab(n) {
  const steps = document.getElementsByClassName('steps')
  steps[n].classList.add('active')

  const tabs = document.getElementsByClassName('tabs')
  tabs[n].classList.add('active')

  if (n !== 0) {
    document.getElementById("prevBtn").classList.add('show')
  } else {
    document.getElementById("nextBtn2").classList.add('hidden')
    document.getElementById("prevBtn").classList.remove('show')

  }
}

// fim - conteudo js do plugin da pagina capacitacao