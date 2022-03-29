<?php
    namespace Roli\Constants;
    /**
     * Regex Constants
     */
    class Regex
    {
        const USERID    = '/^(?:[A-Z\d][A-Z\d_-]{5,10}|[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4})$/i';
        const PASSWORD  = '^(?=[\x20-\x7E]*?[A-Z])(?=[\x20-\x7E]*?[a-z])(?=[\x20-\x7E]*?[0-9])[\x20-\x7E]{6,}$';
        const AJAX_URL  = 'ajax/';
        const EMAIL     = '/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$/';
        const PHP_EMAIL = '/\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,6}\b/';
    }