<?php

declare(strict_types=1);

namespace Haeckel\JsonRpcServerContract\Server;

use Haeckel\JsonRpcServerContract\Message;

/**
 * Split from general Middleware interface to provide unambiguous return types for this and
 * RequestMiddlewareIface.
 * may be implemented in the same class as the RequestHandlerIface for optimal code reuse.
 */
interface NotificationMiddleware
{
    public function processNotification(
        Message\NotificationIface $request,
        NotificationHandlerIface $handler,
    ): null;
}
