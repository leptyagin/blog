<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'content'=> 'required|string',
            'preview_img'=> 'required|file',
            'main_img'=> 'required|file',
            'category_id'=> 'required|integer|exists:categories,id',
            'tag_ids'=> 'nullable|array',
            'tag_ids.*'=> 'nullable|integer|exists:tags,id',
        ];
    }

    public function messages() {
        return [
            'tile.required'=> 'Это поле необходимо для заполнения',
            'title.string'=> 'данные должны соответсвовать строчному типу',
        ];
    }
}
