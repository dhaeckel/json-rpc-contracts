<?php

declare(strict_types=1);

namespace Haeckel\JsonRpcServer\Message;

class Notification
{
    /** @param null|object|array<mixed> $params */
    public function __construct(
        public readonly string $jsonrpc,
        public readonly string $method,
        public readonly null|array|object $params,
    ) {
    }
}
