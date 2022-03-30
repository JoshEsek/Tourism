<?php
    namespace Roli\Users;

    use Roli\Model\Primitive\Base;
    use stdClass;
    /**
     * Manage The user accounts
     */
    class User extends Base
    {
        public static int $ID;
        /**
         * Get an instance of this class
         *
         * @return \stdClass|\Roli\Users\User
         */
        public static function get_current_user()
        : stdClass|User
        {
            if (isset(self::$ID))
            {
                return new User(['ID' => self::$ID]);
            }
            else
            {
                $user     = new stdClass();
                $user->ID = 0;

                return $user;
            }
        }
    }