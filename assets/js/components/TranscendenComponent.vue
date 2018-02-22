<template>
    <div class="col-sm-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                Transcendens {{ trans.id }}
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
                            <td>{{ ascension.endTime - ascension.startTime }}</td>
                            <td>{{ ascension.highestZoneEver }}</td>
                            <td>{{ ascension.heroSoulsEnd }}</td>
                        </tr>
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
    export default {
        props: ['trans']
    }
</script>