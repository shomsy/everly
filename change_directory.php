<?php


class Path
{
    const DIR_PATH_SEPARATOR = '/';
    const PARENT_DIRECTORY = '..';
    const NEXT_DIRECTORY = '.';

    /**
     * @var string
     */
    public string $currentPath;

    /**
     * Path constructor.
     *
     * @param $path
     */
    function __construct($path)
    {
        $this->currentPath = $path;
    }

    /**
     * @param  string  $direction
     *
     * @return string
     */
    public function cd(string $direction): string
    {
        $newDirectories = explode(self::DIR_PATH_SEPARATOR, $direction);
        $this->currentPath = explode(self::DIR_PATH_SEPARATOR, $this->currentPath);
        $firstIndex = strstr($direction, self::DIR_PATH_SEPARATOR);
        $firstPos = strpos($direction, self::DIR_PATH_SEPARATOR);

        if ($firstIndex && $firstPos === 0) {
            $newDirectories = explode(self::DIR_PATH_SEPARATOR, $direction);
            $this->currentPath = [];
        }

        foreach ($newDirectories as $newDirectory) {
            if ($newDirectory === self::NEXT_DIRECTORY) {
                continue;
            }

            if ($newDirectory === self::PARENT_DIRECTORY) {
                array_pop($this->currentPath);
            } else {
                array_push($this->currentPath, $newDirectory);
            }
        }

        return $this->currentPath = implode(self::DIR_PATH_SEPARATOR, $this->currentPath);
    }
}
