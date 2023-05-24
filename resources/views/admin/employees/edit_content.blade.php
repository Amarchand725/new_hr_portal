<div class="row">
    <div class="mb-3 fv-plugins-icon-container  col-6">
        <label class="form-label" for="first_name">First Name</label>
        <input type="text" class="form-control" value="{{ $data['model']->first_name }}" id="first_name" placeholder="Enter first name" name="first_name">
        <div class="fv-plugins-message-container invalid-feedback"></div>
        <span id="first_name_error" class="text-danger error"></span>
    </div>
    <div class="mb-3 fv-plugins-icon-container  col-6">
        <label class="form-label" for="last_name">Last Name</label>
        <input type="text" class="form-control" value="{{ $data['model']->last_name }}" id="last_name" placeholder="Enter last name" name="last_name">
        <div class="fv-plugins-message-container invalid-feedback"></div>
        <span id="last_name_error" class="text-danger error"></span>
    </div>
</div>
<div class="row">
    <div class="mb-3 fv-plugins-icon-container  col-6">
        <label class="form-label" for="email">Email</label>
        <input type="email" id="email" class="form-control" value="{{ $data['model']->email }}" placeholder="john.doe@example.com" aria-label="john.doe@example.com" name="email">
        <div class="fv-plugins-message-container invalid-feedback"></div>
        <span id="email_error" class="text-danger error"></span>
    </div>
    <div class="mb-3 fv-plugins-icon-container col-6">
        <label class="form-label" for="phone_number">Phone</label>
        <input type="text" id="phone_number" class="form-control" placeholder="Enter phone number" name="phone_number">
        <div class="fv-plugins-message-container invalid-feedback"></div>
        <span id="phone_number_error" class="text-danger error"></span>
    </div>
</div>
<div class="mb-3">
    <label class="d-block form-label">Gender </label>
    <div class="form-check mb-2">
      <input
        type="radio"
        id="gender-male"
        name="gender"
        class="form-check-input"

        @if($data['model']->profile->gender=='male')
            checked
        @endif
        required
        value="male"
      />
      <label class="form-check-label" for="gender-male">Male</label>
    </div>
    <div class="form-check">
      <input
        type="radio"
        id="gender-female"
        name="gender"
        class="form-check-input"
        required
        value="female"

        @if($data['model']->profile->gender=='female')
            checked
        @endif
      />
      <label class="form-check-label" for="gender-female">Female</label>
    </div>
    <div class="fv-plugins-message-container invalid-feedback"></div>
    <span id="gender_error" class="text-danger error"></span>
</div>

<div class="mb-3">
    <label class="form-label" for="employment_id">Employee ID</label>
    <input type="text" id="employment_id" value="{{ $data['model']->profile->employment_id }}" name="employment_id" class="form-control phone-mask" placeholder="Enter employment id">
    <div class="fv-plugins-message-container invalid-feedback"></div>
    <span id="employment_id_error" class="text-danger error"></span>
</div>

<div class="row">
    <div class="mb-3 col-6">
        <label class="form-label" for="department_id">Departments</label>
        <select id="department_id" name="department_id" class="form-select">
            <option value="" selected>Select department</option>
            @foreach ($data['departments'] as $department)
                <option value="{{ $department->id }}"
                    @if(isset($data['model']->departmentBridge->department_id) && !empty($data['model']->departmentBridge->department_id))
                        {{ $data['model']->departmentBridge->department_id==$department->id?'selected':'' }}
                    @endif>
                        {{ $department->name }}
                </option>
            @endforeach
        </select>
        <div class="fv-plugins-message-container invalid-feedback"></div>
        <span id="department_id_error" class="text-danger error"></span>
    </div>
    <div class="mb-3 col-6">
        <label class="form-label" for="designation_id">Designation</label>
        <select id="designation_id" name="designation_id" class="form-select">
            <option value="" selected>Select designation</option>
            @foreach ($data['designations'] as $designation)
                <option value="{{ $designation->id }}" {{ $data['model']->jobHistory->designation_id==$designation->id?'selected':'' }}>{{ $designation->title }}</option>
            @endforeach
        </select>
        <div class="fv-plugins-message-container invalid-feedback"></div>
        <span id="designation_id_error" class="text-danger error"></span>
    </div>
</div>

<div class="row">
    <div class="mb-3 col-6">
        <label class="form-label" for="employment_status_id">Employment Status</label>
        <select id="employment_status_id" name="employment_status_id" class="form-select">
            <option value="" selected>Select Status</option>
            @foreach ($data['employment_statues'] as $employment_status)
                <option value="{{ $employment_status->id }}" {{ $data['model']->jobHistory->employment_status_id==$employment_status->id?'selected':'' }}>{{ $employment_status->name }}</option>
            @endforeach
        </select>
        <div class="fv-plugins-message-container invalid-feedback"></div>
        <span id="employment_status_id_error" class="text-danger error"></span>
    </div>
    <div class="mb-3 col-6">
        <label class="form-label" for="role_id">Role</label>
        <select id="role_id" name="role_id" class="form-select">
            <option value="" selected>Select Role</option>
            @foreach ($data['roles'] as $role)
                <option value="{{ $role->id }}" {{ $data['model']->getRoleNames()->first()==$role->name?'selected':'' }}>{{ $role->name }}</option>
            @endforeach
        </select>
        <div class="fv-plugins-message-container invalid-feedback"></div>
        <span id="role_id_error" class="text-danger error"></span>
    </div>
</div>
<div class="row">
    <div class="mb-3 col-6">
        <label class="form-label" for="salary">Salary</label>
        <input type="number" id="salary" name="salary" value="{{ $data['model']->salaryHistory->salary??'' }}" class="form-control" placeholder="Enter salary">
        <div class="fv-plugins-message-container invalid-feedback"></div>
        <span id="salary_error" class="text-danger error"></span>
    </div>
    <div class="mb-3 col-6">
        <label class="form-label" for="joining_date">Joining Date</label>
        <input type="date" class="form-control flatpickr-validation" value="{{ $data['model']->jobHistory->joining_date }}" id="joining_date" name="joining_date" required />
        <div class="fv-plugins-message-container invalid-feedback"></div>
        <span id="joining_date_error" class="text-danger error"></span>
    </div>
</div>
