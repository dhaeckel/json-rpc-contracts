<?php

declare(strict_types=1);

namespace Haeckel\JsonRpcServer\Server;

use Haeckel\JsonRpcServer\{Exception, Message};

interface Router
{
    /** @throws Exception\MethodNotFound */
    public function getRequestHandler(Message\Request $request): RequestHandler;

    /** @throws Exception\MethodNotFound */
    public function getNotificationHandler(Message\Notification $notification): NotificationHandler;
}
