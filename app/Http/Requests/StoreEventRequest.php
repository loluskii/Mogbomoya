<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
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
            'name' => 'required',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            'time' => 'required',
            'date' => 'required',
            'event_type' => 'required',
            'location' => 'required_if:event_type,1',
            'link' => 'required_if:event_type,0',
            'longitude' => 'required_if:event_type,1',
            'latitude' => 'required_if:event_type,1',
            'categories' => 'required',
            'isPaid' => 'required',
            'isPublic' => 'required',
            'tier_name' => 'required_if:isPaid,1',
            'tier_price' => 'required_if:isPaid,1',
            'limit' => 'required|nullable',
        ];
    }

    public function messages(){
        return [
            'isPaid.required' => 'Please signify if this event is a paid event or not.',
            'isPublic.required' => 'Please signify if this event is a public event or not.',
            'categories.required' => 'Please select at least one category.',
            'tier_name.required_if' => 'Please you need to add at least a tier for a paid event',
            'tier_price.required_if' => 'Please you need to add at least a price to a tier for a paid event',
            'limit.required' => 'Please you need to add at least a limit to a tier for a paid event',

        ];
    }
}
