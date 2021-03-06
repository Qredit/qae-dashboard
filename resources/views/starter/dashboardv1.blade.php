@extends('layouts.master')
@section('main-content')
<div class="breadcrumb">
    <h1>QAE Dashboard</h1>
</div>

<div class="separator-breadcrumb border-top"></div>
<div class="row" style="text-align: center;">
                <div class="col-md-3">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-3">Blockchain Status</h5>
                            <p class="text-20 text-success line-height-1 mb-3"><i class="i-Arrow-Up-in-Circle"></i> 100%</p>
                            <small class="text-muted">(51 out of 51 Delegates Forging)</small>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-3">Relay 1</h5>
                            <p class="text-20 text-success line-height-1 mb-3"><i class="i-Arrow-Up-in-Circle"></i> Up</p>
                            <small class="text-muted">136.144.170.17</small>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-3">Last Forged Block</h5>
                            <p class="text-20 text-success line-height-1 mb-3"><i class="i-Male"></i> altilly_rewards
                            </p>
                            <small class="text-muted">next forger: alessio</small>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-3">Block Height</h5>
                            <p class="text-20 text-success line-height-1 mb-3"><i class="i-Data"></i> 5134546
                            </p>
                            <small class="text-muted">10 XQR forged from 0 transactions</small>
                        </div>
                    </div>
                </div>

            </div>
<div class="row" style="text-align: center;">
                <div class="col-md-3">
                    <div class="card mb-4">
                        <div class="card-body" style="height:150px;">
                            <h5 class="mb-2 text-muted">Network Load</h5>
                            <p class="mb-1 text-22 font-weight-light">2%</p>
                            <div class="progress mb-1" style="height: 4px">
                                <div class="progress-bar bg-success" style="width: 2%" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                            <small class="text-muted">Most data used in last 3 days</small>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card mb-4">
                        <div class="card-body" style="height:150px;">
                          <h5 class="mb-2 text-muted">Total XQR Voting</h5>
                            <p class="mb-1 text-22 font-weight-light">92%</p>
                            <div class="progress mb-1" style="height: 4px">
                                <div class="progress-bar bg-success" style="width: 92%" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                            <small class="text-muted">649.351.998 XQR Voting</small>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card mb-4">
                            <div class="card-body" style="height:150px;">
                            <h5 class="mb-1">XQR Value</h5>
                            <p class="text-22 text-success font-weight-light mb-1">$0.00044523</p>
                            <div id="echart1" style="height: 65px; -webkit-tap-highlight-color: transparent; user-select: none; position: relative;" _echarts_instance_="ec_1579384746591"><div style="position: relative; overflow: hidden; width: 329px; height: 65px; padding: 0px; margin: 0px; border-width: 0px;"><canvas data-zr-dom-id="zr_0" width="329" height="65" style="position: absolute; left: 0px; top: 0px; width: 329px; height: 65px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div></div></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card mb-4">
                        <div class="card-body" style="height:150px;">
                            <h5 class="mb-2 text-muted">Network Latency (Average)</h5>
                            <p class="mb-1 text-22 font-weight-light">113 ms</p>
                            <div class="progress mb-1" style="height: 4px">
                                <div class="progress-bar bg-info" style="width: 25%" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                            <small class="text-muted">highest node latency: 712ms</small>
                        </div>
                    </div>
                </div>

            </div>

@endsection

@section('page-js')
<script src="{{asset('assets/js/vendor/echarts.min.js')}}"></script>
<script src="{{asset('assets/js/es5/echart.options.min.js')}}"></script>
<script src="{{asset('assets/js/es5/dashboard.v1.script.js')}}"></script>

@endsection
