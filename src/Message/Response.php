<?php

declare(strict_types=1);

namespace Haeckel\JsonRpcServer\Message;

use Haeckel\JsonRpc\Exception;

final class Response implements \JsonSerializable
{
    /**
     * @param null|array<int|string,mixed>|bool|float|int|string|\stdClass|\JsonSerializable $result
     *
     * @throws \DomainException exactly one of result and code must not be null(omitted) per spec
     */
    public function __construct(
        public readonly null|array|bool|float|int|string|\stdClass|\JsonSerializable $result,
        public readonly null|int|string $id,
        public readonly null|ErrorObject $error = null,
        public readonly string $jsonrpc = '2.0',
    ) {
        if (($error === null && $result === null) || ($error !== null && $result !== null)) {
            throw new \DomainException(
                message: 'exactly one of the members "result" or "error" must not be null'
            );
        }
    }

    public function jsonSerialize(): mixed
    {
        $vars = \get_object_vars($this);
        if ($this->result === null) {
            unset($vars['result']);
        }
        if ($this->error === null) {
            unset($vars['error']);
        }

        return $vars;
    }
}
