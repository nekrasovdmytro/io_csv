<?php

namespace IO;

/**
 * Class CsvOutputFile
 * @package IO
 * @author Dmytro Nekrasov <dmytro.nekrasov@internetstores.com>
 */
class CsvOutputFile implements OutputFileInterface
{
    /**
     * @var string
     */
    protected $filename;

    /**
     * @var array
     */
    protected $data;

    /**
     * @var \SplFileObject
     */
    protected $file;

    public function __construct($filename = '', array $data)
    {
        $this->filename = $filename;
        $this->data = $data;

        $this->file = new \SplFileObject($this->filename, 'w+');
    }

    public function getFileName(): string
    {
        return $this->filename;
    }

    public function output($delimiter = ','): void
    {
        if (!$this->file->isFile()) {
            throw new \RuntimeException($this->file->getFilename() . ' file is not found');
        }

        if (!$this->file->isWritable()) {
            throw new \RuntimeException($this->file->getFilename() . ' file is not writable');
        }

        foreach ($this->getData() as $data) {
            $this->file->fputcsv($data, $delimiter);
        }
    }

    public function getData(): array
    {
        return $this->data;
    }
}