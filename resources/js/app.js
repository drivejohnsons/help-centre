require('./bootstrap');

import Vue from 'vue'

Vue.component('v-search', require('./components/Search.vue').default)

const app = new Vue({
    el: '#app',
    data: {
      menuOpen: false,
    },
    mounted() {
        this.$nextTick(() => {
            this.initListeners()
        })
    },
    methods: {
        initListeners() {
            window.addEventListener('scroll', () => {
                if(window.scrollY > 10) {
                    this.$refs.header.classList.add('shadow')
                } else {
                    this.$refs.header.classList.remove('shadow')
                }
            })
        }
    }
})
