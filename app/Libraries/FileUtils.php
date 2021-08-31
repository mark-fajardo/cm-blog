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
}
