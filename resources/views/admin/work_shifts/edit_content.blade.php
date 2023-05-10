<div class="mb-3 fv-plugins-icon-container">
    <label class="form-label" for="name">Name </label>
    <input type="text" class="form-control" id="name" value="{{ $model->name }}" placeholder="Enter Working Shift Name e.g Night" name="name">
    <div class="fv-plugins-message-container invalid-feedback"></div>
    <span id="name_error" class="text-danger error"></span>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="mb-3 fv-plugins-icon-container">
            <label class="form-label" for="start_date">Start Date</label>
            <input type="date" class="form-control" name="start_date" value="{{ $model->start_date }}" id="start_date">
            <div class="fv-plugins-message-container invalid-feedback"></div>
            <span id="start_date_error" class="text-danger error"></span>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="mb-3 fv-plugins-icon-container">
            <label class="form-label" for="end_date">End Date</label>
            <input type="date" class="form-control" name="end_date" value="{{ $model->end_date }}" id="end_date">
            <div class="fv-plugins-message-container invalid-feedback"></div>
            <span id="end_date_error" class="text-danger error"></span>
        </div>
    </div>
</div>
<div class="mb-3 fv-plugins-icon-container">
    <small class="text-light fw-semibold">Choose Working Shift Type</small>
    <div class="form-check mt-3">
        <input name="type" class="form-check-input" type="radio" value="regular" id="regular" {{ $model->type=='regular'?'checked':'' }}/>
        <label class="form-check-label" for="regular"> Regular </label>
    </div>
    <div class="form-check">
        <input name="type" class="form-check-input" type="radio" value="scheduled" id="scheduled" {{ $model->type=='scheduled'?'checked':'' }} />
        <label class="form-check-label" for="scheduled"> Scheduled </label>
    </div>
    <span id="type_error" class="text-danger error"></span>
</div>
<div class="row">
    <label class="form-label">Set Regular Week <small>( Set week with fixed time )</small> </label>
    <div class="col-sm-6">
        <div class="mb-3 fv-plugins-icon-container">
            <label class="form-label" for="start_time">Start Time  </label>
            <input type="time" class="form-control" name="start_time" id="start_time" value="{{ $model->hasWorkShiftDetail->start_time }}">
            <div class="fv-plugins-message-container invalid-feedback"></div>
            <span id="start_time_error error" class="text-danger"></span>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="mb-3 fv-plugins-icon-container">
            <label class="form-label" for="end_time">End Time</label>
            <input type="time" class="form-control" name="end_time" id="end_time" value="{{ $model->hasWorkShiftDetail->end_time }}">
            <div class="fv-plugins-message-container invalid-feedback"></div>
            <span id="end_time_error error" class="text-danger"></span>
        </div>
    </div>
</div>
<div class="mb-3 fv-plugins-icon-container">
    <label class="form-label">Select weekend day (off days) </label>
    <div class="app-checkbox-group row edit-days">
        @foreach ($model->haveWorkShiftDetails as $shift_day)
            @if($shift_day->is_weekend)
                <div class="customized-checkbox checkbox-default col-md-3">
                    <input type="checkbox" name="weekend_days[]" id="day-{{ $shift_day->weekday_key }}" placeholder="" value="{{ $shift_day->weekday_key }}" checked>
                    <label for="day-{{ $shift_day->weekday_key }}" class=""> {{ $shift_day->weekday }}</label>
                </div>
            @else
                <div class="customized-checkbox checkbox-default col-md-3">
                    <input type="checkbox" name="weekend_days[]" id="day-{{ $shift_day->weekday_key }}" placeholder="" value="{{ $shift_day->weekday_key }}">
                    <label for="day-{{ $shift_day->weekday_key }}" class=""> {{ $shift_day->weekday }}</label>
                </div>
            @endif
        @endforeach
    </div>
</div>
<div class="col-12 col-md-12">
    <label class="form-label" for="description">Description ( <small>Optional</small> )</label>
    <textarea class="form-control" name="description" id="description" placeholder="Enter description">{{ $model->description }}</textarea>
</div>
