<!-- live match table -->
<div v-if="showType == 'live'"  v-for="(item, index) in allSports_filter" class="table-parent table-responsive d-sm-block d-none">
</div>


<!-- Upcoming match table -->
<div  v-if="showType == 'upcoming'"  v-for="(item, index) in upcoming_filter" class="table-parent table-responsive d-sm-block d-none">
    <table class="table table-striped">
        <thead>
        <tr>
            <th class="col-6" colspan="2">
                <b style="width:100%;">@{{item.game_tournament.name}}</b> <span v-if="item.name">- @{{item.name}} </span>
            </th>
            <th v-if="question.name ==='Match Winner'||question.name ==='Home/Away'||question.name ==='Double Chance'" class="col-2" v-for="(question, index) in item.questions">
                <div class="d-flex justify-content-evenly" >
                    <span>@{{question.name}}</span>
                </div>

            </th>

            <template v-if="3 > (item.questions).length ">
                <th class="col-2" v-for="index in (3 - (item.questions).length )"
                    :key="index">
                    <div class="d-flex justify-content-evenly">
                        -
                        {{-- <span>1</span>
                        <span v-if="index == 1">@lang('X')</span>
                        <span v-if="index == 2">@lang('2X')</span>
                        <span v-if="index == 3">@lang('3X')</span>
                        <span>2</span> --}}
                    </div>
                </th>
            </template>
            <th class="col-1 text-center">@lang('More')</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td colspan="2">
                <div style="display: flex">
                    <span>
                        @{{new Date(item.start_date).getDate()}}-@{{new Date(item.start_date).getMonth()+1}}-@{{new Date(item.start_date).getFullYear()}}<br/>@{{new Date(item.start_date).getHours()}}:@{{new Date(item.start_date).getMinutes()}}
                    </span>
                    <div >
                        <p style="padding: 0px 0px 5px 5px">
                            <span>
                                <img style="border-radius: 7px" :src="'https://media.api-sports.io/football/teams/'+item.team1_id+'.png'" alt="..">
                                @{{ item.team1 }}
                            </span>
                        </p>
                        <p style="padding: 0px 0px 5px 5px">
                            <span>
                                <img style="border-radius: 7px" :src="'https://media.api-sports.io/football/teams/'+item.team2_id+'.png'" alt="..">
                                @{{ item.team2 }}
                            </span>
                        </p>
                        <p>
                            <span class="float-end">
                                <a href="" class="me-2 d-none">
                                    <i class="fal fa-chart-bar"></i>
                                </a>
                            </span>
                        </p>
                    </div>
                </div>
            </td>


            <td  v-if="question.name ==='Match Winner'||question.name ==='Home/Away'||question.name ==='Double Chance'" v-for="(question, index) in item.questions" >
                <div v-if="question.name ==='Match Winner'" class="d-flex justify-content-evenly">
                    <span>@lang('1')</span>
                    <span>@lang('X')</span>
                    <span>@lang('2')</span>
                </div>
                <div v-if="question.name ==='Home/Away'" class="d-flex justify-content-evenly">
                    <span>@lang('Home')</span>
                    <span>@lang('Away')</span>
                </div>
                <div v-if="question.name ==='Double Chance'" class="d-flex justify-content-evenly">
                    <span>@lang('1X')</span>
                    <span>@lang('12')</span>
                    <span>@lang('2X')</span>
                </div>
                <div class="d-flex justify-content-evenly w-100">
                    <button type="button" :disabled="option.is_unlock_question == 1 || option.is_unlock_match == 1 "
                            :class="{ disabled: (option.is_unlock_question == 1 || option.is_unlock_match == 1) }"
                            v-for="(option, index) in question.options"
                            :title="option.option_name" @click="addToSlip(option)">
                        <i v-if="option.is_unlock_question == 1 || option.is_unlock_match == 1"
                           class="fas fa-lock-alt"></i> @{{ option.ratio}}
                    </button>
                </div>

                <div v-if="(question.options).length == 0" class="d-flex justify-content-evenly w-100">
                    <button type="button" class="disabled downgrade">-</button>
                    <button type="button" class="disabled downgrade">-</button>
                </div>

            </td>

            <template v-if="3 > (item.questions).length "  >
                <td v-for="index in (3 - (item.questions).length )" :key="index">
                    <div class="d-flex justify-content-evenly w-100">
                        <button type="button" class="disabled downgrade">-</button>
                        <button type="button" class="disabled downgrade">-</button>
                    </div>
                </td>
            </template>
            <td  style="padding-top: 30px">
                <button type="button" v-if="0 == (item.questions).length" disabled class="disabled">-</button>
                <button @click="goMatch(item)" type="button" v-else>+@{{ (item.questions).length }}</button>
            </td>
        </tr>
    </table>
</div>

<div class="live-matches d-sm-none" v-if="showType == 'live'">
    <h5>@lang('Live Matches')</h5>
    <div class="live-matches-slider owl-carousel">
        <div class="box" v-for="(item, index) in allSports_filter">
            <h5 class="mb-3">@{{ item.game_tournament.name }}</h5>
            <div
                class="row d-flex justify-content-around align-items-center">
                <div class="col-3 team">
                    <img
                        class="img-fluid"
                        :src="item.team1_img"
                        alt="..."
                    />
                    <p>@{{ item.team1}}</p>
                </div>
                <div class="col-6">
                    <span>@{{item.name}} </span>
                    <h5 v-if="0 < item.questions.length ">@{{ slicedArray(item.questions).name}}</h5>
                    <button class="btn-custom w-75 my-2" @click="goMatch(item)">@lang('See More')</button>
                </div>
                <div class="col-3 team">
                    <img
                        class="img-fluid"
                        :src="item.team2_img"
                        alt="..."
                    />
                    <p>@{{ item.team2}}</p>
                </div>

                <div class="col-12 align-self-end">

                    <div v-if="0 < item.questions.length" class="d-flex justify-content-between">
                        <button class="btn-light" type="button"
                                :class="{ disabled: (option.is_unlock_question == 1 || option.is_unlock_match == 1) }"
                                :disabled="option.is_unlock_question == 1 || option.is_unlock_match == 1 "
                                :title="option.option_name"
                                @click="addToSlip(option)"
                                v-for="(option, index) in (slicedArray(item.questions).options)">

                            <i v-if="option.is_unlock_question == 1 || option.is_unlock_match == 1"
                               class="fas fa-lock-alt"></i>
                            @{{ option.ratio }}
                        </button>

                    </div>

                    <div v-else class="d-flex justify-content-between">
                        <button type="button" disabled class="btn-light disabled downgrade-mobile">-</button>
                        <button type="button" disabled class="btn-light disabled downgrade-mobile">-</button>
                        <button type="button" disabled class="btn-light disabled downgrade-mobile">-</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="live-matches d-sm-none" v-if="showType == 'upcoming'">
    <h5>@lang('Upcoming Matches')</h5>
    <div class="live-matches-slider owl-carousel">
        <div class="box" v-for="(item, index) in upcoming_filter">
            <h5 class="mb-3">@{{ item.game_tournament.name }}</h5>
            <div
                class="row d-flex justify-content-around align-items-center">
                <div class="col-3 team">
                    <img
                        class="img-fluid"
                        :src="item.team1_img"
                        alt="..."
                    />
                    <p>@{{ item.team1}}</p>
                </div>
                <div class="col-6">
                    <span>@{{item.name}} </span>
                    <h5 v-if="0 < item.questions.length ">@{{ slicedArray(item.questions).name}}</h5>
                    <button class="btn-custom w-75 my-2" @click="goMatch(item)">@lang('See More')</button>
                </div>
                <div class="col-3 team">
                    <img
                        class="img-fluid"
                        :src="item.team2_img"
                        alt="..."
                    />
                    <p>@{{ item.team2}}</p>
                </div>

                <div class="col-12 align-self-end">

                    <div v-if="0 < item.questions.length" class="d-flex justify-content-between">
                        <button class="btn-light" type="button"
                                :class="{ disabled: (option.is_unlock_question == 1 || option.is_unlock_match == 1) }"
                                :disabled="option.is_unlock_question == 1 || option.is_unlock_match == 1 "
                                :title="option.option_name"
                                @click="addToSlip(option)"
                                v-for="(option, index) in (slicedArray(item.questions).options)">

                            <i v-if="option.is_unlock_question == 1 || option.is_unlock_match == 1"
                               class="fas fa-lock-alt"></i>
                            @{{ option.ratio }}
                        </button>

                    </div>

                    <div v-else class="d-flex justify-content-between">
                        <button type="button" disabled class="btn-light disabled downgrade-mobile">-</button>
                        <button type="button" disabled class="btn-light disabled downgrade-mobile">-</button>
                        <button type="button" disabled class="btn-light disabled downgrade-mobile">-</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
