<?php

function getTransporterId($id)
{
    return "TR".(100+$id);
}

function getPackingType()
{
    return [
        'Carton Box',
        'Reels',
        'Barrels',
        'Pellets',
        'Bales',
        'Other'
    ];
}

function getMaterials()
{
    return [
        'Building Material',
        'Granite',
        'Cement',
        'Chemicals',
        'Coal',
        'Electronics'
    ];
}

function getMaxWeights()
{
    return [
        '5-7MT',
        '7-8.5MT',
        '9-11MT',
        '11-13MT',
        '13-15MT',
        '15-18MT',
        '18-21MT'
    ];
}

function getCargoValues()
{
    return [
        'Under 10 Lakhs',
        '10-20 Lakhs',
        '20-30 Lakhs',
        '30-40 Lakhs',
        '40-50 Lakhs',
        'Above 50 Lakhs'
    ];
}

function getAdvance()
{
    return [
        '90% and Above',
        '80% - 90%',
        '60% - 70%',
        'les than 70%'
    ];
}

function getBalance()
{
    return [
        'Immediate',
        '7 days',
        '15 days',
        '30 days',
        'more than 30 days'
    ];
}
