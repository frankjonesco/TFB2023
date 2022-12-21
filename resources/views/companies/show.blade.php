<x-layout>
    {{-- For Google Charts --}}
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    {{-- For C3 Charts --}}
    <link href="{{asset('c3/c3.css')}}" rel="stylesheet">
    <script src="{{asset('c3/c3-js.js')}}" charset="utf-8"></script>
    <script src="{{asset('c3/c3.min.js')}}"></script>

    <x-container>
        <div class="flex">
            <div class="mt-6 pl-3 pr-12 w-2/3 border-r border-zinc-500">                
                <div class="flex mb-7">
                    <h3 class="pl-1.5 pr-4 pb-3 border-b border-sky-500 uppercase text-lg">Company details</h3>
                    <span class="grow border-b border-zinc-500"></span>
                </div>
                {{-- Company layout --}}
                <div class="flex">
                    <div class="w-1/4 mr-10">
                        <img 
                            src="{{$company->getImageThumbnail()}}"
                            alt="Top Family Business - {{$company->registered_name}}"
                            class="w-full mr-4 rounded border border-indigo-100 hover:border-amber-300 cursor-pointer"
                        >
                    </div>
                    <div class="w-3/4">
                        <h2>{{$company->show_name}}</h2>
                        <div class="flex mb-5">
                            <div class="w-1/2">
                                <span>Registered name</span><br>
                                <span class="font-thin">{{$company->registered_name}}</span>
                            </div>
                            <div class="w-1/2">
                                <span>Parent organisation:</span><br>
                                <span class="font-thin">{{$company->parent_organization}}</span>
                            </div>
                        </div>
                        <p class="text-sm">{{$company->description}}</p>

                        {{-- Table for turnover --}}
                        <h2>Turnover</h2>
                        <table>
                            <thead>
                                <th class="text-center">Year</th>
                                <th class="text-center">Turnover</th>
                                <th class="text-center">Growth</th>
                                <th>Source</th>
                            </thead>
                            <tbody>
                                @foreach($company->rankings as $ranking)
                                    <tr>
                                        <td class="text-center">{{$ranking->year}}</td>
                                        <td class="text-center">{{formatTurnover($ranking->turnover)}}</td>
                                        <td class="text-center">{{$ranking->calculateGrowth('turnover')}}</td>
                                        <td>{{$ranking->sourceText()}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- End: Table for turnover --}}

                        {{-- Chart for turnover --}}
                        <div id="chart_div"></div>
                        <div class="bg-white">
                            <div id="chart"></div>
                        </div>
                        {{-- End: Chart for turnover --}}

                        {{-- Table for employees --}}
                        <h2>Employees</h2>
                        <table>
                            <thead>
                                <th class="text-center">Year</th>
                                <th class="text-center">Employees</th>
                                <th class="text-center">Growth</th>
                                <th>Source</th>
                            </thead>
                            <tbody>
                                @foreach($company->rankings as $ranking)
                                    <tr>
                                        <td class="text-center">{{$ranking->year}}</td>
                                        <td class="text-center">{{formatEmployees   ($ranking->employees)}}</td>
                                        <td class="text-center">{{$ranking->calculateGrowth('employees')}}</td>
                                        <td>{{$ranking->sourceText()}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- End: Table for turnover --}}
                    </div>
                </div>
                {{-- End: company layout --}}
            </div>
            <div class="mt-6 px-12 w-1/3">
                <x-module-socials />
            </div>
        </div>
    </x-container>

    <script>
    var chart = c3.generate({
        bindto: '#chart',
        data:{
            columns:[
                ['data1', 30, 200, 100, 400, 150, 250],
            ],
            axes:{
                data2: 'y2'
            }
        },
        axis:{
            x:{
                label:{
                    text: 'X Label',
                    position: 'bottom-center'
                },
                type: 'category',
                categories: ['2013','2014','2015','2016','2017','2018'],
                tick: {
                  centered: true
                }
            },
            y: {
                label:{
                    text: 'Y Label',
                    position: 'outer-middle'
                }
            },
        },
        legend:{

        },
        tooltip:{
            show: true,
            format:{
                title: function (x, index) { return 'Turnover ' + x; },
                name: function (name, ratio, id, index) { return name; },
                value: function (value, ratio, id, index) { return value; }
            }
        }
    });
    </script>

    <script>
    google.charts.load('current', {packages: ['corechart', 'line']});
    google.charts.setOnLoadCallback(drawBasic);

    function drawBasic() {

        var data = new google.visualization.DataTable();
        data.addColumn('number', 'Year');
        data.addColumn('number', 'Turnover');

        data.addRows({{$company->chartDataForTurnover()}});

        // data.addRows([
        //     [2009, 10],
        //     [2010, 15],
        //     [2011, 3],
        //     [2012, 5]
        // ]);

        var options = {
            hAxis: {
                title: 'Year',
                format: '####'
            },
            vAxis: {
                title: 'Turnover',
                format: '###,### Mio €',
            },
            tooltip: {
                format: {
                    title: function (d) { return d; },
                    value: function (y) { return formatNumber(y); }
                }
            
            },
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

        chart.draw(data, options);
    }
    </script>
</x-layout>