<?php
?>
<table class="table">
	<tr>
		<td>Photo</td>
        <td>Number</td>
		<td>Name</td>
        <td>Position</td>
        <td>Status</td>
		<td>Height</td>
	</tr>
	{roster}
		<tr>
			<td><img src='{photo}' title='{name}'></td>
            <td>{No}</td>
			<td>{Name}</td>
			<td>{Pos}</td>
			<td>{Status}</td>
			<td>{Height}</td>
		</tr>
	{/roster}
</table>