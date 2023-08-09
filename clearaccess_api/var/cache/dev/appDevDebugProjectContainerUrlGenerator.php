<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevDebugProjectContainerUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes;

    public function __construct(RequestContext $context, LoggerInterface $logger = null)
    {
        $this->context = $context;
        $this->logger = $logger;
        if (null === self::$declaredRoutes) {
            self::$declaredRoutes = [
        '_wdt' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:toolbarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    1 =>     array (      0 => 'text',      1 => '/_wdt',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_home' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:homeAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_search' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:searchAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/search',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_search_bar' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:searchBarAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/search_bar',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_phpinfo' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/phpinfo',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_search_results' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:searchResultsAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/search/results',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_open_file' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:openAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/_profiler/open',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.profiler:panelAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    1 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_router' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.router:panelAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/router',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_exception' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.exception:showAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/exception',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_profiler_exception_css' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'web_profiler.controller.exception:cssAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/exception.css',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    2 =>     array (      0 => 'text',      1 => '/_profiler',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        '_twig_error_test' => array (  0 =>   array (    0 => 'code',    1 => '_format',  ),  1 =>   array (    '_controller' => 'twig.controller.preview_error:previewErrorPageAction',    '_format' => 'html',  ),  2 =>   array (    'code' => '\\d+',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '.',      2 => '[^/]++',      3 => '_format',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '\\d+',      3 => 'code',    ),    2 =>     array (      0 => 'text',      1 => '/_error',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'add-service' => array (  0 =>   array (  ),  1 =>   array (    'req_roles' =>     array (      0 => 'ROLE_CREATOR',      1 => 'ROLE_FNO_ADMIN',    ),    '_controller' => 'ServicesBundle\\Controller\\DefaultController::addServiceAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/api/services/add-service',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'find-service' => array (  0 =>   array (  ),  1 =>   array (    'req_roles' =>     array (      0 => 'ROLE_ISP_USER',      1 => 'ROLE_CREATOR',      2 => 'ROLE_FNO_ADMIN',    ),    '_controller' => 'ServicesBundle\\Controller\\DefaultController::findServiceAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/api/services/find-service',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'regrade-service' => array (  0 =>   array (  ),  1 =>   array (    'req_roles' =>     array (      0 => 'ROLE_ISP_USER',      1 => 'ROLE_CREATOR',      2 => 'ROLE_FNO_ADMIN',    ),    '_controller' => 'ServicesBundle\\Controller\\DefaultController::regradeServiceAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/api/services/regrade-service',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'log-ticket' => array (  0 =>   array (  ),  1 =>   array (    'req_roles' =>     array (      0 => 'ROLE_ISP_USER',      1 => 'ROLE_CREATOR',      2 => 'ROLE_FNO_ADMIN',    ),    '_controller' => 'ServicesBundle\\Controller\\DefaultController::logTicketAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/api/services/log-ticket',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fetch-tickets' => array (  0 =>   array (  ),  1 =>   array (    'req_roles' =>     array (      0 => 'ROLE_ISP_USER',      1 => 'ROLE_CREATOR',      2 => 'ROLE_FNO_ADMIN',    ),    '_controller' => 'ServicesBundle\\Controller\\DefaultController::fetchTicketAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/api/services/fetch-tickets',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fetch-comments' => array (  0 =>   array (  ),  1 =>   array (    'req_roles' =>     array (      0 => 'ROLE_ISP_USER',      1 => 'ROLE_CREATOR',      2 => 'ROLE_FNO_ADMIN',    ),    '_controller' => 'ServicesBundle\\Controller\\DefaultController::fetchTicketCommentsAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/api/services/fetch-comments',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'update-ticket' => array (  0 =>   array (  ),  1 =>   array (    'req_roles' =>     array (      0 => 'ROLE_ISP_USER',      1 => 'ROLE_CREATOR',      2 => 'ROLE_FNO_ADMIN',    ),    '_controller' => 'ServicesBundle\\Controller\\DefaultController::updateTicketAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/api/services/update-ticket',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'location-tickets' => array (  0 =>   array (  ),  1 =>   array (    'req_roles' =>     array (      0 => 'ROLE_ISP_USER',      1 => 'ROLE_CREATOR',      2 => 'ROLE_FNO_ADMIN',    ),    '_controller' => 'ServicesBundle\\Controller\\DefaultController::LocationTicketsAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/api/services/location-tickets/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'log-outage' => array (  0 =>   array (  ),  1 =>   array (    'req_roles' =>     array (      0 => 'ROLE_CREATOR',      1 => 'ROLE_FNO_ADMIN',    ),    '_controller' => 'OutagesBundle\\Controller\\DefaultController::addOutageAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/api/log-outage',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'update-outage' => array (  0 =>   array (  ),  1 =>   array (    'req_roles' =>     array (      0 => 'ROLE_CREATOR',      1 => 'ROLE_FNO_ADMIN',    ),    '_controller' => 'OutagesBundle\\Controller\\DefaultController::updateOutageAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/api/update-outage',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fetch-outages' => array (  0 =>   array (  ),  1 =>   array (    'req_roles' =>     array (      0 => 'ROLE_ISP_USER',      1 => 'ROLE_CREATOR',      2 => 'ROLE_FNO_ADMIN',    ),    '_controller' => 'OutagesBundle\\Controller\\DefaultController::fetchOutagesAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/api/fetch-outages/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'close-outage' => array (  0 =>   array (  ),  1 =>   array (    'req_roles' =>     array (      0 => 'ROLE_CREATOR',      1 => 'ROLE_FNO_ADMIN',    ),    '_controller' => 'OutagesBundle\\Controller\\DefaultController::closehOutageAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/api/close-outage',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'incident-comments' => array (  0 =>   array (  ),  1 =>   array (    'req_roles' =>     array (      0 => 'ROLE_ISP_USER',      1 => 'ROLE_CREATOR',      2 => 'ROLE_FNO_ADMIN',    ),    '_controller' => 'OutagesBundle\\Controller\\DefaultController::outageCommentsAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/api/incident-comments/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'jwt_default_index' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'JwtBundle\\Controller\\DefaultController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'add-location' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'OrdersBundle\\Controller\\DefaultController::addLocationAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/api/add-location',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'place-order' => array (  0 =>   array (  ),  1 =>   array (    'req_roles' =>     array (      0 => 'ROLE_FNO_ADMIN',      1 => 'ROLE_CREATOR',      2 => 'ROLE_ISP_USER',    ),    '_controller' => 'OrdersBundle\\Controller\\DefaultController::placeOrderAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/api/place-order',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'find-location' => array (  0 =>   array (  ),  1 =>   array (    'req_roles' =>     array (      0 => 'ROLE_FNO_ADMIN',      1 => 'ROLE_CREATOR',      2 => 'ROLE_ISP_USER',    ),    '_controller' => 'OrdersBundle\\Controller\\DefaultController::findLocationAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/api/find-location/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'products' => array (  0 =>   array (  ),  1 =>   array (    'req_roles' =>     array (      0 => 'ROLE_FNO_ADMIN',      1 => 'ROLE_CREATOR',      2 => 'ROLE_ISP_USER',    ),    '_controller' => 'OrdersBundle\\Controller\\DefaultController::fetchProductsAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/api/products/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'order-status' => array (  0 =>   array (  ),  1 =>   array (    'req_roles' =>     array (      0 => 'ROLE_FNO_ADMIN',      1 => 'ROLE_CREATOR',      2 => 'ROLE_ISP_USER',    ),    '_controller' => 'OrdersBundle\\Controller\\DefaultController::orderStatusAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/api/order-status/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'reject-order' => array (  0 =>   array (  ),  1 =>   array (    'req_roles' =>     array (      0 => 'ROLE_FNO_ADMIN',      1 => 'ROLE_CREATOR',      2 => 'ROLE_ISP_USER',    ),    '_controller' => 'OrdersBundle\\Controller\\DefaultController::rejectOrderAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/api/reject-order',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'retrieve-orders' => array (  0 =>   array (  ),  1 =>   array (    'req_roles' =>     array (      0 => 'ROLE_FNO_ADMIN',      1 => 'ROLE_CREATOR',    ),    '_controller' => 'OrdersBundle\\Controller\\DefaultController::retrieveOrdersAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/api/retrieve-orders/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'edit-order' => array (  0 =>   array (  ),  1 =>   array (    'req_roles' =>     array (      0 => 'ROLE_FNO_ADMIN',      1 => 'ROLE_CREATOR',    ),    '_controller' => 'OrdersBundle\\Controller\\DefaultController::editOrderAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/api/edit-order',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fetch-locations' => array (  0 =>   array (  ),  1 =>   array (    'req_roles' =>     array (      0 => 'ROLE_FNO_ADMIN',      1 => 'ROLE_CREATOR',    ),    '_controller' => 'OrdersBundle\\Controller\\DefaultController::fetchLocationsAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/api/fetch-locations/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fetch-units' => array (  0 =>   array (  ),  1 =>   array (    'req_roles' =>     array (      0 => 'ROLE_FNO_ADMIN',      1 => 'ROLE_CREATOR',    ),    '_controller' => 'OrdersBundle\\Controller\\DefaultController::fetchUnitsAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/api/fetch-units/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'location-id' => array (  0 =>   array (  ),  1 =>   array (    'req_roles' =>     array (      0 => 'ROLE_FNO_ADMIN',      1 => 'ROLE_ISP_USER',      2 => 'ROLE_CREATOR',    ),    '_controller' => 'OrdersBundle\\Controller\\DefaultController::locationByIdAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/api/location-id/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'login' => array (  0 =>   array (  ),  1 =>   array (    'req_roles' =>     array (      0 => 'ROLE_PUBLIC',    ),    '_controller' => 'UserBundle\\Controller\\DefaultController::loginAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/login/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fetch-techs' => array (  0 =>   array (  ),  1 =>   array (    'req_roles' =>     array (      0 => 'ROLE_ISP_USER',      1 => 'ROLE_FNO_ADMIN',      2 => 'ROLE_CREATOR',    ),    '_controller' => 'UserBundle\\Controller\\DefaultController::fetchTechsAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/api/users/fetch-techs',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fetch-users' => array (  0 =>   array (  ),  1 =>   array (    'req_roles' =>     array (      0 => 'ROLE_FNO_ADMIN',      1 => 'ROLE_CREATOR',    ),    '_controller' => 'UserBundle\\Controller\\DefaultController::fetchUsersAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/api/users/fetch-users',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fetch-roles' => array (  0 =>   array (  ),  1 =>   array (    'req_roles' =>     array (      0 => 'ROLE_FNO_ADMIN',      1 => 'ROLE_CREATOR',    ),    '_controller' => 'UserBundle\\Controller\\DefaultController::fetchRolesAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/api/users/fetch-roles',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'add-user' => array (  0 =>   array (  ),  1 =>   array (    'req_roles' =>     array (      0 => 'ROLE_FNO_ADMIN',      1 => 'ROLE_CREATOR',    ),    '_controller' => 'UserBundle\\Controller\\DefaultController::addUserAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/api/users/add-user',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'homepage' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
    ];
        }
    }

    public function generate($name, $parameters = [], $referenceType = self::ABSOLUTE_PATH)
    {
        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens, $requiredSchemes) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);
    }
}
