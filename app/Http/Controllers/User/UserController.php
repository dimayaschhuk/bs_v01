<?php

namespace App\Http\Controllers\User;

use App\Game;
use App\Information_battle_of_titan;
use App\Information_TIB;
use App\Rate;
use App\Results_period;
use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Player;
use DateTime;
use DateTimeZone;


use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class UserController extends Controller
{




    public function index()
    {

        if(Auth::id()!=null){
            return redirect()->route('user_cabinet');
        }else{
            return view('auth.login');
        }
    }

    public function cabinet()
    {


        $id_user = Auth::id();
        $u=User::find($id_user);
       $money=$u->money;










        return view('cabinet.main', array(
            'money' => $money,
        ));
    }
    public function games()
    {


        $date = new DateTime();
        $kiev = new DateTimeZone('Europe/Kiev');

        $date->setTimezone($kiev);

        $curent_data_time= $date->format('Y-m-d H:i:s');

        $id_user = Auth::id();
        $u=User::find($id_user);
        $user=$u->load(['player','transaction','player.information_battle_of_titans','player.games']);
        $to_games=[];
        $current_games=[];
        $after_games=[];
        $round=[];

        $id_game=[];
        foreach ($user['player'] as $item){

            array_push($id_game, $item->game_id);

        }


        $games=Game::find($id_game);

        $firm_name=[];

        foreach ($games as $game) {


            $data_time_start = $game->time_start;
            $data_time_startt = $game->time_start;






                //------------------------------------------------------------------


                    $period_hours = $game->period_hours;
                    $sum_period = $game->sum_period;
                    $after_period=0;
                    if(strtotime($curent_data_time) < strtotime($data_time_start)){
                        array_push($to_games, $game);
                        $firm_name[$game->id]=Player::where('user_id',Auth::user()->id)->where('game_id',$game->id)->first()->firm_name;

                    }
                    while (strtotime($curent_data_time) > strtotime($data_time_start)) {


                        $time = strtotime($data_time_start) + 3600*$period_hours; // Add 1 hour
                        $data_time_start = date('Y-m-d H:i:s', $time); // Back to string



                        if($after_period<$sum_period && strtotime($curent_data_time) > strtotime($data_time_start)){
                            $after_period++;
                        }else{
                            break;
                        }


                    }
                    if($after_period==$sum_period){
                        array_push($after_games, $game);
                        $firm_name[$game->id]=Player::where('user_id',Auth::user()->id)->where('game_id',$game->id)->first()->firm_name;
                    }

                    if($after_period!=$sum_period && strtotime($curent_data_time) > strtotime($data_time_startt)){
                        array_push($current_games, $game);
                        $firm_name[$game->id] = Player::where('user_id', Auth::user()->id)->where('game_id', $game->id)->first()->firm_name;

                    }

                    $round[$game->id]=$after_period+1;







//

        }



        $open_for_registration=Game::where('game_status','=','wait_reg')->whereNotIn('id',$id_game)
            ->get();



        return view('cabinet.games', array(
            'to_games' => $to_games,
            'current_games' => $current_games,
            'after_games' => $after_games,
            'open_for_registration' =>$open_for_registration,
            'firm_name' =>$firm_name,
            'round' =>$round,
        ));
    }
    public function statistic()
    {


$games=[];
        $players_idd=[];
        $players_id=[];
        $profit=[];
        //всі гри користувача з статусом 'finish' ------------------------------------
        $player=Player::where('user_id',Auth::id())->get();

        foreach ($player as $item){

            $game=Game::find($item->game_id);

if($game->game_status=='finish'){
    //------------------------------------------
    //всі гравці даної гри-------------------------------------
    $players=Player::where('game_id',$game->id)->get();
    $players=$players->load(['results_period']);


    foreach ($players as $iten){
        $profit[$iten->id]=0;
        foreach ($iten['results_period'] as $iteb){

            if(Rate::where('result_period_id',$iteb->id)->first()!=null){

                $profit[$iten->id]=$profit[$iten->id]+Rate::where('result_period_id',$iteb->id)->first()->profit;

            }


        }
    }


    $top_student = array_search(max($profit),$profit);
    $profit[$top_student]['status']=1;
dd($profit);
    $players_idd[$game->id]=$players_id;

$rate=Rate::whereIn('result_period_id','=','$players_idd[$game->id]')->get();
//    $rat = Order::orderBy('release_date', 'desc')->get();
    array_push($games, $game);
}

        }
        dd($rate);

    }
    public function money()
    {
        $id_user = Auth::id();
        $category = 'money';
        return view('site.user.money', array(
            'id_user' => $id_user,
            'category' => $category,
        ));
    }
    public function finance()
    {

        $id_user = Auth::id();
        $money=User::find($id_user)->money;
        $transaction=Transaction::where('user_id',$id_user)->get();

        return view('cabinet.finance', array(
            'id_user' => $id_user,
            'money' => $money,
            'transaction' => $transaction,

        ));
    }
    public function statistic_game()
    {


//
    }

    public function out()
    {
        Auth::logout();
        return redirect()->route('login');
    }


    public function game_room($id)
    {

        $period=[];
        $date = new DateTime();
        $kiev = new DateTimeZone('Europe/Kiev');

        $date->setTimezone($kiev);

        $curent_data_time= $date->format('Y-m-d H:i:s');


        $game=Game::find($id);
        $player=Player::where('user_id',Auth::user()->id)->where('game_id',$id)->first();
        $player=$player->load(['information_battle_of_titans','information_TIB','results_period.personal_res_table']);
        $player_id=$player->id;



        $data_time_start = $game->time_start;


        $period_hours = $game->period_hours;
        $sum_period = $game->sum_period;

        $after_period = 0;



//узнаем сколько раундов уже прошло $after_period
        while (strtotime($curent_data_time) > strtotime($data_time_start)) {


            $time = strtotime($data_time_start) + 3600*$period_hours; // Add 1 hour
            $data_time_start = date('Y-m-d H:i:s', $time); // Back to string



if($after_period<$sum_period && strtotime($curent_data_time) > strtotime($data_time_start)){
    $after_period++;
}else{
    break;
}






        }




        $i=1;

    while ($sum_period >= $i) {




            foreach ($player['information_TIB'] as $iten) {

                    if ($iten->perioud_number == $i) {

                        $period[$i]['ammonia']=[
                         ['name'=>'_1_purchase_ammonia_equipment_of_ukr_m','value'=> $iten->_1_purchase_ammonia_equipment_of_ukr_m],
                        ['name'=>'_2_sell_ammonia_equipment_of_ukr_m','value'=>$iten->_2_sell_ammonia_equipment_of_ukr_m],
                        ['name'=>'_3_purchase_ammonia_equipment_of_eu_m','value'=> $iten->_3_purchase_ammonia_equipment_of_eu_m],
                        ['name'=>'_4_sell_ammonia_equipment_of_eu_m','value'=>$iten->_4_sell_ammonia_equipment_of_eu_m],
                        ['name'=>'_5_purchase_ammonia_equipment_of_the_japanese_m','value'=>$iten->_5_purchase_ammonia_equipment_of_the_japanese_m],
                        ['name'=>'_6_sell_ammonia_equipment_of_the_japanese_m','value'=> $iten->_6_sell_ammonia_equipment_of_the_japanese_m],
                         ];

                            $period[$i]['equipment']=[

                          ['name'=>'_8_sell_equipment_for_an','value'=>$iten->_8_sell_equipment_for_an],
                          ['name'=>'_name9','value'=>$iten->_name9],
                          ['name'=>'_13_purchase_equipment_for_c','value'=> $iten->_13_purchase_equipment_for_c],
                          ['name'=>'_14_sell_equipment_for_c','value'=> $iten->_14_sell_equipment_for_c],
                          ['name'=>'_19_purchase_equipment_for_uan','value'=> $iten->_19_purchase_equipment_for_uan],
                          ['name'=>'_20_sell_equipment_for_uan','value'=> $iten->_20_sell_equipment_for_uan],
                             ];

                            $period[$i]['Repair_and_modernization']=[
                           [

                        ['name'=>'_25_current_repair_equipment_ukr','value'=> $iten->_25_current_repair_equipment_ukr],
                        ['name'=>'_26_simple_repair_equipment_ukr','value'=> $iten->_26_simple_repair_equipment_ukr],
                        ['name'=>'_27_full_repair_equipment_ukr','value'=>$iten->_27_full_repair_equipment_ukr],
                        ],
                        [

                        ['name'=>'_28_current_repair_equipment_eu','value'=> $iten->_28_current_repair_equipment_eu],
                        ['name'=>'_29_simple_repair_equipment_eu','value'=> $iten->_29_simple_repair_equipment_eu],
                        ['name'=>'_30_full_repair_equipment_eu','value'=> $iten->_30_full_repair_equipment_eu],
                    ],
                    [

                        ['name'=>'_31_current_repair_equipment_japan','value'=> $iten->_31_current_repair_equipment_japan],
                        ['name'=>'_32_simple_repair_equipment_japan','value'=> $iten->_32_simple_repair_equipment_japan],
                        ['name'=>'_33_full_repair_equipment_japan','value'=> $iten->_33_full_repair_equipment_japan],
                    ],


                ];
                        $period[$i]['HR']=[

                        ['name'=>'_34_employment_of_team','value'=> $iten->_34_employment_of_team],
                        ['name'=>'_35_dismissal_of_team','value'=> $iten->_35_dismissal_of_team],
                        ];

                            $period[$i]['distributor_network']=[

                        ['name'=>'_236_distribution_network_in_european','value'=> $iten->_236_distribution_network_in_],
                        ['name'=>'_237_distribution_network_in_na','value'=> $iten->_237_distribution_network_in_na],
                        ['name'=>'_238_distribution_network_in_sa','value'=> $iten->_238_distribution_network_in_sa],
                        ['name'=>'_239_distribution_network_in_asia','value'=> $iten->_239_distribution_network_in_asia],
                        ['name'=>'_240_distribution_network_in_ukraine','value'=> $iten->_240_distribution_network_in_ukraine],
                ];



//                        $period[$i]['information_TIB'][18]=['name'=>'_19_purchase_equipment_for_uan','value'=> $iten->_19_purchase_equipment_for_uan];
//                        $period[$i]['information_TIB'][19]=['name'=>'_20_sell_equipment_for_uan','value'=> $iten->_20_sell_equipment_for_uan];
//                        $period[$i]['information_TIB'][20]=['name'=>'_name21','value'=> $iten->_name21];
//                        $period[$i]['information_TIB'][21]=['name'=>'_name22','value'=> $iten->_name22];
//                        $period[$i]['information_TIB'][22]=['name'=>'_name23','value'=>$iten->_name23];
//                        $period[$i]['information_TIB'][23]=['name'=>'_name24','value'=> $iten->_name24];
//                        $period[$i]['information_TIB'][24]=['name'=>'_25_current_repair_equipment_ukr','value'=> $iten->_25_current_repair_equipment_ukr];
//                        $period[$i]['information_TIB'][25]=['name'=>'_26_simple_repair_equipment_ukr','value'=> $iten->_26_simple_repair_equipment_ukr];
//                        $period[$i]['information_TIB'][26]=['name'=>'_27_full_repair_equipment_ukr','value'=>$iten->_27_full_repair_equipment_ukr];
//                        $period[$i]['information_TIB'][27]=['name'=>'_28_current_repair_equipment_eu','value'=> $iten->_28_current_repair_equipment_eu];
//                        $period[$i]['information_TIB'][28]=['name'=>'_29_simple_repair_equipment_eu','value'=> $iten->_29_simple_repair_equipment_eu];
//                        $period[$i]['information_TIB'][29]=['name'=>'_30_full_repair_equipment_eu','value'=> $iten->_30_full_repair_equipment_eu];
//                        $period[$i]['information_TIB'][30]=['name'=>'_31_current_repair_equipment_japan','value'=> $iten->_31_current_repair_equipment_japan];
//                        $period[$i]['information_TIB'][31]=['name'=>'_32_simple_repair_equipment_japan','value'=> $iten->_32_simple_repair_equipment_japan];
//                        $period[$i]['information_TIB'][32]=['name'=>'_33_full_repair_equipment_japan','value'=> $iten->_33_full_repair_equipment_japan];
//                        $period[$i]['information_TIB'][33]=
//                        $period[$i]['information_TIB'][34]=
//                        $period[$i]['information_TIB'][35]=['name'=>'_36_purchase_of_natural_gas_30days','value'=> $iten->_36_purchase_of_natural_gas_30days];
//                        $period[$i]['information_TIB'][36]=['name'=>'_37_purchase_of_natural_gas_60days','value'=> $iten->_37_purchase_of_natural_gas_60days];
//                        $period[$i]['information_TIB'][37]=['name'=>'_name38','value'=> $iten->_name38];
//                        $period[$i]['information_TIB'][38]=['name'=>'_39_purchase_of_50kg_bags','value'=> $iten->_39_purchase_of_50kg_bags];
//                        $period[$i]['information_TIB'][39]=['name'=>'_40_purchase_of_big_bags','value'=> $iten->_40_purchase_of_big_bags];
//                        $period[$i]['information_TIB'][40]=['name'=>'_41_production_an','value'=> $iten->_41_production_an];
//                        $period[$i]['information_TIB'][41]=['name'=>'_42_production_c'] = $iten->_42_production_c;
//                        $period[$i]['information_TIB'][42]=['name'=>'_43_production_uan'] = $iten->_43_production_uan;
//                        $period[$i]['information_TIB'][43]=['name'=>'_44_production_ammonia'] = $iten->_44_production_ammonia;
//                        $period[$i]['information_TIB'][44]=['name'=>'_45_packing_an_into_50kg'] = $iten->_45_packing_an_into_50kg;
//                        ]=[name=>'_46$period[$i]['information_battle_of_titans'][_packing_an_into_big_bags'] = $iten->_46_packing_an_into_big_bags;
//                        $period[$i]['information_TIB'][46]=[name=>'_47_an_bulk'] = $iten->_47_an_bulk;
//                        $period[$i]['information_TIB'][47]=[name=>'_48_packing_c_into_50kg'] = $iten->_48_packing_c_into_50kg;
//                        $period[$i]['information_TIB'][48]=[name=>'_49_packing_c_into_big_bags'] = $iten->_49_packing_c_into_big_bags;
//                        $period[$i]['information_TIB'][49]=[name=>'_50_c_bulk'] = $iten->_50_c_bulk;
//                        $period[$i]['information_TIB'][50]=[name=>'_51_packing_uan_into_50kg'] = $iten->_51_packing_uan_into_50kg;
//                        $period[$i]['information_TIB'][51]=[name=>'_52_packing_uan_into_big_bags'] = $iten->_52_packing_uan_into_big_bags;
//                        $period[$i]['information_TIB'][52]=[name=>'_53_uan_bulk'] = $iten->_53_uan_bulk;
//                        $period[$i]['information_TIB'][53]=[name=>'_54_deposit_for_2_periods'] = $iten->_54_deposit_for_2_periods;
//                        $period[$i]['information_TIB'][54]=[name=>'_55_deposit_for_3_periods'] = $iten->_55_deposit_for_3_periods;
//                        $period[$i]['information_TIB'][55]=[name=>'_56_deposit_for_4_periods'] = $iten->_56_deposit_for_4_periods;
//                        $period[$i]['information_TIB'][56]=[name=>'_57_credit_for_3_periods'] = $iten->_57_credit_for_3_periods;
//                        $period[$i]['information_TIB'][57]=[name=>'_58_credit_for_5_periods'] = $iten->_58_credit_for_5_periods;
//                        $period[$i]['information_TIB'][58]=[name=>'_59_credit_for_7_periods'] = $iten->_59_credit_for_7_periods;
//                        $period[$i]['information_TIB'][59]=[name=>'_60_data_on_production'] = $iten->_60_data_on_production;
//                        $period[$i]['information_TIB'][60]=[name=>'_61_data_on_packin_an'] = $iten->_61_data_on_packin_an;
//                        $period[$i]['information_TIB'][61]=[name=>'_62_data_on_packin_c'] = $iten->_62_data_on_packin_c;
//                        $period[$i]['information_TIB'][62]=[name=>'_63_data_on_packin_uan'] = $iten->_63_data_on_packin_uan;
//                        $period[$i]['information_TIB'][63]=[name=>'_64_data_on_quality_of_an'] = $iten->_64_data_on_quality_of_an;
//                        $period[$i]['information_TIB'][64]=[name=>'_65_data_on_quality_of_c'] = $iten->_65_data_on_quality_of_c;
//                        $period[$i]['information_TIB'][65]=[name=>'_66_data_on_quality_of_uan'] = $iten->_66_data_on_quality_of_uan;
//                        $period[$i]['information_TIB'][66]=[name=>'_67_movement_of_an_prices'] = $iten->_67_movement_of_an_prices;
//                        $period[$i]['information_TIB'][67]=[name=>'_68_movement_of_c_prices'] = $iten->_68_movement_of_c_prices;
//                        $period[$i]['information_TIB'][68]=[name=>'_69_movement_of_uan_prices'] = $iten->_69_movement_of_uan_prices;
//                        $period[$i]['information_TIB'][69]=[name=>'_70_movement_of_ammonia_prices'] = $iten->_70_movement_of_ammonia_prices;
//                        $period[$i]['information_TIB'][70]=[name=>'_71_seasonal_index_of_an'] = $iten->_71_seasonal_index_of_an;
//                        $period[$i]['information_TIB'][71]=[name=>'_72_seasonal_index_of_c'] = $iten->_72_seasonal_index_of_c;
//                        $period[$i]['information_TIB'][72]=[name=>'_73_seasonal_index_of_uan'] = $iten->_73_seasonal_index_of_uan;
//                        $period[$i]['information_TIB'][73]=[name=>'_74_seasonal_index_of_amm'] = $iten->_74_seasonal_index_of_amm;
//                        $period[$i]['information_TIB'][74]=[name=>'_75_sales_volume_on_the_an_market'] = $iten->_75_sales_volume_on_the_an_market;
//                        $period[$i]['information_TIB'][75]=[name=>'_76_sales_volume_on_the_c_market'] = $iten->_76_sales_volume_on_the_c_market;
//                        $period[$i]['information_TIB'][76]=[name=>'_77_sales_volume_on_the_uan_market'] = $iten->_77_sales_volume_on_the_uan_market;
//                        $period[$i]['information_TIB'][77]=[name=>'_78_sales_volume_on_the_amm_market'] = $iten->_78_sales_volume_on_the_amm_market;
//                        $period[$i]['information_TIB'][78]=[name=>'_79_data_on_surpluses_of_unsold_an'] = $iten->_79_data_on_surpluses_of_unsold_an;
//                        $period[$i]['information_TIB'][79]=[name=>'_80_data_on_surpluses_of_unsold_c'] = $iten->_80_data_on_surpluses_of_unsold_c;
//                        $period[$i]['information_TIB'][80]=[name=>'_81_data_on_surpluses_of_unsold_uan'] = $iten->_81_data_on_surpluses_of_unsold_uan;
//                        $period[$i]['information_TIB'][81]=[name=>'_82_data_on_surpluses_of_unsold_amm'] = $iten->_82_data_on_surpluses_of_unsold_amm;
//                        $period[$i]['information_TIB'][82]=[name=>'_83_competitors_expenses_for_advertising'] = $iten->_83_competitors_expenses_for_advertising;
//                        $period[$i]['information_TIB'][83]=[name=>'_name84'] = $iten->_name84;
//                        $period[$i]['information_TIB'][84]=[name=>'_name85'] = $iten->_name85;
//                        $period[$i]['information_TIB'][85]=[name=>'_name86'] = $iten->_name86;
//                        $period[$i]['information_TIB'][86]=[name=>'_name87'] = $iten->_name87;
//                        $period[$i]['information_TIB'][87]=[name=>'_name88'] = $iten->_name88;
//                        $period[$i]['information_TIB'][88]=[name=>'_name89'] = $iten->_name89;
//                        $period[$i]['information_TIB'][89]=[name=>'_name90'] = $iten->_name90;
//                        $period[$i]['information_TIB'][90]=[name=>'_91_consumer_lending_in_eu'] = $iten->_91_consumer_lending_in_eu;
//                        $period[$i]['information_TIB'][91]=[name=>'_92_consumer_lending_in_na'] = $iten->_92_consumer_lending_in_na;
//                        $period[$i]['information_TIB'][92]=[name=>'_93_consumer_lending_in_sa'] = $iten->_93_consumer_lending_in_sa;
//                        $period[$i]['information_TIB'][93]=[name=>'_94_consumer_lending_in_asia'] = $iten->_94_consumer_lending_in_asia;
//                        $period[$i]['information_TIB'][94]=[name=>'_95_consumer_lending_in_ukr'] = $iten->_95_consumer_lending_in_ukr;
//                        $period[$i]['information_TIB'][95]=[name=>'_name96'] = $iten->_name96;
//                        $period[$i]['information_TIB'][96]=[name=>'_name97'] = $iten->_name97;
//                        $period[$i]['information_TIB'][97]=[name=>'_name98'] = $iten->_name98;
//                        $period[$i]['information_TIB'][98]=[name=>'_name99'] = $iten->_name99;
//                        $period[$i]['information_TIB'][99]=[name=>'_name100'] = $iten->_name100;
//                        $period[$i]['information_TIB'][100]=[name=>'_101_transport_vol_c_to_eu_50kg_bags'] = $iten->_101_transport_vol_c_to_eu_50kg_bags;
//                        $period[$i]['information_TIB'][101]=[name=>'_102_transport_vol_c_to_eu_1000kg_bags'] = $iten->_102_transport_vol_c_to_eu_1000kg_bags;
//                        $period[$i]['information_TIB'][102]=[name=>'_103_transport_vol_of_bulk_c_to_eu'] = $iten->_103_transport_vol_of_bulk_c_to_eu;
//                        $period[$i]['information_TIB'][103]=[name=>'_104_prices_c_50kg_bags_on_eu'] = $iten->_104_prices_c_50kg_bags_on_eu;
//                        $period[$i]['information_TIB'][104]=[name=>'_105_prices_c_1000kg_bags_on_eu'] = $iten->_105_prices_c_1000kg_bags_on_eu;
//                        $period[$i]['information_TIB'][105]=[name=>'_106_prices_for_bulk_c_on_eu'] = $iten->_106_prices_for_bulk_c_on_eu;
//                        $period[$i]['information_TIB'][106]=[name=>'_107_transport_vol_c_to_na_50kg_bags'] = $iten->_107_transport_vol_c_to_na_50kg_bags;
//                        $period[$i]['information_TIB'][107]=[name=>'_108_transport_vol_c_to_na_1000kg_bags'] = $iten->_108_transport_vol_c_to_na_1000kg_bags;
//                        $period[$i]['information_TIB'][108]=[name=>'_109_transport_vol_of_bulk_c_to_na'] = $iten->_109_transport_vol_of_bulk_c_to_na;
//                        $period[$i]['information_TIB'][109]=[name=>'_110_prices_c_50kg_bags_on_na'] = $iten->_110_prices_c_50kg_bags_on_na;
//                        $period[$i]['information_TIB'][110]=[name=>'_111_prices_c_1000kg_bags_on_na'] = $iten->_111_prices_c_1000kg_bags_on_na;
//                        $period[$i]['information_TIB'][111]=[name=>'_112_prices_for_bulk_c_on_na'] = $iten->_112_prices_for_bulk_c_on_na;;
//                        $period[$i]['information_TIB'][112]=[name=>'_113_transport_vol_c_to_sa_50kg_bags'] = $iten->_113_transport_vol_c_to_sa_50kg_bags;
//                        $period[$i]['information_TIB'][113]=[name=>'_114_transport_vol_c_to_sa_1000kg_bags'] = $iten->_114_transport_vol_c_to_sa_1000kg_bags;
//                        $period[$i]['information_TIB'][114]=[name=>'_115_transport_vol_of_bulk_c_to_sa'] = $iten->_115_transport_vol_of_bulk_c_to_sa;
//                        $period[$i]['information_TIB'][115]=[name=>'_116_prices_c_50kg_bags_on_sa'] = $iten->_116_prices_c_50kg_bags_on_sa;
//                        $period[$i]['information_TIB'][116]=[name=>'_117_prices_c_1000kg_bags_on_sa'] = $iten->_117_prices_c_1000kg_bags_on_sa;
//                        $period[$i]['information_TIB'][117]=[name=>'_118_prices_for_bulk_c_on_sa'] = $iten->_118_prices_for_bulk_c_on_sa;
//                        $period[$i]['information_TIB'][118]=[name=>'_119_transport_vol_c_to_asia_50kg_bags'] = $iten->_119_transport_vol_c_to_asia_50kg_bags;
//                        $period[$i]['information_TIB'][119]=[name=>'_120_transport_vol_c_to_asia_1000kg_bags'] = $iten->_120_transport_vol_c_to_asia_1000kg_bags;
//                        $period[$i]['information_TIB'][120]=[name=>'_121_transport_vol_of_bulk_c_to_asia'] = $iten->_121_transport_vol_of_bulk_c_to_asia;
//                        $period[$i]['information_TIB'][121]=[name=>'_122_prices_c_50kg_bags_on_asia'] = $iten->_122_prices_c_50kg_bags_on_asia;
//                        $period[$i]['information_TIB'][122]=[name=>'_123_prices_c_1000kg_bags_on_asia'] = $iten->_123_prices_c_1000kg_bags_on_asia;
//                        $period[$i]['information_TIB'][123]=[name=>'_124_prices_for_bulk_c_on_asia'] = $iten->_124_prices_for_bulk_c_on_asia;
//                        $period[$i]['information_TIB'][124]=[name=>'_125_transport_vol_c_to_ukr_50kg_bags'] = $iten->_125_transport_vol_c_to_ukr_50kg_bags;
//                        $period[$i]['information_TIB'][125]=[name=>'_126_transport_vol_c_to_ukr_1000kg_bags'] = $iten->_126_transport_vol_c_to_ukr_1000kg_bags;
//                        $period[$i]['information_TIB'][126]=[name=>'_127_transport_vol_of_bulk_c_to_ukr'] = $iten->_127_transport_vol_of_bulk_c_to_ukr;
//                        $period[$i]['information_TIB'][127]=[name=>'_128_prices_c_50kg_bags_on_ukr'] = $iten->_128_prices_c_50kg_bags_on_ukr;
//                        $period[$i]['information_TIB'][128]=[name=>'_129_prices_c_1000kg_bags_on_ukr'] = $iten->_129_prices_c_1000kg_bags_on_ukr;
//                        $period[$i]['information_TIB'][129]=[name=>'_130_prices_for_bulk_c_on_ukr'] = $iten->_130_prices_for_bulk_c_on_ukr;
//                        $period[$i]['information_TIB'][130]=[name=>'_131_transport_vol_an_to_eu_50kg_bags'] = $iten->_131_transport_vol_an_to_eu_50kg_bags;
//                        $period[$i]['information_TIB'][131]=[name=>'_132_transport_vol_an_to_eu_1000kg_bags'] = $iten->_132_transport_vol_an_to_eu_1000kg_bags;
//                        $period[$i]['information_TIB'][132]=[name=>'_133_transport_vol_of_bulk_an_to_eu'] = $iten->_133_transport_vol_of_bulk_an_to_eu;
//                        $period[$i]['information_TIB'][133]=[name=>'_134_prices_an_50kg_bags_on_eu'] = $iten->_134_prices_an_50kg_bags_on_eu;
//                        $period[$i]['information_TIB'][134]=[name=>'_135_prices_an_1000kg_bags_on_eu'] = $iten->_135_prices_an_1000kg_bags_on_eu;
//                        $period[$i]['information_TIB'][135]=[name=>'_136_prices_for_bulk_an_on_eu'] = $iten->_136_prices_for_bulk_an_on_eu;
//                        $period[$i]['information_TIB'][136]=[name=>'_137_transport_vol_an_to_na_50kg_bags'] = $iten->_137_transport_vol_an_to_na_50kg_bags;
//                        $period[$i]['information_TIB'][137]=[name=>'_138_transport_vol_an_to_na_1000kg_bags'] = $iten->_138_transport_vol_an_to_na_1000kg_bags;
//                        $period[$i]['information_TIB'][138]=[name=>'_139_transport_vol_of_bulk_an_to_na'] = $iten->_139_transport_vol_of_bulk_an_to_na;
//                        $period[$i]['information_TIB'][139]=[name=>'_140_prices_an_50kg_bags_on_na'] = $iten->_140_prices_an_50kg_bags_on_na;
//                        $period[$i]['information_TIB'][140]=[name=>'_141_prices_an_1000kg_bags_on_na'] = $iten->_141_prices_an_1000kg_bags_on_na;
//                        $period[$i]['information_TIB'][141]=[name=>'_142_prices_for_bulk_an_on_na'] = $iten->_142_prices_for_bulk_an_on_na;
//                        $period[$i]['information_TIB'][142]=[name=>'_143_transport_vol_an_to_sa_50kg_bags'] = $iten->_143_transport_vol_an_to_sa_50kg_bags;
//                        $period[$i]['information_TIB'][143]=[name=>'_144_transport_vol_an_to_sa_1000kg_bags'] = $iten->_144_transport_vol_an_to_sa_1000kg_bags;
//                        $period[$i]['information_TIB'][144]=[name=>'_145_transport_vol_of_bulk_an_to_sa'] = $iten->_145_transport_vol_of_bulk_an_to_sa;
//                        $period[$i]['information_TIB'][145]=[name=>'_146_prices_an_50kg_bags_on_sa'] = $iten->_146_prices_an_50kg_bags_on_sa;
//                        $period[$i]['information_TIB'][146]=[name=>'_147_prices_an_1000kg_bags_on_sa'] = $iten->_147_prices_an_1000kg_bags_on_sa;
//                        $period[$i]['information_TIB'][147]=[name=>'_148_prices_for_bulk_an_on_sa'] = $iten->_148_prices_for_bulk_an_on_sa;
//                        $period[$i]['information_TIB'][148]=[name=>'_149_transport_vol_an_to_asia_50kg_bags'] = $iten->_149_transport_vol_an_to_asia_50kg_bags;;
//                        $period[$i]['information_TIB'][149]=[name=>'_150_transport_vol_an_to_asia_1000kg_bags'] = $iten->_150_transport_vol_an_to_asia_1000kg_bags;
//                        $period[$i]['information_TIB'][150]=[name=>'_151_transport_vol_of_bulk_an_to_asia'] = $iten->_151_transport_vol_of_bulk_an_to_asia;
//                        $period[$i]['information_TIB'][151]=[name=>'_152_prices_an_50kg_bags_on_asia'] = $iten->_152_prices_an_50kg_bags_on_asia;
//                        $period[$i]['information_TIB'][152]=[name=>'_153_prices_an_1000kg_bags_on_asia'] = $iten->_153_prices_an_1000kg_bags_on_asia;
//                        $period[$i]['information_TIB'][153]=[name=>'_154_prices_for_bulk_an_on_asia'] = $iten->_154_prices_for_bulk_an_on_asia;
//                        $period[$i]['information_TIB'][154]=[name=>'_155_transport_vol_an_to_ukr_50kg_bags'] = $iten->_155_transport_vol_an_to_ukr_50kg_bags;
//                        $period[$i]['information_TIB'][155]=[name=>'_156_transport_vol_an_to_ukr_1000kg_bags'] = $iten->_156_transport_vol_an_to_ukr_1000kg_bags;
//                        $period[$i]['information_TIB'][156]=[name=>'_157_transport_vol_of_bulk_an_to_ukr'] = $iten->_157_transport_vol_of_bulk_an_to_ukr;
//                        $period[$i]['information_TIB'][157]=[name=>'_158_prices_an_50kg_bags_on_ukr'] = $iten->_158_prices_an_50kg_bags_on_ukr;
//                        $period[$i]['information_TIB'][158]=[name=>'_159_prices_an_1000kg_bags_on_ukr'] = $iten->_159_prices_an_1000kg_bags_on_ukr;
//                        $period[$i]['information_TIB'][159]=[name=>'_160_prices_for_bulk_an_on_ukr'] = $iten->_160_prices_for_bulk_an_on_ukr;
//                        $period[$i]['information_TIB'][160]=[name=>'_161_transport_vol_uan_to_eu_50kg_bags'] = $iten->_161_transport_vol_uan_to_eu_50kg_bags;
//                        $period[$i]['information_TIB'][161]=[name=>'_162_transport_vol_uan_to_eu_1000kg_bags'] = $iten->_162_transport_vol_uan_to_eu_1000kg_bags;
//                        $period[$i]['information_TIB'][162]=[name=>'_163_transport_vol_of_bulk_uan_to_eu'] = $iten->_163_transport_vol_of_bulk_uan_to_eu;
//                        $period[$i]['information_TIB'][163]=[name=>'_164_prices_uan_50kg_bags_on_eu'] = $iten->_164_prices_uan_50kg_bags_on_eu;
//                        $period[$i]['information_TIB'][164]=[name=>'_165_prices_uan_1000kg_bags_on_eu'] = $iten->_165_prices_uan_1000kg_bags_on_eu;
//                        $period[$i]['information_TIB'][165]=[name=>'_166_prices_for_bulk_uan_on_eu'] = $iten->_166_prices_for_bulk_uan_on_eu;
//                        $period[$i]['information_TIB'][166]=[name=>'_167_transport_vol_uan_to_na_50kg_bags'] = $iten->_167_transport_vol_uan_to_na_50kg_bags;
//                        $period[$i]['information_TIB'][167]=[name=>'_168_transport_vol_uan_to_na_1000kg_bags'] = $iten->_168_transport_vol_uan_to_na_1000kg_bags;
//                        $period[$i]['information_TIB'][168]=[name=>'_169_transport_vol_of_bulk_uan_to_na'] = $iten->_169_transport_vol_of_bulk_uan_to_na;
//                        $period[$i]['information_TIB'][169]=[name=>'_170_prices_uan_50kg_bags_on_na'] = $iten->_170_prices_uan_50kg_bags_on_na;
//                        $period[$i]['information_TIB'][170]=[name=>'_171_prices_uan_1000kg_bags_on_na'] = $iten->_171_prices_uan_1000kg_bags_on_na;
//                        $period[$i]['information_TIB'][171]=[name=>'_172_prices_for_bulk_uan_on_na'] = $iten->_172_prices_for_bulk_uan_on_na;
//                        $period[$i]['information_TIB'][172]=[name=>'_173_transport_vol_uan_to_sa_50kg_bags'] = $iten->_173_transport_vol_uan_to_sa_50kg_bags;
//                        $period[$i]['information_TIB'][173]=[name=>'_174_transport_vol_uan_to_sa_1000kg_bags'] = $iten->_174_transport_vol_uan_to_sa_1000kg_bags;
//                        $period[$i]['information_TIB'][174]=[name=>'_175_transport_vol_of_bulk_uan_to_sa'] = $iten->_175_transport_vol_of_bulk_uan_to_sa;
//                        $period[$i]['information_TIB'][175]=[name=>'_176_prices_uan_50kg_bags_on_sa'] = $iten->_176_prices_uan_50kg_bags_on_sa;
//                        $period[$i]['information_TIB'][176]=[name=>'_177_prices_uan_1000kg_bags_on_sa'] = $iten->_177_prices_uan_1000kg_bags_on_sa;
//                        $period[$i]['information_TIB'][177]=[name=>'_178_prices_for_bulk_uan_on_sa'] = $iten->_178_prices_for_bulk_uan_on_sa;
//                        $period[$i]['information_TIB'][178]=[name=>'_179_transport_vol_uan_to_asia_50kg_bags'] = $iten->_179_transport_vol_uan_to_asia_50kg_bags;
//                        $period[$i]['information_TIB'][179]=[name=>'_180_transport_vol_uan_to_asia_1000kg_bags'] = $iten->_180_transport_vol_uan_to_asia_1000kg_bags;
//                        $period[$i]['information_TIB'][]=[name=>'_181_transport_vol_of_bulk_uan_to_asia'] = $iten->_181_transport_vol_of_bulk_uan_to_asia;
//                        $period[$i]['information_TIB'][]=[name=>'_182_prices_uan_50kg_bags_on_asia'] = $iten->_182_prices_uan_50kg_bags_on_asia;
//                        $period[$i]['information_TIB'][]=[name=>'_183_prices_uan_1000kg_bags_on_asia'] = $iten->_183_prices_uan_1000kg_bags_on_asia;
//                        $period[$i]['information_TIB'][]=[name=>'_184_prices_for_bulk_uan_on_asia'] = $iten->_184_prices_for_bulk_uan_on_asia;
//                        $period[$i]['information_TIB'][]=[name=>'_185_transport_vol_uan_to_ukr_50kg_bags'] = $iten->_185_transport_vol_uan_to_ukr_50kg_bags;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_186_transport_vol_uan_to_ukr_1000kg_bags'] = $iten->_186_transport_vol_uan_to_ukr_1000kg_bags;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_187_transport_vol_of_bulk_uan_to_ukr'] = $iten->_187_transport_vol_of_bulk_uan_to_ukr;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_188_prices_uan_50kg_bags_on_ukr'] = $iten->_188_prices_uan_50kg_bags_on_ukr;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_189_prices_uan_1000kg_bags_on_ukr'] = $iten->_189_prices_uan_1000kg_bags_on_ukr;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_190_prices_for_bulk_uan_on_ukr'] = $iten->_190_prices_for_bulk_uan_on_ukr;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_191_internet_advertising_eu'] = $iten->_191_internet_advertising_eu;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_192_tv_advertising_ eu'] = $iten->_192_tv_advertising_;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_193_madia_eu'] = $iten->_193_madia_eu;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_194_radio_eu'] = $iten->_194_radio_eu;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_195_spec_magazin_eu'] = $iten->_195_spec_magazin_eu;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_196_exhibitions_eu'] = $iten->_196_exhibitions_eu;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_197_internet_advertising_na_eu'] = $iten->_197_internet_advertising_na_eu;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_198_tv_advertising_na'] = $iten->_198_tv_advertising_na;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_199_madia_na'] = $iten->_199_madia_na;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_200_radio_na'] = $iten->_200_radio_na;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_201_spec_magazin_na'] = $iten->_201_spec_magazin_na;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_202_exhibitions_na eu'] = $iten->_202_exhibitions_na;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_203_internet_advertising_sa'] = $iten->_203_internet_advertising_sa;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_204_tv_advertising_sa'] = $iten->_204_tv_advertising_sa;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_205_madia_sa'] = $iten->_205_madia_sa;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_206_radio_sa'] = $iten->_206_radio_sa;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_207_spec_magazin_sa eu'] = $iten->_207_spec_magazin_sa;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_208_exhibitions_sa'] = $iten->_208_exhibitions_sa;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_209_internet_advertising_asia'] = $iten->_209_internet_advertising_asia;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_210_tv_advertising_asia'] = $iten->_210_tv_advertising_asia;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_211_madia_asia'] = $iten->_211_madia_asia;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_212_radio_asia eu'] = $iten->_212_radio_asia;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_213_spec_magazin_asia'] = $iten->_213_spec_magazin_asia;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_214_exhibitions_asia'] = $iten->_214_exhibitions_asia;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_215_internet_advertising_ukr'] = $iten->_215_internet_advertising_ukr;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_216_tv_advertising_ukr'] = $iten->_216_tv_advertising_ukr;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_217_madia_ukr_eu'] = $iten->_217_madia_ukr_eu;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_218_radio_ukr'] = $iten->_218_radio_ukr;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_219_spec_magazin_ukr'] = $iten->_219_spec_magazin_ukr;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_220_exhibitions_ukr'] = $iten->_220_exhibitions_ukr;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_221_chartering_of_vessels_to_eu'] = $iten->_221_chartering_of_vessels_to_eu;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_222_chartering_of_vessels_to_na_eu'] = $iten->_222_chartering_of_vessels_to_na_eu;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_223_chartering_of_vessels_to_sa'] = $iten->_223_chartering_of_vessels_to_sa;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_224_chartering_of_vessels_to_asia'] = $iten->_224_chartering_of_vessels_to_asia;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_name225'] = $iten->_name225;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_226_transport_vol_of_marketable_ammonia'] = $iten->_226_transport_vol_of_marketable_ammonia;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_227_price_for_ammonia_eu'] = $iten->_227_price_for_ammonia_eu;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_228_dividends'] = $iten->_228_dividends;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_229_share_issue'] = $iten->_229_share_issue;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_230_purchase_of_shares'] = $iten->_230_purchase_of_shares;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_name231'] = $iten->_name231;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_name232'] = $iten->_name232;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_name233'] = $iten->_name233;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_name234'] = $iten->_name234;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_name235'] = $iten->_name235;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_236_distribution_network_in_european'] = $iten->_236_distribution_network_in_;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_237_distribution_network_in_na'] = $iten->_237_distribution_network_in_na;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_238_distribution_network_in_sa'] = $iten->_238_distribution_network_in_sa;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_239_distribution_network_in_asia'] = $iten->_239_distribution_network_in_asia;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_240_distribution_network_in_ukraine'] = $iten->_240_distribution_network_in_ukraine;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_241_quality_of_an'] = $iten->_241_quality_of_an;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_242_quality_of_c'] = $iten->_242_quality_of_c;
//                        $period[$i]['information_battle_of_titans'][]=[name=>'_243_quality_of_uan'] = $iten->_243_quality_of_uan;


                    }
//
            }
            $i++;


    }
    $test=[];


        foreach ($player['results_period'] as $iten) {



    foreach ($iten['personal_res_table'] as $item) {

// ------------------- таблиця 2_1--------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['2_1']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['2_1'][$q] = $ar;

            $q++;
        }
        $arrr = ['', '50-кг мішки', '1000 кг. мішки типу ’Біг-Бег’'];

        array_unshift($test[$iten->period]['2_1'], $arrr);
        array_unshift($test[$iten->period]['2_1'][1], "Залишок матеріалів на початок періода, шт.");
        array_unshift($test[$iten->period]['2_1'][2], "Відпущено матеріалів у виробництво, шт.");
        array_unshift($test[$iten->period]['2_1'][3], "Обсяг замовлених матеріалів, шт.");
        array_unshift($test[$iten->period]['2_1'][4], "Залишок матеріалів на кінець періода, шт.");
        array_unshift($test[$iten->period]['2_1'][5], "Вартість залишків матеріалів на початок періода, грн.");
        array_unshift($test[$iten->period]['2_1'][6], "Собівартість матеріалів, відпущених у виробництво, грн.");
        array_unshift($test[$iten->period]['2_1'][7], "Вартість замовлених матеріалів, грн.");
        array_unshift($test[$iten->period]['2_1'][8], "Вартість залишку матеріалів на кінець періода, грн.");

// ------------------- таблиця 2_2--------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['2_2']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['2_2'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'В нат. од. виміру, тис.куб.м', 'Вартість, грн'];

        array_unshift($test[$iten->period]['2_2'], $arrr);
        array_unshift($test[$iten->period]['2_2'][1], "Не використаний, але оплачений запас газу на початок періода");
        array_unshift($test[$iten->period]['2_2'][2], "Наявний до використання");
        array_unshift($test[$iten->period]['2_2'][3], "Використано у процесі виробництва");
        array_unshift($test[$iten->period]['2_2'][4], "Термінова (додаткова) поставка");
        array_unshift($test[$iten->period]['2_2'][5], "Не використаний, але оплачений запас газу на кінець періода");
        array_unshift($test[$iten->period]['2_2'][6], "Замовлено на наступний період");

// ------------------- таблиця 2_3--------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['2_3']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['2_3'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Період - 7', 'Період - 8', 'Період - 9'];

        array_unshift($test[$iten->period]['2_3'], $arrr);
        array_unshift($test[$iten->period]['2_3'][1], "Період - 7");
        array_unshift($test[$iten->period]['2_3'][2], "Період - 8");
        array_unshift($test[$iten->period]['2_3'][3], "Період - 9");
        array_unshift($test[$iten->period]['2_3'][4], "Погашення кредиторської заборгованості, грн.");
        array_unshift($test[$iten->period]['2_3'][5], "Кредиторська заборгованість, грн.");


// ------------------- таблиця 2_4--------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['2_4']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['2_4'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Період - 7', 'Період - 8', 'Період - 9'];

        array_unshift($test[$iten->period]['2_4'], $arrr);
        array_unshift($test[$iten->period]['2_4'][1], "Період - 7");
        array_unshift($test[$iten->period]['2_4'][2], "Період - 8");
        array_unshift($test[$iten->period]['2_4'][3], "Період - 9");
        array_unshift($test[$iten->period]['2_4'][4], "Авансовий платіж за період, грн.");
        array_unshift($test[$iten->period]['2_4'][5], "Наступний авансовий платіж, грн.");

// ------------------- таблиця 2_5--------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['2_5']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['2_5'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Період - 7', 'Період - 8', 'Період - 9'];

        array_unshift($test[$iten->period]['2_5'], $arrr);
        array_unshift($test[$iten->period]['2_5'][1], "Період - 7");
        array_unshift($test[$iten->period]['2_5'][2], "Період - 8");
        array_unshift($test[$iten->period]['2_5'][3], "Період - 9");
        array_unshift($test[$iten->period]['2_5'][4], "Авансовий платіж за період, грн.");
        array_unshift($test[$iten->period]['2_5'][5], "Наступний авансовий платіж, грн.");


// ------------------- таблиця 2_6--------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['2_6']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['2_6'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Вхідна потужність', 'Введено (надійшло, але не введено у експлуатацію)', 'Вибуло (ухвалено рішення про вибуття)', 'Потужність на кін.'];

        array_unshift($test[$iten->period]['2_6'], $arrr);
        array_unshift($test[$iten->period]['2_6'][1], "NH3(вітчизняного виробництва)");
        array_unshift($test[$iten->period]['2_6'][2], "NH3(європейського виробництва)");
        array_unshift($test[$iten->period]['2_6'][3], "NH3(японського виробництва)");
        array_unshift($test[$iten->period]['2_6'][4], "AC");
        array_unshift($test[$iten->period]['2_6'][5], "КА");
        array_unshift($test[$iten->period]['2_6'][6], "КАC");
// кінець таблиць 2---------------------------------------------------------------------------------------------------------

// початок таблиць 3---------------------------------------------------------------------------------------------------------
// 3_1---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['3_1']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['3_1'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'AC, т', 'КА, т', 'КАC, т', 'NH3, т'];

        array_unshift($test[$iten->period]['3_1'], $arrr);
        array_unshift($test[$iten->period]['3_1'][1], "Період - 8");


// 3_2---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['3_2']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['3_2'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'AC', 'КА', 'КАC'];

        array_unshift($test[$iten->period]['3_2'], $arrr);
        array_unshift($test[$iten->period]['3_2'][1], "50-кг мішки, т");
        array_unshift($test[$iten->period]['3_2'][2], "1000 кг. мішки типу ’Біг-Бег’, т");
        array_unshift($test[$iten->period]['3_2'][3], "Насип, т");

// 3_3---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['3_3']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['3_3'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'NH3', 'АС', 'КА', 'КАС'];

        array_unshift($test[$iten->period]['3_3'], $arrr);
        array_unshift($test[$iten->period]['3_3'][1], "Зворотна вода");
        array_unshift($test[$iten->period]['3_3'][2], "Теплоенергія");
        array_unshift($test[$iten->period]['3_3'][3], "Аміак");
        array_unshift($test[$iten->period]['3_3'][4], "Кисень");
        array_unshift($test[$iten->period]['3_3'][5], "Вуглекислота");
        array_unshift($test[$iten->period]['3_3'][6], "Азотна кислота");
        array_unshift($test[$iten->period]['3_3'][7], "Аміачна селітра");
        array_unshift($test[$iten->period]['3_3'][8], "Карбамід");
        array_unshift($test[$iten->period]['3_3'][9], "КАС");
        array_unshift($test[$iten->period]['3_3'][10], "Природний газ");
        array_unshift($test[$iten->period]['3_3'][11], "Сода каустична");
        array_unshift($test[$iten->period]['3_3'][12], "Каталізатор синтезу аміаку	");
        array_unshift($test[$iten->period]['3_3'][13], "Аміак");
        array_unshift($test[$iten->period]['3_3'][14], "Електроенергія");
        array_unshift($test[$iten->period]['3_3'][15], "Допоміжні матеріали");
        array_unshift($test[$iten->period]['3_3'][16], "Витрати на зар.плату");
        array_unshift($test[$iten->period]['3_3'][17], "Відрахування до ПФ");
        array_unshift($test[$iten->period]['3_3'][18], "Амортизація");
        array_unshift($test[$iten->period]['3_3'][19], "Змінні загальновиробничі витрати");
        array_unshift($test[$iten->period]['3_3'][20], "Інші загальновиробничі витрати");
        array_unshift($test[$iten->period]['3_3'][21], "Відходи");
//        array_unshift($test[$iten->period]['3_3'][22], "Собівартість виробництва продукції (без пакування),грн./т");


// 3_4---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['3_4']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['3_4'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'AC, % ', 'КА, %', 'КАC, %', 'NH3, %'];

        array_unshift($test[$iten->period]['3_4'], $arrr);
        array_unshift($test[$iten->period]['3_4'][1], "Період-8");



// 3_5---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['3_5']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['3_5'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'NH3', 'АС', 'КА', 'КАС'];

        array_unshift($test[$iten->period]['3_5'], $arrr);
        array_unshift($test[$iten->period]['3_5'][1], "Кількість бригад");


// 3_6---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['3_6']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['3_6'][$q] = $ar;

            $q++;
        }
        $arrr = ['Показник', 'Вітчизняного виробництва', 'Європейського виробництва', 'Японського виробництва'];

        array_unshift($test[$iten->period]['3_6'], $arrr);
        array_unshift($test[$iten->period]['3_6'][1], "Планова потужність, %");
        array_unshift($test[$iten->period]['3_6'][2], "Норми витрат природного газу(тис. м3) на 1 т аміаку");
        array_unshift($test[$iten->period]['3_6'][3], "Норми витрат електроенергії(ткВт/год.) на 1 т аміаку");



// початок таблиць 4---------------------------------------------------------------------------------------------------------
// 4_1---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['4_1']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['4_1'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'АС (50-кг мішки)', 'АС (1000 кг. мішки типу ’Біг-Бег’)', 'АС (насип)'];

        array_unshift($test[$iten->period]['4_1'], $arrr);
        array_unshift($test[$iten->period]['4_1'][1], "Залишок готової продукції на початок періоду, т");
        array_unshift($test[$iten->period]['4_1'][2], "Реалізовано, т");
        array_unshift($test[$iten->period]['4_1'][3], "Вироблено, т");
        array_unshift($test[$iten->period]['4_1'][4], "Залишок готової продукції на кінець періоду, т");
        array_unshift($test[$iten->period]['4_1'][5], "Вартість залишків готової продукції на початок періоду, грн.");
        array_unshift($test[$iten->period]['4_1'][6], "Собівартість реалізованої продукції, грн.");
        array_unshift($test[$iten->period]['4_1'][7], "Собівартість виробленої продукції, грн.");
        array_unshift($test[$iten->period]['4_1'][8], "Вартість залишку готової продукції на кінець періоду, грн.");



// 4_2---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['4_2']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['4_2'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'KA (50-кг мішки)', 'KA (1000 кг. мішки типу ’Біг-Бег’)', 'KA (насип)'];

        array_unshift($test[$iten->period]['4_2'], $arrr);
        array_unshift($test[$iten->period]['4_2'][1], "Залишок готової продукції на початок періоду, т");
        array_unshift($test[$iten->period]['4_2'][2], "Реалізовано, т");
        array_unshift($test[$iten->period]['4_2'][3], "Вироблено, т");
        array_unshift($test[$iten->period]['4_2'][4], "Залишок готової продукції на кінець періоду, т");
        array_unshift($test[$iten->period]['4_2'][5], "Вартість залишків готової продукції на початок періоду, грн.");
        array_unshift($test[$iten->period]['4_2'][6], "Собівартість реалізованої продукції, грн.");
        array_unshift($test[$iten->period]['4_2'][7], "Собівартість виробленої продукції, грн.");
        array_unshift($test[$iten->period]['4_2'][8], "Вартість залишку готової продукції на кінець періоду, грн.");

// 4_3---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['4_3']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['4_3'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'KАС (50-кг мішки)', 'KАС (1000 кг. мішки типу ’Біг-Бег’)', 'KАС (насип)'];

        array_unshift($test[$iten->period]['4_3'], $arrr);
        array_unshift($test[$iten->period]['4_3'][1], "Залишок готової продукції на початок періоду, т");
        array_unshift($test[$iten->period]['4_3'][2], "Реалізовано, т");
        array_unshift($test[$iten->period]['4_3'][3], "Вироблено, т");
        array_unshift($test[$iten->period]['4_3'][4], "Залишок готової продукції на кінець періоду, т");
        array_unshift($test[$iten->period]['4_3'][5], "Вартість залишків готової продукції на початок періоду, грн.");
        array_unshift($test[$iten->period]['4_3'][6], "Собівартість реалізованої продукції, грн.");
        array_unshift($test[$iten->period]['4_3'][7], "Собівартість виробленої продукції, грн.");
        array_unshift($test[$iten->period]['4_3'][8], "Вартість залишку готової продукції на кінець періоду, грн.");


// 4_4---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['4_4']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['4_4'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'NH3 (аміак)'];

        array_unshift($test[$iten->period]['4_4'], $arrr);
        array_unshift($test[$iten->period]['4_4'][1], "Залишок готової продукції на початок періоду, т");
        array_unshift($test[$iten->period]['4_4'][2], "Реалізовано, т");
        array_unshift($test[$iten->period]['4_4'][3], "Вироблено, т");
        array_unshift($test[$iten->period]['4_4'][4], "Залишок готової продукції на кінець періоду, т");
        array_unshift($test[$iten->period]['4_4'][5], "Вартість залишків готової продукції на початок періоду, грн.");
        array_unshift($test[$iten->period]['4_4'][6], "Собівартість реалізованої продукції, грн.");
        array_unshift($test[$iten->period]['4_4'][7], "Собівартість виробленої продукції, грн.");
        array_unshift($test[$iten->period]['4_4'][8], "Вартість залишку готової продукції на кінець періоду, грн.");



// 4_5---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['4_5']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['4_5'][$q] = $ar;

            $q++;
        }
        $arrr = ['Вид реклами / Ринок', 'Європи', 'Пн. Америки', 'Пд. Америки', 'Азії', 'Внут. ринок'];

        array_unshift($test[$iten->period]['4_5'], $arrr);
        array_unshift($test[$iten->period]['4_5'][1], "Інтернет");
        array_unshift($test[$iten->period]['4_5'][2], "Телебачення");
        array_unshift($test[$iten->period]['4_5'][3], "Преса");
        array_unshift($test[$iten->period]['4_5'][4], "Радіо");
        array_unshift($test[$iten->period]['4_5'][5], "Газети і журнали");
        array_unshift($test[$iten->period]['4_5'][6], "Проведення виставок");
        array_unshift($test[$iten->period]['4_5'][7], "ВСЬОГО");



// 4_6---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['4_6']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['4_6'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи', 'Пн. Америки', 'Пд. Америки', 'Азії', 'Внут. ринок'];

        array_unshift($test[$iten->period]['4_6'], $arrr);
        array_unshift($test[$iten->period]['4_6'][1], "Залишок нереалізованої продукції на початок періоду, т");
        array_unshift($test[$iten->period]['4_6'][2], "Обсяг пропозиції, т");
        array_unshift($test[$iten->period]['4_6'][3], "Обсяг реалізованої продукції, т");
        array_unshift($test[$iten->period]['4_6'][4], "Залишок нереалізованої продукції на кінець періоду, т");
        array_unshift($test[$iten->period]['4_6'][5], "Собівартість залишку нереалізованої продукції на початок періоду, грн.");
        array_unshift($test[$iten->period]['4_6'][6], "Собівартість пропозиції, грн.");
        array_unshift($test[$iten->period]['4_6'][7], "Собівартість реалізованої продукції, грн.");
        array_unshift($test[$iten->period]['4_6'][8], "Собівартість залишку нереалізованої продукції на кінець періоду, грн.");


// 4_7---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['4_7']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['4_7'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи', 'Пн. Америки', 'Пд. Америки', 'Азії', 'Внут. ринок'];

        array_unshift($test[$iten->period]['4_7'], $arrr);
        array_unshift($test[$iten->period]['4_7'][1], "Залишок нереалізованої продукції на початок періоду, т");
        array_unshift($test[$iten->period]['4_7'][2], "Обсяг пропозиції, т");
        array_unshift($test[$iten->period]['4_7'][3], "Обсяг реалізованої продукції, т");
        array_unshift($test[$iten->period]['4_7'][4], "Залишок нереалізованої продукції на кінець періоду, т");
        array_unshift($test[$iten->period]['4_7'][5], "Собівартість залишку нереалізованої продукції на початок періоду, грн.");
        array_unshift($test[$iten->period]['4_7'][6], "Собівартість пропозиції, грн.");
        array_unshift($test[$iten->period]['4_7'][7], "Собівартість реалізованої продукції, грн.");
        array_unshift($test[$iten->period]['4_7'][8], "Собівартість залишку нереалізованої продукції на кінець періоду, грн.");


// 4_8---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['4_8']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['4_8'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи', 'Пн. Америки', 'Пд. Америки', 'Азії', 'Внут. ринок'];

        array_unshift($test[$iten->period]['4_8'], $arrr);
        array_unshift($test[$iten->period]['4_8'][1], "Залишок нереалізованої продукції на початок періоду, т");
        array_unshift($test[$iten->period]['4_8'][2], "Обсяг пропозиції, т");
        array_unshift($test[$iten->period]['4_8'][3], "Обсяг реалізованої продукції, т");
        array_unshift($test[$iten->period]['4_8'][4], "Залишок нереалізованої продукції на кінець періоду, т");
        array_unshift($test[$iten->period]['4_8'][5], "Собівартість залишку нереалізованої продукції на початок періоду, грн.");
        array_unshift($test[$iten->period]['4_8'][6], "Собівартість пропозиції, грн.");
        array_unshift($test[$iten->period]['4_8'][7], "Собівартість реалізованої продукції, грн.");
        array_unshift($test[$iten->period]['4_8'][8], "Собівартість залишку нереалізованої продукції на кінець періоду, грн.");


// 4_9---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['4_9']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['4_9'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи', 'Пн. Америки', 'Пд. Америки', 'Азії', 'Внут. ринок'];

        array_unshift($test[$iten->period]['4_9'], $arrr);
        array_unshift($test[$iten->period]['4_9'][1], "Залишок нереалізованої продукції на початок періоду, т");
        array_unshift($test[$iten->period]['4_9'][2], "Обсяг пропозиції, т");
        array_unshift($test[$iten->period]['4_9'][3], "Обсяг реалізованої продукції, т");
        array_unshift($test[$iten->period]['4_9'][4], "Залишок нереалізованої продукції на кінець періоду, т");
        array_unshift($test[$iten->period]['4_9'][5], "Собівартість залишку нереалізованої продукції на початок періоду, грн.");
        array_unshift($test[$iten->period]['4_9'][6], "Собівартість пропозиції, грн.");
        array_unshift($test[$iten->period]['4_9'][7], "Собівартість реалізованої продукції, грн.");
        array_unshift($test[$iten->period]['4_9'][8], "Собівартість залишку нереалізованої продукції на кінець періоду, грн.");


// 4_10---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['4_10']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['4_10'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи', 'Пн. Америки', 'Пд. Америки', 'Азії', 'Внут. ринок'];

        array_unshift($test[$iten->period]['4_10'], $arrr);
        array_unshift($test[$iten->period]['4_10'][1], "Залишок нереалізованої продукції на початок періоду, т");
        array_unshift($test[$iten->period]['4_10'][2], "Обсяг пропозиції, т");
        array_unshift($test[$iten->period]['4_10'][3], "Обсяг реалізованої продукції, т");
        array_unshift($test[$iten->period]['4_10'][4], "Залишок нереалізованої продукції на кінець періоду, т");
        array_unshift($test[$iten->period]['4_10'][5], "Собівартість залишку нереалізованої продукції на початок періоду, грн.");
        array_unshift($test[$iten->period]['4_10'][6], "Собівартість пропозиції, грн.");
        array_unshift($test[$iten->period]['4_10'][7], "Собівартість реалізованої продукції, грн.");
        array_unshift($test[$iten->period]['4_10'][8], "Собівартість залишку нереалізованої продукції на кінець періоду, грн.");



// 4_11---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['4_11']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['4_11'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи', 'Пн. Америки', 'Пд. Америки', 'Азії', 'Внут. ринок'];

        array_unshift($test[$iten->period]['4_11'], $arrr);
        array_unshift($test[$iten->period]['4_11'][1], "Залишок нереалізованої продукції на початок періоду, т");
        array_unshift($test[$iten->period]['4_11'][2], "Обсяг пропозиції, т");
        array_unshift($test[$iten->period]['4_11'][3], "Обсяг реалізованої продукції, т");
        array_unshift($test[$iten->period]['4_11'][4], "Залишок нереалізованої продукції на кінець періоду, т");
        array_unshift($test[$iten->period]['4_11'][5], "Собівартість залишку нереалізованої продукції на початок періоду, грн.");
        array_unshift($test[$iten->period]['4_11'][6], "Собівартість пропозиції, грн.");
        array_unshift($test[$iten->period]['4_11'][7], "Собівартість реалізованої продукції, грн.");
        array_unshift($test[$iten->period]['4_11'][8], "Собівартість залишку нереалізованої продукції на кінець періоду, грн.");


// 4_12---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['4_12']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['4_12'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи', 'Пн. Америки', 'Пд. Америки', 'Азії', 'Внут. ринок'];

        array_unshift($test[$iten->period]['4_12'], $arrr);
        array_unshift($test[$iten->period]['4_12'][1], "Залишок нереалізованої продукції на початок періоду, т");
        array_unshift($test[$iten->period]['4_12'][2], "Обсяг пропозиції, т");
        array_unshift($test[$iten->period]['4_12'][3], "Обсяг реалізованої продукції, т");
        array_unshift($test[$iten->period]['4_12'][4], "Залишок нереалізованої продукції на кінець періоду, т");
        array_unshift($test[$iten->period]['4_12'][5], "Собівартість залишку нереалізованої продукції на початок періоду, грн.");
        array_unshift($test[$iten->period]['4_12'][6], "Собівартість пропозиції, грн.");
        array_unshift($test[$iten->period]['4_12'][7], "Собівартість реалізованої продукції, грн.");
        array_unshift($test[$iten->period]['4_12'][8], "Собівартість залишку нереалізованої продукції на кінець періоду, грн.");


// 4_13---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['4_13']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['4_13'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи', 'Пн. Америки', 'Пд. Америки', 'Азії', 'Внут. ринок'];

        array_unshift($test[$iten->period]['4_13'], $arrr);
        array_unshift($test[$iten->period]['4_13'][1], "Залишок нереалізованої продукції на початок періоду, т");
        array_unshift($test[$iten->period]['4_13'][2], "Обсяг пропозиції, т");
        array_unshift($test[$iten->period]['4_13'][3], "Обсяг реалізованої продукції, т");
        array_unshift($test[$iten->period]['4_13'][4], "Залишок нереалізованої продукції на кінець періоду, т");
        array_unshift($test[$iten->period]['4_13'][5], "Собівартість залишку нереалізованої продукції на початок періоду, грн.");
        array_unshift($test[$iten->period]['4_13'][6], "Собівартість пропозиції, грн.");
        array_unshift($test[$iten->period]['4_13'][7], "Собівартість реалізованої продукції, грн.");
        array_unshift($test[$iten->period]['4_13'][8], "Собівартість залишку нереалізованої продукції на кінець періоду, грн.");


// 4_14---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['4_14']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['4_14'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи', 'Пн. Америки', 'Пд. Америки', 'Азії', 'Внут. ринок'];

        array_unshift($test[$iten->period]['4_14'], $arrr);
        array_unshift($test[$iten->period]['4_14'][1], "Залишок нереалізованої продукції на початок періоду, т");
        array_unshift($test[$iten->period]['4_14'][2], "Обсяг пропозиції, т");
        array_unshift($test[$iten->period]['4_14'][3], "Обсяг реалізованої продукції, т");
        array_unshift($test[$iten->period]['4_14'][4], "Залишок нереалізованої продукції на кінець періоду, т");
        array_unshift($test[$iten->period]['4_14'][5], "Собівартість залишку нереалізованої продукції на початок періоду, грн.");
        array_unshift($test[$iten->period]['4_14'][6], "Собівартість пропозиції, грн.");
        array_unshift($test[$iten->period]['4_14'][7], "Собівартість реалізованої продукції, грн.");
        array_unshift($test[$iten->period]['4_14'][8], "Собівартість залишку нереалізованої продукції на кінець періоду, грн.");


 // 4_15---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['4_15']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['4_15'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи', 'Пн. Америки', 'Пд. Америки', 'Азії', 'Внут. ринок'];

        array_unshift($test[$iten->period]['4_15'], $arrr);
        array_unshift($test[$iten->period]['4_15'][1], "АС (50-кг мішки), грн.");
        array_unshift($test[$iten->period]['4_15'][2], "АС (1000 кг. мішки ’Біг-Бег’), грн.");
        array_unshift($test[$iten->period]['4_15'][3], "АС (насип), грн.");

 // 4_16---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['4_16']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['4_16'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи', 'Пн. Америки', 'Пд. Америки', 'Азії', 'Внут. ринок'];

        array_unshift($test[$iten->period]['4_16'], $arrr);
        array_unshift($test[$iten->period]['4_16'][1], "KA (50-кг мішки), грн.");
        array_unshift($test[$iten->period]['4_16'][2], "KA (1000 кг. мішки ’Біг-Бег’), грн.");
        array_unshift($test[$iten->period]['4_16'][3], "KA (насип), грн.");


// 4_17---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['4_17']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['4_17'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи', 'Пн. Америки', 'Пд. Америки', 'Азії', 'Внут. ринок'];

        array_unshift($test[$iten->period]['4_17'], $arrr);
        array_unshift($test[$iten->period]['4_17'][1], "KАС (50-кг мішки), грн.");
        array_unshift($test[$iten->period]['4_17'][2], "KАС (1000 кг. мішки ’Біг-Бег’), грн.");
        array_unshift($test[$iten->period]['4_17'][3], "KАС (насип), грн.");

// 4_18---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['4_18']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['4_18'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Q(1), т', 'Q(2), т', 'Q(3), т', 'Q(4), т', 'Q(5), т', 'P(1), євро.', 'P(2), дол.США.', 'P(3), дол.США', 'P(4), дол.США', 'P(5), грн.', 'TR(1), грн', 'TR(2), грн', 'TR(3), грн', 'TR(4), грн', 'TR(5), грн'];

        array_unshift($test[$iten->period]['4_18'], $arrr);
        array_unshift($test[$iten->period]['4_18'][1], "50-кг мішки");
        array_unshift($test[$iten->period]['4_18'][2], "1000 кг. мішки типу ’Біг-Бег’");
        array_unshift($test[$iten->period]['4_18'][3], "Насип");

// 4_19---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['4_19']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['4_19'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Q(1), т', 'Q(2), т', 'Q(3), т', 'Q(4), т', 'Q(5), т', 'P(1), євро.', 'P(2), дол.США.', 'P(3), дол.США', 'P(4), дол.США', 'P(5), грн.', 'TR(1), грн', 'TR(2), грн', 'TR(3), грн', 'TR(4), грн', 'TR(5), грн'];

        array_unshift($test[$iten->period]['4_19'], $arrr);
        array_unshift($test[$iten->period]['4_19'][1], "50-кг мішки");
        array_unshift($test[$iten->period]['4_19'][2], "1000 кг. мішки типу ’Біг-Бег’");
        array_unshift($test[$iten->period]['4_19'][3], "Насип");


 // 4_20---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['4_20']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['4_20'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Q(1), т', 'Q(2), т', 'Q(3), т', 'Q(4), т', 'Q(5), т', 'P(1), євро.', 'P(2), дол.США.', 'P(3), дол.США', 'P(4), дол.США', 'P(5), грн.', 'TR(1), грн', 'TR(2), грн', 'TR(3), грн', 'TR(4), грн', 'TR(5), грн'];

        array_unshift($test[$iten->period]['4_20'], $arrr);
        array_unshift($test[$iten->period]['4_20'][1], "50-кг мішки");
        array_unshift($test[$iten->period]['4_20'][2], "1000 кг. мішки типу ’Біг-Бег’");
        array_unshift($test[$iten->period]['4_20'][3], "Насип");


// 4_21---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['4_21']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['4_21'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи', 'Пн. Америки', 'Пд. Америки', 'Азії'];

        array_unshift($test[$iten->period]['4_21'], $arrr);
        array_unshift($test[$iten->period]['4_21'][1], "Замовлено, од.");
        array_unshift($test[$iten->period]['4_21'][2], "Фактична потреба, од.");
        array_unshift($test[$iten->period]['4_21'][3], "Додаткова потреба, од.");

// кінець таблиць 4---------------------------------------------------------------------------------------------------

// початок таблиць 5---------------------------------------------------------------------------------------------------------


// 5_1---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['5_1']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['5_1'][$q] = $ar;

            $q++;
        }
        $arrr = ['Cтаття', 'Період - 13', 'Період - 14'];

        array_unshift($test[$iten->period]['5_1'], $arrr);
        array_unshift($test[$iten->period]['5_1'][1], "1");
        array_unshift($test[$iten->period]['5_1'][2], "Необоротні активи");
        array_unshift($test[$iten->period]['5_1'][3], "Нематеріальні активи");
        array_unshift($test[$iten->period]['5_1'][4], "первісна вартість");
        array_unshift($test[$iten->period]['5_1'][5], "накопичена амортизація");
        array_unshift($test[$iten->period]['5_1'][6], "Незавершені капітальні інвестиції");
        array_unshift($test[$iten->period]['5_1'][7], "Основні засоби");
        array_unshift($test[$iten->period]['5_1'][8], "первісна вартість");
        array_unshift($test[$iten->period]['5_1'][9], "знос");
        array_unshift($test[$iten->period]['5_1'][10], "Інвестиційна нерухомість");

        array_unshift($test[$iten->period]['5_1'][11], "Довгострокові біологічні активи");
        array_unshift($test[$iten->period]['5_1'][12], "Довгострокові фінансові інвестиції:");
        array_unshift($test[$iten->period]['5_1'][13], "які обліковуються за методом участі в капіталі інших підприємств");
        array_unshift($test[$iten->period]['5_1'][14], "Iнші фінансові інвестиції");
        array_unshift($test[$iten->period]['5_1'][15], "Довгострокова дебіторська заборгованість");
        array_unshift($test[$iten->period]['5_1'][16], "Відстрочені податкові активи");
        array_unshift($test[$iten->period]['5_1'][17], "Інші необоротні активи");
        array_unshift($test[$iten->period]['5_1'][18], "Усього за розділом I");
        array_unshift($test[$iten->period]['5_1'][19], "II. Оборотні активи");
        array_unshift($test[$iten->period]['5_1'][20], "Запаси");

        array_unshift($test[$iten->period]['5_1'][21], "Поточні біологічні активи");
        array_unshift($test[$iten->period]['5_1'][22], "Дебіторська заборгованість за продукцію, товари, роботи, послуги");
        array_unshift($test[$iten->period]['5_1'][23], "Дебіторська заборгованість за розрахунками:");
        array_unshift($test[$iten->period]['5_1'][24], "за виданими авансами");
        array_unshift($test[$iten->period]['5_1'][25], "з бюджетом");
        array_unshift($test[$iten->period]['5_1'][26], "у тому числі з податку на прибуток");
        array_unshift($test[$iten->period]['5_1'][27], "Інша поточна дебіторська заборгованість");
        array_unshift($test[$iten->period]['5_1'][28], "Поточні фінансові інвестиції");
        array_unshift($test[$iten->period]['5_1'][29], "Гроші та їх еквіваленти");
        array_unshift($test[$iten->period]['5_1'][30], "Витрати майбутніх періодів");

        array_unshift($test[$iten->period]['5_1'][31], "Інші оборотні активи");
        array_unshift($test[$iten->period]['5_1'][32], "Усього за розділом II");
        array_unshift($test[$iten->period]['5_1'][33], "III. Необоротні активи, утримувані для продажу, та групи вибуття");
        array_unshift($test[$iten->period]['5_1'][34], "Баланс");
        array_unshift($test[$iten->period]['5_1'][35], "-");
        array_unshift($test[$iten->period]['5_1'][36], "Пасив");
        array_unshift($test[$iten->period]['5_1'][37], "1");
        array_unshift($test[$iten->period]['5_1'][38], "I. Власний капітал");
        array_unshift($test[$iten->period]['5_1'][39], "Зареєстрований (пайовий) капітал");
        array_unshift($test[$iten->period]['5_1'][40], "Капітал у дооцінках");

        array_unshift($test[$iten->period]['5_1'][41], "Додатковий капітал");
        array_unshift($test[$iten->period]['5_1'][42], "Резервний капітал");
        array_unshift($test[$iten->period]['5_1'][43], "Нерозподілений прибуток (непокритий збиток)");
        array_unshift($test[$iten->period]['5_1'][44], "Неоплачений капітал");
        array_unshift($test[$iten->period]['5_1'][45], "Вилучений капітал");
        array_unshift($test[$iten->period]['5_1'][46], "Усього за розділом I");
        array_unshift($test[$iten->period]['5_1'][47], "II. Довгострокові зобов’язання і забезпечення");
        array_unshift($test[$iten->period]['5_1'][48], "Відстрочені податкові зобов’язання");
        array_unshift($test[$iten->period]['5_1'][49], "Довгострокові кредити банків");
        array_unshift($test[$iten->period]['5_1'][50], "Інші довгострокові зобов’язання");

        array_unshift($test[$iten->period]['5_1'][51], "Довгострокові забезпечення");
        array_unshift($test[$iten->period]['5_1'][52], "Цільове фінансування");
        array_unshift($test[$iten->period]['5_1'][53], "Усього за розділом II");
        array_unshift($test[$iten->period]['5_1'][54], "IІІ. Поточні зобов’язання і забезпечення");
        array_unshift($test[$iten->period]['5_1'][55], "Короткострокові кредити банків");
        array_unshift($test[$iten->period]['5_1'][56], "Поточна кредиторська заборгованість за:	");
        array_unshift($test[$iten->period]['5_1'][57], " довгостроковими зобов’язаннями");
        array_unshift($test[$iten->period]['5_1'][58], " товари, роботи, послуги");
        array_unshift($test[$iten->period]['5_1'][59], " розрахунками з бюджетом");
        array_unshift($test[$iten->period]['5_1'][60], " у тому числі з податку на прибуток");

        array_unshift($test[$iten->period]['5_1'][61], " розрахунками зі страхування");
        array_unshift($test[$iten->period]['5_1'][62], " розрахунками з оплати праці");
        array_unshift($test[$iten->period]['5_1'][63], "Поточні забезпечення");
        array_unshift($test[$iten->period]['5_1'][64], "Доходи майбутніх періодів");
        array_unshift($test[$iten->period]['5_1'][65], "Інші поточні зобов’язання");
        array_unshift($test[$iten->period]['5_1'][66], "Усього за розділом IІІ");
        array_unshift($test[$iten->period]['5_1'][67], "ІV. Зобов’язання, пов’язані з необоротними активами, утримуваними для продажу, та групами вибуття");
        array_unshift($test[$iten->period]['5_1'][68], "Баланс");

// 5_2---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['5_2']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['5_2'][$q] = $ar;

            $q++;
        }
        $arrr = ['Cтаття', 'Період - 13', 'Період - 14'];

        array_unshift($test[$iten->period]['5_2'], $arrr);
        array_unshift($test[$iten->period]['5_2'][1], "-");
        array_unshift($test[$iten->period]['5_2'][2], "Чистий дохід від реалізації продукції (товарів, робіт, послуг)");
        array_unshift($test[$iten->period]['5_2'][3], "Cобівартість реалізованої продукції (товарів, робіт, послуг)");
        array_unshift($test[$iten->period]['5_2'][4], "Валовий:");
        array_unshift($test[$iten->period]['5_2'][5], "прибуток");
        array_unshift($test[$iten->period]['5_2'][6], "збиток");
        array_unshift($test[$iten->period]['5_2'][7], "Інші операційні доходи");
        array_unshift($test[$iten->period]['5_2'][8], "Адміністративні витрати");
        array_unshift($test[$iten->period]['5_2'][9], "Витрати на збут");
        array_unshift($test[$iten->period]['5_2'][10], "Інші операційні витрати");

        array_unshift($test[$iten->period]['5_2'][11], "Фінансовий результат від операційної діяльності:");
        array_unshift($test[$iten->period]['5_2'][12], "прибуток");
        array_unshift($test[$iten->period]['5_2'][13], "збиток");
        array_unshift($test[$iten->period]['5_2'][14], "Дохід від участі в капіталі");
        array_unshift($test[$iten->period]['5_2'][15], "Інші фінансові доходи");
        array_unshift($test[$iten->period]['5_2'][16], "Інші доходи");
        array_unshift($test[$iten->period]['5_2'][17], "Фінансові витрати");
        array_unshift($test[$iten->period]['5_2'][18], "Втрати від участі в капіталі");
        array_unshift($test[$iten->period]['5_2'][19], "Інші витрати");
        array_unshift($test[$iten->period]['5_2'][20], "Фінансовий результат до оподаткування:");

        array_unshift($test[$iten->period]['5_2'][21], "прибуток");
        array_unshift($test[$iten->period]['5_2'][22], "збиток");
        array_unshift($test[$iten->period]['5_2'][23], "Витрати (дохід) з податку на прибуток");
        array_unshift($test[$iten->period]['5_2'][24], "Прибуток (збиток) від припиненої діяльності після оподаткування");
        array_unshift($test[$iten->period]['5_2'][25], "Чистий фінансовий результат:");
        array_unshift($test[$iten->period]['5_2'][26], "прибуток");
        array_unshift($test[$iten->period]['5_2'][27], "збиток");
//        $test[$iten->period]['5_2'][28]="ee";
//      $test[$iten->period]['5_2'][29]= "Дооцінка (уцінка) необоротних активів";
//        array_unshift($test[$iten->period]['5_2'][30], "Дооцінка (уцінка) фінансових інструментів");
//
//        array_unshift($test[$iten->period]['5_2'][31], "Накопичені курсові різниці");
//        array_unshift($test[$iten->period]['5_2'][32], "Частка іншого сукупного доходу асоційованих та спільних підприємств");
//        array_unshift($test[$iten->period]['5_2'][33], "Інший сукупний дохід");
//        array_unshift($test[$iten->period]['5_2'][34], "Інший сукупний дохід до оподаткування");
//        array_unshift($test[$iten->period]['5_2'][35], "Податок на прибуток, пов’язаний з іншим сукупним доходом");
//        array_unshift($test[$iten->period]['5_2'][36], "Інший сукупний дохід після оподаткування");
//        array_unshift($test[$iten->period]['5_2'][37], "Сукупний дохід (сума рядків 2350, 2355 та 2460)");


// 5_3---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['5_3']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['5_3'][$q] = $ar;

            $q++;
        }
        $arrr = ['Cтаття', 'Період - 13', 'Період - 14'];

        array_unshift($test[$iten->period]['5_3'], $arrr);
        array_unshift($test[$iten->period]['5_3'][1], "Залишок грошових коштів на початок періоду ");
        array_unshift($test[$iten->period]['5_3'][2], "1. Операційна діяльність");
        array_unshift($test[$iten->period]['5_3'][3], "1.1. Надходження");
        array_unshift($test[$iten->period]['5_3'][4], "Виручка (дохід) від реалізації");
        array_unshift($test[$iten->period]['5_3'][5], "в т.ч.");
        array_unshift($test[$iten->period]['5_3'][6], "- продукції ");
        array_unshift($test[$iten->period]['5_3'][7], "- товарів ");
        array_unshift($test[$iten->period]['5_3'][8], "- робіт, послуг");
        array_unshift($test[$iten->period]['5_3'][9], "Аванси, отримані від покупців");
        array_unshift($test[$iten->period]['5_3'][10], "в т.ч.");

        array_unshift($test[$iten->period]['5_3'][11], "- за продукцію ");
        array_unshift($test[$iten->period]['5_3'][12], "- за товари");
        array_unshift($test[$iten->period]['5_3'][13], "- за роботи ");
        array_unshift($test[$iten->period]['5_3'][14], "Погашення дебіторської заборгованості (товарної)");
        array_unshift($test[$iten->period]['5_3'][15], "в т.ч.");
        array_unshift($test[$iten->period]['5_3'][16], " -не забезпечену векселем: ");
        array_unshift($test[$iten->period]['5_3'][17], "- за продукцію");
        array_unshift($test[$iten->period]['5_3'][18], "- за товари ");
        array_unshift($test[$iten->period]['5_3'][19], "- за роботи");
        array_unshift($test[$iten->period]['5_3'][20], "з них:");

        array_unshift($test[$iten->period]['5_3'][21], "- сумнівна заборгованість");
        array_unshift($test[$iten->period]['5_3'][22], "- безнадійна заборгованість");
        array_unshift($test[$iten->period]['5_3'][23], "- забезпечена векселем");
        array_unshift($test[$iten->period]['5_3'][24], "Погашення дебіторської заборгованості за розрахунками ");
        array_unshift($test[$iten->period]['5_3'][25], "в т.ч.");
        array_unshift($test[$iten->period]['5_3'][26], "- з бюджетом");
        array_unshift($test[$iten->period]['5_3'][27], "- за претензіями");
        array_unshift($test[$iten->period]['5_3'][28], "- з підзвітними особами");
        array_unshift($test[$iten->period]['5_3'][29], "- інша");
        array_unshift($test[$iten->period]['5_3'][30], " Інші надходження");

        array_unshift($test[$iten->period]['5_3'][31], " 1.2. Витрачання ");
        array_unshift($test[$iten->period]['5_3'][32], " Погашення кредиторської заборгованості за сировину, матеріали, товари:");
        array_unshift($test[$iten->period]['5_3'][33], " та, яка виникла у звітному періоді:");
        array_unshift($test[$iten->period]['5_3'][34], " та, яка виникла у попередньому періоді:");
        array_unshift($test[$iten->period]['5_3'][35], " Погашення поточних зобов’язань:");
        array_unshift($test[$iten->period]['5_3'][36], "в т. ч");
        array_unshift($test[$iten->period]['5_3'][37], "- з бюджетом за податками:");
        array_unshift($test[$iten->period]['5_3'][38], " - з ПФ і ФСС за єдиним соціальним внеском");
        array_unshift($test[$iten->period]['5_3'][39], "Погашена заборгованість за виплатами працівникам:");
        array_unshift($test[$iten->period]['5_3'][40], " в т.ч. ");

        array_unshift($test[$iten->period]['5_3'][41], " - основна заробітна плата виробничих робітників (за продукцію)");
        array_unshift($test[$iten->period]['5_3'][42], " - адміністративному персоналу ");
        array_unshift($test[$iten->period]['5_3'][43], " - додаткова заробітна плата виробничих робітників (за продукцію)");
        array_unshift($test[$iten->period]['5_3'][44], " - інші виплати робітникам");
        array_unshift($test[$iten->period]['5_3'][45], " Сплачені аванси працівникам (з/пл)");
        array_unshift($test[$iten->period]['5_3'][46], " - виробничим робітникам");
        array_unshift($test[$iten->period]['5_3'][47], " - адміністративному персоналу");
        array_unshift($test[$iten->period]['5_3'][48], "Погашена заборгованість за внутрішніми розрахунками: ");
        array_unshift($test[$iten->period]['5_3'][49], "в т.ч. ");
        array_unshift($test[$iten->period]['5_3'][50], " - підзвітним особам");

        array_unshift($test[$iten->period]['5_3'][51], " - інша");
        array_unshift($test[$iten->period]['5_3'][52], "Адміністративні витрати ");
        array_unshift($test[$iten->period]['5_3'][53], "консультаційно-інформаційні витрати");
        array_unshift($test[$iten->period]['5_3'][54], " за розрахунково-касове обслуговування");
        array_unshift($test[$iten->period]['5_3'][55], " Витрати на збут");
        array_unshift($test[$iten->period]['5_3'][56], " - маркетингове дослідження ринку");
        array_unshift($test[$iten->period]['5_3'][57], "  - реклама");
        array_unshift($test[$iten->period]['5_3'][58], " - сервісне та гарантійне обслуговування");
        array_unshift($test[$iten->period]['5_3'][59], " - інші");
        array_unshift($test[$iten->period]['5_3'][60], "Інші операційні витрати ");

        array_unshift($test[$iten->period]['5_3'][61], " складські витрати, з них: ");
        array_unshift($test[$iten->period]['5_3'][62], " - за зберігання сировини і матеріалів ");
        array_unshift($test[$iten->period]['5_3'][63], " - за зберігання готової продукції ");
        array_unshift($test[$iten->period]['5_3'][64], "- за зберігання товарів");
        array_unshift($test[$iten->period]['5_3'][65], "транспортні витрати");
        array_unshift($test[$iten->period]['5_3'][66], " відсотки дилерам і агрентам (комісійні)");
        array_unshift($test[$iten->period]['5_3'][67], " витрати на модернізацію виробництва");
        array_unshift($test[$iten->period]['5_3'][68], "інші");
        array_unshift($test[$iten->period]['5_3'][69], "РУХ КОШТІВ ВІД ОПЕРАЦІЙНОЇ ДІЯЛЬНОСТІ");
        array_unshift($test[$iten->period]['5_3'][70], " ІНВЕСТИЦІЙНА ДІЯЛЬНІСТЬ");



        array_unshift($test[$iten->period]['5_3'][71], "2.1. НАДХОДЖЕННЯ ");
        array_unshift($test[$iten->period]['5_3'][72], " Дохід від реалізації:");
        array_unshift($test[$iten->period]['5_3'][73], " в т.ч. ");
        array_unshift($test[$iten->period]['5_3'][74], " корпоративних прав (фінансових інвестицій)");
        array_unshift($test[$iten->period]['5_3'][75], " з них: ");
        array_unshift($test[$iten->period]['5_3'][76], "акції");
        array_unshift($test[$iten->period]['5_3'][77], "частки у капіталі інших підприємств ");
        array_unshift($test[$iten->period]['5_3'][78], "боргових зобов’язань інших підприємств");
        array_unshift($test[$iten->period]['5_3'][79], "майнових комплексів ");
        array_unshift($test[$iten->period]['5_3'][80], "необоротних активів, з них");

        array_unshift($test[$iten->period]['5_3'][81], "планово (рах.286) ");
        array_unshift($test[$iten->period]['5_3'][82], "інші");
        array_unshift($test[$iten->period]['5_3'][83], "Отримані :");
        array_unshift($test[$iten->period]['5_3'][84], "- дивіденди ");
        array_unshift($test[$iten->period]['5_3'][85], "- відсотки ");
        array_unshift($test[$iten->period]['5_3'][86], "- повернення раніше наданих позик");
        array_unshift($test[$iten->period]['5_3'][87], "Інші надходження");
        array_unshift($test[$iten->period]['5_3'][88], "2.2. ВИТРАЧАННЯ");
        array_unshift($test[$iten->period]['5_3'][89], "Витрати на придбання:");
        array_unshift($test[$iten->period]['5_3'][90], "в т.ч.");

        array_unshift($test[$iten->period]['5_3'][91], " корпоративних прав (фінансових інвестицій)");
        array_unshift($test[$iten->period]['5_3'][92], " з них:");
        array_unshift($test[$iten->period]['5_3'][93], " - акції ");
        array_unshift($test[$iten->period]['5_3'][94], "- частки у капіталі інших підприємств ");
        array_unshift($test[$iten->period]['5_3'][95], " - боргавих зобов’язань інших підприємств ");
        array_unshift($test[$iten->period]['5_3'][96], " майнових комплексів ");
        array_unshift($test[$iten->period]['5_3'][97], " необоротних активів ");
        array_unshift($test[$iten->period]['5_3'][98], " Інші платежі");
        array_unshift($test[$iten->period]['5_3'][99], "РУХ КОШТІВ ВІД IНВЕНСТИЦІЙНОЇ ДІЯЛЬНОСТІ");
        array_unshift($test[$iten->period]['5_3'][100], "3. Фінансова діяльність");

        array_unshift($test[$iten->period]['5_3'][101], " 3.1. Надходження");
        array_unshift($test[$iten->period]['5_3'][102], " від продажу власних акцій");
        array_unshift($test[$iten->period]['5_3'][103], " боргових зобов’язань");
        array_unshift($test[$iten->period]['5_3'][104], "у т.ч. ");
        array_unshift($test[$iten->period]['5_3'][105], "облігацій");
        array_unshift($test[$iten->period]['5_3'][106], "векселів");
        array_unshift($test[$iten->period]['5_3'][107], "Отримання позики");
        array_unshift($test[$iten->period]['5_3'][108], "- короткострокового кредиту");
        array_unshift($test[$iten->period]['5_3'][109], "- середньострокового кредиту");
        array_unshift($test[$iten->period]['5_3'][110], "- довгострокового кредиту");


        array_unshift($test[$iten->period]['5_3'][111], " - овердрафту");
        array_unshift($test[$iten->period]['5_3'][112], " інших позик ");
        array_unshift($test[$iten->period]['5_3'][113], " інші надходження");
        array_unshift($test[$iten->period]['5_3'][114], " - % за коштами на поточних рахунках  ");
        array_unshift($test[$iten->period]['5_3'][115], " - % за коштами на депозитних рахунках");
        array_unshift($test[$iten->period]['5_3'][116], "3.2. Витрачання");
        array_unshift($test[$iten->period]['5_3'][117], "Погашення % за кредити");
        array_unshift($test[$iten->period]['5_3'][118], "у т.ч.");
        array_unshift($test[$iten->period]['5_3'][119], "- короткострокового");
        array_unshift($test[$iten->period]['5_3'][120], "- середньострокового");

        array_unshift($test[$iten->period]['5_3'][121], "- довгострокового");
        array_unshift($test[$iten->period]['5_3'][122], "- овердрафту");
        array_unshift($test[$iten->period]['5_3'][123], "Погашення кредиту (тіла)");
        array_unshift($test[$iten->period]['5_3'][124], "у т.ч.");
        array_unshift($test[$iten->period]['5_3'][125], "- короткострокового");
        array_unshift($test[$iten->period]['5_3'][126], "- середньострокового");
        array_unshift($test[$iten->period]['5_3'][127], "- довгострокового");
        array_unshift($test[$iten->period]['5_3'][128], "- овердрафту");
        array_unshift($test[$iten->period]['5_3'][129], "- інших позик ");
        array_unshift($test[$iten->period]['5_3'][130], "Сплачені дивіденди");

        array_unshift($test[$iten->period]['5_3'][131], " Погашення заборгованості за фінансовою орендою:");
        array_unshift($test[$iten->period]['5_3'][132], " Інші виплати ");
        array_unshift($test[$iten->period]['5_3'][133], " РУХ КОШТІВ ВІД ФІНАНСОВОЇ ДІЯЛЬНОСТІ");
        array_unshift($test[$iten->period]['5_3'][134], " Залишок грошових коштів на кінець періоду 	");





// 5_4---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['5_4']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['5_4'][$q] = $ar;

            $q++;
        }
        $arrr = ['Адміністративні витрати', 'грн'];

        array_unshift($test[$iten->period]['5_4'], $arrr);
        array_unshift($test[$iten->period]['5_4'][1], "Заробітна плата управлінського персоналу");
        array_unshift($test[$iten->period]['5_4'][2], "Нарахування");
        array_unshift($test[$iten->period]['5_4'][3], "Обслуговування рахунку у банку");
        array_unshift($test[$iten->period]['5_4'][4], "Оренда офісного приміщення");
        array_unshift($test[$iten->period]['5_4'][5], "Витрати на аудит");
        array_unshift($test[$iten->period]['5_4'][6], "Страхування майна");
        array_unshift($test[$iten->period]['5_4'][7], "Витрати на охорону");
        array_unshift($test[$iten->period]['5_4'][8], "Витрати на зв’язок");
        array_unshift($test[$iten->period]['5_4'][9], "Інші витрати на управління");
        array_unshift($test[$iten->period]['5_4'][10], "Витрати на дослідження ринку	");

        array_unshift($test[$iten->period]['5_4'][11], "Амортизація необоротних активів");



// 5_5---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['5_5']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['5_5'][$q] = $ar;

            $q++;
        }
        $arrr = ['','Курсова різниця','Гроші на рахунку', 'Дохід від реалізації валюти','Комісія банку','C/c валюти з урахуванням комісії','Прибуток(збиток) від продажу валюти','Винагорода дилерам'];

        array_unshift($test[$iten->period]['5_5'], $arrr);
        array_unshift($test[$iten->period]['5_4'][1], "Значення показника");





// 5_6---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['5_6']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['5_6'][$q] = $ar;

            $q++;
        }
        $arrr = ['Витрачання коштів', 'всього, грн.'];

        array_unshift($test[$iten->period]['5_6'], $arrr);
        array_unshift($test[$iten->period]['5_6'][1], "Оплата за прямі матеріали, що надійшли за ситемою ’Just-in-Time’");
        array_unshift($test[$iten->period]['5_6'][2], "Оплата за термінову поставку природного газу");
        array_unshift($test[$iten->period]['5_6'][3], "Аванс за природний газ, що надійде у наступному періоді");
        array_unshift($test[$iten->period]['5_6'][4], "Оcтаточний розрахунок за природний газ, замовлений у попередньому періоді");
        array_unshift($test[$iten->period]['5_6'][5], "Придбання непрямих матеріалів");
        array_unshift($test[$iten->period]['5_6'][6], "Предоплата за мішки (50-кг та Біг-Беги)");
        array_unshift($test[$iten->period]['5_6'][7], "Погашення кредиторської заборгованості за попередньо поставлені мішки");
        array_unshift($test[$iten->period]['5_6'][8], "Витрачання коштів за термінового постачання 50 кг мішків для пакування АС");
        array_unshift($test[$iten->period]['5_6'][9], "Витрачання коштів за термінового постачання 50 кг мішків для пакування КА");
        array_unshift($test[$iten->period]['5_6'][10], "Витрачання коштів за термінового постачання 50 кг мішків для пакування КАС");

        array_unshift($test[$iten->period]['5_6'][11], "Витрачання коштів за термінового постачання 1000 кг мішків для пакування АС");
        array_unshift($test[$iten->period]['5_6'][12], "Витрачання коштів за термінового постачання 1000 кг мішків для пакування КА");
        array_unshift($test[$iten->period]['5_6'][13], "Витрачання коштів за термінового постачання 1000 кг мішків для пакування КАС");

// 5_7---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['5_7']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['5_7'][$q] = $ar;

            $q++;
        }
        $arrr = ['А-П', 'Cпіввідношення'];

        array_unshift($test[$iten->period]['5_7'], $arrr);
        array_unshift($test[$iten->period]['5_7'][1], "Необоротні активи (F) - Джерела власних коштів (U)");
        array_unshift($test[$iten->period]['5_7'][2], "Запаси і витрати (Z) - Довгострокові кредити і позики (K(T))");
        array_unshift($test[$iten->period]['5_7'][3], "Розрахунки (ДЗ) та інші активи r(a) - Короткострокові кредити і позики (K(t))");
        array_unshift($test[$iten->period]['5_7'][4], "Грошові кошти(M) - Термінові зобов’язання (K(p))");



// 5_8---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['5_8']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['5_8'][$q] = $ar;

            $q++;
        }
        $arrr = ['','U+K(T)+K(t)', 'U+K(T)','U'];

        array_unshift($test[$iten->period]['5_8'], $arrr);
        array_unshift($test[$iten->period]['5_8'][1], "F+Z+r(a)");
        array_unshift($test[$iten->period]['5_8'][2], "F+Z");
        array_unshift($test[$iten->period]['5_8'][3], "F");


 // 5_9---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['5_9']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['5_9'][$q] = $ar;

            $q++;
        }
        $arrr = ['','кредит на 7 місяців', 'кредит на 5 місяців','кредит на 3 місяці'];

        array_unshift($test[$iten->period]['5_9'], $arrr);
        array_unshift($test[$iten->period]['5_9'][1], "Варіант №1");
        array_unshift($test[$iten->period]['5_9'][2], "Варіант №2");
        array_unshift($test[$iten->period]['5_9'][3], "Варіант №3");

// кінець таблиць 5---------------------------------------------------------------------------------------------------

// початок таблиць 5---------------------------------------------------------------------------------------------------------


// 6_1---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_1']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_1'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'AC, т', 'КА, т','КАC, т','NH3, т'];

        array_unshift($test[$iten->period]['6_1'], $arrr);
        array_unshift($test[$iten->period]['6_1'][1], "Підприємство - 1");
        array_unshift($test[$iten->period]['6_1'][2], "Підприємство - 2");
        array_unshift($test[$iten->period]['6_1'][3], "Підприємство - 3");
        array_unshift($test[$iten->period]['6_1'][4], "Підприємство - 4");
        array_unshift($test[$iten->period]['6_1'][5], "Підприємство - 5");
        array_unshift($test[$iten->period]['6_1'][6], "Підприємство - 6");
        array_unshift($test[$iten->period]['6_1'][7], "Підприємство - 7");
        array_unshift($test[$iten->period]['6_1'][8], "Підприємство - 8");
        array_unshift($test[$iten->period]['6_1'][9], "Підприємство - 9");
        array_unshift($test[$iten->period]['6_1'][10],"Підприємство - 10");


// 6_2---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_2']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_2'][$q] = $ar;

            $q++;
        }
        $arrr = ['', '50-кг мішки, т', '1000-кг. мішки типу ’Біг-Бег’, т','Насип, т'];

        array_unshift($test[$iten->period]['6_2'], $arrr);
        array_unshift($test[$iten->period]['6_2'][1], "Підприємство - 1");
        array_unshift($test[$iten->period]['6_2'][2], "Підприємство - 2");
        array_unshift($test[$iten->period]['6_2'][3], "Підприємство - 3");
        array_unshift($test[$iten->period]['6_2'][4], "Підприємство - 4");
        array_unshift($test[$iten->period]['6_2'][5], "Підприємство - 5");
        array_unshift($test[$iten->period]['6_2'][6], "Підприємство - 6");
        array_unshift($test[$iten->period]['6_2'][7], "Підприємство - 7");
        array_unshift($test[$iten->period]['6_2'][8], "Підприємство - 8");
        array_unshift($test[$iten->period]['6_2'][9], "Підприємство - 9");
        array_unshift($test[$iten->period]['6_2'][10],"Підприємство - 10");

// 6_3---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_3']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_3'][$q] = $ar;

            $q++;
        }
        $arrr = ['', '50-кг мішки, т', '1000-кг. мішки типу ’Біг-Бег’, т','Насип, т'];

        array_unshift($test[$iten->period]['6_3'], $arrr);
        array_unshift($test[$iten->period]['6_3'][1], "Підприємство - 1");
        array_unshift($test[$iten->period]['6_3'][2], "Підприємство - 2");
        array_unshift($test[$iten->period]['6_3'][3], "Підприємство - 3");
        array_unshift($test[$iten->period]['6_3'][4], "Підприємство - 4");
        array_unshift($test[$iten->period]['6_3'][5], "Підприємство - 5");
        array_unshift($test[$iten->period]['6_3'][6], "Підприємство - 6");
        array_unshift($test[$iten->period]['6_3'][7], "Підприємство - 7");
        array_unshift($test[$iten->period]['6_3'][8], "Підприємство - 8");
        array_unshift($test[$iten->period]['6_3'][9], "Підприємство - 9");
        array_unshift($test[$iten->period]['6_3'][10],"Підприємство - 10");



// 6_4---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_4']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_4'][$q] = $ar;

            $q++;
        }
        $arrr = ['', '50-кг мішки, т', '1000-кг. мішки типу ’Біг-Бег’, т','Насип, т'];

        array_unshift($test[$iten->period]['6_4'], $arrr);
        array_unshift($test[$iten->period]['6_4'][1], "Підприємство - 1");
        array_unshift($test[$iten->period]['6_4'][2], "Підприємство - 2");
        array_unshift($test[$iten->period]['6_4'][3], "Підприємство - 3");
        array_unshift($test[$iten->period]['6_4'][4], "Підприємство - 4");
        array_unshift($test[$iten->period]['6_4'][5], "Підприємство - 5");
        array_unshift($test[$iten->period]['6_4'][6], "Підприємство - 6");
        array_unshift($test[$iten->period]['6_4'][7], "Підприємство - 7");
        array_unshift($test[$iten->period]['6_4'][8], "Підприємство - 8");
        array_unshift($test[$iten->period]['6_4'][9], "Підприємство - 9");
        array_unshift($test[$iten->period]['6_4'][10],"Підприємство - 10");




// 6_5---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_5']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_5'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Якість/Гатунок'];

        array_unshift($test[$iten->period]['6_5'], $arrr);
        array_unshift($test[$iten->period]['6_5'][1], "Підприємство - 1");
        array_unshift($test[$iten->period]['6_5'][2], "Підприємство - 2");
        array_unshift($test[$iten->period]['6_5'][3], "Підприємство - 3");
        array_unshift($test[$iten->period]['6_5'][4], "Підприємство - 4");
        array_unshift($test[$iten->period]['6_5'][5], "Підприємство - 5");
        array_unshift($test[$iten->period]['6_5'][6], "Підприємство - 6");
        array_unshift($test[$iten->period]['6_5'][7], "Підприємство - 7");
        array_unshift($test[$iten->period]['6_5'][8], "Підприємство - 8");
        array_unshift($test[$iten->period]['6_5'][9], "Підприємство - 9");
        array_unshift($test[$iten->period]['6_5'][10],"Підприємство - 10");


// 6_6---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_6']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_6'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Якість/Гатунок'];

        array_unshift($test[$iten->period]['6_6'], $arrr);
        array_unshift($test[$iten->period]['6_6'][1], "Підприємство - 1");
        array_unshift($test[$iten->period]['6_6'][2], "Підприємство - 2");
        array_unshift($test[$iten->period]['6_6'][3], "Підприємство - 3");
        array_unshift($test[$iten->period]['6_6'][4], "Підприємство - 4");
        array_unshift($test[$iten->period]['6_6'][5], "Підприємство - 5");
        array_unshift($test[$iten->period]['6_6'][6], "Підприємство - 6");
        array_unshift($test[$iten->period]['6_6'][7], "Підприємство - 7");
        array_unshift($test[$iten->period]['6_6'][8], "Підприємство - 8");
        array_unshift($test[$iten->period]['6_6'][9], "Підприємство - 9");
        array_unshift($test[$iten->period]['6_6'][10],"Підприємство - 10");


// 6_7---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_7']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_7'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Якість/Гатунок'];

        array_unshift($test[$iten->period]['6_7'], $arrr);
        array_unshift($test[$iten->period]['6_7'][1], "Підприємство - 1");
        array_unshift($test[$iten->period]['6_7'][2], "Підприємство - 2");
        array_unshift($test[$iten->period]['6_7'][3], "Підприємство - 3");
        array_unshift($test[$iten->period]['6_7'][4], "Підприємство - 4");
        array_unshift($test[$iten->period]['6_7'][5], "Підприємство - 5");
        array_unshift($test[$iten->period]['6_7'][6], "Підприємство - 6");
        array_unshift($test[$iten->period]['6_7'][7], "Підприємство - 7");
        array_unshift($test[$iten->period]['6_7'][8], "Підприємство - 8");
        array_unshift($test[$iten->period]['6_7'][9], "Підприємство - 9");
        array_unshift($test[$iten->period]['6_7'][10],"Підприємство - 10");

// 6_8_1---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_8_1']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_8_1'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи','Пн. Америки','Пд. Америки','Азії','Внут. ринок'];

        array_unshift($test[$iten->period]['6_8_1'], $arrr);
        array_unshift($test[$iten->period]['6_8_1'][1], "Підприємство - 1");
        array_unshift($test[$iten->period]['6_8_1'][2], "Підприємство - 2");
        array_unshift($test[$iten->period]['6_8_1'][3], "Підприємство - 3");
        array_unshift($test[$iten->period]['6_8_1'][4], "Підприємство - 4");
        array_unshift($test[$iten->period]['6_8_1'][5], "Підприємство - 5");
        array_unshift($test[$iten->period]['6_8_1'][6], "Підприємство - 6");
        array_unshift($test[$iten->period]['6_8_1'][7], "Підприємство - 7");
        array_unshift($test[$iten->period]['6_8_1'][8], "Підприємство - 8");
        array_unshift($test[$iten->period]['6_8_1'][9], "Підприємство - 9");
        array_unshift($test[$iten->period]['6_8_1'][10],"Підприємство - 10");


// 6_8_2---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_8_2']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_8_2'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи','Пн. Америки','Пд. Америки','Азії','Внут. ринок'];

        array_unshift($test[$iten->period]['6_8_2'], $arrr);
        array_unshift($test[$iten->period]['6_8_2'][1], "Підприємство - 1");
        array_unshift($test[$iten->period]['6_8_2'][2], "Підприємство - 2");
        array_unshift($test[$iten->period]['6_8_2'][3], "Підприємство - 3");
        array_unshift($test[$iten->period]['6_8_2'][4], "Підприємство - 4");
        array_unshift($test[$iten->period]['6_8_2'][5], "Підприємство - 5");
        array_unshift($test[$iten->period]['6_8_2'][6], "Підприємство - 6");
        array_unshift($test[$iten->period]['6_8_2'][7], "Підприємство - 7");
        array_unshift($test[$iten->period]['6_8_2'][8], "Підприємство - 8");
        array_unshift($test[$iten->period]['6_8_2'][9], "Підприємство - 9");
        array_unshift($test[$iten->period]['6_8_2'][10],"Підприємство - 10");

// 6_8_3---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_8_3']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_8_3'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи','Пн. Америки','Пд. Америки','Азії','Внут. ринок'];

        array_unshift($test[$iten->period]['6_8_3'], $arrr);
        array_unshift($test[$iten->period]['6_8_3'][1], "Підприємство - 1");
        array_unshift($test[$iten->period]['6_8_3'][2], "Підприємство - 2");
        array_unshift($test[$iten->period]['6_8_3'][3], "Підприємство - 3");
        array_unshift($test[$iten->period]['6_8_3'][4], "Підприємство - 4");
        array_unshift($test[$iten->period]['6_8_3'][5], "Підприємство - 5");
        array_unshift($test[$iten->period]['6_8_3'][6], "Підприємство - 6");
        array_unshift($test[$iten->period]['6_8_3'][7], "Підприємство - 7");
        array_unshift($test[$iten->period]['6_8_3'][8], "Підприємство - 8");
        array_unshift($test[$iten->period]['6_8_3'][9], "Підприємство - 9");
        array_unshift($test[$iten->period]['6_8_3'][10],"Підприємство - 10");

// 6_9_1---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_9_1']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_9_1'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи','Пн. Америки','Пд. Америки','Азії','Внут. ринок'];

        array_unshift($test[$iten->period]['6_9_1'], $arrr);
        array_unshift($test[$iten->period]['6_9_1'][1], "Підприємство - 1");
        array_unshift($test[$iten->period]['6_9_1'][2], "Підприємство - 2");
        array_unshift($test[$iten->period]['6_9_1'][3], "Підприємство - 3");
        array_unshift($test[$iten->period]['6_9_1'][4], "Підприємство - 4");
        array_unshift($test[$iten->period]['6_9_1'][5], "Підприємство - 5");
        array_unshift($test[$iten->period]['6_9_1'][6], "Підприємство - 6");
        array_unshift($test[$iten->period]['6_9_1'][7], "Підприємство - 7");
        array_unshift($test[$iten->period]['6_9_1'][8], "Підприємство - 8");
        array_unshift($test[$iten->period]['6_9_1'][9], "Підприємство - 9");
        array_unshift($test[$iten->period]['6_9_1'][10],"Підприємство - 10");


// 6_9_2---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_9_2']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_9_2'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи','Пн. Америки','Пд. Америки','Азії','Внут. ринок'];

        array_unshift($test[$iten->period]['6_9_2'], $arrr);
        array_unshift($test[$iten->period]['6_9_2'][1], "Підприємство - 1");
        array_unshift($test[$iten->period]['6_9_2'][2], "Підприємство - 2");
        array_unshift($test[$iten->period]['6_9_2'][3], "Підприємство - 3");
        array_unshift($test[$iten->period]['6_9_2'][4], "Підприємство - 4");
        array_unshift($test[$iten->period]['6_9_2'][5], "Підприємство - 5");
        array_unshift($test[$iten->period]['6_9_2'][6], "Підприємство - 6");
        array_unshift($test[$iten->period]['6_9_2'][7], "Підприємство - 7");
        array_unshift($test[$iten->period]['6_9_2'][8], "Підприємство - 8");
        array_unshift($test[$iten->period]['6_9_2'][9], "Підприємство - 9");
        array_unshift($test[$iten->period]['6_9_2'][10],"Підприємство - 10");

// 6_9_3---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_9_3']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_9_3'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи','Пн. Америки','Пд. Америки','Азії','Внут. ринок'];

        array_unshift($test[$iten->period]['6_9_3'], $arrr);
        array_unshift($test[$iten->period]['6_9_3'][1], "Підприємство - 1");
        array_unshift($test[$iten->period]['6_9_3'][2], "Підприємство - 2");
        array_unshift($test[$iten->period]['6_9_3'][3], "Підприємство - 3");
        array_unshift($test[$iten->period]['6_9_3'][4], "Підприємство - 4");
        array_unshift($test[$iten->period]['6_9_3'][5], "Підприємство - 5");
        array_unshift($test[$iten->period]['6_9_3'][6], "Підприємство - 6");
        array_unshift($test[$iten->period]['6_9_3'][7], "Підприємство - 7");
        array_unshift($test[$iten->period]['6_9_3'][8], "Підприємство - 8");
        array_unshift($test[$iten->period]['6_9_3'][9], "Підприємство - 9");
        array_unshift($test[$iten->period]['6_9_3'][10],"Підприємство - 10");


// 6_10_1---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_10_1']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_10_1'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи','Пн. Америки','Пд. Америки','Азії','Внут. ринок'];

        array_unshift($test[$iten->period]['6_10_1'], $arrr);
        array_unshift($test[$iten->period]['6_10_1'][1], "Підприємство - 1");
        array_unshift($test[$iten->period]['6_10_1'][2], "Підприємство - 2");
        array_unshift($test[$iten->period]['6_10_1'][3], "Підприємство - 3");
        array_unshift($test[$iten->period]['6_10_1'][4], "Підприємство - 4");
        array_unshift($test[$iten->period]['6_10_1'][5], "Підприємство - 5");
        array_unshift($test[$iten->period]['6_10_1'][6], "Підприємство - 6");
        array_unshift($test[$iten->period]['6_10_1'][7], "Підприємство - 7");
        array_unshift($test[$iten->period]['6_10_1'][8], "Підприємство - 8");
        array_unshift($test[$iten->period]['6_10_1'][9], "Підприємство - 9");
        array_unshift($test[$iten->period]['6_10_1'][10],"Підприємство - 10");


// 6_10_2---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_10_2']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_10_2'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи','Пн. Америки','Пд. Америки','Азії','Внут. ринок'];

        array_unshift($test[$iten->period]['6_10_2'], $arrr);
        array_unshift($test[$iten->period]['6_10_2'][1], "Підприємство - 1");
        array_unshift($test[$iten->period]['6_10_2'][2], "Підприємство - 2");
        array_unshift($test[$iten->period]['6_10_2'][3], "Підприємство - 3");
        array_unshift($test[$iten->period]['6_10_2'][4], "Підприємство - 4");
        array_unshift($test[$iten->period]['6_10_2'][5], "Підприємство - 5");
        array_unshift($test[$iten->period]['6_10_2'][6], "Підприємство - 6");
        array_unshift($test[$iten->period]['6_10_2'][7], "Підприємство - 7");
        array_unshift($test[$iten->period]['6_10_2'][8], "Підприємство - 8");
        array_unshift($test[$iten->period]['6_10_2'][9], "Підприємство - 9");
        array_unshift($test[$iten->period]['6_10_2'][10],"Підприємство - 10");

// 6_10_3---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_10_3']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_10_3'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи','Пн. Америки','Пд. Америки','Азії','Внут. ринок'];

        array_unshift($test[$iten->period]['6_10_3'], $arrr);
        array_unshift($test[$iten->period]['6_10_3'][1], "Підприємство - 1");
        array_unshift($test[$iten->period]['6_10_3'][2], "Підприємство - 2");
        array_unshift($test[$iten->period]['6_10_3'][3], "Підприємство - 3");
        array_unshift($test[$iten->period]['6_10_3'][4], "Підприємство - 4");
        array_unshift($test[$iten->period]['6_10_3'][5], "Підприємство - 5");
        array_unshift($test[$iten->period]['6_10_3'][6], "Підприємство - 6");
        array_unshift($test[$iten->period]['6_10_3'][7], "Підприємство - 7");
        array_unshift($test[$iten->period]['6_10_3'][8], "Підприємство - 8");
        array_unshift($test[$iten->period]['6_10_3'][9], "Підприємство - 9");
        array_unshift($test[$iten->period]['6_10_3'][10],"Підприємство - 10");


// 6_11---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_11']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_11'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Ціна, грн'];

        array_unshift($test[$iten->period]['6_11'], $arrr);
        array_unshift($test[$iten->period]['6_11'][1], "Підприємство - 1");
        array_unshift($test[$iten->period]['6_11'][2], "Підприємство - 2");
        array_unshift($test[$iten->period]['6_11'][3], "Підприємство - 3");
        array_unshift($test[$iten->period]['6_11'][4], "Підприємство - 4");
        array_unshift($test[$iten->period]['6_11'][5], "Підприємство - 5");
        array_unshift($test[$iten->period]['6_11'][6], "Підприємство - 6");
        array_unshift($test[$iten->period]['6_11'][7], "Підприємство - 7");
        array_unshift($test[$iten->period]['6_11'][8], "Підприємство - 8");
        array_unshift($test[$iten->period]['6_11'][9], "Підприємство - 9");
        array_unshift($test[$iten->period]['6_11'][10],"Підприємство - 10");


// 6_12---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_12']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_12'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Період -15','Період -16','Період -17','Період -18'];

        array_unshift($test[$iten->period]['6_12'], $arrr);
        array_unshift($test[$iten->period]['6_12'][1], "ЄС");
        array_unshift($test[$iten->period]['6_12'][2], "ПН Америка");
        array_unshift($test[$iten->period]['6_12'][3], "ПД Америка");
        array_unshift($test[$iten->period]['6_12'][4], "Азія");
        array_unshift($test[$iten->period]['6_12'][5], "Україна");

// 6_13---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_13']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_13'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Період -15','Період -16','Період -17','Період -18'];

        array_unshift($test[$iten->period]['6_13'], $arrr);
        array_unshift($test[$iten->period]['6_13'][1], "ЄС");
        array_unshift($test[$iten->period]['6_13'][2], "ПН Америка");
        array_unshift($test[$iten->period]['6_13'][3], "ПД Америка");
        array_unshift($test[$iten->period]['6_13'][4], "Азія");
        array_unshift($test[$iten->period]['6_13'][5], "Україна");



// 6_14---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_14']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_14'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Період -15','Період -16','Період -17','Період -18'];

        array_unshift($test[$iten->period]['6_14'], $arrr);
        array_unshift($test[$iten->period]['6_14'][1], "ЄС");
        array_unshift($test[$iten->period]['6_14'][2], "ПН Америка");
        array_unshift($test[$iten->period]['6_14'][3], "ПД Америка");
        array_unshift($test[$iten->period]['6_14'][4], "Азія");
        array_unshift($test[$iten->period]['6_14'][5], "Україна");


// 6_15---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_15']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_15'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Iндекс'];

        array_unshift($test[$iten->period]['6_15'], $arrr);
        array_unshift($test[$iten->period]['6_15'][1], "Період - 15");
        array_unshift($test[$iten->period]['6_15'][2], "Період - 16");
        array_unshift($test[$iten->period]['6_15'][3], "Період - 17");
        array_unshift($test[$iten->period]['6_15'][4], "Період - 18");



// 6_16_1---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_16_1']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_16_1'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи','Пн. Америки','Пд. Америки','Азії','Внут. ринок'];

        array_unshift($test[$iten->period]['6_16_1'], $arrr);
        array_unshift($test[$iten->period]['6_16_1'][1], "Підприємство - 1");
        array_unshift($test[$iten->period]['6_16_1'][2], "Підприємство - 2");
        array_unshift($test[$iten->period]['6_16_1'][3], "Підприємство - 3");
        array_unshift($test[$iten->period]['6_16_1'][4], "Підприємство - 4");
        array_unshift($test[$iten->period]['6_16_1'][5], "Підприємство - 5");
        array_unshift($test[$iten->period]['6_16_1'][6], "Підприємство - 6");
        array_unshift($test[$iten->period]['6_16_1'][7], "Підприємство - 7");
        array_unshift($test[$iten->period]['6_16_1'][8], "Підприємство - 8");
        array_unshift($test[$iten->period]['6_16_1'][9], "Підприємство - 9");
        array_unshift($test[$iten->period]['6_16_1'][10],"Підприємство - 10");


// 6_16_2---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_16_2']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_16_2'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи','Пн. Америки','Пд. Америки','Азії','Внут. ринок'];

        array_unshift($test[$iten->period]['6_16_2'], $arrr);
        array_unshift($test[$iten->period]['6_16_2'][1], "Підприємство - 1");
        array_unshift($test[$iten->period]['6_16_2'][2], "Підприємство - 2");
        array_unshift($test[$iten->period]['6_16_2'][3], "Підприємство - 3");
        array_unshift($test[$iten->period]['6_16_2'][4], "Підприємство - 4");
        array_unshift($test[$iten->period]['6_16_2'][5], "Підприємство - 5");
        array_unshift($test[$iten->period]['6_16_2'][6], "Підприємство - 6");
        array_unshift($test[$iten->period]['6_16_2'][7], "Підприємство - 7");
        array_unshift($test[$iten->period]['6_16_2'][8], "Підприємство - 8");
        array_unshift($test[$iten->period]['6_16_2'][9], "Підприємство - 9");
        array_unshift($test[$iten->period]['6_16_2'][10],"Підприємство - 10");

// 6_16_3---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_16_3']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_16_3'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи','Пн. Америки','Пд. Америки','Азії','Внут. ринок'];

        array_unshift($test[$iten->period]['6_16_3'], $arrr);
        array_unshift($test[$iten->period]['6_16_3'][1], "Підприємство - 1");
        array_unshift($test[$iten->period]['6_16_3'][2], "Підприємство - 2");
        array_unshift($test[$iten->period]['6_16_3'][3], "Підприємство - 3");
        array_unshift($test[$iten->period]['6_16_3'][4], "Підприємство - 4");
        array_unshift($test[$iten->period]['6_16_3'][5], "Підприємство - 5");
        array_unshift($test[$iten->period]['6_16_3'][6], "Підприємство - 6");
        array_unshift($test[$iten->period]['6_16_3'][7], "Підприємство - 7");
        array_unshift($test[$iten->period]['6_16_3'][8], "Підприємство - 8");
        array_unshift($test[$iten->period]['6_16_3'][9], "Підприємство - 9");
        array_unshift($test[$iten->period]['6_16_3'][10],"Підприємство - 10");




// 6_17_1---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_17_1']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_17_1'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи','Пн. Америки','Пд. Америки','Азії','Внут. ринок'];

        array_unshift($test[$iten->period]['6_17_1'], $arrr);
        array_unshift($test[$iten->period]['6_17_1'][1], "Підприємство - 1");
        array_unshift($test[$iten->period]['6_17_1'][2], "Підприємство - 2");
        array_unshift($test[$iten->period]['6_17_1'][3], "Підприємство - 3");
        array_unshift($test[$iten->period]['6_17_1'][4], "Підприємство - 4");
        array_unshift($test[$iten->period]['6_17_1'][5], "Підприємство - 5");
        array_unshift($test[$iten->period]['6_17_1'][6], "Підприємство - 6");
        array_unshift($test[$iten->period]['6_17_1'][7], "Підприємство - 7");
        array_unshift($test[$iten->period]['6_17_1'][8], "Підприємство - 8");
        array_unshift($test[$iten->period]['6_17_1'][9], "Підприємство - 9");
        array_unshift($test[$iten->period]['6_17_1'][10],"Підприємство - 10");


// 6_17_2---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_17_2']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_17_2'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи','Пн. Америки','Пд. Америки','Азії','Внут. ринок'];

        array_unshift($test[$iten->period]['6_17_2'], $arrr);
        array_unshift($test[$iten->period]['6_17_2'][1], "Підприємство - 1");
        array_unshift($test[$iten->period]['6_17_2'][2], "Підприємство - 2");
        array_unshift($test[$iten->period]['6_17_2'][3], "Підприємство - 3");
        array_unshift($test[$iten->period]['6_17_2'][4], "Підприємство - 4");
        array_unshift($test[$iten->period]['6_17_2'][5], "Підприємство - 5");
        array_unshift($test[$iten->period]['6_17_2'][6], "Підприємство - 6");
        array_unshift($test[$iten->period]['6_17_2'][7], "Підприємство - 7");
        array_unshift($test[$iten->period]['6_17_2'][8], "Підприємство - 8");
        array_unshift($test[$iten->period]['6_17_2'][9], "Підприємство - 9");
        array_unshift($test[$iten->period]['6_17_2'][10],"Підприємство - 10");

// 6_17_3---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_17_3']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_17_3'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи','Пн. Америки','Пд. Америки','Азії','Внут. ринок'];

        array_unshift($test[$iten->period]['6_17_3'], $arrr);
        array_unshift($test[$iten->period]['6_17_3'][1], "Підприємство - 1");
        array_unshift($test[$iten->period]['6_17_3'][2], "Підприємство - 2");
        array_unshift($test[$iten->period]['6_17_3'][3], "Підприємство - 3");
        array_unshift($test[$iten->period]['6_17_3'][4], "Підприємство - 4");
        array_unshift($test[$iten->period]['6_17_3'][5], "Підприємство - 5");
        array_unshift($test[$iten->period]['6_17_3'][6], "Підприємство - 6");
        array_unshift($test[$iten->period]['6_17_3'][7], "Підприємство - 7");
        array_unshift($test[$iten->period]['6_17_3'][8], "Підприємство - 8");
        array_unshift($test[$iten->period]['6_17_3'][9], "Підприємство - 9");
        array_unshift($test[$iten->period]['6_17_3'][10],"Підприємство - 10");



// 6_18_1---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_18_1']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_18_1'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи','Пн. Америки','Пд. Америки','Азії','Внут. ринок'];

        array_unshift($test[$iten->period]['6_18_1'], $arrr);
        array_unshift($test[$iten->period]['6_18_1'][1], "Підприємство - 1");
        array_unshift($test[$iten->period]['6_18_1'][2], "Підприємство - 2");
        array_unshift($test[$iten->period]['6_18_1'][3], "Підприємство - 3");
        array_unshift($test[$iten->period]['6_18_1'][4], "Підприємство - 4");
        array_unshift($test[$iten->period]['6_18_1'][5], "Підприємство - 5");
        array_unshift($test[$iten->period]['6_18_1'][6], "Підприємство - 6");
        array_unshift($test[$iten->period]['6_18_1'][7], "Підприємство - 7");
        array_unshift($test[$iten->period]['6_18_1'][8], "Підприємство - 8");
        array_unshift($test[$iten->period]['6_18_1'][9], "Підприємство - 9");
        array_unshift($test[$iten->period]['6_18_1'][10],"Підприємство - 10");


// 6_18_2---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_18_2']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_18_2'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи','Пн. Америки','Пд. Америки','Азії','Внут. ринок'];

        array_unshift($test[$iten->period]['6_18_2'], $arrr);
        array_unshift($test[$iten->period]['6_18_2'][1], "Підприємство - 1");
        array_unshift($test[$iten->period]['6_18_2'][2], "Підприємство - 2");
        array_unshift($test[$iten->period]['6_18_2'][3], "Підприємство - 3");
        array_unshift($test[$iten->period]['6_18_2'][4], "Підприємство - 4");
        array_unshift($test[$iten->period]['6_18_2'][5], "Підприємство - 5");
        array_unshift($test[$iten->period]['6_18_2'][6], "Підприємство - 6");
        array_unshift($test[$iten->period]['6_18_2'][7], "Підприємство - 7");
        array_unshift($test[$iten->period]['6_18_2'][8], "Підприємство - 8");
        array_unshift($test[$iten->period]['6_18_2'][9], "Підприємство - 9");
        array_unshift($test[$iten->period]['6_18_2'][10],"Підприємство - 10");

// 6_18_3---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_18_3']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_18_3'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи','Пн. Америки','Пд. Америки','Азії','Внут. ринок'];

        array_unshift($test[$iten->period]['6_18_3'], $arrr);
        array_unshift($test[$iten->period]['6_18_3'][1], "Підприємство - 1");
        array_unshift($test[$iten->period]['6_18_3'][2], "Підприємство - 2");
        array_unshift($test[$iten->period]['6_18_3'][3], "Підприємство - 3");
        array_unshift($test[$iten->period]['6_18_3'][4], "Підприємство - 4");
        array_unshift($test[$iten->period]['6_18_3'][5], "Підприємство - 5");
        array_unshift($test[$iten->period]['6_18_3'][6], "Підприємство - 6");
        array_unshift($test[$iten->period]['6_18_3'][7], "Підприємство - 7");
        array_unshift($test[$iten->period]['6_18_3'][8], "Підприємство - 8");
        array_unshift($test[$iten->period]['6_18_3'][9], "Підприємство - 9");
        array_unshift($test[$iten->period]['6_18_3'][10],"Підприємство - 10");


// 6_19---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_19']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_19'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Кількість, грн.'];

        array_unshift($test[$iten->period]['6_19'], $arrr);
        array_unshift($test[$iten->period]['6_19'][1], "Підприємство - 1");
        array_unshift($test[$iten->period]['6_19'][2], "Підприємство - 2");
        array_unshift($test[$iten->period]['6_19'][3], "Підприємство - 3");
        array_unshift($test[$iten->period]['6_19'][4], "Підприємство - 4");
        array_unshift($test[$iten->period]['6_19'][5], "Підприємство - 5");
        array_unshift($test[$iten->period]['6_19'][6], "Підприємство - 6");
        array_unshift($test[$iten->period]['6_19'][7], "Підприємство - 7");
        array_unshift($test[$iten->period]['6_19'][8], "Підприємство - 8");
        array_unshift($test[$iten->period]['6_19'][9], "Підприємство - 9");
        array_unshift($test[$iten->period]['6_19'][10],"Підприємство - 10");


// 6_20_1---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_20_1']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_20_1'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи','Пн. Америки','Пд. Америки','Азії','Внут. ринок'];

        array_unshift($test[$iten->period]['6_20_1'], $arrr);
        array_unshift($test[$iten->period]['6_20_1'][1], "Підприємство - 1");
        array_unshift($test[$iten->period]['6_20_1'][2], "Підприємство - 2");
        array_unshift($test[$iten->period]['6_20_1'][3], "Підприємство - 3");
        array_unshift($test[$iten->period]['6_20_1'][4], "Підприємство - 4");
        array_unshift($test[$iten->period]['6_20_1'][5], "Підприємство - 5");
        array_unshift($test[$iten->period]['6_20_1'][6], "Підприємство - 6");
        array_unshift($test[$iten->period]['6_20_1'][7], "Підприємство - 7");
        array_unshift($test[$iten->period]['6_20_1'][8], "Підприємство - 8");
        array_unshift($test[$iten->period]['6_20_1'][9], "Підприємство - 9");
        array_unshift($test[$iten->period]['6_20_1'][10],"Підприємство - 10");


// 6_20_2---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_20_2']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_20_2'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи','Пн. Америки','Пд. Америки','Азії','Внут. ринок'];

        array_unshift($test[$iten->period]['6_20_2'], $arrr);
        array_unshift($test[$iten->period]['6_20_2'][1], "Підприємство - 1");
        array_unshift($test[$iten->period]['6_20_2'][2], "Підприємство - 2");
        array_unshift($test[$iten->period]['6_20_2'][3], "Підприємство - 3");
        array_unshift($test[$iten->period]['6_20_2'][4], "Підприємство - 4");
        array_unshift($test[$iten->period]['6_20_2'][5], "Підприємство - 5");
        array_unshift($test[$iten->period]['6_20_2'][6], "Підприємство - 6");
        array_unshift($test[$iten->period]['6_20_2'][7], "Підприємство - 7");
        array_unshift($test[$iten->period]['6_20_2'][8], "Підприємство - 8");
        array_unshift($test[$iten->period]['6_20_2'][9], "Підприємство - 9");
        array_unshift($test[$iten->period]['6_20_2'][10],"Підприємство - 10");

// 6_20_3---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_20_3']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_20_3'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи','Пн. Америки','Пд. Америки','Азії','Внут. ринок'];

        array_unshift($test[$iten->period]['6_20_3'], $arrr);
        array_unshift($test[$iten->period]['6_20_3'][1], "Підприємство - 1");
        array_unshift($test[$iten->period]['6_20_3'][2], "Підприємство - 2");
        array_unshift($test[$iten->period]['6_20_3'][3], "Підприємство - 3");
        array_unshift($test[$iten->period]['6_20_3'][4], "Підприємство - 4");
        array_unshift($test[$iten->period]['6_20_3'][5], "Підприємство - 5");
        array_unshift($test[$iten->period]['6_20_3'][6], "Підприємство - 6");
        array_unshift($test[$iten->period]['6_20_3'][7], "Підприємство - 7");
        array_unshift($test[$iten->period]['6_20_3'][8], "Підприємство - 8");
        array_unshift($test[$iten->period]['6_20_3'][9], "Підприємство - 9");
        array_unshift($test[$iten->period]['6_20_3'][10],"Підприємство - 10");



// 6_21_1---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_21_1']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_21_1'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи','Пн. Америки','Пд. Америки','Азії','Внут. ринок'];

        array_unshift($test[$iten->period]['6_21_1'], $arrr);
        array_unshift($test[$iten->period]['6_21_1'][1], "Підприємство - 1");
        array_unshift($test[$iten->period]['6_21_1'][2], "Підприємство - 2");
        array_unshift($test[$iten->period]['6_21_1'][3], "Підприємство - 3");
        array_unshift($test[$iten->period]['6_21_1'][4], "Підприємство - 4");
        array_unshift($test[$iten->period]['6_21_1'][5], "Підприємство - 5");
        array_unshift($test[$iten->period]['6_21_1'][6], "Підприємство - 6");
        array_unshift($test[$iten->period]['6_21_1'][7], "Підприємство - 7");
        array_unshift($test[$iten->period]['6_21_1'][8], "Підприємство - 8");
        array_unshift($test[$iten->period]['6_21_1'][9], "Підприємство - 9");
        array_unshift($test[$iten->period]['6_21_1'][10],"Підприємство - 10");


// 6_21_2---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_21_2']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_21_2'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи','Пн. Америки','Пд. Америки','Азії','Внут. ринок'];

        array_unshift($test[$iten->period]['6_21_2'], $arrr);
        array_unshift($test[$iten->period]['6_21_2'][1], "Підприємство - 1");
        array_unshift($test[$iten->period]['6_21_2'][2], "Підприємство - 2");
        array_unshift($test[$iten->period]['6_21_2'][3], "Підприємство - 3");
        array_unshift($test[$iten->period]['6_21_2'][4], "Підприємство - 4");
        array_unshift($test[$iten->period]['6_21_2'][5], "Підприємство - 5");
        array_unshift($test[$iten->period]['6_21_2'][6], "Підприємство - 6");
        array_unshift($test[$iten->period]['6_21_2'][7], "Підприємство - 7");
        array_unshift($test[$iten->period]['6_21_2'][8], "Підприємство - 8");
        array_unshift($test[$iten->period]['6_21_2'][9], "Підприємство - 9");
        array_unshift($test[$iten->period]['6_21_2'][10],"Підприємство - 10");

// 6_21_3---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_21_3']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_21_3'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи','Пн. Америки','Пд. Америки','Азії','Внут. ринок'];

        array_unshift($test[$iten->period]['6_21_3'], $arrr);
        array_unshift($test[$iten->period]['6_21_3'][1], "Підприємство - 1");
        array_unshift($test[$iten->period]['6_21_3'][2], "Підприємство - 2");
        array_unshift($test[$iten->period]['6_21_3'][3], "Підприємство - 3");
        array_unshift($test[$iten->period]['6_21_3'][4], "Підприємство - 4");
        array_unshift($test[$iten->period]['6_21_3'][5], "Підприємство - 5");
        array_unshift($test[$iten->period]['6_21_3'][6], "Підприємство - 6");
        array_unshift($test[$iten->period]['6_21_3'][7], "Підприємство - 7");
        array_unshift($test[$iten->period]['6_21_3'][8], "Підприємство - 8");
        array_unshift($test[$iten->period]['6_21_3'][9], "Підприємство - 9");
        array_unshift($test[$iten->period]['6_21_3'][10],"Підприємство - 10");


// 6_22_1---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_22_1']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_22_1'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи','Пн. Америки','Пд. Америки','Азії','Внут. ринок'];

        array_unshift($test[$iten->period]['6_22_1'], $arrr);
        array_unshift($test[$iten->period]['6_22_1'][1], "Підприємство - 1");
        array_unshift($test[$iten->period]['6_22_1'][2], "Підприємство - 2");
        array_unshift($test[$iten->period]['6_22_1'][3], "Підприємство - 3");
        array_unshift($test[$iten->period]['6_22_1'][4], "Підприємство - 4");
        array_unshift($test[$iten->period]['6_22_1'][5], "Підприємство - 5");
        array_unshift($test[$iten->period]['6_22_1'][6], "Підприємство - 6");
        array_unshift($test[$iten->period]['6_22_1'][7], "Підприємство - 7");
        array_unshift($test[$iten->period]['6_22_1'][8], "Підприємство - 8");
        array_unshift($test[$iten->period]['6_22_1'][9], "Підприємство - 9");
        array_unshift($test[$iten->period]['6_22_1'][10],"Підприємство - 10");


// 6_22_2---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_22_2']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_22_2'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи','Пн. Америки','Пд. Америки','Азії','Внут. ринок'];

        array_unshift($test[$iten->period]['6_22_2'], $arrr);
        array_unshift($test[$iten->period]['6_22_2'][1], "Підприємство - 1");
        array_unshift($test[$iten->period]['6_22_2'][2], "Підприємство - 2");
        array_unshift($test[$iten->period]['6_22_2'][3], "Підприємство - 3");
        array_unshift($test[$iten->period]['6_22_2'][4], "Підприємство - 4");
        array_unshift($test[$iten->period]['6_22_2'][5], "Підприємство - 5");
        array_unshift($test[$iten->period]['6_22_2'][6], "Підприємство - 6");
        array_unshift($test[$iten->period]['6_22_2'][7], "Підприємство - 7");
        array_unshift($test[$iten->period]['6_22_2'][8], "Підприємство - 8");
        array_unshift($test[$iten->period]['6_22_2'][9], "Підприємство - 9");
        array_unshift($test[$iten->period]['6_22_2'][10],"Підприємство - 10");

// 6_22_3---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_22_3']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_22_3'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи','Пн. Америки','Пд. Америки','Азії','Внут. ринок'];

        array_unshift($test[$iten->period]['6_22_3'], $arrr);
        array_unshift($test[$iten->period]['6_22_3'][1], "Підприємство - 1");
        array_unshift($test[$iten->period]['6_22_3'][2], "Підприємство - 2");
        array_unshift($test[$iten->period]['6_22_3'][3], "Підприємство - 3");
        array_unshift($test[$iten->period]['6_22_3'][4], "Підприємство - 4");
        array_unshift($test[$iten->period]['6_22_3'][5], "Підприємство - 5");
        array_unshift($test[$iten->period]['6_22_3'][6], "Підприємство - 6");
        array_unshift($test[$iten->period]['6_22_3'][7], "Підприємство - 7");
        array_unshift($test[$iten->period]['6_22_3'][8], "Підприємство - 8");
        array_unshift($test[$iten->period]['6_22_3'][9], "Підприємство - 9");
        array_unshift($test[$iten->period]['6_22_3'][10],"Підприємство - 10");


// 6_23---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_23']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_23'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Кількість, т'];

        array_unshift($test[$iten->period]['6_23'], $arrr);
        array_unshift($test[$iten->period]['6_23'][1], "Підприємство - 1");
        array_unshift($test[$iten->period]['6_23'][2], "Підприємство - 2");
        array_unshift($test[$iten->period]['6_23'][3], "Підприємство - 3");
        array_unshift($test[$iten->period]['6_23'][4], "Підприємство - 4");
        array_unshift($test[$iten->period]['6_23'][5], "Підприємство - 5");
        array_unshift($test[$iten->period]['6_23'][6], "Підприємство - 6");
        array_unshift($test[$iten->period]['6_23'][7], "Підприємство - 7");
        array_unshift($test[$iten->period]['6_23'][8], "Підприємство - 8");
        array_unshift($test[$iten->period]['6_23'][9], "Підприємство - 9");
        array_unshift($test[$iten->period]['6_23'][10],"Підприємство - 10");




// 6_24---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_24']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_24'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Європи','Пн. Америки','Пд. Америки','Азії','Внут. ринок'];

        array_unshift($test[$iten->period]['6_24'], $arrr);
        array_unshift($test[$iten->period]['6_24'][1], "Підприємство - 1");
        array_unshift($test[$iten->period]['6_24'][2], "Підприємство - 2");
        array_unshift($test[$iten->period]['6_24'][3], "Підприємство - 3");
        array_unshift($test[$iten->period]['6_24'][4], "Підприємство - 4");
        array_unshift($test[$iten->period]['6_24'][5], "Підприємство - 5");
        array_unshift($test[$iten->period]['6_24'][6], "Підприємство - 6");
        array_unshift($test[$iten->period]['6_24'][7], "Підприємство - 7");
        array_unshift($test[$iten->period]['6_24'][8], "Підприємство - 8");
        array_unshift($test[$iten->period]['6_24'][9], "Підприємство - 9");
        array_unshift($test[$iten->period]['6_24'][10],"Підприємство - 10");

// 6_25---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_25']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_25'][$q] = $ar;

            $q++;
        }
        $arrr = ['', '50 кг-мішки','Мішки типу ’Біг-Бег’','Природний газ'];

        array_unshift($test[$iten->period]['6_25'], $arrr);
        array_unshift($test[$iten->period]['6_25'][1], "Період - 15");
        array_unshift($test[$iten->period]['6_25'][2], "Період - 16");

// 6_26---------------------------------------------------------------------------------------------------------
        $q = 1;
        $arr = explode(':', $item['6_26']);
        foreach ($arr as $iteV) {
            $ar = explode(';', $iteV);
            $test[$iten->period]['6_26'][$q] = $ar;

            $q++;
        }
        $arrr = ['', 'Дол. США','Євро','Kит. юані'];

        array_unshift($test[$iten->period]['6_26'], $arrr);
        array_unshift($test[$iten->period]['6_26'][1], "НБУ");
        array_unshift($test[$iten->period]['6_26'][2], "Ринковий курс");


    }

}





        $count_period=[];
        for($q=1;$sum_period>=$q;$q++) {

            if ($q == $after_period) {
                $count_period[$q]['value'] = $q;
                $count_period[$q]['action'] = true;
                $count_period[$q]['show'] = true;
            } else {
                $count_period[$q]['value'] = $q;
                $count_period[$q]['action'] = false;
                $count_period[$q]['show'] = false;
            }


        }


        $name_firm=$player->firm_name;

        return view('cabinet.game', array(
            'test' =>$test,
            'period' => $period,
            'count_period' => $count_period,
            'sum_period' => $sum_period,
            'after_period' => $after_period,
            'id' => $id,
            'name_firm' => $name_firm,
            'player_id' => $player_id,


        ));








    }


    public function register_game_in_room(Request $request)
    {

$test=Information_TIB::where('game_id',$request['game_id'])
    ->where('player_id',$request['player_id'])
    ->where('perioud_number',$request['perioud_number'])->first();

if(empty($test)) {
    $inf = new Information_TIB();
    $inf->game_id = $request['game_id'];
    $inf->player_id = $request['player_id'];
    $inf->perioud_number = $request['perioud_number'];
    $inf->_1_purchase_ammonia_equipment_of_ukr_m = $request['ammonia'][0]['value'];
    $inf->_2_sell_ammonia_equipment_of_ukr_m = $request['ammonia'][1]['value'];
    $inf->_3_purchase_ammonia_equipment_of_eu_m = $request['ammonia'][2]['value'];
    $inf->_4_sell_ammonia_equipment_of_eu_m = $request['ammonia'][3]['value'];
    $inf->_5_purchase_ammonia_equipment_of_the_japanese_m = $request['ammonia'][4]['value'];
    $inf->_6_sell_ammonia_equipment_of_the_japanese_m = $request['ammonia'][5]['value'];
//    $inf->_7_purchase_equipment_for_an = $request['data'][6]['value'];
//    $inf->_8_sell_equipment_for_an = $request['data'][7]['value'];
//    $inf->_name9 = $request['data'][8]['value'];
//    $inf->_name10 = $request['data'][9]['value'];
//    $inf->_name11 = $request['data'][10]['value'];
//    $inf->_name12 = $request['data'][11]['value'];
//    $inf->_13_purchase_equipment_for_c = $request['data'][12]['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//    $inf->_14_sell_equipment_for_c = $request['data'][13]['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//    $inf->_name15 = $request['data'][14]['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//    $inf->_name16 = $request['data'][15]['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//    $inf->_name17 = $request['data'][16]['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//    $inf->_name18 = $request['data'][17]['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//    $inf->_19_purchase_equipment_for_uan = $request['data'][18]['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//    $inf->_20_sell_equipment_for_uan = $request['data'][19]['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//    $inf->_name21 = $request['data'][20]['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//    $inf->_name22 = $request['data'][21]['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//    $inf->_name23 = $request['data'][22]['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//    $inf->_name24 = $request['data'][23]['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//    $inf->_25_current_repair_equipment_ukr = $request['data'][24]['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//    $inf->_26_simple_repair_equipment_ukr = $request['data'][25]['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//    $inf->_27_full_repair_equipment_ukr = $request['data'][26]['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//    $inf->_28_current_repair_equipment_eu = $request['data'][27]['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//    $inf->_29_simple_repair_equipment_eu = $request['data'][28]['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//    $inf->_30_full_repair_equipment_eu = $request['data'][29]['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//    $inf->_31_current_repair_equipment_japan = $request['data'][30]['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//    $inf->_32_simple_repair_equipment_japan = $request['data'][31]['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//    $inf->_33_full_repair_equipment_japan = $request['data'][32]['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//    $inf->_34_employment_of_team = $request['data'][33]['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//    $inf->_35_dismissal_of_team = $request['data'][34]['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//    $inf->_36_purchase_of_natural_gas_30days = $request['data'][35]['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//    $inf->_37_purchase_of_natural_gas_60days = $request['data'][36]['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//    $inf->_name38 = $request['data'][37]['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//    $inf->_39_purchase_of_50kg_bags = $request['data'][38]['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//    $inf->_40_purchase_of_big_bags = $request['data'][39]['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//    $inf->_41_production_an = $request['data'][40]['_5_purchase_ammonia_equipment_of_the_japanese_m'];
    $inf->save();
    return 'сохранено';

//                $inf->_42_production_c=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//                $inf->_43_production_uan=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m_5_purchase_ammonia_equipment_of_the_japanese_m'];
//                $inf->_44_production_ammonia=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//                $inf->_45_packing_an_into_50kg=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//                $inf->_46_packing_an_into_big_bags=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//                $inf->_47_an_bulk=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//                $inf->_48_packing_c_into_50kg=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//                $inf->_49_packing_c_into_big_bags=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//                $inf->_50_c_bulk=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//                $inf->_51_packing_uan_into_50kg=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//                $inf->_52_packing_uan_into_big_bags=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//                $inf->_53_uan_bulk=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//                $inf->_54_deposit_for_2_periods=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//                $inf->_55_deposit_for_3_periods=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//                $inf->_56_deposit_for_4_periods=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//                $inf->_57_credit_for_3_periods=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//                $inf->_58_credit_for_5_periods=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//                $inf->_59_credit_for_7_periods=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//                $inf->_60_data_on_production=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//                $inf->_61_data_on_packin_an=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//                $inf->_62_data_on_packin_c=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//                $inf->_63_data_on_packin_uan=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//                $inf->_64_data_on_quality_of_an=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//                $inf->_65_data_on_quality_of_c=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//                $inf->_66_data_on_quality_of_uan=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//                $inf->_67_movement_of_an_prices=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//                $inf->_68_movement_of_c_prices=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//                $inf->_69_movement_of_uan_prices=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//                $inf->_70_movement_of_ammonia_prices=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//                $inf->_71_seasonal_index_of_an=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//                $inf->_72_seasonal_index_of_c=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//                $inf->_73_seasonal_index_of_uan=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//                $inf->_74_seasonal_index_of_amm=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//                $inf->_75_sales_volume_on_the_an_market=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//                $inf->_76_sales_volume_on_the_c_market=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//                $inf->_77_sales_volume_on_the_uan_market=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//                $inf->_78_sales_volume_on_the_amm_market=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//                $inf->_79_data_on_surpluses_of_unsold_an=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//
//                $inf->_82_data_on_surpluses_of_unsold_amm=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//               $inf->_83_competitors_expenses_for_advertising=$request['data']['n_5_purchase_ammonia_equipment_of_the_japanese_mame'];
//               $inf->_name84=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//               $inf->_name85=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//               $inf->_name86=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//               $inf->_name87=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//               $inf->_name88=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//               $inf->_name89=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//               $inf->_name90=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//               $inf->_91_consumer_lending_in_eu=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//             $inf->_92_consumer_lending_in_na=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//             $inf->_93_consumer_lending_in_sa=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//             $inf->_94_consumer_lending_in_asia=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];
//             $inf->_95_consumer_lending_in_ukr=$request['data']['_5_purchase_ammonia_equipment_of_the_japanese_m'];

//             $inf->_name96',value:''},
//             $inf->_name97',value:''},
//             $inf->_name98',value:''},
//             $inf->_name99',value:''},
//             $inf->_name100',value:''},
//             $inf->_101_transport_vol_c_to_eu_50kg_bags',value:''},
//             $inf->_102_transport_vol_c_to_eu_1000kg_bags',value:''},
//             $inf->_103_transport_vol_of_bulk_c_to_eu',value:''},
//             $inf->_104_prices_c_50kg_bags_on_eu',value:''},
//             $inf->_105_prices_c_1000kg_bags_on_eu',value:''},
//             $inf->_106_prices_for_bulk_c_on_eu',value:''},
//             $inf->_107_transport_vol_c_to_na_50kg_bags',value:''},
//             $inf->_108_transport_vol_c_to_na_1000kg_bags',value:''},
//             $inf->_109_transport_vol_of_bulk_c_to_na',value:''},
//             $inf->_110_prices_c_50kg_bags_on_na',value:''},
//             $inf->_111_prices_c_1000kg_bags_on_na',value:''},
//             $inf->_112_prices_for_bulk_c_on_na',value:''},
//             $inf->_113_transport_vol_c_to_sa_50kg_bags',value:''},
//             $inf->_114_transport_vol_c_to_sa_1000kg_bags',value:''},
//             $inf->_115_transport_vol_of_bulk_c_to_sa',value:''},
//             $inf->_116_prices_c_50kg_bags_on_sa',value:''},
//             $inf->_117_prices_c_1000kg_bags_on_sa',value:''},
//             $inf->_118_prices_for_bulk_c_on_sa',value:''},
//             $inf->_119_transport_vol_c_to_asia_50kg_bags',value:''},
//             $inf->_120_transport_vol_c_to_asia_1000kg_bags',value:''},
//             $inf->_121_transport_vol_of_bulk_c_to_asia',value:''},
//             $inf->_122_prices_c_50kg_bags_on_asia',value:''},
//             $inf->_123_prices_c_1000kg_bags_on_asia',value:''},
//             $inf->_124_prices_for_bulk_c_on_asia',value:''},
//             $inf->_125_transport_vol_c_to_ukr_50kg_bags',value:''},
//             $inf->_126_transport_vol_c_to_ukr_1000kg_bags',value:''},
//             $inf->_127_transport_vol_of_bulk_c_to_ukr',value:''},
//             $inf->_128_prices_c_50kg_bags_on_ukr',value:''},
//             $inf->_129_prices_c_1000kg_bags_on_ukr',value:''},
//             $inf->_130_prices_for_bulk_c_on_ukr',value:''},
//             $inf->_131_transport_vol_an_to_eu_50kg_bags',value:''},
//             $inf->_132_transport_vol_an_to_eu_1000kg_bags',value:''},
//             $inf->_133_transport_vol_of_bulk_an_to_eu',value:''},
//             $inf->_134_prices_an_50kg_bags_on_eu',value:''},
//             $inf->_135_prices_an_1000kg_bags_on_eu',value:''},
//             $inf->_136_prices_for_bulk_an_on_eu',value:''},
//             $inf->_137_transport_vol_an_to_na_50kg_bags',value:''},
//             $inf->_138_transport_vol_an_to_na_1000kg_bags',value:''},
//             {na_139_transport_vol_of_bulk_an_to_na',value:''},
//              {name:'_140_prices_an_50kg_bags_on_na',value:''},
//              {name:'_141_prices_an_1000kg_bags_on_na',value:''},
//              {name:'_142_prices_for_bulk_an_on_na',value:''},
//              {name:'_143_transport_vol_an_to_sa_50kg_bags',value:''},
//              {name:'_144_transport_vol_an_to_sa_1000kg_bags',value:''},
//              {name:'_145_transport_vol_of_bulk_an_to_sa',value:''},
//              {name:'_146_prices_an_50kg_bags_on_sa',value:''},
//              {name:'_147_prices_an_1000kg_bags_on_sa',value:''},
//              {name:'_148_prices_for_bulk_an_on_sa',value:''},
//              {name:'_149_transport_vol_an_to_asia_50kg_bags',value:''},
//              {name:'_150_transport_vol_an_to_asia_1000kg_bags',value:''},
//              {name:'_151_transport_vol_of_bulk_an_to_asia',value:''},
//              {name:'_152_prices_an_50kg_bags_on_asia',value:''},
//              {name:'_153_prices_an_1000kg_bags_on_asia',value:''},
//              {name:'_154_prices_for_bulk_an_on_asia',value:''},
//              {name:'_155_transport_vol_an_to_ukr_50kg_bags',value:''},
//              {name:'_156_transport_vol_an_to_ukr_1000kg_bags',value:''},
//              {name:'_157_transport_vol_of_bulk_an_to_ukr',value:''},
//              {name:'_158_prices_an_50kg_bags_on_ukr',value:''},
//              {name:'_159_prices_an_1000kg_bags_on_ukr',value:''},
//              {name:'_160_prices_for_bulk_an_on_ukr',value:''},
//              {name:'_161_transport_vol_uan_to_eu_50kg_bags',value:''},
//              {name:'_162_transport_vol_uan_to_eu_1000kg_bags',value:''},
//              {name:'_163_transport_vol_of_bulk_uan_to_eu',value:''},
//              {name:'_164_prices_uan_50kg_bags_on_eu',value:''},
//              {name:'_165_prices_uan_1000kg_bags_on_eu',value:''},
//              {name:'_166_prices_for_bulk_uan_on_eu',value:''},
//            {name:'_167_transport_vol_uan_to_na_50kg_bags',value:''},
//            {name:'_168_transport_vol_uan_to_na_1000kg_bags',value:''},
//            {name:'_169_transport_vol_of_bulk_uan_to_na',value:''},
//            {name:'_170_prices_uan_50kg_bags_on_na',value:''},
//            {name:'_171_prices_uan_1000kg_bags_on_na',value:''},
//            {name:'_172_prices_for_bulk_uan_on_na',value:''},
//            {name:'_173_transport_vol_uan_to_sa_50kg_bags',value:''},
//            {name:'_174_transport_vol_uan_to_sa_1000kg_bags',value:''},
//            {name:'_175_transport_vol_of_bulk_uan_to_sa',value:''},
//            {name:'176_prices_uan_50kg_bags_on_sa',value:''},
//            {name:'_177_prices_uan_1000kg_bags_on_sa',value:''},
//            {name:'_178_prices_for_bulk_uan_on_sa',value:''},
//            {name:'179_transport_vol_uan_to_asia_50kg_bags',value:''},
//            {name:'_180_transport_vol_uan_to_asia_1000kg_bags',value:''},
//            {name:'_181_transport_vol_of_bulk_uan_to_asia',value:''},
//            {name:'_182_prices_uan_50kg_bags_on_asia',value:''},
//            {name:'_183_prices_uan_1000kg_bags_on_asia',value:''},
//            {name:'_184_prices_for_bulk_uan_on_asia',value:''},
//            {name:'_185_transport_vol_uan_to_ukr_50kg_bags',value:''},
//            {name:'_186_transport_vol_uan_to_ukr_1000kg_bags',value:''},
//            {name:'_187_transport_vol_of_bulk_uan_to_ukr',value:''},
//            {name:'_188_prices_uan_50kg_bags_on_ukr',value:''},
//            {name:'_189_prices_uan_1000kg_bags_on_ukr',value:''},
//            {name:'_190_prices_for_bulk_uan_on_ukr',value:''},
//            {name:'_191_internet_advertising_eu',value:''},
//            {name:'_192_tv_advertising_ eu',value:''},
//            {name:'_193_madia_eu',value:''},
//            {name:'_194_radio_eu',value:''},
//             {name:'_195_spec_magazin_eu',value:''},
//             {name:'_196_exhibitions_eu',value:''},
//             {name:'_197_internet_advertising_na eu',value:''},
//             {name:'_198_tv_advertising_na',value:''},
//             {name:'_199_madia_na',value:''},
//             {name:'_200_radio_na',value:''},
//             {name:'_201_spec_magazin_na',value:''},
//             {name:'_202_exhibitions_na eu',value:''},
//             {name:'_203_internet_advertising_sa',value:''},
//             {name:'_204_tv_advertising_sa',value:''},
//             {name:'_205_madia_sa',value:''},
//             {name:'_206_radio_sa',value:''},
//             {name:'_207_spec_magazin_sa eu',value:''},
//             {name:'_208_exhibitions_sa',value:''},
//             {name:'_209_internet_advertising_asia',value:''},
//             {name:'_210_tv_advertising_asia',value:''},
//             {name:'_211_madia_asia',value:''},
//             {name:'_212_radio_asia eu',value:''},
//             {name:'_213_spec_magazin_asia',value:''},
//             {name:'_214_exhibitions_asia',value:''},
//             {name:'_215_internet_advertising_ukr',value:''},
//             {name:'_216_tv_advertising_ukr',value:''},
//            {name:'_217_madia_ukr eu',value:''},
//            {name:'_218_radio_ukr',value:''},
//            {name:'_219_spec_magazin_ukr',value:''},
//            {name:'_220_exhibitions_ukr',value:''},
//            {name:'_221_chartering_of_vessels_to_eu',value:''},
//            {name:'_222_chartering_of_vessels_to_na eu',value:''},
//            {name:'_223_chartering_of_vessels_to_sa',value:''},
//            {name:'_224_chartering_of_vessels_to_asia',value:''},
//           {name:'_name225',value:''},
//           {name: '_226_transport_vol_of_marketable_ammonia',value:''},
//           {name: '_227_price_for_ammonia eu',value:''},
//           {name: '_228_dividends',value:''},
//           {name: '_229_share_issue',value:''},
//           {name: '_230_purchase_of_shares',value:''},
//           {name:'_name231',value:''},
//           {name:'_name232',value:''},
//           {name:'_name233',value:''},
//           {name:'_name234',value:''},
//           {name:'_name235',value:''},
//           {name: '_236_distribution_network_in_european',value:''},
//           {name: '_237_distribution_network_in_na',value:''},
//           {name: '_238_distribution_network_in_sa',value:''},
//           {name: '_239_distribution_network_in_asia',value:''},
//           {name: '_240_distribution_network_in_ukraine',value:''},
//           {name: '_241_quality_of_an',value:''},
//           {name: '_242_quality_of_c',value:''},
//           {name: '_243_quality_of_uan',value:''}
} else{
    $inf =Information_TIB::find($test->id);

    $inf->game_id = $request['game_id'];
    $inf->player_id = $request['player_id'];
    $inf->perioud_number = $request['perioud_number'];
    $inf->_1_purchase_ammonia_equipment_of_ukr_m = $request['ammonia'][0]['value'];
    $inf->_2_sell_ammonia_equipment_of_ukr_m = $request['ammonia'][1]['value'];
    $inf->_3_purchase_ammonia_equipment_of_eu_m = $request['ammonia'][2]['value'];
    $inf->_4_sell_ammonia_equipment_of_eu_m = $request['ammonia'][3]['value'];
    $inf->_5_purchase_ammonia_equipment_of_the_japanese_m = $request['ammonia'][4]['value'];
    $inf->_6_sell_ammonia_equipment_of_the_japanese_m = $request['ammonia'][5]['value'];
    $inf->save();
    return 'исправлено';
}








    }

    public function create_game($id)
    {

        return view('cabinet.create_game', array(
            'id' => $id,

        ));
    }
    public function create_game_post(Request $request)
    {

        $user=User::find(Auth::user()->id);
        $price=$user->money=$user->money-$request['data']['price_game'];
        if($price<0){
            return 'у вас не достатньо коштів';
        }else{
        $user->save();


//        Game::create($request['data']);


        $mqc=new Game();
        $mqc->name=$request['data']['name'];
        $mqc->type=$request['data']['type'];
        $mqc->time_start=$request['data']['time_start'];
        $mqc->period_hours=$request['data']['period_hours'];
        $mqc->price_game=$request['data']['price_game'];
        $mqc->game_status=$request['data']['game_status'];
        $mqc->creator_id=$request['data']['creator_id'];
        $mqc->sum_period=$request['data']['sum_period'];
        $mqc->save();


        $player=new Player();
        $player->user_id=$request['data']['creator_id'];
        $player->game_id=$mqc->id;
        $player->firm_name=$request['firm_name'];
         $player->status='sss';
        $player->save();



//if($req){
    return "ГРУ СТВОРЕНО УСПІШНО";
        }
//}


    }

    public function register_game(Request $request)
    {
//        сделать проверку

if(Player::where('game_id',$request['data']['game_id'])->count()<10) {
    $user=User::find(Auth::user()->id);
    $user->money=$user->money-$request['price'];
    $user->save();
    if(Player::where('game_id',$request['data']['game_id'])->count()==9) {
     $game=Game::find($request['data']['game_id']);
     $game->game_status='wait_start';
     $game->save();
    $req = Player::create($request['data']);
        return Game::find($request['data']['game_id']);
    }else{
        $req = Player::create($request['data']);
        return Game::find($request['data']['game_id']);
    }
}else{
    return 'not';
}
    }
    public function money_transfer()
    {


        return view('cabinet.money_transfer', array(

        ));
    }

    public function test()
    {

        $date = new DateTime();
        $kiev = new DateTimeZone('Europe/Kiev');
        $date->setTimezone($kiev);
        $curent_data_time = $date->format('Y-m-d H:i:s');

        $games = Game::all();

        foreach ($games as $item) {

            $count_player=Player::where('game_id',$item->id)->count();
            if($count_player==10){
                $game=Game::find($item->id);
                $game->game_status='wait_start';
                $game->save();
            }



            $after_period = 0;
            $data_time_start=$item->time_start;
            $period_hours=$item->period_hours;
            $sum_period=$item->sum_period;

            while (strtotime($curent_data_time) > strtotime($data_time_start)) {


                $time = strtotime($data_time_start) + 3600 * $period_hours; // Add 1 hour

                $data_time_start = date('Y-m-d H:i:s', $time); // Back to string






                if ($after_period < $sum_period && strtotime($curent_data_time) > strtotime($data_time_start)) {
                    $after_period++;
                    $times = strtotime($curent_data_time) - strtotime($data_time_start);
//                    $times = date('H:i:s', $times); // Back to string
                } else {
                    break;
                }

            }

            if($after_period < $sum_period){

                if($times>420){

                    $game=Game::find($item->id);
                    $game->game_status='wait_decidion';
                    $game->curent_period=$after_period+1;
                    $game->save();

                }
                if(3600 * $period_hours-$times<420){
                    $game=Game::find($item->id);
                    $game->game_status='wait_result';
                    $game->curent_period=$after_period+1;
                    $game->save();
                }
            }else{
                $game=Game::find($item->id);
                $game->game_status='finish';
                $game->curent_period=$after_period;
                $game->save();
            }





            $count_player=Player::where('game_id',$item->id)->count();
            $after_period++;
            $count_tibs=Information_TIB::where('game_id',$item->id)->where('perioud_number',$after_period)->count();

            if($count_player==$count_tibs){
                $game=Game::find($item->id);
                $game->game_status='wait_result';
                $game->curent_period=$after_period+1;
                $game->save();
            }


        }


    }

}