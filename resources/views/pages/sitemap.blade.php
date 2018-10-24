<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

<url>
  <loc>{{url("/")}}</loc>
  <lastmod>2018-07-11</lastmod>
  <changefreq>monthly</changefreq>
  <priority>1.0</priority>
</url>

@foreach($pages as $page)
   <url>
      <loc>{{url("/")."/".$page->slug}}</loc>
      <lastmod>{{$page->updated_at->format('Y-m-d')}}</lastmod>
      <changefreq>monthly</changefreq>
      <priority>0.9</priority>
   </url>
 @endforeach

<url>
  <loc>{{url("/")}}/contact-us</loc>
  <lastmod>2018-07-11</lastmod>
  <changefreq>monthly</changefreq>
  <priority>0.8</priority>
</url>

<url>
  <loc>{{url("/")}}/faq</loc>
  <lastmod>2018-07-11</lastmod>
  <changefreq>monthly</changefreq>
  <priority>0.8</priority>
</url>

<url>
  <loc>{{url("/")}}/reviews</loc>
  <lastmod>2018-07-11</lastmod>
  <changefreq>monthly</changefreq>
  <priority>0.8</priority>
</url>

<url>
  <loc>{{url("/")}}/register</loc>
  <lastmod>2018-07-11</lastmod>
  <changefreq>monthly</changefreq>
  <priority>0.9</priority>
</url>

<url>
  <loc>{{url("/")}}/login</loc>
  <lastmod>2018-07-11</lastmod>
  <changefreq>monthly</changefreq>
  <priority>0.9</priority>
</url>

</urlset> 
