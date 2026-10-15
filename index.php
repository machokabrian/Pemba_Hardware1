<?php
// include 'includes/load_env.php';

function e($v) { return htmlspecialchars($v, ENT_QUOTES, 'UTF-8'); }

$phone_display = '+254 740 884 932';
$phone_tel     = '+254740884932';
$whatsapp_num  = '254740884932';
$address       = 'Kombi Munyiri Road, Nairobi';

// Categories: replace slugs with your real ones (products.php?category=slug)
$categories = [
  ['slug' => 'power-tools',   'name' => 'Power tools',        'icon' => '⚡'],
  ['slug' => 'hand-tools',    'name' => 'Hand tools',         'icon' => '🔨'],
  ['slug' => 'building',      'name' => 'Building materials', 'icon' => '🧱'],
  ['slug' => 'paint',         'name' => 'Paint & finishing',  'icon' => '🎨'],
  ['slug' => 'plumbing',      'name' => 'Plumbing',           'icon' => '🚰'],
  ['slug' => 'electrical',    'name' => 'Electrical',         'icon' => '💡'],
  ['slug' => 'fasteners',     'name' => 'Nails, screws & fittings', 'icon' => '🔩'],
  ['slug' => 'safety',        'name' => 'Safety gear',        'icon' => '🦺'],
];

// Featured products: swap this array for a database query later.
// 'image' is optional; a placeholder shows if the file is missing.
$products = [
  ['id' => 1, 'name' => 'Claw hammer 16oz',         'price' => 650,  'old' => 800,  'image' => 'assets/images/products/hammer.jpg',  'tag' => 'Sale'],
  ['id' => 2, 'name' => 'Cordless drill 18V',       'price' => 6800, 'old' => null, 'image' => 'assets/images/products/drill.jpg',   'tag' => 'Popular'],
  ['id' => 3, 'name' => 'Steel tape measure 5m',    'price' => 350,  'old' => null, 'image' => 'assets/images/products/tape.jpg',    'tag' => ''],
  ['id' => 4, 'name' => 'Wall paint 4L, white',     'price' => 1950, 'old' => 2200, 'image' => 'assets/images/products/paint.jpg',   'tag' => 'Sale'],
];

$wa_link = fn($text) => 'https://wa.me/' . $whatsapp_num . '?text=' . rawurlencode($text);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>PembaHardware | Tools &amp; Building Materials in Nairobi</title>
  <meta name="description" content="Shop tools, building materials and fittings at PembaHardware, Nairobi. Affordable prices, WhatsApp ordering and delivery." />
  <meta name="keywords" content="hardware, tools, Nairobi, pemba hardware, construction materials, Kenya" />
  <meta name="author" content="PembaHardware" />
  <meta name="theme-color" content="#FFC400" />

  <!-- Social sharing -->
  <meta property="og:type" content="website" />
  <meta property="og:title" content="PembaHardware | Tools & Building Materials in Nairobi" />
  <meta property="og:description" content="Quality hardware at fair prices. Order online or on WhatsApp." />
  <meta property="og:image" content="assets/images/og-image.jpg" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@600;700;800&family=Barlow:wght@400;500;600&display=swap" rel="stylesheet" />

  <!-- Styles -->
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="home.css" />
  <link rel="icon" href="assets/images/favicon.png" type="image/png" />

  <!-- Local business data for Google -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "HardwareStore",
    "name": "PembaHardware",
    "telephone": "<?= e($phone_tel) ?>",
    "address": { "@type": "PostalAddress", "streetAddress": "Kombi Munyiri Road", "addressLocality": "Nairobi", "addressCountry": "KE" }
  }
  </script>
</head>
<body class="home">

<a class="skip-link" href="#main">Skip to content</a>

<?php include 'includes/header.php'; ?>

<main id="main" role="main">

  <!-- HERO -->
  <section class="hero" aria-labelledby="hero-title">
    <div class="wrap hero-grid">
      <div class="hero-copy">
        <h1 id="hero-title">Everything you need to build, fix and finish.</h1>
        <p class="hero-sub">Tools, materials and fittings from a Nairobi hardware store you can call, WhatsApp or visit.</p>

        <form class="search" action="products.php" method="get" role="search">
          <label for="hero-search" class="sr-only">Search products</label>
          <input id="hero-search" type="search" name="q" placeholder="Search cement, drill, paint, pipes…" autocomplete="off" />
          <button type="submit" class="btn btn-dark">Search</button>
        </form>

        <p class="quick">
          Popular:
          <a href="products.php?q=cement">Cement</a>
          <a href="products.php?q=paint">Paint</a>
          <a href="products.php?q=drill">Drills</a>
          <a href="products.php?q=pipes">Pipes</a>
        </p>
      </div>

      <aside class="price-tag" aria-label="Contact PembaHardware">
        <p class="tag-title">Order today</p>
        <a class="tag-line" href="tel:<?= e($phone_tel) ?>"><?= e($phone_display) ?></a>
        <a class="btn btn-whatsapp" href="<?= e($wa_link('Hello PembaHardware, I would like to order…')) ?>" target="_blank" rel="noopener noreferrer">Order on WhatsApp</a>
        <p class="tag-note"><?= e($address) ?></p>
      </aside>
    </div>
  </section>

  <!-- TRUST STRIP -->
  <section class="trust" aria-label="Why shop with us">
    <div class="wrap trust-grid">
      <div><strong>Delivery in Nairobi</strong><span>Same-day on most orders</span></div>
      <div><strong>Pay your way</strong><span>M-Pesa, cash or card</span></div>
      <div><strong>Genuine products</strong><span>Trusted brands only</span></div>
      <div><strong>Bulk and contractor pricing</strong><span>Ask for a quote</span></div>
    </div>
  </section>

  <!-- CATEGORIES -->
  <section class="section" aria-labelledby="cat-title">
    <div class="wrap">
      <div class="section-head">
        <h2 id="cat-title">Shop by aisle</h2>
        <a class="link" href="products.php">See all products</a>
      </div>
      <ul class="aisles">
        <?php foreach ($categories as $c): ?>
          <li>
            <a href="products.php?category=<?= e($c['slug']) ?>">
              <span class="aisle-icon" aria-hidden="true"><?= $c['icon'] ?></span>
              <span><?= e($c['name']) ?></span>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </section>

  <!-- FEATURED PRODUCTS -->
  <section class="section section-alt" aria-labelledby="feat-title">
    <div class="wrap">
      <div class="section-head">
        <h2 id="feat-title">Best sellers</h2>
        <a class="link" href="products.php">Browse the full range</a>
      </div>

      <div class="products">
        <?php foreach ($products as $p): ?>
          <article class="card">
            <a class="card-media" href="product.php?id=<?= (int)$p['id'] ?>" aria-label="<?= e($p['name']) ?>">
              <?php if ($p['tag']): ?><span class="badge"><?= e($p['tag']) ?></span><?php endif; ?>
              <?php if (!empty($p['image']) && file_exists($p['image'])): ?>
                <img src="<?= e($p['image']) ?>" alt="<?= e($p['name']) ?>" loading="lazy" width="400" height="400" />
              <?php else: ?>
                <span class="ph" aria-hidden="true"><?= e(mb_substr($p['name'], 0, 1)) ?></span>
              <?php endif; ?>
            </a>
            <div class="card-body">
              <h3><a href="product.php?id=<?= (int)$p['id'] ?>"><?= e($p['name']) ?></a></h3>
              <p class="price">
                KSh <?= number_format($p['price']) ?>
                <?php if ($p['old']): ?><s>KSh <?= number_format($p['old']) ?></s><?php endif; ?>
              </p>
              <!-- Connect data-product-id to your cart handler in assets/js/script.js -->
              <button type="button" class="btn btn-primary btn-block" data-product-id="<?= (int)$p['id'] ?>">Add to cart</button>
              <a class="ask" href="<?= e($wa_link('Hi, is the ' . $p['name'] . ' in stock?')) ?>" target="_blank" rel="noopener noreferrer">Ask on WhatsApp</a>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- CONTRACTOR CTA -->
  <section class="bulk" aria-labelledby="bulk-title">
    <div class="wrap bulk-inner">
      <div>
        <h2 id="bulk-title">Building something big?</h2>
        <p>Send us your materials list and we will quote you a bulk price, usually within the day.</p>
      </div>
      <a class="btn btn-primary" href="<?= e($wa_link('Hello, I need a quote for these materials:')) ?>" target="_blank" rel="noopener noreferrer">Request a quote</a>
    </div>
  </section>

  <!-- VISIT US -->
  <section class="section" aria-labelledby="visit-title">
    <div class="wrap visit">
      <div>
        <h2 id="visit-title">Visit the store</h2>
        <address>
          <?= e($address) ?><br />
          <a href="tel:<?= e($phone_tel) ?>"><?= e($phone_display) ?></a>
        </address>
        <!-- Edit to match your real opening hours -->
        <p class="hours">Monday to Saturday, 8:00 am to 6:00 pm</p>
        <a class="btn btn-dark" href="https://www.google.com/maps/search/?api=1&amp;query=<?= rawurlencode('PembaHardware ' . $address) ?>" target="_blank" rel="noopener noreferrer">Get directions</a>
      </div>
      <!-- Optional: paste your Google Maps embed iframe here -->
      <div class="map-placeholder" role="img" aria-label="Map placeholder"></div>
    </div>
  </section>

</main>

<?php include 'includes/whatsapp_button.php'; ?>
<?php include 'includes/footer.php'; ?>

<!-- Scripts -->
<script src="assets/js/script.js"></script>

</body>
</html>
