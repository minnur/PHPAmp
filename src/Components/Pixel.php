<?php

/**
 * @file
 * Pixel component.
 */

namespace PHPAmpHTML\Components;

/**
 * Pixel Component.
 */
class Pixel extends \PHPAmpHTML\Base {

  protected $src;

  /**
   * Setter for src.
   */
  public function setSrc($value) {
    $this->src = (string) $value;
    return $this;
  }

  /**
   * Getter for src.
   */
  public function getSrc() {
    return $this->src;
  }

  /**
   * Validate required attributes.
   */
  public function validate() {
    if (empty($this->getSrc())) {
      $this->triggerError('Required attribute is missing.');
    }
  }

  /**
   * Render tag.
   */
  public function render() {
    parent::render();
    return '<amp-pixel'
      . $this->setAttribute('src', $this->getSrc())
      . '></amp-pixel>';
  }

}
