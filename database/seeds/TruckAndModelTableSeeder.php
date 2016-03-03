<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Keboola\Csv\CsvFile;
use TruckJee\Models\TruckOwner\TruckModel;
use TruckJee\Models\TruckOwner\TruckModelDetails;
use TruckJee\User;

class TruckAndModelTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedModelsTable();
        $this->seedModelDetailsTable();
        $this->createTrucks();
    }

    public function seedModelsTable()
    {
        DB::table('truck_models')->truncate();
        $csv= new CsvFile('test-data/models.csv');
        foreach($csv AS $row) {
            TruckModel::create(['model_id' => $row[1]]);
        }
    }

    public function seedModelDetailsTable()
    {
        DB::table('truck_model_details')->truncate();
        $csv= new CsvFile('test-data/model-details.csv');
        foreach($csv AS $row) {
            TruckModelDetails::create([
                'model_id'       => $row[1],
                'model_name'     => $row[2],
                'manufacturer'   => $row[3],
                'dimension'      => $row[4],
                'max_capacity'   => $row[5],
                'wheels'         => $row[6],
                'type'           => $row[7],
                'axle'           => $row[8],
            ]);
        }
    }

    public function createTrucks()
    {
        factory(\TruckJee\Models\TruckOwner\Truck::class, 100)
            ->create()
            ->each(function($model){
                $model->truck_id        = getTruckId($model->id);
                $model->owner_id        = User::Owners()->get()->random(1)->id;
                $model->model_id        = TruckModel::all()->random(1)->id;
                $model->description_id  = TruckModelDetails::where('model_id','=',$model->model_id)->first()->id;
                $model->save();
            });
    }

}
