<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    // 代入処理
    protected $fillable = ['name', 'kana', 'tel', 'email', 'postcode', 'address', 'birthday', 'gender', 'memo',];

    /**
     * アクティブユーザーのみを含むようにクエリのスコープを設定
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeSearchCustomers($query, $input = null)
    {
        if(!empty($input)) {
            if(Customer::where('kana', 'like', $input . '%')
            ->orWhere('tel', 'like', $input . '%')->exists())
            {
                // 検索実行時に検索内容が存在したら、絞り込んでから取得（スコープの機能）
                return $query->where('kana', 'like',$input . '%')
                ->orwhere('kana', 'like',$input . '%');
            }
        }
        // $query->where('active', 1);
    }
    
}
