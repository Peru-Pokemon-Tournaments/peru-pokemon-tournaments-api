<?php

namespace App\Contracts\Repositories;

interface FileRepository
{
    /**
     * Save the file on the storage
     *
     * @param   mixed $file
     * @param   ?string $name
     * @return  string|null
     */
    public function save(mixed $file, ?string $name = null);


    /**
     * Build the url by file id
     *
     * @param   string $id
     * @return  string
     */
    public function findUrl(string &$id);
}
