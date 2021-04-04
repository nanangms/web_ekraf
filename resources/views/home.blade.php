@extends('layouts.app')

@section('title')
Home
@endsection
@section('header')

@endsection

@section('content')
<div class="content-wrapper" style="background-color: #F7F5ED">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashboard</h1>
        </div>
        
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <div class="row">
            <div class="col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{$pendaftaran}}</h3>

                  <p>Pendaftaran</p>
                </div>
                <div class="icon">
                  <i class="fa fa-edit"></i>
                </div>
                <a href="/pendaftaran" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{$pelaku}}</h3>

                  <p>Pelaku Ekraf</p>
                </div>
                <div class="icon">
                  <i class="fa fa-building"></i>
                </div>
                <a href="/pelaku_ekraf" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-12 col-sm-6">
              <div class="info-box">
                <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-newspaper"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Berita</span>
                  <span class="info-box-number">
                    {{$berita}}
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>

            <div class="col-12 col-sm-6">
              <div class="info-box">
                <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-database"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Produk</span>
                  <span class="info-box-number">
                    {{$produk}}
                   
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>

            <div class="col-12 col-sm-12">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fa fa-calendar"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Event</span>
                  <span class="info-box-number">
                    {{$event}}
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>

            
          </div>
        </div>
      </div>
      

      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- MAP & BOX PANE -->
          <div class="card">
            <div class="card-header">
              <h4>Grafik Pelaku Ekraf Berdasarkan Sub Sektor</h4>
              <hr>
              <div id="container"></div>
            </div>
          </div>

          <div class="card">
            <div class="card-header">
              <h4>Grafik Pelaku Ekraf Berdasarkan Wilayah Kabupaten</h4>
              <hr>
              <div id="container2"></div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <h4>Jumlah Produk Ekraf Berdasarkan Sektor</h4>
          @foreach($sektor as $sek)
            <div class="info-box mb-4 bg-info">
              <span class="info-box-icon"><i class="fas fa-shopping-cart"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">{{$sek->nama_sektor}}</span>
                <span class="info-box-number"><?php 
                $produks = App\Models\Produk::select('produk.*','b.nama_usaha','b.sektor_id')->leftjoin('pelaku_ekraf as b','produk.kode_pelaku_ekraf','b.kode_pelaku_ekraf')->where('b.sektor_id',$sek->id)->count(); ?>
                {{$produks}}
                </span>
              </div>
            </div>
          @endforeach
        </div>
      </div>

    </div>
  </section>

</div>



@endsection
@section('footer')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
  // Build the chart
Highcharts.chart('container', {
    chart: {
        type: 'bar'
    },
    title: {
        text: ''
    },
    xAxis: {
        categories: 
            {!!json_encode($categories_sektor)!!}
        ,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah'
        }
    },
    legend: {
        enabled: false
    },
    plotOptions: {
        column: {
            pointPadding: 0,
            borderWidth: 0
        }
    },
    series: [{
      name : 'Jumlah',
        colorByPoint: true,
        data: {!!json_encode($data1)!!}

    }]
});

// Build the chart
Highcharts.chart('container2', {
    chart: {
        type: 'bar'
    },
    title: {
        text: ''
    },
    xAxis: {
        categories: 
            {!!json_encode($categories_kab)!!}
        ,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah'
        }
    },
    legend: {
        enabled: false
    },
    plotOptions: {
        column: {
            pointPadding: 0,
            borderWidth: 0
        }
    },
    series: [{
      name : 'Jumlah',
        colorByPoint: true,
        data: {!!json_encode($data2)!!}

    }]
});
</script>
@stop