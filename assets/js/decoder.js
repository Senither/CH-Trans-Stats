const crypto = require('crypto');
const pako = require('pako');

class Decoder {
    /**
     * Takes in the save as a string, creating the
     * Decoder instance and preparing it for use.
     *
     * @param  {string} save
     */
    constructor(save) {
        this.isDecoded = false;
        this.save = save;
    }

    /**
     * Decodes the save, converting it from it's hashed
     * state into a readable JSON object.
     *
     * @return {void}
     */
    decode() {
        if (this.save.indexOf('Fe12NAfA3R6z4k0z') === -1) {
            try {
                this.save = JSON.parse(
                    pako.inflate(
                        Buffer.from(this.save.slice(32), 'base64'),
                        {to: 'string'}
                    )
                );
            } catch (ignored) {
                return null;
            }

            this.isDecoded = true;
            return this.save;
        }

        let result = this.save.split('Fe12NAfA3R6z4k0z');
        let txt = '';

        for (let i = 0; i < result[0].length; i += 2) {
            txt += result[0][i];
        }

        this.save = JSON.parse(Buffer.from(this.save, 'base64'));
        this.isDecoded = true;

        return this.save;
    }

    /**
     * This is the getter for interacting with the decoded save, if the save haven't
     * been decoded yet the method will decode it before turning the result.
     *
     * @return {object}
     */
    get data() {
        if (!this.isDecoded) {
            return this.decode();
        }
        return this.save;
    }
}

module.exports = Decoder;
