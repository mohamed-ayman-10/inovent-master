@if (isset($eventCountDown->start_date) && !@empty($eventCountDown->start_date))
    <div class="date" style="display: none">{{ $eventCountDown->start_date }}</div>
    <section class="upcoming py-5">
        <div class="container py-4 px-5 text-center text-light">
            <h3>@lang('Time left for our upcoming Event')</h3>
            <p class="text-main-2">@lang('T - MINUS:')</p>
            <div class="row px-5 mt-4">
                <div class="col-md-6 col-lg-3 px-3 mb-4 mb-lg-0">
                    <div class="card bg-main-color p-3">
                        <h3 class="m-0 days">0</h3>
                        <p class="m-0">@lang('DAYS')</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 px-3 mb-4 mb-lg-0">
                    <div class="card bg-main-color p-3">
                        <h3 class="m-0 hours">21</h3>
                        <p class="m-0">@lang('HOURS')</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 px-3 mb-4 mb-lg-0">
                    <div class="card bg-main-color p-3">
                        <h3 class="m-0 minutes">39</h3>
                        <p class="m-0">@lang('MINUTES')</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 px-3 mb-4 mb-lg-0">
                    <div class="card bg-main-color p-3">
                        <h3 class="m-0 seconds">55</h3>
                        <p class="m-0">@lang('SECONDS')</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
