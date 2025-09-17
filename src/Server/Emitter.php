<?php

declare(strict_types=1);

namespace Haeckel\JsonRpcServer\Server;

use Haeckel\JsonRpcServer\Message;

interface Emitter
{
    /** @throws \Throwable */
    public function emit(Message\Response|Message\BatchResponse $response): void;
}
