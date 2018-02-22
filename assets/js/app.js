const $ = require('jquery');
const Vue = require('vue');
const Decoder = require('./decoder');

Vue.component('transcenden', require('./components/TranscendenComponent.vue'));

$(() => {
    const app = new Vue({
        el: '#app',
        data: {
            save: null
        }
    });

    $('#raw-save').on('change', () => {
        let save = new Decoder($('#raw-save').val());

        app.save = (save.data === null) ? null : save.data.stats;
    });
});
