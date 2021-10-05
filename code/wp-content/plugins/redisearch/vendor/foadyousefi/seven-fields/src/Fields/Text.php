<?php

namespace SevenFields\Fields;

class Text extends Fields {
  
	/**
	 * @param object $name
	 */
  public static $name;

	/**
	 * @param object $label
	 */
  public static $label;

	/**
	 * @param object $description
	 */
  public static $description;

  /**
   * Initiate field.
   *
   * @since 0.1.0
   * @param string $name
   * @param string $label
   * @param string $description
   * @return function field_html()
   */
  public function __construct($name, $label, $description) {
    self::$name = $name;
    self::$label = $label;
    self::$description = $description;
    // Save value in as wp_option in database
    parent::save( self::$name, 'text' );
    return $this->field_html();
  }

  /**
   * Get field value, so we can use it to show current value.
   *
   * @since 0.1.0
   * @param
   * @return string $field_value
   */
  public static function get_value() {
    return get_option( self::$name, null );
  }

  /**
   * Set field name attr.
   *
   * @since 0.1.0
   * @param
   * @return string $field_name
   */
  public static function input_name() {
    $options_name = parent::$options_name;
    return $options_name . '[' . self::$name . ']';
  }

  /**
   * And the actual output markup of the field.
   *
   * @since 0.1.0
   * @param
   * @return
   */
  public function field_html() {
    ?>
    <div class="seven-field text-field">
      <div class="label"><?php _e( self::$label, 'seven-fields' ); ?></div>
      <input type="text" name="<?php echo self::input_name() ?>"
            value="<?php echo esc_attr( self::get_value() ); ?>" />
      <span class="desc"><?php _e( self::$description, 'seven-fields' ); ?></span>
    </div>
    <?php
  }
}