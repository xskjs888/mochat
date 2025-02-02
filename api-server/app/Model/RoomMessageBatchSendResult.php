<?php

declare (strict_types=1);
namespace App\Model;

use Hyperf\Database\Model\Concerns\CamelCase;
use MoChat\Framework\Model\AbstractModel;
/**
 * @property int $id 
 * @property int $batchId 客户群消息群发id （mc_contact_message_batch_send.id)
 * @property int $employeeId 员工id （mc_work_employee.id)
 * @property int $roomId 客户群表id（work_room.id）
 * @property string $roomName 客户群名称（work_room.name）
 * @property int $roomEmployeeNum 客户群成员数量
 * @property string $roomCreateTime 群聊创建时间
 * @property string $chatId 外部客户群id，群发消息到客户不吐出该字段
 * @property string $userId 企业服务人员的userid
 * @property int $status 发送状态 0-未发送 1-已发送 2-因客户不是好友导致发送失败 3-因客户已经收到其他群发消息导致发送失败
 * @property int $sendTime 发送时间，发送状态为1时返回
 * @property \Carbon\Carbon $createdAt 
 * @property \Carbon\Carbon $updatedAt 
 */
class RoomMessageBatchSendResult extends AbstractModel
{
    use CamelCase;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'room_message_batch_send_result';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'batch_id', 'employee_id', 'room_id', 'room_name', 'room_employee_num', 'room_create_time', 'chat_id', 'user_id', 'status', 'send_time', 'created_at', 'updated_at'];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['id' => 'integer', 'batch_id' => 'integer', 'employee_id' => 'integer', 'room_id' => 'integer', 'room_employee_num' => 'integer', 'status' => 'integer', 'send_time' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}