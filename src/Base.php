<?php

/**
 * @file
 * Base class for AMPProject (Google Accelerated Mobile Pages) classes.
 */

namespace PHPAmpHTML;

/**
 * Base class for AMPProject classes.
 */
abstract class Base {

  protected $data_attributes;
  protected $placeholder;
  protected $fallback;

  /**
   * Setter for data attributes.
   */
  public function setDataAttributes(Array $items) {
    foreach ($items as $item => $value) {
      $this->data_attributes[] = 'data-' . $item . '="' . $value . '"';
    }
    return $this;
  }

  /**
   * Getter for data attributes.
   */
  public function getDataAttributes() {
    return join(' ', $this->data_attributes);
  }

  /**
   * Setter for placeholder.
   */
  public function setPlaceholder($value) {
    $this->placeholder = (string) $value;
    return $this;
  }

  /**
   * Getter for placeholder.
   */
  public function getPlaceholder() {
    if (!empty($this->placeholder)) {
      // Check if the placeholder contains HTML tags.
      if (strlen($this->placeholder) != strlen(strip_tags($this->placeholder))) {
        return $this->placeholder;
      }
      else {
        return '<div placeholder>' . $this->placeholder . '</div>';
      }
    }
  }

  /**
   * Setter for fallback.
   */
  public function setFallback($value) {
    $this->fallback = (string) $value;
    return $this;
  }

  /**
   * Getter for fallback.
   */
  public function getFallback() {
    if (!empty($this->fallback)) {
      // Check if the fallback contains HTML tags.
      if (strlen($this->fallback) != strlen(strip_tags($this->fallback))) {
        return $this->fallback;
      }
      else {
        return '<div fallback>' . $this->fallback . '</div>';
      }
    }
  }

  /**
   * Print attribute.
   */
  protected function setAttribute($attribute, $value = '') {
    if (!empty($value) && !empty($attribute)) {
      return ' ' . $attribute . '="' . $value . '"';
    }
    else {
      if (!empty($attribute)) {
        return ' ' . $attribute;
      }
    }
  }

  /**
   * Define optional properties.
   */
  protected function optional() {
    return [
      'data_attributes',
      'placeholder',
      'fallback',
    ];
  }

  /**
   * Render AMP tag.
   */
  public function render() {
  }

  /**
   * Error handler.
   *
   * @param string $message
   *   Message.
   * @param int $message_type
   *   Matching E_USER_ERROR|E_USER_WARNING|E_USER_NOTICE|E_USER_DEPRECATED.
   */
  public function triggerError($message, $message_type = E_USER_NOTICE) {
    $trace = debug_backtrace();
    trigger_error($message . ' in ' . $trace[0]['file'] . ' on line ' .
      $trace[0]['line'], $message_type);
  }

  /**
   * Implements __destruct().
   */
  public function __destruct() {
    // Define empty attribute values.
    // @see http://php.net/manual/en/language.types.boolean.php#language.types.boolean.casting
    $present = function($value) {
      if ($value === NULL) {
        return FALSE;
      }
      if (is_string($value)) {
        return $value !== '';
      }
      if (is_array($value)) {
        return (bool) $value;
      }
      return TRUE;
    };

    // Protected attributes are not outputted via parent::__toString().
    $out = get_object_vars($this);

    // Required attributes.
    $names = array_diff(array_keys($out), $this->optional());
    foreach ($names as $name) {
      if (!isset($out[$name]) || !$present($out[$name])) {
        $this->triggerError("Missing required attribute ${name}.");
        return NULL;
      }
    }

    // Unset optional attributes.
    $names = array_intersect($this->optional(), array_keys($out));
    foreach ($names as $name) {
      if (!$present($out[$name])) {
        unset($out[$name]);
      }
    }

    // Return empty object, not array.
    if (empty($out)) {
      return new \stdClass();
    }

    return $out;
  }

}
