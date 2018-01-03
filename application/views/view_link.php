<!DOCTYPE html>
<html>
<head>
  <title>TIB | <?=$tileData['title']?></title>
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
<style type="text/css">
body {
  scrolling:no;
  width:100% ;
  height:100% ;
}
#top-bar {
  position: relative;
  height: 50px;
  width: 100%;
  background-color: #232323;
  color: #FFFFFF;
  padding: 10px;
  overflow-x: hidden;
}
div#embeded-content {
  position: fixed;
  height: 100%;
  width: 100%;
}
iframe {
  display: block;
  width: 100%;
  height: 100%;
  border: none;
}
body {
  margin: 0px;
}
#top-bar-left-side {
  font-size: 20px;
  font-weight: bold;
  font-family: 'Yanone Kaffeesatz', sans-serif;
}
</style>
</head>
<body>
<div id="top-bar" class="container">
  <div class="row">
    <div id='top-bar-left-side' class="col-xs-6">
      <span id="logo_text"><a href="/">TIB | The Internet Board</a></span>
    </div>
    <div class="col-xs-6" style="text-align: right">
      <span>
        <a href="<?=$tileData['link']?>" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> <?=$tileData['hostname']?></a>
      </span>    
    </div>
  </div>
  
</div>
<div id="embeded-content">
  <iframe src="<?=$tileData['link']?>"><a href="<?=$tileData['link']?>">Not working? Click here.</a></iframe>
</div>

</body>
</html>