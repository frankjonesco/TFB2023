<div class="sidebar-module">
    <x-layout-heading heading="Employees" />
    <div class="flex flex-col">
        {{-- Chart for employees --}}                        
        <div class="mb-6 pb-3 rounded-lg border border-gray-200">
            <div id="employeesChart"></div>
        </div>
        {{-- End: Chart for employees --}}
        <table class="text-sm">
            <thead class="p-0 text-center">
                <th class="px-0.5 pl-2 py-2 font-bold">Year</th>
                <th class="p-0 py-2 px-8 font-bold">Employees</th>
                <th class="p-0 py-2 text-right font-bold">Growth</th>
            </thead>
            <tbody>
                @foreach($company->rankings as $ranking)
                    <tr>
                        <td class="px-0.5 pl-2 py-2 text-xs !font-normal">
                            {{$ranking->year}}
                            @if($ranking->confirmed_by_company)
                                <span class="text-xs">*</span>
                            @endif
                        </td>
                        <td class="py-2 px-8 text-xs">{{formatEmployees($ranking->employees)}}</td>
                        <td class="px-0.5 py-2 text-right text-xs">
                            <x-ranking-growth growth="{{$ranking->calculateGrowth('employees')}}" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- End: Table for employees --}}
        <div class="mt-5 text-xs no-results flex flex-col">
            <span class="grow">{!!$company->rankingSources()!!}</span> 
        </div>
        
    </div>
</div>

<script>
    function thousands_separators(num){
        var num_parts = num.toString().split(",");
        num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        return num_parts.join(",");
    }
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
            height: 290
        },
        padding: {
            top: 30,
            right: 25,
            bottom: 20,
            left: 60,
        },
        color: {
            pattern: [
                '#FFA500',
            ]
        },
        transition: {
            duration: 1000
        },
        grid: {
            x: {
                show: true,
                    
            },
            y: {
                show: true
            }
        },
        tooltip: {
            format: {
                title: function (x, index) { return 'Employees ' + x; },
                name: function (name, ratio, id, index) { return name; }
            },
                
        }
            
    });

</script>