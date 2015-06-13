<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreItemRequest extends Request
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
            'priority' => 'numeric',
            'name' => 'required', //TODO: Check for no whitespaces
            'display_name' => 'required',
            'description' => 'required',
            'web_description',
            'type' => 'required',
            'loadout_slot' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'attrs', //TODO: Perfom JSON Validation on the Attrs field
            'is_buyable',
            'is_tradeable',
            'is_refundable',
            'expiry_time',
            'flags',
        ];
    }

}
