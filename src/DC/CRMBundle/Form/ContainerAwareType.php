<?php

namespace DC\CRMBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class ContainerAwareType extends AbstractType
  implements ContainerAwareInterface {

  protected $container;

  public function getContainer()
  {
  	return $this->container;
  }

  public function setContainer(Container $container = null)
  {
  	$this->container = $container;
  }

  public function getName()
  {
  	return $this->name;
  }
}