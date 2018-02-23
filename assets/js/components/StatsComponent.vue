<template>
    <center>
        <p>Your first click was {{ getPlayed(save) }} ago.</p>
    </center>
</template>

<script type="text/javascript">
    export default {
        props: ['save'],
        methods: {
            getPlayed: function (save) {
                let startTime = save.stats.transcensions[Object.keys(save.stats.transcensions)[0]].startTime;
                let message = '';

                let time = ((new Date).getTime() - startTime) / 1000;

                let year = Math.floor(time / 31557600);
                time -= year * 31557600;
                if (year > 0) {
                    message += year + ' year' + ((year == 1) ? ',' : 's,');
                }

                let day = Math.floor(time / 86400);
                time -= day * 86400;
                if (year > 0 || day > 0) {
                    message += ' ' + day + ' day' + ((day == 1) ? ',' : 's,');
                }

                let hour = Math.floor(time / 3600);
                time -= hour * 3600;
                if (year > 0 || day > 0 || hour > 0) {
                    message += ' ' + hour + ' hour' + ((hour == 1) ? ',' : 's,');
                }

                let min = Math.floor(time / 60);
                return message.length == 0 ? min + ' minutes' : message + ' and ' + min + ' minute' + ((min == 1) ? '' : 's');
            }
        }
    }
</script>