<?php


namespace App\Services;


class Downloader
{
    public $speed = 0;
    public $mime = 'application/octet-stream';

    /**
     * @param int $speed
     */
    public function setSpeed(int $speed): void
    {
        $this->speed = $speed;
    }

    public function download($path, $name = null)
    {
        dd($this->speed);
    }

    /**
     * @param string $mime
     */
    public function setMime(string $mime): void
    {
        $this->mime = $mime;
    }
}
