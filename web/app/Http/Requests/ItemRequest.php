<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ItemRequest extends Request {

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
            'name' => 'required',
            'display_name' => 'required',
            'description' => 'required',
            'web_description',
            'type' => 'required',
            'loadout_slot' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'attrs',
            'is_buyable',
            'is_tradeable',
            'is_refundable',
            'expiry_time',
            'flags',
		];
        //TODO: Perfom JSON Validation on the Attrs field
	}

}
