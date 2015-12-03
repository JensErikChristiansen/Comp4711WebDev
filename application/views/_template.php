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
        <!-- Theme -->
        <link rel="stylesheet" href="/css/custom.min.css">
        <!-- our own stuff -->
        <link rel="stylesheet" href="/css/app.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div id="header">
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">NFL</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li><a href="/">Home</a></li>
                        <li><a href="/league">Standings</a></li>
                        <li><a href="/roster">Your Roster</a></li>
                        <li><a href="/about">About</a></li>
                        <li><a href="/league/updateStandings">Update Standings</a></li>
                        <li><a href="/roster/editMode">Edit Mode <span class="badge">{EditMode}</span></a></li>
                        <li><a href="/welcome/updateScores">Update Scores History</a></li>
                    </ul>
                </div>
            </nav>
       </div>
       <div id="content">
            {content}
        </div>
    </body>
</html>
