<?php

namespace Wiki_418\Controllers;

class ContactController extends AbstractController
{

    public function contactAction()
    {
        $template = 'contact.view.php';
        return $this->render($template, []);
    }

}
