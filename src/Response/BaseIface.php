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

namespace Haeckel\JsonRpcServerContract\Response;

/**
 * When a rpc call is made, the Server MUST reply with a Response,
 * except for in the case of Notifications.
 * The Response is expressed as a single JSON Object
 *
 * @link https://www.jsonrpc.org/specification#response_object
 */
interface BaseIface extends \JsonSerializable
{
    public function getId(): null|int|string;
    /**
     * @param null|int|string $id
     * It MUST be the same as the value of the id member in the Request Object.
     * If there was an error in detecting the id in the Request object
     * (e.g. Parse error/Invalid Request), it MUST be Null.
     */
    public function withId(null|int|string $id): static;

    public function getJsonrpc(): string;
    /**
     * @param string $jsonrpc
     * A String specifying the version of the JSON-RPC protocol. MUST be exactly "2.0".
     */
    public function withJsonrpc(string $jsonrpc): static;
}
