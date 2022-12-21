<x-layout>
    {{-- For Google Charts --}}
    {{-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> --}}
    
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
                        {{-- <div id="chart_div"></div> --}}

                        <div class="grid grid-cols-2 gap-3">
                            <span>Highest turnover:</span>
                            <span>{{$company->highestTurnover()}}</span>

                            <span>Lowest turnover:</span>
                            <span>{{$company->lowestTurnover()}}</span>

                            <span>Range:</span>
                            <span>{{$company->turnoverRange()}}</span>

                            <span>Turnover values</span>
                            <span>{{$company->chartDataForTurnover()}}</span>

                            <span>Y axis values</span>
                            <span>{{$company->turnover_y_axis_values()}}</span>
                        </div>
                        
                        <div class="bg-white">
                            <div id="turnoverChart"></div>
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
                                        <td class="text-center">{{formatEmployees($ranking->employees)}}</td>
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

        function thousands_separators(num){
            var num_parts = num.toString().split(",");
            num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            return num_parts.join(",");
        }

        var chart = c3.generate({

            bindto: document.getElementById('turnoverChart'),

            data: {
                
                names: {
                    data1: 'Turnover',
                    data2: 'Employees'
                },
                
                columns: [
                    ['data1', {{$company->chartDataForTurnover()}}],
                ],
                
            },

            axis: {
                x: {
                    show: true,
                    categories: ['Category 1', 'Category 2'],
                    tick: {
                        count: 3,
                        center: 0,
                        // format: function (x) { return x; }
                        // values: ['2013','2014','2015','2016','2017','2018'],
                        centered: true
                    }
                },
                y: {
                    min: 100,
                    max: 300,
                    // center: 0,
                    show: true,
                    label: {
                        text: 'Turnover (in €)',
                        position: 'outer-middle'
                    },
                    tick: {
                        count: 5,
                        format: function (d) { return thousands_separators(d + ' Mio.'); },
                        values:[{{$company->turnover_y_axis_values()}}]
                        
                    }
                },
            },

            size: {
                // width: 640
                // height: 480
            },

            padding: {
                top: 30,
                right: 50,
                bottom: 20,
                left: 90,
            },

            color: {
                pattern: [
                    '#1f77b4',
                    '#aec7e8'
                ]
            },

            transition: {
                duration: 1000
            },



            
        });

    </script>

    <script>
        // google.charts.load('current', {'packages':['corechart']});
        //   google.charts.setOnLoadCallback(drawChart);

        //   function drawChart() {
        //     var dataTable = new google.visualization.DataTable();
        //     dataTable.addColumn('number', 'Year');
        //     dataTable.addColumn('number', 'Sales');
        //     // A column for custom tooltip content
        //     dataTable.addColumn({type: 'string', role: 'tooltip'});
        //     dataTable.addRows([
        //       [2010, 600, '$600K in our first year!'],
        //       [2011, 1500, 'Sunspot activity made this our best year ever!'],
        //       [2012, 800, '$800K in 2012.'],
        //       [2013, 1000, '$1M in sales last year.']
        //     ]);

        //     var options = { legend: 'none' };
        //     var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        //     chart.draw(dataTable, options);
        //   }

        // google.charts.load('current', {'packages':['corechart']});
        // google.charts.setOnLoadCallback(drawChart);
        // function drawChart() {
        //     var data = google.visualization.arrayToDataTable([
        //         ['Year', 'Turnover'],
        //         ['2015', 325653],
        //         ['2016', 390343],
        //         ['2017', 509876],
        //         ['2018', 455622],
        //         ['2019', 566987],
        //     ]);
        //     var options = {
        //         tooltip: { isHtml: true },    // CSS styling affects only HTML tooltips.
        //         legend: { position: 'none' },
        //         bar: { groupWidth: '90%' },
        //         colors: ['#A61D4C']
        //     };
        //     var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        //     chart.draw(data, options);
        // }
    </script>
</x-layout>