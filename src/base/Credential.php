<?php

namespace zafarjonovich\DbBackuper\base;

class Credential
{
    protected array $credential;

    public function __construct(array $credential)
    {
        $this->credential = $credential;
    }

    protected function get($name)
    {
        if (!isset($this->credential[$name])) {
            throw new \Exception("$name not found in credentials");
        }

        return $this->credential[$name];
    }

    public function getUsername()
    {
        return $this->get('username');
    }

    public function getPassword()
    {
        return $this->get('password');
    }

    public function getHost()
    {
        return $this->get('host');
    }

    public function getName()
    {
        return $this->get('name');
    }

    public function getCharset()
    {
        return $this->get('charset');
    }

    public function getDirectory()
    {
        return $this->get('directory');
    }

    public function getDriver()
    {
        return $this->get('driver');
    }

    public function getNamePrefix()
    {
        return $this->get('namePrefix');
    }

    public function getBackupBaseName()
    {
        return $this->getNamePrefix().
            date('Y_m_d_H_i');
    }
}