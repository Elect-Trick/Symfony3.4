<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'swiftmailer.email_sender.listener' shared service.

include_once $this->targetDirs[3].'\\vendor\\symfony\\swiftmailer-bundle\\EventListener\\EmailSenderListener.php';

return $this->services['swiftmailer.email_sender.listener'] = new \Symfony\Bundle\SwiftmailerBundle\EventListener\EmailSenderListener($this, ${($_ = isset($this->services['logger']) ? $this->services['logger'] : $this->load('getLoggerService.php')) && false ?: '_'});
