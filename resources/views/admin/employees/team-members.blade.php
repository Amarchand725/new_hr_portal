@foreach ($team_members as $team_member)
    <tr>
        <td>
        <div class="d-flex justify-content-start align-items-center user-name">
            <div class="avatar-wrapper">
                <div class="avatar me-2">
                    @if(isset($team_member->profile) && !empty($team_member->profile->profile))
                        <img src="{{ asset('public/admin/assets/img/avatars') }}/{{ $team_member->profile->profile }}" alt="Avatar" class="rounded-circle">
                    @else
                        <img src="{{ asset('public/admin/assets/img/avatars/default.png') }}" alt="Avatar" class="rounded-circle">
                    @endif
                </div>
            </div>
            <div class="d-flex flex-column">
                <span class="emp_name text-truncate">{{ $team_member->first_name }} {{ $team_member->last_name }}</span>
                <small class="emp_post text-truncate text-muted">
                    @if(isset($team_member->jobHistory->designation) && !empty($team_member->jobHistory->designation->title))
                        {{ $team_member->jobHistory->designation->title }}
                    @else
                        -
                    @endif
                </small>
            </div>
        </div>
        </td>
        <td>
            @if(isset($team_member->profile) && !empty($team_member->profile->employment_id))
                {{ $team_member->profile->employment_id }}
            @else
                -
            @endif
        </td>
        <td>{{ $team_member->first_name }}</td>
        <td>
            @if(isset($team_member->profile) && !empty($team_member->profile->phone_number))
                {{ $team_member->profile->phone_number }}
            @else
                -
            @endif
        </td>
        <td>
            @if(isset($team_member->profile) && !empty($team_member->profile->joining_date ))
                {{ date('d, F Y', strtotime($team_member->profile->joining_date)) }}
            @else
                -
            @endif
        </td>
        <td>
            @if(isset($team_member->employeeStatus->employmentStatus) && !empty($team_member->employeeStatus->employmentStatus->name))
                @if($team_member->employeeStatus->employmentStatus->name=='Terminated')
                    <span class="badge bg-label-{{ $team_member->employeeStatus->employmentStatus->class }} me-1">{{ $team_member->employeeStatus->employmentStatus->Terminated }}</span>
                @elseif($team_member->employeeStatus->employmentStatus->name=='Permanent')
                    <span class="badge bg-label-{{ $team_member->employeeStatus->employmentStatus->class }} me-1">{{ $team_member->employeeStatus->employmentStatus->Terminated }}</span>
                @elseif($team_member->employeeStatus->employmentStatus->name=='Probation')
                    <span class="badge bg-label-{{ $team_member->employeeStatus->employmentStatus->class }} me-1">{{ $team_member->employeeStatus->employmentStatus->Terminated }}</span>
                @endif
            @else
                -
            @endif
        </td>
    </tr>
@endforeach
