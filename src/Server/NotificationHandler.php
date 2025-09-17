<?php

declare(strict_types=1);

namespace Haeckel\JsonRpcServer\Server;

use Haeckel\JsonRpcServer\{Exception, Message};

interface NotificationHandler
{
    /** @throws Exception\JsonRpcError */
    public function handle(Message\Notification $notification): void;
}
