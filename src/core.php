<?php

namespace pechenki\pcs\src;

/**
 *
 */
class core{


    private $settings;
    public $customCss;

    /**
     *
     */
    public function __construct()
    {
        $this->settings['header'] =  get_option('pc_header');
        $this->settings['footer'] =  get_option('pc_footer');
    }



    /**
     * @param string $name
     * @return mixed|null
     */
    public function __get(string $name)
    {
        if (array_key_exists($name, $this->settings) && !empty($this->settings[$name])) {

            return $this->settings[$name];
        }
        return null;

    }

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {

        $this->settings[$name] = $value;
    }
    /**
     * @param $path
     * @param array $vars
     * @return mixed
     */
    protected function render($path, $vars = [])
    {
        $pathBase = PCS_DIR;
        extract($vars);
        return require $pathBase . $path . '.php';

    }




}