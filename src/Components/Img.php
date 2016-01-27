<?php

/**
 * @file
 * Image component.
 */

namespace PHPAmpHTML\Components;

/**
 * Image Component.
 */
class Img extends \PHPAmpHTML\Base {

  protected $width;
  protected $height;
  protected $src;
  protected $is_figure;
  protected $caption;
  protected $srcset;
  protected $alt;
  protected $attribution;
  protected $layout;
  protected $media;
  protected $palceholder;

  /**
   * Define optional properties.
   */
  protected function optional() {
    return [
      'data_attributes',
      'placeholder',
      'fallback',
      'is_figure',
      'caption',
      'srcset',
      'alt',
      'attribution',
      'layout',
      'media',
      'palceholder',
    ];
  }

  /**
   * Setter for figure.
   */
  public function setFigure(Bool $value) {
    $this->is_figure = (bool) $value;
    return $this;
  }

  /**
   * Getter for figure.
   */
  public function isFigure() {
    return $this->is_figure;
  }

  /**
   * Setter for caption.
   */
  public function setCaption($value) {
    $this->caption = (string) $value;
    return $this;
  }

  /**
   * Getter for caption.
   */
  public function getCaption() {
    return $this->caption;
  }

  /**
   * Setter for alt.
   */
  public function setAlt($value) {
    $this->alt = (string) $value;
    return $this;
  }

  /**
   * Getter for alt.
   */
  public function getAlt() {
    return $this->alt;
  }

  /**
   * Setter for srcset.
   */
  public function setSrcset($value) {
    $this->srcset = (string) $value;
    return $this;
  }

  /**
   * Getter for srcset.
   */
  public function getSrcset() {
    return $this->srcset;
  }

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
   * Setter for attribution.
   */
  public function setAttribution($value) {
    $this->attribution = (string) $value;
    return $this;
  }

  /**
   * Getter for attribution.
   */
  public function getAttribution() {
    return $this->attribution;
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
   * Setter for media.
   */
  public function setMedia($value) {
    $this->media = (string) $value;
    return $this;
  }

  /**
   * Getter for media.
   */
  public function getMedia() {
    return $this->media;
  }

  /**
   * Setter for palceholder.
   */
  public function setAsPlaceholder(Bool $value) {
    $this->palceholder = (bool) $value;
    return $this;
  }

  /**
   * Getter for palceholder.
   */
  public function isPlaceholder() {
    return $this->palceholder;
  }

  /**
   * Render tag.
   */
  public function render() {
    $image = '<amp-img'
      . $this->setAttribute('src', $this->getSrc())
      . $this->setAttribute('alt', $this->getAlt())
      . $this->setAttribute('width', $this->getWidth())
      . $this->setAttribute('height', $this->getHeight())
      . $this->setAttribute('srcset', $this->getSrcset())
      . $this->setAttribute('attribution', $this->getAttribution())
      . $this->setAttribute('layout', $this->getLayout())
      . $this->setAttribute('media', $this->getMedia())
      . $this->setAttribute('placeholder', $this->isPlaceholder())
      . '>'
      . $this->getPlaceholder()
      . $this->getFallback()
      . '</amp-img>';
    if ($this->isFigure()) {
      return '<figure>'
        . $image
        . (!empty($this->getCaption())
            ? '<figcaption>' . $this->getCaption() . '</figcaption>'
            : ''
          )
        . '</figure>';
    }
    else {
      return $image;
    }
  }

}
