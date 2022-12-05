@php
use Illuminate\Support\Facades\Http;

    $segments = request()->segments();
    $last  = end($segments);
    ///api call
    $response = Http::withHeaders([
        'x-rapidapi-host' => 'v3.football.api-sports.io',
        'x-rapidapi-key' => 'ffb34956934ed4e7b7061f74afa17034'
    ])->get('https://v3.football.api-sports.io/leagues', [
        'season' => '2022',
    ]);
    $leagues = json_decode($response->body())->response;
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
                <span class="count"><span class="font-italic">({{$gameCategory->game_active_match_count}})</span></span>
            </a>
            <!-- dropdown item -->

            <div class="collapse {{($loop->index == 0) ? 'show' :''}}" id="collapse{{$gameCategory->id}}">
                <ul class="">
                    @forelse($gameCategory->activeTournament as $tItem)
                        <li>
                            <a href="{{route('tournament',[slug($tItem->name) , $tItem->id ])}}" class="sidebar-link {{( Request::routeIs('tournament') && $last == $tItem->id) ? 'active' : '' }}">
                                <i class="far fa-hand-point-right"></i> {{$tItem->name}}</a>
                        </li>
                    @empty
                    @endforelse
                </ul>
            </div>
        </li>
    @empty
    @endforelse
</ul>
