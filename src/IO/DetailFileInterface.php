<?php

namespace IO;

/**
 * Interface DetailFileInterface
 * @package IO
 * @author Dmytro Nekrasov <dmytro.nekrasov@internetstores.com>
 */
interface DetailFileInterface
{
    public function getFileSize(): int;
    public function getFilePermission(): int;
}