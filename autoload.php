<?php
// @codingStandardsIgnoreFile
// @codeCoverageIgnoreStart
// this is an autogenerated file - do not edit
function autoloadbd7d47b5f43139f0b6815ed6c4f11023($class) {
    static $classes = null;
    if ($classes === null) {
        $classes = array(
            'phpamphtml\\base' => '/src/Base.php',
            'phpamphtml\\components\\ad' => '/src/Components/Ad.php',
            'phpamphtml\\components\\audio' => '/src/Components/Audio.php',
            'phpamphtml\\components\\brightcove' => '/src/Components/Brightcove.php',
            'phpamphtml\\components\\carousel' => '/src/Components/Carousel.php',
            'phpamphtml\\components\\facebook' => '/src/Components/Facebook.php',
            'phpamphtml\\components\\img' => '/src/Components/Img.php',
            'phpamphtml\\components\\instagram' => '/src/Components/Instagram.php',
            'phpamphtml\\components\\pinterest' => '/src/Components/Pinterest.php',
            'phpamphtml\\components\\pixel' => '/src/Components/Pixel.php',
            'phpamphtml\\components\\twitter' => '/src/Components/Twitter.php',
            'phpamphtml\\components\\video' => '/src/Components/Video.php',
            'phpamphtml\\components\\vine' => '/src/Components/Vine.php',
            'phpamphtml\\components\\youtube' => '/src/Components/Youtube.php',
            'phpamphtml\\phpamphtml' => '/src/AMPProject.php'
        );
    }
    $cn = strtolower($class);
    if (isset($classes[$cn])) {
        require dirname(__FILE__) . $classes[$cn];
    }
}
spl_autoload_register('autoloadbd7d47b5f43139f0b6815ed6c4f11023', true);
// @codeCoverageIgnoreEnd
