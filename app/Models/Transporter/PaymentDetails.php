<?php

namespace TruckJee\Models\Transporter;

class PaymentDetails
{
    public   $advance,
                $balance,
                $balance_payable,
                $loading_mamool,
                $loading_reimbursement,
                $unloading_mamool,
                $unloading_reimbursement,
                $detention,
                $penalty,
                $incentive,
                $challan_mamool,
                $tds;

    public function __construct(array $data)
    {
        $this->advance = $data['advance'];
        $this->balance = $data['balance'];
        $this->balance_payable = $data['balance_payable'];
        $this->loading_mamool = $data['loading_mamool'];
        $this->loading_reimbursement = $data['loading_reimbursement'];
        $this->unloading_mamool = $data['unloading_mamool'];
        $this->unloading_reimbursement = $data['unloading_reimbursement'];
        $this->detention = $data['detention'];
        $this->penalty = $data['penalty'];
        $this->incentive = $data['incentive'];
        $this->challan_mamool = $data['challan_mamool'];
        $this->tds = $data['tds'];

        return $this->getJson();
    }

    public function getJson()
    {
        return (json_encode($this));
    }
}