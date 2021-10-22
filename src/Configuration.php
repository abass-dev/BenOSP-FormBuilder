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
     * @var array
     */
    private $configs = [];
    
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
    * @param array[] $configs
    * @return void
    */
    public function __construct(array $configs = [])
    {
        if (count($configs) > 1) {
            foreach ($configs as $value) {
                if (preg_match("/--public-dir=/", $value)) {
                       $public  = str_ireplace("--public-dir=", "",$value);
                       if (strlen($public) < 2) {
                           die("\33[0m\33[41mInvalide --public-dir value");
                       } else {
                           $this->configs["public-dir"] = $public;
                       }
                }
                if (preg_match("/--assets-dir=/", $value)) {
                       $assets = str_ireplace("--assets-dir=", "",$value);
                       if (strlen($assets) < 2) {
                           die("\33[0m\33[41mInvalide --assets-dir value");
                       } else {
                           $this->configs["assets-dir"] = $assets;
                       }
                }
                if (preg_match("/--styles=/", $value)) {
                       $style = str_ireplace("--styles=", "",$value);
                       if (strlen($style) < 2) {
                           die("\33[0m\33[41mInvalide --styles value");
                       } else { 
                           $this->configs["styles"] = $style;
                       }
                }
            }
        }
    }
    
    /**
     * Get configuration
     * 
     * @return array[]|null
     */
    public function getConfig()
    {
        if(count($this->configs) < 1) {
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
         return $this->configs;
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
        if (!is_null($this->getConfig()) && isset($this->getConfig()['public-dir'])) {
            if (!is_null($this->configFile)) {
                $dir = str_replace("/benosp-config.json/", "", $this->configFile);
                return $dir.$this->getConfig()["public-dir"];
            }
            return $this->getConfig()["public-dir"];
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
        if (!is_null($this->getConfig()) && isset($this->getConfig()['assets-dir'])) {
            return $this->getConfig()["assets-dir"];
        } elseif (is_string($this->getPublicDir())) {
            return "assets";
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
        if (!is_null($this->getConfig()) && isset($this->getConfig()['styles'])) {
            return $this->getConfig()["styles"];
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
        $this->getConfig();
        
        if (is_null($this->configFile) && count($this->configs) === 0 && !is_string($this->getPublicDir())) {
            try {
                throw new ConfigurationException("ERROR: Can't find configuration file");
            } catch (ConfigurationException $e) {
                echo "\33[0m\33[41m". $e->getMessage(). " in ". $e->getFile()." on line the ".$e->getLine(); 
                exit(1);
            }
        }
        
        $assetDir = str_replace("//", "/", "{$this->getPublicDir()}/{$this->getAssetsDir()}");
       
        if(!is_dir($this->getPublicDir())) {
            mkdir($this->getPublicDir(), 0777, true);
        }
        if(!is_dir($assetDir)) {
            mkdir($assetDir, 0777, true);
        }
        
        if (is_dir("vendor/twbs/bootstrap/dist/")) {
            $bootstrap = "vendor/twbs/bootstrap/dist/";
        } elseif(is_dir("./vendor/twbs/bootstrap/dist/")) {
            $bootstrap = "./vendor/twbs/bootstrap/dist/";
        } elseif(is_dir("../vendor/twbs/bootstrap/dist/")) {
            $bootstrap = "../vendor/twbs/bootstrap/dist/";
        } elseif(is_dir(".././vendor/twbs/bootstrap/dist/")) {
            $bootstrap = ".././vendor/twbs/bootstrap/dist/";
        } elseif(is_dir("../../vendor/twbs/bootstrap/dist/")) {
            $bootstrap = "../../vendor/twbs/bootstrap/dist/";
        } else {
            $bootstrap = null;
        }
        if(is_null($bootstrap)) {
            throw new ConfigurationException("FormBuilder configuration exception: Require bootstrap to build styles assets, try 'composer install'");
        } else {
            shell_exec("cp -r $bootstrap $assetDir");
            if (php_sapi_name() === 'cli') {
                echo "\33[0m\33[44mSUCCESS:\n\n\nAssets was built successfully in ./$assetDir directory\n\n".PHP_EOL;
            }
        }
    }
}
