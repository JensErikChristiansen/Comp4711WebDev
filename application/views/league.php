<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<h1>The League</h1>
<table class="table">
	<tr>
		<td>Logo</td>
		<td><a href="/league/orderby/id">ID</a></td>
		<td><a href="/league/orderby/name">Name</a></td>
		<td><a href="/league/orderby/wins">Wins</a></td>
		<td><a href="/league/orderby/losses">Losses</a></td>
		<td>Ties</td>
		<td>League</td>
	</tr>
	{teams}
		<tr>
			<td><img src='/assets/data/img/{TeamLogo}' title='{TeamName}'></td>
			<td>{Code}</td>
                        <td><a href="{where}">{TeamName}</a></td>
			<td>{W}</td>
			<td>{L}</td>
			<td>{T}</td>
			<td>{League}</td>
		</tr>
	{/teams}
</table>