<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [];
        // lấy ra trên phương thức đang hoạt động
        $currentAction = $this->route()->getActionMethod();

        switch ($this->method()) :

            case 'POST':
                switch ($currentAction) {
                    case 'add' :
                    $rules = [
                            "email"=>"required",
                            "name"=> "required",
                            "image" => "required|image|mimes:jpeg,jpg,png|max:5120"
                    ] ;
//                  break;
                    default:
                        break;
                }
                break;
        endswitch;

        return $rules;
    }
    public function messages()
    {
        return [
            'email.required'=>'bắt buộc phải nhập email',
            'name.required'=>'bắt buộc phải nhập name',
            'email.unique'=>'Email đã tồn tại'
        ];
    }
}
