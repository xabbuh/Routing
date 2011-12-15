<?php

namespace Symfony\Cmf\Bundle\ChainRoutingBundle\Routing;

/**
 * Documents for entries in the routing table need to implement this interface
 * so the DoctrineRouter can handle them.
 */
interface RouteObjectInterface
{
    /**
     * Get the content document this route entry stands for. If non-null,
     * the ControllerClassResolver uses it to identify a controller and
     * the content is passed to the controller.
     *
     * If there is no specific content for this url (i.e. its an "application"
     * page), may return null.
     *
     * To interoperate with the standard Symfony\Cmf\Bundle\ContentBundle\Document\StaticContent
     * the instance MUST store the property in the field <code>routeContent</code>
     * to have referrer resolution work.
     *
     * @return object the document or entity this route entry points to
     */
    function getRouteContent();

    /**
     * Get the path for this route. The path may be prepended with a prefix -
     * in the case of phpcr the ID (full repository path) will work if you
     * correctly configure the DoctrineRouter with that prefix.
     */
    function getPath();

    /**
     * To work with the ControllerAliasResolver, this must at least contain
     * the field 'type' with a value from the controllers_by_alias mapping
     *
     * @return array Information for the ControllerResolver
     */
    function getRouteDefaults();
}
