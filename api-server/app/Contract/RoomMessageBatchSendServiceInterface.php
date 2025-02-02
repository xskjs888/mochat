<?php

declare(strict_types=1);
/**
 * This file is part of MoChat.
 * @link     https://mo.chat
 * @document https://mochat.wiki
 * @contact  group@mo.chat
 * @license  https://github.com/mochatcloud/mochat/blob/master/LICENSE
 */

namespace App\Contract;

interface RoomMessageBatchSendServiceInterface
{
    /**
     * 查询单条 - 根据ID.
     * @param  int  $id  ID
     * @param  array|string[]  $columns  查询字段
     * @return array 数组
     */
    public function getRoomMessageBatchSendById(int $id, array $columns = ['*']): array;

    /**
     * 查询多条 - 根据ID.
     * @param  array  $ids  ID
     * @param  array|string[]  $columns  查询字段
     * @return array 数组
     */
    public function getRoomMessageBatchSendsById(array $ids, array $columns = ['*']): array;

    /**
     * 多条分页.
     * @param  array  $where  查询条件
     * @param  array|string[]  $columns  查询字段
     * @param  array  $options  可选项 ['orderByRaw'=> 'id asc', 'perPage' => 15, 'page' => null, 'pageName' => 'page']
     * @return array 分页结果 Hyperf\Paginator\Paginator::toArray
     */
    public function getRoomMessageBatchSendList(array $where, array $columns = ['*'], array $options = []): array;

    /**
     * 添加单条
     * @param  array  $data  添加的数据
     * @return int 自增ID
     */
    public function createRoomMessageBatchSend(array $data): int;

    /**
     * 添加多条
     * @param  array  $data  添加的数据
     * @return bool 执行结果
     */
    public function createRoomMessageBatchSends(array $data): bool;

    /**
     * 修改单条 - 根据ID.
     * @param  int  $id  id
     * @param  array  $data  修改数据
     * @return int 修改条数
     */
    public function updateRoomMessageBatchSendById(int $id, array $data): int;

    /**
     * 删除 - 单条
     * @param  int  $id  删除ID
     * @return int 删除条数
     */
    public function deleteRoomMessageBatchSend(int $id): int;

    /**
     * 删除 - 多条
     * @param  array  $ids  删除ID
     * @return int 删除条数
     */
    public function deleteRoomMessageBatchSends(array $ids): int;

    /**
     * 加锁获取单条记录
     * @param  int  $id  ID
     * @param  array|string[]  $columns  查询字段
     * @return array
     */
    public function getRoomMessageBatchSendLockById(int $id, array $columns = ['*']): array;

    /**
     * 获取定时发送列表
     * @return array
     */
    public function getRoomMessageBatchSendsBySend(): array;

}