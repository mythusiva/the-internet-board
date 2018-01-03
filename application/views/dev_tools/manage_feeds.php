<head>   
	<title>Dev Tool - Manage Feeds</title>

	<!-- // <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.map"></script> -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<!-- Optional theme -->
	<!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css"> -->
	<!-- Latest compiled and minified JavaScript -->
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css">
	
	<script src="//cdn.jsdelivr.net/handlebarsjs/2.0.0/handlebars.min.js"></script>

	<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700' rel='stylesheet' type='text/css'>

<style>
body {
	padding: 10px 20px;
}
#newFeedInpt {
	width: 800px;
}
</style>

</head>
 
<body>

	<div id="header_container">
		<h1>Manage Feeds Tool</h1>
	</div>

	<div id="main_container">

		<div class="input-group input-group-lg">
			<input id="newFeedInpt" type='text' class="form-control" width="250" />
		</div>
		<p>
			<br />
			<button class="addBtn btn btn-success" 
			>ADD FEED</button>
		</p>

		<?foreach ($feeds as $feed_row):?>

			<?
				$id = md5($feed_row['feed_pk']);
			?>

			<br />
			<h4><?=$feed_row['url']?></h4>
			<p>
				<?if($feed_row['is_enabled'] === '1'):?>
					<button class="disableBtn btn btn-danger" 
							data-section-id="<?=$id?>"
							data-feed-pk="<?=$feed_row['feed_pk']?>"
					>DISABLE</button>
				<?else:?>
					<button class="enableBtn btn btn-success" 
							data-section-id="<?=$id?>"
							data-feed-pk="<?=$feed_row['feed_pk']?>"
					>ENABLE</button>
				<?endif;?>
			</p>
			<br />
			<br />

		<?endforeach;?>

	</div>

</body>
 
</html>

<script type="text/javascript">
$(document).ready(function() {

	$('.addBtn').click(function() {
		var feed_link = $('#newFeedInpt').val();
		var request_data = { feed_link:feed_link };
		$.post('/dev_tools/add_feed',request_data,function(data) {
			$('#newFeedInpt').val("");
			console.log("added feed >>> "+feed_link);
		});
		
	});

	$('.enableBtn').click(function() {

		var id = $(this).attr('data-section-id');
		var feed_pk = $(this).attr('data-feed-pk');

		var request_data = { feed_fk:feed_pk };
		$.post('/dev_tools/enable_feed',request_data,function(data) {
			console.log("enabled >>> "+feed_pk);
		});

	});

	$('.disableBtn').click(function() {

		var id = $(this).attr('data-section-id');
		var feed_pk = $(this).attr('data-feed-pk');

		var request_data = { feed_fk:feed_pk };
		$.post('/dev_tools/disable_feed',request_data,function(data) {
			console.log("disabled >>> "+feed_pk);
		});

	});


});
</script>
