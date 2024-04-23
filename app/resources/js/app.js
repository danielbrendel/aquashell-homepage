/**
 * app.js
 * 
 * Put here your application specific JavaScript implementations
 */

 import './../sass/app.scss';

 import hljs from 'highlight.js';
 import 'highlight.js/scss/github.scss';

 window.hljs = hljs;

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
            let elems = ['aquashell', 'scripting', 'reference'];
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
            document.getElementById('copy-article-link').dataset.link = window.location.origin + '/documentation?tab=' + elem;
        },

        scrollTo: function(target) {
            let elem = document.querySelector(target);
            if (elem) {
                elem.scrollIntoView({ behavior: 'smooth' });
            }
        },

        copyToClipboard: function(text, response = 'Item has been copied to clipboard.') {
            const el = document.createElement('textarea');
            el.value = text;
            document.body.appendChild(el);
            el.select();
            document.execCommand('copy');
            document.body.removeChild(el);
            alert(response);
        },
     }
 });