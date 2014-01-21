<?php
namespace DC\CRMBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
       
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav navbar-nav');
        $menu->setChildrenAttribute('style', 'display:inline-block;width:800px;');
 
        $menu->addChild('Home', array('route' => '_default'))
            ->setAttribute('icon', 'icon-home')
            ->setAttribute('divider_append', true);

        $menu->addChild('Accounts', array('label' => 'Accounts'))
            ->setAttribute('dropdown', true)
            ->setAttribute('icon', 'icon-briefcase');

        $menu['Accounts']->addChild('View Accounts', array('route' => 'accounts'))
            ->setAttribute('icon', 'icon-list');
        $menu['Accounts']->addChild('Create Account', array('route' => '_new', 'routeParameters' => array('module' => 'accounts') ))
            ->setAttribute('icon', 'icon-pencil');
        $menu['Accounts']->addChild('Import Accounts', array('route' => 'accounts'))
            ->setAttribute('icon', 'icon-upload')
            ->setAttribute('divider_append', true);
        $menu['Accounts']->addChild('Recently viewed item', array('route' => 'accounts'))
            ->setAttribute('icon', 'icon-list');


        
 
        $menu->addChild('Contacts', array('route' => 'contacts'))
            ->setAttribute('icon', 'icon-group')
            ->setAttribute('divider_append', true);

        $menu->addChild('Opportunities', array('route' => 'contacts'))
            ->setAttribute('icon', 'icon-money')
            ->setAttribute('divider_append', true);

        $menu->addChild('Quotes', array('route' => 'contacts'))
            ->setAttribute('icon', 'icon-edit')
            ->setAttribute('divider_append', true);

        $menu->addChild('Calendar', array('route' => 'contacts'))
            ->setAttribute('icon', 'icon-calendar')
            ->setAttribute('divider_append', true);

        return $menu;
    }

    public function userMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav navbar-nav pull-right');

 
        /*
        You probably want to show user specific information such as the username here. That's possible! Use any of the below methods to do this.
 
        if($this->container->get('security.context')->isGranted(array('ROLE_ADMIN', 'ROLE_USER'))) {} // Check if the visitor has any authenticated roles
        $username = $this->container->get('security.context')->getToken()->getUser()->getUsername(); // Get username of the current logged in user
 
        */    
        $menu->addChild('User', array('label' => 'Daniel'))
            ->setAttribute('dropdown', true)
            ->setAttribute('icon', 'icon-user');
 
        $menu['User']->addChild('Edit profile', array('route' => '_default'))
            ->setAttribute('icon', 'icon-edit');
        $menu['User']->addChild('Administer', array('route' => '_default'))
            ->setAttribute('icon', 'icon-cog');
 
        return $menu;
    }
}