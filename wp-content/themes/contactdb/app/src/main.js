import Vue from 'vue'
import App from './App.vue'
import './assets/styles/index.css'


window.addEventListener('load', function () {

  new Vue({
    el: '#app',
    render: h => h(App)
  })

})

