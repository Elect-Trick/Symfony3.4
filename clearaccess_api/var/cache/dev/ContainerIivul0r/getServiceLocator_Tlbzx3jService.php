<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'service_locator.tlbzx3j' shared service.

return $this->services['service_locator.tlbzx3j'] = new \Symfony\Component\DependencyInjection\ServiceLocator(['tokenStore' => function () {
    return ${($_ = isset($this->services['security.token_storage']) ? $this->services['security.token_storage'] : ($this->services['security.token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage())) && false ?: '_'};
}]);
