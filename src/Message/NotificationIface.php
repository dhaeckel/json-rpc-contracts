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
 * A Notification is a Request object without an "id" member.
 * A Request object that is a Notification signifies the Client's lack of interest in the
 * corresponding Response object, and as such no Response object needs to be returned to the client.
 * The Server MUST NOT reply to a Notification, including those that are within a batch request.
 *
 * Notifications are not confirmable by definition,
 * since they do not have a Response object to be returned.
 * As such, the Client would not be aware of any errors
 * (like e.g. "Invalid params","Internal error").
 * @link https://www.jsonrpc.org/specification#notification
 */
interface NotificationIface extends \JsonSerializable
{
    public function getJsonRpc(): string;
    /**
     * @param string $jsonrpc
     * A String specifying the version of the JSON-RPC protocol. MUST be exactly "2.0".
     */
    public function withJsonRpc(string $jsonrpc): static;

    public function getMethod(): string;
    /**
     * @param string $method
     * A String containing the name of the method to be invoked.
     * Method names that begin with the word rpc followed by a period character (U+002E or ASCII 46)
     * are reserved for rpc-internal methods and extensions and MUST NOT be used for anything else.
     */
    public function withMethod(string $method): static;

    /** @return null|object|list<mixed> */
    public function getParams(): null|array|object;
    /**
     * @param null|object|list<mixed> $params
     * A Structured value that holds the parameter values to be used during the invocation of the
     * method. This member MAY be omitted (in this case with null).
     *
     * If present, parameters for the rpc call MUST be provided as a Structured value.
     * Either by-position through an Array or by-name through an Object.
     *
     * by-position: params MUST be an Array, containing the values in the Server expected order.
     * by-name: params MUST be an Object, with member names that match the Server expected parameter
     * names. The absence of expected names MAY result in an error being generated.
     * The names MUST match exactly, including case, to the method's expected parameters.
     *
     * @link https://www.jsonrpc.org/specification#parameter_structures
     */
    public function withParams(null|array|object $params): static;
}
