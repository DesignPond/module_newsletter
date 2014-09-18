<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>Administration newsletter</title>

    <meta name="description" content="Administration newsletter">
    <meta name="author" content="Cindy Leschaud">
    <meta name="viewport" content="width=device-width">

    <!-- CSS Files
    ================================================== -->
    <link rel="stylesheet" href="<?php echo asset('css/main.css');?>">
    <link rel="stylesheet" href="<?php echo asset('css/bootstrap.css');?>">
    <link rel="stylesheet" href="<?php echo asset('js/vendor/redactor/redactor.css'); ?>">
    <link rel="stylesheet" href="<?php echo asset('js/vendor/redactor/newsletter.css'); ?>">
    <link href="<?php echo asset('js/vendor/jqueryui/jquery-ui.css');?>" rel="stylesheet">

    <base href="/">

</head>
<body>

<div class="container">

    <header>
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-default" role="navigation">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Brand</a>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="#">Link</a></li>
                                <li><a href="#">Link</a></li>
                            </ul>

                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            </div>
        </div>
    </header>

    <div id="main" ng-app="newsletter"><!-- main div for app-->

        <div id="bailNewsletter" class="row" ng-controller="BuildController as build">
            <div class="col-md-9">
                <div ng-controller="DropController as dropped" id="build" data-drop="true" data-jqyoui-options jqyoui-droppable="{onDrop:'dropped'}">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <image-left-text></image-left-text>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-2">
                <ul id="buildingBlocs">
                    <li buiding-blocs ng-repeat="bloc in build.blocs"></li>
                </ul>
            </div>
        </div>

    </div><!-- end main div for app-->

</div>

<!-- Javascript Files
================================================== -->

<script type="text/javascript" src="<?php echo asset('js/jquery.js');?>"></script>
<script type="text/javascript" src="<?php echo asset('js/bootstrap.min.js');?>"></script>
<script type="text/javascript" src="<?php echo asset('js/vendor/jqueryui/jquery-ui.js');?>"></script>
<script type="text/javascript" src="<?php echo asset('js/vendor/redactor/redactor.js');?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0-rc.1/angular.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular-route.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.1/angular-sanitize.js"></script>
<script type="text/javascript" src="<?php echo asset('js/vendor/angular/angular-dragdrop.js');?>"></script>
<script type="text/javascript" src="<?php echo asset('js/vendor/angular/angular-redactor.js');?>"></script>
<script type="text/javascript" src="<?php echo asset('js/main.js');?>"></script>

</body>
</html>