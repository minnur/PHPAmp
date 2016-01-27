<?php

/**
 * @file
 * Ad component.
 */

namespace minnur\AMPProject\Components;

/**
 * Ad Component.
 */
class Ad extends Component {

  protected $width;
  protected $height;
  protected $type;

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
   * Setter for type.
   */
  public function setType($value) {
    $this->type = (string) $value;
    return $this;
  }

  /**
   * Getter for type.
   */
  public function getType() {
    return $this->type;
  }

  /**
   * Validate required attributes.
   */
  public function validate() {
    if (empty($this->getWidth()) || empty($this->getHeight()) || empty($this->getType())) {
      $this->triggerError('Required attributes are missing.');
    }
  }

  /**
   * Render tag.
   */
  public function render() {
    parent::render();
    return '<amp-ad' . $this->setAttribute('width', $this->getWidth())
      . $this->setAttribute('height', $this->getHeight())
      . $this->setAttribute('type', $this->getType())
      . $this->getDataAttributes() 
      . '>'
      . $this->getPlaceholder()
      . $this->getFallback() . '</amp-ad>';
  }

}
