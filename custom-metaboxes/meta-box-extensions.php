<?php
if ( ! class_exists( 'RWMB_Word_Field' ) ) 
{
	class RWMB_Word_Field 
	{
		/**
		 * Get field HTML
		 *
		 * @param string $html
		 * @param mixed  $meta
		 * @param array  $field
		 *
		 * @return string
		 */
		static function html( $html, $meta, $field ) 
		{
			$val   = "{$meta}";
			$id    = " id='{$field['id']}'";
			$html .= "<p class='rwmb-word' {$id}>{$val}</p>";

			return $html;
		}
	}
}
if ( ! class_exists( 'RWMB_Button_Field' ) ) 
{
	class RWMB_Button_Field 
	{
		/**
		 * Get field HTML
		 *
		 * @param string $html
		 * @param mixed  $meta
		 * @param array  $field
		 *
		 * @return string
		 */
		static function html( $html, $meta, $field ) 
		{
			$id    = " id='{$field['id']}'";
			$name  = " {$field['name']}";
			$html .= "<a href='#' class='rwmb-button' {$id}>{$name}</a>";

			return $html;
		}
	}
}
if ( ! class_exists( 'RWMB_Hidden2_Field' ) )
{
	class RWMB_Hidden2_Field
	{
		/**
		 * Show begin HTML markup for fields
		 *
		 * @param string $html
		 * @param mixed  $meta
		 * @param array  $field
		 *
		 * @return string
		 */
		static function begin_html( $html, $meta, $field )
		{
			return '<div class="hidden">';
		}

		/**
		 * Get field HTML
		 *
		 * @param string $html
		 * @param mixed  $meta
		 * @param array  $field
		 *
		 * @return string
		 */
		static function html( $html, $meta, $field )
		{
			$val   = " value='{$meta}'";
			$name  = " name='{$field['id']}'";
			$id    = " id='{$field['id']}'";
			$html .= "<input type='hidden' class='rwmb-hidden'{$name}{$id}{$val} />";

			return $html;
		}
	}
}