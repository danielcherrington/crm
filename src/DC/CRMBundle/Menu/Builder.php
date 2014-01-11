<?php
namespace DC\CRMBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
       


        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav');
 
        $menu->addChild('Accounts', array('route' => 'account'))
            ->setAttribute('icon', 'icon-list');
 
        $menu->addChild('Contacts', array('route' => 'contact'))
            ->setAttribute('icon', 'icon-group');
 
        


        // ... add more children

        return $menu;
    }
}