import './bootstrap';
import 'bootstrap';
const container = document.getElementById('container');
const signUpBtn = document.getElementById('signUp');
const signInBtn = document.getElementById('signIn');

signUpBtn?.addEventListener('click', () => {
  container.classList.add("right-panel-active");
});

signInBtn?.addEventListener('click', () => {
  container.classList.remove("right-panel-active");
});

// // Mobile toggle logic
// const mobileSignIn = document.getElementById('mobileSignIn');
// const mobileSignUp = document.getElementById('mobileSignUp');
// const signInContainer = document.querySelector('.sign-in-container');
// const signUpContainer = document.querySelector('.sign-up-container');

// function showMobileForm(form) {
//   signInContainer.classList.remove('active');
//   signUpContainer.classList.remove('active');
//   if (form === 'signin') {
//     signInContainer.classList.add('active');
//   } else {
//     signUpContainer.classList.add('active');
//   }
// }

// mobileSignIn?.addEventListener('click', () => showMobileForm('signin'));
// mobileSignUp?.addEventListener('click', () => showMobileForm('signup'));

// // Default mobile view
// if (window.innerWidth < 768) {
//   showMobileForm('signin');
// }
