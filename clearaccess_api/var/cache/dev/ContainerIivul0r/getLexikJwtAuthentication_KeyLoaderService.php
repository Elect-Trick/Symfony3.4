<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'lexik_jwt_authentication.key_loader' shared service.

include_once $this->targetDirs[3].'\\vendor\\lexik\\jwt-authentication-bundle\\Services\\KeyLoader\\KeyLoaderInterface.php';
include_once $this->targetDirs[3].'\\vendor\\lexik\\jwt-authentication-bundle\\Services\\KeyLoader\\AbstractKeyLoader.php';
include_once $this->targetDirs[3].'\\vendor\\lexik\\jwt-authentication-bundle\\Services\\KeyLoader\\KeyDumperInterface.php';
include_once $this->targetDirs[3].'\\vendor\\lexik\\jwt-authentication-bundle\\Services\\KeyLoader\\RawKeyLoader.php';

return $this->services['lexik_jwt_authentication.key_loader'] = new \Lexik\Bundle\JWTAuthenticationBundle\Services\KeyLoader\RawKeyLoader('../config/jwt/private.pem', '../config/jwt/public.pem', 'mafdhklkjkn234kas');
