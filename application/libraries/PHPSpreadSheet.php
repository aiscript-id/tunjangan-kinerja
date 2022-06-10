<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once('PhpSpreadsheet\src\PhpSpreadsheet\SpreadSheet.php');

class PhpSpreadsheet extends PHPSpreadsheet{

	public function __construct()
	{
		parent::__construct();
	}
}

?>