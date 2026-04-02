<?php
declare(strict_types=1);

// ================== AUTO DETECT BASE URL ==================
$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host   = $_SERVER['HTTP_HOST'];
$path   = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');

$baseUrl = $scheme . '://' . $host . '/'; // root domain clean URL

// ================== LOAD BRAND ==================
$file = __DIR__ . "/lol.txt";
if (!file_exists($file)) {
    die("File lol.txt tidak ditemukan");
}

$brands = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$brands = array_map('trim', $brands);

// ================== BUILD XML ==================
$xml  = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
$xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

foreach ($brands as $brand) {
    // Clean URL selalu pakai trailing slash
    $url = $baseUrl . urlencode($brand) . '/';

    $xml .= "  <url>" . PHP_EOL;
    $xml .= "    <loc>" . htmlspecialchars($url) . "</loc>" . PHP_EOL;
    $xml .= "    <lastmod>" . date('Y-m-d') . "</lastmod>" . PHP_EOL;
    $xml .= "  </url>" . PHP_EOL;
}

$xml .= '</urlset>';

// ================== SIMPAN KE FILE ==================
$fileSitemap = __DIR__ . "/sitemap_007.xml";
if (file_put_contents($fileSitemap, $xml) === false) {
    die("Gagal menulis sitemap_007.xml (cek permission folder)");
}

// ================== OPSIONAL: BUAT robots.txt ==================
$robots  = "User-agent: *" . PHP_EOL;
$robots .= "Allow:" . PHP_EOL;

$fileRobots = __DIR__ . "/robots.txt";
file_put_contents($fileRobots, $robots);

// ================== OUTPUT KE BROWSER ==================
header('Content-Type: application/xml; charset=utf-8');
echo $xml;
?>
