const navToggle = document.querySelector('.nav-toggle');
const mainNav = document.querySelector('.main-nav');
const hamburger = document.querySelector('.hamburger');
const pathname = window.location.pathname;
let width = document.body.clientWidth;

const imgHTML = `
<div class="header-logo" id='nav-logo'>
  <a href="${pathname === '/index.html' ? './index.html' : '../index.html'}">
      <img src="${pathname === '/index.html' ? './assets/images/logo.webp' : '../assets/images/logo.webp'}" alt="Dave conneely construction Logo" />
  </a>
</div> 
${mainNav.innerHTML}`;

window.addEventListener('resize', event => {
  const navLogo = document.getElementById('nav-logo');
  if (navLogo) {
    navLogo.remove();
  }
  width = document.body.clientWidth;
  sponsorSlidshow()

});

navToggle.addEventListener('click', (event) => {
  handleNav();
});

navToggle.addEventListener('keydown', (event) => {

  if (event.key === 'Enter' || event.key === ' ') {
    event.preventDefault();
    handleNav();
  }

})

const handleNav = () => {
  mainNav.classList.toggle('is-open');
  hamburger.classList.toggle('is-open');

  if (!document.getElementById('nav-logo')) {
    mainNav.innerHTML = imgHTML;
  } else {
    const navLogo = document.getElementById('nav-logo');
    navLogo.remove();
  }

  if (!hamburger.classList.contains('is-open') && width < 1000) {
    const navLinks = document.querySelectorAll('nav-links');
    navLinks.forEach(element => {
      element.tabIndex = -1;
    });
  } else {
    const navLinks = document.querySelectorAll('nav-links');
    navLinks.forEach(element => {
      element.tabIndex = 0;
    });
  }
}