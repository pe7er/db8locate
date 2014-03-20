<?php

/**
 * @package     db8 locate
 * @author	Peter Martin
 * @copyright   Copyright (C) 2014 Peter Martin / db8.nl
 * @license     GNU General Public License version 2 or later
 */
defined('_JEXEC') or die();

// Load FOF
include_once JPATH_LIBRARIES.'/fof/include.php';

// Quit if FOF is not installed
if(!defined('FOF_INCLUDED')) {
    JError::raiseError ('500', 'FOF is not installed');
}

FOFDispatcher::getTmpInstance('com_db8locate')->dispatch();