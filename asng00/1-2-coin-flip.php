<style>
	.coin {
		background: #999999;
		color: #333333;
		border-radius: 50%;
		padding: 50px;
		text-align: center;
		font-size: 2rem;
		font-weight: bold;
		width: 50px;
	}
</style>

<?php

function flip() {

  $coin = rand(0,1);
	if($coin == 1)
    return "heads.";
  else
    return "tails.";
}

?>

<div class="coin">
	<?php echo flip(); ?>
</div>