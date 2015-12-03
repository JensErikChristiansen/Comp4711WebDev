<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<div class="jumbotron shadow">
	<div class="container">
		<h1>Standings</h1>
	</div>
</div>

<div class="container">
	<!-- group-by drop-down -->
	<div class="btn-group">
		<a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
			Group By<span class="caret"></span>
		</a>
		<ul class="dropdown-menu">
			<li><a href="/league/groupBy/LEAGUE">League</a></li>
			<li><a href="/league/groupBy/CONFERENCE">Conference</a></li>
			<li><a href="/league/groupBy/DIVISION">Division</a></li>
		</ul>
	</div><!-- end group-by drop down -->
	{thetable}
</div> <!-- end .container -->

<!-- <table class="table">
	<tr>
		<th>Logo</th>
		<th><a href="/league/orderBy/id">ID</a></th>
		<th><a href="/league/orderBy/name">Name</a></th>
		<th><a href="/league/orderBy/wins">Wins</a></th>
		<th><a href="/league/orderBy/losses">Losses</a></th>
		<th>Ties</th>
		<th>League</th>
	</tr>
	{teams}
		<tr>
			<td><img src='/assets/data/img/{TeamLogo}' title='{TeamName}'></td>
			<td>{Code}</td>
                        <td><a href="{SiteURL}">{TeamName}</a></td>
			<td>{W}</td>
			<td>{L}</td>
			<td>{T}</td>
			<td>{League}</td>
		</tr>
	{/teams}
</table> -->