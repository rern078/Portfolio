<?php
$seo = getSeoSettings();
$social_links = getSocialMediaLinks();
$current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<!DOCTYPE html>
<html lang="">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!-- PWA Meta Tags -->
      <meta name="theme-color" content="#06BBCC">
      <meta name="apple-mobile-web-app-capable" content="yes">
      <meta name="apple-mobile-web-app-status-bar-style" content="black">
      <meta name="apple-mobile-web-app-title" content="My Portfolio">
      <link rel="manifest" href="/manifest.json">
      <link rel="apple-touch-icon" href="/assets/users/img/pwa/icon-192x192.png">

      <!-- SEO Meta Tags -->
      <title><?php echo htmlspecialchars($seo['page_title']); ?></title>
      <meta name="description" content="<?php echo htmlspecialchars($seo['meta_description']); ?>">
      <meta name="keywords" content="<?php echo htmlspecialchars($seo['meta_keywords']); ?>">
      <meta name="robots" content="<?php echo htmlspecialchars($seo['robots_meta']); ?>">

      <!-- Canonical URL -->
      <?php if (!empty($seo['canonical_url'])): ?>
            <link rel="canonical" href="<?php echo htmlspecialchars($seo['canonical_url']); ?>">
      <?php else: ?>
            <link rel="canonical" href="<?php echo htmlspecialchars($current_url); ?>">
      <?php endif; ?>

      <!-- Open Graph Meta Tags -->
      <meta property="og:title" content="<?php echo htmlspecialchars($seo['og_title']); ?>">
      <meta property="og:description" content="<?php echo htmlspecialchars($seo['og_description']); ?>">
      <?php if (!empty($seo['og_image'])): ?>
            <meta property="og:image" content="<?php echo htmlspecialchars($seo['og_image']); ?>">
      <?php endif; ?>
      <meta property="og:url" content="<?php echo htmlspecialchars($current_url); ?>">
      <meta property="og:type" content="website">

      <!-- Twitter Card Meta Tags -->
      <meta name="twitter:card" content="<?php echo htmlspecialchars($seo['twitter_card']); ?>">
      <meta name="twitter:title" content="<?php echo htmlspecialchars($seo['twitter_title']); ?>">
      <meta name="twitter:description" content="<?php echo htmlspecialchars($seo['twitter_description']); ?>">
      <?php if (!empty($seo['twitter_image'])): ?>
            <meta name="twitter:image" content="<?php echo htmlspecialchars($seo['twitter_image']); ?>">
      <?php endif; ?>

      <!-- Social Media Links -->
      <?php if (!empty($social_links)): ?>
            <script type="application/ld+json">
                  {
                        "@context": "https://schema.org",
                        "@type": "Person",
                        "sameAs": [
                              <?php
                              $social_urls = array_map(function ($link) {
                                    return '"' . htmlspecialchars($link['url']) . '"';
                              }, $social_links);
                              echo implode(',', $social_urls);
                              ?>
                        ]
                  }
            </script>
      <?php endif; ?>

      <link href="assets/users/img/favicon.ico" rel="icon">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

      <link href="assets/users/lib/animate/animate.min.css" rel="stylesheet">
      <link href="assets/users/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
      <link href="assets/users/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
      <link href="assets/users/css/bootstrap.min.css" rel="stylesheet">
      <link href="assets/users/css/style.css" rel="stylesheet">

      <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
      <script src="assets/users/lib/wow/wow.min.js"></script>
      <script src="assets/users/lib/easing/easing.min.js"></script>
      <script src="assets/users/lib/waypoints/waypoints.min.js"></script>
      <script src="assets/users/lib/owlcarousel/owl.carousel.min.js"></script>
      <script src="assets/users/js/main.js"></script>
      <script src="assets/users/js/uigg.js"></script>

      <!-- PWA Service Worker Registration -->
      <script>
            if ('serviceWorker' in navigator) {
                  window.addEventListener('load', () => {
                        navigator.serviceWorker.register('/sw.js')
                              .then(registration => {
                                    console.log('ServiceWorker registration successful');
                              })
                              .catch(err => {
                                    console.log('ServiceWorker registration failed: ', err);
                              });
                  });
            }
      </script>
</head>