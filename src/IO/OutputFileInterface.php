<?php

namespace IO;

/**
 * Interface OutputFileInterface
 * @package IO
 * @author Dmytro Nekrasov <dmytro.nekrasov@internetstores.com>
 */
interface OutputFileInterface
{
    public function getData(): array;
    public function getFileName(): string;
    public function output(): void;
}