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

namespace Haeckel\JsonRpcServerContract\Server;

use Haeckel\JsonRpcServerContract\{Message, Response};

/**
 * Participant in processing a request and response.
 *
 * A middleware component participates in processing a JSON-RPC Request:
 * by acting on the request, generating the response, or forwarding the
 * request to a subsequent middleware and possibly acting on its response.
 */
interface RequestMiddlewareIface
{
    /**
     * Processes an incoming request in order to produce a response.
     * If unable to produce the response itself,
     * it may delegate to the provided handler to do so.
     */
    public function process(
        Message\RequestIface $request,
        RequestHandlerIface $handler,
    ): Response\ErrorIface|Response\SuccessIface;
}
