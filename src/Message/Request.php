<?php

declare(strict_types=1);

namespace Haeckel\JsonRpcServer\Message;

class Request extends Notification
{
    public function __construct(
        string $jsonrpc,
        string $method,
        null|object|array $params,
        public readonly int|string $id,
    ) {
        parent::__construct($jsonrpc, $method, $params);
    }
}
