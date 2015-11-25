<?php
/**
 * @package    Bforward_NavigationMenu
 * @author     Bogdan Bakalov <bakalov.bogdan@gmail.com>
 */
class Bforward_NavigationMenu_Model_System_Config_Source_View
{
    /**
     * Options of CMS pages
     * @return array
     */
    public function toOptionArray()
    {
        $pageIds = array();
        $collection = Mage::getModel('cms/page')->getCollection();
        foreach ($collection as $page) {
            $pageIds[] = array('value' => $page->getId(), 'label' => $page->getTitle());
        }

        return $pageIds;
    }
}