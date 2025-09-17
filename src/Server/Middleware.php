<?php

declare(strict_types=1);

namespace Haeckel\JsonRpcServer\Server;

use Haeckel\JsonRpcServer\Message;

interface Middleware
{
    public function process(
        Message\Notification|Message\Request $request,
        RequestHandler $requestHandler,
    ): ?Message\Response;
}
