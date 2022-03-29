<?php
  /**
   * Core Home
   *
   * @author JoshEsek <joshuaesek@gmail.com>
   */

  use Roli\Session;
  use Roli\Utilities\Utility as Util;
  // * Load Roli
  require_once '../autoload.php';
  // * Start session
  Session::start();
?>
<!DOCTYPE html>
<html class='no-js' lang='en'>
  <head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
    <meta content='width=device-width,initial-scale=1.0' name='viewport'>
    <meta name='msapplication-TileImage' content='assets/images/png/apple-touch-icon.png' />
    <!-- description -->
    <meta content='Landing page for Scotland tourism site.' name='description'>
    <!-- author -->
    <meta content='JoshEsek' name='author'>
    <!-- @Links -->
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <!-- canonical -->
    <link href='<?= Util::get_base_uri('tourism') ?>' rel='canonical'>
    <!-- Title @TODO tag fetch from database -->
    <title>Navs and tabs · Bootstrap v5.1</title>
    <!-- Favicons -->
    <link href='<?= Util::get_tourism_uri('assets/images/png/apple-touch-icon.png') ?>' rel='apple-touch-icon' sizes='180x180' />
    <link href='<?= Util::get_tourism_uri('assets/images/png/favicon-32x32.png') ?>' rel='icon' sizes='32x32' type='image/png' />
    <link href='<?= Util::get_tourism_uri('assets/images/png/favicon-16x16.png') ?>' rel='icon' sizes='16x16' type='image/png' />
    <!-- Stylesheet -->
    <link rel='stylesheet' id='bootstrap-icons-css' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css' media='all' />
    <link rel='stylesheet' id='bootstrap-css' href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' media='all' />
    <link rel='stylesheet' id='core-css' href='<?= Util::get_tourism_uri('assets/css/core.css') ?>' media='all' />
  </head>
  <body <?= Util::get_body_classes('tourism') ?>>
    <main class="main">
      <div class="container my-4">
        <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
          <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
            <h1 class="display-4 fw-bold lh-1 pb-3">Study in Scotland</h1>
            <div class=" col-sm-10 mx-auto text-align-center">
											<div class="mt-2 pt-2">
						<p class="lead">Scotland has a world-renowned education system, top-class universities and a reputation for producing creative thinkers. That's why more than 50,000 students from over 180 different countries choose to study in Scotland every year. You could join them.</p>
											</div>
								<h2
                    class="alternating-content__heading"
                    id="image-strip-coronavirus-student-information"
                >Coronavirus – advice and information for new and prospective students </h2>
								<p class="lead">We know that you might be worried about the coronavirus pandemic and how it will affect your future plans to study in Scotland. From questions around your application process to info about scholarships and travel, we’ve put together a list of resources which should be of help to you.</p>
									</div>

          </div>
          <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
            <img class="rounded-lg-3" src="../assets/images/jpg/efd02f692a53fbdb149c0dc58b3a2d75c9ae9ead.jpg" alt="" width="720">
      </div>
      </div>
      </div>
    </main>
  </body>
</html>
