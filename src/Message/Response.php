<?php

/**
 * This file is part of haeckel/json-rpc-server-contracts.
 *
 * haeckel/json-rpc-server-contracts is free software:
 * you can redistribute it and/or modify it under the terms of the GNU Lesser General Public License
 * as published by the Free Software Foundation, either version 3 of the License,
 * or (at your option) any later version.
 *
 * haeckel/json-rpc-server-contracts is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License along with
 * haeckel/json-rpc-server-contracts.
 * If not, see <https://www.gnu.org/licenses/>.
 */

declare(strict_types=1);

namespace Haeckel\JsonRpcServer\Message;

/** @link https://www.jsonrpc.org/specification#response_object */
interface Response extends \JsonSerializable
{
    /** @return null|bool|float|int|string|\stdClass|\JsonSerializable|array<mixed> */
    public function getResult(): null|array|bool|float|int|string|\stdClass|\JsonSerializable;

    /**
     * @param null|bool|float|int|string|\stdClass|\JsonSerializable|array<mixed> $result
     *
     * @throws \DomainException if error is null and passed arg is null,
     * or if error is not null and arg is not null.
     * exactly one of result and error must not be null(omitted) per spec.
     */
    public function withResult(
        null|array|bool|float|int|string|\stdClass|\JsonSerializable $result
    ): static;

    public function getId(): null|int|string;
    public function withId(null|int|string $id): static;

    public function getError(): null|ErrorObject;
    /**
     * @throws \DomainException if result is null and passed arg is null,
     * or if result is not null and arg is not null.
     * exactly one of result and error must not be null(omitted) per spec.
     */
    public function withError(null|ErrorObject $error): static;

    public function getJsonrpc(): string;
    public function withJsonrpc(string $jsonrpc): static;
}
