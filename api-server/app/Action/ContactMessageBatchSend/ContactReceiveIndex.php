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


use App\Logic\ContactMessageBatchSend\ContactReceiveIndexLogic;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;
use MoChat\Framework\Action\AbstractAction;
use MoChat\Framework\Request\ValidateSceneTrait;

/**
 * 客户消息群发-客户详情
 * @Controller()
 */
class ContactReceiveIndex extends AbstractAction
{
    use ValidateSceneTrait;

    /**
     * @Inject()
     * @var ContactReceiveIndexLogic
     */
    private $contactReceiveIndexLogic;

    /**
     * @RequestMapping(path="/contactMessageBatchSend/contactReceiveIndex", methods="GET")
     */
    public function handle(): array
    {
        ## 参数验证
        $this->validated($this->request->all());
        ## 接收参数
        $params = [
            'batchId'    => $this->request->input('batchId'),
            'sendStatus' => $this->request->input('sendStatus', ''),
            'keyWords'   => $this->request->input('keyWords', null),
            'page'       => $this->request->input('page', 1),
            'perPage'    => $this->request->input('perPage', 15),
        ];
        return $this->contactReceiveIndexLogic->handle($params, intval(user()['id']));
    }

    /**
     * 验证规则.
     *
     * @return array 响应数据
     */
    protected function rules(): array
    {
        return [
            'batchId'  => 'required|numeric',
            'sendType' => 'numeric',
            'keyWords' => 'max:255',
            'page'     => 'number|min:1',
            'perPage'  => 'number',
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