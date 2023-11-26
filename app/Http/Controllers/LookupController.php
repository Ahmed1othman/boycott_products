<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class LookupController extends Controller
{
    static function getLookupData($model)
    {

        // model must be like gender-type or country
        $allowedModels = [
            'Category',
            'Country',
            'Company',
            'ProductStatus',
            'ProductAccept',
            'ProductTag',
        ];

        $modelClass = 'App\\Models\\' . kebabToPascal($model);
        if (class_exists($modelClass) && !in_array($modelClass, $allowedModels)) {
            $data = $modelClass::get()
                ->makeHidden([
                    'created_at',
                    'updated_at',
                ]);
            return $data;
        }
        return "Error";
    }


}
