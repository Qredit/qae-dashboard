@extends('layouts.master')
@section('main-content')

<style>
.table td {
    text-align: center;
}

.table tr {
    text-align: center;
}

.i-Close-Window{
    color:red;
}

.i-Yes{
    color:green;
}
</style>


<div class="breadcrumb">
    <h1>Exchange Overview</h1>
</div>
<p class="text-small text-muted text-left">Text about Exchange Overview</p>
<div class="separator-breadcrumb border-top"></div>


<div class="card">
<div class="card-body">

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Exchange Name</th>
                                            <th scope="col">Official URL</th>
                                            <th scope="col">24h Exchange Volume</th>
                                            <th scope="col">24h XQR Trade Volume</th>
                                            <th scope="col">QAE Support</th>
                                            <th scope="col">Fiat Support</th>
                                            <th scope="col">CMC Listed</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td><span data-toggle="tooltip" data-placement="top" data-original-title="Launched in 2018 and based in Sweden.">Altilly</span></td>
                                            <td><a href="https://altilly.com">altilly.com</a></td>
                                            <td>$ 78.291</td>
                                            <td>xx</td>
                                            <td> <i class="nav-icon i-Yes font-weight-bold"></i></td>
                                            <td><i class="nav-icon i-Close-Window font-weight-bold"></i></td>
                                            <td> <i class="nav-icon i-Yes font-weight-bold"></i></td>
                                            <td><span class="badge badge-success">Active</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>STEX</td>
                                            <td><a href="https://stex.com">stex.com</a></td>
                                            <td>$ 33.831.828</td>
                                            <td>xx</td>
                                            <td> <i class="nav-icon i-Yes font-weight-bold"></i></td>
                                            <td> <i class="nav-icon i-Yes font-weight-bold"></i></td>
                                            <td> <i class="nav-icon i-Yes font-weight-bold"></i></td>
                                            <td><span class="badge badge-info">Pending Listing</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Atomars</td>
                                            <td><a href="https://atomars.com">atomars.com</a></td>
                                            <td>xx</td>
                                            <td>xx</td>
                                            <td> <i class="nav-icon i-Yes font-weight-bold"></i></td>
                                            <td><i class="nav-icon i-Close-Window font-weight-bold"></i></td>
                                            <td><i class="nav-icon i-Close-Window font-weight-bold"></i></td>
                                            <td><span class="badge badge-info">Pending Listing</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">4</th>
                                            <td><span data-toggle="tooltip" data-placement="top" data-original-title="Please avoid this exchange.">TradeSatoshi</span></td>
                                            <td><a href="https://atomars.com">tradesatoshi.com</a></td>
                                            <td>xx</td>
                                            <td>xx</td>
                                            <td><i class="nav-icon i-Close-Window font-weight-bold"></i></td>
                                            <td><i class="nav-icon i-Close-Window font-weight-bold"></i></td>
                                            <td> <i class="nav-icon i-Yes font-weight-bold"></i></td>
                                             <td><span class="btn badge badge-danger" data-toggle="tooltip" data-placement="top" data-original-title="Wallets in maintenance for months. Funds locked. No reply on tickets.">Warning!</span></td>
                                        </tr>
                                       <tr>
                                            <th scope="row">5</th>
                                            <td>FinexBox</td>
                                            <td><a href="https://atomars.com">finexbox.com</a></td>
                                            <td>xx</td>
                                            <td>xx</td>
                                            <td><i class="nav-icon i-Close-Window font-weight-bold"></i></td>
                                            <td><i class="nav-icon i-Close-Window font-weight-bold"></i></td>
                                            <td> <i class="nav-icon i-Yes font-weight-bold"></i></td>
                                            <td><span class="btn badge badge-danger" data-toggle="tooltip" data-placement="top" data-original-title="Fake Volume.">Warning!</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">6</th>
                                            <td>BitexLive</td>
                                            <td><a href="https://atomars.com">bitexlive.com</a></td>
                                            <td>xx</td>
                                            <td>xx</td>
                                            <td><i class="nav-icon i-Close-Window font-weight-bold"></i></td>
                                            <td><i class="nav-icon i-Close-Window font-weight-bold"></i></td>
                                            <td><i class="nav-icon i-Close-Window font-weight-bold"></i></td>
                                            <td><span class="badge badge-warning">Maintenance</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">7</th>
                                            <td>SatoExchange</td>
                                            <td><a href="https://atomars.com">satoexchange.com</a></td>
                                            <td>xx</td>
                                            <td>xx</td>
                                            <td><i class="nav-icon i-Close-Window font-weight-bold"></i></td>
                                            <td><i class="nav-icon i-Close-Window font-weight-bold"></i></td>
                                            <td><i class="nav-icon i-Close-Window font-weight-bold"></i></td>
                                            <td><span class="badge badge-success">Active</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">8</th>
                                            <td>Graviex</td>
                                            <td><a href="https://atomars.com">graviex.com</a></td>
                                            <td>xx</td>
                                            <td>xx</td>
                                            <td><i class="nav-icon i-Close-Window font-weight-bold"></i></td>
                                            <td><i class="nav-icon i-Close-Window font-weight-bold"></i></td>
                                            <td> <i class="nav-icon i-Yes font-weight-bold"></i></td>
                                            <td><span class="badge badge-success">Active</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">9</th>
                                            <td>Alterdice</td>
                                            <td><a href="https://atomars.com">alterdice.com</a></td>
                                            <td>xx</td>
                                            <td>xx</td>
                                            <td> <i class="nav-icon i-Yes font-weight-bold"></i></td>
                                            <td><i class="nav-icon i-Close-Window font-weight-bold"></i></td>
                                            <td><i class="nav-icon i-Close-Window font-weight-bold"></i></td>
                                            <td><span class="badge badge-info">Pending Listing</span></td>
                                        </tr>
                                    </tbody>
                                </table>



                        </div>
</div></div>



@endsection

@section('page-js')
<script src="{{asset('assets/js/tooltip.script.js')}}"></script>
<script src="{{asset('assets/js/vendor/echarts.min.js')}}"></script>
<script src="{{asset('assets/js/es5/echart.options.min.js')}}"></script>
<script src="{{asset('assets/js/es5/dashboard.v1.script.js')}}"></script>

@endsection
