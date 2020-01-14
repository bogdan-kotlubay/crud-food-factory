<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use DB;

class CsvDataImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {

        $data = [];
        foreach ($rows as $key => $value) {

            if ($value[2] === null or $value[5] == null or $value[6] === null or $value[7] === null or $value[8] === null ) {
                unset($key);
            } else {
                $data[] = array('name' => $value[2], 'count' => $value[5], 'summa' =>$value[6], 'nds'=>$value[7], 'summa2'=>$value[8]);
            }
        }

        DB::table('directories')->insert($data);
    }

}
