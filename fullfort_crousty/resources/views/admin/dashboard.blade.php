<!-- Vue du dashboard administratif -->
@extends('admin.design')

<!-- <base href="/public"> -->
@section('dashboard')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-6">
            <div class="statistic-block block">
                <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                        <div class="icon"><i class="icon-user-1"></i></div><strong>Utilisateurs/Clients</strong>
                    </div>
                    <div class="number dashtext-1">{{$user_count}}</div>
                    </div>
                    <div class="progress progress-template">
                    <div role="progressbar" style="width: 100%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
                </div>
            </div>
            </div>
            <div class="col-md-3 col-sm-6">
            <div class="statistic-block block">
                <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                        <div class="icon"><i class="icon-windows"></i></div><strong>Produits en Catalogue</strong>
                    </div>
                    <div class="number dashtext-2">{{$product_count}}</div>
                    </div>
                    <div class="progress progress-template">
                    <div role="progressbar" style="width: 100%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
                </div>
            </div>
            </div>
            <div class="col-md-3 col-sm-6">
            <div class="statistic-block block">
                <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                        <div class="icon"><i class="icon-paper-and-pencil"></i></div><strong>Produits Commandés</strong>
                    </div>
                    <div class="number dashtext-3">{{$ordered_products_count}}</div>
                    </div>
                    <div class="progress progress-template">
                    <div role="progressbar" style="width: 100%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-3"></div>
                </div>
            </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                    <div class="progress-details d-flex align-items-end justify-content-between">
                        <div class="title">
                            <div class="icon"><i class="icon-writing-whiteboard"></i></div><strong>Produits Livrés</strong>
                        </div>
                        <div class="number dashtext-4">{{$delivered_products_count}}</div>
                        </div>
                        <div class="progress progress-template">
                        <div role="progressbar" style="width: 100%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection