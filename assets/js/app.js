const $ = require('jquery');
const Vue = require('vue');
const Decoder = require('./decoder');

Vue.component('stats', require('./components/StatsComponent.vue'));
Vue.component('transcensions', require('./components/TranscensionsComponent.vue'));

$(() => {
    const app = new Vue({
        el: '#app',
        data: {
            save: null
        }
    });

    $('#raw-save').on('change', () => {
        let save = new Decoder($('#raw-save').val());

        app.save = (save.data === null) ? null : save.data;
    });
});
