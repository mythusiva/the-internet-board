<?header('Content-type: text/xml');?>
<?='<?xml version="1.0" encoding="UTF-8" ?>'?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">    
	<url>
        <loc><?=base_url();?></loc> 
        <priority>1</priority>
        <changefreq>always</changefreq>
    </url>
    <?foreach($uris as $uri): ?>
    <url>
        <loc><?=base_url().$uri['uri']?></loc>
        <changefreq><?=$uri['changefreq']?></changefreq>
        <priority><?=$uri['priority']?></priority>
    </url>
    <?endforeach;?>
</urlset>