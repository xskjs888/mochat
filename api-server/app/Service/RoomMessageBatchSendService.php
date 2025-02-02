<?php

declare(strict_types=1);
/**
 * This file is part of MoChat.
 * @link     https://mo.chat
 * @document https://mochat.wiki
 * @contact  group@mo.chat
 * @license  https://github.com/mochatcloud/mochat/blob/master/LICENSE
 */

namespace App\Service;

use App\Constants\MessageBatchSend\SendWay;
use App\Constants\MessageBatchSend\Status;
use App\Model\RoomMessageBatchSend;
use App\Contract\RoomMessageBatchSendServiceInterface;
use MoChat\Framework\Service\AbstractService;

class RoomMessageBatchSendService extends AbstractService implements RoomMessageBatchSendServiceInterface
{
    /**
     * @var RoomMessageBatchSend
     */
    protected $model;

    /**
     * {@inheritdoc}
     */
    public function getRoomMessageBatchSendById(int $id, array $columns = ['*']): array
    {
        return $this->model->getOneById($id, $columns);
    }

    /**
     * {@inheritdoc}
     */
    public function getRoomMessageBatchSendsById(array $ids, array $columns = ['*']): array
    {
        return $this->model->getAllById($ids, $columns);
    }

    /**
     * {@inheritdoc}
     */
    public function getRoomMessageBatchSendList(array $where, array $columns = ['*'], array $options = []): array
    {
        return $this->model->getPageList($where, $columns, $options);
    }

    /**
     * {@inheritdoc}
     */
    public function createRoomMessageBatchSend(array $data): int
    {
        return $this->model->createOne($data);
    }

    /**
     * {@inheritdoc}
     */
    public function createRoomMessageBatchSends(array $data): bool
    {
        return $this->model->createAll($data);
    }

    /**
     * {@inheritdoc}
     */
    public function updateRoomMessageBatchSendById(int $id, array $data): int
    {
        return $this->model->updateOneById($id, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function deleteRoomMessageBatchSend(int $id): int
    {
        return $this->model->deleteOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public function deleteRoomMessageBatchSends(array $ids): int
    {
        return $this->model->deleteAll($ids);
    }

    /**
     * {@inheritdoc}
     */
    public function getRoomMessageBatchSendLockById(int $id, array $columns = ['*']): array
    {
        return $this->model::query()
            ->where('id', '=', $id)
            ->lockForUpdate()
            ->first($columns)
            ->toArray();
    }

    /**
     * {@inheritdoc}
     */
    public function getRoomMessageBatchSendsBySend(): array
    {
        return $this->model::query()
            ->where('send_way', '=', SendWay::SEND_DELAY)
            ->where('send_status', '=', Status::NOT_SEND)
            ->where('definite_time', '<=', date('Y-m-d H:i:s'))
            ->get(['id'])
            ->toArray();
    }

}