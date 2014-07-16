<?php namespace Coinon\AutoVersion;

class AutoVersion {

    /**
     * Physical path to web server document root.
     * We'll locate assets relatively to it.
     * 
     * @var string
     */
    protected static $documentRoot;


    /**
     * @param string $documentRoot Physical path to web server document root
     */
    public static function setDocumentRoot($documentRoot)
    {
        static::$documentRoot = $documentRoot;
    }

    /**
     * Get versioned asset file name
     * 
     * @param  string $asset asset file name, including path relative to web server document roor
     * @return string        unmodified $asset if the file doesn't exist
     */
    public static function asset($asset)
    {
        $assetServerPath = static::$documentRoot . DIRECTORY_SEPARATOR . $asset;
        $version = static::version($assetServerPath);

        return $asset . ($version ? '?'.$version : '');
    }

    /**
     * Return asset version using timestamp implementation
     * 
     * @param  string $assetPath physical path to asset on local server
     * @return string
     */
    protected static function version($assetPath)
    {
        return static::timestamp($assetPath);
    }

    /**
     * Fetch asset timestamp
     * 
     * @param  string $assetPath
     * @return string             timestamp of $assetPath if the file exists or empty string if it doesn't
     */
    protected static function timestamp($assetPath)
    {
        return file_exists($assetPath) ? filemtime($assetPath) : '';
    }

} 