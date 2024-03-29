<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'lexik_jwt_authentication.security.guard.jwt_token_authenticator' shared service.

include_once $this->targetDirs[3].'\\vendor\\symfony\\symfony\\src\\Symfony\\Component\\Security\\Http\\EntryPoint\\AuthenticationEntryPointInterface.php';
include_once $this->targetDirs[3].'\\vendor\\symfony\\symfony\\src\\Symfony\\Component\\Security\\Guard\\GuardAuthenticatorInterface.php';
include_once $this->targetDirs[3].'\\vendor\\symfony\\symfony\\src\\Symfony\\Component\\Security\\Guard\\AuthenticatorInterface.php';
include_once $this->targetDirs[3].'\\vendor\\symfony\\symfony\\src\\Symfony\\Component\\Security\\Guard\\AbstractGuardAuthenticator.php';
include_once $this->targetDirs[3].'\\vendor\\lexik\\jwt-authentication-bundle\\Security\\Guard\\JWTTokenAuthenticator.php';

return $this->services['lexik_jwt_authentication.security.guard.jwt_token_authenticator'] = new \Lexik\Bundle\JWTAuthenticationBundle\Security\Guard\JWTTokenAuthenticator(${($_ = isset($this->services['lexik_jwt_authentication.jwt_manager']) ? $this->services['lexik_jwt_authentication.jwt_manager'] : $this->load('getLexikJwtAuthentication_JwtManagerService.php')) && false ?: '_'}, ${($_ = isset($this->services['debug.event_dispatcher']) ? $this->services['debug.event_dispatcher'] : $this->getDebug_EventDispatcherService()) && false ?: '_'}, ${($_ = isset($this->services['Lexik\\Bundle\\JWTAuthenticationBundle\\TokenExtractor\\TokenExtractorInterface']) ? $this->services['Lexik\\Bundle\\JWTAuthenticationBundle\\TokenExtractor\\TokenExtractorInterface'] : $this->load('getTokenExtractorInterfaceService.php')) && false ?: '_'});
