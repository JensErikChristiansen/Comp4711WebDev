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
        <button class="btn btn-primary btn btn-default" type="submit" id="Predict1">Call Ajax</button>
	{ResultsHeading}
    <div class="row">
		<div class="col-sm-6">
                <p id="meat"></p>
	    	{YourResults}
	    </div>
	    <div class="col-sm-6">
	    	{OpponentResults}
	    </div>
	</div>
</div>

<script src="/assets/js/predict.js"></script>
