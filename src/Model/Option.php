<?php
    namespace Roli\Model;

    use Roli\Utilities\Utility as Util;
    /**
     * The Option class use for application and users options
     */
    class Option extends Primitive\Base
    {
        protected array  $options;
        private Database $database;
        /**
         * @inheritDoc
         */
        public function __construct($defaults = null)
        {
            parent::__construct($defaults);
            // * Load flat file options
            $this->database = new Database();
            $this->options  = $this->load_options();
            // * Load flat file options to database
            $this->sync_options();
        }
        /**
         * Load options from file
         *
         * @return array
         */
        private function load_options()
        : array
        {
            return is_readable($filename = Util::get_file_path('src/Data/Configure/config.inc')) ? (array)require $filename : [];
        }
        /**
         * Set and load options
         */
        private function sync_options()
        : void
        {
            if (empty($this->database->load_option($this->options)))
            {
                $this->options = $this->database->load_option($this->options, true);
            }
        }
        /**
         * Get meta tag description
         *
         * @param string $active_page The page id
         *
         * @return string
         */
        public function get_page_description(string $active_page)
        : string
        {
            return $this->database->get_page_description($active_page);
        }
        /**
         * Get the page title
         *
         * @param string $active_page The page id
         *
         * @return string
         */
        public function get_title(string $active_page)
        : string
        {
            // * @TODO fetch from database
            return '';
        }
        public function get_page(string $active_page)
        : string
        {
            return $this->database->get_page_contents($active_page);
        }
    }
