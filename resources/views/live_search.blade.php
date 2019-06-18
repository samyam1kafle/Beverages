@extends('FrontEnd.layers.master')
@section('content')
    <div style="height:100%;" ng-view="" autoscroll="true" class="ng-scope">
        <div class="search-header-wrapper mb20 ng-scope">
            <div class="container">
                <div class="row mb20">
                    <div class="col-xs-12">
                        <div class="search-misc">
                            <div class="search-misc__stats">
                                <div id="stats">
                                    <div>
                                        <div class="ais-root ais-stats">
                                            <div class="ais-body ais-stats--body">
                                                <div>
                                                    <strong>{{ $searchResults->count() ? $searchResults->count() : 'No' }}
                                                        results found for "{{ request('query') }}
                                                        "</strong></div>

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <table id="example1"
                                                               class="table table-bordered table-striped dataTable"
                                                               role="grid" aria-describedby="example1_info">
                                                            <thead>
                                                            <tr role="row">
                                                                <th class="fa fa-database"
                                                                    style="width: 182px;">Searched Item Found In
                                                                </th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="example1"
                                                                    rowspan="1" colspan="1"
                                                                    aria-label="Browser: activate to sort column ascending"
                                                                    style="width: 224px;">Results More Likely
                                                                </th>


                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            @foreach($searchResults->groupByType() as $type => $modelSearchResults)
                                                                @foreach($modelSearchResults as $searchResult)

                                                                    <tr>
                                                                        <td class="sorting_1">

                                                                            @if($searchResult->type == 'categories')
                                                                                <a href="{{route('products',$searchResult->searchable->slug)}}">{{ ucfirst($type)}}</a>
                                                                            @else
                                                                                <a href="{{route('product-detail',$searchResult->searchable->slug)}}">{{ ucfirst($type)}}</a>

                                                                        @endif
                                                                        <td>{{ $searchResult->title }}</td>

                                                                        </td>
                                                                    </tr>
                                                                @endforeach



                                                            @endforeach


                                                            </tbody>

                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="search-misc__pagination"
                                 ng-class="{ 'hidden': searchController.noSearchResults }">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container ng-scope">
            <div class="row">

                <div class="col-sm-8 col-lg-9">


                </div>
            </div>
        </div>
    </div>
@endsection



