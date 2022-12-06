@php
use Illuminate\Support\Facades\Http;
use App\Models\Settings;
//     $segments = request()->segments();
//     $last  = end($segments);
//     ///api call
//     $response = Http::withHeaders([
//         'x-rapidapi-host' => 'v3.football.api-sports.io',
//         'x-rapidapi-key' => 'ffb34956934ed4e7b7061f74afa17034'
//     ])->get('https://v3.football.api-sports.io/leagues', [
//         'season' => '2022',
//         'type' =>'cup',
//         'current'=>"true",
//         'country'=>'World'
//     ]);
//     $leagues = json_decode($response->body())->response;
//     $list = [];
//     if( date('d') == 31 || (date('m') == 1 && date('d') > 28)){
//         $date = strtotime('last day of next month');
//     } else {
//         $date = strtotime('+1 months');
//     }
//  $leagues = json_decode($response->body())->response;
//     $list = [];
//     if( date('d') == 31 || (date('m') == 1 && date('d') > 28)){
//         $date = strtotime('last day of next month');
//     } else {
//         $date = strtotime('+1 months');
//     }
//     foreach ($leagues as $item) {
//         $response = Http::withHeaders([
//             'x-rapidapi-host' => 'v3.football.api-sports.io',
//             'x-rapidapi-key' => 'ffb34956934ed4e7b7061f74afa17034'
//         ])->get('https://v3.football.api-sports.io/fixtures',[
//             'from'=> date("Y-m-d"),
//             'to'=>date('Y-m-d', $date),
//             'season'=>date("Y"),
//             'league' => $item->league->id
//         ]);
//         $fixtures = json_decode($response->body())->response;
//         if(count($fixtures)){
//             array_push($list,$item);
//         }
//     }
//     Settings::create([
//         'key'=>'leagues',
//         'value'=> json_encode($list)
//     ]);
$list =  Settings::getValue('leagues');
        //end api
@endphp

<ul class="main">
    <li>
        <a  @if(Request::routeIs('home')) class="active" @endif
            href="{{route('home')}}">
            <i class="far fa-globe-americas"></i> <span>{{trans('All Sports')}}</span>
        </a>
    </li>
    @forelse($gameCategories as $gameCategory)
        <li>
            <a
                class="dropdown-toggle "
                data-bs-toggle="collapse"
                href="#collapse{{$gameCategory->id}}"
                role="button"
                aria-expanded="true"
                aria-controls="collapseExample">
                {!! $gameCategory->icon!!}{{$gameCategory->name}}
                <span class="count"><span class="font-italic">({{count($list)}})</span></span>
            </a>
            <!-- dropdown item -->

            <div class="collapse {{($loop->index == 0) ? 'show' :''}}" id="collapse{{$gameCategory->id}}">
                <ul class="">
                    @forelse($list as $tItem)
                        <li>
                            <a  href="{{route('tournament',[$tItem->league->id ])}}" class="sidebar-link">
                                {{-- <a href="{{route('tournament',[slug($tItem->name) , $tItem->id ])}}" class="sidebar-link {{( Request::routeIs('tournament') && $last == $tItem->id) ? 'active' : '' }}"> --}}
                                <img src="{{$tItem->league->logo}}" style="height: 40px;width:40px" /> {{$tItem->league->name}}</a>
                        </li>
                    @empty
                    @endforelse
                </ul>
            </div>
        </li>
    @empty
    @endforelse
</ul>
