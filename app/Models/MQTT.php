<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MQTT extends Model
{
    use HasFactory;

    protected $table = 'mqtt_ippi';
    // protected $primaryKey = 'id_customer';
    protected $fillable = [
        'device_name',
        'device_model',
        'timestamp',
        'online',
        'InverterStatus',
        'OutputMode',
        'DailyEnergy',
        'CumulativeEnergy',
        'ActivePower',
        'ReactivePower',
        'PowerFactor',
        'GridFrequency',
        'PhaseACurrent',
        'PhaseBCurrent',
        'PhaseCCurrent',
        'PhaseAVoltage',
        'PhaseBVoltage',
        'PhaseCVoltage',
        'InternalTemperature',
        'SN',
        'Model',
        'PV1Voltage',
        'PV1Current',
        'PV2Voltage',
        'PV2Current',
        'PV3Voltage',
        'PV3Current',
        'PV4Voltage',
        'PV4Current',
        'PV5Voltage',
        'PV5Current',
        'PV6Voltage',
        'PV6Current',
        'PV7Voltage',
        'PV7Current',
        'PV8Voltage',
        'PV8Current'
    ];
}
