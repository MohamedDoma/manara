@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-xl-4 col-md-12">
            <div class="card card-stats">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">الزوار هذا الشهر</h5>
                            <span class="h2 font-weight-bold mb-0">0</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                <i class="ni ni-active-40"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                        <span class="text-nowrap">من اخر شهر</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">عدد الاثار</h5>
                            <span class="h2 font-weight-bold mb-0">{{$posts->count()}}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                <i class="ni ni-chart-pie-35"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> {{$lastmonth_posts->count()}}</span>
                        <span class="text-nowrap">اثار جديدة</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">الزيارات الجديدة</h5>
                            <span class="h2 font-weight-bold mb-0">0</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                <i class="ni ni-money-coins"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                        <span class="text-nowrap">من اخر شهر</span>
                    </p>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-xl-10">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">الزيارات</h3>
                        </div>
                        <div class="col text-right">
                            <a href="#!" class="btn btn-sm btn-primary">رؤية الكل</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">اسم الاثر</th>
                            <th scope="col">الزوار</th>
                            <th scope="col">الزوار الجدد</th>
                            <th scope="col">مدة البقاء في الصفحة</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <th scope="row">
                                        {{$post->post_title}}
                                    </th>
                                    <td>
                                        4,569
                                    </td>
                                    <td>
                                        340
                                    </td>
                                    <td>
                                        <i class="fas fa-arrow-up text-success mr-3"></i> 46,53%
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                        {{$posts->links()}}
                    </table>
                </div>
            </div>
        </div>

    </div>



@endsection
