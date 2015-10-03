<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<h1>Steelers Roster</h1>
<table class="table">
	<tr>
		<td>Photo</td>
                <td>Team</td>
                <td>Number</td>
		<td>Name</td>
                <td>Position</td>
		<td>Age</td>
		<td>Height</td>
	</tr>
	{rost}
		<tr>
			<td><img src='{photo}' title='{name}'></td>
                        <td>{team}</td>
                        <td>{num}</td>
			<td>{name}</td>
			<td>{position}</td>
			<td>{age}</td>
			<td>{height}</td>
		</tr>
	{/rost}
</table>