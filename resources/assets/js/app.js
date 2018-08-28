
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Element from 'element-ui'
Vue.use(Element);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

// add method

const app = new Vue({
    el: '#app',
    methods: {
        restore(url) {
            axios.patch(url).then(response => {
                console.log(response.data)
                if (response.status === 200 && response.data.status === 0) {
                    this.$message({
                        type: 'success',
                        message: '操作成功'
                    });
                } else {
                    this.$message({
                        type: 'error',
                        message: '操作失败'
                    });
                }
                setTimeout(()=>{
                    window.location.reload();
                }, 1)
            }).catch(err => {
                this.$message({
                    type: 'error',
                    message: err.message
                });
            })
        },
        deleteAlert(url) {
            this.$confirm('是否下架？', '警告', {
                confirmButtonText: '下架',
                callback: action => {
                    axios.delete(url).then(response => {
                        console.log(response.data)
                        if (response.status === 200 && response.data.status === 0) {
                            this.$message({
                                type: 'success',
                                message: '操作成功'
                            });
                        } else {
                            this.$message({
                                type: 'error',
                                message: '操作失败'
                            });
                        }
                        setTimeout(()=>{
                            window.location.reload();
                        }, 1000)
                    }).catch(err => {
                        this.$message({
                            type: 'error',
                            message: err.message
                        });
                    })
                }
            });
        }
    }
});

// bootstrap4 validate Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        // Loop over them and prevent submission
        const validation = Array.prototype.filter.call(document.getElementsByClassName('needs-validation'), function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
