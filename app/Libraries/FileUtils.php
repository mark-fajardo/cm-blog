<?php

namespace App\Libraries;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

/**
 * Class FileUtils
 * @package App\Libraries
 * @author Rencielyne Macale <rencielyne.macale@gmail.com>
 * @since 2021.08.28
 */
class FileUtils
{
    /**
     * Contains filesystem disk.
     * @var Filesystem
     */
    protected $disk;

    /**
     * FileUtils constructor
     */
    public function __construct()
    {
        $this->disk = Storage::disk('ftp');
    }

    /**
     * Get file url.
     * @param string $file
     * @return string
     */
    public function url(string $file): string
    {
        return $this->disk->url($file);
    }

    /**
     * Check if file exists.
     * @param string $file
     * @return bool
     */
    public function exist(string $file): bool
    {
        return $this->disk->exists($file);
    }

    /**
     * Assign URL for multiple images.
     * @param array $aImages
     * @return array
     */
    public function assignMultipleURL(array $aImages): array
    {
        $aAssignedImages = [];
        foreach ($aImages as $sImage) {
            $aAssignedImages[] = $this->url($sImage);
        }

        return $aAssignedImages;
    }

    /**
     * Check if multiple images does exist.
     * Unset if not.
     * @param array $aImages
     * @return array
     */
    public function validateMultipleExist(array $aImages): array
    {
        foreach ($aImages as $iKey => $sImage) {
            if ($this->disk->exists($sImage) === false) {
                unset($aImages[$iKey]);
            }
        }

        return $aImages;
    }
}
