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
        },
        methods: {
            hasTranscend() {
                if (app.save === null || app.save === undefined) {
                    return false;
                }

                let keys = Object.keys(app.save.stats.transcensions);
                if (keys.length > 1) {
                    return true;
                }
                return Object.keys(app.save.stats.transcensions[keys[0]].ascensions).length > 1;
            }
        }
    });

    $('#raw-save').on('change', () => {
        let save = new Decoder($('#raw-save').val());

        app.save = (save.data === null) ? null : save.data;
    });
});
