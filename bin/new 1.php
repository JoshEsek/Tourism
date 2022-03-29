Queue Management System
Queue management system
queue management system
Queue_Management_System
queue-management-system

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

(using password: NO), error# 1045


switch ($_SERVER["REQUEST_METHOD"]){
    case "PUT":
        foo_replace_data();
        break;
    case "POST":
        foo_add_data();
        break;
    case "HEAD";
        foo_set_that_cookie();
        break;
    case "GET":
    default:
       foo_fetch_stuff()
       break;
 }

{
    "action": "install_submenu_menu_page",
    "_wp_http_referer": "/queue/wp-admin/admin.php?page=roli-plugins-install-page",
    "action-fired": "license-supplied",
    "license": "HHHEE",
    "nonce": "license-supplied"
}
C:\xampp\htdocs\queue\wp-content\plugins\roli-plugins\src\\Plugin
<!-- Nav tabs -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages" type="button" role="tab" aria-controls="messages" aria-selected="false">Messages</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Settings</button>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
  <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
  <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">...</div>
  <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">...</div>
</div>
.bi::before {
  display: inline-block;
  content: "";
  vertical-align: -.125em;
  background-image: url("data:image/svg+xml,<svg viewBox='0 0 16 16' fill='%23333' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' d='M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z' clip-rule='evenodd'/></svg>");
  background-repeat: no-repeat;
  background-size: 1rem 1rem;
}
Dhillan@sga-uae.com

http://localhost/queue/uncategorized/application-intro/
/**
* Template Name: Full Width Page
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/,


  <main class="px-3 wrapper">
    <h1 class="fs-1"><?= get_bloginfo('name', 'display') ?></h1>
    <p class="lead"><?= preg_replace('/<p>/m', '<p class="lead">', apply_filters('the_content', $_post->post_content)) ?></p>
    <p class="lead text-capitalize fst-italic"><?= $_post->post_title ?></p>
    <p class="lead">
      <a href="<?= site_url('/setup') ?>" class="btn btn-lg btn-primary fw-bold text-capitalize" data-require="require-key">setup application</a>
    </p>
  </main>
wp-bootstrap/wp-bootstrap-navwalker
//Display admin notices 
function my_test_plugin_admin_notice()
{
    //get the current screen
    $screen = get_current_screen();
 
    //return if not plugin settings page 
    //To get the exact your screen ID just do var_dump($screen)
    if ( $screen->id !== 'toplevel_page_YOUR_PLUGIN_PAGE_SLUG') return;
         
    //Checks if settings updated 
    if ( isset( $_GET['settings-updated'] ) ) {
        //if settings updated successfully 
        if ( 'true' === $_GET['settings-updated'] ) : ?>
 
            <div class="notice notice-success is-dismissible">
                <p><?php _e('Congratulations! You did a very good job.', 'textdomain') ?></p>
            </div>
 
        <?php else : ?>
 
            <div class="notice notice-warning is-dismissible">
                <p><?php _e('Sorry, I can not go through this.', 'textdomain') ?></p>
            </div>
             
        <?php endif;
    }
}
add_action( 'admin_notices', 'my_test_plugin_admin_notice' );
    <pre class="pre-scrollable">
      <?= print_r([
//          '_post'     => $_post,
//          'post'      => get_posts(),
//          '__post'    => $__post,
          'pagenow'   => get_post_field('post_name', get_post()),
          'theme_mod' => $custom_logo_id,
          'image_src' => $image[0],
      ], true) ?>
    </pre>
	
recycle
queued
'canceled', 'feedback', 'processed', 'processing', 'reschedule', 'transferred', 'unprocessed', 'waiting',


site-branding.php
wp-content/themes/twentytwentyone/template-parts/header/site-branding.php

canceled,
feedback,
processed,
processing,
reschedule,
transferred,
unprocessed,
waiting,

functions
index
screenshot
style 
theme.json

https://a2plcpnl0942.prod.iad2.secureserver.net:2096/webmaillogout.cgi

dhillan@sga-uae.com	#$1tara@1985	msufyn@sitaragulf.com	msufyn@gmail.com	Here is my new mail
shafeek@sga-uae.com	#$1tara@1985	msufyn@sitaragulf.com	msufyn@gmail.com	Here is my new mail
Shefeeq@sga-uae.com	#$1tara@1985	msufyn@sitaragulf.com	msufyn@gmail.com	Here is my new mail
riyas@sga-uae.com	#$1tara@1985	msufyn@sitaragulf.com	msufyn@gmail.com	Here is my new mail
maneesh@sga-uae.com	#$1tara@1985	msufyn@sitaragulf.com	msufyn@gmail.com	Here is my new mail
habeeb@sga-uae.com	#$1tara@1985	msufyn@sitaragulf.com	msufyn@gmail.com	Here is my new mail
accounts@sga-uae.com	#$1tara@1985	msufyn@sitaragulf.com	msufyn@gmail.com	Here is my new mail
info@sga-uae.com	#$1tara@1985	msufyn@sitaragulf.com	msufyn@gmail.com	Here is my new mail


features
Features

<div id="navbar-front-page" class="collapse navbar-collapse">
<ul id="menu-primary" class="navbar-nav nav-masthead ms-auto mb-2 mb-lg-0">
<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-72" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-72 nav-item"><a title="Home" href="http://localhost/queue/home/" class="nav-link">Home</a></li>
<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-71" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-71 nav-item"><a title="Features" href="http://localhost/queue/feature/" class="nav-link">Features</a></li>
<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-31" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-31 nav-item"><a title="Contact" href="http://localhost/queue/contact/" class="nav-link">Contact</a></li>
</ul></div>	