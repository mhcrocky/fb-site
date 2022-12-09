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

        ///save league data
        $response = Http::withHeaders([
            'x-rapidapi-host' => 'v3.football.api-sports.io',
            'x-rapidapi-key' => env('FOOTBALL_API_KEY')
        ])->get('https://v3.football.api-sports.io/leagues', [
            'season' => '2022',
            'current'=>"true",
        ]);
        echo "Start work-------------------------------->\n";
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
            echo "league name --------------->".$item->league->name;
            // league has odd marker
            $is_odds = false;
            $fixtures = json_decode($response->body())->response;
            if(count($fixtures)){
                echo "--->has fixture data\n";
                //match has created marker
                $is_created_match = false;

                foreach ($fixtures as $fixture) {
                    echo "match name--------------->".$fixture->fixture->id;
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
                        echo "------->has ODD data\n";
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
                            'start_date'=>date( "y-m-d h-m-s",$fixture->fixture->timestamp),
                            'end_date'=>date( "y-m-d h-m-s",$fixture->fixture->timestamp),
                            'category_id'=>'1',
                            'tournament_id'=>$fixture->league->id,
                            'status'=>1,
                            'is_unlock'=>1
                        ]);
                        echo 'save odd data';
                        foreach ($bets as $bet) {
                            echo $bet->name;
                            if(in_array($bet->id,[1,2,3,27,8,11,12,13,13,14,15,32])){
                                $question = GameQuestions::updateOrCreate([
                                    'match_id'=>$fixture->fixture->id,
                                    'name'=>$bet->name
                                ],[
                                    'match_id'=>$fixture->fixture->id,
                                    'creator_id'=>'1',
                                    'name'=>$bet->name,
                                    'status'=>'1',
                                    'end_time'=>date( "y-m-d h-m-s",$fixture->fixture->timestamp)
                                ]);

                                foreach ($bet->values as $value) {
                                    echo '.';
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
                            }
                            echo "\n";
                            // dd($bet->values);
                        }
                        //end save teams and match and odds
                    }else{
                        echo "---------no odd data\n";
                    }
                    // dd($item,$odddata,$fixture);
                }
            }
            else{
                echo "---------no fixture data\n";
            }
        }
        foreach ($list as $item) {
        }
        ///end save league data

        $this->info('status');
    }

}
