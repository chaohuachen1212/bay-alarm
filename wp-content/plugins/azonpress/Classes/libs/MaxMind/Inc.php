<?php

if (!class_exists('MaxMind\Db\Reader')) {
    include __DIR__.'/Db/Reader.php';
    include __DIR__.'/Db/Reader/Decoder.php';
    include __DIR__.'/Db/Reader/InvalidDatabaseException.php';
    include __DIR__.'/Db/Reader/Metadata.php';
    include __DIR__.'/Db/Reader/Util.php';
}
