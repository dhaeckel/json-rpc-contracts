<?php

declare(strict_types=1);

namespace Haeckel\JsonRpcServer\Exception;

use Haeckel\JsonRpcServer\Message;

interface JsonRpcError extends \Throwable
{
    public function getRequest(): ?Message\Request;

    public function getErrorObject(): Message\ErrorObject;
}
