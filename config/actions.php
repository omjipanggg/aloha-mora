<?php
require_once('database.php');

class Actions extends Database {
	public function __construct() {
		parent::__construct();
	}

	public function open() {
		return $this->link;
	}

	public function fetch($query) {
		$result = $this->link->query($query);
		if ($result) {
			$rows = array();
			while ($row = $result->fetch_assoc()) {
				$rows[] = $row;
			}
		} else { return false; }
		return $rows;
	}

	public function rows($query) {
		$result = $this->link->query($query);
		if ($result) {
			return $result->num_rows;
		} else {
			return 0;
		}
	}

	public function execute($query) {
		$result = $this->link->query($query);
		if ($result) {
			return $result;
		} else {
			return $this->link->error;
		}
	}

	public function delete($table, $column, $id) {
		return $this->link->query("DELETE FROM `". $table . "` WHERE `". $column ."` = '". $id ."';");
	}

	public function escape($val) {
		return $this->link->real_escape_string(
			stripslashes(
				strip_tags(
					htmlspecialchars($val, ENT_QUOTES)
				)
			)
		);
	}
}
?>