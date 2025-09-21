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

use Haeckel\JsonRpcServerContract\DataStruct\CollectionIface;

/**
 * The Server should respond with an Array containing the corresponding Response objects,
 * after all of the batch Request objects have been processed.
 * A Response object SHOULD exist for each Request object,
 * except that there SHOULD NOT be any Response objects for notifications.
 * The Server MAY process a batch rpc call as a set of concurrent tasks,
 * processing them in any order and with any width of parallelism.
 *
 * The Response objects being returned from a batch call MAY be returned in any order within the
 * Array. The Client SHOULD match contexts between the set of Request objects and the resulting set
 * of Response objects based on the id member within each Object.
 *
 * If the batch rpc call itself fails to be recognized as an valid JSON or as an Array with at least
 * one value, the response from the Server MUST be a single Response object.
 * If there are no Response objects contained within the Response array as it is to be sent to the
 * client, the server MUST NOT return an empty Array and should return nothing at all.
 *
 * @link https://www.jsonrpc.org/specification#batch
 *
 * @extends CollectionIface<ErrorIface|SuccessIface>
 */
interface BatchIface extends CollectionIface
{
    /** @no-named-arguments */
    public function add(ErrorIface|SuccessIface ...$elements): void;

    public function current(): null|ErrorIface|SuccessIface;

    /** @no-named-arguments */
    public function remove(ErrorIface|SuccessIface ...$elements): void;
}
