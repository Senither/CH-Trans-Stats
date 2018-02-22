<template>
    <div class="col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                Transcension #{{ trans.id }}
            </div>
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Ascension #</th>
                            <th>Duration</th>
                            <th>HZE</th>
                            <th>HS Gained</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="ascension in trans.ascensions">
                            <th>{{ ascension.id }}</th>
                            <td>{{ formatTime(ascension.endTime - ascension.startTime) }}</td>
                            <td>{{ formatNumber(ascension.highestZoneEver) }}</td>
                            <td>{{ formatHeroSouls(ascension.heroSoulsEnd) }}</td>
                        </tr>
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
    export default {
        props: ['trans'],
        methods: {
            formatNumber: function (number) {
                return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            },
            formatHeroSouls: function (heroSouls) {
                if (heroSouls.indexOf('e') === -1) {
                    return Math.floor(heroSouls).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                }

                let parts = heroSouls.split('e');
                let number = parts[0].split('.');
                return number[0] + '.' + number[1].substring(0, 4) + 'e' + parts[1];
            },
            formatTime: function (time) {
                time = time / 1000;
                let day = Math.floor(time / 86400);

                time -= day * 86400;
                let hour = Math.floor(time / 3600);

                time -= hour * 3600;
                let min = Math.floor(time / 60);

                return (((day == 0) ? "" : (day + "d ")) + ((hour == 0) ? "" : (hour + "h ")) + min + "m");
            }
        }
    }
</script>