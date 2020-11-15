<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

/**
 * Created by PhpStorm.
 * User: swimming
 * Date: 2020/11/13
 * Time: 23:04
 */
class User extends Model
{
//    1. 关联的数据表
    public $table = 'user';

//    2. 主键
    public $primaryKey = 'user_id';

//    3. 允许批量操作的字段

//    public $fillable = ['user_name','user_pass','email','phone'];
    public $guarded = [];

//    4. 是否维护crated_at 和 updated_at字段

    public $timestamps = false;

    //跟Role的关联模型
    public function role(){
        return $this->belongsToMany('App\Model\Role','user_role','user_id','role_id');
    }
}