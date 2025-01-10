<?php

namespace App\Controllers;

use App\Models\DestinationModel;

class DestinationController extends BaseController
{
    public function detail($id)
    {
        $destinationModel = new DestinationModel();
        $data['destination'] = $destinationModel->find($id);
        return view('destination_detail', $data);
    }
}