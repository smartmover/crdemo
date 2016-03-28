<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>CR Demo</title>

    <!-- minified css -->
    <link href="/css/all.css" rel="stylesheet">
    <base href="/">
  </head>

  <body ng-app="crApp" ng-cloak>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">CR</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li ui-sref-active="active"><a ui-sref="home">Home</a></li>
            <li ui-sref-active="active"><a ui-sref="add">Add</a></li>
            <li ui-sref-active="active"><a ui-sref="list">List</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

        <div ui-view class="container"></div>

    <!-- compiled jc -->
    <script src="/js/all.js"></script>

  </body>
</html>


