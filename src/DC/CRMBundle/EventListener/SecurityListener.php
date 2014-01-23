<?php

namespace DC\CRMBundle\EventListener;

use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Session\Session;


class SecurityListener
{
    protected $security;
    protected $session;

/**
* Constructs a new instance of SecurityListener.
*
* @param SecurityContext $security The security context
* @param Session $session The session
*/
    public function __construct(SecurityContext $security, Session $session)
    {
        //You can bring whatever you need here, but for a start this should be useful to you
        $this->security = $security;
        $this->session = $session;
    }

/**
* Invoked after a successful login.
*
* @param InteractiveLoginEvent $event The event
*/
    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event)
    {
        $user = $this->security->getToken()->getUser();
    }
}