<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width">

    <title>Clicker Heroes Transcendens Statistics</title>

    <link rel="stylesheet" type="text/css" href="https://bootswatch.com/3/darkly/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="css/app.css">
    <script type="text/javascript" src="js/app.js"></script>
</head>
<body>

    <div class="container">
        <!-- Start: Header -->
        <div class="row header">
            <div class="col-sm-12">
                <h1 class="text-center page-title">
                    Clicker Heroes Transcendens Statistics
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
                        <input type="text" class="form-control" id="raw-save" onfocus="this.select()">
                    </div>
                </div>
            </div>
        </div>
        <!-- End: Save Panel -->

        <!-- Start: Content Panel -->
        <?php foreach(range(5, 1) as $asNum): ?>
        <div class="row content">
            <div class="col-sm-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Ascension #<?php echo $asNum; ?>
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
                                <?php foreach(range(0, 5) as $num): ?>
                                    <tr>
                                        <th><?php echo $num ?></th>
                                        <td>12:34:56</td>
                                        <td>12345</td>
                                        <td>1.234e56789</td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table> 
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <!-- End: Content Panel -->

        <!-- Start: Footer -->
        <footer>
            <div class="row">
                <div class="col-sm-12">
                    <p>Created by <a target="blank" href="https://senither.com">Alexis Tan</a>, powered by <a target="blank" href="https://m.do.co/c/9f589c4101c3">DigitalOcean</a>, &amp; <a target="blank" href="http://getbootstrap.com/">Bootstrap</a> &amp; <a href="https://bootswatch.com/darkly/">Darkly Theme</a> by <a href="http://thomaspark.co">Thomas Park</a></p>
                    <p>Code released under the <a href="https://github.com/Senither/CH-Trans-Stats/blob/master/LICENSE.md">MIT License</a>, get the code on <a href="https://github.com/Senither/CH-Trans-Stats"><span class="fa fa-github"></span> GitHub</a></p>
                </div>
            </div>
        </footer>
        <!-- End: Footer -->
    </div>

</body>
</html>