<?php

	// todo:
	// learn more area button
	// fix progres bar
	// ml or oz
	$pro = true;
	$winnerOne = "";
	$aTotal = "";
	$msg = "";
	$aBad = "";
	$aMed = "";
	$aGood = "";
	$aGreat = "";
	$aExcel = "";
	$decide = 2;
	if(isset($_POST['reset'])){
		unset($_POST);
	}
	if(isset($_POST['compare'])){
		foreach ($_POST as $key) {
			if($key == ""){
				$pro = false;
			}
		}
		if($pro){
			$aTotal = ($_POST["drinkQuan"] * $_POST["drinkPercentage"] * $_POST['drinkSize']);
			$aTotal = round(($aTotal / $_POST["drinkPrice"]));
			$msg = "This reads ". $aTotal . " on the alculator.";
			$decide = 1;
		}else{
			$msg = "Please fill out all of the sections.";
			$decide = 0;
		}
	}
?>

    <!DOCTYPE html>
    <html>

    <head>

        <title>The Alculator</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.min.js"></script>

    </head>

    <body>

        <div class="container">

            <h1 class="text-center">THE ALCULATOR</h1>
            <!-- <h2 class="text-center"><small><p>Get the most <em>bang for your buck</em>.</p></small></h2> -->

            <div class="row text-center">
                <div class="drink_border drink show">
                <?php
					if ($aTotal >= 0) :
					?>
                        <!-- <div class="meter progress">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $aTotal/10 ?>%">
                            </div>
                        </div> -->
                <?php endif; ?>

                <?php if ($decide == 0) : ?>
                    <div class="alert alert-danger">
                        <p>
                            <?php echo "$msg"; ?>
                        </p>
                    </div>
                <?php elseif ($decide == 1) : ?>
                    <div class="alert alert-info">
                        <p>
                            <?php echo "$msg"; ?>
                        </p>
                    </div>
                <?php endif; ?>

                    <div>
                        <form action="index.php" method="post">
                            <div class="form-group">
                                <label for="drinkQuan">Number of bottles</label>
                                <input type="drinkQuan" class="form-control" name="drinkQuan" value="<?php echo isset($_POST['drinkQuan']) ? $_POST['drinkQuan'] : '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="drinkSize">Bottle Size (ml)</label>
                                <input type="drinkSize" class="form-control" name="drinkSize" value="<?php echo isset($_POST['drinkSize']) ? $_POST['drinkSize'] : '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="bottlePercentage">Percentage</label>
                                <input type="drinkPercentage" class="form-control" name="drinkPercentage" value="<?php echo isset($_POST['drinkPercentage']) ? $_POST['drinkPercentage'] : '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="drinkPrice">Price ($)</label>
                                <input type="drinkPrice" class="form-control" name="drinkPrice" value="<?php echo isset($_POST['drinkPrice']) ? $_POST['drinkPrice'] : '' ?>">
                            </div>
                            <div class="compare">
                                <input type="submit" name="compare" value="Alculate" class="btn btn-primary submit btn-lg btn-block">
                                <input type="submit" id="reset" name="reset" value="Reset" class="btn btn-default submit btn-lg btn-block">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
			<div class="footer">
				<a href="#" class="what" id="what">What is this?</a>
				<p style="display: none" id="caption" class="caption">The <strong>Alculator's</strong> purpose is to give you the most bang for your buck.<br>
					If you're a university student on a budget, you may find this helpful.<br>An <em>ideal</em> alculation number is around <strong>1000</strong>.<br>The higher the number, the better.<br><br>
					This application was inspired by my frugal roomate.<br>I have to credit him for creating the formula. So thank you, YZ, I hope you find this useful.
					</p>

				<script>
				//	var what = document.getElementById('what');
					$("#what").click(function(){
						$("#caption").show("slow");
					});
				</script>
			</div>
        </div>
    </body>
    </html>
