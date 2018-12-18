
<?php
class MY_Dao extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        log_message('info', 'Dao Class Initialized');
    }
    
}