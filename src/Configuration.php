<?php
/*
 * This file is part of the BenOSP(Abass Ben Cheik Open-source Projet)
 *
 * (c) Abass Ben Cheik <abass@todaysdev.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types = 1);

namespace BenOSP;

use BenOSP\Exception\ConfigurationException;

/**
* Form builder configuration
*
* @author Abass Ben Cheik <abass@todaysdev.com>
*/
class Configuration
{
    /**
     * @var string
     */
    private $configFile;
    
    /**
     * @var string
     */
    private $publicDir;
    
    /**
     * @var string
     */
    private $assetsDir;
    
    /**
     * @var string
     */
    private $styles;
    
    /**
    * Form builder configuration constructor
    *
    * @return void
    */
    public function __construct()
    {}
    
    /**
     * Get configuration
     * 
     * @return array[]|null
     */
    public function config(array $configs = [])
    {
        if(count($configs) === 0) {
            $file = null;
            for ($i = 1; $i < 5; $i++) {
                    if(file_exists(dirname(__DIR__, $i)."/benosp-config.json")) {
                        $this->configFile = dirname(__DIR__, $i)."/benosp-config.json";
                        break;
                }
            }
            if (!is_null($this->configFile)) {
                $file = json_decode(\file_get_contents($this->configFile), true);
            }
            return $file;
        } else {
         return $configs;
        }
    }
    
    /**
     * Set public detectory/web root 
     * 
     * @param string $publicDir
     * @return void
     */
    public function setPublicDir(string $publicDir): void
    {
        $this->publicDir = $publicDir;
    }

    /**
     * Get public detectory/web root 
     * 
     * @return string
     */
    public function getPublicDir(): string
    {
        if (!is_null($this->config()) && isset($this->config()['public-dir'])) {
            return $this->config()["public-dir"];
        }
       return $this->publicDir;
    }
    
    /**
     * Set assets directory 
     * 
     * @param string $assetsDir
     * @return void
     */
    public function setAssetsDir(string $assetsDir): void
    {
        $this->assetsDir = $assetsDir;
    }
    
    /**
     * Get assets directory 
     * 
     * @return string
     */
    public function getAssetsDir(): string
    {
        if (!is_null($this->config()) && isset($this->config()['assets-dir'])) {
            return $this->config()["assets-dir"];
        }
        return $this->assetsDir;
    }
    
    /**
     * Set CSS framework (e.g: bootstrap...)
     * 
     * @param string $styles
     * @return void
     */
    public function setStyles(string $styles): void
    {
        $this->styles = $styles;
    }
    
    /**
     * Get CSS framework
     * 
     * @return string
     */
    public function getStyles(): string
    {
        if (!is_null($this->config()) && isset($this->config()['styles'])) {
            return $this->config()["styles"];
        }
        return $this->styles;
    }
    
    /**
     * Assets builder 
     * 
     * @return void
     * @throws ConfigurationException
     */
    public function buildAssets()
    {
        $this->config();
        $dir = str_replace("benosp-config.json", "", $this->configFile);
       
        $findPublicDir = $dir . $this->getPublicDir();
        $findAssetsDir = $findPublicDir . $this->getAssetsDir();
       
        if(!is_dir($findPublicDir)) {
            mkdir($findPublicDir, 0777, true);
        }
        if(!is_dir($findAssetsDir)) {
            mkdir($findAssetsDir, 0777, true);
        }
        
        $bootstrap = $dir."vendor/twbs/bootstrap/dist/";
        
        if(!is_dir($bootstrap)) {
            throw new ConfigurationException("FormBuilder configuration exception: Require bootstrap to build styles assets, try 'composer install'");
        } else {
            shell_exec("cp -r $bootstrap $findAssetsDir");
            if (php_sapi_name() === 'cli') {
                echo "\33[0m\n\n\33[44mSUCCESS:\n\n\nAssets was built successfully in ./{$this->getPublicDir()}{$this->getAssetsDir()} directory\n\n".PHP_EOL;
            }
        }
    }
}
