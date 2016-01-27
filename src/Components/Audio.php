<?php

/**
 * @file
 * Audio component.
 */

namespace minnur\AMPProject\Components;

/**
 * Audio Component.
 */
class Audio extends Component {

  protected $src;
  protected $width;
  protected $height;
  protected $source;
  protected $autoplay;
  protected $loop;
  protected $muted;

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
    return '<amp-audio'
      . $this->setAttribute('width', $this->getWidth())
      . $this->setAttribute('height', $this->getHeight())
      . $this->setAttribute('src', $this->getSrc())
      . $this->setAttribute('autoplay', $this->isAutoplay())
      . $this->setAttribute('loop', $this->isLoop())
      . $this->setAttribute('muted', $this->isMuted())
      . '>'
      . $this->getPlaceholder()
      . $this->getFallback()
      . $this->getSource()
      . '</amp-audio>';
  }

}
