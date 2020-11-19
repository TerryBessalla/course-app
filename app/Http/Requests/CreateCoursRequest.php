<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCoursRequest extends FormRequest
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
        'title'=>'required',
        'description'=>'required',
        'episodes'=>['required','array'],
        'episodes.*.title'=>'required',
        'episodes.*.description'=>'required',
        'episodes.*.video_url'=>'required|url'
        ];
    }
}
