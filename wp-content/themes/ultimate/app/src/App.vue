<template>
  <div id="app" class="">
    <app-display-posts />
  </div>
</template>

<script>
import AppDisplayPost from './components/AppDisplayPost';
import SignUpForm from './components/SignUpForm';

export default {
  components : {
    'app-display-posts' : AppDisplayPost,
    //'sign-up-form' : SignUpForm
  },

  name: 'app',
  data () {
    return {
      msg: 'Welcome to Your Vue.js App'
    }
  }
};

</script>
