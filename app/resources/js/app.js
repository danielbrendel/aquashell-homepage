/**
 * app.js
 * 
 * Put here your application specific JavaScript implementations
 */

 import './../sass/app.scss';

 window.axios = require('axios');
 window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

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

        ajaxRequest: function (method, url, data = {}, successfunc = function(data){}, finalfunc = function(){}, config = {}) {
            let func = window.axios.get;
            if (method == 'post') {
                func = window.axios.post;
            } else if (method == 'patch') {
                func = window.axios.patch;
            } else if (method == 'delete') {
                func = window.axios.delete;
            }

            func(url, data, config)
                .then(function(response){
                    successfunc(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                })
                .finally(function(){
                        finalfunc();
                    }
                );
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

        updateCodeEditor: function(code, target) {
            let elTarget = document.querySelector(target);

            if (code[code.length - 1] == "\n") {
                code += " ";
            }

            delete elTarget.dataset.highlighted;
            elTarget.innerHTML = code.replace(new RegExp("&", "g"), "&").replace(new RegExp("<", "g"), "<");;
            
            window.hljs.highlightBlock(elTarget);
        },

        clearCodeContext: function() {
            document.querySelector('#code-editing').value = '';
            document.querySelector('#code-highlighting-content').innerHTML = '';
            document.querySelector('#code-response-log').value = '';
            
            window.vue.syncEditorScrolling(this, '#code-highlighting-content');
        },

        runCodeAndReturnResponse: function(runner, code, log, spinner) {
            let elLog = document.querySelector(log);
            elLog.value = '=== Starting Request ===\r\n';

            if (elLog.classList.contains('is-exception')) {
                elLog.classList.remove('is-exception');
            }

            let elSpinner = document.querySelector(spinner);
            elSpinner.style.display = 'inline-block';

            window.runCodeTimeStart = new Date(); 

            window.vue.ajaxRequest('post', window.location.origin + '/code/run/' + runner, { code: code }, function(response) {
                elSpinner.style.display = 'none';
                
                if (response.code == 200) {
                    elLog.value += response.output;

                    window.runCodeTimeEnd = new Date();
                    let timeDiff = (window.runCodeTimeEnd.getTime() - window.runCodeTimeStart.getTime()) / 1000;

                    elLog.value += '=== Finished in ' + (timeDiff).toFixed(2) + 's ===';
                } else {
                    elLog.classList.add('is-exception');
                    elLog.value = response.msg;
                }
            });
        },

        syncEditorScrolling: function(source, target) {
            let elTarget = document.querySelector(target);
            
            elTarget.scrollTop = source.scrollTop;
            elTarget.scrollLeft = source.scrollLeft;
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