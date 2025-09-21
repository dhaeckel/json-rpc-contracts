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

use Haeckel\JsonRpcServerContract\{DataStruct, Response};

/**
 * To send several Request objects at the same time,
 * the Client MAY send an Array filled with Request objects.
 *
 * @link https://www.jsonrpc.org/specification#batch
 *
 * @extends DataStruct\CollectionIface<RequestIface|NotificationIface>
 *
 */
interface BatchRequestIface extends DataStruct\CollectionIface
{
    /** @no-named-arguments */
    public function add(RequestIface|NotificationIface ...$elements): void;

    public function current(): null|RequestIface|NotificationIface;

    /** @no-named-arguments */
    public function remove(RequestIface|NotificationIface ...$elements): void;

    /**
     * if any request of a batch is invalid or hast invalid json, add the error response here
     * @no-named-arguments
     */
    public function addResponseForInvalidReq(Response\ErrorIface ...$response): void;

    /**
     * @return list<Response\ErrorIface>
     */
    public function getResponsesForInvalidRequests(): array;
}
