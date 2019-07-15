@extends('components.master')

@section('content')
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>
        <div class="masonry-item w-100">
            <div class="row gap-20">
                <div class="col-md-3">
                    <div class="layers bd bgc-white p-20">
                        <div class="layer w-100 mB-10"><h6 class="lh-1">Total Visits</h6></div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">
                                <div class="peer peer-greed"><span id="sparklinedash"></span></div>
                                <div class="peer"><span
                                            class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500">+10%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="layers bd bgc-white p-20">
                        <div class="layer w-100 mB-10"><h6 class="lh-1">Total Page Views</h6></div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">
                                <div class="peer peer-greed"><span id="sparklinedash2"></span></div>
                                <div class="peer"><span
                                            class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-red-50 c-red-500">-7%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="layers bd bgc-white p-20">
                        <div class="layer w-100 mB-10"><h6 class="lh-1">Unique Visitor</h6></div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">
                                <div class="peer peer-greed"><span id="sparklinedash3"></span></div>
                                <div class="peer"><span
                                            class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-purple-50 c-purple-500">~12%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="layers bd bgc-white p-20">
                        <div class="layer w-100 mB-10"><h6 class="lh-1">Bounce Rate</h6></div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">
                                <div class="peer peer-greed"><span id="sparklinedash4"></span></div>
                                <div class="peer"><span
                                            class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-blue-50 c-blue-500">33%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="masonry-item col-12">
            <div class="bd bgc-white">
                <div class="peers fxw-nw@lg+ ai-s">
                    <div class="peer peer-greed w-70p@lg+ w-100@lg- p-20">
                        <div class="layers">
                            <div class="layer w-100 mB-10"><h6 class="lh-1">Site Visits</h6></div>
                            <div class="layer w-100">
                                <div id="world-map-marker"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="masonry-item col-md-6">
            <div class="bd bgc-white p-20">
                <div class="layers">
                    <div class="layer w-100 mB-20"><h6 class="lh-1">Weather</h6></div>
                    <div class="layer w-100">
                        <div class="peers ai-c jc-sb fxw-nw">
                            <div class="peer peer-greed">
                                <div class="layers">
                                    <div class="layer w-100">
                                        <div class="peers fxw-nw ai-c">
                                            <div class="peer mR-20"><h3>32<sup>°F</sup></h3></div>
                                            <div class="peer">
                                                <canvas class="sleet" width="44" height="44"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="layer w-100"><span
                                                class="fw-600 c-grey-600">Partly Clouds</span></div>
                                </div>
                            </div>
                            <div class="peer">
                                <div class="layers ai-fe">
                                    <div class="layer"><h5 class="mB-5">Monday</h5></div>
                                    <div class="layer"><span class="fw-600 c-grey-600">Nov, 01 2017</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="layer w-100 mY-30">
                        <div class="layers bdB">
                            <div class="layer w-100 bdT pY-5">
                                <div class="peers ai-c jc-sb fxw-nw">
                                    <div class="peer"><span>Wind</span></div>
                                    <div class="peer ta-r"><span class="fw-600 c-grey-800">10km/h</span>
                                    </div>
                                </div>
                            </div>
                            <div class="layer w-100 bdT pY-5">
                                <div class="peers ai-c jc-sb fxw-nw">
                                    <div class="peer"><span>Sunrise</span></div>
                                    <div class="peer ta-r"><span class="fw-600 c-grey-800">05:00 AM</span>
                                    </div>
                                </div>
                            </div>
                            <div class="layer w-100 bdT pY-5">
                                <div class="peers ai-c jc-sb fxw-nw">
                                    <div class="peer"><span>Pressure</span></div>
                                    <div class="peer ta-r"><span class="fw-600 c-grey-800">1B</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="layer w-100">
                        <div class="peers peers-greed ai-fs ta-c">
                            <div class="peer"><h6 class="mB-10">MON</h6>
                                <canvas class="sleet" width="30" height="30"></canvas>
                                <span class="d-b fw-600">32<sup>°F</sup></span></div>
                            <div class="peer"><h6 class="mB-10">TUE</h6>
                                <canvas class="clear-day" width="30" height="30"></canvas>
                                <span class="d-b fw-600">30<sup>°F</sup></span></div>
                            <div class="peer"><h6 class="mB-10">WED</h6>
                                <canvas class="partly-cloudy-day" width="30" height="30"></canvas>
                                <span class="d-b fw-600">28<sup>°F</sup></span></div>
                            <div class="peer"><h6 class="mB-10">THR</h6>
                                <canvas class="cloudy" width="30" height="30"></canvas>
                                <span class="d-b fw-600">32<sup>°F</sup></span></div>
                            <div class="peer"><h6 class="mB-10">FRI</h6>
                                <canvas class="snow" width="30" height="30"></canvas>
                                <span class="d-b fw-600">24<sup>°F</sup></span></div>
                            <div class="peer"><h6 class="mB-10">SAT</h6>
                                <canvas class="wind" width="30" height="30"></canvas>
                                <span class="d-b fw-600">28<sup>°F</sup></span></div>
                            <div class="peer"><h6 class="mB-10">SUN</h6>
                                <canvas class="sleet" width="30" height="30"></canvas>
                                <span class="d-b fw-600">32<sup>°F</sup></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
