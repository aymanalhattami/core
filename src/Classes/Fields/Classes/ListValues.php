<?php

namespace LaraZeus\Core\Classes\Fields\Classes;

use LaraZeus\Core\Classes\Fields\FieldsContract;

class ListValues extends FieldsContract
{
    public $disabled = false;

    public function __construct()
    {
        $this->definition = [
            'type' => 'listValues',
            'title' => 'List Values',
            'icon' => 'fa-check',
            'settings_view' => 'list-values',
            'order' => 3,
        ];
    }

    public function showResponse($field, $ans): string
    {
        $valAsArray = (EvoTools::isJson($ans->response)) ? json_decode($ans->response) : $ans->response;

        if (is_array($valAsArray)) {
            return '[&nbsp;'.implode('&nbsp;-&nbsp;', $valAsArray).'&nbsp;]';
        }

        return $valAsArray;
    }

    public function exportResponse($response)
    {
        $valAsArray = (EvoTools::isJson($response->response)) ? json_decode($response->response) : $response->response;

        if (is_array($valAsArray)) {
            return implode(', ', $valAsArray);
        }

        return $valAsArray;
    }

    public function apiResponse($response)
    {
        $valAsArray = (EvoTools::isJson($response->response)) ? json_decode($response->response) : $response->response;

        if (is_array($valAsArray)) {
            return implode(', ', $valAsArray);
        }

        return $valAsArray;
    }
}

