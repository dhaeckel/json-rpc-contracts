<?php

declare(strict_types=1);

namespace Haeckel\JsonRpcServer\Message\ErrObj;

interface ErrorCode
{
    public function getCode(): int;

    public function getMessage(): string;
}
