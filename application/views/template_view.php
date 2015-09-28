<!DOCTYPE html>
<html data-ng-app="formApp" lang="ru">
<head>
    <meta charset="utf-8">
    <title>Главная</title>

    <style>
        body {
            background: goldenrod;
        }

        [ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak {
            display: none;
        }
    </style>
</head>
<body data-ng-controller="formController">
<?php include 'application/views/' . $content_view; ?>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular-sanitize.js"></script>
<script src="/search_module/js/main.js"></script>
</body>
</html>

