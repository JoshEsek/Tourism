<?php
  /**
   * Core Home
   *
   * @author JoshEsek <joshuaesek@gmail.com>
   *
   * @var string $shared_folder This is a folder the project placed or the project is hosted on a share domain
   */
  global $shared_folder;

  use Roli\Model\Database;
  use Roli\Session;
  use Roli\Tourism;
  use Roli\Utilities\Utility as Util;
  // * project is in tourism folder, if it's not placed in this folder `tourism` is not used leave blank or place the folder name
  $shared_folder = 'tourism';
  // * Load Roli
  require_once '../autoload.php';
  // * Start session
  Session::start();
  // * Load Roli
  $tourism = new Tourism();
?>
  <!DOCTYPE html>
  <html class='no-js' lang='en'>
  <head><?= $tourism->get_page_head() ?>
  </head>
  <body <?= Util::get_body_classes('tourism') ?>>
    <header class="primary-header"><?= $tourism->load_page_navbar() ?>
    </header>

    <main class='main'>
      <noscript>You don't have javascript enabled!</noscript>
      <?php
        $tourism->load_page();
      ?>
    </main>

    <div class='footer-primary'><?= $tourism->get_page_footer() ?>
    </div><?= $tourism->get_page_modal() ?>
  </body><?= $tourism->get_page_scripts() ?>
</html>
<?php
  // * connect database
  Database::disconnect_database();
