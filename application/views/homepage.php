<!DOCTYPE html>
<html itemscope itemtype="http://schema.org/WebPage">
 
<head>   
	<meta charset="UTF-8">
	<title>The Internet Board | An aggregrated feed of the internet</title>
	<meta name="description" content="Are you bored? Here is an infinite list of random links to keep you occupied. We aggregrate links from popular feeds and display them on a convenient infinite scrolling feed." />
	<meta name="keywords" content="bored,internet,feed,board,news,movies,sports,funny,music,technology,new,health,boredom,bored to death,bored at work,bored with life,bored at home,links,sites,websites,what to do,bored.com,infinite,scroll">

	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<!-- Google Authorship and Publisher Markup -->
	<!-- <link rel="author" href="https://plus.google.com/[Google+_Profile]/posts"/> -->
	<!-- <link rel="publisher" href="https://plus.google.com/[Google+_Page_Profile]"/> -->

	<!-- Schema.org markup for Google+ -->
	<meta itemprop="name" content="The Internet Board">
	<meta itemprop="description" content="Latest happenings online. We aggregrate the most popular feeds on the internet and conveniently display them on one board.">
	<meta itemprop="image" content="http://www.theinternetboard.com/img/TIB_logo.JPG">

	<!-- Twitter Card data -->
	<!-- <meta name="twitter:card" content="summary_large_image"> -->
	<!-- <meta name="twitter:site" content="@TIB_Tweets"> -->
	<meta name="twitter:title" content="The Internet Board">
	<meta name="twitter:description" content="Latest happenings online. We aggregrate the most popular feeds on the internet and conveniently display them on one board.">
	<meta name="twitter:creator" content="@TIB_Tweets">
	<!-- Twitter summary card with large image must be at least 280x150px -->
	<meta name="twitter:image:src" content="http://www.theinternetboard.com/img/TIB_logo.JPG">

	<!-- Open Graph data -->
	<meta property="og:title" content="The Internet Board" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="http://www.theinternetboard.com/" />
	<meta property="og:image" content="http://www.theinternetboard.com/img/TIB_logo.JPG" />
	<meta property="og:description" content="Latest happenings online. We aggregrate the most popular feeds on the internet and conveniently display them on one board." />
	<meta property="og:site_name" content="The Internet Board" />


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

* {
    transition: all .2s linear;
    -webkit-transition: all .2s linear;
    -moz-transition: all .2s linear;
    -o-transition: all .2s linear;
}
a {
    -webkit-transition: background-position 1ms linear;
    -moz-transition: background-position 1ms linear;
    -o-transition: background-position 1ms linear;
    transition: background-position 1ms linear;
}

body {
	background-color: #353535;
	color: #FFFFFF;
}

#header_container {
	width: 95%;
	margin: 0 auto;
}

#logo_text {
	font-size: 80px;
	font-weight: bold;	
	font-family: 'Yanone Kaffeesatz', sans-serif;
}

#main_container {
	width: 100%;
	margin: 0 auto;
	background-color: #fefefe;
	border-top: 5px solid #6193FF;
}

#tileBoard {
	display: block;
	/*margin: 5px auto;*/
	text-align: center;
	/*width: 80%;*/
}

.tileBoard-tile {
	display: inline-block;
	max-width: 300px;
	padding-bottom: 30px;
	border-bottom: 5px dashed #E8E8E8;
	margin: 10px;
	vertical-align: middle;
	color: #646464;
}
.tileBoard-tile img {
	width: 100%;
	background-color: #131313;
}
.tileBoard-tile .tile-img {
	height: 400px;
	-webkit-background-size: contain;
	-moz-background-size: contain;
	-o-background-size: contain;
	background-size: contain;
	background-repeat: no-repeat;
	background-position: center;
}
.tileBoard-tile .tile-title {
	font-size: 32px;
	font-weight: bold;
	padding: 5px;
	font-family: 'Yanone Kaffeesatz',sans-serif;
	overflow-y: hidden;
}
.tileBoard-tile .tile-footer {
	padding: 10px;
}

.tileBoard-tile .tile-footer p {
	font-family: 'Yanone Kaffeesatz', sans-serif;
	font-size: 20px;
}

.newContentCount {
	font-size: 13px;
}

.sub_logo {
	text-decoration: none;
}
.loadNewerItemsBtn {
	text-align: center;	
	margin: 10px 0px 20px;
}
.filterLabel {
	font-size: 14px;
}
.footerBar {
	position: fixed;
	bottom: 0;
	right: 0;
	padding: 20px 15px;
	left: 0;
	text-align: center;
	/*background-color: #efefef;*/
}

.footer_label {
	font-size: 14px;
}
.loadingIndicatorSection {
	text-align: center;
	padding: 10px 0px 100px;
}

/* Ads */
.ad-top-page {
	display: block;
	text-align:center;
}
.ad-side-bar-left {
	position: absolute;
	left: 0;
}
.ad-side-bar-right {
	position: absolute;
	right: 0;
}

@media (max-width: 1200px) {
}
@media (max-width: 1000px) {
	.ad-side-bar-left {
		display: none;
	}
	.ad-side-bar-right {
		display: none;
	}
	#tileBoard {
		width: 100%;
	}
}
@media (max-width: 800px) {
	#logo_text {
		font-size: 50px;
	}
	.ad-top-page {
		display: none;
	}
	.ad-side-bar-left {
		display: none;
	}
	.ad-side-bar-right {
		display: none;
	}
	#tileBoard {
		width: 100%;
	}
}
@media (max-width: 400px) {
	#logo_text {
		font-size: 35px;
	}
	.ad-top-page {
		display: none;
	}
	.ad-side-bar-left {
		display: none;
	}
	.ad-side-bar-right {
		display: none;
	}
	#tileBoard {
		width: 100%;
	}
}

</style>

<script id="templateTilesTemplate" type="text/x-handlebars-template">
	<div class='tileBoard-tile'> 
		<a target="_blank" href="/view/{{feed_link_pk}}" js-raw-link="{{link}}" class='' alt="{{title}}">
	    <div class="thumbnail">
	      <img src="{{image_url}}" alt="{{title}}">
	      <div class="caption">
	        <h3>{{title}}</h3>
	        <p>{{description}}</p>
	      </div>
			</div>
		</a>
		<!-- <a target="_blank" href="/view/{{feed_link_pk}}" js-raw-link="{{link}}" class='' alt="{{title}}">
			<div title="{{title}}" class="tile-title">{{title}}</div>
			<img src="{{image_url}}" alt="{{title}}" onerror="this.style.display = 'none'" />
		</a>
		<div class='tile-footer'>
			<p>
				{{description}}
			</p>
		</div> -->
	</div>
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-54777049-1', 'auto');
  ga('send', 'pageview');

</script>


<!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//analytics.rayantek.com/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', 1]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="//analytics.rayantek.com/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->

</head>
 
<body>

	<div id="header_container">

		<div class="row">
		  <div class="col-md-12">
				<span id="logo_text">TIB | The Internet Board</span>
				<p>
					<small>An aggregrated feed of the internet.</small> 
					<small><a href="https://www.facebook.com/theinternetboard">[ f ]</a></small>
					<small><a href="https://twitter.com/TIB_Tweets">[ t ]</a></small><br />

					<small>Visits: <?=$total_visits;?></small> |
					<small>Last Updated: <?=date(DATE_ATOM,strtotime($last_updated));?></small>
				</p>
		  </div>
		</div>

	</div>

	<div id="main_container">
		<!-- <div class="ad-top-page">
			<script type="text/javascript">
				var var1 = "728";
				var var2 = "90";
				var var3 = "728x90";
				var var4 = "11112";
				var var5 = "afcb7a2f1c158286b48062cd885a9866";
			</script>
			<script type="text/javascript" src="//cdn.adshexa.com/show_ads.php"></script>
		</div>
		<div class="ad-side-bar-left">
			<script type="text/javascript">
				var var1 = "160";
				var var2 = "600";
				var var3 = "160x600";
				var var4 = "11112";
				var var5 = "afcb7a2f1c158286b48062cd885a9866";
			</script>
			<script type="text/javascript" src="//cdn.adshexa.com/show_ads.php"></script>
		</div>

		<div class="ad-side-bar-right">
			<script type="text/javascript">
				var var1 = "160";
				var var2 = "600";
				var var3 = "160x600";
				var var4 = "11112";
				var var5 = "afcb7a2f1c158286b48062cd885a9866";
			</script>
			<script type="text/javascript" src="//cdn.adshexa.com/show_ads.php"></script>
		</div> -->

		<div class="loadNewerItemsBtn">
			<button id="updateListBtn" class="btn btn-success btn-md" onclick="loadNewerItems()" style="display:none;"> New Content <span class="badge newContentCount"></span> </button>
		</div>

		<section id="tileBoard">

		</section>

		<div class="loadingIndicatorSection">
			<img src="/img/ajax-loader.gif" alt="loading ..." />
		</div>

		<div class="footerBar" style="display:none;">
			<a href="#" class="scrollup btn btn-default"><i class="glyphicon glyphicon-arrow-up"></i>
				Jump to Top 
				<span class="footer_label badge badge-success newContentCount"></span>
			</a>
		</div>
	</div>

</body>
 
</html>
<script type="text/javascript">
// console.log('init script ...');
var first_id = 0;
var page_index = 0;
var load_more_busy = false;
var filter = '<?=$filter?>';

var footer_visible = false;

$(document).ready(function() {

	loadMore();

	window.onscroll = function(ev) {
		// console.log('scrolling ...');
	    if ((window.innerHeight + get_scroll_y()) >= (document.body.offsetHeight-500)) {
	        loadMore();
	    }
	    toggleFooterbar();
	};

	window.setInterval(function(){
		checkNewerItems();
	}, 15000);

	$('.scrollup').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
});

function toggleFooterbar() {

	if(footer_visible == false && get_scroll_y() > 300) {
		footer_visible = true;
		$('.footerBar').show();
		// console.log('+++showing footer! '+footer_visible);
	} else if(footer_visible == true && get_scroll_y() <= 300) {
		footer_visible = false;
		$('.footerBar').hide();
		// console.log('---hiding footer!');
	}

}


function checkNewerItems() {
	if(load_more_busy) {
		return;
	}

	// console.log('checking for newer items ...');
	var request_data = { filter_name:filter, first_item_id:first_id };
	$.get( '/has_new_items',request_data, function( data ) {
		data = JSON.parse(data);
		// console.log(data);
		if(data.response == 'true') {
			$('.newContentCount').html(data.count).fadeIn();
			$('#updateListBtn').show().fadeIn();
		}
	});
}

function loadNewerItems() {
	$('#updateListBtn').hide().fadeOut();
	page_index = 0;
	first_id = 0;
	$('.newContentCount').html('');
	$('#tileBoard').html('');
	loadMore();
}

function loadMore() {
	// console.log('loading more ...');

	if(load_more_busy) {
		return;
	}
	load_more_busy = true; 

	var request_data = { filter_name:filter, page_index_id:page_index, first_item_id:first_id };
	$.get( '/fetch_more', request_data, function( data ) {
		var source = $("#templateTilesTemplate").html();
		var template = Handlebars.compile(source);

		data = JSON.parse(data);

		$.each(data, function(key, val) {

			if(first_id == 0) {
				first_id = val.feed_link_pk;
			}
			// console.log(val.date_created);
			var context = val;
			var html = template(context);
			$('#tileBoard').append(html).fadeIn();

		});
		page_index++;
		load_more_busy = false;
	});

}

function get_scroll_y() {
	if(window) {
		return window.pageYOffset;
	}

	if(document.body) {
		return document.body.scrollTop;
	}

	if(document.html) {
		return document.html.scrollTop;
	}

	return 0;
}

</script>
