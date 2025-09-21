<?php

declare(strict_types=1);

namespace Haeckel\JsonRpcServerContract\Response;

use Haeckel\JsonRpcServerContract\Message;

interface ErrorIface extends BaseIface
{
    public function getError(): null|Message\ErrorObjectIface;
    public function withError(null|Message\ErrorObjectIface $error): static;
}
