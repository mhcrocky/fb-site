<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Http;
use App\Http\Traits\Notify;
use App\Models\BetInvest;
use App\Models\GameOption;
use App\Models\GameQuestions;
use App\Models\GameTeam;
use App\Models\GameMatch;
use App\Models\GameTournament;
use Illuminate\Console\Command;
use Carbon\Carbon;
use Facades\App\Services\BasicService;
class CronAPI extends Command
{
    use Notify;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cronapi:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cron for api status';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $start_time = Carbon::now();

        GameTeam::where('status',1)->update(['status'=>2]);
        echo ".";
        GameMatch::where('status',1)->update(['status'=>2]);
        echo ".";
        GameOption::where('status',1)->update(['status'=>2]);
        echo ".";
        GameQuestions::where('status',1)->update(['status'=>2]);
        echo ".";
        GameTournament::where('status',1)->update(['status'=>2]);
        echo "\n";
        ///save league data
        $response = Http::withHeaders([
            'x-rapidapi-host' => 'v3.football.api-sports.io',
            'x-rapidapi-key' => env('FOOTBALL_API_KEY')
        ])->get('https://v3.football.api-sports.io/leagues', [
            'season' => '2022',
            'current'=>"true",
            'country'=>'world',
            'type'=>'cup'
        ]);
        $leagues = json_decode($response->body())->response;
        $list = [];
        if( date('d') == 31 || (date('m') == 1 && date('d') > 28)){
            $date = strtotime('last day of next month');
        } else {
            $date = strtotime('+1 months');
        }
        foreach ($leagues as $item) {
            $response = Http::withHeaders([
                'x-rapidapi-host' => 'v3.football.api-sports.io',
                'x-rapidapi-key' => env('FOOTBALL_API_KEY')
            ])->get('https://v3.football.api-sports.io/fixtures',[
                'from'=> date("Y-m-d"),
                'to'=>date('Y-m-d', $date),
                'season'=>date("Y"),
                'league' => $item->league->id
            ]);
            // league has odd marker
            $is_odds = false;
            $fixtures = json_decode($response->body())->response;
            if(count($fixtures)){
                //match has created marker
                $is_created_match = false;

                foreach ($fixtures as $fixture) {
                    #check match has odds
                    $odds = Http::withHeaders([
                        'x-rapidapi-host' => 'v3.football.api-sports.io',
                        'x-rapidapi-key' => env('FOOTBALL_API_KEY')
                    ])->get('https://v3.football.api-sports.io/odds',[
                        'fixture'=>$fixture->fixture->id,
                        'bookmaker'=>8
                    ]);
                    $odddata = json_decode($odds->body())->response;
                    if(count($odddata)){
                        ////////////////////////////
                        if(!$is_created_match){
                            GameTournament::updateOrCreate([
                                'id'=>$item->league->id,
                            ],[
                                'id'=>$item->league->id,
                                'name'=>$item->league->name,
                                'category_id'=>'1',
                                'status'=>1
                            ]);
                        }
                        //save teams and match and odds
                        $bets = $odddata[0]->bookmakers[0]->bets;
                        GameTeam::updateOrCreate([
                            'id'=>$fixture->teams->home->id,
                        ],[
                            'id'=>$fixture->teams->home->id,
                            'name'=>$fixture->teams->home->name,
                            'image'=>$fixture->teams->home->logo,
                            'category_id'=>'1',
                            'status'=>1
                        ]);
                        GameTeam::updateOrCreate([
                            'id'=>$fixture->teams->away->id,
                        ],[
                            'id'=>$fixture->teams->away->id,
                            'name'=>$fixture->teams->away->name,
                            'image'=>$fixture->teams->away->logo,
                            'category_id'=>'1',
                            'status'=>1
                        ]);
                        // dd($fixture);
                        GameMatch::updateOrCreate([
                            'id'=>$fixture->fixture->id,
                        ],[
                            'id'=>$fixture->fixture->id,
                            'team1_id'=>$fixture->teams->home->id,
                            'team2_id'=>$fixture->teams->away->id,
                            'start_date'=>date( "Y-m-d H-m-s",$fixture->fixture->timestamp),
                            'end_date'=>date( "Y-m-d H-m-s",$fixture->fixture->timestamp),
                            'category_id'=>'1',
                            'tournament_id'=>$fixture->league->id,
                            'status'=>1,
                            'is_unlock'=>1
                        ]);
                        $this->info($item->league->name."---".date( "Y-m-d H-m-s",$fixture->fixture->timestamp)."-----".$fixture->teams->home->name."---vs---".$fixture->teams->away->name);
                        foreach ($bets as $bet) {
                            // if(in_array($bet->id,[1,2,3,27,8,11,12,13,13,14,15,32])){
                                $question = GameQuestions::updateOrCreate([
                                    'match_id'=>$fixture->fixture->id,
                                    'name'=>$bet->name
                                ],[
                                    'match_id'=>$fixture->fixture->id,
                                    'creator_id'=>'1',
                                    'name'=>$bet->name,
                                    'status'=>'1',
                                    'end_time'=>date( "Y-m-d H-m-s",$fixture->fixture->timestamp)
                                ]);

                                foreach ($bet->values as $value) {
                                    echo ".";
                                    GameOption::updateOrCreate([
                                        'match_id'=>$fixture->fixture->id,
                                        'question_id'=>$question->id,
                                        'option_name'=>$value->value
                                    ],[
                                        'match_id'=>$fixture->fixture->id,
                                        'question_id'=>$question->id,
                                        'option_name'=>$value->value,
                                        'creator_id'=>'1',
                                        'ratio'=>$value->odd,
                                        'status'=>1
                                    ]);
                                }
                            // }
                            // dd($bet->values);
                        }
                        echo "\n";
                        //end save teams and match and odds
                    }else{
                        $this->comment($item->league->name."---".$item->league->id."---".date( "Y-m-d H-m-s",$fixture->fixture->timestamp)."---".$fixture->fixture->id."---".$fixture->teams->home->name."---vs---".$fixture->teams->away->name);
                    }
                    // dd($item,$odddata,$fixture);
                }
            }
            else{
            }
        }
        foreach ($list as $item) {
        }
        ///end save league data
        $end_time = Carbon::now();
        $start_time->diff($end_time)->format('%H:%I:%S');
        $this->info('Started at=========>'.$start_time);
        $this->info('Ended at===========>'.$end_time);
        $this->info("Duration====>".$start_time->diff($end_time)->format('%H:%I:%S'));
    }

}
