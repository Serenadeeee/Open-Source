@extends('admin.layout')
@section('admin_content')
<h1 class="h3 mb-4 text-gray-800">Video</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Danh sách video</h5>
    </div>
    <div class="container card-body">
        <form class="container px-5">
            @csrf
            <div class="form-group">
                <label><strong>Tên video</strong></label>
                <input type="text" data-validation="length" data-validation-length="min1" data-validation-error-msg="Vui lòng nhập tên video!"
                class="form-control video_title" onkeyup="ChangeToSlug();" name="video_title" id="slug" placeholder="Tên video...">
            </div>
            <div class="form-group">
                <label><strong>Link Youtube</strong></label>
                <input type="text" data-validation="length" data-validation-length="min1" data-validation-error-msg="Vui lòng nhập link video!"
                class="form-control video_link" onkeyup="ChangeToSlug();" name="video_link" id="slug" placeholder="Link video...">
            </div>
            <div class="form-group">
                <label><strong>Hình ảnh video</strong></label>
                <input type="file" name="file" id="file_img_video" style="padding: .2rem .75rem;" class="form-control" accept="image/*">
            </div>
            <div style="display: none;" class="form-group">
                <label><strong>Slug</strong></label>
                <input type="text" class="form-control video_slug" id="convert_slug" name="video_slug" placeholder="Slug video...">
            </div>
            <button type="button" name="add_video" class="btn btn-grape add_video">Thêm video</button>
        </form>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <strong id="success_video" style="color: red; font-size: 14px;"></strong>
            <table id="video_load" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

            </table>
        </div>
    </div>
</div>
@endsection