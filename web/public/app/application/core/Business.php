<?php
class MY_Business extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        log_message('info', 'Business Class Initialized');
    }
    
}