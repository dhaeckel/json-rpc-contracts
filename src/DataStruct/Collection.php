<?php

declare(strict_types=1);

namespace Haeckel\JsonRpcServer\DataStruct;

/**
 * @template V
 * @extends \Iterator<int,V>
 */
interface Collection extends \Countable, \Iterator, \JsonSerializable
{
    public function isEmpty(): bool;

    /** @return array<int,V> */
    public function toArray(): array;

    /**
     * @no-named-arguments
     * @param V $elements
     * @throws \TypeError
     */
    public function genericAdd(mixed ...$elements): void;

    /**
     * @no-named-arguments
     * @param V $elements
     * @throws \TypeError
     */
    public function genericRemove(mixed ...$elements): void;
}
