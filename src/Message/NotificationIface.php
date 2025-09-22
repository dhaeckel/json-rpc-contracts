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

    // region Attributes
    /**
     * @link https://github.com/php-fig/http-message
     * The following section of methods was derived from the package psr/http-message,
     * released under the MIT License. Here is the copyright notice of this package:
     *
     * Copyright (c) 2014 PHP Framework Interoperability Group
     * Permission is hereby granted, free of charge, to any person obtaining a copy
     * of this software and associated documentation files (the "Software"), to deal
     * in the Software without restriction, including without limitation the rights
     * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
     * copies of the Software, and to permit persons to whom the Software is
     * furnished to do so, subject to the following conditions:
     *
     * The above copyright notice and this permission notice shall be included in
     * all copies or substantial portions of the Software.
     *
     * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
     * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
     * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
     * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
     * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
     * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
     * THE SOFTWARE.
     */

    /**
     * Retrieve attributes derived from the message.
     *
     * The message "attributes" may be used to allow injection of any
     * parameters derived from the message: e.g., the results of method
     * match operations; authorization; etc. Attributes will be application and message specific,
     * and CAN be mutable.
     * @link https://www.php-fig.org/psr/psr-7/#321-psrhttpmessageserverrequestinterface
     * for the original text this was derived from
     *
     * @return array<string,mixed>
     */
    public function getAttributes(): array;
    /**
     * Retrieve a single derived message attribute.
     *
     * Retrieves a single derived message attribute as described in
     * getAttributes(). If the attribute has not been previously set, returns
     * the default value as provided.
     *
     * This method obviates the need for a hasAttribute() method, as it allows
     * specifying a default value to return if the attribute is not found.
     * @link https://www.php-fig.org/psr/psr-7/#321-psrhttpmessageserverrequestinterface
     * for the original text this was derived from
     *
     * @see getAttributes()
     */
    public function getAttribute(string $key, mixed $default = null): mixed;
    /**
     * Return an instance with the specified derived message attribute.
     *
     * This method allows setting a single derived message attribute as
     * described in getAttributes().
     *
     * This method MUST be implemented in such a way as to retain the
     * immutability of the message, and MUST return an instance that has the
     * updated attribute.
     * @link https://www.php-fig.org/psr/psr-7/#321-psrhttpmessageserverrequestinterface
     * for the original text this was derived from
     */
    public function withAttribute(string $key, mixed $value): static;
    // endregion
}
