<?php
class Database {
	private $_host='localhost';
	private $_user='id18251654_root';
	private $_pass='hiDq4E&PMwsQ)!AP';
	private $_dbms='id18251654_esteh';

	protected $link;

	public function __construct() {
		if (!isset($this->link)) {
            $this->link = new mysqli($this->_host, $this->_user, $this->_pass, $this->_dbms);
            if (!$this->link) {
                echo 'Negative.';
                exit();
            }            
        }    
        return $this->link;
	}
}
?>