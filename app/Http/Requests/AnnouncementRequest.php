<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementRequest extends FormRequest
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
            "title"=> "required|string|max:120", 
            "body" =>"required|string|max:500",
            "category_id" => "required",
        ];
    }
    //messaggi di errore personalizzati
    public function messages()
    {
        return [
            "title.required"=> "Il titolo è richiesto.",
            "title.string"=> "Il titolo deve contenere del testo.",
            "title.max"=> "Il titolo deve contenere massimo :max caratteri.",
            "body.required" =>"L'articolo è richiesto.",
            "body.string" =>"L'articolo deve contenere del testo.",
            "body.max" =>"L'articolo deve contenere massimo :max caratteri.",
            "category_id.required" => "Non hai scelto una categoria.",
        ];
    }
}



