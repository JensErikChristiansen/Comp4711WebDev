<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<h1>The League</h1>
<table>
	<tr>
		<td>Logo</td>
		<td>ID</td>
		<td>Name</td>
		<td>Wins</td>
		<td>Losses</td>
		<td>Ties</td>
	</tr>
	{teams}
		<tr>
			<td><img src='{logo}' title='{name}'></td>
			<td>{id}</td>
			<td>{name}</td>
			<td>{wins}</td>
			<td>{losses}</td>
			<td>{ties}</td>
		</tr>
	{/teams}
</table>