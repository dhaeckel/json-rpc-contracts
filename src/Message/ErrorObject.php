<?php

declare(strict_types=1);

namespace Haeckel\JsonRpcServer\Message;

use Haeckel\JsonRpcServer\Message\ErrObj\ErrorCode;

class ErrorObject implements \JsonSerializable
{
    private string $message;

    public function __construct(
        public readonly ErrorCode $code,
        ?string $message = null,
        public readonly mixed $data = null,
    ) {
        $this->message = $message ?? $code->getMessage();
    }

    /** @return array<string,mixed> */
    public function jsonSerialize(): array
    {
        $vars = \get_object_vars($this);
        if ($vars['data'] === null) {
            unset($vars['data']);
        }

        return $vars;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}
