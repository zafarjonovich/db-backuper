<?php

namespace zafarjonovich\DbBackuper\base;

abstract class Driver
{
    abstract public function backup(Credential $credential);
    abstract public function clear(Credential $credential);
}