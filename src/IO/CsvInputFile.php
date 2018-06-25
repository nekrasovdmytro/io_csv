<?php

namespace IO;

/**
 * Class CsvInputFile
 * @package IO
 * @author Dmytro Nekrasov <dmytro.nekrasov@internetstores.com>
 */
class CsvInputFile implements InputFileInterface, DetailFileInterface
{
    /**
     * @var string
     */
    protected $path;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var \SplFileObject
     */
    protected $file;

    public function __construct($path, $name)
    {
        $this->path = rtrim($path, '/') . '/';
        $this->name = $name;

        $file = $this->path . $this->name;
        if (!file_exists($file)) {
            throw new \RuntimeException($file . ' - file not found');
        }

        $this->file = new \SplFileObject($this->path . $this->name);
    }

    public function getFileSize(): int
    {
        return $this->file->getSize();
    }

    public function getFilePermission(): int
    {
        return $this->file->getPerms();
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $delimiter
     * @return mixed
     */
    public function getInput($delimiter = ','): \Generator
    {
        if (!$this->file->isWritable()) {
            return new \RuntimeException($this->file->getFilename() . ' is not writable');
        }

        if (!$this->file->isFile()) {
            return new \RuntimeException($this->file->getFilename() . ' is not a file');
        }

        while (!$this->file->eof()) {
            yield $this->file->fgetcsv($delimiter);
        }
    }
}