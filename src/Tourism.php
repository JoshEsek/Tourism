<?php
    namespace Roli;

    use Roli\Constants\Regex;
    use Roli\Model\Main;
    use Roli\Utilities\Utility as Util;
    /**
     *
     */
    class Tourism extends Main
    {
        /**
         * Load Pages of the site but load critical exception page first
         *
         * @return void
         */
        public function load_page()
        : void
        {
            if ($this->has_critical_error())
            {
                $this->render_critical_error_page();
            }
            else
            {
                $this->render_page();
            }
        }
        /**
         * Display the content of the header tag
         *
         * @return string
         */
        public function get_page_head()
        : string
        {
            return "
    <noscript><meta http-equiv='refresh' content='0;url=noscript/index.php' /></noscript>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
    <meta content='width=device-width,initial-scale=1.0' name='viewport' />
    <meta name='msapplication-TileImage' content='" . Util::get_tourism_uri('assets/images/png/apple-touch-icon.png') . "' />
    <!-- description -->
    <meta content='" . $this->page_description() . "' name='description' />
    <!-- author -->
    <meta content='JoshEsek' name='author' />
    <!-- @Links -->
    <link rel='dns-prefetch' href='//cdn.jsdelivr.net' />
    <link rel='preconnect' href='https://fonts.googleapis.com' />
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin />
    <!-- canonical -->
    <link href='" . Util::get_base_uri('tourism') . "' rel='canonical' />
    <!-- Title -->
    <title>" . $this->get_page_title() . "</title>
    <!-- Favicons -->
    <link href='" . Util::get_tourism_uri('assets/images/png/apple-touch-icon.png') . "' rel='apple-touch-icon' sizes='180x180' />
    <link href='" . Util::get_tourism_uri('assets/images/png/favicon-32x32.png') . "' rel='icon' sizes='32x32' type='image/png' />
    <link href='" . Util::get_tourism_uri('assets/images/png/favicon-16x16.png') . "' rel='icon' sizes='16x16' type='image/png' />
    <!-- Stylesheet -->
    <link rel='stylesheet' id='bootstrap-icons-css' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css' media='all' />
    <link rel='stylesheet' id='bootstrap-css' href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' media='all' />
    <link rel='stylesheet' id='core-css' href='" . Util::get_tourism_uri('assets/css/core.css') . "' media='all' />";
        }
        /**
         * Fetch the page title
         *
         * @return string
         */
        public function get_page_title()
        : string
        {
            return $this->page_title();
        }
        /**
         * Load the page primary footer navigational bar
         *
         * @return string
         */
        public function get_page_footer()
        : string
        {
            return "
      <footer class='container'>
        <div class='row'>
          <div class='col-6 col-md-6 col-sm-12 text-capitalize'>
            <img class='rounded-lg-3 d-inline-block site-logo mt-2' src='" . Util::get_file_path_uri('assets/images/png/apple-touch-icon.png') . "' alt='Site logo' /> 
            <span class='navbar-brand d-inline-block fw-bolder py-3'>Tourism Scotland</span>
          </div>
          <div class='col-6 col-md-6 col-sm-12'>" . $this->load_footer_navbar() . "
          </div>
        </div>
        <div class='row'>
          <div class='col-12 col-sm-12'><p class='mb-4 text-600 text-muted text-center'>Thank you for visiting
              <span class='d-none d-sm-inline-block'>| </span><br class='d-sm-none'> 2022 &copy; <a href='mailto://joshuaesek@gmail.com'>JoshEsek</a></p>
          </div>
        </div>
      </footer>";
        }
        /**
         * Load the page primary navigational bar
         *
         * @return string
         */
        public function load_page_navbar()
        : string
        {
            return $this->load_navbar();
        }
        /**
         * Add scripts tags to the page
         *
         * @return string
         */
        public function get_page_scripts()
        : string
        {
            return "
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
  <!-- JavaScript Bundle with Popper -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js' integrity='sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA==' crossorigin='anonymous' referrerpolicy='no-referrer'></script>
  <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js'integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p'crossorigin='anonymous'></script>
  <script src='" . Util::get_tourism_uri('assets/js/core.js') . "'></script>";
        }
        public function get_page_modal()
        : string
        {
            return !Util::user_is_login() ? '
    <!-- Modal -->
     <div class="modal" id="static-login" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="static-loginLabel" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="static-loginLabel">
               <img class=\'d-inline-block site-logo mb-2\' src=\'' . Util::get_file_path_uri('assets/images/png/favicon-16x16.png') . '\' alt=\'Site logo\' />
               <span class="modal-brand d-inline-block">Tourism Scotland</span> <span class="titled d-inline-block"></span>
</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
           <div class="modal-body">
             <div class="d-none pt-4" id="signup">
             <form action="' . Util::get_file_path_uri(Regex::AJAX_URL) . '" class="row g-3 needs-validation" name="signup" method="post" novalidate>
               <input type="hidden" id="action" name="action" value="signup" />
               <input type="hidden" id="nonce" name="nonce" value="' . base64_encode('signup') . '" />
               <div class="row">
                 <div class="col-md-6 col-sm-6">
                   <label for="username" class="form-label h5">Register</label>
                 </div>
                 <div class="col-md-6 col-sm-6 text-right">
                   Have an account? <a class="btn text-primary" href="#" data-tab-target="#login" role="button">Login</a>
                 </div>
               </div>
               <div class="row">
                 <div class="input-group has-validation">
                   <label class="input-group-text" for="username" id="username-label">@</label>
                   <input type="email" class="form-control" id="email" name="email" placeholder="Emial" pattern="' . Regex::EMAIL . '" aria-describedby="username-label" required />
                   <div class="valid-feedback">
                     Looks good!
                   </div>
                   <div class="invalid-feedback">
                     Please enter a valid emial.
                   </div>
                 </div>
               </div>
               <div class="row pt-3">
                 <div class="col-md-6 col-sm-12">
                 <div class="input-group has-validation">
                   <label class="input-group-text bi-key" for="password" id="password-label"></label>
                   <input type="password" class="form-control" id="password" name="password" placeholder="Password" aria-describedby="password-label" required />
                   <div class="valid-feedback">
                     Looks good!
                   </div>
                   <div class="invalid-feedback">
                     Please enter a valid password.
                   </div>
                 </div>
                 </div>
                 <div class="col-md-6 col-sm-12">
                 <div class="input-group has-validation">
                   <label class="input-group-text bi-key" for="comfirm-password" id="comfirm-password-label"></label>
                   <input type="password" class="form-control" id="comfirm-password" name="comfirm-password" placeholder="Comfirm Password" aria-describedby="comfirm-password-label" required />
                   <div class="valid-feedback">
                     Looks good!
                   </div>
                   <div class="invalid-feedback">
                     Please enter a valid comfirm password.
                   </div>
                 </div>
                 </div>
               </div>
               <div class="row pt-3">
                 <div class="col-md-12 col-sm-12">
                   <div class="form-check">
                     <input class="form-check-input" type="checkbox" value="accept" id="accept" name="accept" required />
                     <label class="form-check-label pb-2" for="accept"> I accept the <a class="btn text-primary text-capitalize" href="#" data-tab-target="#terms" role="button">terms</a> and <a class="btn text-primary text-capitalize" href="#" data-tab-target="#privacy" role="button">privacy policy</a></label>
                     <div class="invalid-feedback">
                       You must agree before submitting.
                     </div>
                   </div>
                 </div>
               </div>
               <div class="row pt-4">
                 <div class="col-sm-12">
                   <button class="btn btn-primary w-100" type="submit">Register</button>
                 </div>
               </div>
             </form>
             </div>
             <div class="d-none pt-4" id="terms">
               <h1 class="text-capitalize text-center text-black-50">
												Terms and Conditions
											</h1>
											<h3>WHO WE ARE AND HOW TO CONTACT US</h3>
											<p><a href="https://www.scotland.org/">www.Scotland.org</a> is a site operated by the Brand Scotland team - a new approach and partnership between the Scottish Government, VisitScotland, Scottish Development International (the international arm of Scottish Enterprise) and Universities Scotland. (”We”).&nbsp;</p>
											<p>Our partner agencies details are as follows:</p>
											
											<p>The <strong>Scottish Government</strong> is the devolved government for Scotland and has its headquarters at St Andrew’s House, Regent Road, Edinburgh EH1 3DG. The Scottish Government’s VAT number is 888842551.</p>
             </div>
             <div class="d-none pt-4" id="privacy">
               <h1 class="text-capitalize text-center text-black-50">Privacy</h1>
               <div class="rte-container">
						<h3>1 Who we are</h3>

<p>Brand Scotland is a new approach and partnership between the Scottish Government, VisitScotland, Scottish Development International (the international arm of Scottish Enterprise) and Universities Scotland.</p>

<p>This Privacy Policy forms part of the Terms of Use of this website (www.Scotland.org), which is used specifically for consumers.</p>

<p>This Privacy Policy also relates to any other personal data Brand Scotland collects when providing services for consumers.</p>

<p>1.1 The <strong>Scottish Government </strong>is the devolved government for Scotland and had its headquarters at St Andrew’s House, Regent Road, Edinburgh EH1 3DG.&nbsp;</p>

<p>1.2 <strong>VisitScotland </strong>promotes Scottish tourism, and is a body established under the Development of Tourism Act 1969 and has its main office at Ocean Point 1, Edinburgh, EH6 6JH.</p>

<p>1.3 <strong>Universities Scotland </strong>is the representative body of Scotland’s 19 higher education institutions with a headquarters at Holyrood Park House, 106 Holyrood Road, Edinburgh EH8 8AS.</p>
					</div>
             </div>
             <div class="d-none pt-4" id="login">
             <form action="' . Util::get_file_path_uri(Regex::AJAX_URL) . '" class="row g-3 needs-validation" name="login" method="post" novalidate>
               <input type="hidden" id="action" name="action" value="login" />
               <input type="hidden" id="nonce" name="nonce" value="' . base64_encode('signup') . '" />
               <div class="row">
                 <div class="col-md-6 col-sm-6">
                   <label for="username" class="form-label">Username</label>
                 </div>
                 <div class="col-md-6 col-sm-6 text-right">
                   or <a class="btn text-primary" href="#" data-tab-target="#signup" role="button">Create an account</a>
                 </div>
               </div>
               <div class="row">
                 <div class="input-group has-validation">
                   <label class="input-group-text" for="username" id="username-label">@</label>
                   <input type="text" class="form-control" id="username" name="username" placeholder="username" pattern="' . Regex::USERID . '" aria-describedby="username-label" required />
                   <div class="valid-feedback">
                     Looks good!
                   </div>
                   <div class="invalid-feedback">
                     Please enter a valid username.
                   </div>
                 </div>
               </div>
               <div class="row pt-3">
                 <div class="input-group has-validation">
                   <label class="input-group-text bi-key" for="password" id="password-label"></label>
                   <input type="text" class="form-control" id="password" name="password" placeholder="password" pattern="' . Regex::USERID . '" aria-describedby="password-label" required />
                   <div class="valid-feedback">
                     Looks good!
                   </div>
                   <div class="invalid-feedback">
                     Please enter a valid password.
                   </div>
                 </div>
               </div>
               <div class="row pt-3">
                 <div class="col-md-6 col-sm-6">
                   <div class="form-check">
                     <input class="form-check-input" type="checkbox" value="remember" id="remember" name="remember" />
                     <label class="form-check-label" for="remember"> Remember me</label>
                     <div class="invalid-feedback">
                       You must agree before submitting.
                     </div>
                   </div>
                 </div>
                 <div class="col-md-6 col-sm-6 text-right">
                   or <a class="btn text-primary" href="#" data-tab-target="#forget" role="button">Forgot Password?</a>
                 </div>
               </div>
               <div class="row pt-4">
                 <div class="col-sm-12">
                   <button class="btn btn-primary w-100" type="submit">Login</button>
                 </div>
               </div>
             </form>
             </div>
             <div class="d-none pt-4" id="forget">
             <form action="' . Util::get_file_path_uri(Regex::AJAX_URL) . '" class="row g-3 needs-validation text-center" name="forget" method="post" novalidate>
               <input type="hidden" id="action" name="action" value="forget" />
               <input type="hidden" id="nonce" name="nonce" value="' . base64_encode('forget') . '" />
               <h5 class="mb-0">Forgot your password?</h5>
               <small>Enter your email and we\'ll send you a reset link.</small>
               <div class="row pt-2">
                 <div class="input-group has-validation">
                   <label class="input-group-text" for="reset" id="reset-label">@</label>
                   <input type="email" class="form-control" id="reset" name="reset" placeholder="email" pattern="' . Regex::EMAIL . '" aria-describedby="reset-label" required />
                   <div class="valid-feedback">
                     Looks good!
                   </div>
                   <div class="invalid-feedback">
                     Please enter a valid email.
                   </div>
                 </div>
               </div>
               <div class="row pt-3">
                 <div class="col-sm-12">
                   <button class="btn btn-primary w-100" type="submit">Send reset link</button>
                 </div>
               </div>
             </form>
             </div>
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
           </div>
</div>
</div>
</div>' : '';
        }
    }
