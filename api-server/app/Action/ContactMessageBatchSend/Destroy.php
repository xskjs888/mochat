<?php

declare(strict_types=1);
/**
 * This file is part of MoChat.
 * @link     https://mo.chat
 * @document https://mochat.wiki
 * @contact  group@mo.chat
 * @license  https://github.com/mochatcloud/mochat/blob/master/LICENSE
 */

namespace App\Action\ContactMessageBatchSend;

use App\Logic\ContactMessageBatchSend\DestroyLogic;
use Hyperf\Di\Annotation\Inject;
use MoChat\Framework\Action\AbstractAction;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;
use MoChat\Framework\Request\ValidateSceneTrait;

/**
 * 客户消息群发 - 删除消息
 * @Controller()
 */
class Destroy extends AbstractAction
{
    use ValidateSceneTrait;

    /**
     * @Inject()
     * @var DestroyLogic
     */
    private $destroyLogic;

    /**
     * @RequestMapping(path="/contactMessageBatchSend/destroy", methods="DELETE")
     */
    public function handle(): array
    {
        ## 参数验证
        $this->validated($this->request->all());
        $batchId = $this->request->input('batchId');
        ## 接收参数
        $params = [
            'batchId' => $batchId,
        ];
        $this->destroyLogic->handle($params, intval(user()['id']));
        return [];
    }

    /**
     * 验证规则.
     *
     * @return array 响应数据
     */
    protected function rules(): array
    {
        return [
            'batchId' => 'required|numeric',
        ];
    }

    /**
     * 验证错误提示.
     * @return array 响应数据
     */
    protected function messages(): array
    {
        return [];
    }
}