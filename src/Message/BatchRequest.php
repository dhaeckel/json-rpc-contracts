<?php

declare(strict_types=1);

namespace Haeckel\JsonRpcServer\Message;

use Haeckel\JsonRpcServer\DataStruct\Collection;

/**
 * @extends Collection<Request|Notification>
 */
interface BatchRequest extends Collection
{
    /** @no-named-arguments */
    public function remove(Request|Notification ...$elements): void;

    public function current(): null|Request|Notification;

    /** @no-named-arguments */
    public function add(Request|Notification ...$values): void;

    /**
     * if any request of a batch is invalid or hast invalid json, add the error response here
     * @no-named-arguments
     */
    public function addResponseForInvalidReq(Response ...$response): void;

    /**
     * @return list<Response>
     */
    public function getResponsesForInvalidRequests(): array;
}
