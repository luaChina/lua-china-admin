<?php
/**
 * Created by PhpStorm.
 * User: hejunwei
 * Date: 2018/8/28
 * Time: 23:06
 */
return [
    // admin
    'admin' => [
        'restore' => [
            'status'  => 0x000101,
            'message' => '管理员恢复失败，系统错误',
        ],
    ],

    // user
    'user'  => [
        'delete'  => [
            'status'  => 0x000201,
            'message' => '用户禁用失败，系统错误',
        ],
        'restore' => [
            'status'  => 0x000202,
            'message' => '用户恢复失败，系统错误',
        ]
    ],

    // post
    'post' => [
        'delete'  => [
            'status'  => 0x000301,
            'message' => '文章下架失败，系统错误',
        ],
        'restore' => [
            'status'  => 0x000302,
            'message' => '文章恢复失败，系统错误',
        ]
    ]
];