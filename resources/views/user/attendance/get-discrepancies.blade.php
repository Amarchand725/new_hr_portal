@foreach ($current_month_discrepancies as $current_month_discrepancy)
    <tr>
        <td>
            <div>
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" />
            </div>
        </td>
        <td>
            <div class="d-flex justify-content-start align-items-center user-name">
                <div class="avatar-wrapper">
                    <div class="avatar me-2">
                        @if(isset($current_month_discrepancy->hasEmployee->profile) && !empty($current_month_discrepancy->hasEmployee->profile->profile))
                            <img src="{{ asset('public/admin/assets/img/avatars') }}/{{ $current_month_discrepancy->hasEmployee->profile->profile }}" alt="Avatar" class="rounded-circle">
                        @else
                            <img src="{{ asset('public/admin') }}/default.png" alt="Avatar" class="rounded-circle">
                        @endif
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <span class="emp_name text-truncate">
                        @if(isset($current_month_discrepancy->hasEmployee) && !empty($current_month_discrepancy->hasEmployee->first_name))
                            {{ $current_month_discrepancy->hasEmployee->first_name }} {{ $current_month_discrepancy->hasEmployee->last_name }}
                        @else
                        -
                        @endif
                    </span>
                    <small class="emp_post text-truncate text-muted">
                        @if(isset($current_month_discrepancy->hasEmployee->jobHistory->designation) && !empty($current_month_discrepancy->hasEmployee->jobHistory->designation->title))
                            {{ $current_month_discrepancy->hasEmployee->jobHistory->designation->title }}
                        @else
                        -
                        @endif
                    </small>
                </div>
            </div>
        </td>
        <td>{{ date('d M Y h:i A', strtotime($current_month_discrepancy->date)) }}</td>
        <td>
            <span class="badge bg-label-info me-1">
                {{ Str::ucfirst($current_month_discrepancy->type) }}
            </span>
        </td>
        <td>
            {{ date('d M Y', strtotime($current_month_discrepancy->created_at)) }}
        </td>
        <td>{{ $current_month_discrepancy->description }}</td>
        <td>
            @if($current_month_discrepancy->status)
                <span class="badge bg-label-success me-1">Approved</span>
            @elseif($current_month_discrepancy->status==2)
                <span class="badge bg-label-danger me-1">Rejected</span>
            @else
                <span class="badge bg-label-warning me-1">Pending</span>
            @endif
        </td>
    </tr>
@endforeach
