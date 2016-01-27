<?php

/**
 * @file
 * Pinterest component.
 */

namespace minnur\AMPProject\Components;

/**
 * Pinterest Component.
 */
class Pinterest extends Component {

  protected $width;
  protected $height;

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
    return '<amp-pinterest'
      . $this->setAttribute('width', $this->getWidth())
      . $this->setAttribute('height', $this->getHeight())
      . $this->getDataAttributes() 
      . '>'
      . $this->getPlaceholder()
      . $this->getFallback()
      . '</amp-pinterest>';
  }

}
