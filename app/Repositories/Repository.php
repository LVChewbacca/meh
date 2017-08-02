<?php
namespace Wiki_418\Repositories;
use Medoo\Medoo;

abstract class Repository
{
    /** @var \Medoo\Medoo */
    protected $db;

    public function __construct(Medoo $db)
    {
        $this->db = $db;
    }
}
