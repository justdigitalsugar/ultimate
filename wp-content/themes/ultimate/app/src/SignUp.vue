<template>
    <div id="signup" class="" style="display:none;">
      <sign-up-form />
    </div>
  </template>
  
  <script>
  import SignUpForm from './components/SignUpForm';
  
  export default {
    components : {
      'sign-up-form' : SignUpForm
    },
  
    name: 'signup',
    data () {
      return {
        msg: 'Welcome to Your Vue.js App'
      }
    }
  };
  
  </script>
  
  