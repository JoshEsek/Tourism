<?php
	namespace Roli\Utilities;

	use \stdClass;
	use \WP_Post;

	/**
	 * Roli Utilities class
	 */
	class Util
	{
		/**
		 * Get the theme custom logo
		 *
		 * @param string|null $path The path to convert to uri
		 *
		 * @return string
		 */
		public static function get_custom_logo_src(string $path = null)
		: string
		{
			if (empty($path) && has_custom_logo())
			{
				return esc_url(wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full')[0]);
			}

			return self::get_template_uri($path);
		}
		/**
		 * Retrieves template directory URI for current theme.
		 *
		 * @param string $path The theme file path
		 *
		 * @return string
		 */
		public static function get_template_uri(string $path)
		: string
		{
			return get_template_directory_uri() . '/' . preg_replace('%^[\/\\\\]%m', '\'', $path);
		}

		/**
		 * Retrieves template directory path for current theme.
		 *
		 * @param string $path The theme file path
		 *
		 * @return string
		 */
		public static function get_template_url(string $path)
		: string
		{
			return get_template_directory() . '/' . preg_replace('%^[\/\\\\]%m', '\'', $path);
		}

	}
