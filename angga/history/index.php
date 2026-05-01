<?php 
    include('../../libs/auth/middleware.php');
    require_once('../../libs/users/history.php');
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>nonton.aja — History</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
      integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../evan/css/preflight.css" />
    <link rel="stylesheet" href="../../evan/css/utils.css" />
    <link rel="stylesheet" href="../../evan/css/components.css" />
    <link rel="stylesheet" href="../../evan/css/layout.css" />
    <link rel="stylesheet" href="style.css">

    <style>
      /* ===== TOOLBAR ===== */
      .history-toolbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 24px;
        flex-wrap: wrap;
        gap: 12px;
      }
      .history-toolbar h2 { margin: 0; font-size: 1.8em; }

      .btn-print {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 10px 20px;
        background-color: var(--primary);
        color: white;
        border: none;
        border-radius: var(--radius);
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: opacity 0.2s;
      }
      .btn-print:hover { opacity: 0.85; }

      /* ===== PRINT STYLES ===== */
      @media print {
        header#header, aside#sidebar, footer#footer,
        .btn-print, #button_search, .header_cta { display: none !important; }

        body, html {
          background: #fff !important;
          color: #000 !important;
          font-family: 'Segoe UI', Arial, sans-serif;
          margin: 0; padding: 0;
        }

        .grid_layout { display: block !important; }
        .content { display: block !important; padding: 0 !important; }
        main#main { padding: 0 !important; row-gap: 0 !important; max-width: 100% !important; }
        #film-grid { display: none !important; }
        .history-toolbar h2 { display: none !important; }

        /* KOVER */
        .print-cover {
          display: block !important;
          text-align: center;
          padding: 60px 40px 40px;
          page-break-after: always;
          border-bottom: 3px solid #1a1a2e;
        }
        .print-cover .cover-logo {
          font-size: 48px; font-weight: 900; color: #1a1a2e;
          letter-spacing: -2px; margin-bottom: 8px;
        }
        .print-cover .cover-logo span { color: #3b82f6; }
        .print-cover .cover-subtitle { font-size: 13px; color: #666; margin-bottom: 60px; }
        .print-cover h1 { font-size: 32px; font-weight: 700; color: #1a1a2e; margin-bottom: 12px; }
        .print-cover .cover-desc { font-size: 14px; color: #555; margin-bottom: 60px; }
        .print-cover .cover-meta {
          display: inline-block; background: #f4f6fb;
          border: 1px solid #dde2f0; border-radius: 8px;
          padding: 20px 40px; text-align: left;
        }
        .print-cover .cover-meta p { font-size: 13px; color: #333; margin: 5px 0; }
        .print-cover .cover-meta strong { color: #1a1a2e; }

        /* HEADER HALAMAN */
        .print-header {
          display: flex !important;
          justify-content: space-between;
          align-items: center;
          padding: 14px 0;
          border-bottom: 2px solid #1a1a2e;
          margin-bottom: 24px;
        }
        .print-header .ph-logo { font-size: 18px; font-weight: 800; color: #1a1a2e; }
        .print-header .ph-logo span { color: #3b82f6; }
        .print-header .ph-title { font-size: 12px; color: #555; }

        /* RINGKASAN */
        .print-summary {
          display: flex !important;
          gap: 16px; margin-bottom: 28px;
        }
        .print-summary .stat-box {
          flex: 1; border: 1px solid #dde2f0;
          border-radius: 8px; padding: 14px 18px; background: #f8f9fc;
        }
        .print-summary .stat-label {
          font-size: 11px; color: #777;
          text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 4px;
        }
        .print-summary .stat-value { font-size: 24px; font-weight: 700; color: #1a1a2e; }

        /* TABEL */
        .print-table { display: block !important; width: 100%; }
        .print-table table { width: 100%; border-collapse: collapse; font-size: 12px; }
        .print-table thead tr { background: #1a1a2e; color: white; }
        .print-table thead th { padding: 10px 12px; text-align: left; font-weight: 600; }
        .print-table tbody tr { border-bottom: 1px solid #eee; }
        .print-table tbody tr:nth-child(even) { background: #f8f9fc; }
        .print-table tbody td { padding: 9px 12px; color: #333; vertical-align: middle; }
        .badge-liked {
          display: inline-block; background: #fef3c7; color: #92400e;
          border-radius: 4px; padding: 2px 8px; font-size: 11px; font-weight: 600;
        }
        .badge-wl {
          display: inline-block; background: #dbeafe; color: #1e40af;
          border-radius: 4px; padding: 2px 8px; font-size: 11px; font-weight: 600;
        }
        .badge-none { color: #aaa; font-size: 11px; }

        /* FOOTER CETAK */
        .print-footer {
          display: block !important;
          margin-top: 32px; padding-top: 12px;
          border-top: 1px solid #dde2f0;
          font-size: 11px; color: #999; text-align: center;
        }
      }

      /* Sembunyikan elemen print di layar */
      .print-cover, .print-header, .print-summary, .print-table, .print-footer {
        display: none;
      }
    </style>
  </head>
  <body>

    <!-- ========================================= -->
    <!--   KONTEN CETAK (hanya tampil saat print)  -->
    <!-- ========================================= -->
    <?php
      $total      = count($user_history ?? []);
      $totalLiked = 0;
      $totalWL    = 0;
      if ($user_history) {
        foreach ($user_history as $h) {
          if (!empty($h[5]) && $h[5] == 1) $totalLiked++;
          if (!empty($h[6]) && $h[6] == 1) $totalWL++;
        }
      }
    ?>

    <!-- Kover laporan -->
    <div class="print-cover">
      <div class="cover-logo"><span>nonton</span>.aja</div>
      <div class="cover-subtitle">Platform Streaming Film Indonesia</div>
      <h1>Laporan History Tontonan</h1>
      <div class="cover-desc">Rekap riwayat film yang telah ditonton oleh pengguna</div>
      <div class="cover-meta">
        <p><strong>Nama Pengguna&nbsp;&nbsp;:</strong> <?php echo htmlspecialchars($user_data['name'] ?? '-'); ?></p>
        <p><strong>Username&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong> <?php echo htmlspecialchars($user_data['username'] ?? '-'); ?></p>
        <p><strong>Tanggal Cetak&nbsp;&nbsp;:</strong> <?php echo date('d F Y, H:i'); ?> WIB</p>
        <p><strong>Total Film&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong> <?php echo $total; ?> film</p>
      </div>
    </div>

    <!-- Header tiap halaman cetak -->
    <div class="print-header">
      <div class="ph-logo"><span>nonton</span>.aja</div>
      <div class="ph-title">Laporan History — <?php echo htmlspecialchars($user_data['name'] ?? '-'); ?></div>
      <div class="ph-title">Dicetak: <?php echo date('d/m/Y H:i'); ?> WIB</div>
    </div>

    <!-- Ringkasan statistik -->
    <div class="print-summary">
      <div class="stat-box">
        <div class="stat-label">Total Film Ditonton</div>
        <div class="stat-value"><?php echo $total; ?></div>
      </div>
      <div class="stat-box">
        <div class="stat-label">Film Disukai &#9829;</div>
        <div class="stat-value"><?php echo $totalLiked; ?></div>
      </div>
      <div class="stat-box">
        <div class="stat-label">Watch Later &#128337;</div>
        <div class="stat-value"><?php echo $totalWL; ?></div>
      </div>
    </div>

    <!-- Tabel data history -->
    <div class="print-table">
      <table>
        <thead>
          <tr>
            <th style="width:36px">No</th>
            <th>Judul Film</th>
            <th style="width:70px">Film ID</th>
            <th style="width:80px">Disukai</th>
            <th style="width:90px">Watch Later</th>
            <th style="width:140px">Terakhir Ditonton</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($user_history): ?>
            <?php foreach ($user_history as $i => $history): ?>
              <tr>
                <td><?php echo $i + 1; ?></td>
                <td><?php echo htmlspecialchars($history[3] ?? '-'); ?></td>
                <td><?php echo htmlspecialchars($history[2] ?? '-'); ?></td>
                <td>
                  <?php if (!empty($history[5]) && $history[5] == 1): ?>
                    <span class="badge-liked">&#9829; Suka</span>
                  <?php else: ?>
                    <span class="badge-none">—</span>
                  <?php endif; ?>
                </td>
                <td>
                  <?php if (!empty($history[6]) && $history[6] == 1): ?>
                    <span class="badge-wl">&#128337; Ditandai</span>
                  <?php else: ?>
                    <span class="badge-none">—</span>
                  <?php endif; ?>
                </td>
                <td>
                  <?php echo !empty($history[7]) ? date('d/m/Y H:i', strtotime($history[7])) : '-'; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="6" style="text-align:center;color:#aaa;padding:24px;">
                Belum ada history tontonan.
              </td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <!-- Footer cetak -->
    <div class="print-footer">
      Laporan dicetak otomatis dari sistem nonton.aja &copy; <?php echo date('Y'); ?> &nbsp;|&nbsp;
      Dicetak oleh: <?php echo htmlspecialchars($user_data['name'] ?? '-'); ?> &nbsp;|&nbsp;
      <?php echo date('d F Y, H:i'); ?> WIB
    </div>

    <!-- ========================================= -->
    <!--   TAMPILAN LAYAR NORMAL                   -->
    <!-- ========================================= -->
    <div class="grid_layout">
      <header id="header">
        <div class="container">
          <a href="http://127.0.0.1:5500/evan/pages/home/index.html" class="brand_logo"><span>nonton</span>.aja</a>
          <button type="button" id="button_search" class="button button_search">
            <i class="fa-solid fa-magnifying-glass"></i>
            Seacrh Movie
          </button>
          <div class="header_cta">
            <?php if ($is_login): ?>
              <?php if ($user_data["premium"] == 0): ?>
                <button id="getprem" class="button button_ghost">Get Premium</button>
              <?php endif; ?>
              <a href="../../jayro/page/profil user/" class="button button_primary">
                <p style="color:white;"><?php echo $user_data['name']; ?></p>
                <i class="fa-solid fa-user"></i>
              </a>
            <?php else: ?>
              <a href="../../jayro/page/login" class="button button_primary">Login</a>
              <a href="../../jayro/page/register" class="button button_primary">Register</a>
            <?php endif; ?>
          </div>
        </div>
      </header>

      <aside id="sidebar"></aside>

      <div class="content">
        <main id="main">

          <div class="history-toolbar">
            <h2>🎬 History Tontonan</h2>
            <button class="btn-print" onclick="window.print()">
              <i class="fa-solid fa-print"></i>
              Cetak Laporan
            </button>
          </div>

          <div id="film-grid" class="grid">
            <?php if ($user_history): ?>
              <?php foreach ($user_history as $history): ?>
                <div class="card">
                  <a href="<?php echo $app_url . "/yohanes/detail?id=" . $history[2]; ?>">
                    <img
                      src="https://image.tmdb.org/t/p/original<?php echo $history[4]; ?>"
                      alt="<?php echo htmlspecialchars($history[3]); ?>" />
                    <div class="card-content">
                      <div class="card-title"><?php echo htmlspecialchars($history[3]); ?></div>
                      <div class="card-info">
                        <?php if (!empty($history[5]) && $history[5] == 1): ?>
                          <span style="color:#f59e0b;">&#9829; Disukai</span>&nbsp;
                        <?php endif; ?>
                        <?php if (!empty($history[6]) && $history[6] == 1): ?>
                          <span style="color:#60a5fa;">&#128337; Watch Later</span>
                        <?php endif; ?>
                      </div>
                    </div>
                  </a>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <p style="color:var(--muted-foreground);padding:20px 0;">
                Belum ada film yang pernah kamu tonton.
              </p>
            <?php endif; ?>
          </div>

        </main>

        <footer id="footer">
          <p id="copyright">&copy; <?php echo date('Y'); ?> nonton.aja</p>
          <div id="themes">
            <span>Themes:</span>
            <div id="theme_toggles">
              <button type="button" class="button button_ghost"><i class="fa-solid fa-sun"></i></button>
              <button type="button" class="button button_ghost"><i class="fa-solid fa-moon"></i></button>
            </div>
          </div>
        </footer>
      </div>
    </div>

    <script type="module" src="../../evan/js/layout-dom.js"></script>
    <script type="module" src="../../evan/js/create-elements/theme_toggle.js"></script>
  </body>
</html>