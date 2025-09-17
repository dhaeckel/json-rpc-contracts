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

use Haeckel\JsonRpcServer\DataStruct\Collection;

/**
 * @extends Collection<Response>
 *
 * @link https://www.jsonrpc.org/specification#batch
 */
interface BatchResponse extends Collection
{
    /** @no-named-arguments */
    public function add(Response ...$values): void;

    /** @no-named-arguments */
    public function remove(Response ...$elements): void;

    public function current(): ?Response;
}
