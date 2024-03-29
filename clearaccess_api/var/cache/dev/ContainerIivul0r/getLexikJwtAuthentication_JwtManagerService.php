<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'lexik_jwt_authentication.jwt_manager' shared service.

include_once $this->targetDirs[3].'\\vendor\\lexik\\jwt-authentication-bundle\\Services\\JWTManagerInterface.php';
include_once $this->targetDirs[3].'\\vendor\\lexik\\jwt-authentication-bundle\\Services\\JWTTokenManagerInterface.php';
include_once $this->targetDirs[3].'\\vendor\\lexik\\jwt-authentication-bundle\\Services\\JWTManager.php';

$this->services['lexik_jwt_authentication.jwt_manager'] = $instance = new \Lexik\Bundle\JWTAuthenticationBundle\Services\JWTManager(${($_ = isset($this->services['lexik_jwt_authentication.encoder.lcobucci']) ? $this->services['lexik_jwt_authentication.encoder.lcobucci'] : $this->load('getLexikJwtAuthentication_Encoder_LcobucciService.php')) && false ?: '_'}, ${($_ = isset($this->services['debug.event_dispatcher']) ? $this->services['debug.event_dispatcher'] : $this->getDebug_EventDispatcherService()) && false ?: '_'}, 'username');

$instance->setUserIdentityField('username');

return $instance;
