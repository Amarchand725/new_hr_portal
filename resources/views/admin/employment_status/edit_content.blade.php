<div class="col-12 col-md-12">
    <label class="form-label" for="name">Name</label>
    <input type="text" name="name" id="name" value="{{ $model->name }}" class="form-control" placeholder="Permanant" />
</div>
<div class="col-12 col-md-12">
    <label class="form-label" for="class_name">Class</label>
    <select name="class" class="form-control" id="class_name">
        <option value="" {{ $model->class==""?'selected':'' }}>Select class</option>
        <option value="purple" {{ $model->class=="purple"?'selected':'' }}> Purple </option>
        <option value="success" {{ $model->class=="success"?'selected':'' }}> Success </option>
        <option value="info" {{ $model->class=="info"?'selected':'' }}> Info </option>
        <option value="warning" {{ $model->class=="warning"?'selected':'' }}> Warning </option>
        <option value="primary" {{ $model->class=="primary"?'selected':'' }}> Primary </option>
        <option value="danger" {{ $model->class=="danger"?'selected':'' }}> Danger </option>
    </select>
</div>
<div class="col-12 col-md-12">
    <div class="note note-warning p-2 mt-3">
        <div class="demo-inline-spacing">
            <div class="card-body">
                <div class="alert alert-warning" role="alert">
                    <span class="badge bg-{{ $model->class }}" id="badge-class-label">Terminated</span> This will be the badge of the employee
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-12">
    <label class="form-label" for="description">Description ( <small>Optional</small> )</label>
    <textarea class="form-control" name="description" id="description" placeholder="Enter description">{{ $model->description }}</textarea>
</div>
