<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        // hub_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'hub_homepage');
            }

            return array (  '_controller' => 'Hub\\HubBundle\\Controller\\DefaultController::indexAction',  '_route' => 'hub_homepage',);
        }

        // hub_signup
        if ($pathinfo === '/signup') {
            return array (  '_controller' => 'Hub\\HubBundle\\Controller\\DefaultController::signupAction',  '_route' => 'hub_signup',);
        }

        if (0 === strpos($pathinfo, '/login')) {
            // hub_login
            if ($pathinfo === '/login') {
                return array (  '_controller' => 'Hub\\HubBundle\\Controller\\DefaultController::loginAction',  '_route' => 'hub_login',);
            }

            // hub_login_check
            if ($pathinfo === '/login_check') {
                return array('_route' => 'hub_login_check');
            }

        }

        if (0 === strpos($pathinfo, '/signup_professional')) {
            // hub_signup_professional1
            if ($pathinfo === '/signup_professional1') {
                return array (  '_controller' => 'Hub\\HubBundle\\Controller\\ProfessionalController::signup_professional1Action',  '_route' => 'hub_signup_professional1',);
            }

            // hub_signup_professional2
            if ($pathinfo === '/signup_professional2') {
                return array (  '_controller' => 'Hub\\HubBundle\\Controller\\ProfessionalController::signup_professional2Action',  '_route' => 'hub_signup_professional2',);
            }

            // hub_signup_professional3
            if ($pathinfo === '/signup_professional3') {
                return array (  '_controller' => 'Hub\\HubBundle\\Controller\\ProfessionalController::signup_professional3Action',  '_route' => 'hub_signup_professional3',);
            }

            // hub_signup_professional4
            if ($pathinfo === '/signup_professional4') {
                return array (  '_controller' => 'Hub\\HubBundle\\Controller\\ProfessionalController::signup_professional4Action',  '_route' => 'hub_signup_professional4',);
            }

            // hub_signup_professional_finish
            if ($pathinfo === '/signup_professional_finish') {
                return array (  '_controller' => 'Hub\\HubBundle\\Controller\\ProfessionalController::signup_professional_finishAction',  '_route' => 'hub_signup_professional_finish',);
            }

        }

        // hub_index_professional
        if ($pathinfo === '/professional/index_professional') {
            return array (  '_controller' => 'Hub\\HubBundle\\Controller\\ProfessionalController::index_professionalAction',  '_route' => 'hub_index_professional',);
        }

        if (0 === strpos($pathinfo, '/signup_business')) {
            // hub_signup_business1
            if ($pathinfo === '/signup_business1') {
                return array (  '_controller' => 'Hub\\HubBundle\\Controller\\BusinessController::signup_business1Action',  '_route' => 'hub_signup_business1',);
            }

            // hub_signup_business2
            if ($pathinfo === '/signup_business2') {
                return array (  '_controller' => 'Hub\\HubBundle\\Controller\\BusinessController::signup_business2Action',  '_route' => 'hub_signup_business2',);
            }

            // hub_signup_business3
            if ($pathinfo === '/signup_business3') {
                return array (  '_controller' => 'Hub\\HubBundle\\Controller\\BusinessController::signup_business3Action',  '_route' => 'hub_signup_business3',);
            }

            // hub_signup_business_finish
            if ($pathinfo === '/signup_business_finish') {
                return array (  '_controller' => 'Hub\\HubBundle\\Controller\\BusinessController::signup_business_finishAction',  '_route' => 'hub_signup_business_finish',);
            }

        }

        // hub_index_business
        if ($pathinfo === '/index_business') {
            return array (  '_controller' => 'Hub\\HubBundle\\Controller\\BusinessController::index_businessAction',  '_route' => 'hub_index_business',);
        }

        // hub_list_business
        if (0 === strpos($pathinfo, '/list_business') && preg_match('#^/list_business(?:/(?P<page>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'hub_list_business')), array (  '_controller' => 'Hub\\HubBundle\\Controller\\BusinessController::list_businessAction',  'page' => 1,));
        }

        // hub_show_business
        if (0 === strpos($pathinfo, '/show_business') && preg_match('#^/show_business(?:/(?P<user>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'hub_show_business')), array (  '_controller' => 'Hub\\HubBundle\\Controller\\DefaultController::show_businessAction',  'user' => 1,));
        }

        // hub_addproduct_business
        if ($pathinfo === '/addproduct') {
            return array (  '_controller' => 'Hub\\HubBundle\\Controller\\BusinessController::addProductAction',  '_route' => 'hub_addproduct_business',);
        }

        // hub_list_product_business
        if (0 === strpos($pathinfo, '/listproduct') && preg_match('#^/listproduct(?:/(?P<page>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'hub_list_product_business')), array (  '_controller' => 'Hub\\HubBundle\\Controller\\BusinessController::listBusinessProductsAction',  'page' => 1,));
        }

        // hub_list_my_product_business
        if (0 === strpos($pathinfo, '/mylistproduct') && preg_match('#^/mylistproduct(?:/(?P<page>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'hub_list_my_product_business')), array (  '_controller' => 'Hub\\HubBundle\\Controller\\BusinessController::listMyBusinessProductsAction',  'page' => 1,));
        }

        if (0 === strpos($pathinfo, '/signup_user')) {
            // hub_signup_user1
            if ($pathinfo === '/signup_user1') {
                return array (  '_controller' => 'Hub\\HubBundle\\Controller\\UserController::signup_user1Action',  '_route' => 'hub_signup_user1',);
            }

            // hub_signup_user_finish
            if ($pathinfo === '/signup_user_finish') {
                return array (  '_controller' => 'Hub\\HubBundle\\Controller\\UserController::index_userAction',  '_route' => 'hub_signup_user_finish',);
            }

        }

        // hub_index_user
        if ($pathinfo === '/index_user') {
            return array (  '_controller' => 'Hub\\HubBundle\\Controller\\UserController::index_user2Action',  '_route' => 'hub_index_user',);
        }

        // hub_show_professional
        if (0 === strpos($pathinfo, '/show_professional') && preg_match('#^/show_professional(?:/(?P<user>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'hub_show_professional')), array (  '_controller' => 'Hub\\HubBundle\\Controller\\ProfessionalController::show_professionalAction',  'user' => 1,));
        }

        if (0 === strpos($pathinfo, '/l')) {
            // hub_list_professional
            if (0 === strpos($pathinfo, '/list_professional') && preg_match('#^/list_professional(?:/(?P<page>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'hub_list_professional')), array (  '_controller' => 'Hub\\HubBundle\\Controller\\ProfessionalController::list_professionalAction',  'page' => 1,));
            }

            // hub_logout
            if ($pathinfo === '/logout') {
                return array('_route' => 'hub_logout');
            }

        }

        // hub_ajax
        if ($pathinfo === '/ajax') {
            return array (  '_controller' => 'Hub\\HubBundle\\Controller\\AjaxController::createNotificationAction',  '_route' => 'hub_ajax',);
        }

        // hub_ajax_notification
        if ($pathinfo === '/new_notification') {
            return array (  '_controller' => 'Hub\\HubBundle\\Controller\\AjaxController::newNotificationAction',  '_route' => 'hub_ajax_notification',);
        }

        if (0 === strpos($pathinfo, '/test')) {
            // hub_test
            if ($pathinfo === '/test') {
                return array (  '_controller' => 'Hub\\HubBundle\\Controller\\AjaxController::test2Action',  '_route' => 'hub_test',);
            }

            // hub_test3
            if ($pathinfo === '/test3') {
                return array (  '_controller' => 'Hub\\HubBundle\\Controller\\DefaultController::test3Action',  '_route' => 'hub_test3',);
            }

        }

        // hub_image_cropping
        if ($pathinfo === '/cropping') {
            return array (  '_controller' => 'Hub\\HubBundle\\Controller\\AjaxController::imageCropAction',  '_route' => 'hub_image_cropping',);
        }

        // homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'homepage');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
