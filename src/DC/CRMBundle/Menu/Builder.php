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
        $menu->setChildrenAttribute('style', 'display:inline-block;width:600px;');
 
        $menu->addChild('Home', array('route' => '_default'))
            ->setAttribute('icon', 'icon-home')
            ->setAttribute('divider_append', true);

        $menu->addChild('Accounts', array('route' => 'account'))
            ->setAttribute('icon', 'icon-list')
            ->setAttribute('divider_append', true);
 
        $menu->addChild('Contacts', array('route' => 'contact'))
            ->setAttribute('icon', 'icon-group')
            ->setAttribute('divider_append', true);

        return $menu;
    }

    public function userMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav pull-right');
 
        /*
        You probably want to show user specific information such as the username here. That's possible! Use any of the below methods to do this.
 
        if($this->container->get('security.context')->isGranted(array('ROLE_ADMIN', 'ROLE_USER'))) {} // Check if the visitor has any authenticated roles
        $username = $this->container->get('security.context')->getToken()->getUser()->getUsername(); // Get username of the current logged in user
 
        */    
        $menu->addChild('User', array('label' => 'Hi visitor'))
            ->setAttribute('dropdown', true)
            ->setAttribute('icon', 'icon-user');
 
        $menu['User']->addChild('Edit profile', array('route' => '_default'))
            ->setAttribute('icon', 'icon-edit');
 
        return $menu;
    }
}