<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditUserRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true; //TODO: Check for permissions
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'auth' => 'required',
            'name' => 'required',
            'credits' => 'required|numeric'
		];
	}

}
