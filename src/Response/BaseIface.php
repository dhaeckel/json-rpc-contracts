<?php

declare(strict_types=1);

namespace Haeckel\JsonRpcServerContract\Response;

interface BaseIface extends \JsonSerializable
{
    public function getId(): null|int|string;
    public function withId(null|int|string $id): static;

    public function getJsonrpc(): string;
    public function withJsonrpc(string $jsonrpc): static;
}
