<?php

/**
 * @file
 * Base class for AMPProject (Google Accelerated Mobile Pages) classes.
 */

namespace minnur\AMPProject;

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
        return = '<div fallback>' . $this->fallback . '</div>';
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
   * Validate attributes.
   */
  public function validate(Array $components) {
    // Implement validation.
  }

  /**
   * Render AMP tag.
   */
  public function render() {
    // Validate attributes before render.
    $this->validate();
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

}
