<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stock;

class StockSeeder extends Seeder
{
    public function run(): void
    {
        // ── 60 kg bags ─────────────────────────────────────────────
        $bags60 = [
            ['bag_no'=>'10401','nwt'=>64.1], ['bag_no'=>'10986','nwt'=>67.6],
            ['bag_no'=>'10988','nwt'=>67.0], ['bag_no'=>'11639','nwt'=>66.1],
            ['bag_no'=>'11640','nwt'=>66.6], ['bag_no'=>'11649','nwt'=>64.5],
            ['bag_no'=>'11657','nwt'=>86.0], ['bag_no'=>'11670','nwt'=>45.2],
            ['bag_no'=>'12113','nwt'=>59.5], ['bag_no'=>'12116','nwt'=>58.8],
            ['bag_no'=>'12118','nwt'=>58.7], ['bag_no'=>'12119','nwt'=>56.6],
            ['bag_no'=>'12120','nwt'=>58.4], ['bag_no'=>'12121','nwt'=>58.7],
            ['bag_no'=>'12122','nwt'=>58.4], ['bag_no'=>'12126','nwt'=>59.2],
            ['bag_no'=>'12128','nwt'=>61.0], ['bag_no'=>'12129','nwt'=>58.3],
            ['bag_no'=>'12130','nwt'=>60.1], ['bag_no'=>'12133','nwt'=>59.7],
            ['bag_no'=>'13160','nwt'=>45.0], ['bag_no'=>'13161','nwt'=>45.0],
            ['bag_no'=>'13072','nwt'=>72.1], ['bag_no'=>'13073','nwt'=>70.0],
            ['bag_no'=>'13074','nwt'=>74.2], ['bag_no'=>'13067','nwt'=>76.4],
            ['bag_no'=>'13069','nwt'=>73.1], ['bag_no'=>'13070','nwt'=>72.4],
            ['bag_no'=>'13071','nwt'=>74.1], ['bag_no'=>'13066','nwt'=>72.7],
            ['bag_no'=>'126',  'nwt'=>73.1], ['bag_no'=>'127',  'nwt'=>73.9],
            ['bag_no'=>'128',  'nwt'=>74.0],
        ];

        // ── 80 kg bags ─────────────────────────────────────────────
        $bags80 = [
            ['bag_no'=>'13149','nwt'=>63.3], ['bag_no'=>'13150','nwt'=>63.1],
            ['bag_no'=>'13151','nwt'=>60.7], ['bag_no'=>'13152','nwt'=>62.5],
            ['bag_no'=>'13068','nwt'=>31.7], ['bag_no'=>'13080','nwt'=>63.5],
            ['bag_no'=>'13081','nwt'=>62.5], ['bag_no'=>'13084','nwt'=>62.8],
            ['bag_no'=>'13085','nwt'=>62.6], ['bag_no'=>'12370','nwt'=>58.4],
            ['bag_no'=>'12371','nwt'=>59.9], ['bag_no'=>'10',   'nwt'=>63.7],
            ['bag_no'=>'11',   'nwt'=>64.3], ['bag_no'=>'12',   'nwt'=>64.7],
            ['bag_no'=>'13',   'nwt'=>64.5], ['bag_no'=>'15',   'nwt'=>64.7],
        ];

        // ── 70 kg bags ─────────────────────────────────────────────
        $bags70 = [
            ['bag_no'=>'13153','nwt'=>59.7], ['bag_no'=>'13154','nwt'=>59.3],
            ['bag_no'=>'13155','nwt'=>59.0], ['bag_no'=>'13082','nwt'=>60.3],
            ['bag_no'=>'13083','nwt'=>59.7], ['bag_no'=>'13048','nwt'=>59.6],
            ['bag_no'=>'13049','nwt'=>53.8], ['bag_no'=>'13063','nwt'=>60.1],
            ['bag_no'=>'13055','nwt'=>60.4], ['bag_no'=>'13056','nwt'=>59.7],
            ['bag_no'=>'13059','nwt'=>59.3], ['bag_no'=>'4',    'nwt'=>63.7],
            ['bag_no'=>'5',    'nwt'=>59.82],['bag_no'=>'6',    'nwt'=>59.7],
            ['bag_no'=>'7',    'nwt'=>59.9],
        ];

        foreach ($bags60 as $b) {
            Stock::create(['category'=>'bag','size'=>60,'bag_no'=>$b['bag_no'],'nwt'=>$b['nwt'],'quantity'=>1]);
        }
        foreach ($bags80 as $b) {
            Stock::create(['category'=>'bag','size'=>80,'bag_no'=>$b['bag_no'],'nwt'=>$b['nwt'],'quantity'=>1]);
        }
        foreach ($bags70 as $b) {
            Stock::create(['category'=>'bag','size'=>70,'bag_no'=>$b['bag_no'],'nwt'=>$b['nwt'],'quantity'=>1]);
        }

        // ── Extra items ────────────────────────────────────────────
        Stock::create(['category'=>'extra','size'=>0,'bag_no'=>'EXTRA-1','nwt'=>0,'quantity'=>7, 'extra_type'=>'grware bun','extra_ply'=>'15ply','extra_mm'=>'35mm']);
        Stock::create(['category'=>'extra','size'=>0,'bag_no'=>'EXTRA-2','nwt'=>0,'quantity'=>8, 'extra_type'=>'grware bun','extra_ply'=>'15ply','extra_mm'=>'40mm']);
        Stock::create(['category'=>'extra','size'=>0,'bag_no'=>'EXTRA-3','nwt'=>0,'quantity'=>3, 'extra_type'=>'100md bags','extra_ply'=>null,   'extra_mm'=>'40mm']);
        Stock::create(['category'=>'extra','size'=>0,'bag_no'=>'EXTRA-4','nwt'=>0,'quantity'=>1, 'extra_type'=>'70 yarn bags','extra_ply'=>null, 'extra_mm'=>null]);
    }
}
