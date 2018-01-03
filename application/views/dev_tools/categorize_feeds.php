<head>   
	<title>Dev Tool - Catagorize Feed</title>

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
.filterCheckboxLink {
	padding: 10px;
}
</style>

</head>
 
<body>

	<div id="header_container">
		<h1>Categorize Feeds Tool</h1>
	</div>

	<div id="main_container">

		<?foreach ($feeds as $feed_row):?>

			<?
				$id = md5($feed_row['feed_pk']);
			?>

			<br />
			<h4><?=$feed_row['url']?></h4>
			<p>
				<?foreach ($filters as $filter_row):?>
					<?if(
					     isset($filters_by_feed[$feed_row['feed_pk']]) &&
					     in_array($filter_row['name'], $filters_by_feed[$feed_row['feed_pk']])
					) {
						$check = "checked='checked'";
					} else {
						$check = "";
					}?>

					<span class="filterCheckboxLink">
						<input class="<?=$id?>_filterbox" type="checkbox" <?=$check?> name="" value="<?=$filter_row['name']?>"><?=$filter_row['name']?> 
					</span>

				<?endforeach;?>

			</p>
			<p>
				<button class="updateBtn btn btn-success" 
						data-section-id="<?=$id?>"
						data-checkboxes="<?=$id?>_filterbox"
						data-feed-pk="<?=$feed_row['feed_pk']?>"
				>UPDATE</button>
			</p>
			<br />
			<br />

		<?endforeach;?>

	</div>

</body>
 
</html>

<script type="text/javascript">
$(document).ready(function() {

	$('.updateBtn').click(function() {

		var id = $(this).attr('data-section-id');
		var checkboxes_class = $(this).attr('data-checkboxes');
		var $checked_items = $('.'+checkboxes_class+':checked');
		var feed_pk = $(this).attr('data-feed-pk');
		var selected_filter_list = [];

		$checked_items.each(function() {
			selected_filter_list.push(this.value);
		});

		var request_data = { feed_fk:feed_pk,selected_filters:selected_filter_list };
		$.post('/dev_tools/update_filters_with_feed_fk',request_data,function(data) {
			console.log("updated >>> "+feed_pk);
			console.log(selected_filter_list);
		});

	});


});
</script>
