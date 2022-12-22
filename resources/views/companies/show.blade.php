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
                    </div>
                </div>

                <h2 class="mt-12">Turnover</h2>
                <div class="flex">
                    <div class="w-1/4 mr-10">
                        {{-- Table for turnover --}}
                        
                        <table class="text-sm">
                            <thead class="p-0">
                                <th class="p-0 py-2 text-center">Year</th>
                                <th class="p-0 py-2 px-8">Turnover</th>
                                <th class="p-0 py-2">Growth</th>
                            </thead>
                            <tbody>
                                @foreach($company->rankings as $ranking)
                                    <tr>
                                        <td class="px-0.5 pl-2 py-2 text-center text-xs !font-normal text-white">{{$ranking->year}}</td>
                                        <td class="py-2 px-8 text-xs">{{formatTurnover($ranking->turnover)}}</td>
                                        <td class="px-0.5 py-2 text-right text-xs">
                                            <x-ranking-growth growth="{{$ranking->calculateGrowth('turnover')}}" />
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- End: Table for turnover --}}
                    </div>
                    <div class="w-3/4">
                        {{-- Chart for turnover --}}                        
                        <div class="mb-12 pb-6 rounded-lg bg-white">
                            <div id="turnoverChart"></div>
                        </div>
                        {{-- End: Chart for turnover --}}
                    </div>
                </div>



                <h2 class="mt-12">Employees</h2>
                <div class="flex">
                    <div class="w-1/4 mr-10">
                        <table class="text-sm">
                            <thead class="p-0">
                                <th class="p-0 py-2 text-center">Year</th>
                                <th class="p-0 py-2 px-8">Employees</th>
                                <th class="p-0 py-2">Growth</th>
                            </thead>
                            <tbody>
                                @foreach($company->rankings as $ranking)
                                    <tr>
                                        <td class="px-0.5 pl-2 py-2 text-center text-xs !font-normal text-white">{{$ranking->year}}</td>
                                        <td class="py-2 px-8 text-xs">{{formatEmployees($ranking->employees)}}</td>
                                        <td class="px-0.5 py-2 text-right text-xs">
                                            <x-ranking-growth growth="{{$ranking->calculateGrowth('employees')}}" />
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- End: Table for employees --}}
                    </div>

                    <div class="w-3/4">
                        {{-- Chart for employees --}}                        
                        <div class="mt-6 mb-12 pb-6 rounded-lg bg-white">
                            <div id="employeesChart"></div>
                        </div>
                        {{-- End: Chart for employees --}}
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
        var turnoverChart = c3.generate({
            bindto: document.getElementById('turnoverChart'),
            data: {
                x: 'x',
                columns: [
                    ['x', {{$company->turnoverYears()}}],
                    ['Turnover', {{$company->rankingTurnovers()}}]
                ]
            },
            axis: {
                x: {
                    padding: {
                        left:0.5,
                        right:0.5,
                    }
                },
                y: {
                    min: {{$company->turnover_low_y_axis()}},
                    max: {{$company->turnover_high_y_axis()}},
                    show: true,
                    tick: {
                        count: 3,
                        format: function (d) { return thousands_separators(Math.floor(d/1000000)) + ' Mio. €'; },                        
                    },
                    padding: {
                        top:0,
                        bottom:0,
                    }
                },
            },
            size: {
                height: 420
            },
            padding: {
                top: 65,
                right: 60,
                bottom: 10,
                left: 120,
            },
            color: {
                pattern: [
                    '#00c2e0',
                ]
            },
            transition: {
                duration: 1000
            },
        });

        // EMPLOYEES CHART
        var employeesChart = c3.generate({
            bindto: document.getElementById('employeesChart'),
            data: {
                x: 'x',
                columns: [
                    ['x', {{$company->employeesYears()}}],
                    ['Employees', {{$company->rankingEmployees()}}]
                ]
            },
            axis: {
                x: {
                    padding: {
                        left:0.5,
                        right:0.5,
                    }
                },
                y: {
                    min: {{$company->employees_low_y_axis()}},
                    max: {{$company->employees_high_y_axis()}},
                    show: true,
                    tick: {
                        count: 3,
                        format: function (d) { return thousands_separators(Math.floor(d)); },                        
                    },
                    padding: {
                        top:0,
                        bottom:0,
                    }
                },
            },
            size: {
                height: 420
            },
            padding: {
                top: 65,
                right: 60,
                bottom: 10,
                left: 120,
            },
            color: {
                pattern: [
                    '#FFA500',
                ]
            },
            transition: {
                duration: 1000
            },
        });
    </script>
</x-layout>