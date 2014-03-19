<?php

defined('_JEXEC') or die();

class Db8locateToolbar extends FOFToolbar {

    public function Db8locateHelperRenderSubmenu($vName) {
        return $this->renderSubmenu($vName);
    }

    public function renderSubmenu($vName = null) {
        if (is_null($vName)) {
            $vName = $this->input->getCmd('view', 'cpanel');
        }
        $this->input->set('view', $vName);

        parent::renderSubmenu();
        $toolbar = FOFToolbar::getAnInstance($this->input->getCmd('option', 'com_db8locate'), $this->config);
        $toolbar->appendLink(Jtext::_('COM_DB8LOCATE_SUBMENU_CATEGORIES'), 'index.php?option=com_categories&extension=com_db8locate', $vName == 'categories');
    }

}
