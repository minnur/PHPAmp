<?php

/**
 * @file
 * Youtube component.
 */

namespace PHPAmpHTML\Components;

/**
 * Youtube Component.
 */
class Youtube extends \PHPAmpHTML\Base {

  protected $width;
  protected $height;
  protected $layout;

  /**
   * Setter for width.
   */
  public function setWidth($value) {
    $this->width = (int) $value;
    return $this;
  }

  /**
   * Getter for width.
   */
  public function getWidth() {
    return $this->width;
  }

  /**
   * Setter for height.
   */
  public function setHeight($value) {
    $this->height = (int) $value;
    return $this;
  }

  /**
   * Getter for height.
   */
  public function getHeight() {
    return $this->height;
  }

  /**
   * Setter for layout.
   */
  public function setLayout($value) {
    $this->layout = (string) $value;
    return $this;
  }

  /**
   * Getter for layout.
   */
  public function getLayout() {
    return $this->layout;
  }

  /**
   * Validate required attributes.
   */
  public function validate() {
    if (empty($this->getDataAttributes())) {
      $this->triggerError('Required attribute is missing.');
    }
  }

  /**
   * Render tag.
   */
  public function render() {
    parent::render();
    return '<amp-youtube'
      . $this->setAttribute('width', $this->getWidth())
      . $this->setAttribute('height', $this->getHeight())
      . $this->setAttribute('layout', $this->getLayout())
      . $this->getDataAttributes() 
      . '>'
      . $this->getPlaceholder()
      . $this->getFallback()
      . '</amp-youtube>';
  }

}
