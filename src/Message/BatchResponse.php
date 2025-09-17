<?php

declare(strict_types=1);

namespace Haeckel\JsonRpcServer\Message;

use Haeckel\JsonRpc\DataStruct\Collection;

/**
 * @extends Collection<Response>
 */
interface BatchResponse extends Collection
{
    /** @no-named-arguments */
    public function add(Response ...$values): void;

    /** @no-named-arguments */
    public function remove(Response ...$elements): void;

    public function current(): ?Response;
}
