<?php

/**
 * @file
 * Base class for AMPProject (Google Accelerated Mobile Pages) classes.
 */

namespace minnur\AMPProject;

use minnur\AMPProject\Base;

/**
 * AMPProject class.
 */
class AMPProject extends Base {

  protected $version = '0.1';

  /**
   * Getter for version.
   */
  public function getVersion() {
    return $this->version;
  }

}
