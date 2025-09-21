<?php

declare(strict_types=1);

namespace Haeckel\JsonRpcServerContract;

use Haeckel\JsonRpcServerContract\{Message, Response};

interface ClientIface
{
    public function sendRequest(
        Message\RequestIface $request,
    ): Response\SuccessIface|Response\ErrorIface;

    public function sendBatch(
        Message\BatchRequestIface $batchRequest,
    ): null|Response\BatchIface|Response\ErrorIface;

    public function sendNotification(Message\NotificationIface $notification): void;
}
