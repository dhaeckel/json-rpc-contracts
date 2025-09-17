<?php

declare(strict_types=1);

namespace Haeckel\JsonRpcServer\Server;

interface Runner
{
    public function run(string $input = ''): void;
}
