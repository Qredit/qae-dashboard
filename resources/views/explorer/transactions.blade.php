@extends('layouts.master')
@section('main-content')

<div class="breadcrumb">
    <h1>Transactions</h1>
</div>
<p class="text-small text-muted text-left">Text about Transactions</p>
  <div class="table-responsive">
  <table class="table table-dark table-sm table-striped">
        <thead>
          <tr>
            <th style="" scope="col">Block Height</th>
            <th style="" scope="col">Last Block</th>
            <th style="" scope="col">Forged</th>
            <th style="" scope="col">Last Forged</th>

        </tr>
        </thead>


    <tbody>
<?php

    $myData = file_get_contents("http://api.qredit.cloud:4103/api/blocks?limit=1");
    $myObject = json_decode($myData);
    $myObjectMap = $myObject->data;
    foreach($myObjectMap as $key => $item):
?>
    <tr>
        <td style=""><?PHP echo $item->height; ?></td>
        <td style=""><?PHP echo $item->id; ?></td>
        <td style=""><?PHP echo $item->forged->reward; ?> XQR from <?PHP echo $item->forged->amount; ?> Transactions</td>
        <td style=""><?PHP echo $item->generator->username; ?></td>
    </tr>


<?php endforeach; ?>
    </tbody>
  </table>
</div>
<div class="separator-breadcrumb border-top"></div>


<div class="card">
<div class="card-body">
  <div class="table-responsive">
  <table class="table table-sm table-striped">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Timestamp</th>
            <th scope="col">Sender</th>
            <th scope="col">Recipient</th>
            <th scope="col">Amount</th>
        </tr>
        </thead>


    <tbody>
<?php

    $myData = file_get_contents("http://api.qredit.cloud:4103/api/transactions?transform=true&page=1&limit=100");
    $myObject = json_decode($myData);
    $myObjectMap = $myObject->data;
    foreach($myObjectMap as $key => $item):
?>
    <tr>
        <td><?PHP echo $item->id; ?></td>
        <td><?PHP echo $item->timestamp->human; ?></td>
        <td><?PHP echo $item->sender; ?></td>
        <td><?PHP echo $item->recipient; ?></td>
        <td><?PHP echo $item->amount; ?> XQR</td>
    </tr>
<?php endforeach; ?>


    </tbody>
  </table>
</div>
</div>
</div>

<style>
.table td, .table th {
    text-align:center;
}

.table-dark{
    border-radius: 10px;
}
.table-responsive {
    border-radius:10px;
}

</style>
@endsection

@section('page-js')
<script src="{{asset('assets/js/vendor/echarts.min.js')}}"></script>
<script src="{{asset('assets/js/es5/echart.options.min.js')}}"></script>
<script src="{{asset('assets/js/es5/dashboard.v1.script.js')}}"></script>

@endsection
