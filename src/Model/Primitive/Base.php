<?php
    namespace Roli\Model\Primitive;
    use stdClass;
    /**
     * Base structure class
     */
    class Base
    {
        /**
         * Set the properties of the object the values specified in the array
         *
         * @param array|\stdClass An array, the key of an element determines the name of the property
         */
        public function __construct(array|stdClass $defaults = null)
        {
            if (is_array($defaults) || is_object($defaults))
            {
                $this->set($defaults);
            }
        }
        /**
         * Set the properties of the object the values specified in the array
         *
         * @param array|\stdClass $properties An array, the key of an element determines the name of the property
         *
         * @internal
         */
        public function set(array|stdClass $properties)
        : void
        {
            foreach ($properties as $k => $v)
            {
                $this->{$k} = $v;
            }
        }
    }
