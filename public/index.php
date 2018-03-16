<?php require_once __DIR__ . '/../vendor/autoload.php' ?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width">

    <title>Clicker Heroes Transcensions History</title>

    <link rel="stylesheet" type="text/css" href="https://bootswatch.com/3/darkly/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo mix('css/app.css'); ?>">
    <script type="text/javascript" src="<?php echo mix('js/app.js'); ?>"></script>
</head>
<body>

    <div id="app" class="container">
        <!-- Start: Header -->
        <div class="row header">
            <div class="col-sm-12">
                <h1 class="text-center page-title">
                    Clicker Heroes Transcensions History
                    <span class="badge badge-danger">BETA</span>
                </h1>
            </div>
        </div>
        <!-- End: Header -->

        <!-- Start: Save Panel -->
        <div class="row save">
            <div class="col-sm-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Enter your save below
                    </div>
                    <div class="panel-body form-group">
                        <input type="text" class="form-control" id="raw-save" placeholder="Enter your save here to view your transcensions history" onfocus="this.select()">
                    </div>

                    <div class="panel-body mobile-info hidden-xs hidden-sm" v-if="save === null">
                        <center>
                            <p>
                                If you're playing on a mobile device you can scan the QR code below to open the app on the device.
                                <br>This message will disappear once a valid save has been entered into the input field above.
                            </p>
                            <img src="<?php echo mix('img/qr-code.png'); ?>">
                        </center>
                    </div>

                    <div class="panel-body mobile-info" v-if="save !== null">
                        <stats :save="save"></stats>
                    </div>
                </div>
            </div>
        </div>
        <!-- End: Save Panel -->

        <div v-if="save !== null && hasTranscend()">
            <div class="row" style="margin-bottom: 12px;">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr style="text-align: center;">
                                <th style="width: 25%;">Transcension #</th>
                                <th style="width: 20%;">Duration</th>
                                <th style="width: 20%">HZE</th>
                                <th style="width: 20%">HS Gained</th>
                                <th style="width: 15%">Ascensions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

            <div class="row content" v-for="trans in save.stats.transcensions">
                <transcensions :trans="trans"></transcensions>
            </div>
        </div>

        <div v-if="save !== null && !hasTranscend()">
            <div class="row content">
                <div class="col-sm-12">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            Maybe ascend before you know... Use a transcensions/ascensions displayer thingy
                        </div>
                        <div class="panel-body">
                            <p>Whoops, it doesn't look like you have transcended or ascended yet, we can't display information that isn't there, try ascend and then reimport your save to view your transcensions history.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start: Footer -->
        <footer>
            <div class="row">
                <div class="col-sm-12">
                    <p>Created by <a target="blank" href="https://senither.com">Alexis Tan</a>, powered by <a target="blank" href="https://m.do.co/c/9f589c4101c3">DigitalOcean</a>, &amp; <a target="blank" href="http://getbootstrap.com/">Bootstrap</a> &amp; <a href="https://bootswatch.com/darkly/">Darkly Theme</a> by <a href="http://thomaspark.co">Thomas Park</a></p>
                    <p>Code released under the <a href="https://github.com/Senither/ch-transcensions-history/blob/master/LICENSE.md">MIT License</a>, get the code on <a href="https://github.com/Senither/ch-transcensions-history"><span class="fa fa-github"></span> GitHub</a></p>
                </div>
            </div>
        </footer>
        <!-- End: Footer -->
    </div>

</body>
</html>
