<?php

/**
 * @api {get} /roomMessageBatchSend/roomOwnerSendIndex 消息详情-客户群接收详情
 * @apiName roomMessageBatchSend.roomOwnerSendIndex
 * @apiDescription [已完成]
 * @apiGroup 客户群群发管理
 *
 * @apiParam {Number}   batchId             群发ID
 * @apiParam {Number}   [sendStatus]        发送状态（0.未发送,1.已发送, 2.发送失败）
 * @apiParam {String}   [employeeIds]       群主ID多个用英文逗号隔开
 * @apiParam {Number}   page                页码
 * @apiParam {Number}   perPage             每页显示条数
 *
 * @apiSuccessExample [json-app]
 * {
 *      "page":{
 *          "perPage" : "10",    //每页显示数
 *          "total" : "1",       //总条数
 *          "totalPage" : "3",   //总页数
 *      },
 *      "list": [       // 群主发送详情
 *          {
 *              "id": 3,                // ID
 *              "employeeId": "1",      // 成员id
 *              "employeeName": "产品技术部",    // 成员名称
 *              "employeeAlias: "张三",       // 成员别名
 *              "employeeAvatar: "xxx",       // 成员头像
 *              "employeeThumbAvatar: "xxx",  // 成员头像缩略图
 *              "sendRoomTotal": 8, // 发送群聊总数
 *              "sendSuccessTotal: // 已发送群聊总数
 *              "status": 0, // 发送状态
 *              "sendTime": "", // 发送时间
 *          },
 *          ......
 *      ]
 * }
 */
