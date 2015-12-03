{Scores}
<p> {id} {date} {code} {opponentCode} {score1} {score2} </p>
{/Scores}
<div class="jumbotron shadow">
	<div class="container">
	    <h1>NFL Predictor</h1>
    </div>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-6 text-center">
			<h4>Your Team: Steelers</h4>
		</div>
	    <form class="col-sm-6 text-center" name="predictionForm" id="predictionForm" action="/welcome/predict" method="post">
			<select id="codeSelect" name="codeSelect" style="width: 15em; margin-right: 20px;">
				{Codes}
					<option value="{Code}">{Code} - {TeamName}</option>
				{/Codes}
			</select>
			{Submit}
	    </form>
	</div> <!-- end row -->
	<h3 class="text-center">VS</h3>
	{ResultsHeading}
    <div class="row">
		<div class="col-sm-6">
	    	{YourResults}
	    </div>
	    <div class="col-sm-6">
	    	{OpponentResults}
	    </div>
	</div>
</div>
