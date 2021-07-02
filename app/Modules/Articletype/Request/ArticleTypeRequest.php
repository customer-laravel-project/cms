<?php


namespace App\Modules\Articletype\Request;


use Illuminate\Foundation\Http\FormRequest;

class ArticleTypeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required |max:50',
            'abbr' => 'max:50',
            'sorts' => 'integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '类型必填',
            'name.max' => '类型最多50字',
            'abbr.max' => '缩写最多50字',
            'sorts.integer' => '排序必须是数字'
        ];
    }

}
