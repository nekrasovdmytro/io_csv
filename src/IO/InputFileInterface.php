<?php

namespace IO;

/**
 * Interface InputFileInterface
 * @package IO
 * @author Dmytro Nekrasov <dmytro.nekrasov@internetstores.com>
 */
interface InputFileInterface
{
    public function getPath(): ?string;
    public function getName(): ?string;

    /**
     * @return mixed
     */
    public function getInput(): \Generator;
}