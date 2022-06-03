<?php

namespace zafarjonovich\DbBackuper\drivers;

use zafarjonovich\DbBackuper\base\Credential;
use zafarjonovich\DbBackuper\base\Driver;

class MysqlDriver extends Driver
{
    public function backup(Credential $credential)
    {
        $fullPath = $credential->getDirectory().'/'.$credential->getBackupBaseName().'.sql.gz';
        $command = "mysqldump --user={$credential->getUsername()} --password={$credential->getPassword()} --default-character-set={$credential->getCharset()} --single-transaction {$credential->getDatabaseName()} | gzip > \"{$fullPath}\"";
        exec($command);
    }

    public function clear(Credential $credential)
    {
        $command = "find \"{$credential->getDirectory()}\" -name {$credential->getNamePrefix()}* -mtime +8 -exec rm {} \;";
        exec($command);
    }
}