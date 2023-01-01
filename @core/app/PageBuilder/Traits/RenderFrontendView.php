<?php

namespace App\PageBuilder\Traits;

trait RenderFrontendView
{
    public static function view_render($path, $data = [])
    {
        return view('pagebuilder::'.$path,compact('data'))->render();
    }

}