<?php
namespace Wiki_418;
interface ContainerInterface
{
    public function get(string $dependencyName);
    public function getParameter(string $paramName);
}