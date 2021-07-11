<?php


namespace App\Modules\Article\Request;


use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required |max:50',
            'content' => 'required',
            'article_type' => 'required|exists:article_type,id',
            'author' => 'max:50'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名称必填',
            'name.max' => '名称最多50字',
            'content.required' => '内容必填',
            'article_type.required' => '类型必填',
            'article_type.exists' => '类型不存在',
            'author.max' => '作者最多50字'
        ];
    }

}
