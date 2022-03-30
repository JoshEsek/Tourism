<?php
    namespace Roli\Constants;
    /**
     * Time Constants
     */
    class Time
    {
        const MINUTE_IN_SECONDS = 60;
        const HOUR_IN_SECONDS   = 60 * Time::MINUTE_IN_SECONDS;
        const DAY_IN_SECONDS    = 24 * Time::HOUR_IN_SECONDS;
        const WEEK_IN_SECONDS   = 7 * Time::DAY_IN_SECONDS;
        const MONTH_IN_SECONDS  = 30 * Time::DAY_IN_SECONDS;
        const YEAR_IN_SECONDS   = 365 * Time::DAY_IN_SECONDS;
    }