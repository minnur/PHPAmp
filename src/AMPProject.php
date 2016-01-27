<?php

/**
 * @file
 * Base class for PHPAmpHTML (Google Accelerated Mobile Pages) classes.
 */

namespace PHPAmpHTML;

use PHPAmpHTML\Base;

/**
 * PHPAmpHTML class.
 */
class PHPAmpHTML extends \PHPAmpHTML\Base {

  protected $version = '0.1';

  /**
   * Getter for version.
   */
  public function getVersion() {
    return $this->version;
  }

}
