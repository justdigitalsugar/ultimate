import Vue from 'vue'
import App from './App.vue'
import SignUp from './SignUp.vue'
import './index.css'

window.addEventListener('load', function () {

  new Vue({
    el: '#app',
    render: h => h(App)
  })

  new Vue({
    el: '#signup',
    render: h => h(SignUp)
  })

  const showSignup = document.getElementById('showSignup');
  const showContacts = document.getElementById('showContacts');
  const signUp = document.getElementById('signup');
  const contacts = document.getElementById('app');

  showSignup.addEventListener('click', () => {
    showSignup.classList.add('selected');
    showContacts.classList.remove('selected');
    signUp.style.display = 'block';
    contacts.style.display = 'none';
  });

  showContacts.addEventListener('click', () => {
    showContacts.classList.add('selected');
    showSignup.classList.remove('selected');
    contacts.style.display = 'block';
    signUp.style.display = 'none';
  });

})

