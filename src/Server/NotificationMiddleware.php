<?php

declare(strict_types=1);

namespace Haeckel\JsonRpcServerContract\Server;

use Haeckel\JsonRpcServerContract\Message;

interface NotificationMiddleware
{
    public function processNotification(
        Message\NotificationIface $request,
        NotificationHandlerIface $handler,
    ): null;
}
