<?php

namespace App\Http\Requests;

use App\Location;
use App\Claim;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyLocationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('location_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:claims,id', // Use 'claims' for the table name
        ];
    }
}
