<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 22.10.18
 * Time: 23:45
 */

namespace src\Integration;


use src\Interfaces\DataProviderInterface;

class DataProvider implements DataProviderInterface
{
    private $host;
    private $user;
    private $password;

    /**
     * @param $host
     * @param $user
     * @param $password
     */
    public function __construct($host, $user, $password)
    {
        //TODO вынести настройки за интерфейс
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * @param array $request
     *
     * @return array
     */
    public function get(array $request)
    {
        // returns a response from external service
    }

}