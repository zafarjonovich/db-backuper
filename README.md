### This package helps to you backup databases

Simple usage, first create a backup runner file. For example, in the /home folder via name runner.php
The backup folder must be pre-created, For example, let's create a db_backups folder for the /home folder

```php
<?php

require_once 'vendor/autoload.php';

$credentials = [
    [
        'username' => 'username',
        'password' => 'password',
        'host' => 'localhost',
        'databaseName' => 'databaseName',
        'driver' => 'mysql',
        'charset' => 'utf8mb4',
        'directory' => '/home/db_backups',
        'namePrefix' => 'automated_backups_',
    ]
];

$backuper = new \zafarjonovich\DbBackuper\Backuper();
$backuper->backup($credentials);
```

Let's check, run the following command

`/usr/bin/php7.4 /home/runner.php`

If we look at /home/db_backups, the database will be backuped via named with current_time


If you need backup databaseses every n time, you must config crontab
Run following command
<br>
`crontab -e`

And add this configuration

`* * * * * /usr/bin/php7.4 /home/runner.php`
