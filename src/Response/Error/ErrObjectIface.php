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
interface ErrObjectIface extends \JsonSerializable
{
    public static function newFromErrorCode(ErrCodeIface $errCode, mixed $data = null): static;

    public function getCode(): int;
    /** @param int $code A Number that indicates the error type that occurred. */
    public function withCode(int $code): static;

    public function getMessage(): string;
    /**
     * @param string $message A String providing a short description of the error.
     * The message SHOULD be limited to a concise single sentence.
     */
    public function withMessage(string $message): static;

    public function getData(): mixed;
    /**
     * @param mixed $data
     * A Primitive or Structured value that contains additional information about the error.
     * This may be omitted (will be, when passed argument is null).
     * The value of this member is defined by the Server
     * (e.g. detailed error information, nested errors etc.).
     */
    public function withData(mixed $data): static;
}
