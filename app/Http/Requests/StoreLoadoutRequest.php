<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreLoadoutRequest extends Request
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
            'display_name'=>'required|string',
            'game'=>'in:css,csgo,tf2',
            'class'=>'in:scout,sniper,soldir,demoman,medic,hevy,pyro,spy,engineer',
            'team'=>'in:2,3',
            'privacy'=>'in:public,private,link',
            'owner_id'=>'required|numeric'
        ];
    }
}
