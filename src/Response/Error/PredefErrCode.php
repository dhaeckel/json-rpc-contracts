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

namespace Haeckel\JsonRpcServerContract\Response\Error;

/** @link https://www.jsonrpc.org/specification#error_object */
enum PredefErrCode: int implements ErrCodeIface
{
    /**
     * Invalid JSON was received by the server or
     * an error occurred on the server while parsing the JSON text.
     */
    case ParseError = -32700;
    /** The JSON sent is not a valid Request object. */
    case InvalidRequest = -32600;
    /** The method does not exist / is not available. */
    case MethodNotFound = -32601;
    /** Invalid method parameter(s). */
    case InvalidParams = -32602;
    /** Internal JSON-RPC error. */
    case InternalError = -32603;

    public function getCode(): int
    {
        return $this->value;
    }

    public function getMessage(): string
    {
        return match ($this->value) {
            self::ParseError->value => 'Parse error',
            self::InvalidRequest->value => 'Invalid Request',
            self::MethodNotFound->value => 'Method not found',
            self::InvalidParams->value => 'Invalid params',
            self::InternalError->value => 'Internal error',
        };
    }
}
