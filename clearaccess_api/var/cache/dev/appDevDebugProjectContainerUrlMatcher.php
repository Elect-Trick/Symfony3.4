<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevDebugProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($rawPathinfo)
    {
        $allow = [];
        $pathinfo = rawurldecode($rawPathinfo);
        $trimmedPathinfo = rtrim($pathinfo, '/');
        $context = $this->context;
        $request = $this->request ?: $this->createRequest($pathinfo);
        $requestMethod = $canonicalMethod = $context->getMethod();

        if ('HEAD' === $requestMethod) {
            $canonicalMethod = 'GET';
        }

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => '_wdt']), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if ('/_profiler' === $trimmedPathinfo) {
                    $ret = array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                    if ('/' === substr($pathinfo, -1)) {
                        // no-op
                    } elseif ('GET' !== $canonicalMethod) {
                        goto not__profiler_home;
                    } else {
                        return array_replace($ret, $this->redirect($rawPathinfo.'/', '_profiler_home'));
                    }

                    return $ret;
                }
                not__profiler_home:

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ('/_profiler/search' === $pathinfo) {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ('/_profiler/search_bar' === $pathinfo) {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_phpinfo
                if ('/_profiler/phpinfo' === $pathinfo) {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, ['_route' => '_profiler_search_results']), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler_open_file
                if ('/_profiler/open' === $pathinfo) {
                    return array (  '_controller' => 'web_profiler.controller.profiler:openAction',  '_route' => '_profiler_open_file',);
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, ['_route' => '_profiler']), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, ['_route' => '_profiler_router']), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, ['_route' => '_profiler_exception']), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, ['_route' => '_profiler_exception_css']), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => '_twig_error_test']), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        elseif (0 === strpos($pathinfo, '/api')) {
            if (0 === strpos($pathinfo, '/api/services')) {
                // add-service
                if ('/api/services/add-service' === $pathinfo) {
                    return array (  'req_roles' =>   array (    0 => 'ROLE_CREATOR',    1 => 'ROLE_FNO_ADMIN',  ),  '_controller' => 'ServicesBundle\\Controller\\DefaultController::addServiceAction',  '_route' => 'add-service',);
                }

                if (0 === strpos($pathinfo, '/api/services/f')) {
                    // find-service
                    if ('/api/services/find-service' === $pathinfo) {
                        return array (  'req_roles' =>   array (    0 => 'ROLE_ISP_USER',    1 => 'ROLE_CREATOR',    2 => 'ROLE_FNO_ADMIN',  ),  '_controller' => 'ServicesBundle\\Controller\\DefaultController::findServiceAction',  '_route' => 'find-service',);
                    }

                    // fetch-tickets
                    if ('/api/services/fetch-tickets' === $pathinfo) {
                        return array (  'req_roles' =>   array (    0 => 'ROLE_ISP_USER',    1 => 'ROLE_CREATOR',    2 => 'ROLE_FNO_ADMIN',  ),  '_controller' => 'ServicesBundle\\Controller\\DefaultController::fetchTicketAction',  '_route' => 'fetch-tickets',);
                    }

                    // fetch-comments
                    if ('/api/services/fetch-comments' === $pathinfo) {
                        return array (  'req_roles' =>   array (    0 => 'ROLE_ISP_USER',    1 => 'ROLE_CREATOR',    2 => 'ROLE_FNO_ADMIN',  ),  '_controller' => 'ServicesBundle\\Controller\\DefaultController::fetchTicketCommentsAction',  '_route' => 'fetch-comments',);
                    }

                }

                // regrade-service
                if ('/api/services/regrade-service' === $pathinfo) {
                    return array (  'req_roles' =>   array (    0 => 'ROLE_ISP_USER',    1 => 'ROLE_CREATOR',    2 => 'ROLE_FNO_ADMIN',  ),  '_controller' => 'ServicesBundle\\Controller\\DefaultController::regradeServiceAction',  '_route' => 'regrade-service',);
                }

                // log-ticket
                if ('/api/services/log-ticket' === $pathinfo) {
                    return array (  'req_roles' =>   array (    0 => 'ROLE_ISP_USER',    1 => 'ROLE_CREATOR',    2 => 'ROLE_FNO_ADMIN',  ),  '_controller' => 'ServicesBundle\\Controller\\DefaultController::logTicketAction',  '_route' => 'log-ticket',);
                }

                // location-tickets
                if ('/api/services/location-tickets' === $trimmedPathinfo) {
                    $ret = array (  'req_roles' =>   array (    0 => 'ROLE_ISP_USER',    1 => 'ROLE_CREATOR',    2 => 'ROLE_FNO_ADMIN',  ),  '_controller' => 'ServicesBundle\\Controller\\DefaultController::LocationTicketsAction',  '_route' => 'location-tickets',);
                    if ('/' === substr($pathinfo, -1)) {
                        // no-op
                    } elseif ('GET' !== $canonicalMethod) {
                        goto not_locationtickets;
                    } else {
                        return array_replace($ret, $this->redirect($rawPathinfo.'/', 'location-tickets'));
                    }

                    return $ret;
                }
                not_locationtickets:

                // update-ticket
                if ('/api/services/update-ticket' === $pathinfo) {
                    return array (  'req_roles' =>   array (    0 => 'ROLE_ISP_USER',    1 => 'ROLE_CREATOR',    2 => 'ROLE_FNO_ADMIN',  ),  '_controller' => 'ServicesBundle\\Controller\\DefaultController::updateTicketAction',  '_route' => 'update-ticket',);
                }

            }

            // log-outage
            if ('/api/log-outage' === $pathinfo) {
                return array (  'req_roles' =>   array (    0 => 'ROLE_CREATOR',    1 => 'ROLE_FNO_ADMIN',  ),  '_controller' => 'OutagesBundle\\Controller\\DefaultController::addOutageAction',  '_route' => 'log-outage',);
            }

            // location-id
            if ('/api/location-id' === $trimmedPathinfo) {
                $ret = array (  'req_roles' =>   array (    0 => 'ROLE_FNO_ADMIN',    1 => 'ROLE_ISP_USER',    2 => 'ROLE_CREATOR',  ),  '_controller' => 'OrdersBundle\\Controller\\DefaultController::locationByIdAction',  '_route' => 'location-id',);
                if ('/' === substr($pathinfo, -1)) {
                    // no-op
                } elseif ('GET' !== $canonicalMethod) {
                    goto not_locationid;
                } else {
                    return array_replace($ret, $this->redirect($rawPathinfo.'/', 'location-id'));
                }

                return $ret;
            }
            not_locationid:

            if (0 === strpos($pathinfo, '/api/u')) {
                // update-outage
                if ('/api/update-outage' === $pathinfo) {
                    return array (  'req_roles' =>   array (    0 => 'ROLE_CREATOR',    1 => 'ROLE_FNO_ADMIN',  ),  '_controller' => 'OutagesBundle\\Controller\\DefaultController::updateOutageAction',  '_route' => 'update-outage',);
                }

                if (0 === strpos($pathinfo, '/api/users/fetch-')) {
                    // fetch-techs
                    if ('/api/users/fetch-techs' === $pathinfo) {
                        return array (  'req_roles' =>   array (    0 => 'ROLE_ISP_USER',    1 => 'ROLE_FNO_ADMIN',    2 => 'ROLE_CREATOR',  ),  '_controller' => 'UserBundle\\Controller\\DefaultController::fetchTechsAction',  '_route' => 'fetch-techs',);
                    }

                    // fetch-users
                    if ('/api/users/fetch-users' === $pathinfo) {
                        return array (  'req_roles' =>   array (    0 => 'ROLE_FNO_ADMIN',    1 => 'ROLE_CREATOR',  ),  '_controller' => 'UserBundle\\Controller\\DefaultController::fetchUsersAction',  '_route' => 'fetch-users',);
                    }

                    // fetch-roles
                    if ('/api/users/fetch-roles' === $pathinfo) {
                        return array (  'req_roles' =>   array (    0 => 'ROLE_FNO_ADMIN',    1 => 'ROLE_CREATOR',  ),  '_controller' => 'UserBundle\\Controller\\DefaultController::fetchRolesAction',  '_route' => 'fetch-roles',);
                    }

                }

                // add-user
                if ('/api/users/add-user' === $pathinfo) {
                    return array (  'req_roles' =>   array (    0 => 'ROLE_FNO_ADMIN',    1 => 'ROLE_CREATOR',  ),  '_controller' => 'UserBundle\\Controller\\DefaultController::addUserAction',  '_route' => 'add-user',);
                }

            }

            elseif (0 === strpos($pathinfo, '/api/fetch-')) {
                // fetch-outages
                if ('/api/fetch-outages' === $trimmedPathinfo) {
                    $ret = array (  'req_roles' =>   array (    0 => 'ROLE_ISP_USER',    1 => 'ROLE_CREATOR',    2 => 'ROLE_FNO_ADMIN',  ),  '_controller' => 'OutagesBundle\\Controller\\DefaultController::fetchOutagesAction',  '_route' => 'fetch-outages',);
                    if ('/' === substr($pathinfo, -1)) {
                        // no-op
                    } elseif ('GET' !== $canonicalMethod) {
                        goto not_fetchoutages;
                    } else {
                        return array_replace($ret, $this->redirect($rawPathinfo.'/', 'fetch-outages'));
                    }

                    return $ret;
                }
                not_fetchoutages:

                // fetch-locations
                if ('/api/fetch-locations' === $trimmedPathinfo) {
                    $ret = array (  'req_roles' =>   array (    0 => 'ROLE_FNO_ADMIN',    1 => 'ROLE_CREATOR',  ),  '_controller' => 'OrdersBundle\\Controller\\DefaultController::fetchLocationsAction',  '_route' => 'fetch-locations',);
                    if ('/' === substr($pathinfo, -1)) {
                        // no-op
                    } elseif ('GET' !== $canonicalMethod) {
                        goto not_fetchlocations;
                    } else {
                        return array_replace($ret, $this->redirect($rawPathinfo.'/', 'fetch-locations'));
                    }

                    return $ret;
                }
                not_fetchlocations:

                // fetch-units
                if ('/api/fetch-units' === $trimmedPathinfo) {
                    $ret = array (  'req_roles' =>   array (    0 => 'ROLE_FNO_ADMIN',    1 => 'ROLE_CREATOR',  ),  '_controller' => 'OrdersBundle\\Controller\\DefaultController::fetchUnitsAction',  '_route' => 'fetch-units',);
                    if ('/' === substr($pathinfo, -1)) {
                        // no-op
                    } elseif ('GET' !== $canonicalMethod) {
                        goto not_fetchunits;
                    } else {
                        return array_replace($ret, $this->redirect($rawPathinfo.'/', 'fetch-units'));
                    }

                    return $ret;
                }
                not_fetchunits:

            }

            // find-location
            if ('/api/find-location' === $trimmedPathinfo) {
                $ret = array (  'req_roles' =>   array (    0 => 'ROLE_FNO_ADMIN',    1 => 'ROLE_CREATOR',    2 => 'ROLE_ISP_USER',  ),  '_controller' => 'OrdersBundle\\Controller\\DefaultController::findLocationAction',  '_route' => 'find-location',);
                if ('/' === substr($pathinfo, -1)) {
                    // no-op
                } elseif ('GET' !== $canonicalMethod) {
                    goto not_findlocation;
                } else {
                    return array_replace($ret, $this->redirect($rawPathinfo.'/', 'find-location'));
                }

                return $ret;
            }
            not_findlocation:

            // close-outage
            if ('/api/close-outage' === $pathinfo) {
                return array (  'req_roles' =>   array (    0 => 'ROLE_CREATOR',    1 => 'ROLE_FNO_ADMIN',  ),  '_controller' => 'OutagesBundle\\Controller\\DefaultController::closehOutageAction',  '_route' => 'close-outage',);
            }

            // incident-comments
            if ('/api/incident-comments' === $trimmedPathinfo) {
                $ret = array (  'req_roles' =>   array (    0 => 'ROLE_ISP_USER',    1 => 'ROLE_CREATOR',    2 => 'ROLE_FNO_ADMIN',  ),  '_controller' => 'OutagesBundle\\Controller\\DefaultController::outageCommentsAction',  '_route' => 'incident-comments',);
                if ('/' === substr($pathinfo, -1)) {
                    // no-op
                } elseif ('GET' !== $canonicalMethod) {
                    goto not_incidentcomments;
                } else {
                    return array_replace($ret, $this->redirect($rawPathinfo.'/', 'incident-comments'));
                }

                return $ret;
            }
            not_incidentcomments:

            // add-location
            if ('/api/add-location' === $pathinfo) {
                return array (  '_controller' => 'OrdersBundle\\Controller\\DefaultController::addLocationAction',  '_route' => 'add-location',);
            }

            // place-order
            if ('/api/place-order' === $pathinfo) {
                return array (  'req_roles' =>   array (    0 => 'ROLE_FNO_ADMIN',    1 => 'ROLE_CREATOR',    2 => 'ROLE_ISP_USER',  ),  '_controller' => 'OrdersBundle\\Controller\\DefaultController::placeOrderAction',  '_route' => 'place-order',);
            }

            // products
            if ('/api/products' === $trimmedPathinfo) {
                $ret = array (  'req_roles' =>   array (    0 => 'ROLE_FNO_ADMIN',    1 => 'ROLE_CREATOR',    2 => 'ROLE_ISP_USER',  ),  '_controller' => 'OrdersBundle\\Controller\\DefaultController::fetchProductsAction',  '_route' => 'products',);
                if ('/' === substr($pathinfo, -1)) {
                    // no-op
                } elseif ('GET' !== $canonicalMethod) {
                    goto not_products;
                } else {
                    return array_replace($ret, $this->redirect($rawPathinfo.'/', 'products'));
                }

                return $ret;
            }
            not_products:

            // order-status
            if ('/api/order-status' === $trimmedPathinfo) {
                $ret = array (  'req_roles' =>   array (    0 => 'ROLE_FNO_ADMIN',    1 => 'ROLE_CREATOR',    2 => 'ROLE_ISP_USER',  ),  '_controller' => 'OrdersBundle\\Controller\\DefaultController::orderStatusAction',  '_route' => 'order-status',);
                if ('/' === substr($pathinfo, -1)) {
                    // no-op
                } elseif ('GET' !== $canonicalMethod) {
                    goto not_orderstatus;
                } else {
                    return array_replace($ret, $this->redirect($rawPathinfo.'/', 'order-status'));
                }

                return $ret;
            }
            not_orderstatus:

            // reject-order
            if ('/api/reject-order' === $pathinfo) {
                return array (  'req_roles' =>   array (    0 => 'ROLE_FNO_ADMIN',    1 => 'ROLE_CREATOR',    2 => 'ROLE_ISP_USER',  ),  '_controller' => 'OrdersBundle\\Controller\\DefaultController::rejectOrderAction',  '_route' => 'reject-order',);
            }

            // retrieve-orders
            if ('/api/retrieve-orders' === $trimmedPathinfo) {
                $ret = array (  'req_roles' =>   array (    0 => 'ROLE_FNO_ADMIN',    1 => 'ROLE_CREATOR',  ),  '_controller' => 'OrdersBundle\\Controller\\DefaultController::retrieveOrdersAction',  '_route' => 'retrieve-orders',);
                if ('/' === substr($pathinfo, -1)) {
                    // no-op
                } elseif ('GET' !== $canonicalMethod) {
                    goto not_retrieveorders;
                } else {
                    return array_replace($ret, $this->redirect($rawPathinfo.'/', 'retrieve-orders'));
                }

                return $ret;
            }
            not_retrieveorders:

            // edit-order
            if ('/api/edit-order' === $pathinfo) {
                return array (  'req_roles' =>   array (    0 => 'ROLE_FNO_ADMIN',    1 => 'ROLE_CREATOR',  ),  '_controller' => 'OrdersBundle\\Controller\\DefaultController::editOrderAction',  '_route' => 'edit-order',);
            }

        }

        // jwt_default_index
        if ('' === $trimmedPathinfo) {
            $ret = array (  '_controller' => 'JwtBundle\\Controller\\DefaultController::indexAction',  '_route' => 'jwt_default_index',);
            if ('/' === substr($pathinfo, -1)) {
                // no-op
            } elseif ('GET' !== $canonicalMethod) {
                goto not_jwt_default_index;
            } else {
                return array_replace($ret, $this->redirect($rawPathinfo.'/', 'jwt_default_index'));
            }

            return $ret;
        }
        not_jwt_default_index:

        // login
        if ('/login' === $trimmedPathinfo) {
            $ret = array (  'req_roles' =>   array (    0 => 'ROLE_PUBLIC',  ),  '_controller' => 'UserBundle\\Controller\\DefaultController::loginAction',  '_route' => 'login',);
            if ('/' === substr($pathinfo, -1)) {
                // no-op
            } elseif ('GET' !== $canonicalMethod) {
                goto not_login;
            } else {
                return array_replace($ret, $this->redirect($rawPathinfo.'/', 'login'));
            }

            return $ret;
        }
        not_login:

        // homepage
        if ('' === $trimmedPathinfo) {
            $ret = array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
            if ('/' === substr($pathinfo, -1)) {
                // no-op
            } elseif ('GET' !== $canonicalMethod) {
                goto not_homepage;
            } else {
                return array_replace($ret, $this->redirect($rawPathinfo.'/', 'homepage'));
            }

            return $ret;
        }
        not_homepage:

        if ('/' === $pathinfo && !$allow) {
            throw new Symfony\Component\Routing\Exception\NoConfigurationException();
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
