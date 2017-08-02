<?php

namespace Wiki_418\Controllers;

class AboutController extends AbstractController
{

    public function aboutAction()
    {
        $template = 'about.view.php';
        return $this->render($template, []);
    }

}
