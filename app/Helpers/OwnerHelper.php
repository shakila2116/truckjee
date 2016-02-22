<?php

use Carbon\Carbon;
use TruckJee\Models\TruckOwner\Truck;
use TruckJee\Models\TruckOwner\TruckModel;
use TruckJee\Models\TruckOwner\TruckModelDetails;

/**
 * @param $id
 * @return string
 */
function getOwnerId($id)
{
    return "TOW".(100+$id);
}

/**
 * @param $id
 * @return mixed
 */
function getOwnerName($id)
{
    return \TruckJee\User::findOrFail($id)->name;
}

/**
 * Return formatted day time to views
 *
 * @param $dateTime
 * @return string
 */
function dayFormat($dateTime)
{
    return Carbon::createFromFormat('Y-m-d H:i:s',$dateTime)->toDayDateTimeString();
}

/**
 * @param $modelId
 * @return string
 */
function getModelInfo($modelId)
{
    $model = TruckModelDetails::findOrFail($modelId);
    return $model->manufacturer." - ".$model->model_name." - ".$model->max_capacity;
}

function getTruckId($truckId)
{
    return "TR".(100+ Truck::findOrFail($truckId)->id);
}

function getStatus($status)
{
    if($status == 0)
        return "Empty";
    return "In Transaction";
}

function getSearchTerm($id)
{
    return TruckModel::findOrFail($id)->search_term;
}