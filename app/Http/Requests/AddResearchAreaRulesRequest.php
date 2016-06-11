<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class AddResearchAreaRulesRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true; // curently
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
                    
                    'Research_Area' => 'required'
                    
		];
	}

}
