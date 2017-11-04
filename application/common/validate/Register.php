<?php
namespace app\common\validate;
use think\Validate;
class Register extends Validate
{
	protected $rule =[
	'user_name'=>'require',
	'user_password'=>'require',
	];
	protected $message =[
	'user_name.require'=>'请输入用户名',
	'user_password.require'=>'请输入密码',

	];
	protected  $scene = [
		'add' => ['user_name', 'user_password']
	];

}
?>