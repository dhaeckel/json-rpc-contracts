<?php

declare(strict_types=1);

namespace Haeckel\JsonRpcServerContract;

use Haeckel\JsonRpcServerContract\{Message, Response};

interface ClientIface
{
    public function sendRequest(
        string|\Stringable $address,
        Message\RequestIface $request,
    ): Response\SuccessIface|Response\ErrorIface;

    public function sendBatch(
        string|\Stringable $address,
        Message\BatchRequestIface $batchRequest,
    ): null|Response\BatchIface|Response\ErrorIface;

    public function sendNotification(
        string|\Stringable $address,
        Message\NotificationIface $notification,
    ): void;
}
