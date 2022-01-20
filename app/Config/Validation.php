<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------

    public $signup = [
        'acount' => [
            'rules'  => 'required|is_not_unique[users.acount,pwd,{pwd}]',
            'errors' => [
                'required' => '請輸入帳號',
                'is_not_unique' => '帳號密碼錯誤',
            ],
        ],
        'pwd'    => [
            'rules'  => 'required',
            'errors' => [
                'required'=>'請輸入密碼',
                
            ],
        ],
    ];
    public $register = [
        'acount' => [
            'rules'  => 'required|is_unique[users.acount]|max_length[10]',
            'errors' => [
                'required' => '請輸入帳號',
                'is_unique' => '帳號重複請重新輸入',
                'max_length'=>'不能超過10個字'
            ],
        ],
        'pwd'    => [
            'rules'  => 'required|max_length[10]',
            'errors' => [
                'required'=>'請輸入密碼',
                'max_length'=>'不能超過10碼'
            ],
        ],
        'name'    => [
            'rules'  => 'required|max_length[10]',
            'errors' => [
                'required'=>'請輸入名字',
                'max_length'=>'不能超過10個字'
            ],
        ],
    ];
}
