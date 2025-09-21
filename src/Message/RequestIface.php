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

/**
 * A rpc call is represented by sending a Request object to a Server.
 *
 * The Server MUST reply with the same value in the Response object if included.
 * This member is used to correlate the context between the two objects.
 * @link https://www.jsonrpc.org/specification#request_object
 */
interface RequestIface extends NotificationIface
{
    public function getId(): int|string;
    /**
     * @param int|string $id
     * An identifier established by the Client that MUST contain a String, Number, or NULL value.
     * The value SHOULD normally not be Null [1] and Numbers SHOULD NOT contain fractional parts [2]
     *
     * ATTENTION: this implementation is strict with the with the interpretation of allowable types
     * and only allows string and int as it's type.
     */
    public function withId(int|string $id): static;
}
