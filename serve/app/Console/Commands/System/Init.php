<?php

namespace App\Console\Commands\System;

use App\Models\Admin;
use App\Models\SysAccountWay;
use App\Models\SysLevel;
use App\Models\SysShopPaymentMethod;
use App\Models\SysSms;
use App\Models\SysSmsTemplate;
use App\Models\SysTemplate;
use App\Models\SysWxBankList;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Init extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'system:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '系统表格初始化';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
//        DB::table('admins')->truncate();
//        Admin::create([
//            "username" => "admin",
//            "password" => Hash::make('123456')
//        ]);
//        $this->info('系统管理员初始化完成，用户名：admin，密码：123456');
//        DB::table('sys_wx_bank_lists')->delete();
//        $banklists = [
//            ['open_bank_code'=>"0100","bank"=>"中国邮政储蓄银行"],
//            ['open_bank_code'=>"0102","bank"=>"工商银行"],
//            ['open_bank_code'=>"0103","bank"=>"农业银行"],
//            ['open_bank_code'=>"0104","bank"=>"中国银行"],
//            ['open_bank_code'=>"0105","bank"=>"建设银行"],
//            ['open_bank_code'=>"0301","bank"=>"交通银行"],
//            ['open_bank_code'=>"0302","bank"=>"中信银行"],
//            ['open_bank_code'=>"0303","bank"=>"光大银行"],
//            ['open_bank_code'=>"0304","bank"=>"华夏银行"],
//            ['open_bank_code'=>"0305","bank"=>"民生银行"],
//            ['open_bank_code'=>"0306","bank"=>"广发银行"],
//            ['open_bank_code'=>"0308","bank"=>"招商银行"],
//            ['open_bank_code'=>"0309","bank"=>"兴业银行"],
//            ['open_bank_code'=>"0310","bank"=>"浦发银行"],
//            ['open_bank_code'=>"0318","bank"=>"平安银行"],
//            ['open_bank_code'=>"0403","bank"=>"北京银行"],
//            ['open_bank_code'=>"0408","bank"=>"宁波银行"],
//        ];
//        SysWxBankList::insert($banklists);
//        $this->info('银行列表初始化成功');
//        DB::table('sys_account_ways')->delete();
//        $way_lists = [
//            ['way'=>'alipay',"title"=>"支付宝","fee"=>0,"fee_min"=>0,"fee_max"=>0,"daily_limit"=>10000,"active"=>0],
//            ['way'=>'wxpay',"title"=>"微信零钱","fee"=>0,"fee_min"=>0,"fee_max"=>0,"daily_limit"=>10000,"active"=>0],
//            ['way'=>'bank',"title"=>"银行卡","fee"=>0.1,"fee_min"=>1,"fee_max"=>25,"daily_limit"=>10000,"active"=>1],
//        ];
//        SysAccountWay::insert($way_lists);
//        $this->info('提现方式初始化成功');
//        DB::table('sys_shop_payment_methods')->delete();
//        $payment_methods = [
//            ["code" => "wallet", "title" => "钱包支付", "img" => null, "des" => "钱包支付方式", "need_setting" => false, 'need_wallet'=>false,],
//            ["code" => "cash", "title" => "货到付款", "img" => null, "des" => "货到付款方式", "need_setting" => false, 'need_wallet'=>false,],
//            ["code" => "alipay", "title" => "支付宝", "img" => null, "des" => "支付宝手机支付", "need_setting" => false, 'need_wallet'=>true,],
//            ["code" => "wxpay", "title" => "微信", "img" => null, "des" => "微信支付", "need_setting" => false, 'need_wallet'=>true,],
//        ];
//        SysShopPaymentMethod::insert($payment_methods);
//        $this->info('支付方式初始化成功');
//        DB::table('sys_sms_templates')->delete();
//        $sms_init = [
//            ["id"=>1,"template_code" => "customer_register", "template_type" => "customer", "template_name" => "验证顾客注册手机号", "template_des" => "发送注册验证码至顾客手机", "template_content" => "您好，您的验证码是#code#，请尽快验证，如非本人操作请忽略。"],
//            ["id"=>2,"template_code" => "customer_forget", "template_type" => "customer", "template_name" => "顾客密码重置验证", "template_des" => "顾客忘记密码，发送密码重置验证码至顾客手机", "template_content" => "您好，您的验证码是#code#，请尽快验证，如非本人操作请忽略。"],
//            ["id"=>3,"template_code" => "order_create", "template_type" => "order", "template_name" => "订单生成通知", "template_des" => "订单提交后，提醒顾客支付订单", "template_content" => "感谢您的惠顾，您的订单#order_no#已提交，请在#time#内完成支付。"],
//            ["id"=>4,"template_code" => "order_paid", "template_type" => "order", "template_name" => "订单生效", "template_des" => "订单付款完成后，通知顾客", "template_content" => "感谢您的惠顾，您的订单#order_no#已生效，我们将尽快为您处理。"],
//            ["id"=>5,"template_code" => "order_cancel", "template_type" => "order", "template_name" => "订单取消", "template_des" => "订单被顾客主动取消或被网站管理员取消时，通知顾客", "template_content" => "您的订单#order_no#已取消，请登录查看订单详情。"],
//            ["id"=>6,"template_code" => "order_sent", "template_type" => "order", "template_name" => "订单发货提醒", "template_des" => "订单发货时，通知顾客", "template_content" => "您的订单#order_no#正通过[#shipment_company#]配送，单号:#shipment_no#，请留意查收。"],
//            ["id"=>7,"template_code" => "order_refund", "template_type" => "order", "template_name" => "退单申请结果", "template_des" => "退单申请经过管理员审核后，通知顾客退单是否通过", "template_content" => "您的订单#order_no#退单申请状态已更新，请登录进行查看。"],
//            ["id"=>8,"template_code" => "order_payback", "template_type" => "order", "template_name" => "订单退款提醒", "template_des" => "订单退款成功后，通知顾客", "template_content" => "您的订单#order_no#已发起退款，款项#amount#将原路退回，请注意查收。"],
//            ["id"=>9,"template_code" => "admin_order_create", "template_type" => "admin_order", "template_name" => "新订单", "template_des" => "当网站有新订单时，通知管理员", "template_content" => "新订单提醒，编号：#order_no#，金额：#amount#，状态：等待配送。"],
//            ["id"=>10,"template_code" => "admin_order_paid", "template_type" => "admin_order", "template_name" => "订单付款通知", "template_des" => "新订单付款成功后，通知管理员", "template_content" => "新订单提醒，编号：#order_no#，金额：#amount#，状态：等待配送。"],
//            ["id"=>11,"template_code" => "admin_order_cancel", "template_type" => "admin_order", "template_name" => "订单关闭通知", "template_des" => "订单被顾客关闭时，通知管理员", "template_content" => "网站订单取消通知，订单号：#order_no#，金额：#amount#，状态：#order_status#。"],
//            ["id"=>12,"template_code" => "admin_order_success", "template_type" => "admin_order", "template_name" => "订单成功通知", "template_des" => "顾客确认收货时，通知管理员", "template_content" => "网站订单成功通知，订单号：#order_no#，金额：#amount#，状态：#order_status#。"],
//            ["id"=>13,"template_code" => "admin_order_refunding", "template_type" => "admin_order", "template_name" => "退单通知", "template_des" => "顾客申请退单退款时，通知管理员", "template_content" => "网站订单退款通知，订单号：#order_no#，金额：#amount#，状态：#order_status#。"],
//        ];
//        SysSmsTemplate::insert($sms_init);
//        $this->info('短信模板初始化成功');
//        $template = [
//            "id"=>1,
//            "template_name"=>"基础主题",
//            "template_file"=>"templates/default/",
//            "template_content"=>null,
//            "active"=>1
//        ];
//        $variant = [
//            "price"=>0,
//            "time"=>12
//        ];
//        if($sys_template = SysTemplate::find($template['id'])){
//            $sys_template->update($template);
//            $sys_template->variants()->delete();
//            $sys_template->variants()->create($variant);
//        }else{
//            $sys_template = SysTemplate::create($template);
//            $sys_template->variants()->create($variant);
//        }
//        $this->info('主题模板初始化成功');
//        $levels = [
//            [
//                "level" => [
//                    "id" => 3,
//                    "level_name" => "免费版",
//                    "level_img_url" => null,
//                    "level_content" => ["自动生成域名1", "可上传1-20个商品", "免费赠送1GB图片空间", "支持自定义模块"],
//                    "pic_limit" => 1,
//                    "item_limit" => 20,
//                    "domain_edit" => 0,
//                    "unlock_days" => 5,
//                    "fee_rate" => 3.5
//                ],
//                "variants" => [
//                    [
//                        "price" => 0,
//                        "time" => 12,
//                    ]
//                ]
//            ],
//            [
//                "level" => [
//                    "id" => 4,
//                    "level_name" => "高级版",
//                    "level_img_url" => null,
//                    "level_content" => ["自定义域名", "无限商品上传", "免费赠送2GB图片空间", "支持自定义模块", "提供多场景主题模版", "多种营销工具自选安装", "支持二次开发和定制", "可配置多平台小程序", "可配置微信/支付宝等收款方式", "赠送100条短信"],
//                    "pic_limit" => 2,
//                    "item_limit" => 0,
//                    "domain_edit" => 1,
//                    "unlock_days" => 3,
//                    "fee_rate" => 3
//                ],
//                "variants" => [
//                    ["price" => 89, "time" => 1,],
//                    ["price" => 237, "time" => 3,],
//                    ["price" => 414, "time" => 6,],
//                    ["price" => 708, "time" => 12,],
//                ]
//            ]
//        ];
//        foreach ($levels as $level) {
//            if ($sys_level = SysLevel::find($level['level']['id'])) {
//                $sys_level->update($level['level']);
//                $sys_level->variants()->delete();
//                foreach ($level['variants'] as $variant) $sys_level->variants()->create($variant);
//            } else {
//                $sys_level = SysLevel::create($level['level']);
//                foreach ($level['variants'] as $variant) $sys_level->variants()->create($variant);
//            }
//        }
//        $this->info('版本初始化成功');
//        $sms = [
//            "id"=>1,
//            "sms_name"=>"国内短信包"
//        ];
//        $variants = [
//            ["price"=>9,"time"=>100],
//            ["price"=>45,"time"=>500],
//            ["price"=>90,"time"=>1000],
//        ];
//        if($sys_sms = SysSms::find($sms['id'])){
//            $sys_sms->update($sms);
//            $sys_sms->variants()->delete();
//            foreach ($variants as $variant) $sys_sms->variants()->create($variant);
//
//        }else{
//            $sys_sms = SysSms::create($sms);
//            foreach ($variants as $variant) $sys_sms->variants()->create($variant);
//        }
//        $this->info('短信包初始化成功');
        $this->info('初始化成功');
    }
}
