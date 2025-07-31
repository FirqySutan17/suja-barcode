<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('database','session','template','encryption', 'pagination', 'form_validation');

$autoload['drivers'] = array();

$autoload['helper'] = array('url', 'file', 'form', 'app_helper', 'download', 'cookie');

$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array('Dbhelper');