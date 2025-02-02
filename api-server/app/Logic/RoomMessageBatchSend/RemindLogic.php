<?php

declare(strict_types=1);

/**
 * This file is part of MoChat.
 * @link     https://mo.chat
 * @document https://mochat.wiki
 * @contact  group@mo.chat
 * @license  https://github.com/mochat-cloud/mochat/blob/master/LICENSE
 */

namespace App\Logic\RoomMessageBatchSend;


use App\Contract\ContactMessageBatchSendEmployeeServiceInterface;
use App\Contract\ContactMessageBatchSendServiceInterface;
use Hyperf\Di\Annotation\Inject;
use MoChat\Framework\Constants\ErrorCode;
use MoChat\Framework\Exception\CommonException;

class RemindLogic
{
    /**
     * @Inject()
     * @var ContactMessageBatchSendServiceInterface
     */
    private $contactMessageBatchSend;

    /**
     * @Inject()
     * @var ContactMessageBatchSendEmployeeServiceInterface
     */
    private $contactMessageBatchSendEmployee;

    /**
     * @param  array  $params  请求参数
     * @param  int  $userId  当前用户ID
     * @return bool
     */
    public function handle(array $params, int $userId): bool
    {
        $batch = $this->contactMessageBatchSend->getContactMessageBatchSendById((int) $params['batchId']);
        if (!$batch) {
            throw new CommonException(ErrorCode::INVALID_PARAMS, '未找到记录');
        }
        if ($batch['userId'] != $userId) {
            throw new CommonException(ErrorCode::ACCESS_DENIED, "无操作权限");
        }
        $employees = $this->contactMessageBatchSendEmployee->getContactMessageBatchSendEmployeesByBatchId((int) $params['batchId'], (array) $params['batchEmployIds']);
        // 发送提醒消息

        return true;
    }

}