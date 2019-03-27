<?php

class MY_Loader extends CI_Loader
{

    /**
    * List of loaded DAO's
    *
    * @var	array
    */
    protected $_ci_daos = array();
    protected $_ci_business = array();

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Dao Loader
     *
     * Loads and instantiates dao's.
     *
     * @param	string	$dao		Dao name
     * @param	string	$name		An optional object name to assign to
     * @param	bool	$db_conn	An optional database connection configuration to initialize
     * @return	object
     * 
     * modified by Nguyen Luu Thanh Binh <nguyenluuthanhbinh@outlook.com>
     */

    public function dao($dao, $name = '', $db_conn = false)
    {
        if (empty($dao)) {
            return $this;
        } elseif (is_array($dao)) {
            foreach ($dao as $key => $value) {
                is_int($key) ? $this->dao($value, '', $db_conn) : $this->dao($key, $value, $db_conn);
            }

            return $this;
        }

        $path = '';

        // Is the dao in a sub-folder? If so, parse out the filename and path.
        if (($last_slash = strrpos($dao, '/')) !== false) {
            // The path is in front of the last slash
            $path = substr($dao, 0, ++$last_slash);

            // And the dao name behind it
            $dao = substr($dao, $last_slash);
        }

        if (empty($name)) {
            $name = $dao;
        }

        if (in_array($name, $this->_ci_daos, true)) {
            return $this;
        }

        $CI =& get_instance();
        if (isset($CI->$name)) {
            throw new RuntimeException('The dao name you are loading is the name of a resource that is already being used: '.$name);
        }

        if ($db_conn !== false && ! class_exists('CI_DB', false)) {
            if ($db_conn === true) {
                $db_conn = '';
            }

            $this->database($db_conn, false, true);
        }

        $app_path = APPPATH.'core'.DIRECTORY_SEPARATOR;
        if (file_exists($app_path.'Dao.php')) {
            load_class('Model', 'core');
            require_once($app_path.'Dao.php');
            if (! class_exists('CI_Model', false)) {
                throw new RuntimeException($app_path."Dao.php exists, but doesn't declare class CI_Model");
            }
        }

        $class = config_item('subclass_prefix').'Dao';
        if (file_exists($app_path.$class.'.php')) {
            require_once($app_path.$class.'.php');
            if (! class_exists($class, false)) {
                throw new RuntimeException($app_path.$class.".php exists, but doesn't declare class ".$class);
            }
        }

        $dao = ucfirst($dao);
        if (! class_exists($dao, false)) {
            foreach ($this->_ci_model_paths as $mod_path) {
                if (! file_exists($mod_path.'dao/'.$path.$dao.'.php')) {
                    continue;
                }

                require_once($mod_path.'dao/'.$path.$dao.'.php');
                if (! class_exists($dao, false)) {
                    throw new RuntimeException($mod_path."dao/".$path.$dao.".php exists, but doesn't declare class ".$service);
                }

                break;
            }

            if (! class_exists($dao, false)) {
                throw new RuntimeException('Unable to locate the dao you have specified: '.$dao);
            }
        }

        $this->_ci_daos[] = $name;
        $CI->$name = new $dao();
        return $this;
    }

 /**
     * Business Loader
     *
     * Loads and instantiates business's.
     *
     * @param	string	$business		Business name
     * @param	string	$name		An optional object name to assign to
     * @param	bool	$db_conn	An optional database connection configuration to initialize
     * @return	object
     * 
     * modified by Nguyen Luu Thanh Binh <nguyenluuthanhbinh@outlook.com>
     */

    public function business($business, $name = '', $db_conn = false)
    {
        if (empty($business)) {
            return $this;
        } elseif (is_array($business)) {
            foreach ($business as $key => $value) {
                is_int($key) ? $this->business($value, '', $db_conn) : $this->business($key, $value, $db_conn);
            }

            return $this;
        }

        $path = '';

        // Is the business in a sub-folder? If so, parse out the filename and path.
        if (($last_slash = strrpos($business, '/')) !== false) {
            // The path is in front of the last slash
            $path = substr($business, 0, ++$last_slash);

            // And the business name behind it
            $business = substr($business, $last_slash);
        }

        if (empty($name)) {
            $name = $business;
        }

        if (in_array($name, $this->_ci_business, true)) {
            return $this;
        }

        $CI =& get_instance();
        if (isset($CI->$name)) {
            throw new RuntimeException('The business name you are loading is the name of a resource that is already being used: '.$name);
        }

        if ($db_conn !== false && ! class_exists('CI_DB', false)) {
            if ($db_conn === true) {
                $db_conn = '';
            }

            $this->database($db_conn, false, true);
        }

        $app_path = APPPATH.'core'.DIRECTORY_SEPARATOR;
        if (file_exists($app_path.'Business.php')) {
            load_class('Model', 'core');
            require_once($app_path.'Business.php');
            if (! class_exists('CI_Model', false)) {
                throw new RuntimeException($app_path."Business.php exists, but doesn't declare class CI_Model");
            }
        }

        $class = config_item('subclass_prefix').'Business';
        if (file_exists($app_path.$class.'.php')) {
            require_once($app_path.$class.'.php');
            if (! class_exists($class, false)) {
                throw new RuntimeException($app_path.$class.".php exists, but doesn't declare class ".$class);
            }
        }

        $business = ucfirst($business);
        if (! class_exists($business, false)) {
            foreach ($this->_ci_model_paths as $mod_path) {
                if (! file_exists($mod_path.'business/'.$path.$business.'.php')) {
                    continue;
                }

                require_once($mod_path.'business/'.$path.$business.'.php');
                if (! class_exists($business, false)) {
                    throw new RuntimeException($mod_path."business/".$path.$business.".php exists, but doesn't declare class ".$service);
                }

                break;
            }

            if (! class_exists($business, false)) {
                throw new RuntimeException('Unable to locate the business you have specified: '.$business);
            }
        }

        $this->_ci_business[] = $name;
        $CI->$name = new $business();
        return $this;
    }
}
