<?php

namespace App\Providers;

use Google_Service_Drive;

class GoogleDriveAdapter extends \Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter
{
    /**
     * @return Google_Service_Drive
     */
    public function getService(): Google_Service_Drive
    {
        return $this->service;
    }
}
