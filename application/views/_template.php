<!DOCTYPE html>
<!--

Authors:  Pair programming Rosanna and Nadia
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>{pagetitle}</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div id="header">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <ul class="nav navbar-nav">
                        <li><a href="/">Home</a></li>
                        <li><a href="/league">League</a></li>
                        <li><a href="/roster">Roster</a></li>
                        <li><a href="/about">About</a></li>
                        <li><a href="/roster/editMode">Edit Mode</a></li>
                    </ul>
                </div>
            </nav>
       </div>
       <div id="content">
            <div class="container">
             {content}
            </div>
        </div>
    </body>
</html>
