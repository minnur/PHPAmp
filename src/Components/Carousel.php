<?php

/**
 * @file
 * Carousel component.
 */

namespace minnur\AMPProject\Components;

/**
 * Carousel Component.
 */
class Carousel extends Component {

  protected $width;
  protected $height;
  protected $type;
  protected $autoplay;
  protected $loop;
  protected $layout;
  protected $controls;
  protected $images;

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
    $this->type = (int) $value;
    return $this;
  }

  /**
   * Getter for type.
   */
  public function getType() {
    return $this->type;
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
   * Setter for images.
   */
  public function setImages(Array $items) {
    foreach ($items as $image) {
      $this->images[] = $image;
    }
    return $this;
  }

  /**
   * Getter for images.
   */
  public function getImages() {
    $tag = '';
    foreach ($this->images as $image) {
      $tag .= $image;
    }
    return $tag;
  }

  /**
   * Setter for autoplay.
   */
  public function setAutoplay($value) {
    $this->autoplay = $value;
    return $this;
  }

  /**
   * Getter for autoplay.
   */
  public function getAutoplay() {
    return $this->autoplay;
  }

  /**
   * Setter for loop.
   */
  public function setLoop(Bool $value) {
    $this->loop = (bool) $value;
    return $this;
  }

  /**
   * Getter for loop.
   */
  public function isLoop() {
    return $this->loop;
  }

  /**
   * Setter for controls.
   */
  public function setControls(Bool $value) {
    $this->controls = (bool) $value;
    return $this;
  }

  /**
   * Getter for controls.
   */
  public function isControls() {
    return $this->controls;
  }

  /**
   * Validate required attributes.
   */
  public function validate() {
    if (empty($this->getImages())) {
      $this->triggerError('Required attribute is missing.');
    }
  }

  /**
   * Render tag.
   */
  public function render() {
    parent::render();
    return '<amp-carousel'
      . $this->setAttribute('width', $this->getWidth())
      . $this->setAttribute('height', $this->getHeight())
      . $this->setAttribute('poster', $this->getPoster())
      . $this->setAttribute('autoplay', $this->getAutoplay())
      . $this->setAttribute('loop', $this->isLoop())
      . $this->setAttribute('muted', $this->isMuted())
      . $this->setAttribute('controls', $this->isControls())
      . '>'
      . $this->getPlaceholder()
      . $this->getFallback()
      . $this->getImages()
      . '</amp-carousel>';
  }

}
