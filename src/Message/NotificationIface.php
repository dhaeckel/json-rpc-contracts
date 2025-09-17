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

namespace Haeckel\JsonRpcServerContract\Message;

/** @link https://www.jsonrpc.org/specification#notification */
interface NotificationIface extends \JsonSerializable
{
    public function getJsonRpc(): string;
    public function withJsonRpc(string $jsonRpc): static;

    public function getMethod(): string;
    public function withMethod(string $method): static;

    /** @return null|object|array<mixed> */
    public function getParams(): null|array|object;
    /** @param null|object|array<mixed> $params */
    public function withParams(null|array|object $params): static;
}
