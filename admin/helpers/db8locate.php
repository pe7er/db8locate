<?php

/**
 * @package     db8 locate
 * @author	Peter Martin
 * @copyright   Copyright (C) 2014 Peter Martin / db8.nl
 * @license     GNU General Public License version 2 or later
 */
defined('_JEXEC') or die();

/**
 * Helper to display db8 locate component submenus in com_categories
 */
abstract class Db8locateHelper {

    /**
     * Configure the Linkbar.
     */
    public static function addSubmenu($submenu) {
        JSubMenuHelper::addEntry(JText::_('COM_DB8LOCATE_TITLE_ITEMS'), 
                'index.php?option=com_db8locate', 
                $submenu == 'locations');
        JSubMenuHelper::addEntry(JText::_('COM_DB8LOCATE_SUBMENU_CATEGORIES'), 
                'index.php?option=com_categories&view=categories&extension=com_db8locate', 
                $submenu == 'categories');

    }

}
