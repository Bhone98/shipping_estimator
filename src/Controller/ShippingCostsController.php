<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Validation\Validator;

class ShippingCostsController extends AppController
{
    public function index()
    {           
       
        if ($this->request->is('post')) {

            $data = $this->request->getData();
            $validator = new Validator();

            $validator
                ->numeric('weight', 'Weight must be a number')
                ->greaterThan('weight', 0, 'Weight must be greater than 0')
                ->numeric('length')
                ->greaterThan('length', 0)
                ->numeric('width')
                ->greaterThan('width', 0)
                ->numeric('height')
                ->greaterThan('height', 0);

            $errors = $validator->validate($data);

            if (!empty($errors)) {
                $this->set('errors', $errors);
                return;
            }

            $weight = (float)$data['weight'];
            $length = (float)$data['length'];
            $width  = (float)$data['width'];
            $height = (float)$data['height'];
            
            $volumetricWeight = ($length * $width * $height) / 5000;
            $billableWeight = max($weight, $volumetricWeight);


            $carrier = $data['carrier'];
            $pricing = [
                'royal_mail' => ['base' => 3.0, 'rate' => 1.1],
                'dhl'        => ['base' => 5.0, 'rate' => 1.5],
                'ups'        => ['base' => 4.0, 'rate' => 1.3],
            ];
            $selected = $pricing[$carrier];

            $speed = $data['speed'];
            $speedMultiplier = [
                'standard' => 1.0,
                'express'  => 1.3,
                'next_day' => 1.8,
            ];


            $cost = ($selected['base'] + ($billableWeight * $selected['rate'])) * $speedMultiplier[$speed];

            $this->Quotes = $this->fetchTable('Quotes');
            $quote = $this->Quotes->newEmptyEntity();

            $quote->weight = $weight;
            $quote->length = $length;
            $quote->width = $width;
            $quote->height = $height;
            $quote->volumetric_weight = $volumetricWeight;
            $quote->billable_weight = $billableWeight;
            $quote->cost = $cost;
            $quote->carrier = $carrier;
            $quote->speed = $speed;

            $this->Quotes->save($quote);

            $this->set(compact(
                'weight',
                'length',
                'width',
                'height',
                'volumetricWeight',
                'billableWeight',
                'cost',
                'carrier',
                'speed'
            ));
        }
    }
}
