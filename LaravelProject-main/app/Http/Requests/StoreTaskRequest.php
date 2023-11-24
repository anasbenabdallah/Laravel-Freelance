<?php

namespace App\Http\Requests;

use App\Task; // Replace with the appropriate model
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreTaskRequest extends FormRequest
{
    public function authorize()
    {
//        abort_if(Gate::denies('task_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'title' => ['required', 'string'],
            'datedebut' => ['nullable', 'date'],
            'datefin' => ['nullable', 'date', 'after:datedebut'],
            'etattache' => ['required', 'string'],
            'id_project' => ['required', 'exists:projects,id']
            // Add other fields based on the configuration
        ];
    }

}
