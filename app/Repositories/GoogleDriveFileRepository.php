<?php

namespace App\Repositories;

use App\Contracts\Repositories\FileRepository;
use Illuminate\Support\Facades\Storage;

final class GoogleDriveFileRepository implements FileRepository
{
    /**
     * The domain of the files.
     *
     * @var string
     */
    private static string $DRIVE_URL = 'https://docs.google.com/uc?export=view&id=';

    /**
     * Save the file on the storage.
     *
     * @param mixed $file
     * @param string|null $fileName
     * @return  string|null
     */
    public function save($file, ?string $fileName = null): ?string
    {
        if (is_null($fileName)) {
            $fileName = $file->getFilename();
        }

        $fileContent = file_get_contents($file);

        Storage::disk('google')->put($fileName, $fileContent);

        return $this->getFileId($fileName);
    }

    /**
     * Build the url by file id.
     *
     * @param string $id
     * @return string
     */
    public function findUrl(string &$id): string
    {
        return self::$DRIVE_URL . $id;
    }

    /**
     * Find the file id by the filename.
     *
     * @param string $filename
     * @return string|null
     */
    private function getFileId(string &$filename): ?string
    {
        $contents = collect(Storage::disk('google')->listContents());

        $file = $contents
            ->where('type', '=', 'file')
            ->where('filename', '=', pathinfo($filename, PATHINFO_FILENAME))
            ->where('extension', '=', pathinfo($filename, PATHINFO_EXTENSION))
            ->first(); // there can be duplicate file names!

        return $file['path'];
    }
}
