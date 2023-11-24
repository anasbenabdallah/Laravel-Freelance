<?php

namespace App\Http\Requests;

use App\Location;
use App\Claim;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateLocationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('location_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'claim_status' => [
                'required',
                'numeric', // Adjust as needed
            ],
        ];
    }
    
}
