<template>
    <div class="col-sm-12">
        <div @click="toggle()" class="panel panel-info">
            <table class="table">
                <thead class="panel-title">
                    <tr style="text-align: center;">
                        <th style="width: 25%;">Transcension #{{ trans.id }}</th>
                        <th style="width: 20%;">{{ formatTime(trans.endTime - trans.startTime) }}</th>
                        <th style="width: 20%">{{ formatNumber(trans.highestZoneEver) }}</th>
                        <th style="width: 20%">{{ formatHeroSouls(trans.heroSoulsGained) }}</th>
                        <th style="width: 15%">{{ formatNumber(trans.numAscensions) }}</th>
                    </tr>
                </thead>
            </table>
            <div v-show="isOpen" class="panel-body">
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
                        <tr v-for="ascension in trans.ascensions" v-if="ascension.highestZoneEver > 0">
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
        data: function () {
            return {
                isOpen: false
            }
        },
        methods: {
            toggle: function () {
                this.isOpen = !this.isOpen;
            },
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