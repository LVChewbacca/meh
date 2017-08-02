<?php
namespace Wiki_418\Controllers;
interface ControllerInterface
{
    public function render(string $template, array $content = []) : string;
}