<?php

namespace Bezbeli;

class BsVideo
{
    public function __construct()
    {
        add_filter('the_content', [$this, 'responsiveEmbeds']);
    }

    // * Filter for adding wrappers around embedded objects

    public function responsiveEmbeds($content)
    {
        $content = preg_replace("/<object/Si", '<div class="embed-responsive embed-responsive-16by9 mb-3"><object', $content);
        $content = preg_replace("/<\/object>/Si", '</object></div>', $content);
        $content = preg_replace("/<iframe.+?src=\"(.+?)\"/Si", '<div class="embed-responsive embed-responsive-16by9 mb-3"><iframe class="embed-responsive-item" src="\1" frameborder="0" allowfullscreen>', $content);
        $content = preg_replace("/<\/iframe>/Si", '</iframe></div>', $content);
        return $content;
    }
}
