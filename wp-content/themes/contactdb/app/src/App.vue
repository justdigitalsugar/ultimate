<template>
  <div id="app" class="py-24">
    <sign-up-form />
    <app-display-posts />
  </div>
</template>

<script>
import AppDisplayPost from './components/AppDisplayPost';
import SignUpForm from './components/SignUpForm';

export default {
  components : {
    'app-display-posts' : AppDisplayPost,
    'sign-up-form' : SignUpForm
  },

  name: 'app',
  data () {
    return {
      msg: 'Welcome to Your Vue.js App'
    }
  }
};

</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}


</style>
