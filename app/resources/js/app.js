/**
 * app.js
 * 
 * Put here your application specific JavaScript implementations
 */

 import './../sass/app.scss';

 window.vue = new Vue({
     el: '#main',

     data: {
     },

     methods: {
        initNavbar: function() {
            const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
    
            if ($navbarBurgers.length > 0) {
                $navbarBurgers.forEach( el => {
                    el.addEventListener('click', () => {
                        const target = el.dataset.target;
                        const $target = document.getElementById(target);
                        
                        el.classList.toggle('is-active');
                        $target.classList.toggle('is-active');
                    });
                });
            }
        },

        showDocumentation: function(elem) {
            let elems = ['aquashell', 'scripting'];
            elems.forEach(function(e, i) {
                let el = document.getElementById('documentation-' + e);
                if (!el.classList.contains('is-hidden')) {
                    el.classList.add('is-hidden');
                }

                let cl = document.getElementById('button-' + e);
                cl.style.textDecoration = 'none';
            })
            
            let obj = document.getElementById('documentation-' + elem);
            if (obj !== null) {
                obj.classList.remove('is-hidden');
            }

            document.getElementById('button-' + elem).style.textDecoration = 'underline';
        },
     }
 });