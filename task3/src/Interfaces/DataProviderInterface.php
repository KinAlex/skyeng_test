<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 22.10.18
 * Time: 23:21
 */

namespace src\Interfaces;


interface DataProviderInterface
{
    public function get(array $request);
}