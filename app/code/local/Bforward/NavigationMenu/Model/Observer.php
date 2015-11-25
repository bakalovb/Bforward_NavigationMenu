<?php

/**
 * @package    Bforward_NavigationMenu
 * @author     Bogdan Bakalov <bakalov.bogdan@gmail.com>
 */
class Bforward_NavigationMenu_Model_Observer
{
    /**
     * Add CMS pages link to top navigation menu
     * @param Varien_Event_Observer $observer
     */
    public function cmsPagesToTopmenu(Varien_Event_Observer $observer)
    {
        $menu = $observer->getMenu();
        $tree = $menu->getTree();
        $cmsPagesId = explode(',', Mage::getStoreConfig('bforward_menu/form/cms_pages'));
        $promotionOrder = 1;

        $collection = Mage::getModel('cms/page')->getCollection()
            ->addFieldToFilter('page_id', array('in' => $cmsPagesId));
        foreach ($collection as $page) {
            $node = new Varien_Data_Tree_Node(array(
                'name' => $page->getTitle(),
                'id' => $page->getIdentifier(),
                'url' => Mage::getUrl($page->getIdentifier()),
            ), 'id', $tree, $menu);

            $menu->addChild($node);
            $promotionOrder++;
        }
    }
}