<?php

namespace zafarjonovich\DbBackuper;

use zafarjonovich\DbBackuper\base\Credential;
use zafarjonovich\DbBackuper\base\Driver;
use zafarjonovich\DbBackuper\drivers\MysqlDriver;

class Backuper
{
    protected array $drivers = [
        'mysql' => MysqlDriver::class
    ];

    public function __construct(array $drivers = [])
    {
        if (!empty($drivers)) {
            $this->drivers = $drivers;
        }
    }

    public function backup(array $credentials)
    {
        try {
            foreach ($credentials as $credential) {
                $credential = new Credential($credential);

                if (!isset($this->drivers[$credential->getDriver()])) {
                    throw new \Exception("{$credential->getDriver()} is not found in drivers");
                }

                $class = $this->drivers[$credential->getDriver()];

                /** @var Driver $driver */
                $driver = new $class;

                $driver->backup($credential);
            }
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}