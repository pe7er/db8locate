<?php
/**
 * @package todo
 * @copyright Copyright (c)2012 Nicholas K. Dionysopoulos / AkeebaBackup.com
 * @license GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

class Db8locateToolbar extends FOFToolbar
{
    function __construct($config = array())
    {
        parent::__construct($config);

        $this->renderFrontendButtons = true;
    }
}