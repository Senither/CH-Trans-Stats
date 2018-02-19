const $ = require('jquery');
const Decoder = require('./decoder');

$(() => {
    $('#raw-save').on('change', () => {
        let save = new Decoder($('#raw-save').val());

        // This logs the current ascension, current transcension and old transcension data
        if (save.data !== null) {
            console.log(save.data.stats);
        }
    });
});
