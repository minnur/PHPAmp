<?php

/**
 * @file
 * Video component.
 */

namespace minnur\AMPProject\Components;

/**
 * Video Component.
 */
class Video extends Component {

  protected $src;
  protected $width;
  protected $height;
  protected $poster;
  protected $source;
  protected $autoplay;
  protected $loop;
  protected $muted;
  protected $controls;

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
   * Setter for poster.
   */
  public function setPoster($value) {
    $this->poster = (string) $value;
    return $this;
  }

  /**
   * Getter for poster.
   */
  public function getPoster() {
    return $this->poster;
  }

  /**
   * Setter for source.
   */
  public function setSource(Array $items) {
    foreach ($items as $mime => $src) {
      $this->source[] = array(
        'type' => $mime,
        'src'  => $src,
      );
    }
    return $this;
  }

  /**
   * Getter for source.
   */
  public function getSource() {
    $tag = '';
    foreach ($this->source as $item) {
      $tag .= '<source type="' . $item['type'] . '" src="' . $item['src'] . '">';
    }
    return $tag;
  }

  /**
   * Setter for autoplay.
   */
  public function setAutoplay(Bool $value) {
    $this->autoplay = (bool) $value;
    return $this;
  }

  /**
   * Getter for autoplay.
   */
  public function isAutoplay() {
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
   * Setter for muted.
   */
  public function setMuted(Bool $value) {
    $this->muted = (bool) $value;
    return $this;
  }

  /**
   * Getter for muted.
   */
  public function isMuted() {
    return $this->muted;
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
    if (empty($this->getSrc())) {
      $this->triggerError('Required attribute is missing.');
    }
  }

  /**
   * Render tag.
   */
  public function render() {
    parent::render();
    return '<amp-video'
      . $this->setAttribute('width', $this->getWidth())
      . $this->setAttribute('height', $this->getHeight())
      . $this->setAttribute('src', $this->getSrc())
      . $this->setAttribute('poster', $this->getPoster())
      . $this->setAttribute('autoplay', $this->isAutoplay())
      . $this->setAttribute('loop', $this->isLoop())
      . $this->setAttribute('muted', $this->isMuted())
      . $this->setAttribute('controls', $this->isControls())
      . '>'
      . $this->getPlaceholder()
      . $this->getFallback()
      . $this->getSource()
      . '</amp-video>';
  }

}
