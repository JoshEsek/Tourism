<?php
  namespace Roli\Model;

  use Roli\Utilities\Utility as Util;
  /**
   * Main operational class
   */
  class Main
  {
    protected Option $option;
    /**
     * Mail construct
     */
    public function __construct()
    {
      $this->option = new Option();
    }
    /**
     * @inheritDoc
     */
    public function __toString()
    {
      return __CLASS__;
    }
    /**
     * Load the page primary navigational bar
     *
     * @return string
     */
    public function load_navbar()
    : string
    {
      global $shared_folder;
      // * Build Nav Bar
      $_nav  = [
          'about'    => [
              'label'    => 'About Scotland',
              'children' => [
                  'where-is-scotland' => ['label' => 'Where is Scotland?'],
                  'cities'            => ['label' => 'Scotland&apos;s Cities']
              ]
          ],
          'live'     => [
              'label'    => 'Live',
              'children' => [
                  'where-to-live-in-scotland' => ['label' => 'Where To Live in Scotland'],
                  'moving'                    => ['label' => 'Moving to Scotland'],
                  'lifestyle'                 => ['label' => 'Scottish Lifestyle'],
                  'stories'                   => ['label' => 'Real Life Stories']
              ]
          ],
          'work'     => [
              'label'    => 'Work',
              'children' => [
                  'working'   => ['label' => 'Working in Scotland'],
                  'career'    => ['label' => 'Career Opportunities'],
                  'companies' => ['label' => 'Working for Companies in Scotland'],
                  'benefits'  => ['label' => 'Employment Packages &amp; Benefits'],
                  'life'      => ['label' => 'Real Life Stories']
              ]
          ],
          'visit'    => [
              'label'    => 'Visit',
              'children' => [
                  'things'        => ['label' => 'Things to Do'],
                  'accommodation' => ['label' => 'Accommodation'],
                  'cities'        => ['label' => 'Scotland\'s Cities'],
                  'travel'        => ['label' => 'Travel Essentials']
              ]
          ],
          'study'    => [
              'label'    => 'Study',
              'children' => [
                  'universities'      => ['label' => 'Universities in Scotland'],
                  'need'              => ['label' => 'What You Need to Know'],
                  'scotlands-stories' => ['label' => 'Real Life Stories']
              ]
          ],
          'business' => [
              'label'    => 'Business',
              'children' => [
                  'why'     => ['label' => 'Why Companies Choose Scotland'],
                  'expand'  => ['label' => 'Expand In Scotland'],
                  'success' => ['label' => 'Success Stories'],
                  'key'     => ['label' => 'Key Sectors']
              ]
          ],
          'features' => ['label' => 'Features']
      ];
      $_root = '/' . (!empty($shared_folder) ? "$shared_folder/" : '');
      $page  = Util::active_page();
      $_html = '
      <nav class=\'navbar navbar-expand-lg navbar-light bg-transparent\'>
        <div class=\'container\'>
          <a class=\'navbar-brand fw-bolder\' href=\'' . $_root . '\'>
            <img class=\'rounded-lg-3 d-inline-block site-logo mt-2\' src=\'' . Util::get_file_path_uri('assets/images/png/apple-touch-icon.png') . '\' alt=\'Site logo\'>
            <span class=\'navbar-brand d-inline-block py-3\'>Tourism Scotland</span>
          </a>
          
          <button class=\'navbar-toggler\' type=\'button\' data-bs-toggle=\'collapse\' data-bs-target=\'#navbar-content\' aria-controls=\'navbar-content\' aria-expanded=\'false\' aria-label=\'Toggle navigation\'>
            <span class=\'navbar-toggler-icon\'></span>
          </button>
          
          <div class=\'collapse navbar-collapse\' id=\'navbar-content\'>
            <ul class=\'navbar-nav m-auto mb-2 mb-lg-0\'>';
      // * The loop & the magic
      foreach ($_nav as $key => $item)
      {
        $active    = $key === strtolower($page) || isset($_nav[$key]['children'][$page]) ? ' active' : '';
        $label     = $item['label'] ?? '';
        $has_child = isset($item['children']);
        $dropdown  = $has_child ? ' dropdown' : '';
        $current   = $active ? ' aria-current="page"' : '';
        $toggle    = $has_child ? " dropdown-toggle{$active}" : $active;
        $_attr     = $has_child ? " data-bs-toggle='dropdown' aria-expanded='false' role='button'" : '';
        $_html     .= "
              <li class='nav-item{$dropdown}'>";
        $_html     .= "
                <a class='nav-link{$toggle}' id='navbar-$key' href='{$_root}{$key}'{$current}{$_attr}>{$label}</a>";
        // * Add submenu if we have children
        if ($has_child)
        {
          $active = $key === strtolower($page) ? ' active' : '';
          $_html  .= "
                <ul class='dropdown-menu py-0' aria-labelledby='navbar-$key'>
                  <li><a class='dropdown-item{$active}' href='{$_root}{$key}/'>{$label}</a></li>";
          // * The child loop & the magic
          foreach ($item['children'] as $index => $child)
          {
            $_active = $index === strtolower($page) || isset($_nav[$index]['children'][$page]) ? ' active' : '';
            $_label  = $child['label'] ?? '';
            $_html   .= "
                  <li><a class='dropdown-item{$_active}' href='{$_root}{$key}/{$index}'>{$_label}</a></li>";
          }
          // * Close sub nav item
          $_html .= '
                </ul>';
        }
        // * Close nav item
        $_html .= "
              </li>";
      }
      // * Close nav bar
      $_html .= '
            </ul>
            <form class="d-flex">' . $this->display_user_menu() . '
            </form>
          </div>
        </div>
      </nav>';

      return $_html;
    }
    protected function display_user_menu()
    {
      return Util::user_is_login() ? '
              <!-- Example single danger button -->
              <div class="btn-group">
                <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                  Action
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Separated link</a></li>
                </ul>
              </div>' : '
              <button type="button" class="btn btn-outline-secondary me-2" data-bs-toggle="modal" data-bs-target="#static-login" data-tab-target="#signup">Signup</button>
              <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#static-login" data-tab-target="#login">Login</button>';
    }
    /**
     * Load the page primary footer navigational bar
     *
     * @return string
     */
    public function load_footer_navbar()
    : string
    {
      global $shared_folder;
      // * Build Nav Bar
      $_nav  = [
          'about'   => 'About Scotland',
          'sitemap' => 'Sitemap',
          'contact' => 'Contact Us',
          'privacy' => 'Privacy',
      ];
      $_root = '/' . (!empty($shared_folder) ? "$shared_folder/" : '');
      $page  = Util::active_page();
      $_html = '
            <nav class=\'nav-footer\' aria-label=\'Secondary Navigation\'>
              <ul class=\'nav justify-content-end py-3\'>';
      // * The loop & the magic
      foreach ($_nav as $key => $item)
      {
        $active  = $key === strtolower($page) ? ' active' : '';
        $current = $active ? ' aria-current="page"' : '';
        $_html   .= "
              <li class='nav-item'>";
        $_html   .= "
                <a class='nav-link py-0 px-2{$active}' href='{$_root}{$key}'{$current}>{$item}</a>";
        // * Close nav item
        $_html .= "
              </li>";
      }
      // * Close nav bar
      $_html .= '
              </ul>
            </nav>';

      return $_html;
    }
    /**
     * Check for critical errors to halt application depending on database communications
     *
     * @return bool
     */
    public function has_critical_error()
    : bool
    {
      return match (true)
      {
        Database::has_connection_error(), !is_readable(Util::get_file_path('src/Data/Configure/config.inc')) => true,
        default                                                                                              => false
      };
    }
    /**
     * Display the content of the page
     *
     * @return void
     */
    public function render_page()
    : void
    {
      if (!empty($_page = $this->option->get_page(Util::active_page())))
      {
        echo $_page;
      }
      else
      {
        // *
        ?>
        <div class='container my-4'>
        <div class='row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg'>
          <div class='col-lg-7 p-3 p-lg-5 pt-lg-3'>
            <h1 class='display-4 fw-bold lh-1 pb-3'>Error 404: Sorry Page not found</h1>
            <div class=" col-sm-10 mx-auto text-align-center">
											<div class="mt-2 pt-2">
												<p class='lead'>Scotland is a part of the United Kingdom (UK) and occupies the northern third of Great Britain. Scotland’s mainland shares a border with England to the south. It is home to almost 800 small islands, including the northern isles of Shetland and Orkney, the Hebrides, Arran and Skye.</p>
											</div>
									</div>

          </div>
          <div class='col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg'>
            <img class='rounded-lg-3' src=' <?= Util::get_file_path_uri('assets/images/jpg/17b1cc27c799b8fe7016f14c93914c0cb83cc364.jpg') ?>' alt='' width='720'>
      </div>
      </div>
      </div>
        <?php
      }
    }
    /**
     * Display the content of critical error page
     *
     * @return void
     */
    public function render_critical_error_page()
    : void
    {
      switch (true)
      {
        case !is_readable($config = Util::get_file_path('src/Data/Configure/config.inc')):
          $title = 'Failure to load config flat file in the config directory';
          $error = "File location: <span class=\"text-danger fw-bold text-capitalize\">$config</span>";
          break;
        case Database::has_connection_error():
          $title = 'Critical database connection error';
          $error = 'You can report these critical errors to the admin by clicking the <span class="text-muted">Report to admin button</span>,';
          // * Add exceptions
          if (!empty($except = Database::get_connection_exception()) && isset($except['message'], $except['code'], $except['line']))
          {
            $error .= '<p class="lead">' . $except['message'] . ', Error code: <code>' . $except['code'] . '</code> at line <var>' . $except['line'] . '</var></p>,';
          }
          break;
        default:
          $title = 'Critical Backend error on page';
          $error = 'Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.';
          break;
      }
      ?>
      <div class='container my-5'>
        <div class='row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg'>
          <div class='col-lg-7 p-3 p-lg-5 pt-lg-3'>
            <h1 class='display-4 fw-bold lh-1 text-capitalize'><?= $title ?></h1>
            <p class='lead'><?= $error ?></p>
            <div class='d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3'>
              <a
                  href='mailto://joshuaesek@gmail.com'
                  class='btn btn-primary btn-lg px-4 me-md-2 fw-bold text-capitalize'
                  role='button'
              >Report <span class="text-lowercase">to</span> admin</a>
              <a class='btn btn-outline-secondary btn-lg px-4 text-capitalize' href='static/' role='button'>continue</a>
            </div>
          </div>
          <div class='col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg'>
            <img class='rounded-lg-3' src='<?= Util::get_file_path_uri('assets/images/png/logo.png') ?>' alt='Site logo' width='720'>
          </div>
        </div>
      </div>
      <?php
    }
    /**
     * Get page title from database or from option file
     *
     * @return string
     */
    public function page_title()
    : string
    {
      return $this->option->get_title(Util::active_page());
    }
    /**
     * Get page title from database or from option file
     *
     * @return string
     */
    public function page_description()
    : string
    {
      return $this->option->get_page_description(Util::active_page());
    }
  }
