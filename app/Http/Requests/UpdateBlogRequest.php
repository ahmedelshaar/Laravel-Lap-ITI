<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (auth()->user()->role == 'user' && auth()->user()->id != $this->blog->user_id){
            return false;
        };
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:8|max:255',
            'body' => 'required|min:8|max:5000',
            'slug' => 'required|alpha_num|unique:blogs,id,' . $this->blog->id,
            'user_id'=> 'required|exists:users,id'
        ];
    }
}
