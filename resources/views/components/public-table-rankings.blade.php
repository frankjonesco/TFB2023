@if(empty($companies))
    <p class="no-results">Nothing to display.</p>
@else
    <table>
        <thead>
            <th>Rank</th>
            <th>Company name</th>
            <th>Turnover</th>
            <th>Employees</th>
            <th>Training rate</th>
            <th>Growth</th>
        </thead>
        <tbody>
            @foreach($companies as $company)
                <tr>
                    <td></td>
                    <td>
                        {{$company->registered_name}}
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif